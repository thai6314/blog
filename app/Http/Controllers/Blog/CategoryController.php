<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showListCategory(){
        $categories = Category::all();
        return view('category.list_category',['categories'=>$categories]);
    }
    public function showAddCategoryForm(){
        return view('category.add_category');
    }
    public function addCategory(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:category|max:100',
        ]);
        Category::create($validated);
        return redirect()->route('list.category')->with(['message'=>'Add category success']);
    }
    public function showUpdateCategoryForm($category_id){
        $category = Category::where('category_id', $category_id)->first();
        return view('category.update_category',['category'=>$category]);
    }
    public function updateCategory(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:category|max:100',
        ]);
        Category::where('category_id', $request['category_id'])->update($validated);
        return redirect()->route('list.category')->with(['message'=>'Update category success']);
    }
    public function deleteCategory($category_id){
        $category = Category::find($category_id);
        if($category == null){
            return redirect()->route('list.category')->with(['message'=>'Delete failed']);
        }else{
            $category -> delete();
            return redirect()->route('list.category')->with(['message'=>'Deleted']);
        }
    }
}
