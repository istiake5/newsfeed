<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::all();
        //dd($posts);
        return view('admin.post.postlist',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['cat'] = Cat::all();

        $posts = Post::all();
        
        return view('admin.post.create',$data,compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post )
    {
        //

        $rules = [
            'title'  => 'required',
            'cat_id' => 'required',
            'contentt' => 'required',
            'tag'  => 'required',
            'status'  => 'required',
            'author'  => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
           // $post = new Post();
            $post->title = $request->title;
            $post->cat_id = $request->cat_id;
            $post->content = $request->contentt;
            $post->tag = $request->tag;
            $post->status = $request->status;
            $post->author = $request->author;
            $post->save();


            if ($request->hasFile('image')) {
                $extension = $request->image->extension();
                $fileName =$post->id.'.'.$extension;
                $request->image->storeAs('public/images', $fileName);
                $post->image = $fileName;
                $post->save();
            }


            return redirect()->back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
{
    //  $rpost = Post::where('status', 'Pin Post')->get();
    //$post= '$relatedPost';
    //  dd($rpost);

    //$latest = Post::orderBy('desc')->get();
   // dd($latest);
    //return view('layouts.sidebar')->with('latest', $latest);
    // return view('layouts.index',compact('relatedPost'));

}

    public function home()
    {
        $data = Post::with('cat')->orderBy('id','desc')->where('status','Pin Post')
            ->where('cat_id','1')->take(1)
            ->get();


        $test = Post::with('cat')->orderBy('id','desc')->where('status','Pin Post')
            ->where('cat_id','2')->take(1)
            ->get();

        $testto = Post::with('cat')->orderBy('id','desc')->where('status','Normal Post')->where('cat_id', '1')->take(4)
            ->get();

        $inter = Post::with('cat')->orderBy('id','desc')->where('status','Normal Post')
            ->where('cat_id', '2')->take(4)
            ->get();

        $sports = Post::with('cat')->orderBy('id','desc')->where('status','Pin Post')
            ->where('cat_id','3')->take(1)
            ->get();

        $sportsin = Post::with('cat')->orderBy('id','desc')->where('status','Normal Post')
            ->where('cat_id', '3')->take(4)
            ->get();


        $science = Post::with('cat')->orderBy('id','desc')->where('status','Pin Post')
            ->where('cat_id','4')->take(1)
            ->get();

        $tech = Post::with('cat')->orderBy('id','desc')->where('status','Normal Post')
            ->where('cat_id', '4')->take(4)
            ->get();
          return view('layouts.index',compact(['data','test','testto','inter','sports','sportsin','science','tech']));
    }


    public function latest()
    {
        $latest = Post::with('cat')->orderBy('id','desc')->where('status','Normal Post')->take(4)
            ->get();
    return view ('layouts.sidebar',compact('latest'));
    }


    public function slider()
    {
        $latest = Post::with('cat')->orderBy('id','desc')->where('status','Normal Post')->take(4)
            ->get();
        return view ('layouts.slider',compact('latest'));
    }



    public function single($id, Post $post){
        if (Session::get('id') !== $id) {
            Post::where('id', $id)->increment('count');
            Session::put('id', $id);
        }
        $data = Post::find($id);


      //  $newskey = 'news_'. $post->id;
        //if (!Session::has($newskey)){
           // $post->increment('count');
           // Session::put($newskey,1);
      //  }
        $testto = Post::with('cat')->orderBy('id','desc')->where('status','Normal Post')->where('cat_id', $id)->take(3)
            ->get();

        return view('layouts.singlepage',compact(['data','testto']));
    }
 //public function side()
  // {
       // Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->get();
      // $sidebar = Post::where('cat_id', $post->cat_id)->where('id', '!=', $post->id)->get();
    //$relatedPost = Post::where('cat_id', $post->cat_id)->where('id', '!=', $post->id)->get();
      // dd($sidebar);
    //   $testto = Post::with('cat')->orderBy('id','desc')->where('status','Normal Post')->where('cat_id', '1')
    //   ->get();
       //dd($data);
     //  return view('layouts.index',compact(['testto']));
  // }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $data['categories'] = Cat::all();
        $data['post'] = $post;
        $posts = Post::all();
        return view('admin.post.editpost', $data,compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $rules = [
            'title'  => 'required',
            'cat_id' => 'required',
            'contentt' => 'required',
            'tag' => 'required',
            'status' => 'required',
            'author' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $post->title = $request->title;
            $post->cat_id = $request->cat_id;
            $post->content = $request->contentt;
            $post->tag = $request->tag;
            $post->status = $request->status;
            $post->author = $request->author;
            $post->save();

            if ($request->hasFile('image')) {
                $extension = $request->image->extension();
                $fileName =$post->id.'.'.$extension;
                $request->image->storeAs('public/images', $fileName);
                $post->image = $fileName;
                $post->save();
            }
            return redirect('post');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
