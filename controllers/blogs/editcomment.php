<?php
include "../../Class/blogs/comment.php";

$comment = new Comment($pdo);
$result = $comment->editComment();
if ($result['status']==1) {
    header("location: ../../client/blogs/BlogPage/index.php");
}else{
    echo $result['message'];
    exit;
}

?>