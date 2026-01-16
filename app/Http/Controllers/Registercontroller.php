<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Registercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index()
    {
        return view('register');
        //
    }

    function register(Request $request){
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'name.required'     => 'nama wajib diisi mas',
            'email.required'    => 'email wajib diisi mas',
            'email.unique'      => 'email sudah terdaftar mas',
            'password.required' => 'password wajib diisi mas',
            'password.min'      => 'password minimal 6 karakter mas',
        ]);

        // simpan user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'pengguna',
        ]);

        // langsung login setelah register (opsional tapi enak UX)
        Auth::login($user);

        return redirect('/pengguna');
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
