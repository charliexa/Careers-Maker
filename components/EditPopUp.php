<form class="edit-pop-up py-5 container-fluid primary-colors d-flex justify-content-center align-items-center flex-column gap-4 d-none" id="edit-pop-up-<?php echo htmlspecialchars($post['id']) ?>" action="" method="POST">
    <h1 class="mb-3 btn_p">Edit Your Post</h1>
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