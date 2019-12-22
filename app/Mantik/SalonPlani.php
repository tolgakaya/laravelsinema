<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 27/10/2016
 * Time: 21:12
 */

namespace App\Mantik;


use App\Models\Bilet;
use App\Models\SalonDuzen;

class SalonPlani
{
    private $sits_line;
    private $sits_row;
    private $sits_number;

    private $secilenTarih;
    private $seans_id;
    private $salon_id;

    function __construct($seans_id, $secilenTarih, $salon_id)
    {
        $this->seans_id = $seans_id;
        $this->secilenTarih = $secilenTarih;
        $this->salon_id = $salon_id;
    }

    private function getDuzen()
    {
        $duzen = SalonDuzen::find($this->salon_id);
        $this->sits_line = $duzen->sits_line;
        $this->sits_number = $duzen->sits_number;
        $this->sits_row = $duzen->sits_row;
    }

    public function plan()
    {
        $duzen = $this->getDuzen();

        $biletler = Bilet::where([['seans_id', '=', $this->seans_id],
            ['seans_tarihi', '>', $this->secilenTarih]
        ])
            ->pluck('koltuk');

        $k_str = "";
        foreach ($biletler as $b) {
            $k_str = $k_str . ',' . $b;
        }


        $dolu_koltuklar = explode(",", $k_str);

        $koltuk_class = "sits__place sits-price--expensive"; // koltu�un durumuna g�re s�n�f ekleyecez

// s�ra numaralar�n� olu�turuyoruz
        echo "<div class='sits'> <aside class='sits__line'>";

        $line = explode(",", $this->sits_line);
        foreach ($line as $l) {
            echo "<span class='sits__indecator'>$l</span>";
        }

        echo "</aside>";

// koltuklar� olu�turuyoruz
        $siralar = explode("-", $this->sits_row);
        foreach ($siralar as $sira) {
            // her s�ra i�in koltuk olu�turacaz
            $koltuklar = explode(",", $sira);
            echo "<div class='sits__row'>";
            foreach ($koltuklar as $k) {
                if ($k == 'X') {
                    $koltuk_class = 'sits__place bosluk';
                } else {
                    $koltuk_class = 'sits__place sits-price--expensive';
                }
                if (in_array($k, $dolu_koltuklar)) {
                    $koltuk_class = 'sits__place sits-state--not';
                }
                echo "<span class='$koltuk_class' data-place='$k' data-price='10'>$k</span>";
            }
            echo "</div>";
        }

        echo <<<_END
	<aside class="sits__checked">
									<div class="checked-place"></div>
									<div class="checked-result">0 TL</div>
								</aside>
_END;

//
        echo "<footer class='sits__number'>";

        $numaralar = explode(",", $this->sits_number);
        foreach ($numaralar as $sayi) {
            echo "<span class='sits__indecator'>$sayi</span>";
        }

        echo "</footer></div></div></div>";
    }

}