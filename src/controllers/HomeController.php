<?php
class HomeController extends Controller
{
    public function index()
    {
        $this->view('home', ['title' => 'Selamat datang di MVC Native']);
    }
}
