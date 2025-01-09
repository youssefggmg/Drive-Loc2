<?php
include "../../Class/blogs/blog.php";
include "../../instance/instace.php";

$blog = new Blog($pdo);
$result = $blog->editBlog();
if ($result['status']==1) {
    header("location: ../../client/blogs/index.php");
}else{
    echo $result['message'];
    exit;
}

?>