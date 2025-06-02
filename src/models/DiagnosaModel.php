<?php

class DiagnosaModel extends Model
{

    public function getGejala()
    {
        return $this->query("SELECT * FROM gejala")->fetchAll();
    }

    public function getRules()
    {
        return $this->query("SELECT * FROM gejala_penyakit")->fetchAll();
    }

    public function getPenyakit()
    {
        return $this->query("SELECT * FROM penyakit")->fetchAll(PDO::FETCH_UNIQUE);
    }

}
