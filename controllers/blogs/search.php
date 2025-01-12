<?php
include "../../Class/blogs/blog.php";
include "../../instance/instace.php";

$blog = new Blog($pdo);
$result = $blog->search();
if ($result['status']==1) {
    echo json_encode($result['message']);
}else{
    echo $result['message'];
    exit;
}

?>