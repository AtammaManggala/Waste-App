<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rewards;
use App\Models\Rewardtransactions;
use App\Models\User;
use Illuminate\Cache\RedisTaggedCache;

class AdminRewardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // filter history
        $user_id = $request->user_id;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // master reward
        $rewards = rewards::orderBy('created_at', 'desc')->get();

        // query history reward
        $query = Rewardtransactions::with(['user', 'reward']);

        // filer user
        if($user_id){
            $query->where('user_id', $user_id);
        }

        // filter tunggal
        if ($startDate && $endDate){
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }elseif($startDate){
            $query->whereDate('created_at', $startDate);
        }

        // data history reward
        $rewardTransactions = $query
            ->orderBy('created_at', 'desc')
            ->get();

        // summary history
        $totalRewardTransactions = $rewardTransactions->count();
        $totalPointkeluar        = $rewardTransactions->sum('point');

        // list user
        $users  = User::orderBy('name')->get();
        return view('admin.reward.index', compact(
            'rewards',
            'rewardTransactions',
            'users',
            'totalRewardTransactions',
            'totalPointkeluar',
            'user_id',
            'startDate',
            'endDate',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.reward.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'reward_name' =>'required|string|max:255',
            'point' =>'required|string|max:225',
        ]);

        Rewards::create([
            'reward_name'=> $request->reward_name,
            'point'=> $request->point,
        ]);

        return redirect()
            ->route('rewardAdmin.index')
            ->with('success', 'reward berhasil ditambahkan');
        
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
        $rewards = rewards::findOrFail($id);
        return view('admin.reward.edit', compact('rewards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(([
            'reward_name' => 'required|string|max:225',
            'point' => 'required|integer:20',
        ]));
        
        $rewards = rewards::findOrFail($id);
        $rewards->update([
            'reward_name' => $request->reward_name,
            'point' => $request->point,
        ]);

        return redirect()
            ->route('rewardAdmin.index')
            ->with('success', 'reward berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $rewards = rewards::findOrFail($id);

        // safety ceki ceki duls
        if($rewards->rewardTransactions($id)->count() > 0) {
            return redirect()
                ->back()
                ->with('eror', 'reward tidak dapat dihapus karena sudah digunakan');
        }
        $rewards->delete();

        return redirect()
            ->route('rewardAdmin.index')
            ->with('success', 'reward berhasil dihapus');
    }
}
