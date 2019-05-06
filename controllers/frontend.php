<?php 

require_once('model/postmanager.php');
require_once('model/commentmanager.php');

// POSTS functions

function listPosts() {
    $postManager = new PostManager();
    $posts = $postManager->readLatestPosts();

    $commentManager = new CommentManager();
    $comments = $commentManager->readFirstComments();

    require('views/homeView.php');
}

function readPost() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->readPost($_GET['postid']);
    $comments = $commentManager->readComments($_GET['postid']);

    require('view/postView.php');
}

// COMMENTS functions

function postComment($postid, $author, $content) {
    $commentManager = new CommentManager();
    $comment = $commentManager->createComment($postid, $author, $content);

    if ($comment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=readpost&id=' . $postid);
    }
}

function reportComment($postid, $commentid) {
    $commentManager = new CommentManager();
    $report = $commentManager->reportComment($commentid);

    if ($report === false) {
        throw new Exception('Impossible de signaler le commentaire !');
    }
    else {
        header('Location: index.php?action=readpost&id=' . $postid);
    }
}