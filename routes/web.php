<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/deneme', 'DenemeController@index')->name('deneme');
Route::get('/single/{movie_id}', 'MovieController@show');
Route::get('/list/{page?}', 'MovieController@index')->name('filimlistesi');

Route::post('/arama/{page?}', 'MovieController@search')->name('arama');

Route::get('/seans-secimi/{movie_id}', 'BookController@one')->name('step1');
Route::any('/seans/{movie_id}/{tarih}', 'BookController@seanscek');
Route::post('yer-secimi', 'BookController@two')->name('step2');
Route::post('tutar', 'BookController@three')->name('step3');
Route::get('tutar', 'BookController@three')->name('step3');//geçici
Route::any('fiyat/{grup_id}', 'BookController@fiyat')->name('fiyat');

Route::post('/bilet', 'BookController@bilet')->name('bilet');

//Route::group(['middleware' => 'auth'], function () {
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'bilets'], function () {
        Route::any('list/{tarih?}', 'Admin\BiletController@index')->name('biletlist');
        Route::any('seans/{seans_id}/{tarih?}', 'Admin\BiletController@seans')->name('biletseans');
        Route::get('delete/{bilet_id}', 'Admin\BiletController@delete')->name('biletsil');
        Route::get('show/{bilet_id}', 'Admin\BiletController@show')->name('biletshow');
        Route::post('ara', 'Admin\BiletController@ara')->name('biletara');

    });
    Route::group(['prefix' => 'filims'], function () {
        Route::get('create', function () {
            return view('admin.filims.create');
        })->name('adminfilimcreate');
        Route::get('list/{kisit?}', 'Admin\FilimController@index')->name('adminfilimliste');
        Route::post('search', 'Admin\FilimController@search')->name('adminfilimsearch');
        Route::post('store', 'Admin\FilimController@store')->name('adminfilimkaydet');
        Route::get('show/{movie_id}', 'Admin\FilimController@show')->name('adminfilimshow');
        Route::post('update/{movie_id}', 'Admin\FilimController@update')->name('adminfilimupdate');

        Route::get('galeris/{movie_id}', 'Admin\GaleriController@index')->name('galeri');
        Route::get('galeriform/{movie_id}', 'Admin\GaleriController@form')->name('galeriform');
        Route::post('upload/{movie_id}', 'Admin\GaleriController@upload')->name('upload');
        Route::post('resimupdate/{media_id}', 'Admin\GaleriController@update')->name('resimupdate');
        Route::get('resim_sil/{galeri_id}', 'Admin\GaleriController@sil')->name('resimsil');

    });
    Route::group(['prefix' => 'grups'], function () {
        Route::post('store', 'Admin\GrupController@store')->name('admingrupkaydet');
        Route::get('list', 'Admin\GrupController@index')->name('admingruplist');
        // Route::post('create', 'Admin\GrupController@create')->name('admingrupcreate');
        Route::get('show/{grup_id}', 'Admin\GrupController@show')->name('admingrupshow');
        Route::post('update/{grup_id}', 'Admin\GrupController@update')->name('admingrupupdate');

        Route::get('create', function () {
            return view('admin.fiyat_grups.create');
        })->name('grupcreate');
    });
    Route::group(['prefix' => 'salons'], function () {
        Route::get('create', function () {
            return view('admin.salons.create');
        })->name('saloncreate');

        Route::post('store', 'Admin\SalonController@store')->name('adminsalonkaydet');
        Route::get('list', 'Admin\SalonController@index')->name('adminsalonlist');
        Route::get('show/{salon_id}', 'Admin\SalonController@show')->name('adminsalonshow');
        Route::post('update/{salon_id}', 'Admin\SalonController@update')->name('adminsalonupdate');

        Route::get('salonduzen', function () {
            return view('admin.salons.salonduzen');
        });

    });
    Route::group(['prefix' => 'seans'], function () {

        Route::get('create', 'Admin\SeansController@create')->name('seanscreate');

        Route::post('store', 'Admin\SeansController@store')->name('adminseanskaydet');
        Route::get('list', 'Admin\SeansController@index')->name('adminseanslist');
        Route::get('list/salon/{salon_id?}', 'Admin\SeansController@index')->name('adminseanslistsalon');
        Route::get('list/filim/{movie_id?}', 'Admin\SeansController@index')->name('adminseanslistfilim');
        Route::get('show/{seans_id}', 'Admin\SeansController@show')->name('adminseanshow');
        Route::post('update/{seans_id}', 'Admin\SeansController@update')->name('adminseansupdate');


    });
    Route::group(['prefix' => 'fiyats'], function () {

        //bütün gruplar için o seansın fiyatları
        //aynısını bir filmin bütün seansları ve bütün grupları için fiyatları şeklinde de yapacaz.
        Route::get('show/{seans_id}', 'Admin\FiyatController@show')->name('tekseansfiyatshow');
        Route::get('sil/{fiyat_id}', 'Admin\FiyatController@sil')->name('fiyatsil');
        Route::post('update/{seans_id}', 'Admin\FiyatController@update')->name('fiyatupdate');
        Route::get('filim/{movie_id}', 'Admin\FiyatController@filim')->name('filimfiyatshow');
        Route::post('filim/{movie_id}', 'Admin\FiyatController@kaydet')->name('fiyatfilimkaydet');
        Route::get('toplu/{movie_id}', 'Admin\FiyatController@toplushow')->name('toplufiyatshow');
        Route::post('fiyatlandir/{movie_id}', 'Admin\FiyatController@tekfiyatlandir')->name('tekfiyatlandir');

    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('create', function () {
            return view('admin.users.create');
        });
        Route::get('list', function () {
            return view('admin.users.list');
        });
        Route::get('update', function () {
            return view('admin.users.update');
        });

        Route::group(['prefix' => 'roles'], function () {
            Route::get('create', function () {
                return view('admin.users.roles.create');
            });
            Route::get('list', function () {
                return view('admin.users.roles.list');
            });
            Route::get('update', function () {
                return view('admin.users.roles.update');
            });
        });
    });
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::group(['prefix' => 'configs'], function () {
        Route::get('update', function () {
            return view('admin.configs.update');
        });
    });
    Route::group(['prefix' => 'reports'], function () {
        Route::get('genelrapor', function () {
            return view('admin.reports.update');
        });
    });
});
//});

//test routerları
Route::get('filimler', function (\App\Mantik\Admin\IFilimRepo $repo) {
    return $repo->getAll(2, 1);
});
