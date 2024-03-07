<?php
include('./config/db_connect.php');

if(isset($_POST['submit'])){
    $NAME = $_POST['name'];
    $ORGNAME = $_POST['Oname'];
    $EMAIL = $_POST['email'];
    $PASSWORD = $_POST['password'];
    $CPASSWORD = $_POST['Cpassword'];

    if($PASSWORD === $CPASSWORD){
        if($ORGNAME === '') {
            // Insert into users table
            $upload = "INSERT INTO users (name, email, password) VALUES ('$NAME', '$EMAIL', '$PASSWORD')";
            mysqli_query($conn, $upload);
            header('Location: Home.php');
            exit();
        } else if ($NAME === ''){
            // Insert into companies table
            $upload = "INSERT INTO companies (orgname, email, password) VALUES ('$ORGNAME', '$EMAIL', '$PASSWORD')";
            mysqli_query($conn, $upload);
            header('Location: Home.php');
            exit();
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <style>
        <?php 
            include "./styles/Signup.css";
        ?>
    </style>
</head>
<body>
    <form action="" method="post" id="signupForm">
        <h1>Get Started!</h1>
        <div class="choices">
            <button id="user" class="active">User Account</button>
            <button id="company" >Company Account</button>
        </div>
        <div>
            <div id="userName">
                <fieldset>
                    <legend>Full Name</legend>
                    <input required type="text" name="name" id="name" value="">
                </fieldset>
            </div>
            <div id="orgName" class="hide">
                <fieldset>
                    <legend>Organization name</legend>
                    <input required type="text" name="Oname" id="Oname" value="">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Email</legend>
                    <input required type="email" name="email" id="email" value="">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Password</legend>
                    <input required type="password" name="password" id="password">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Confirm password</legend>
                    <input required type="password" name="Cpassword" id="Cpassword">
                </fieldset>
            </div>
            <div class="submit-cont" style="display: flex; flex-direction: column; align-items: center;justify-content: center;">
                <input required type="submit" name="submit" id="submit" value="Sign Up">
                <p style="color: var(--text-color);">Already Have An Account? <a style="text-decoration: underline !important; color: var(--second-color) !important;" href="LoginIn.php">Sign In</a></p>
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
        userBtn.addEventListener("click", (e)=>{
            e.preventDefault()
            inputs.forEach(ele => {
                ele.value = "";
            });
            let submit =document.getElementById("submit")
            submit.value = "Sign Up"
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
            submit.value = "Sign Up"
            userBtn.classList.remove("active");
            companyBtn.classList.add("active");
            userForm.classList.add("hide");
            companyForm.classList.remove("hide");
        })
        window.onload = (e)=>{
            let form = document.getElementById("signupForm");
            form.onsubmit = (e) => {
                let pass = document.getElementById("password");
                let Cpass = document.getElementById("Cpassword");
                if(pass.value !== Cpass.value) {
                    window.alert("The passwords are not matching");
                }
            }
        }
        //End type signUp choices
    </script>

</body>
</html>