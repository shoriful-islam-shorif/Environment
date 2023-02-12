<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\post;
use App\Models\comment;
use Auth;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['home','blogPost','create','storePost','singlePostview','DeletePost','editPost','UpdatePost']);
    }
    public function showPost(){
        $posts=post::join('users','posts.user_id','users.id')
       ->get();
        
        return view('index',compact('posts'));
    }

    public function create(){
         $posts=post::get();
        return view('post.createPost');
    }
/** 
    public function storePost(Request $Request){
        $validated=$Request->validate([
            'title'=>'required | max:255',
            'discripsion'=>'required',
            'user_id'=>''
            
        ]);

        $data= array(
            'title'=>$Request->title,
            'discripsion'=>$Request->discripsion,
            'user_id'=>$Request->user_id,
        );

        post::insert($data)->where();
        return redirect()->back()->with('success', 'successfully Updated!');
    }

    */
 public function storePost(Request $request)
    {
        

        $posts = new post;
        $posts->user_id = auth()->user()->id;
        $posts->title = $request->title;
        $posts->discripsion = $request->discripsion;

        

        $posts->save();
        return redirect()->to('/home');
    
    }

    public function singlePostview($id){
        //$posts=post::where('id',$id)->get()->first();
       
        $posts=post::join('users','users.id','=','posts.user_id')
        ->select('posts.*','users.name as name')
        ->where ('posts.id',$id)
        ->get();


        $comments=comment::join('users','users.id','=','comments.user_id')
        ->select('comments.*','users.name as name')
        ->where('comments.post_id',$id)
        ->get();
        
        return view('post.singlePost',compact('posts','comments'));
    }

/*delete*/
    public function DeletePost($id){
       $Posts=post::where('id',$id)->delete();
      
        return redirect()->back()->with('success', 'successfully deleded!');
    }
    
    /*edit */
     public function editPost($id){
        $posts=json_decode(post::find($id));
        //$Posts=post::where('id',$id)->get($id);
         //dd($posts);
        return view('post.editPost',compact('posts'));
    }

    /*update post */
    public function UpdatePost( Request $request, $id){
        $request->validate([
            'title' => 'required ',
            'discripsion'=>'required',
        ]);
        $data = array(
            'title' => $request->title,
             'discripsion' => $request->discripsion,
        );
        $post=post::where('id',$id)->update($data);
        return redirect()->to('/home');
    
    }

    /*COMMEMT*/
    public function comment( Request $request, $id){
        $request->validate([
           
            'comment'=>'required',
        ]);
        $data = array(
            'post_id'=>$id,
            'user_id'=>auth()->user()->id,
            'comment' => $request->comment,
            
        );
        $comment=comment::create($data);
       return redirect()->back()->with('success', 'successfully deleded!');
    
    }

    /*show comment */
   
}