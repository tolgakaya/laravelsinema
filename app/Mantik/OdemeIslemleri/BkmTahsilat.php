<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 30/10/2016
 * Time: 17:11
 */

namespace App\Mantik\OdemeIslemleri;



// bunu gözleyeceğimiz sınıfa uygulayalım
class BkmTahsilat implements IGozlenebilir, ITahsilat
{

    private $gozetleyiciler = array();

    function attach(IGozleyen $gozleyen)
    {
        $this->gozetleyiciler[] = $gozleyen;
    }

    function detach(IGozleyen $gozleyen)
    {
        $this->gozetleyiciler = array_filter($this->gozetleyiciler, function ($g) use ($gozleyen) {
            return !($g === $gozleyen);
        });
    }

    function notify()
    {
        foreach ($this->gozetleyiciler as $goz) {
            $goz->update($this);
        }
    }

    private $status = array();

    public function handleTahsilat($user, $pass, $ip)
    {
        $isValid = false;
        //burada ödeme işlemleri yapılıyor
        //ödeme işleminin sonucu döndürülüyor
        switch (rand(1, 3)) {
            case 1:
                $this->setStatus('Yetersiz', $user, $ip);
                $isValid = false;
                break;
            case 2:
                $this->setStatus('Olmaz-Bkm', $user, $ip);
                $isValid = false;
                break;
            case 3:
                $this->setStatus('Okey->bkm', $user, $ip);
                $isValid = true;
                break;
            default:
                ;
                break;
        }
        $this->notify();
        return $isValid;
    }

    function getStatus()
    {
        return $this->status;
    }

    function setStatus($status, $user, $ip)
    {
        $this->status = array(
            $status,
            $user,
            $ip
        );
    }
}