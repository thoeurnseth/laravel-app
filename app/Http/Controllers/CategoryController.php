<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CategoryController extends Controller
{
    public function Category(){
        return view('category');
    }

    //for api

    public function Category_Create(Request $request){
        $category_title = $request->category_title;
        if(!empty($category_title)){
            $category = Category::create([
                'category_title' => $category_title,
                'status' => '1'
            ]);
            if($category->save()){
                $result = [
                    'status' => 'create success',
                ];
            }
        }else{
            $result = [
                'status' => 'Please Enter Category',
            ]; 
        }
        return $result;
    }

    public function Category_Update(Request $request){
        $category = $request->category_title;
        $id = $request->id;
        if(!empty($category)){
            $updateData = Category::where('id', $id)
            ->update([
                'category_title' => $category,
            ]);
            $result = [
                'status' => 'update success',
            ];
        }else{
            $result = [
                'status' => 'Please Enter Category',
            ];
        }
        return $result;
    }

    public function Category_Delete(Request $request){
        $id = $request->id;
        if(!empty($id)){
            $updateData = Category::where('id', $id)
            ->update([
                'status' => 0,
            ]);
            $result = [
                'result' => array(
                    'code' => '200',
                    'status' => 'delete success'
                )
            ];
        }else{
            $result = [
                'result' => array(
                    'code' => '404',
                    'status' => 'Please Enter Id'
                )	
            ];
        }
        return $result;
    }

    public function List_Category(){
        $objCategory = Category::where('status', 1)->orderBy('id', 'asc')->get();
        if(count($objCategory) != 0){
            $data_json = 
                array(
                    'result' => array(
                        'code' => '200',
                        'data' => $objCategory
                    )	
                );
        }else{
            $data_json = 
                array(
                    'result' => array(
                        'code' => '404',
                        'data' => 'Not data'
                    )	
                );
        }
        return $data_json;    
    }

    //for web
    public function ListCategory(){
        $dataCategory = Category::where('status', 1)->orderBy('id', 'asc')->get();
        return view('category', ['dataCategory' =>  $dataCategory]);
    }

    public function CreateCategory(Request $request){
        $category   = $request->input('category');
        $createData = Category::create([
            'category_title' => $category,
            'status' => 1,
        ]);

        if($createData->save()){
            return redirect('category')->with('status', 'Create Success');
        }else{
            return redirect('category')->with('status', ' Create failed');
        }
    }

    public function UpdateCategory(Request $request){
        $category   = $request->input('category');
        $id         = $request->input('category_id');

        $updateData = Category::where('id', $id)
                                ->update([
                                    'category_title' => $category,
                                ]);
        if($updateData){
            return redirect('category')->with(['update-status' => 'update success']);
        }
    }

    public function DeleteCategory(Request $request){
        $id = $request->input('data_id');
        $updateData = Category::where('id', $id)
                                ->update([
                                    'status' => 0,
                                ]);
        if($updateData) {
            return redirect('category')->with(['delete-status' => 'update success']);
        } 
    }

}
