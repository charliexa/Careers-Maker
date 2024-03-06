<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/Signup.css">
    <title>Signe up</title>
    <style>
        <?php require "./styles/Signup.css"; ?>
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Sing up</h1>
        <div>
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
            <div class="check">
                <label for=""><input type="radio" name="choice" value="user">user</label>
                <label for=""><input type="radio" name="choice" value="admin">admin</label>
            </div>
            <div class="submit-cont" style="display: flex; align-items: center;justify-content: center;">
                <input type="submit" name="submit" id="submit">
            </div>
        </div>
    </form>
</body>
</html>