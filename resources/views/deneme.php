<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 23/10/2016
 * Time: 07:25
 */
if (isset($gruplar)) {
    foreach ($gruplar as $t) {
       var_dump($t->toArray());
       /* echo '<h1>' . $t['grup_adi'] . '</h1>>';
        //var_dump($t);
        if (isset($t['seans__fiyat'][0])) {
            var_dump($t['seans__fiyat'][0]);
        } else {
            echo 'fiyat yok bölümü';
        }*/
        // echo '<strong>'.$t->seans_fiyat()->gecerlilik_tarihi .'</strong>';
    }
    // var_dump($test);
} else {
    echo 'mevcut degil';
}
