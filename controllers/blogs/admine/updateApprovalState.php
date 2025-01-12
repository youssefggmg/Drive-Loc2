<?php
include "../../Class/blogs/blog.php";
include "../../instance/instace.php";

$blog = new Blog($pdo);
$result=$blog->ApproveBlog();
if ($result['status']==1) {
    echo $result['message'];
}else{
    echo $result['message'];
    exit;
}

?>