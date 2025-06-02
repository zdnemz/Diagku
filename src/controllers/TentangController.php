<?php

class TentangController extends Controller
{
    public function index()
    {
        $this->view('tentang', ['title' => 'Tentang Sistem']);
    }
}
