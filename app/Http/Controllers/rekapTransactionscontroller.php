<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dailyTransactions;
use App\Models\point;
use App\Models\User;

class rekapTransactionscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // filter input
        $user_id = $request->user_id;
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        
        //rule point
        $pointRule = Point::first();
        $pointPerBotol = $pointRule ? $pointRule->point : 0;

        // query
        $query = dailyTransactions::query()
        ->with('user');

        // filter user
        if ($user_id){
            $query->where('user_id', $user_id);
        }
        
        // filter tanggal
        if ($startDate && $endDate){
            $query->whereBetween('scan_date', [$startDate, $endDate]);
        } elseif ($startDate){
            $query->whereDate('scan_date',$startDate);
        }

        // data tabel
        $transactions = $query
            ->orderBy('scan_date', 'desc')
            ->orderBy('scan_time', 'desc')
            ->get();

        // hitungg summary
        $totalBotol = $transactions->sum('jml_botol');
        $totalPoint = $totalBotol * $pointPerBotol;
        $totalTransaksi = $transactions->count();

        // rekap harian per user
        $rekapHarian = $transactions
            ->groupBy(function($item){
                return $item->user_id . '_' . $item->scan_date;
            })
            ->map(function($rows) use ($pointPerBotol){
                $totalBotol = $rows->sum('jml_botol');
                return[
                    'tanggal'               =>$rows->first()->scan_date,
                    'user_id'               =>$rows->first()->user_id,
                    'name'                  =>$rows->first()->user->name ?? '-',
                    'jml_botol'             =>$totalBotol,
                    'jml_transactions'      =>$rows->count(),
                    'jml_point'             =>$totalBotol * $pointPerBotol,
                ];
            });

        // list user
        $users = User::orderBy('name')->get();
            return view('admin.countTransaction.index', compact(
                'transactions',
                'rekapHarian',
                'users',
                'totalBotol',
                'totalPoint',
                'totalTransaksi',
                'pointPerBotol',
                'user_id',
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
