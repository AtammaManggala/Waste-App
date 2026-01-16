<?php

namespace App\Http\Controllers;

use App\Models\countTransactions;
use App\Models\point;
use App\Models\dailyTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountTransactionscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = Auth::id();
        // rule point
        $pointRule = point::first();
        $pointPerBotol = $pointRule ? $pointRule->point : 0;

        // hitung dari daily 
        $queryDaily = dailyTransactions::where('user_id', $user_id);
        $totalBotolDaily = (clone $queryDaily)->sum('jml_botol');
        $totaPoinDaily = $totalBotolDaily * $pointPerBotol;

        // simpan data ke count_transaction
        $count = countTransactions::firstOrCreate(
            ['user_id' => $user_id],
            [
                'jml_botol' => 0,
                'jml_point' => 0
            ]
        );

        // ⛔ hanya update jika count_transaction masih kosong
        if ($count->jml_botol == 0 && $count->jml_point == 0) {
            $count->update([
                'jml_botol' => $totalBotolDaily,
                'jml_point' => $totaPoinDaily
            ]);
        }

        // view
        $jml_botol = $count->jml_botol;
        $jml_point = $count->jml_point;


        // input tanggal
        $startDate = $request->start_date;
        $endDate   = $request->end_date;

       
        $count = countTransactions::where('user_id', $user_id)->first();
        $jml_botol = $count->jml_botol ?? 0;
        $jml_point  = $count->jml_point ?? 0;


        // QUERY DASAR (WAJIB ADA)
        $query = dailyTransactions::where('user_id', $user_id);
        // FILTER TANGGAL
        if ($startDate && $endDate) {
            $query->whereBetween('scan_date', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->whereDate('scan_date', $startDate);
        }

        // data tabel
        $data = $query
            ->orderBy('scan_date', 'desc')
            ->orderBy('scan_time', 'desc')
            ->get();

        return view('pengguna.countTransaction.index', compact(
            'data',
            'jml_botol',
            'jml_point',
            'startDate',
            'endDate'
        ));

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
