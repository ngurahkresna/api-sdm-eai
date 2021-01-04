<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataEmployee;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::all();
        return response()->json([
            'http status' => '200',
            'status' => 'true',
            'Message' => 'Success get all data',
            'data' => $category
        ], 200);
    }

    public function getCategoryById($id){
        $category = Category::where('category_id', $id)->get();
        if(count($category) > 0){ //mengecek apakah data kosong atau tidak
            $res['http status'] = "200";
            $res['status'] = "true";
            $res['message'] = "Success get data by id";
            $res['values'] = $category;
            return response($res);
        }
        else{
            $res['http status'] = "404";
            $res['status'] = "false";
            $res['message'] = "Data not found!";
            return response($res);
        }
    }

    public function createDataCategory(request $request){
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->category_salary = $request->category_salary;
        $category->overtime_salary = $request->overtime_salary;
        $category->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success insert new category data',
        ], 201);

    }

    public function updateDataCategory(request $request, $id){
        $category_name = $request->category_name;
        $category_desc = $request->category_description;
        $category_salary = $request->category_salary;
        $category_overtime = $request->overtime_salary;

        $category = Category::find($id);
        $category->category_name = $category_name;
        $category->category_description = $category_desc;
        $category->category_salary = $category_salary;
        $category->overtime_salary = $category_overtime;
        $category->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success update data',
        ], 201);
    }

    public function deleteDataCategory($id){
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success delete data',
        ], 201);
    }
}
