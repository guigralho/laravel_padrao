<?php

namespace BeBack\Http\Controllers\Admin\User;

use BeBack\PermissionTrait;
use Illuminate\Http\Request;
use BeBack\Http\Controllers\Admin\Controller;
use BeBack\Services\UserService;
use BeBack\Services\UserGroupService;
use Illuminate\Support\Facades\Validator;
use BeBack\Models\User;
use Auth;
use Mail;

/**
 * Class UserController
 * @package BeBack\Http\Controllers\Admin\User
 */
class UserController extends Controller
{

    use PermissionTrait;
    
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
            'email' => 'required|email|max:255|unique:users',
            'user_group_id' => 'required',
        ]);
    }


    /**
     * @param Request $request
     * @param UserService $userService
     * @return mixed
     */
    public function index(Request $request, UserService $userService)
    {
    	$search = [];

    	if ($request->has('search')) 
    		$search['searchString'] = $request->get('search');

    	if ($request->has('status')) 
    		$search['searchStatus'] = $request->get('status');    	

    	$listUsers = $userService->list($search)->paginate(15);

        return view('Admin.user.index', compact('listUsers'));
    }


    /**
     * @param Request $request
     * @param UserService $userService
     * @param UserGroupService $userGroupService
     * @return mixed
     */
    public function add(Request $request, UserService $userService, UserGroupService $userGroupService)
    {
        $user = '';

        $userGroups = $userGroupService->list(['searchStatus' => 'Ativo'])->get();

        if ($request->isMethod('post')) {
            $this->validator($request);

            $user = new User;
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->status = $request->get('status');
            $user->user_group_id = $request->get('user_group_id');

            if ($userService->create($user)) {
                return redirect(route('admin.user'));
            }
        }

        return view('Admin.user.add', compact('user', 'userGroups'));
    }


    /**
     * @param $userId
     * @param Request $request
     * @param UserService $userService
     * @param UserGroupService $userGroupService
     * @return mixed
     */
    public function edit($userId, Request $request, UserService $userService, UserGroupService $userGroupService)
    {
        $user = User::findOrFail($userId);

        $userGroups = $userGroupService->list()->get();

//        $roles = $user->getRoleNames();

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => "required|email|max:255|unique:users,email,{$userId}",
                'user_group_id' => 'required',
            ]);
            
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->status = $request->get('status');
            $user->user_group_id = $request->get('user_group_id');

            if ($userService->update($user)) {
                return redirect(route('admin.user'));
            }
        }

        return view('Admin.user.add', compact('user', 'userGroups'));
    }

    public function changePassword(Request $request, UserService $userService)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required|string|max:255',
            ]);
            
            $user->password = $request->get('password');

            if ($userService->update($user)) {
                return redirect(route('admin.home'));
            }
        }

        return view('Admin.user.change_password');
    }

    public function delete($userId, UserService $userService)
    {
        $user = User::findOrFail($userId);

        if ($userService->delete($user)) {
            return redirect(route('admin.user'));
        }
    }

}