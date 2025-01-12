<?php
include "../../Class/blogs/comment.php";

$comment = new Comment($pdo);
$result = $comment->createComment();
if ($result['status']==1) {
    header("location: ../../client/blogs/BlogPage/index.php");
}else{
    echo $result['message'];
    exit;
}

?>