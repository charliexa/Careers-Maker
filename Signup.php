<?php
    include('./config/db_connect.php');

    session_start();

    if (isset($_SESSION['type'])) {
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
    <form action="" method="post">
        <h1>Get Started!</h1>
        <div class="choices">
            <button id="user" class="active">User Account</button>
            <button id="company" >Company Account</button>
        </div>
        <div>
            <div id="userName">
                <fieldset class="input-error">
                    <legend>Full Name</legend>
                    <input type="text" name="name" id="name" value="">
                </fieldset>
                <p class="" style="display: none;"></p>
            </div>
            <div id="orgName" class="hide">
                <fieldset class="input-error">
                    <legend>Organization name</legend>
                    <input type="text" name="Oname" id="Oname" value="">
                </fieldset>
                <p class="" style="display: none;"></p>
            </div>
            <div>
                <fieldset class="input-error">
                    <legend>Email</legend>
                    <input type="email" name="email" id="email" value="" onfocusout="isValidEmail(this.value)">
                </fieldset>
                <p class="" style="display: none;"></p>
            </div>
            <div>
                <fieldset class="input-error">
                    <legend>Password</legend>
                    <input type="password" name="password" id="password" onfocusout="isValidPass(this.value)">
                </fieldset>
                <p class="error" style="display: none;"><?php echo "ee" ?></p>
            </div>
            <div>
                <fieldset class="input-error">
                    <legend>Confirm password</legend>
                    <input type="password" name="Cpassword" id="Cpassword">
                </fieldset>
                <p class="error2" style="display: none;"><?php echo "ee" ?></p>
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
        function isValidName(name) {
            if (name.length === 0) {
                par[0].innerHTML = "This Input Is Required!"
                par[0].classList.add("error");
                fields[0].classList.add("input-error");
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
                fields[2].classList.add("input-error");
                par[2].classList.add("error")
                par[2].innerHTML = "This Email Is Not Valid!"
            } else if (emailPattern.test(email)) {
                fields[2].classList.remove("input-error");
                par[2].classList.remove("error")
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
            } else{
                let par = document.querySelectorAll("fieldset + p")
                par[3].classList.remove('error');
                par[4].classList.remove('error2');
                fields[3].classList.remove("input-error")
                fields[4].classList.remove("input-error")
            }
        })
        // End Password Check
        email.addEventListener("focusout", ()=>{
            if(email.value === ""){
                eparent = email.parentElement;
                eparent.classList.add('input-error');
                error[2].classList.remove('hide');
                
            }else{
                eparent = email.parentElement;
                eparent.classList.remove('input-error');
                error[2].classList.add('hide');
                email.style.color = "#b0b9d8";
            }
            if(!isValidEmail(email.value)){
                email.style.color = "red";
                eparent.classList.add('input-error');
                error[2].classList.remove('hide');
                error[2].innerHTML = 'Email format is not valid';
            }
        })
        let Oemail = document.getElementById('Oemail');
        Oemail.addEventListener("focusout", ()=>{
            if(Oemail.value === ""){
                Oeparent = Oemail.parentElement;
                Oeparent.classList.add('input-error');
                error[3].classList.remove('hide');
            }else{
                Oeparent = email.parentElement;
                Oeparent.classList.remove('input-error');
                error[3].classList.add('hide');
                email.style.color = "#b0b9d8";  
            }
            if(!isValidEmail(email.value)){
                email.style.color = "red";
                eparent.classList.add('input-error');
                error[3].classList.remove('hide');
                error[3].innerHTML = 'Email format is not valid';
            }
        })
        // End Focus Out Email is valid
        // regex email
        function isValidEmail(email) {
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailPattern.test(email);
        }
    </script>

</body>
</html>