<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artikel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        if (!$artikel) {
            $response = [
                'success' => false,
                'data' => 'Empety',
                'message' => 'artikel Tidak ditemukan.'
            ];
            return response()->json($response,404);
        }

        $response = [
             'success' => false,
             'data' => 'Empety',
             'message' => 'Berhasil'
        ];

        return response()->json($response,200);
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
        // 1. tampung semua inputan ke $input;
        $input = $request->all();

        // 2. buat validasi di tampung ke $validor
        $validor = Validator::make($input,[
            'nama' => 'required|min:15'
        ]);

        // 3. Chek validasi
        if ($validator->fail()) {
            $response = [
                'success' => false,
                'data' => 'Validation Eror.',
                'message' => $validator->erors()
            ];
            return response()->json($response, 500);
        }

        // 4. buat fungsi untuk menghandle semua inputan ->
        // dimasukan ke table
        $artikel = Artikel::create($input);

        // 5. menampilkan response
        $response = [
            'success' => true,
            'data' => '$artikel',
            'message' => 'artikel berhasil ditemukan'
        ];

        // 6. tampilkan hasil
        return response()->json($response, 200);

        // 7. menampilkan eror di heroku :
        // heroku config::set APP_DEBUG=true
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::find($id);
        if(!$artikel) {
            $response = [
            'success' => false,
            'data' => 'Empety',
            'message' => 'artikel Tidak ditemukan.'
        ];
        return response()->json($response, 400);
    }

    $response = [
        'success' => true,
        'data' => '$artikel',
        'message' => 'Berhasil'
    ];
    return response()->json($response, 200);
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
        $artikel = Artikel::find($id);
        $input = $request->all();

        if (!$artikel) {
            $response = [
                'success' => false,
                'data' => 'Empety',
                'message' => 'artikel Tidak ditemukan.'
            ];
            return response()->json($response, 400);
        }
        $validor = Validator::make($input,[
            'nama' => 'required|min:15'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'validation eror',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }

        $artikel->nama = $input['nama'];
        $artikel->save();

        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'artikel berhasil diupdate'
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
        $artikel = Artikel::find($id);
        if(!$artikel) {
            $response = [
                'success' => false,
                'data' => 'Gagal menghapus.',
                'message' => 'artikel tidak ditemukan'
            ];
            return response()->json($response, 400);
        }

        $artikel->delete();
        $response = [
            'success' => true,
            'data' => $artikel,
            'message' => 'artikel berhasil dihapus'
        ];

        return response()->json($response, 200);
    }
}
