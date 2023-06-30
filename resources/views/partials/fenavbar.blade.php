<div class="global-navbar">
	<div class="container max-cont">
		<div class="row flex items-center lg:justify-between" id="logo-row">
			<div class="col-md-4 ml-4 flex lg:ml-0">
				<a id="logo" href="/" class="text-xl mr-5 hover:border-blue-800 border-2 border-black">MAMACADO.RO</a>
			</div>
			<div class="header_search w-full hidden lg:block pb-4">
				<form action="{{ route('search') }}" method="GET" id="searchform">
					{{ csrf_field() }}
					<input name="search" class="vce-search-input" size="20" type="text" placeholder="Cauta..."/>
					<i class="bi bi-search search-icon"></i>
				</form>
			</div>
			<!--
			<div class="col-md-8 my-auto">
				<h5>Advertise here</h5>
			</div>
		    -->
		</div>
	</div>
</div>
