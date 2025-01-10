<?php 
include "../../Class/blogs/blog.php";
include "../../instance/instace.php";

$blog = new Blog($pdo);
$res=$blog->getSingleBlog()["message"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addblog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">


    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark " id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="home.php">Car<span>Book</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="../home.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="myReservations.php" class="nav-link">MyReservation</a></li>
                    <li class="nav-item"><a href="pricing.php" class="nav-link">Pricing</a></li>
                    <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="index.php" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="myblogs.php" class="nav-link">myBlogs</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <div class="bg-white  border-2 rounded-lg relative m-10">

            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">
                    Create blog
                </h3>
            </div>

            <div class="p-6 space-y-6">
                <form action="../../controllers/blogs/editBlog.php" method="post">
                    <div class=" flex flex-col gap-6">
                        <input type="number" hidden value="<?php echo $_GET["id"]?>" name="blogID">
                        <div>
                            <label for="title" class="text-sm font-medium text-gray-900 block mb-2">Title</label>
                            <input type="text" name="title" id="title"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Write blog title" required value="<?php echo $res["title"]?>">
                        </div>
                        <div>
                            <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image url</label>
                            <input type="text" name="image" id="image"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="https://exemple.com" required="" value="<?php echo $res["image"]?>">
                        </div>
                        <div class="col-span-full">
                            <label for="content" class="text-sm font-medium text-gray-900 block mb-2">Blog
                                content</label>
                            <textarea id="content" rows="6"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4"
                                placeholder="write blog content here"><?php echo $res["content"]?>"</textarea>
                        </div>
                    </div>
                </form>
            </div>

            <div class="p-6 border-t border-gray-200 rounded-b flex justify-end">
                <button
                    class="text-white ms-auto bg-primary hover:bg-primary/80 focus:ring-4 focus:ring-primary/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    type="submit">Save all</button>
            </div>

        </div>
    </main>

</body>

</html>