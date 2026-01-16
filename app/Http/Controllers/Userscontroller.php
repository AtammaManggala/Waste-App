<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\point;
use Illuminate\Http\Request;

class Userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil hanya pengguna (bukan admin)
        $users = User::where('role', 'pengguna')
        ->withSum('dailyTransactions as jml_botol', 'jml_botol')
        ->with('countTransaction')
        ->get();

        $masterPoint = point::first()->point ?? 0;
        return view('admin.daftarUser.index', compact('users', 'masterPoint'));
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
        //
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
        $users = User::findOrFail($id);
        return view('admin.daftarUser.update', compact('users'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $users->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return redirect()->route('daftarUser.index')
            ->with('success', 'Data User berhasil diperbarui');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = user::findOrFail($id);
        $users->delete();
        return redirect()->route('daftarUser.index')
            ->with('success', 'Data User berhasil dihapus');
        //
    }
}
