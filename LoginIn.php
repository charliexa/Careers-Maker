<?php 

    include('./config/db_connect.php');

    session_start();

    $errors = ["email" => "Write Email Is Not Valid", "password" => ""];

    // Login authentication
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $Oemail = mysqli_real_escape_string($conn, $_POST["Oemail"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        if (empty($email) && !empty($Oemail)) {
            $sql = "SELECT * FROM companies WHERE email = '$Oemail' AND password = '$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION["Oemail"] = $row["email"];
                $_SESSION["password"] = $row["password"];
                $_SESSION["type"] = $row["type"];
                header('Location: Home.php');
            } else {
                echo "Invalid email or password.";
            }
        } else if (!empty($email) && empty($Oemail)) {

            $sqladmin = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";

            if (mysqli_query($conn, $sqladmin)) {
                $result = mysqli_query($conn, $sqladmin);
            } else {
                $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                $result = mysqli_query($conn, $sql);
            }

            if (mysqli_num_rows($result) == 1) {
                echo "Login successful!";
                header('Location: Home.php');
            } else {
                echo "Invalid email or password.";
            }

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
            <button id="user" class="active">User Account</button>
            <button id="company" >Company Account</button>
        </div>
        <div>
        <div id="userName">
                <fieldset>
                    <legend>Email</legend>
                    <input oncfo type="text" name="email" id="name" value="" >
                </fieldset>
                <p class="error hide"><?php echo "ss" ?></p>
            </div>
            <div id="orgName" class="hide">
                <fieldset>
                    <legend>Email</legend>
                    <input type="text" name="Oemail" id="Oname" value="">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name="password" id="password">
                </fieldset>
                <p class="error2 hide" style="display: none;" ><?php echo "ss" ?></p>
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
        // Start Focus Out Email is valid
        let error = document.querySelector("error");
        let error2 = document.querySelector("error2");
        let email = document.getElementById('email');
        email.addEventListener("focusout", ()=>{
            if(email.value === ""){
                eparent = email.parentElement;
                eparent.classList.add('input-error');
            }else{
                email.classList.remove('input-error');
            }
        })
        let Oemail = document.getElementById('Oemail');
        Oemail.addEventListener("focusout", ()=>{
        if(Oemail.value === ""){
            Oemail.classList.add('input-error');
        }else{
            Oemail.classList.remove('input-error');
        }
        })
        // End Focus Out Email is valid
    </script>
</body>
</html>