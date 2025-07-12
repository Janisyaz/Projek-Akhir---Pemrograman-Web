<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest  $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        Comment::create($validated);

        return back()->with('success', 'Komentar berhasil dikirim! Menunggu persetujuan admin.');
    }

    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return back()->with('success', 'Komentar telah disetujui!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Komentar berhasil dihapus!');
    }
}