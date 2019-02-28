<div class="hidden-sm hidden-md hidden-lg col-lg-12 btn-main-reserva">
	<div class="btn-reserva">
		<a href="#"  data-toggle="modal" data-target="#modal-reserva">Fazer uma reserva</a>
	</div><!-- btn-reserva -->
</div><!-- cols -->

<div class="hidden-xs col-sm-4 col-md-4 col-lg-3">
	<div class="sidebar">
		<div class="cartao">
			<div class="inner-card">
				<div class="btn-imprimir">
					<a href="#">Imprimir cartão</a>
				</div><!-- btn-imprimir -->

				<div class="see-card">
					<div class="ico-cartao">
						<img src="{{ asset('site/images/img-cartao-silver.png') }}" alt="" class="img-responsive">
					</div><!-- ico-cartao -->
					<div class="info-cartao">
						<p>{{ Auth::user()->name }}</p>
						<p>3081  0314  5116  8158</p>
					</div><!-- info-cartao -->
				</div><!-- see-card -->
			</div><!-- inner-card -->
		</div><!-- cartao -->

		<ul>
			<li @if(\Route::current()->getName() == 'site.dashboard') class="active" @endif><a href="{{ route('site.dashboard') }}">Visão geral</a></li>
			<li @if(\Route::current()->getName() == 'site.card') class="active" @endif><a href="{{ route('site.card') }}">Cartão e status</a></li>
			<li @if(\Route::current()->getName() == 'site.promotion') class="active" @endif><a href="{{ route('site.promotion') }}">Promoções</a></li>
			<li @if(\Route::current()->getName() == 'site.partner') class="active" @endif><a href="{{ route('site.partner') }}">Parcerias</a></li>
			<li @if(\Route::current()->getName() == 'site.preference') class="active" @endif><a href="{{ route('site.preference') }}">Preferências</a></li>
			<li @if(\Route::current()->getName() == 'site.settings') class="active" @endif><a href="{{ route('site.settings') }}">Configurações da conta</a></li>
			<li @if(\Route::current()->getName() == 'site.faq') class="active" @endif><a href="{{ route('site.faq') }}">Dúvidas e regulamento</a></li>
			<li>
				<a href="javascript:;" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    Sair
                </a>
            </li>
		</ul>
	</div><!-- sidebar -->
</div><!-- cols -->

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>