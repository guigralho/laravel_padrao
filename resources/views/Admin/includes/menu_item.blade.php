<?php 
$haveSubMenu = $menu->subMenu->count() >= 1 ? true : false;

$perm_name = str_slug("{$menu->id}_list", '-');
?>

@can($perm_name)
    <li>
        <a href="@if($haveSubMenu) javascript:; @else {{ route($menu->route) }} @endif" class="">
            <span class="title">{{ $menu->name }}</span>
            @if($haveSubMenu)
                <span class="arrow"></span>
            @endif
        </a>
        <span class="icon-thumbnail"><i class="{{ $menu->icon }}"></i></span>

        @if($haveSubMenu)
            <ul class="sub-menu">
                @each('Admin.includes.menu_item', $menu->subMenu, 'menu')
            </ul>
        @endif
    </li>
@endcan