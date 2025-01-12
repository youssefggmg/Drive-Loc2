<?php 
include "../../../Class/blogs/tags.php";
include "../../../instance/instace.php";

$blog = new Tags($pdo);
$result = $blog->assignTag();
if ($result['status'] === 1) {
    header('Location: ../../../admine/blogPage');
} else {
    header('Location: ../../../admine/blogPage');
}



?>