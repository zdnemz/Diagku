<?php

class HasilDiagnosaModel extends Model
{
    public function getHasilDiagnosa($kode_pengguna)
    {
        $query = "SELECT * FROM hasil_diagnosa WHERE kode_pengguna = :kode_pengguna ORDER BY tanggal DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_pengguna', $kode_pengguna, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveHasilDiagnosa($data)
    {
        $query = "INSERT INTO hasil_diagnosa (kode_pengguna, tanggal, hasil_penyakit, presentase_cf) 
                  VALUES (:kode_pengguna, :tanggal, :hasil_penyakit, :presentase_cf)";
        $stmt = $this->db->prepare($query);
        $success = $stmt->execute($data);

        return $this->db->lastInsertId();

    }

    public function deleteHasilDiagnosaByUserId($kode_pengguna)
    {
        $query = "DELETE FROM hasil_diagnosa WHERE kode_pengguna = :kode_pengguna";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_pengguna', $kode_pengguna, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
