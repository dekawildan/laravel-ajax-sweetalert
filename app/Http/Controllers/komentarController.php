<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\komentar;

class komentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komentar=komentar::all();
        return view('komentar', compact('komentar'));
    }

    public function komentar()
    {
        $komentar=komentar::latest()->limit(1)->get();
        return response()->json($komentar);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(empty($request->nama) || empty($request->email) || empty($request->komentar)){
            return redirect()->back();
        } else {
            komentar::create($request->all());
            return response()->json(['status' => 'success']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
