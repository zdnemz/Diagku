<?php

class AuthController extends Controller
{
    public function login()
    {
        $this->view("auth/login");
    }

    public function proses_login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $penggunaModel = $this->model('PenggunaModel');

            // Cek apakah pengguna ada
            $pengguna = $penggunaModel->getPenggunaByEmail($email);
            if ($pengguna) {
                // Verifikasi password
                if (password_verify($password, $pengguna['password'])) {
                    // Set session pengguna
                    $_SESSION['user'] = [
                        'kode_pengguna' => $pengguna['kode_pengguna'],
                        'nama_lengkap' => $pengguna['nama_lengkap'],
                        'email' => $pengguna['email']
                    ];
                    header('Location: /dashboard');
                    exit;
                } else {
                    $this->view("auth/login", ['error' => 'Password salah']);
                }
            } else {
                $this->view("auth/login", ['error' => 'Email tidak ditemukan']);
            }

        } else {
            $this->view("auth/login", ['error' => 'Silakan isi email atau password']);
        }
    }

    public function daftar()
    {
        $this->view("auth/daftar");
    }

    public function proses_daftar()
    {
        if (isset($_POST['nama_lengkap']) && isset($_POST['email']) && isset($_POST['password'])) {
            $nama_lengkap = $_POST['nama_lengkap'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $penggunaModel = $this->model('PenggunaModel');

            // Cek apakah email sudah terdaftar
            if ($penggunaModel->getPenggunaByEmail($email)) {
                $this->view("auth/daftar", ['error' => 'Email sudah terdaftar']);
                return;
            }

            // Simpan pengguna baru
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $penggunaModel->addPengguna([
                'nama_lengkap' => $nama_lengkap,
                'email' => $email,
                'password' => $hashedPassword
            ]);

            header('Location: /login');
            exit;
        } else {
            $this->view("auth/daftar", ['error' => 'Silakan isi semua field']);
        }
    }

    public function logout()
    {
        // Hapus session pengguna
        unset($_SESSION['user']);
        header('Location: /beranda');
        exit;
    }

}