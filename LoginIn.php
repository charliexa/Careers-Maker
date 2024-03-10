<?php 

    include('./config/db_connect.php');

    session_start();

    // if (isset($_SESSION['type'])) {
    //     header('Location: Home.php');
    // }

    $is_valide = '';

    $errors = ["email" => "This Email Is Not Valid!", "password" => ""];

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
                $_SESSION["id"] = $row["id"];
                $_SESSION["Oemail"] = $row["email"];
                $_SESSION["password"] = $row["password"];
                $_SESSION["type"] = $row["type"];
                header('Location: Home.php');
            } else {
                $is_valide = 'no';
            }

        } else if (!empty($email) && empty($Oemail)) {

            // Try The Admins DB First so if its an admin he gets logged in first
            $sqladmin = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";

            $resul = mysqli_query($conn, $sqladmin);

            if (mysqli_num_rows($resul) == 1) {
                // Store Admin's Data in A session
                $row = mysqli_fetch_assoc($result);
                $_SESSION["id"] = $row["id"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["password"] = $row["password"];
                $_SESSION["type"] = $row["type"];
                header('Location: Home.php');
            } else {
                // its not an admin so logged him in as a user
                $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                $result = mysqli_query($conn, $sql);
            }

            if (mysqli_num_rows($result) == 1) {
                echo "Login successful!";
                header('Location: Home.php');
            } else {
                echo "Invalid email or password.";
                $is_valide = 'no';
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
    <form action="" method="post" id="form">
        <h1>Welcome Back!</h1>
        <div class="choices">
            <button id="user" class="active" onclick="Reset()">User Account</button>
            <button id="company" onclick="Reset()">Company Account</button>
        </div>
        <div>
        <div id="userName">
                <fieldset>
                    <legend>Email</legend>
                    <input oncfo type="text" name="email" id="email" value="" >
                </fieldset>
                <p class="error hide"></p>
            </div>
            <div id="orgName" class="hide">
                <fieldset>
                    <legend>Email</legend>
                    <input type="text" name="Oemail" id="Oemail" value="">
                </fieldset>
                <p class="error hide"></p>
            </div>
            <div>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name="password" id="password">
                </fieldset>
                <p class="error2 hide"></p>
            </div>
            <div class="submit-cont" style="display: flex; flex-direction: column; align-items: center;justify-content: center;">
                <input type="submit" name="submit" value="Login In" id="submit" onclick="IsValidInfos()">
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

        userBtn.addEventListener("click", (e)=>{
            e.preventDefault()
            inputs.forEach(ele => {
                ele.value = "";
                eleParent = ele.parentElement;
                eleParent.classList.remove('input-error');
                let error = document.querySelectorAll(".error");
                error[0].classList.add('hide');
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
                eleParent = ele.parentElement;
                eleParent.classList.remove('input-error');
                let error = document.querySelectorAll(".error");
                error[1].classList.add('hide');
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
        let error = document.querySelectorAll(".error");
        let error2 = document.querySelector(".error2");
        let email = document.getElementById('email');
        let password = document.getElementById('password');
        email.addEventListener("focusout", ()=>{
            if(email.value === ""){
                eparent = email.parentElement;
                eparent.classList.add('input-error');
                error[0].classList.remove('hide');
                
            }else{
                eparent = email.parentElement;
                eparent.classList.remove('input-error');
                error[0].classList.add('hide');
                email.style.color = "#b0b9d8";
            }
            if(!isValidEmail(email.value)){
                email.style.color = "red";
                eparent.classList.add('input-error');
                error[0].classList.remove('hide');
                error[0].innerHTML = 'Email format is not valid';
            }
        })
        let Oemail = document.getElementById('Oemail');
        Oemail.addEventListener("focusout", ()=>{
            if(Oemail.value === ""){
                Oeparent = Oemail.parentElement;
                Oeparent.classList.add('input-error');
                error[1].classList.remove('hide');
            }else{
                Oeparent = email.parentElement;
                Oeparent.classList.remove('input-error');
                error[1].classList.add('hide');
                email.style.color = "#b0b9d8";  
            }
            if(!isValidEmail(email.value)){
                email.style.color = "red";
                eparent.classList.add('input-error');
                error[1].classList.remove('hide');
                error[1].innerHTML = 'Email format is not valid';
            }
        })
        // End Focus Out Email is valid
        // regex email
        function isValidEmail(email) {
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailPattern.test(email);
        }
        // regex email
        ///////////////
        function IsValidInfos() {
            let valid = "<?php echo $is_valide?>";
            if(valid !== ""){
                error[0].classList.remove('hide');
                error[1].classList.remove('hide');
                error2.classList.remove('hide');
                error[0].innerHTML = "Wrong Email or Password!";
                error[1].innerHTML = "Wrong Email or Password!";
                error2.innerHTML = "Wrong Email or Password!";
                password.parentElement.classList.add('input-error');
                email.parentElement.classList.add('input-error');
            }
        }
        function Reset() {
            password.parentElement.classList.remove('input-error');
            email.parentElement.classList.remove('input-error');
            error[0].classList.remove('hide');
            error[1].classList.remove('hide');
            error2.classList.remove('hide');
        }
        ///////////////
    </script>
</body>
</html>