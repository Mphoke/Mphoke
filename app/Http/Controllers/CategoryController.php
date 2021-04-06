<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    //category function that return the view for post

    public function category()
    {

        return view('categories.category');
    }

    // post function ends here


    // category post function

    public function addCategory(Request $request)
    {

            // Validating the form

            $this->validate($request,[
            'category'=>'required'


            ]);
        $category = new Category;
        $category ->category=$request->input('category');
        $category->save();
        return redirect('/category')->with('response','Category Added Successfully');
    }


    // function ends here

}
