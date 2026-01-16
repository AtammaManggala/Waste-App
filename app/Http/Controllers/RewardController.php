<?php

namespace App\Http\Controllers;

use App\Models\countTransactions;
use App\Models\dailyTransactions;
use App\Models\rewards;
use App\Models\RewardTransaction;
use App\Models\Rewardtransactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RewardController extends Controller
{
    /**
     * Display a listing of the rewards.
     */
    public function index()
    {
        // ambil semua hadiah
        $rewards = rewards::orderBy('point', 'asc')->get();

        return view('pengguna.rewards.index', compact('rewards'));
    }

    /**
     * Proses tukar reward
     */
    public function tukar($id)
    {
        $user = Auth::user();
        $reward = rewards::findOrFail($id);

        // menarik data hasil konversi
        $count = countTransactions::where('user_id', $user->id)->first();
        $saldoPoin = $count->jml_point ?? 0;

        $poinKeluar = Rewardtransactions::where('user_id', $user->id)
            ->sum('total_points');

        // cek saldo
        if ($saldoPoin < $reward->point) {
            return back()->with('error', 'Poin Anda tidak mencukupi.');
        }
        
        DB::transaction(function () use ($user, $reward, $saldoPoin) {
        // simpan transaksi reward
        Rewardtransactions::create([
            'user_id' => $user->id,
            'reward_id' => $reward->id,
            'total_points' => $reward->point,
            'status' => 'berhasil'
        ]);

        // kurangi saldo poin (BOTOL TIDAK BERUBAH)
        countTransactions::where('user_id', $user->id)->update([
            'jml_point' => $saldoPoin - $reward->point]);
        });

        return back()->with('success', 'Hadiah berhasil ditukarkan 🎉');
    }
}
