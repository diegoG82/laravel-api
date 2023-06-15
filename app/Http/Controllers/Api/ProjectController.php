<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
// use App\Models\Technology;
// use App\Models\Type;
// use App\models\Technology;
use Illuminate\Http\Request;
   
class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with([ 'type', 'technologies'])->paginate(5);
        return response ()->json([
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
        ]);
    }
}
}




