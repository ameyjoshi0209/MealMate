<?php include '../partials/header.php'; ?>
<?php
session_start();
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../connection.php';
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $phone = $_POST["phone"];
    $data = array($name, $username, $password, $cpassword, $phone);

    if (($password == $cpassword) && $showAlert == false && !empty($username) && !empty($password)) {
        $sql = "INSERT INTO `users` ( `name`, `username`,`password`, `phone`, `dt`) VALUES ( '$name', '$username', '$password', '$phone', current_timestamp());";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            header("location: login.php");
            $_SESSION['status'] = "account created successfully";
        }
    } else {
        $showError = "password do not match";
    }
}
?>
<?php
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your account is created and u can login now.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}

if ($showError) {
    // $_SESSION[$showError] = 'sas';        
    echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>Error</strong> ' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}
?>
<style>
    /* login and register */
    img {
        width: 100%;
    }

    .login {
        height: 1000px;
        width: 100%;
        background: radial-gradient(#653d84, #332042);
        position: relative;
    }

    .login_box {
        width: 1050px;
        height: 600px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        border-radius: 10px;
        box-shadow: 1px 4px 22px -8px #0004;
        display: flex;
        overflow: hidden;
    }

    .login_box .left {
        width: 41%;
        height: 100%;
        padding: 25px 25px;

    }

    .login_box .right {
        width: 59%;
        height: 100%
    }

    .left .top_link a {
        color: #452A5A;
        font-weight: 400;
    }

    .left .top_link {
        height: 20px
    }

    .left .contact {
        display: flex;
        align-items: center;
        justify-content: center;
        align-self: center;
        height: 100%;
        width: 73%;
        margin: auto;
    }

    .left h3 {
        text-align: center;
        margin-bottom: 40px;
    }

    .left input {
        border: none;
        width: 80%;
        margin: 15px 0px;
        border-bottom: 1px solid #4f30677d;
        padding: 7px 9px;
        width: 100%;
        overflow: hidden;
        background: transparent;
        font-weight: 600;
        font-size: 14px;
    }

    .left {
        background: linear-gradient(-45deg, #dcd7e0, #fff);
    }

    .submit {
        border: none;
        padding: 15px 70px;
        border-radius: 8px;
        display: block;
        margin: auto;
        margin-top: 120px;
        background: #583672;
        color: #fff;
        font-weight: bold;
        -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    }



    .right {
        background: url(https://cdn.dribbble.com/users/988448/screenshots/5240042/icon_cadastro_v5.gif);
        background-position: center;
        position: relative;
    }

    .right .right-text {
        height: 100%;
        position: relative;
        transform: translate(0%, 45%);
    }

    .right-text h2 {
        display: block;
        width: 100%;
        text-align: center;
        font-size: 50px;
        font-weight: 500;
    }

    .right-text h5 {
        display: block;
        width: 100%;
        text-align: center;
        font-size: 19px;
        font-weight: 400;
    }

    .right .right-inductor {
        position: absolute;
        width: 70px;
        height: 7px;
        background: #fff0;
        left: 50%;
        bottom: 70px;
        transform: translate(-50%, 0%);
    }

    .top_link img {
        width: 28px;
        padding-right: 7px;
        margin-top: -3px;
    }
</style>

<section class="login">
    <div class="login_box">
        <div class="left">
            <div class="top_link"><a href="../index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div>
            <div class="contact">
                <form action="register.php" method="post">
                    <h3>SIGN UP</h3>

                    <input type="text" class="form-control" id="name" name="name" placeholder="name" aria-describedby="name" required>
                    <input type="number" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="form-control" id="phone" name="phone" placeholder="phone" aria-describedby="emailHelp" required>
                    <input type="email" class="form-control" id="username" name="username" placeholder="email" aria-describedby="emailHelp" required>
                    <input type="password" pattern=".{4,10}" required title="4 to 10 characters" class="form-control" id="password" name="password" placeholder="password" aria-describedby="emailHelp" required>
                    <input type="password" pattern=".{4,10}" required title="4 to 10 characters" class="form-control" id="cpassword" name="cpassword" placeholder="cpassword" aria-describedby="emailHelp" required>



                    <button class="submit">LET'S GO</button>
                </form>
            </div>
        </div>
        <div class="right">
            <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
        </div>
    </div>
</section>