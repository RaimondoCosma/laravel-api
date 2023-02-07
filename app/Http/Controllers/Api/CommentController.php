<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;

class CommentController extends Controller
{
        /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        $request->validate([
            'name'=> 'nullable|string|max:150',
            'content'=>'required|string',
        ]);

        $data = $request->all();
        $new_comment = new Comment();
        $new_comment->name = $data['name'];
        $new_comment->content = $data['content'];
        $new_comment->project_id = $project->id;
        $new_comment->save();

        return $new_comment;
    }
}
