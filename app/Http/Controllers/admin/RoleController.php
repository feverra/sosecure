<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('admin.role.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('admin.role.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));


        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encrypt_decrypt = encrypt_decrypt('decrypt',$id);
        if($encrypt_decrypt === false){
            abort(403);
        }else{
            $role = Role::find($encrypt_decrypt);
            $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                ->where("role_has_permissions.role_id",$encrypt_decrypt)
                ->get();


            return view('admin.role.show',compact('role','rolePermissions'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encrypt_decrypt = encrypt_decrypt('decrypt',$id);
        if($encrypt_decrypt === false){
            abort(403);
        }else{
            $role = Role::find($encrypt_decrypt);
            $permission = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$encrypt_decrypt)
                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                ->all();


            return view('admin.role.edit',compact('role','permission','rolePermissions'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $encrypt_decrypt = encrypt_decrypt('decrypt',$id);
        if($encrypt_decrypt === false){
            abort(403);
        }else{
            $this->validate($request, [
                'name' => 'required',
                'permission' => 'required',
            ]);


            $role = Role::find($encrypt_decrypt);
            $role->name = $request->input('name');
            $role->save();


            $role->syncPermissions($request->input('permission'));


            return redirect()->route('roles.index')
                            ->with('success','Role updated successfully');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encrypt_decrypt = encrypt_decrypt('decrypt',$id);
        if($encrypt_decrypt === false){
            abort(403);
        }else{
            DB::table("roles")->where('id',$encrypt_decrypt)->delete();
            return redirect()->route('roles.index')
                            ->with('success','Role deleted successfully');
        }
    }
}
