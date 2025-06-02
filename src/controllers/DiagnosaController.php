<?php

class DiagnosaController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user'])) {
            $gejala = $this->model('DiagnosaModel')->getGejala();
            $this->view('diagnosa/form', ['gejala' => $gejala]);
            return;
        } else {
            header('Location: /login');
            exit;
        }
    }

    public function proses()
    {
        $input = $_POST['gejala'] ?? [];

        $model = $this->model('DiagnosaModel');
        $rules = $model->getRules();
        $penyakitList = $model->getPenyakit();

        $cfPenyakit = [];

        // Hitung CF untuk masing-masing penyakit
        foreach ($rules as $rule) {
            if (in_array($rule['kode_gejala'], $input)) {
                $kode = $rule['kode_penyakit'];
                $cf = $rule['cf'];
                if (!isset($cfPenyakit[$kode])) {
                    $cfPenyakit[$kode] = $cf;
                } else {
                    $cfLama = $cfPenyakit[$kode];
                    $cfBaru = $cf;
                    $cfPenyakit[$kode] = $cfLama + $cfBaru * (1 - $cfLama);
                }
            }
        }

        arsort($cfPenyakit);
        $hasil = [];
        foreach ($cfPenyakit as $kode => $cf) {
            $hasil[] = [
                'kode' => $kode,
                'nama' => $penyakitList[$kode]['nama_penyakit'],
                'cf' => round($cf * 100, 2)
            ];
        }

        $kode_pengguna = $_SESSION['user']['kode_pengguna'] ?? null;
        if ($kode_pengguna && count($hasil) > 0) {
            $hasilDiagnosaModel = $this->model('HasilDiagnosaModel');
            $kode_diagnosa = $hasilDiagnosaModel->saveHasilDiagnosa([
                'kode_pengguna' => $kode_pengguna,
                'tanggal' => date('Y-m-d H:i:s'),
                'hasil_penyakit' => $hasil[0]['nama'],
                'presentase_cf' => $hasil[0]['cf']
            ]);

            if ($kode_diagnosa) {
                $historiModel = $this->model('HistoriModel');
                $historiModel->addHistori([
                    'kode_diagnosa' => $kode_diagnosa,
                    'kode_gejala' => $input
                ]);
            }
        } else {
            header('Location: /login');
            exit;
        }

        $_SESSION['hasil_diagnosa'] = $hasil;
        header('Location: /diagnosa/hasil');
        exit;
    }

    public function hasil()
    {
        if (!isset($_SESSION['hasil_diagnosa'])) {
            header('Location: /diagnosa');
            exit;
        }

        $hasil = $_SESSION['hasil_diagnosa'];
        unset($_SESSION['hasil_diagnosa']);

        $this->view('diagnosa/hasil', ['hasil' => $hasil, 'title' => 'Hasil Diagnosa']);
    }
}
