<div class="header ">
    <!-- START MOBILE SIDEBAR TOGGLE -->
    <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
    </a>
    <!-- END MOBILE SIDEBAR TOGGLE -->
    <div class="content-center">
        <div class="brand inline   ">
            <img src="{{ asset('img/logo.svg') }}" alt="logo" data-src="{{ asset('img/logo.svg') }}" data-src-retina="{{ asset('img/logo.svg') }}" width="120">
        </div>
        <!-- START NOTIFICATION LIST -->
        <a class="search-link fs-16">Bourbon BeBack</a>
        
        <!-- END NOTIFICATIONS LIST -->
    </div>
    <div class="d-flex align-items-center">
        <!-- START User Info-->
        <div class="pull-left p-r-10 fs-14 font-heading hidden-sm-down">
            <span class="semi-bold">{{ Auth::user()->name }}</span>
        </div>
        <div class="dropdown pull-right">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="thumbnail-wrapper d32 circular inline" style="cursor: pointer;">
                <i class="fa fa-user"></i>
            </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <span class="pull-left">
                    <a href="{{ route('admin.user.change_password') }}" class="dropdown-item">
                        <i class="fa fa-key"></i> Alterar Senha
                    </a>
                </span>
                
                <span class="pull-left" style="width: 100%;"> 
                    <a href="{{ route('logout') }}" class="bg-master-lighter dropdown-item" 
                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Sair') }}<span class="pull-right"><i class="pg-power"></i></span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </span>
                
            </div>
        </div>
    </div>
</div>