<?php

class HistoriModel extends Model
{
    public function getHistoriByUserId($kode_pengguna)
    {
        $sql = "SELECT 
                    d.hasil_penyakit AS penyakit,
                    d.presentase_cf,
                    GROUP_CONCAT(g.deskripsi SEPARATOR ', ') AS gejala,
                    d.tanggal AS tanggal
                FROM histori h
                JOIN gejala g ON h.kode_gejala = g.kode_gejala
                JOIN hasil_diagnosa d ON h.kode_diagnosa = d.kode_diagnosa
                WHERE d.kode_pengguna = ?
                GROUP BY d.kode_diagnosa, d.hasil_penyakit, d.tanggal
                ORDER BY d.tanggal DESC";

        return $this->query($sql, [$kode_pengguna])->fetchAll();
    }


    public function addHistori($data)
    {
        $sql = "INSERT INTO histori (kode_diagnosa, kode_gejala) VALUES ";
        $placeholders = [];
        $params = [];

        foreach ($data['kode_gejala'] as $kode_gejala) {
            $placeholders[] = "(?, ?)";
            $params[] = $data['kode_diagnosa'];
            $params[] = $kode_gejala;
        }

        $sql .= implode(", ", $placeholders);
        return $this->execute($sql, $params);
    }
}