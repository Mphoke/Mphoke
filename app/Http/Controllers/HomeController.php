<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\User;
use App\Post;
use Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Validation by checking if the user has a
        // profile already else load the default profile
        
        $user_id=Auth::user()->id;
        $profile =DB::table('users')
        ->join('profiles','users.id',
        '=','profiles.user_id')
        ->select('users.*','profiles.*')
        ->where(['profiles.user_id'=>$user_id])
        ->first();

       $posts=Post::paginate(3);
  
        return view('home',['profile'=>$profile,'posts'=>$posts]);
    }
}
