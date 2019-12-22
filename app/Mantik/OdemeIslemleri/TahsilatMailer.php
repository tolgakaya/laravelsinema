<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 30/10/2016
 * Time: 13:03
 */

namespace App\Mantik\OdemeIslemleri;

// şimdi bir login gözetleyici yazalım bu sınıf statüse göre işlem yapsın
class TahsilatMailer extends abstTahsilatGozleyici
{
    //burada mail gönderiliyor ancak statüse göre mail teması çekilerek gönderilecek
    //aynısı bilet kesme ve kaydetme için deyapılacak
    function doUpdate(ITahsilat $tahsilat)
    {
        $status = $tahsilat->getStatus();
        if ($status[0] == 'Okey') {
            echo "Tahsilat yapıldı mail gönderebilirsin";
        }
    }
}
