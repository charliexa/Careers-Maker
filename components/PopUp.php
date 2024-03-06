<form class="pop-up py-5 container-fluid primary-colors justify-content-center align-items-center flex-column gap-5 d-none " action="Home.php" method="POST">
    <h1 class="mb-3 btn_p text-center ">Add Your Post</h1>
    <div class="parent d-flex flex-row">
        <div class="cont d-flex flex-column align-items-center w-100">
            <label for="Name" class="fs-4">Full Name: </label>
            <input type="text" class="w-75 " required name="name" placeholder="Full Name" value="">
        </div>
    </div>
    <div class="the-post text-center mt-4 ">
        <textarea name="body" cols="80" rows="5" required placeholder="Express Yourself Freely!" class="w-75" value=""></textarea>
    </div>
    <div class="text-center mt-4 ">
        <input type="submit" name="submit" value="Submit" class="btn btn-secondary fs-4 px-4" style="color: white !important; ">
    </div>
</form>