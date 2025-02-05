<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\history;
use App\Models\bentuk;
use App\Models\peruntukan;
use App\Models\letak;

class PredictionMenuController extends Controller
{
    //
    public function index()
    {
        $bentuk = bentuk::all();
        $peruntukan = peruntukan::all();
        $letak = letak::all();
        return view('dashboard.prediction.index')->with(['bentuks' => $bentuk, 'peruntukans' => $peruntukan, 'letaks' => $letak]);
    }

    public function index_history()
    {
        $history = history::all();
        return view('dashboard.history.index')->with(['history' => $history]);
    }
}
