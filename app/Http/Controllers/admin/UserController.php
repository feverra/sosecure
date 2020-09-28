<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('type', 1)->orderBy('id','DESC')->paginate(5);
        return view('admin.admin.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
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
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'type' => User::ADMIN_TYPE
        ]);
        $user->assignRole([$request->input('role')]);
        return redirect()->route('admins.index')
                        ->with('success','User created successfully');
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
            $user = User::find($encrypt_decrypt);
            return view('admin.admin.show',compact('user'));
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
            $user = User::find($encrypt_decrypt);
            return view('admin.admin.edit',compact('user'));
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
                'role' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);
            $user = User::find($encrypt_decrypt);
            $user -> name = $request->input('name');
            if(!empty($request->input('password'))){
                $user -> password = $request->input('password');
            }
            $user -> save();
            return redirect()->route('admins.index')
                            ->with('success','User updated successfully');
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
            $user = User::find($encrypt_decrypt);
            $user->delete();

            return redirect()->route('admins.index')
                            ->with('success','User deleted successfully');
        }
    }
}
