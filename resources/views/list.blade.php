@extends('layouts.layout');
@section('arama')
    @include('search')
@endsection
@section('container')
    <div class="col-sm-12">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="page-heading">Movies</h2>
        <h4><?php isset($_SESSION['mesaj']) == true ? (print $_SESSION['mesaj']) : (print "");?> </h4>
        <div class="select-area">
            <form class="select" method='get'>
                <select name="select_item" class="select__sort" tabindex="0">
                    <option value="1" selected='selected'>London</option>
                    <option value="2">New York</option>
                    <option value="3">Paris</option>
                    <option value="4">Berlin</option>
                    <option value="5">Moscow</option>
                    <option value="3">Minsk</option>
                    <option value="4">Warsawa</option>
                    <option value="5">Kiev</option>
                </select>
            </form>

            <div class="datepicker">
                <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                <input type="text" id="datepicker" value='03/10/2014'
                       class="datepicker__input">
            </div>

            <form class="select select--cinema" method='get'>
                <select name="select_item" class="select__sort" tabindex="0">
                    <option value="1" selected='selected'>Cineworld</option>
                    <option value="2">Empire</option>
                    <option value="3">Everyman</option>
                    <option value="4">Odeon</option>
                    <option value="5">Picturehouse</option>
                </select>
            </form>

            <form class="select select--film-category" method='get'>
                <select name="select_item" class="select__sort" tabindex="0">
                    <option value="2" selected='selected'>Children's</option>
                    <option value="3">Comedy</option>
                    <option value="4">Drama</option>
                    <option value="5">Fantasy</option>
                    <option value="6">Horror</option>
                    <option value="7">Thriller</option>
                </select>
            </form>

        </div>

        <div class="tags-area">
            <div class="tags tags--unmarked">
                <span class="tags__label">Sorted by:</span>
                <ul>
                    <li class="item-wrap"><a href="#" class="tags__item item-active"
                                             data-filter='all'>all</a></li>
                    <li class="item-wrap"><a href="#" class="tags__item"
                                             data-filter='release'>release date</a></li>
                    <li class="item-wrap"><a href="#" class="tags__item"
                                             data-filter='popularity'>popularity</a></li>
                    <li class="item-wrap"><a href="#" class="tags__item"
                                             data-filter='comments'>comments</a></li>
                    <li class="item-wrap"><a href="#" class="tags__item"
                                             data-filter='ending'>ending soon</a></li>
                </ul>
            </div>
        </div>
        <?php
        if (count($filimler) > 0) {
            // <img alt='' src="$filim->galeri->poster">

            foreach ($filimler as $filim) {
                $p = $filim->galeri->poster;
                echo "<div class='movie movie--preview movie--full release'>";
                echo <<<_END
        <div class="col-sm-3 col-md-2 col-lg-2">
				<div class="movie__images">
			 <img alt='' src="$p">
				</div>
				<div class="movie__feature">
					<a href="#" class="movie__feature-item movie__feature--comment">123</a>
					<a href="#" class="movie__feature-item movie__feature--video">7</a>
					<a href="#" class="movie__feature-item movie__feature--photo">352</a>
				</div>
			</div>
        			<div class="col-sm-9 col-md-10 col-lg-10 movie__about">
				<a href='index.php?action=single&movie_id=$filim->movie_id' class="movie__title link--huge">$filim->adi</a>

				<p class="movie__time">$filim->suresi</p>

				<p class="movie__option">
					<strong>Ülke: </strong><a href="#">$filim->ulke</a>
				</p>
				<p class="movie__option">
					<strong>Kategori: </strong><a href="#">$filim->kategori</a>
				</p>
				<p class="movie__option">
					<strong>Yapım Yılı: </strong>$filim->yil
				</p>
				<p class="movie__option">
					<strong>Yönetmen: </strong><a href="#">$filim->yonetmen</a>
				</p>
				<p class="movie__option">
					<strong>Oyuncular: </strong><a href="#">$filim->oyuncular</a> <a
						href="#">...</a>
				</p>
				<p class="movie__option">
					<strong>Yaş sınırlaması: </strong><a href="#">$filim->yas_siniri</a>
				</p>

				<div class="movie__btns">
					<a href="#" class="btn btn-md btn--warning">Bilet Al <span
						class="hidden-sm">online</span></a> <a href="#"
						class="watchlist">Add to watchlist</a>
				</div>

				<div class="preview-footer">
					<div class="movie__rate">
						<div class="score"></div>
						<span class="movie__rate-number">170 votes</span> <span
							class="movie__rating">5.0</span>
					</div>


					<a href="#" class="movie__show-btn">Seanslar</a>
				</div>
			</div>
        <div class="clearfix"></div>



_END;
                echo "<div class='time-select'>";
                $seanslar = $filim->seanslar;

                foreach ($seanslar as $salon_id => $saatler) {
                    echo <<<_END
    <div class="time-select__group">
    <div class="col-sm-4">
						<p class="time-select__place">$salon_id</p>
					</div>
    <ul class="col-sm-8 items-wrap">
_END;

                    foreach ($saatler as $saat) {
                        echo <<<_END
    <li class="time-select__item" data-time='$saat'>$saat</li>
_END;
                    }
                    echo "</ul></div>";
                }
                echo "</div></div>";
            }
        }
        ?>


        <div class="coloum-wrapper">
            <div class="pagination">
                @if ($current_page > 1)

                    <a href='{{route('filimlistesi', ['page' => $current_page - 1])}}'>geri</a>
                @endif

                @if ($current_page < $num_pages)

                    <a href='{{route('filimlistesi', ['page' => $current_page + 1])}}'>ileri</a>
                @endif
            </div>
        </div>

    </div>

@endsection

