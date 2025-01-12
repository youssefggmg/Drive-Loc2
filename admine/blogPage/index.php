<?php
include "../../Class/blogs/blog.php";
include "../../Class/blogs/comment.php";
include "../../instance/instace.php";
$blog = new blog($pdo);
$comment = new comment($pdo);
$result = $blog->getSingleBlog()["message"];
$allcomments = $comment->getAllComments();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Post - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg ftco_navbar bg-dark " id="ftco-navbar" style="background-color: black !important;
    margin: 0em 0 0 ;
    position: static;">

        <div class="container">
            <a class="navbar-brand" href="home.php">Car<span>Book</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="home.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="myReservations.php" class="nav-link">MyReservation</a></li>
                    <li class="nav-item"><a href="pricing.php" class="nav-link">Pricing</a></li>
                    <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="../index.php" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="C:/xampp/htdocs/Drive-Loc2/client/blogs/myblogs.php"
                            class="nav-link">myBlogs</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1"><?php echo $result["title"] ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on<?php echo $result["creationdate"] ?> </div>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded"
                            src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><?php echo $result["content"] ?></p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4" method="post" action="../../../controllers/blogs/createComment.php">
                                <textarea class="form-control" rows="3"
                                    placeholder="Join the discussion and leave a comment!"></textarea>
                                <button type="submit">create</button>
                            </form>
                            <div class="d-flex mb-4">
                                <!-- Parent comment-->
                                <?php
                                foreach ($allcomments as $comment) {
                                    echo "<div class='flex-shrink-0'>
            <img class='rounded-circle' src='https://dummyimage.com/50x50/ced4da/6c757d.jpg' alt='image' />
          </div>
          <div class='ms-3'>
            <div class='fw-bold'>Commenter Name</div>
            <div id='comment-text'>" . htmlspecialchars($comment["centext"]) . "</div>
            <div id='edit-input' class='d-none'>
                <form method='post' action='../../../controllers/blogs/editComment.php'>
                    <input type='text' class='form-control'hidden name='ID'  value='" . htmlspecialchars($comment["commentID"]) . "' />
                    <input type='text' class='form-control' name='COMMENT' value='" . htmlspecialchars($comment["centext"]) . "' />
                    <button type='submit' class='btn btn-primary'>Save</button>
                </form>
            </div>";
                                    if ($comment['userID'] == ($_COOKIE['userID'] ?? null)) {
                                        echo "<div class='mt-2'>
                <button id='edit-button' class='btn btn-primary btn-sm me-2' onclick='toggleEdit()'>Edit</button>
                <button class='btn btn-danger btn-sm' href='../../../controllers/blogs/deleteBlog.php?ID= " . htmlspecialchars($comment["commentID"]) . "'>Delete</button>
              </div>";
                                    }

                                    echo "</div>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>