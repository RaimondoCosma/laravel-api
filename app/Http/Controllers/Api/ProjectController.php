<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLogin;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            Mail::to('admin.project@example.com')->send(new NewLogin($project));
            return $project;
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => 'Errore 404 pagina non trovata'
            ], 404);
        }
    }
}
