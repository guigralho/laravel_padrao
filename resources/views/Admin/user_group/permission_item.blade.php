@php
    $haveSubMenu = $menu->subMenu->count() >= 1 ? true : false;
@endphp
<tr>
    <td>@if($menu->menu_id) - @endif {{ $menu->name }}</td>
    <?php
        $permissionTypeConstant->flip()->each(function($permission) use ($menu, $role) {
            $namePermission = str_slug("{$menu->name}_{$permission}", '-');
            echo '<td>
                        <div class="container-switcher">
                            <input type="checkbox" data-init-plugin="switchery" data-size="small" name="permissoes[]" class="menu_'.$menu->id.'" value="'.$namePermission.'" '.($role->hasPermissionTo($namePermission) ? "checked" : "").' />
                        </div>
                    </td>';
        });
    ?>
</tr>

@if($haveSubMenu)
    @foreach($menu->subMenu as $subMenu)
        @include('Admin.user_group.permission_item', ['menu' => $subMenu])
    @endforeach
@endif
