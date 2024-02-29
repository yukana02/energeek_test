<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Skills;
use App\Models\Skillsets;
use App\Models\Candidates;
use Illuminate\View\View ;
use Illuminate\Http\Request;
use Illuminate\View\ViewException;
use Illuminate\Support\Facades\Http;

class ApplyController extends Controller
{
    //
    public function index(): View
    {
    $skills = Skills::select('id', 'name')->latest()->get();
    $jobs = Jobs::select('id', 'name')->latest()->get();
    return view('user.lamaran_form', compact('skills', 'jobs'));
    }
  
    public function apply(Request $request)
{
    // Display the received data from the form before making the HTTP request
    // dd($request->all());

    // Make a POST request to the API-ProsesApply endpoint with the required data
    $response = Http::post('http://localhost:8000/api/Api-ProsesApply', [
        'name'      => $request->name,
        'jabatan'   => $request->jabatan,
        'telepon'   => $request->telepon,
        'email'     => $request->email,
        'tahun'     => $request->tahun,
        'skillset'  => $request->skillset,
    ]);

    // Get the response data from the API
    $responseData = $response->json();

    // Convert the response data to JSON format before returning it
    $jsonResponse = html_entity_decode(json_encode($responseData['message']));

    // Check if the response is successful
    if ($response->successful()) {
        // Redirect to a specific page with a success message
        return redirect()->route('formapply')->with('success', $jsonResponse);
    } else {
        // Redirect with an error message if the response is unsuccessful
        return redirect()->route('formapply')->with('error', $jsonResponse);
    }
}




}

