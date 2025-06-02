<?php

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $user = $_SESSION['user'];

        $historiModel = $this->model('HistoriModel');
        $riwayat = $historiModel->getHistoriByUserId($user['kode_pengguna']);

        $this->view('dashboard', ['title' => 'Diagku - Diagnosa Penyakit Mental', 'user' => $user, 'riwayat' => $riwayat]);

    }
}
