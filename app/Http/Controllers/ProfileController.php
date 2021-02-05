<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class ProfileController extends Controller
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
        return View('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertuser = new Profile();
        $insertuser->full_name = $request->input('full_name');
        $insertuser->address = $request->input('address');
        $insertuser->birthday = $request->input('birthday');
        $insertuser->avatar = $request->input('avatar');
        $insertuser->user_id = $request->input('user_id');
        $insertuser->gender = $request->input('gender');
        $affected = DB::table('profiles')
            ->insert([
                'full_name' =>  $insertuser->full_name,
                'address' =>  $insertuser->address,
                'birthday' =>  $insertuser->birthday,
                'gender' => $insertuser->gender,
                'avatar' => $insertuser->avatar,
                'user_id' => $insertuser->user_id
            ]);
        return redirect('/users')
        ->with('successpro', 'Profile has created.');//lưu thông báo kèm theo để hiển thị trên view

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = DB::table('users')->find($id);
        // return View('profile.show',['user'=>$user]);

        $profile =  DB::table('profiles')->where('user_id', $id)->first();

        return View('profile.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile =  DB::table('profiles')->where('id', $id)->first();
        return View('profile.edit', ['profile' => $profile]);
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
            'avatar' => 'required|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
			'birthday'=>'nullable|date',
            'full_name' =>'required',
            'gender' =>'required',
            'address' =>'required'
        ]);
       

        if ($request->file()) {
            $profile = Profile::find($id);//eloquent
            //$profile = DB::table('profiles')->find($id);
            //$profile = new Profile();
            $profile->full_name = $request->input('full_name');
            $profile->address = $request->input('address');
            $profile->birthday = $request->input('birthday');
            $profile->gender = $request->input('gender');
            $fileName = $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
            $profile->avatar = '/storage/' . $filePath;
        // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public

        $profile->save(); //lưu
        return back()//trả về trang trước đó
            ->with('success', 'Profile has updated.')//lưu thông báo kèm theo để hiển thị trên view
            ->with('file', $fileName);
        }
        return back()//trả về trang trước đó
        ->with('fail', 'Profile has updated.');//lưu thông báo kèm theo để hiển thị trên view
        
        // $affected = DB::table('profiles')
        //     ->where('id', $id)
        //     ->update([
        //         'full_name' =>  $profile->full_name,
        //         'address' =>  $profile->address,
        //         'birthday' =>  $profile->birthday,
        //         'gender' => $profile->gender
        //     ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = DB::table('profiles')->where('id', $id);

        // if ($post != null) {
        //     $post->delete();
        // }
        // return redirect('/users');

        // $invoice = DB::table('profiles')->find($id);
        // $invoice->delete();
        // $deleteprofile = DB::table('profiles')->where('id','=', $id)->delete();
        // $profile = DB::table('profiles')->where('id',$id)->delete();
        // if ($profile > 0) ;
        // return false;
        // return redirect('/users');
    }
}
