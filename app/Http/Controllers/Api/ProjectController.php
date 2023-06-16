<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
   
class ProjectController extends Controller
{

        public function index(Request $request) {
        // Se nel request ho Type_id
        if ($request->has('type_id')) {
            // prendo i progetti con il tipo corrispondente e le tecnologie associate
            $projects = Project::with(['type', 'technologies'])->where('type_id', $request->type_id)->paginate(5);
        } else {
            // prendo tutti i progetti con i rispettivi tipi e tecnologie associate
            $projects = Project::with(['type', 'technologies'])->paginate(5);
        }
    
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
    



public function show($slug) {
    $project = Project::with('Type', 'Technologies')->where('slug', $slug)->first();

    if ($project) {
        return response()->json([
            'success' => true,
            'results' => $project
        ]); 
    } else {
        return response()->json([
            'success' => false,
            'error' => 'No Project found'
        ])->setStatusCode(404);
    }
}
}




