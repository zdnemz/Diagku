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

    public function model($model)
    {
        require_once dirname(__DIR__) . "/models/" . $model . ".php";
        return new $model();
    }
}
