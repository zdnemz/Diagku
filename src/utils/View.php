<?php
class View
{
    /**
     * Render view
     * @param string $view - nama file view di folder /view
     * @param array $data - data asosiatif untuk ditampilkan di view
     */
    public static function render($view, $data = [])
    {
        $viewPath = __DIR__ . '/../view/' . $view . '.php';

        if (file_exists($viewPath)) {
            extract($data);
            include $viewPath;
        } else {
            echo "View '{$view}.php' tidak ditemukan.";
        }
    }
}
