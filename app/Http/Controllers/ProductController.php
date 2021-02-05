<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('products')->get();
        return View('product.show',['products'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertproduct = new Product();
        $insertproduct->product_name = $request->input('product_name');
        $insertproduct->price = $request->input('price');
        $insertproduct->image = $request->input('image');
        $insertproduct->number = $request->input('number');

        $affected = DB::table('products')
            ->insert([
                'product_name' =>  $insertproduct->product_name,
                'price' =>  $insertproduct->price,
                'image' =>  $insertproduct->image,
                'number' => $insertproduct->number,
            ]);
        return redirect('/products')
            ->with('successuppro', 'Product created successfully .');//lưu thông báo kèm theo để hiển thị trên view
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = DB::table('products')->find($id);
        return View('introproduct.show',['product'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productedit =  DB::table('products')->where('id', $id)->first();
        return View('product.edit', ['product' => $productedit]);
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
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
			'number'=>'nullable|required',
            'product_name' =>'required',
            'price' =>'required'
        ]);
       

        if ($request->file()) {
            $productup = Product::find($id);//eloquent
            //$profile = DB::table('profiles')->find($id);
            //$profile = new Profile();
            $productup->product_name = $request->input('product_name');
            
            $productup->price = $request->input('price');
            $productup->number = $request->input('number');
        
            $fileName = $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
            $productup->image = '/storage/' . $filePath;
        // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public

        $productup->save(); //lưu
        return back()//trả về trang trước đó
            ->with('success', 'Profile has updated.')//lưu thông báo kèm theo để hiển thị trên view
            ->with('file', $fileName);
        }
        return back()//trả về trang trước đó
        ->with('fail', 'Profile has updated.');//lưu thông báo kèm theo để hiển thị trên view
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where('id',$id)->delete();
        return redirect('/products')
        ->with('deletepro', 'Product deleted  successfully .');
    }
}
