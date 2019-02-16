<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 24.01.2019
 * Time: 19:07
 */

namespace App\Services;


use App\Models\Comment;

class CommentService
{
    /**
     * Получение массива в виде дерева коментариев
     *
     * @param int $articleId
     * @return array
     */
    public function getCommentTreeByArticle($articleId)
    {
        $comments = Comment::byArticle($articleId)->get();

        $commentsTree = $this->buildTreeComments($comments);

        return $commentsTree;

    }

    /**
     * Построение дерева
     *
     * @param Comment[] $comments
     * @return array
     */
    private function buildTreeComments($comments)
    {
        $rootComments = $this->getRootComments($comments);

        $tree = [];

        foreach ($rootComments as $rootComment){
            $tree[] = $this->buildTree($rootComment, $comments);
        }

        return $tree;

    }

    /**
     * Получение корневых комментариев
     *
     * @param Comment[] $comments
     * @return Comment[]
     */
    private function getRootComments($comments)
    {
        $rootComments = [];

        foreach ($comments as $comment){
            if ($comment->parentId == 0){
                $rootComments[] = $comment;
            }
        }
        return $rootComments;
    }

    /**
     * @param Comment $rootComment
     * @param Comment[] $comments
     * @return Comment
     */
    private function buildTree($rootComment, $comments)
    {
        foreach ($comments as $comment){
            if ($rootComment->id == $comment->parentId){
                $rootComment->setChildrenAttribute($this->buildTree($comment, $comments));
            }
        }

        return $rootComment;
    }


}