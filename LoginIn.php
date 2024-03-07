<?php 

    include('./config/db_connect.php');


    // Login authentication
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            echo "Login successful!";
            // You can set session variables or redirect to another page here
        } else {
            echo "Invalid username or password.";
        }
    }

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/Signup.css">
    <title>Login In</title>
    <style>
        <?php
            include "./styles/LoginIn.css";
        ?>
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Welcome Back!</h1>
        <div class="choices">
            <button id="user" class="active ">User Account</button>
            <button id="company" >Company Account</button>
        </div>
        <div>
            <div>
                <fieldset>
                    <legend>Email</legend>
                    <input type="email" name="email" id="email" value="">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name="password" id="password">
                </fieldset>
            </div>
            <div class="submit-cont" style="display: flex; flex-direction: column; align-items: center;justify-content: center;">
                <input type="submit" name="submit" value="Login In" id="submit">
                <p style="color: var(--text-color);">Don't Have An Account? <a style="text-decoration: underline !important; color: var(--second-color) !important;" href="Signup.php">Sign Up</a></p>
            </div>
        </div>
    </form>
    <script>
        //Start type signUp choices
        let userBtn = document.getElementById("user");
        let companyBtn = document.getElementById("company");
        let userForm = document.getElementById("userName");
        let companyForm = document.getElementById("orgName");
        let inputs = document.querySelectorAll("input");
        console.log(userBtn);
        console.log(companyBtn);
        userBtn.addEventListener("click", (e)=>{
            e.preventDefault()
            inputs.forEach(ele => {
                ele.value = "";
            });
            let submit =document.getElementById("submit")
            submit.value = "Login In"
            userBtn.classList.add("active");
            companyBtn.classList.remove("active");
            userForm.classList.remove("hide");
            companyForm.classList.add("hide");
        })
        companyBtn.addEventListener("click", (e)=>{
            e.preventDefault()
            inputs.forEach(ele => {
                ele.value = "";
            });
            let submit =document.getElementById("submit")
            submit.value = "Login In"
            userBtn.classList.remove("active");
            companyBtn.classList.add("active");
            userForm.classList.add("hide");
            companyForm.classList.remove("hide");
        })
        //End type signUp choices
    </script>

</body>
</html>