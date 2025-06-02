<?php
class BerandaController extends Controller
{
    public function index()
    {
        $this->view('beranda', ['title' => 'Diagku - Diagnosa Penyakit Mental']);
    }
}
