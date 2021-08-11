<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }

    public function index(){
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name','id');
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:100',
            'password' => 'required|min:4',
            'roles' => 'required',
            ]
        );

        $user = User::create($request->all());

        $user->assignRole($request->get('roles'));

        return redirect()->route('admin.users.index')->with('info', "Usuario $user->name creado con Exito");
    }

    public function show(User $user)
    {
        $roles = Role::all()->pluck('name','id');
        return view('admin.user.show', compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name','id');
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
                'name' => 'required|max:255',
                'email' => "required|unique:users,id,$user->id|max:100",
                'password' => 'required|min:4',
                'roles' => 'required',
            ]
        );

        $user->update($request->all());

        $user->syncRoles($request->get('roles'));

        return redirect()->route('admin.users.index')->with('info', "Usuario $user->name actaulizado con exito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        return redirect('admin/users');
    }

    public function AuthRouteAPI(Request $request){
        return $request->user();
    }

}
