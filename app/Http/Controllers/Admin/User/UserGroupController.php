<?php

namespace BeBack\Http\Controllers\Admin\User;

use BeBack\Constants\PermissionTypeConstant;
use BeBack\Services\MenuService;
use BeBack\Services\PermissionService;
use Illuminate\Http\Request;
use BeBack\Http\Controllers\Admin\Controller;
use BeBack\Services\UserGroupService;
use Illuminate\Support\Facades\Validator;
use BeBack\Models\UserGroup;
use Spatie\Permission\Models\Role;

class UserGroupController extends Controller
{
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'max:255'
        ]);
    }

    public function index(Request $request, UserGroupService $userGroupService)
    {
    	$search = [];

    	if ($request->has('search')) 
    		$search['searchString'] = $request->get('search');

    	if ($request->has('status')) 
    		$search['searchStatus'] = $request->get('status');    	

    	$listUserGroups = $userGroupService->list($search)->paginate(15);

        return view('Admin.user_group.index', compact('listUserGroups'));
    }


    public function add(Request $request, UserGroupService $userGroupService)
    {
    	$userGroup = '';

    	if ($request->isMethod('post')) {
    		$this->validator($request);

    		$userGroup = new UserGroup;
    		$userGroup->name = $request->get('name');
    		$userGroup->description = $request->get('description');
    		$userGroup->status = $request->get('status');

    		if ($userGroupService->create($userGroup)) {
    			return redirect(route('admin.user_group'));
    		}
		}

    	return view('Admin.user_group.add', compact('userGroup'));
    }


    public function edit($groupUserId, Request $request, UserGroupService $userGroupService, MenuService $menuService)
    {
    	$userGroup = UserGroup::findOrFail($groupUserId);

        $menus = $menuService->getMenuWithParent();
        $role = Role::findByName($userGroup->name);

    	if ($request->isMethod('post')) {
    		$this->validator($request);

            $role->syncPermissions($request->get('permissoes'));

    		$userGroup->name = $request->get('name');
    		$userGroup->description = $request->get('description');
    		$userGroup->status = $request->get('status');

    		if ($userGroupService->update($userGroup)) {
    			return redirect(route('admin.user_group'));
    		}
		}

        $permissionTypeConstant = collect(PermissionTypeConstant::getConstants());

    	return view('Admin.user_group.add', compact('userGroup', 'menus', 'role', 'permissionTypeConstant'));
    }

    public function delete($groupUserId, UserGroupService $userGroupService)
    {
    	$userGroup = UserGroup::findOrFail($groupUserId);

    	if ($userGroupService->delete($userGroup)) {
    		return redirect(route('admin.user_group'));
    	}
    }

}
