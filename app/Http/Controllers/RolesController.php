<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Http\Requests\Role\RoleStoreFormRequest;
use Edgar\PMT\Http\Requests\Role\RoleUpdateFormRequest;
use Edgar\PMT\Models\Role;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\AdminLte;

class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->q);
        if(isset($request->q)){
            $roles = Role::where('name', 'like', "%$request->q%")->paginate(10);
        } else {
            $roles = Role::paginate(10);
        }
        return view('admin.roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreFormRequest $request)
    {
        $data = $request->all();

        $role = Role::create($data);
        return redirect()->route('perfiles.index')->with('status', 'Perfil creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Edgar\PMT\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return $role;
        return view('admin.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateFormRequest $request, Role $role)
    {
        $data = $request->all();
        return $data;
        $role = Role::update($data);
        return redirect()->route('perfiles.index')->with('status', 'Perfil se ha actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
