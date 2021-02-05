<?php

namespace App\Http\Controllers;

use App\Models\introproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class IntroproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $introproduct =  DB::table('introproducts')->where('product_id', $id)->first();

        return View('introproduct.show', ['introproduct' => $introproduct]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productedit =  DB::table('introproducts')->where('product_id', $id)->first();
        return View('introproduct.edit', ['introproduct' => $productedit]);
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
            'detail' =>'required',
            'price' =>'required'
        ]);
       

        if ($request->file()) {
            $productup = introproduct::find($id);//eloquent
            //$profile = DB::table('profiles')->find($id);
            //$profile = new Profile();
            $productup->product_name = $request->input('product_name');
            $productup->detail = $request->input('detail');
            $productup->price = $request->input('price');
            $productup->number = $request->input('number');
            $productup->product_id = $request->input('product_id');
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
        //
    }
}
