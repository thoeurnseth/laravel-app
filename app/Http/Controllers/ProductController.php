<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{

    public function Product(){
        return view('product');
    }
    // for api
    public function Product_Create(Request $request){
        $category_id    = $request->category_id;
        $price          = $request->price;
        $product_name   = $request->product_name;
        if(!empty( $product_name )){
                $product_create = Product::create([
                    'product_name'  => $product_name,
                    'price'         => $price,
                    'category_id'   => $category_id,
                    'status'        => '1'
                ]);
                if($product_create->save()){
                    $result = [
                        'status' => 'create success',
                    ];
                } 
        }else{
            $result = [
                'status' => false
            ];
        }
        return $result;
    }

    public function Product_Update(Request $request){
        $id             = $request->id;
        $category_id    = $request->category_id;
        $product_name   = $request->product_name;
        $price          = $request->price;

        if(!empty($product_name)){
            $updateData = Product::where('id', $id)
            ->update([
                'product_name'  => $product_name,
                'price'         => $price,
                'category_id'   => $category_id,
            ]);
            $result = [
                'status' => 'update success',
            ];
        }else{
            $result = [
                'status' => 'Please Enter product_name',
            ];
        }
        return $result;
    }

    public function Product_Delete(Request $request ){
        $id = $request->product_id;
        if(!empty($id)){
            $updateData = Product::where('id', $id)
            ->update([
                'status' => 0,
            ]);
            $result = [
                'status' => 'delete success',
            ];
        }else{
            $result = [
                'status' => 'Please Enter product id',
            ];
        }
        return $result;
    }

    public function List_Product(){
        $list_product   = Product::where('status', '=', '1')->get();
            // [
            //     ['id', '=', '1'],
            //     ['status', '=', '1']
            // ]
        return $list_product;
    }

    // for web
    public function CreateProduct(){

    }
}
