<?php
session_start();
unset($_SESSION["aname"]);
unset($_SESSION["apass"]);
echo "<script>alert('Logged out successfully');
                window.location.href='../Admin/admin_login.php';</script>";
