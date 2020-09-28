<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\Post;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('id','DESC')->paginate(6);
        return view('public.index',compact('products'))->with('i', ($request->input('page', 1) - 1) * 6);
    }

    public function blog(Request $request){
        $blogs = Blog::orderBy('id','DESC')->paginate(6);
        return view('public.blog',compact('blogs'))->with('i', ($request->input('page', 1) - 1) * 6);
    }

    public function blog_detail(Request $request){
        $BlogSQL = "SELECT * FROM blogs WHERE id = $request->item_id";
        $blog = DB::select($BlogSQL)[0];
        return view('public.blog_detail',compact('blog'));
    }

    public function product_detail(Request $request){
        $ProductSQL = "SELECT * FROM products WHERE id = $request->item_id";
        $product = DB::select($ProductSQL)[0];
        $posts = Post::where('product_id', $request->item_id)->get();
        return view('public.product_detail',compact('product','posts'));
    }

    public function profile(Request $request)
    {
        return view('public.layout.profile');
    }

    public function get_profile(Request $request)
    {
        $user = User::find($request->user_id);
        $response = array(
            'data' => $user
        );
        return response()->json($response);
    }

    public function comment(Request $request){
        $post = new Post;
        $post -> user_id = Auth::user()->id;
        $post -> product_id = $request -> product_id;
        $post -> comment = $request -> message;
        $post -> save();

        return redirect()->back();
    }
}
