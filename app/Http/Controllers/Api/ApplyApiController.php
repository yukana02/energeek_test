<?php

namespace App\Http\Controllers\Api;

use App\Models\Skillsets;
use App\Models\Candidates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApplyApiController extends Controller
{
    //
    public function prosesapplyApi(Request $request)
    {
        $datacandidates = new Candidates();
    
        // Aturan validasi untuk data input
        $data = [
            'name'      => 'required|string|max:255',
            'jabatan'   => 'required|numeric',
            'telepon'   => 'required|numeric',
            'email'     => 'required|string|email|max:255|unique:users|unique:candidates',
            'tahun'     => 'required|numeric',
            'skillset'  => 'required|array', // Input skillset harus berupa array
        ];
    
        // Melakukan validasi pada data request
        $validator = Validator::make($request->all(), $data);
    
        // Jika validasi gagal
        if ($validator->fails()) {
            $errorMessages = $validator->errors()->all();
        
            return response()->json([
                'status'  => false,
                'message' => implode(' ', $errorMessages),
            ], 400);
        }
         else {
            $datacandidates->jobs_id  = $request->jabatan;
            $datacandidates->name     = $request->name;
            $datacandidates->email    = $request->email;
            $datacandidates->phone    = $request->telepon;
            $datacandidates->year     = $request->tahun;
    
            // Jika $candidates berhasil disimpan, proses menyimpan skill di model skillset
            if ($datacandidates->save()) {
                $datauser = Candidates::where('email', $request->email)->first();
    
                // Loop untuk menyimpan setiap skill
                foreach ($request->skillset as $skillId) {
                    $dataskillset = new Skillsets();
                    $dataskillset->candidate_id = $datauser->id;
                    $dataskillset->skill_id = $skillId; 
                    $dataskillset->save();
                }
    
                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil disimpan',
                ], 200);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Gagal menyimpan data candidates',
                ], 500);
            }
        }
    }
    

    
}
