<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use DB;

class BlogController extends Controller
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
        $blogs = Blog::orderBy('id','DESC')->paginate(5);
        return view('admin.blog.index',compact('blogs'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'file' => 'required',
            'title' => 'required',
            'detail' => 'required',
        ]);

       
        $blogs = new Blog;
        $blogs->user_id = Auth::user()->id;
        $blogs->title = $request->input('title');
        $blogs->detail = $request->input('detail');
        if($request->hasFile('file')){
            $filename = time().'.'.$request->file('file')->getClientOriginalExtension();
            $blogs->photo = 'public/img/blog/main-blog/' . $filename;
            $request->file('file')->move(public_path('public/img/blog/main-blog'), $filename);
        }
        $blogs->save();
       
        return redirect()->route('blogs.index')
                        ->with('success','Blog created successfully');
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
            $blog = Blog::find($encrypt_decrypt);
            return view('admin.blog.show',compact('blog'));
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
            $blog = Blog::find($encrypt_decrypt);
            return view('admin.blog.edit',compact('blog'));
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
                'title' => 'required',
                'detail' => 'required',
            ]);


            $blog = Blog::find($encrypt_decrypt);
            $blog->title = $request->input('title');
            $blog->detail = $request->input('detail');
            if($request->hasFile('file')){
                @unlink($blog->photo);
                $filename = time().'.'.$request->file('file')->getClientOriginalExtension();
                $blog->photo = 'public/img/blog/main-blog/' . $filename;
                $request->file('file')->move(public_path('public/img/blog/main-blog'), $filename);
            }
            $blog->save();
        
            return redirect()->route('blogs.index')
                            ->with('success','Blog updated successfully');
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
            $blog = Blog::find($encrypt_decrypt);
            $blog->delete();

            return redirect()->route('blogs.index')
                            ->with('success','Blog deleted successfully');
        }
    }
}
