<?php

namespace App\Http\Controllers;

use App\Models\Kampong;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    /**
     * Search kampongs by district, mukim, or kampong name.
     */
    public function search(Request $request): JsonResponse
    {
        $term = trim($request->input('q', ''));

        $kampongs = Kampong::query()
            ->select('kampongs.*')
            ->join('mukims', 'kampongs.mukim_id', '=', 'mukims.id')
            ->join('districts', 'mukims.district_id', '=', 'districts.id')
            ->with(['mukim.district'])
            ->when($term, function ($query) use ($term) {
                $query->where(function ($q) use ($term) {
                    $q->where('districts.name', 'like', "%{$term}%")
                        ->orWhere('mukims.name', 'like', "%{$term}%")
                        ->orWhere('kampongs.name', 'like', "%{$term}%");
                });
            })
            ->orderBy('districts.name')
            ->orderBy('mukims.name')
            ->orderBy('kampongs.name')
            ->get();

        $data = $kampongs->map(fn ($kampong) => [
            'district' => $kampong->mukim->district->name,
            'mukim' => $kampong->mukim->name,
            'kampong' => $kampong->name,
            'postcode' => $kampong->postcode,
        ])->values();

        return response()->json(['data' => $data]);
    }
}
