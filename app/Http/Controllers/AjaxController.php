<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AjaxController extends Controller
{
    public function toggleOff($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return new JsonResponse(array('message' => 'Unable to toggle off'), 500);
        }

        $post->is_active = 0;
        $post->save();

        return new JsonResponse(array('message' => 'Post successfully toggled off'), 200);
    }

    public function toggleOn($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return new JsonResponse(array('message' => 'Unable to toggle on'), 500);
        }

        $post->is_active = 1;
        $post->save();

        return new JsonResponse(array('message' => 'Post successfully toggled on'), 200);
    }

    public function trash($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return new JsonResponse(array('message' => 'Unable to trash post'), 500);
        }

        $post->delete();

        return new JsonResponse(array('message' => 'Post successfully trashed'), 200);
    }

    public function trashComment($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return new JsonResponse(array('message' => 'Unable to trash comment'), 500);
        }

        $comment->delete();

        return new JsonResponse(array('message' => 'Comment successfully trashed'), 200);
    }

    public function toggleCommentOff($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return new JsonResponse(array('message' => 'Unable to toggle off'), 500);
        }

        $comment->is_active = 0;
        $comment->save();

        return new JsonResponse(array('message' => 'Comment successfully toggled off'), 200);
    }

    public function toggleCommentOn($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return new JsonResponse(array('message' => 'Unable to toggle on'), 500);
        }

        $comment->is_active = 1;
        $comment->save();

        return new JsonResponse(array('message' => 'Comment successfully toggled on'), 200);
    }

    public function comment(Request $request)
    {
        $post = Post::find($request->get('post'));

        if (!$post || empty($request->get('comment'))) {
            return new JsonResponse(array('message' => 'Unable to add comment'), 500);
        }

        $comment = new Comment();
        $comment->author = Auth::user()->email;
        $comment->description = $request->get('comment');
        $comment->is_active = 0;
        $post->comments()->save($comment);

        return new JsonResponse(array('message' => 'Comment successfully added. It will appear once approved'), 200);
    }

    public function userRemove($id)
    {
        $user = User::find($id);

        if (!$user || $id == 1) {
            return new JsonResponse(array('message' => 'Unable to remove user'), 500);
        }

        $user->delete();

        return new JsonResponse(array('message' => 'User successfully removed'), 200);
    }
}
