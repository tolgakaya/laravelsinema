<div class="search-wrapper">
    <div class="container container--add">
        <form id='search-form' method='post' action='{{route('arama',['page'=>1])}}'
              class="search">
            {{ csrf_field() }}
            <input type="text" class="search__field" name="arama_terimi" placeholder="Ara...">
            <select name="kisit" id="search-sort" class="search__sort" tabindex="0">
                <option value="" selected='selected'>Hepsi</option>
                <option value="gosterimde">Gösterimdekiler</option>
                <option value="gelecek">Gelecek program</option>
                <option value="eski">Eskiler</option>

            </select>
            <button type='submit' class="btn btn-md btn--danger search__button">Filim ara</button>
        </form>
    </div>
</div>