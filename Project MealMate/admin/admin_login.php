<?php
session_start();
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../connection.php';
    $aname = $_POST["username"];
    $apass = $_POST["password"];
    // $apass1 = $_POST["password1"];

    $sql = "select * from admin where username='$aname' AND password='$apass'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        // session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['aname'] = $aname;
        $_SESSION['apass'] = $apass;
        $_SESSION['time'] = time();
        header("location: ../admin/admin_home.php");
        $_SESSION['status1'] = "you logged in successfully";
    }
} else {
}
?>

<?php include '../partials/header.php' ?>
<?php

if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your logged in to a system.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}

if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>Error</strong> ' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}

if (isset($_SESSION['status'])) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> ' . $_SESSION['status'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    // echo $_SESSION['status'];
    unset($_SESSION['status']);
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
        background: url(https://sales.webtel.in/images/Login-page-character1.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        color: #fff;
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
            <div class="contact">
                <form action="admin_login.php" method="post">
                    <h3>Owner Login</h3>
                    <input class="form-control" placeholder="username" id="username" name="username" aria-describedby="emailHelp">
                    <input type="password" class="form-control" placeholder="password" name="password" id="password">
                    <button type="submit" class="submit">Log In</button>
                </form>
            </div>
        </div>
        <div class="right">
        </div>
    </div>
</section>