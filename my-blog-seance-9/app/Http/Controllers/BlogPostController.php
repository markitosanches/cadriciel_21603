<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Categorie;
use Illuminate\Http\Request;
use DB;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::all();
       // return $posts; 
       // $posts = BlogPost::select()->where("user_id", "=" ,"1")->get();
       return  view('blog.index', ['posts' => $posts]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$categorie = Categorie::all()->sortBy('name');
       
       $categorie = new Categorie;
       $categorie = $categorie->selectCategorie('DESC');
        
        return view('blog.create', ['categories' => $categorie]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($_POST);
        //echo $request->title;
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'categorie_id' => $request->categorie_id,
            'user_id'=> 1
        ]);
            
        return redirect(route('blog.show', $newPost->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
          // return $blogPost; 
        return  view('blog.show', ['blogPost' => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit', ['blogPost' => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect(route('blog.show', $blogPost->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect(route('blog.index'));
    }

    public function query(){
       
        //select * FROM blog_posts;
       // $blog = BlogPost::all();
      
       /*$blog = BlogPost::select()
       ->where('id','=', 5)
       ->orderby('title', 'DESC')
       ->get();*/

       //SELECT * FROM blog_posts WHERE id = ?
      //$blog = BlogPost::find(5);

      //AND
       /* $blog = BlogPost::select('title', 'body')
        ->where('user_id', 1)
        ->where('title', 'Abc')
        ->get();*/

    //OR
        /*$blog = BlogPost::select()
        ->where('user_id', 1)
        ->orwhere('user_id', 3)
        ->get();*/
    
    //INNER    
       /* $blog = BlogPost::select()
        ->join('users', 'user_id', '=', 'users.id')
        ->get();*/

    //OUTER
        //SELECT * FROM blog_posts
        //RIGHT OUTER JOIN users ON user_Id = users.id;
        /*$blog = BlogPost::select()
        ->rightjoin('users', 'user_id', '=', 'users.id')
        ->get();*/
    
    //aggregation
        //$blog = BlogPost::max('id');

        //$blog = BlogPost::where('user_id', 15)->count();

    //brute / raw    
        $blog = BlogPost::select(DB::raw('count(*) as blogs'), 'user_id')
        ->groupby('user_id')
        ->get();

        $blog = BlogPost::select()
        ->limit(4)
        ->get();



    //return $blog;

    $blog = BlogPost::Select()
    ->paginate(5);

    return view('blog.page', ['blogs' => $blog]);
    
        
    }
}
