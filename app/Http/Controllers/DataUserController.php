<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $batas =  5;
        $jumlah_user = User::count();
        $data_user = User::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($data_user->currentPage() -1 );
        $jumlah = $no;
        return view('user.index',compact('jumlah_user','data_user','no','jumlah'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_user = User::where('id',$id)->get();
        return view('user.edit',compact('data_user'));
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
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email|max:255',
            'is_admin' => 'numeric|min:0|max:1'
            
        ]);

        $user = User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->is_admin =$request->is_admin;
        $user->update();
        Alert::success('Sukses !', 'Buku Berhasil Di Update !');

        return redirect('/data-user');


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::success('Sukses !', 'User Berhasil Dihapus !');
        return back();
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan','Anda yakin untuk menghapus user ini ?')
        ->showConfirmButton('<a href="/data-user/delete/'.$id.'" class="text-white" style="text-decoration:none">Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/data-user');
    }
}
