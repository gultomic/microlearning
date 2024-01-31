<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Kelas;
use App\Models\KelasMateri;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class LearningController extends Controller
{
    public function progress(Request $request)
    {
        $user = Auth::user();
        $matid = $request->material;

        $kelas = Kelas::where([
            ['user_id', $user->id],
            ['pembelajaran_id', $request->pbid],
        ])->first();

        $progress = KelasMateri::where([
            ['kelas_id', $kelas->id],
            ['materi_id', $request->material]
        ])->first();

        if($progress == null) {
            KelasMateri::create([
                'kelas_id' => $kelas->id,
                'materi_id' => $request->material,
                'refs' => ['status' => 0]
            ]);
        }

        return response()->json("success", 200);
    }
}
