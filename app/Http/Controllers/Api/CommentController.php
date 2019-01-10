<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 10.01.2019
 * Time: 21:04
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Comment;


class CommentController extends Controller
{

    public function byArticle($articleId)
    {
        $comments = Comment::byArticle($articleId)->get();
        return response()->json([
            'success' => true,
            'comments' => $comments,
        ]);
    }
}