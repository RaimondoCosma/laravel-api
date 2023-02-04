<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technologies', 'type')->get();
        return $projects;
    }
    public function show($slug)
    {
        try {
            $project = Project::with('technologies', 'type', 'comments')->where('slug', $slug)->firstOrFail();
            return $project;
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => 'Errore 404 pagina non trovata'
            ], 404);
        }
    }
}
