<?php

class RiwayatController extends Controller
{
    public function hapus()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $user = $_SESSION['user'];

        $historiModel = $this->model('HistoriModel');
        $deleteHistori = $historiModel->deleteHistoriByUserId($user['kode_pengguna']);

        $hasilDiagnosaModel = $this->model("HasilDiagnosaModel");
        $deleteHasilDiagnosa = $hasilDiagnosaModel->deleteHasilDiagnosaByUserId($user['kode_pengguna']);

        if ($deleteHistori && $deleteHasilDiagnosa) {
            $_SESSION['sukses'] = 'Riwayat berhasil dihapus.';
        } else {
            $_SESSION['eror'] = 'Gagal menghapus riwayat.';
        }

        header('Location: /dashboard');
        exit;
    }
}