<div class="menu-mobile-logado">
	<div class="inner-menu">
		<div class="close-menu">
			<i class="mdi mdi-close"></i>
		</div><!-- close-menu -->

		<div class="user-menu">
			<div class="col-cartao">
				<img src="{{ asset('site/images/img-cartao-gold.png') }}" alt="" class="img-responsive">
			</div><!-- col-cartao -->
			<div class="col-nome">
				<div class="infos">
					<p><b>{{ Auth::user()->name }}</b></p>
					<p>3081  0314  5116  8158</p>
				</div><!-- infos -->
			</div><!-- col-nome -->
		</div><!-- user-menu -->

		<ul class="lista-menu">
			<li class="active"><a href="visao-geral.php">Visão geral</a></li>
			<li><a href="cartao.php">Cartão e status</a></li>
			<li><a href="promocoes.php">Promoções</a></li>
			<li><a href="parcerias.php">Parcerias</a></li>
			<li><a href="preferencias.php">Preferências</a></li>
			<li><a href="configuracoes.php">Configurações da conta</a></li>
			<li><a href="duvidas.php">Dúvidas e regulamento</a></li>
			<li><a href="">Sair</a></li>
		</ul><!-- lista-menu -->
	</div><!-- inner-menu -->

	<div class="overlay"></div><!-- overlay -->
</div><!-- menu-mobile-logado -->

<header class="header-logado">
	<div class="container">
		<div class="row">
			<div class="col-logo col-xs-8 col-sm-10 col-md-2 col-lg-2">
				<div class="logo">
					<a href="visao-geral.php">
						<img src="{{ asset('site/images/logo-cad-login-beback.svg') }}" alt="" class="img-responsive">
					</a>
				</div><!-- logo -->
			</div><!-- col-lg-2 -->

			<div class="hidden-xs col-motor hidden-sm col-md-7 col-lg-8">
				<div class="header-motor">
					<div class="item-motor item-hotel">
						<input type="text" class="form-motor" placeholder="Hotel/Resort" />
					</div><!-- item-motor -->

					<div class="item-motor">
						<input type="text" class="form-motor" placeholder="Check-in" />
					</div><!-- item-motor -->

					<div class="item-motor">
						<input type="text" class="form-motor" placeholder="Check-out" />
					</div><!-- item-motor -->

					<div class="item-motor item-hospedes">
						<input type="text" class="form-motor no-bd" placeholder="Hóspedes" />
					</div><!-- item-motor -->

					<div class="item-motor item-botao">
						<input type="submit" value="Buscar">
					</div><!-- item-motor -->
				</div><!-- header-motor -->
			</div><!-- col-lg -->

			<div class="hidden-xs col-user hidden-sm col-sm-3 col-md-3 col-lg-2">
				<div class="inner-user">
					<div class="ico-user">
						<img src="{{ Auth::user()->imagePath() }}" class="img-circle" style="width: 100%;">
					</div><!-- ico-user -->

					<div class="nome-user">
						<p class="p-nome">{{ Auth::user()->name }}</p>
						<p class="p-nivel">NÍVEL GOLD</p>
					</div><!-- nome-user -->
				</div><!-- inner-user -->
			</div><!-- col-user -->

			<div class="col-menu-mob col-xs-4 col-sm-2 hidden-md hidden-lg">
				<div class="menu-mob">
					<i class="mdi mdi-menu"></i>
				</div><!-- menu-mob -->
			</div><!-- col-menu-mob -->
		</div><!-- row -->
	</div><!-- container -->
</header><!-- header-logado -->