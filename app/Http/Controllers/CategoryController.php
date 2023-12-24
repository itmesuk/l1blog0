<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        // $category = DB::table('categories')->get();

        // ORM        
        // $category = Category::all();
        $category = Category::orderBy('id', 'asc')->get();
        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        // $data = [
        //     'category_name' => $request->category_name
        // ];
        // DB::table('categories')->insert($data);

        // ORM
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->back();

    }

    public function edit($id)
    {
        // $category = DB::table('categories')->where('id', $id)->first();

        // ORM
        $category = Category::where('id', $id)->first();
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // $data = [
        //     'category_name' => $request->category_name
        // ];
        // DB::table('categories')->where('id', $id)->update($data);

        // ORM
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->update();

        return redirect('/category');
    }

    public function destroy($id)
    {
        // DB::table('categories')->where('id', $id)->delete();

        // ORM
        $category = Category::find($id)->delete();

        return redirect('/category');
    }
}
