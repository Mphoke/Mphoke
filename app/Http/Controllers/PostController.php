<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;
use App\Like;
use App\Dislikes;
use Auth;
use App\Comment;
class PostController extends Controller
{
    //post function that return the view for post

    public function post()
    {

        $categories = Category::all();
        $posts = Post::all();
        return view('posts.post',['categories' =>$categories]);
    }


    // Edit function

    public function view($post_id)
    {
           
        $posts=Post::where('id','=',$post_id)->get();
        $likePost = Post::find($post_id);
        $likeCtr =Like::where(['post_id'=>$likePost->id])->count();
        $dislikeCtr =Dislikes::where(['post_id'=>$likePost->id])->count();

        $categories = Category::all();

        $comments=DB::table('users')
        ->join('comments','users.id','=','comments.user_id')
        ->join('posts','comments.post_id','=','posts.id')
        ->select('users.name','comments.*')
        ->where(['posts.id'=>$post_id])
        ->get();




        return view('posts.view',['posts'=>$posts,'categories'=>$categories,'likeCtr'=>$likeCtr,'dislikeCtr'=>$dislikeCtr,
        'comments'=>$comments]);

    }

    public function edit($post_id)
    {
            
        $categories=Category::all();
        $posts=Post::find($post_id);
        $category=Category::find($posts->category_id);

        return view('posts.edit',['categories'=>$categories
        ,'posts'=>$posts,'category'=>$category]);

    }

    public function editPost(Request $request,$post_id)
    {
        // Edit post
        $this->validate($request,[
            'post_title'=>'required',
            'post_body'=>'required',
            'category_id'=>'required',
            'post_image'=>'required',


        ]);

        $posts = new Post;
        $posts->post_title = $request->input('post_title');
        $posts->user_id = Auth::user()->id;
        $posts->post_body = $request->input('post_body');
        $posts->category_id = $request->input('category_id');
       

            if(Input::hasFile('post_image'))
            {
                $file= Input::file('post_image');
                $file->move(public_path().'/posts/',$file->
                getClientOriginalName());
                $url= URL::to("/") .'/posts/'.$file->
                getClientOriginalName();

               
            }

        $posts->post_image = $url;

            $data =array(

                'post_title'=>$posts->post_title,
                'user_id'=>$posts->user_id,
                'post_body'=>$posts->post_body,
                'category_id'=>$posts->category_id,
                'post_image'=>$posts->post_image



            );



            Post::where('id',$post_id)
            ->update($data);
        $posts->update();
        return redirect('/home')->with('response','Post updated successfully');



        // end edit

    }


    public function addPost(Request $request)
    {

            $this->validate($request,[
                'post_title'=>'required',
                'post_body'=>'required',
                'category_id'=>'required',
                'post_image'=>'required',


            ]);

            $posts = new Post;
            $posts->post_title = $request->input('post_title');
            $posts->user_id = Auth::user()->id;
            $posts->post_body = $request->input('post_body');
            $posts->category_id = $request->input('category_id');
           
    
                if(Input::hasFile('post_image'))
                {
                    $file= Input::file('post_image');
                    $file->move(public_path().'/posts/',$file->
                    getClientOriginalName());
                    $url= URL::to("/") .'/posts/'.$file->
                    getClientOriginalName();
    
                   
                }
    
            $posts->post_image = $url;
            $posts->save();
            return redirect('/home')->with('response','Post successfully uploaded');
    




            
    }


    // Delete post function

    public function deletePost($post_id)
    {

        Post::where('id',$post_id)
        ->delete();

        return redirect('/home')->with('response','Post deleted successfully');


    }

// post category function

public function category($cat_id)
{

    $categories= Category::all();
    $posts=DB::table('posts')
    ->join('categories','posts.category_id','=','categories.id')
    ->select('posts.*','categories.*')
    ->where(['categories.id'=>$cat_id])
    ->get();
    return view('categories.categoriesposts',['categories'=>$categories,'posts'=>$posts]);

}

//Like function

public function like($id)
{



    $loggedin_user=Auth::user()->id;
    $like_user=Like::where(['user_id'=>$loggedin_user,'post_id'=>$id])->first();
    if(empty($like_user->user_id))
    {
        $user_id=Auth::user()->id;
        $email=Auth::user()->email;
        $post_id=$id;
        $like = new Like;
        $like->user_id=$user_id;
        $like->email=$email;
        $like->post_id=$post_id;
        $like->save();

        return redirect("/view/{$id}");


    }else{
        return redirect("/view/{$id}");
    }


}


public function dislike($id)
{

    $loggedin_user=Auth::user()->id;
    $like_user=Dislikes::where(['user_id'=>$loggedin_user,'post_id'=>$id])->first();
    if(empty($like_user->user_id))
    {
        $user_id=Auth::user()->id;
        $email=Auth::user()->email;
        $post_id=$id;
        $like = new Dislikes;
        $like->user_id=$user_id;
        $like->email=$email;
        $like->post_id=$post_id;
        $like->save();

        return redirect("/view/{$id}");


    }else{
        return redirect("/view/{$id}");
    }

}


// Comment method

public function comment(Request $request,$post_id)
{

    $this->validate($request,[
        'comment'=>'required',
       
    ]);

    $comment=new Comment;
    $comment->user_id=Auth::user()->id;
    $comment->post_id= $post_id;
    $comment->comment=$request->input('comment');
    $comment->save();
    return redirect("/view/{$post_id}")->with('response','You have commented');
    
    
    
   

}


}
