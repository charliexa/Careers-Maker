<?php
    include('./config/db_connect.php');

    session_start();

    if (!isset($_SESSION)) {
        header('Location: Home.php');
    }

    $errors = ["name" => "This Name is Not Valid","email" => "This Email Is Not Valid!", "password" => "The Passwords Does Not Match"];

    if(isset($_POST['submit'])){
        $NAME = $_POST['name'];
        $ORGNAME = $_POST['Oname'];
        $EMAIL = $_POST['email'];
        $PASSWORD = $_POST['password'];
        $CPASSWORD = $_POST['Cpassword'];

    if($PASSWORD === $CPASSWORD){
        if($ORGNAME === ''){
            // check the email first
            if(!filter_var($EMAIL, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            } else{
                // Insesrt into users table
                $upload = "INSERT INTO users (name, email, password) VALUES ('$NAME', '$EMAIL', '$PASSWORD')";
                mysqli_query($conn, $upload);
                header('Location: Home.php');
                exit();
            }
        } else if ($NAME === ''){
            // Insert into companies table
            if(!filter_var($EMAIL, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            } else {
                $upload = "INSERT INTO companies (orgname, email, password) VALUES ('$ORGNAME', '$EMAIL', '$PASSWORD')";
                mysqli_query($conn, $upload);
                header('Location: Home.php');
                exit();
            }
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
    <form action="" method="post" onsubmit="">
        <h1>Get Started!</h1>
        <div class="choices">
            <button id="user" class="active">User Account</button>
            <button id="company" >Company Account</button>
        </div>
        <div>
            <div id="userName">
                <fieldset class="">
                    <legend>Full Name</legend>
                    <input type="text" name="name" id="name" value="" onfocusout="isValidName(this.value)">
                </fieldset>
                <p class="" style="display: none;"></p>
            </div>
            <div id="orgName" class="hide">
                <fieldset class="">
                    <legend>Organization name</legend>
                    <input type="text" name="Oname" id="Oname" value="" onfocusout="isValidName2(this.value)">
                </fieldset>
                <p class="" style="display: none;"></p>
            </div>
            <div>
                <fieldset class="">
                    <legend>Email</legend>
                    <input type="email" name="email" id="email" value="" onfocusout="isValidEmail(this.value)">
                </fieldset>
                <p class="" style="display: none;"></p>
            </div>
            <div>
                <fieldset class="">
                    <legend>Password</legend>
                    <input type="password" name="password" id="password" onfocusout="isValidPass(this.value)">
                </fieldset>
                <p class="" style="display: none;"><?php echo "ee" ?></p>
            </div>
            <div>
                <fieldset class="">
                    <legend>Confirm password</legend>
                    <input type="password" name="Cpassword" id="Cpassword">
                </fieldset>
                <p class="" style="display: none;"><?php echo "ee" ?></p>
            </div>
            <div class="submit-cont" style="display: flex; flex-direction: column; align-items: center;justify-content: center;">
                <input type="submit" name="submit" id="submit" value="Sign Up">
                <p style="color: var(--text-color);">Already Have An Account? <a style="text-decoration: underline !important; color: var(--second-color) !important;" href="LoginIn.php">Log In</a></p>
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
        let error = document.querySelectorAll(".error");
        let error2 = document.querySelector(".error2");
        let email = document.getElementById('email');
        let password = document.getElementById('password');
        let fields = document.getElementsByTagName("fieldset")
        let par = document.querySelectorAll("fieldset + p")

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
        //End type signUp choices
        // Start Full Name Check
        // UserName
        function isValidName(name) {
            if (name.length === 0) {
                par[0].innerHTML = "This Input Is Required!"
                par[0].classList.add("error");
                fields[0].classList.add("input-error");
            } else {
                par[0].classList.remove("error");
                fields[0].classList.remove("input-error");
            }
        }
        // OrgName
        function isValidName2(name) {
            if (name.length === 0) {
                par[1].innerHTML = "This Input Is Required!"
                par[1].classList.add("error");
                fields[1].classList.add("input-error");
            } else {
                par[1].classList.remove("error");
                fields[1].classList.remove("input-error");
            }
        }
        // End Full Name Check
        // Start Password Check
        function isValidPass(pass) {
            if (pass.length === 0) {
                par[4].classList.remove("error2");
                fields[4].classList.remove("input-error")
                par[3].innerHTML = "This Input Is Required!"
                par[3].classList.add("error");
                fields[3].classList.add("input-error");
            }
        }
        // End Password Check
        // Start Email Check
        function isValidEmail(email) {
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (email.length === 0) {
                par[2].innerHTML = "This Input Is Required!"
                fields[2].classList.add("input-error");
                par[2].classList.add("error");
            } else if (!emailPattern.test(email)) {
                fields[2].classList.add("input-error")
                par[2].classList.add("error")
                par[2].innerHTML = "Email must be a valid email address"
            } else if (emailPattern.test(email)) {
                par[2].classList.remove("error")
                fields[2].classList.remove("input-error");
            }
        }
        // End Email Check
        // Start Password Check
        let Cpassword = document.getElementById('Cpassword');
        Cpassword.addEventListener("focusout", ()=>{
            let password = document.getElementById('password');
            if(Cpassword.value !== password.value){
                par[3].classList.add('error');
                par[4].classList.add('error2');
                fields[3].classList.add("input-error")
                fields[4].classList.add("input-error")
                par[3].innerHTML = "The Passwords Does Not Match!"
                par[4].innerHTML = "The Passwords Does Not Match!"
            } else{
                let par = document.querySelectorAll("fieldset + p")
                par[3].classList.remove('error');
                par[4].classList.remove('error2');
                fields[3].classList.remove("input-error")
                fields[4].classList.remove("input-error")
            }
        })
        // End Password Check
    </script>
</body>
</html>