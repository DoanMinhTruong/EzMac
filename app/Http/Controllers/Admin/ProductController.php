<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = NULL)
    {
        $c = Category::all();
        $cate_page = "All";

        if($slug)
            {
                $cc = Category::where('slug' , $slug)->first();
                $p = Product::where('parent_id' , $cc['id'])->get();
                $cate_page = $cc['name'];
            }
        else{
            $p = Product::all();
        }
            
        return view('admin.product' , ['categories' => $c , 'products' => $p , 'cate_page' => $cate_page]);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $product = new Product();
            $cate = Category::where('name' , $request->parent_id)->first();
            $product->parent_id = $cate->id;
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->price = $request->price;
            
    
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/products/' , $filename);
    
    
            $product->image = "images/products/" . $filename;
            if($request->description)
                $product->description = $request->description;
            $product->save();
            return redirect()->back()->with('status_success' , 'Add product Success');
    
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('status' , 'Fail to Add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $p = Product::where("slug" , $slug)->first();
        return view("admin.productdetail" , ['product' => $p , 'categories' => Category::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $p = Product::where('id' , $id)->first();
            
            $cate = Category::where('name' , $request->parent_id)->first();

            $p->parent_id = $cate->id;
            $p->name = $request->name;
            $p->slug = $request->slug;
            $p->price = $request->price;

            if($request->file('image')){
                $image = $request->file('image');
                if(File::exists($p->image)){
                    File::delete($p->image);
                }
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('images/products/' , $filename);
                $p->image = "images/products/" . $filename;
            }


            if($request->description)
                {
                    $p->description = $request->description;
                }
            // dd($p->description);
                
            $p->save();
            return redirect()->back()->with('status_success' , 'Update Success');

        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('status' , 'Fail to Add');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $p = Product::where('id' , $id)->first();
        if(File::exists($p->image)){
            File::delete($p->image);
        }
        $p->delete();
        return redirect()->back();
    }

}
