<header class="home">
	<div class="container">
		<div class="row">
			<div class="col-logo col-xs-4 col-sm-4 col-md-4 col-lg-2">
				<a href="./">
					<img src="{{ asset('site/images/logo-beback-header.svg') }}" alt="" class="img-responsive">
				</a>
			</div><!-- col-logo -->

			<div class="col-btns col-xs-8 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-offset-7 col-lg-3">
				<div class="inner-btns-header">
					<a href="{{ route('register') }}" class="btn-header">Cadastre-se</a>
					<a href="{{ route('login') }}" class="btn-header btn-entrar">Entrar</a>
				</div><!-- btns-header -->
			</div><!-- col-btns -->
		</div><!-- row -->
	</div><!-- container -->
</header>

<nav>
	<div class="container">
		<ul class="hidden visible-md visible-lg">
			<li>
				<a href="#programa" class="text-left goto">O Programa</a>
			</li>
			<li>
				<a href="#beneficios" class="goto">Benefícios</a>
			</li>
			<li>
				<a href="#hoteis" class="goto">Hotéis Participantes</a>
			</li>
			<li>
				<a href="#promocoes" class="goto">Promoções</a>
			</li>
			<li>
				<a href="#parceiros" class="goto">Parceiros</a>
			</li>
			<li>
				<a href="#duvidas" class="text-right no-bd goto">Dúvidas Frequentes</a>
			</li>
		</ul>

		<div class="menu-mobile hidden visible-sm visible-xs">
			<i class="mdi mdi-menu"></i> Menu
		</div><!-- menu-mobile -->
	</div><!-- container -->

	<div class="menu-mobile-home hidden-lg hidden-md">
		<ul>
			<li><a href="#programa" class="goto">O Programa</a></li>
			<li><a href="#beneficios" class="goto">Benefícios</a></li>
			<li><a href="#hoteis" class="goto">Hotéis Participantes</a></li>
			<li><a href="#promocoes" class="goto">Promoções</a></li>
			<li><a href="#parceiros" class="goto">Parceiros</a></li>
			<li><a href="#duvidas" class="goto">Dúvidas Frequentes</a></li>
		</ul>
	</div><!-- menu-mobile-home -->
</nav>