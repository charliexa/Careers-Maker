<?php 

    include('./config/db_connect.php');

    // Get All posts
    $sql = 'SELECT id, name, body, Created_at FROM posts ORDER BY Created_at';

    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Post Data to Db
    if (isset($_POST["submit"])) {

        // insert data to db
        $NAME = $_POST["name"];
        $BODY = $_POST["body"];

        $insert = "INSERT INTO posts (name, body) VALUES ('$NAME', '$BODY')";
        mysqli_query($conn, $insert);

        header('location: Home.php');

    }

    // Update A Post
    if (isset($_POST['edit-submit'])) {
        // $sql = "UPDATE posts SET lastname='Doe' WHERE id=2";

        $name = $_POST['edit-name'];
        $body = $_POST['edit-body'];
        $id = $_POST['id'];

        // if (empty($name) && !empty($body)) {
        //     $sql = "UPDATE posts SET body='$body' WHERE id='$id'";
        // } else if (empty($body) && !empty($name)) {
        //     $sql = "UPDATE posts SET name='$name' WHERE id='$id'";
        // }

        $sql = "UPDATE posts SET name='$name', body='$body' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        header("location: Home.php");

}

?>

<!DOCTYPE html>
<html lang="en">
    <!-- for blur in delete-->
    <div class="overlay"></div>
    <!-- Start The Add Post Pop Up -->
    <form class="pop-up py-5 container-fluid primary-colors justify-content-center align-items-center flex-column gap-4 d-none " action="Home.php" method="POST">
        <h1 class="mb-3 btn_p">Add Your Post</h1>
        <div class="parent d-flex flex-row w-100">
            <div class="cont d-flex flex-column align-items-center w-100">
                <label for="Name" class="fs-4">Full Name: </label>
                <input type="text" class="w-75 " required name="name" placeholder="Full Name" value="">
            </div>
        </div>
        <div class="the-post">
            <textarea name="body" cols="80" rows="5" required placeholder="Express Yourself Freely!" class="w-100 " value=""></textarea>
        </div>
        <div class="text-center">
            <input type="submit" name="submit" value="Submit" class="btn btn-secondary fs-4 px-4" style="color: white !important; ">
        </div>
    </form>
    <!-- End The Add Post Pop Up -->
    

    <div class="con" style="position: static;">
        <?php require "./components/header.php"; ?>

        <div class="section container row-gap-3 d-flex flex-column mb-5 ">
            <div class="container d-flex justify-content-between ">
                <h2 class="fs-1 m-0 py-2 ">Feeds</h2>
                <button class="btn fs-4 add-post">Add Your Post!</button>
            </div>
            <?php foreach($posts as $post): ?>
                
            <?php
                $post_creation_time_str = $post["Created_at"];

                // Convert the string to a DateTime object
                $post_creation_time = new DateTime($post_creation_time_str);

                $current_time = new DateTime();

                // Calculate the time difference
                $time_difference = $current_time->diff($post_creation_time);

                $formatted_time_difference = '';

                if ($time_difference->s > 0) {
                    $formatted_time_difference = $time_difference->s . ' seconds';
                }
            
                if ($time_difference->i > 0) {
                    $formatted_time_difference = $time_difference->i . ' minutes ';
                }
            
                if ($time_difference->h > 0) {
                    $formatted_time_difference = $time_difference->h . ' hours ';
                }
            
                if ($time_difference->d > 0) {
                $formatted_time_difference = $time_difference->d . ' days ';
                
                // $Id = $post["id"];
                }?>
            <div class="row card p-3 gap-3" title="<?php echo htmlspecialchars($post['id']) ?>">
                <div class="col-12 d-flex justify-content-between">
                    <div class="prt1">
                        <div class="name fw-bolder fs-5"><?php echo htmlspecialchars($post["name"])?></div>
                        <div class="date text-start"><?php echo htmlspecialchars($formatted_time_difference)?></div>
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
                    <?php echo htmlspecialchars($post["body"])?>
                </div>
                <div style="width: fit-content !important;" class="fs-5"><div class="btnn "><i class="fa-regular fa-heart"></i>  Like</div></div>
            </div>
            <!-- Start Sure Pop up -->
            <div class="container sure" id="sure-<?php echo $post['id']; ?>">
                <div class="top">
                    <h2>Are you sure about this?</h2>
                </div>
                <div class="down">
                    <a href="delete.php?id=<?php echo $post['id'] ?>" class="bg-danger">Confirm</a>
                    <a href="" class="bg-dark" style="color: white !important;">Cancel</a>
                </div>
            </div>
            <!-- End Sure Pop up -->

            <!-- Start The Edit Post Pop Up -->
            <form class="edit-pop-up py-5 container-fluid primary-colors d-flex justify-content-center align-items-center flex-column gap-4 d-none" id="edit-pop-up-<?php echo htmlspecialchars($post['id']) ?>" action="" method="POST">
                    <h1 class="mb-3 btn_p">Edit Your Post</h1>C
                    <div class="parent d-flex flex-row w-100">
                        <div class="cont d-flex flex-column align-items-center w-100">
                            <label for="Name" class="fs-4">Edit The Name Here: </label>
                            <input type="text" class="w-75 " name="edit-name" placeholder="Edit Your Name">
                        </div>
                    </div>
                    <div class="the-post">
                        <textarea name="edit-body" id="post" cols="79" rows="5" placeholder="Edit The Post Here!" class="w-100 "></textarea>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($post["id"])?>">
                        <input type="submit" name="edit-submit" value="Submit" class="btn btn-secondary fs-4 px-4 " style="color: white !important; ">
                        <button class="btn btn-secondary text-danger fs-4 px-4">Cancel</button>
                    </div>
                </form>
                <!-- End The Edit Post Pop Up -->

            <?php endforeach; ?>
        </div>

        <?php require "./components/footer.php"; ?>

    </div>

</html>