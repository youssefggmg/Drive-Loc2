<?php
include "../../../Class/blogs/tags.php";
include "../../../instance/instace.php";

    $tagID = $_POST['tagid'];

    $blog = new Tags($pdo);
    $result = $blog->deleteTag($tagID);

    if ($result['status'] === 1) {
        header('Location: ../../../admine/tags.php?message=' . urlencode($result['message']));
    } else {
        header('Location: ../../../admine/tags.php?error=' . urlencode($result['message']));
    }
?>
