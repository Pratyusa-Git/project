<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $parent_categories = Category::where('parent_id',0)->get();
        return view('category.categories',compact('parent_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('category.add_category')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $this->validate(request(),[
            'category' => 'required',
            'parent' => 'bail|required|integer',
        ]);
        $category = new Category;
        $category->category = $request->category;
        $category->parent_id = $request->parent;
        $category->save();
        return redirect()->route('category_view');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        //
        $category_id = base64_decode($category);
        $categories = Category::find($category_id);
        return view('category.edit')->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validate = $this->validate(request(),[
            'category' => 'required',
        ]);
        Category::where('id',$request['category_id'])->update(['category'=>$request['category']]);
        return redirect()->route('category_view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        //
        $category_id = base64_decode($category);
        $category = Category::find($category_id);
        Category::where('parent_id',$category_id)->update(['parent_id'=>$category['parent_id']]);
        Product::where('category_id',$category_id)->update(['category_id'=>$category['parent_id']]);
        $category->delete();
        return redirect()->route('category_view');
    }
}
