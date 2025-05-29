<?php
require_once 'View.php';

class Controller
{
    /**
     * Render view dari folder /view
     * @param string $view - nama file view tanpa ekstensi
     * @param array $data - data yang dikirim ke view
     */
    public function view($view, $data = [])
    {
        View::render($view, $data);
    }
}
