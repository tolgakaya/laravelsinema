<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 31/10/2016
 * Time: 21:12
 */

namespace App\Mantik\Admin;

use App\Models\Filim;
use App\Mantik\Admin\IFilimRepo;
use Illuminate\Pagination\Paginator;

class FilimRepo  implements IFilimRepo
{
    private $model;

    function __construct(Filim $model)
    {
        $this->model = $model;
    }

    function getAll($perPage, $pageNumber)
    {
        $filimler = $this->model->skip(($pageNumber - 1) * $perPage)->take($perPage)->get();
        return $filimler;
    }

    public function find($movie_id)
    {
        return $this->model->find($movie_id)->toArray();
    }

    public function search($arama_terimi)
    {
        return $this->model
            ->where('adi', 'LIKE', '%'.$arama_terimi.'%')
            ->orWhere('oyuncular', 'LIKE', '%'.$arama_terimi.'%')
            ->get()
            ->toArray();
    }

    public function create($movie_id)
    {
        return $this->model->create($movie_id);
    }

    public function update($filimInfo, $movie_id)
    {
        return $this->model->find($movie_id)->update($filimInfo);
    }

}