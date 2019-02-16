<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 10.01.2019
 * Time: 21:04
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\CommentService;


class CommentController extends Controller
{

    public function byArticle($articleId)
    {
        $comments = (new CommentService())->getCommentTreeByArticle($articleId);

        return response()->json([
            'success' => true,
            'comments' => $comments,
        ]);
    }
}