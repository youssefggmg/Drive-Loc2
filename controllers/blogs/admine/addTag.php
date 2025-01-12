<?php 
include "../../../Class/blogs/tags.php";
include "../../../instance/instace.php";
include "../../../admine/tags.php";


$blog = new Tags($pdo);
$result = $blog->addTag();

if ($result['status'] === 1) {
    header('Location: ../../../admine/tags.php?message=' . urlencode($result['message']));
} else {
    header('Location: ../../../admine/tags.php?error=' . urlencode($result['message']));
}


?>