<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Buku;
use App\Comment;

class BacabukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas =  100;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() -1 );
        $jumlah = $no;
        return view('baca.index',compact('jumlah_buku','data_buku','no','jumlah'));
    }

    public function info($id)
    {
        $data_buku = Buku::where('id',$id)->get();
        $data_comment = Comment::all();
        return view('baca.info',compact('data_buku','data_comment'));
        

    }

    public function likemanga($id)
    {
        $buku = Buku::find($id);
        $buku->increment('suka');
        return back();
    }

    public function search(Request $request)
    {
        $batas =  5;
        $cari = $request->kata;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::where('judul','like','%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() -1 );
        $jumlah = $no;
        return view('baca.search',compact('jumlah_buku','data_buku','no','jumlah','cari'));
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
        //
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
