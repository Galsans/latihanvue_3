<?php

namespace App\Http\Controllers;

use App\Models\murid;
use App\Models\grade;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $murid = murid::all();
        return response()->json($murid);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kelas'=>'required',
            'grade_id'=>'required',
        ]);
        murid::create($request->all());
        return response()->json([
            'message'=>'data berhasil di simpan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(murid $murid)
    {
        //
        return $murid;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, murid $murid)
    {
        //
        $request->validate([
            'kelas'=>'required',
            'walikelas'=>'required',
        ]);
        $murid->update($request->all());
        return response()->json([
            'message'=>'data berhasil di ubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(murid $murid)
    {
        //
        $murid->delete();
        return response()->json([
            'message'=>'murid deleted'
        ]);
    }

    public function getKelas($gradeId){
        $grade = grade::where('grade_id', $gradeId)->get();
        return response()->json($grade);
    }
}
