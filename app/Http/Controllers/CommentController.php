<?php

namespace App\Http\Controllers;

use App\Models\PostComment; // Ton modèle s'appelle bien PostComment
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|min:5',
        ]);

        PostComment::create([
            'postId'    => $postId,
            'title'     => 'Commentaire de ' . (auth()->user()->firstName ?? 'Anonyme'),
            'content'   => $request->content,
            'published' => 1,
            'publishedAt' => now(),
        ]);

        return back()->with('success', 'Votre commentaire a été ajouté !');
    }
}