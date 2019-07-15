<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Berhasil Ditampilkan.'
        ];
        return response()->json($response, 200);
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
        $data = new Kategori();
        $kategori->judul = $request->judul;
        $kategori->slug = str_slug($request->judul, '-');
        $kategori->konten = $request->konten;
        $kategori->id_user = Auth::user()->id;
        $kategori->id_kategori = $request->id_kategori;
         // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() 
            .'/assets/img/Kategori';
            $filename = str_random(6) . '_'
            . $file->getClientOriginalName();
            $upload = $file->move(
                $path,$filename
            );
            $Kategori->foto = $filename;
        }
        $data->save();
        $response =[
            "success" => true,
            "data" => $data,
            "message" => 'Berhasil ditambah.'
        ];
        return response()->json($response, 200);
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
        $response = [
            'succcess' => true,
            'data' => $data,
            'message' => 'Berhasil ditambah.'
        ];
         return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kategori::find($id)->delete($id);
        $response = [
            'succcess' => true,
            'data' => $data,
            'message' => 'Berhasil dihapus.'
        ];
        return response()->json($response, 200);
    }
}
