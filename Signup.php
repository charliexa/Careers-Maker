<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/Signup.css">
    <title>Signe up</title>
    <style>
        <?php 
            include "./styles/Signup.css";
            include "./styles/main.css";
        ?>
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Create Account</h1>
        <div class="choices">
            <button id="user" class="active">User Account</button>
            <button id="company" >Company Account</button>
        </div>
        <div id="userForm">
            <div>
                <fieldset>
                    <legend>Full Name</legend>
                    <input type="text" name="name" id="name">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Email</legend>
                    <input type="email" name="email" id="email">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name="password" id="password">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Confirm password</legend>
                    <input type="password" name="Cpassword" id="Cpassword">
                </fieldset>
            </div>
            <div class="submit-cont" style="display: flex; align-items: center;justify-content: center;">
                <input type="submit" name="submit" id="submit">
            </div>
        </div>
        <div id="companyForm" class="hide">
            <div>
                <fieldset>
                    <legend>Organization name</legend>
                    <input type="text" name="name" id="name">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Email</legend>
                    <input type="email" name="email" id="email">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name="password" id="password">
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <legend>Confirm password</legend>
                    <input type="password" name="Cpassword" id="Cpassword">
                </fieldset>
            </div>
            <div class="submit-cont" style="display: flex; align-items: center;justify-content: center;">
                <input type="submit" name="submit" id="submit">
            </div>
        </div>
    </form>
    <script>
        //Start type signUp choices
        let userBtn = document.getElementById("user");
        let companyBtn = document.getElementById("company");
        let userForm = document.getElementById("userForm");
        let companyForm = document.getElementById("companyForm");
        console.log(userBtn);
        console.log(companyBtn);
        userBtn.addEventListener("click", (e)=>{
            e.preventDefault()
            userBtn.classList.add("active");
            companyBtn.classList.remove("active");
            userForm.classList.remove("hide");
            companyForm.classList.add("hide");
        })
        companyBtn.addEventListener("click", (e)=>{
            e.preventDefault()
            userBtn.classList.remove("active");
            companyBtn.classList.add("active");
            userForm.classList.add("hide");
            companyForm.classList.remove("hide");
        })
        //End type signUp choices
    </script>
</body>
</html>