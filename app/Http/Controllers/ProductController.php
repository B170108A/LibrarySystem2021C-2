<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use Session;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $categoryID = Category::all();
        return view('addProduct',compact('categoryID'));
    }
    
    public function add(){
        $r=request();
        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();

        $addProduct=Product::create([
            'name'=>$r->productName,
            'description'=>$r->productDescription,
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'CategoryID'=>$r->CategoryID,
            'image'=>$imageName,
        ]);
        Session::flash('success',"Product create successfully!");
        return redirect()->route('viewProduct');
    }

    public function view(){
        //$viewProduct=Product::all();
        $viewProduct=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->select('products.*','categories.name as catName')
        ->get();
        return view('showProduct')->with('products',$viewProduct);
    }

    public function edit($id){
        $products=Product::all()->where('id',$id);
        Return view('editProduct')->with('products',$products)
                                  ->with('categoryID',Category::all());
    }

    public function update(){
        $r=request();
        $products=Product::find($r->id);
        if($r->file('productImage')!=''){
        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        $products->image=$imageName;
        }

        $products->name=$r->productName;
        $products->description=$r->productDescription;
        $products->quantity=$r->productQuantity;
        $products->price=$r->productPrice;
        $products->CategoryID=$r->CategoryID;
        $products->save();

        Session::flash('success',"Product update successfully!");
        return redirect()->route('viewProduct');
    }

    public function delete($id){
        $deleteProduct=Product::find($id);
        $deleteProduct->delete();
        Session::flash('success',"Product delete successfully!");
        return redirect()->route('viewProduct');
    }

    public function productdetail($id){
        $products=Product::all()->where('id',$id);
        return view('productDetail')->with('products',$products);
    }

    public function viewProduct(){
        (new CartController)->cartItem();
        $products=Product::all;
        return view('viewProducts')->with('products',$products);
    }

    public function searchProduct(){
        $r=request();
        $keyword=$r->keyword;
        $products=DB::table('products')->where('name','like','%'.$keyword.'%')->get();
        return view('viewProducts')->with('products',$products);
    }

    public function phone(){
        $products=DB::table('products')->where('CategoryID','=','1')->get();
        return view('viewProducts')->with('products',$products);
    }

    public function computer(){
        $products=DB::table('products')->where('CategoryID','=','2')->orWhere('CategoryID','=','3')->get();
        return view('viewProducts')->with('products',$products);
    }

}

