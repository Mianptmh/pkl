<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::all();
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
        $data = new Tag();
        $tag->judul = $request->judul;
        $tag->slug = str_slug($request->judul, '-');
        $tag->konten = $request->konten;
        $tag->id_user = Auth::user()->id;
        $tag->id_kategori = $request->id_kategori;
         // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() 
            .'/assets/img/Tag';
            $filename = str_random(6) . '_'
            . $file->getClientOriginalName();
            $upload = $file->move(
                $path,$filename
            );
            $Tag->foto = $filename;
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
        $data = Tag::find($id)->delete($id);
        $response = [
            'succcess' => true,
            'data' => $data,
            'message' => 'Berhasil dihapus.'
        ];
        return response()->json($response, 200);
    }
}
