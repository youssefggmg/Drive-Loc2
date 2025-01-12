<?php
include "../Class/blogs/tags.php";
include "../instance/instace.php";

$blog = new Tags($pdo);
$result = $blog->getTags();
if ($result['status'] == 1) {
    $tags = $result['data'];
} elseif ($result['status'] == 0) {
    echo $result['message'];
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tag Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Tag</h2>
        <form method="post" action="../controllers/blogs/admine/addTag.php">
            <div class="form-group">
                <label for="tagName">Tag Name</label>
                <input type="text" class="form-control" id="tagName" name="tagName" placeholder="Enter tag name" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Tag</button>
        </form>

        <h2 class="mt-5">Tags Table</h2>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Tag ID</th>
                    <th>Tag Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tags as $tag): ?>
                    <tr>
                        <td><?= htmlspecialchars($tag["tagid"]) ?></td>
                        <td><?= htmlspecialchars($tag["tagName"]) ?></td>
                        <td>
                            <form method="post" action="../controllers/blogs/admine/deleteTag.php">
                                <input type="hidden" name="tagid" value="<?= htmlspecialchars($tag["tagid"]) ?>" />
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
