<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function Allcat(){
//      $categories = Category::all();
//        $categories = Category::latest()->get(); //sắp xếp theo dữ liệu đc thêm mới nhất

        //cách 2, query builder
        $categories = DB::table('categories')->latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
            [
                'category_name.required' => 'Pls input Category Name',
                'category_name.max' => 'Category Name chỉ được dài 255 ký tự',
                'category_name.unique' => 'Category Name already exist'

            ]);

        //cách 1 khi muốn insert dữ liệu, cách này phải chèn created_at thủ công
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category Inserted');

        //cách 2 khi muốn insert, cách này crated_at sẽ tự động chèn vào db (rcmed)
//        $category                = new Category;
//        $category->category_name = $request->category_name;
//        $category->user_id       = Auth::user()->id;
//        $category->save();

        //cách 3, dùng query builder
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->insert($data);

        return Redirect()->back()->with('success','Category Inserted');

    }
}
