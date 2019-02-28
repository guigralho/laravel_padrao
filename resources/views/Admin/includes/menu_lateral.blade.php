<?php 
$getMenu = app(\BeBack\Services\MenuService::class)->getMenu();
?>

<nav class="page-sidebar" data-pages="sidebar">
	<!-- BEGIN SIDEBAR MENU HEADER-->
	<div class="sidebar-header">
		<img src="{{ asset('img/logo_branco.svg') }}" alt="logo" data-src="{{ asset('img/logo_branco.svg') }}" data-src-retina="{{ asset('img/logo_branco.svg') }}" width="90">
		<div class="sidebar-header-controls">
			<!-- <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu">
				</button> -->
			<button type="button" class="btn btn-link visible-lg-inline m-l-35" id="pin_sidebar" data-toggle-pin="sidebar"><i class="fa fs-12"></i></button>
		</div>
	</div>
	<!-- END SIDEBAR MENU HEADER-->
	<!-- START SIDEBAR MENU -->
	<div class="sidebar-menu">
		<!-- BEGIN SIDEBAR MENU ITEMS-->
		<ul class="menu-items">
			@each('Admin.includes.menu_item', $getMenu, 'menu')
		</ul>
		<div class="clearfix"></div>
	</div>
	<!-- END SIDEBAR MENU -->
</nav>