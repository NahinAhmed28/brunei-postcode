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
                    $likeTerm = "%{$term}%";

                    $q->where('districts.name', 'like', $likeTerm)
                        ->orWhere('districts.name_bn', 'like', $likeTerm)
                        ->orWhere('mukims.name', 'like', $likeTerm)
                        ->orWhere('mukims.name_bn', 'like', $likeTerm)
                        ->orWhere('kampongs.name', 'like', $likeTerm)
                        ->orWhere('kampongs.name_bn', 'like', $likeTerm);
                });
            })
            ->orderBy('districts.name')
            ->orderBy('mukims.name')
            ->orderBy('kampongs.name')
            ->get();

        $data = $kampongs->map(fn ($kampong) => [
            'district' => $kampong->mukim->district->name,
            'district_bn' => $kampong->mukim->district->name_bn,
            'mukim' => $kampong->mukim->name,
            'mukim_bn' => $kampong->mukim->name_bn,
            'kampong' => $kampong->name,
            'kampong_bn' => $kampong->name_bn,
            'postcode' => $kampong->postcode,
        ])->values();

        return response()->json(['data' => $data]);
    }
}
