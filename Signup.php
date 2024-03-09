<?php
    include('./config/db_connect.php');

    $errors = ["name" => "This Name is Not Valid","email" => "This Email Is Not Valid!", "password" => ""];

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
                <fieldset>
                    <legend>Full Name</legend>
                    <input type="text" name="name" id="name" value="">
                </fieldset>
                <p class="error" style="display: none;"></p>
            </div>
            <div id="orgName" class="hide">
                <fieldset>
                    <legend>Organization name</legend>
                    <input type="text" name="Oname" id="Oname" value="">
                </fieldset>
                <p class="error" style="display: none;"></p>
            </div>
            <div>
                <fieldset>
                    <legend>Email</legend>
                    <input type="email" name="email" id="email" value="">
                </fieldset>
                <p class="error" style="display: none;"></p>
            </div>
            <div>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name="password" id="password">
                </fieldset>
                <p class="error" style="display: none;"></p>
            </div>
            <div>
                <fieldset>
                    <legend>Confirm password</legend>
                    <input type="password" name="Cpassword" id="Cpassword">
                </fieldset>
                <p class="error2" style="display: none;"></p>
            </div>
            <div class="submit-cont" style="display: flex; flex-direction: column; align-items: center;justify-content: center;">
                <input type="submit" name="submit" id="submit" value="Sign Up">
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
        let error = document.querySelectorAll(".error");
        let error2 = document.querySelector(".error2");
        let email = document.getElementById('email');
        let password = document.getElementById('password');
        console.log(userBtn);
        console.log(companyBtn);
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
        let Cpassword = document.getElementById('Cpassword');
        Cpassword.addEventListener("focusout", ()=>{
            let password = document.getElementById('password');
            if(Cpassword.value !== password.value){
                par1 = password.parentElement;
                par2 = Cpassword.parentElement;
                par1.classList.add('focusout');
                par2.classList.add('focusout');
            }else{
                par1 = password.parentElement;
                par2 = Cpassword.parentElement;
                par1.classList.remove('focusout');
                par2.classList.remove('focusout');
            }
        })
        //End type signUp choices
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