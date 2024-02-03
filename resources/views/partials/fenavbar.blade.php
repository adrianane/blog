<nav class="navbar navbar-expand-lg static-top header-bottom-wrapper">
  <div class="container max-cont">
    <a class="navbar-brand" id="logo" href="/">
      <img src="{{ asset('/logo-mamacado.png') }}">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" aria-current="page" href="/">
          	HOME
          </a>
        </li>
      	@foreach($categories as $categoryItem)
        <li class="nav-item">
          <a class="nav-link {{ (strpos(Route::currentRouteName(), 'fe.categorie') == 0 && (request()->segment(2) == $categoryItem->slug)) ? 'active' : '' }}" aria-current="page" href="{{ url('categorie/' . $categoryItem->slug) }}">
          	{{ $categoryItem->name }}</a>
        </li>
      	@endforeach
      </ul>
		<form action="{{ route('search') }}" method="GET" id="searchform">
			{{ csrf_field() }}
			<input name="search" class="vce-search-input" size="40" type="text" placeholder="Cauta..."/>
			<button type="submit" class="vce-search-submit" aria-label="Cauta" title="Cauta">
				<i class="bi bi-search search-icon"></i>
			</button>
		</form>
    </div>
  </div>
</nav>