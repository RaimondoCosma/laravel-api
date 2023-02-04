<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //Uso il metodo project() del model Comment per procacciare l'informazione del singolo progetto
        $project = $comment->project;
        $comment->delete();
        return redirect()->route('admin.projects.show', $project)->with('message', "Il commento di '$comment->name' è stato cancellato!");
    }
}
