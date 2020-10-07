<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function index(Posts $posts){
    	$category_widget = Category::all();
    	$tags_widget = Tags::all();
    	$data = $posts->latest()->take(6)->get();

        $post = Posts::join('category', 'posts.category_id', '=', 'category.id')
                ->select('posts.*', 'category.name as categoy_name','category.id as category_id')
                ->get();
        //aldi
    	return view('blog', compact('data','category_widget','tags_widget','post'));
    }

    public function isi_post($slug){
    	$category_widget = Category::all();
    	$tags_widget = Tags::all();
        $fpost = DB::table('posts')->find(6);
    	$data = Posts::where('slug', $slug)->get();

    	return view('blog.isi_post', compact('data','category_widget','tags_widget','fpost'));
    }

    public function list_blog(){
    	$category_widget = Category::all();
        $fpost = DB::table('posts')->find(6);
    	$tags_widget = Tags::all();
    	$data = Posts::latest()->paginate(6);

    	return view('blog.list_post', compact('data','category_widget','tags_widget','fpost'));
    }

    public function list_category(category $category){
    	$category_widget = Category::all();
        $fpost = DB::table('posts')->find(6);
    	$tags_widget = Tags::all();
    	$data = $category->posts()->paginate();

    	return view('blog.list_post', compact('data','category_widget','tags_widget','fpost'));
    }

    public function list_tags(tags $tags){
    	$category_widget = Category::all();
    	$tags_widget = Tags::all();
        $fpost = DB::table('posts')->find(6);
    	$data = $tags->posts()->paginate();

    	return view('blog.list_post', compact('data','category_widget','tags_widget','fpost'));
    }

    public function cari(request $request){
    	$category_widget = Category::all();
    	$tags_widget = Tags::all();
        $fpost = DB::table('posts')->find(6);
    	$data = Posts::where('judul', $request->cari)->orWhere('judul', 'like', '%'.$request->cari.'%')->paginate(6);

    	return view('blog.list_post', compact('data','category_widget','tags_widget','fpost'));
    }

    public function about(){
        $category_widget = Category::all();
        $tags_widget = Tags::all();

        return view('blog.about', compact('category_widget','tags_widget'));
    }

    public function contact(){
        $category_widget = Category::all();
        $tags_widget = Tags::all();

        return view('blog.contact', compact('category_widget','tags_widget'));
    }

    public function sendemail(Request $request){
        Mail::send('blog.email',[
            'name' => $request->name,
            'email' => $request->email,
            'email_body' => $request->email_body
        ], function($mail) use($request){
            $mail->from(env('MAIL_FROM_ADDRESS'), $request->name);
            $mail->to("aldiansyahrpl2@gmail.com")->subject('Contact Us Message');
        });

        return "Message Has Benn Sent SuccessFull!";
    }
}
