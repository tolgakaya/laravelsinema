<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 30/10/2016
 * Time: 13:02
 */

namespace App\Mantik\OdemeIslemleri;

// Igozleyen interfacini kullanan her nesne attach sınıfı ile listeye akleniyor
// yalnız gözleyen sınıfın gözlenendeki özelbilgileri alması için bir yöntem gerekir
// bu yöntem de her sınıf için farklı olacağı için bu sınıfı abstract yapıp metodu da abstract yapalım
abstract class abstTahsilatGozleyici implements IGozleyen
{

    private $tahsilat;

    function __construct(ITahsilat $tahsilat)
    {
        $this->tahsilat = $tahsilat;
        $this->tahsilat->attach($this);
    }

    function update(IGozlenebilir $gozlenen)
    {
        if ($gozlenen == $this->tahsilat) {
            $this->doUpdate($gozlenen);
        }
    }

    abstract function doUpdate(ITahsilat $tahsilat);
}