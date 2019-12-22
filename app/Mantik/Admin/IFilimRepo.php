<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 31/10/2016
 * Time: 21:27
 */

namespace App\Mantik\Admin;


interface IFilimRepo
{
    public function getAll($perPage, $pageNumber);

    public function find($movie_id);

    public function search($arama_terimi);

    public function create($filimInfo);

    public function update($filimInfo, $movie_id);

}