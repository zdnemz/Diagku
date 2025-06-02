<?php

class PenggunaModel extends Model
{
    public function getPenggunaByEmail($email)
    {
        return $this->query("SELECT * FROM pengguna WHERE email = ?", [$email])->fetch();
    }

    public function addPengguna($data)
    {
        $sql = "INSERT INTO pengguna (nama_lengkap, email, password) VALUES (?, ?, ?)";
        return $this->execute($sql, [$data['nama_lengkap'], $data['email'], $data['password']]);
    }
}