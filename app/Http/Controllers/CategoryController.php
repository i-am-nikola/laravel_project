<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
	public function getList()
	{
		$categories = Category::select('id', 'name', 'parent_id')->orderBy('id', 'DESC')->get()->toArray();
		return view('admin.category.list', compact('categories'));
	}

	public function getAdd()
	{
		$parent = Category::select('id', 'name', 'parent_id')->get()->toArray();
		return view('admin.category.add', compact('parent'));
	}

	public function postAdd(CategoryRequest $request)
	{
		$category = new Category;
		$category->name 				= $request->name;
		$category->alias 				= convertToEn($request->name);
		$category->order 				= $request->order;
		$category->parent_id 		= $request->parent_id;
		$category->keyword 			= $request->keyword;
		$category->description 	= $request->description;
		$category->save();
		return redirect()->route('admin.cate.getList')
										 ->with(['flash_message' => 'Success! Complete add category','flash_level' => 'success']);
	}

	public function getDelete($id)
	{
		$parent = Category::where('parent_id', $id)->count();
		if($parent == 0){
			$category = Category::find($id);
			$category->delete($id);
			return redirect()->route('admin.cate.getList')
											->with(['flash_message' => 'Success! Complete delete category','flash_level' => 'success']);
		}else{
			return redirect()->route('admin.cate.getList')
											 ->with(['flash_message' => 'Sorry! Can not this category','flash_level' => 'warning']);;
		}
		
	}

	public function getEdit()
	{
		
	}

	public function postEdit()
	{
		
	}
}
