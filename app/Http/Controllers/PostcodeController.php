<?php

namespace App\Http\Controllers;

use App\Models\Kampong;
use Illuminate\Contracts\View\View;

class PostcodeController extends Controller
{
    /**
     * Display a listing of Brunei postcodes.
     */
    public function index(): View
    {
        $kampongs = Kampong::query()
            ->select('kampongs.*')
            ->join('mukims', 'kampongs.mukim_id', '=', 'mukims.id')
            ->join('districts', 'mukims.district_id', '=', 'districts.id')
            ->with(['mukim.district'])
            ->orderBy('districts.name')
            ->orderBy('mukims.name')
            ->orderBy('kampongs.name')
            ->get();

        return view('postcodes.index', compact('kampongs'));
    }
}
