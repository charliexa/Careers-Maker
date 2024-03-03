<?php 

    // include("config/db_connect.php");

    // To prevent the empty variable problem in the value input from the inputs [email, full name, posts]
    $email = $name = $body = '';
    $errors = array("email" => "", "name" => "", "body" => "");

    if (isset($_POST["sumbit"])) {

        if (empty($_POST["email"])) {
            $errors["email"] = "An Email Is required";
        }
        if (empty($_POST["name"])) {
            $errors["name"] = "A name Is required";
        }
        if (empty($_POST["body"])) {
            $errors["body"] = "This Input Is required";
        }

    }
    print_r($errors);
?>

<!DOCTYPE html>
<html lang="en">
    <!-- for blur in delete-->
    <div class="overlay"></div>
    <!-- Start The Add Post Pop Up -->
    <form class="pop-up py-5 container-fluid primary-colors d-flex justify-content-center align-items-center flex-column gap-4 d-none " action="Home.php" method="POST">
        <h1 class="mb-3 btn_p">Add Your Post</h1>
        <div class="parent d-flex flex-row w-100">
            <div class="cont d-flex flex-column align-items-center w-100">
                <label for="Name" class="fs-4">Full Name: </label>
                <input type="text" class="w-75 " name="name" placeholder="Full Name" value="">
                <div class="red-text"><?php echo $errors['email']; ?></div>
            </div>
            <div class="cont d-flex  flex-column align-items-center w-100 ">
                <label for="Email" class="fs-4">Email: </label>
                <input type="text" name="email" class="w-75 " placeholder="Email" value="">
            </div>
        </div>
        <div class="the-post">
            <textarea name="body" cols="80" rows="5" placeholder="Express Yourself Freely!" class="w-100 " value=""></textarea>
        </div>
        <div class="text-center">
            <input type="submit" name="submit" value="Submit" class="btn btn-secondary fs-4 px-4" style="color: white !important; ">
        </div>
    </form>
    <!-- End The Add Post Pop Up -->
    <!-- Start The Edit Post Pop Up -->
    <form class="edit-pop-up py-5 container-fluid primary-colors d-flex justify-content-center align-items-center flex-column gap-4 d-none " action="" method="POST">
        <h1 class="mb-3 btn_p">Edit Your Post</h1>
        <div class="parent d-flex flex-row w-100">
            <div class="cont d-flex flex-column align-items-center w-100">
                <label for="Name" class="fs-4">Edit The Name Here: </label>
                <input type="text" class="w-75 " placeholder="Edit Your Name">
            </div>
        </div>
        <div class="the-post">
            <textarea name="post" id="post" cols="79" rows="5" placeholder="Edit The Post Here!" class="w-100 "></textarea>
        </div>
        <div class="text-center">
            <input type="submit" name="submit" value="Submit" class="btn btn-secondary fs-4 px-4 " style="color: white !important; ">
            <button class="btn btn-secondary text-danger fs-4 px-4">Cancel</button>
        </div>
    </form>
    <!-- End The Edit Post Pop Up -->

    <div class="con" style="position: static;">
        <?php require "./components/header.php"; ?>

        <div class="section container row-gap-3 d-flex flex-column mb-5 ">
            <div class="container d-flex justify-content-between ">
                <h2 class="fs-1 m-0 py-2 ">Feeds</h2>
                <button class="btn fs-4 add-post">Add Your Post!</button>
            </div>
            <div class="row card p-3 gap-3">
                <div class="col-12 d-flex justify-content-between">
                    <div class="prt1">
                        <div class="name fw-bolder fs-5">George Lobko</div>
                        <div class="date text-start">2 Hours Ago</div>
                    </div>
                    <div class="brdr border d-flex justify-content-center ">
                        <i class="text-center fa-solid fs-3 fa-ellipsis-vertical align-items-center d-flex"></i>
                        <div class="menu">
                            <div class="bg-first border-bottom border-secondary edit">Edit</div>
                            <div class="bg-first delete">Delete</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 fw-light fs-6" style="font-size: 18.5px !important;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae alias dignissimos voluptatum, iste et ab, fuga corporis nisi doloribus, explicabo deleniti. Debitis labore neque autem animi illo asperiores, blanditiis pariatur aliquam praesentium maxime nisi consequatur? Veritatis quia repudiandae voluptatibus incidunt ipsa, magnam eligendi sint odio quo possimus, deleniti porro quae. Alias omnis exercitationem libero aut fugit necessitatibus esse beatae nam minima quo, aliquid perspiciatis soluta cumque iusto! Ea nam nobis iusto repellendus sapiente itaque natus. Minima pariatur sed, debitis ipsum qui voluptate quod. Ad obcaecati sapiente distinctio quia, fugiat inventore, impedit facilis tempora, ratione libero mollitia optio vel beatae deserunt!
                </div>
                <div style="width: fit-content !important;" class="fs-5"><div class="btnn "><i class="fa-regular fa-heart"></i>  Like</div></div>
            </div>
            <div class="container sure" id="sure">
                <div class="top">
                    <h2>Are you sure about this?</h2>
                </div>
                <div class="down">
                    <a href="" class="bg-danger ">Confirm</a>
                    <a href="" class="bg-dark" style="color: white !important;">Cancel</a>
                </div>
            </div>
        </div>
    
        <?php require "./components/footer.php"; ?>

    </div>


</html>