<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::all();
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
        $data = new Artikel();
        $artikel->judul = $request->judul;
        $artikel->slug = str_slug($request->judul, '-');
        $artikel->konten = $request->konten;
        $artikel->id_user = Auth::user()->id;
        $artikel->id_kategori = $request->id_kategori;
         // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() 
            .'/assets/img/artikel';
            $filename = str_random(6) . '_'
            . $file->getClientOriginalName();
            $upload = $file->move(
                $path,$filename
            );
            $artikel->foto = $filename;
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
        $data = Artikel::find($id)->delete($id);
        $response = [
            'succcess' => true,
            'data' => $data,
            'message' => 'Berhasil dihapus.'
        ];
        return response()->json($response, 200);
    }
}
