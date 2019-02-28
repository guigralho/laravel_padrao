<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('admin.home'));
});

// Configurações
Breadcrumbs::register('config', function ($breadcrumbs) {
    $breadcrumbs->push('Configurações', route('admin.home'));
});

//user
Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->parent('config');
    $breadcrumbs->push('Usuários', route('admin.user'));
});

Breadcrumbs::register('add_user', function ($breadcrumbs, $user = null) {
    $breadcrumbs->parent('user');

    if (!$user) {
    	$breadcrumbs->push('Novo usuário', route('admin.user.add'));
    } else {
    	$breadcrumbs->push($user->name, route('admin.user.edit', $user->id));
    } 
});

Breadcrumbs::register('change_password', function ($breadcrumbs) {
    $breadcrumbs->push('Alterar senha', route('admin.user.change_password'));
});

//group
Breadcrumbs::register('user_group', function ($breadcrumbs) {
    $breadcrumbs->parent('config');
    $breadcrumbs->push('Grupos', route('admin.user_group'));
});

Breadcrumbs::register('add_user_group', function ($breadcrumbs, $userGroup = null) {
    $breadcrumbs->parent('user_group');

    if (!$userGroup) {
    	$breadcrumbs->push('Novo grupo', route('admin.user_group.add'));
    } else {
    	$breadcrumbs->push($userGroup->name, route('admin.user_group.edit', $userGroup->id));
    } 
});