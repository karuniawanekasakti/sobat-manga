<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Buku;
use File;
use Image;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas =  5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() -1 );
        $jumlah = $no;
        return view('buku.index',compact('jumlah_buku','data_buku','no','jumlah'));
    }

    public function search(Request $request)
    {
        $batas =  5;
        $cari = $request->kata;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::where('judul','like','%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() -1 );
        $jumlah = $no;
        return view('buku.search',compact('jumlah_buku','data_buku','no','jumlah','cari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'judul'        => 'required|string',
            'penulis'      => 'required|string|max:30',
            'deskripsi'    => 'required|string|max:250',
            'link'         => 'required|url|max:250',
            'foto'         => 'image|file|mimes:jpeg,jpg,png',
            'tgl_terbit'   => 'required|date'
        ]);
        $buku = new Buku;
        $buku->judul =$request->judul;
        $buku->penulis =$request->penulis;
        $buku->deskripsi =$request->deskripsi;
        $buku->link =$request->link;
        $buku->tgl_terbit =$request->tgl_terbit;
        $buku->buku_seo = Str::slug($request->judul);

        $foto=$request->foto;
        $namafile=time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/',$namafile);

        $buku ->foto=$namafile;
        $buku->save();

        Alert::success('Sukses !', 'Buku Berhasil Ditambahkan !');

        return redirect('/buku');
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
        $data_buku = Buku::where('id',$id)->get();
        return view('buku.edit',compact('data_buku'));
        

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
            'judul'        => 'required|string',
            'penulis'      => 'required|string|max:30',
            'deskripsi'    => 'required|string|max:250',
            'link'         => 'required|url|max:250',
            'foto'         => 'image|file|mimes:jpeg,jpg,png',
            'tgl_terbit'   => 'required|date'
        ]);

        $buku = Buku::find($id);
        $buku->judul =$request->judul;
        $buku->penulis =$request->penulis;
        $buku->deskripsi =$request->deskripsi;
        $buku->link =$request->link;
        $buku->foto = $request -> foto;
        $buku->tgl_terbit =$request->tgl_terbit;

        if($buku->foto){
            $namafile = $buku->foto->getClientOriginalExtension();
            $foto['foto'] = $namafile; // Update field photo
    
            $proses = $buku->foto->move('thumb/', $namafile);

        }

        // Image::make($foto)->resize(200,150)->save('thumb/'.$namafile)->getRealPath();
        $buku->foto = $namafile;

        $buku->update();
        Alert::success('Sukses !', 'Buku Berhasil Di Update !');

        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id)->firstOrFail();
        $buku->delete();
        Alert::success('Sukses !', 'Buku Berhasil Dihapus !');
        return redirect('/buku');
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan','Anda yakin untuk menghapus data ?')
        ->showConfirmButton('<a href="/buku/delete/'.$id.'" class="text-white" style="text-decoration:none">Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/buku');
    }

    
}
