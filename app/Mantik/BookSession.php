<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 28/10/2016
 * Time: 09:49
 */

namespace App\Mantik;


class BookSession
{
    public static function bilet_oturumu()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['bilet'])) {
            // sessiondaki bilet nesnesini d�nd�r
            return $_SESSION['bilet'];
        } else {
            // oturumda bilet yok
            $bilet = new BookInfoViewModel();
            $_SESSION['bilet'] = $bilet;
            return $_SESSION['bilet'];
        }
    }

}