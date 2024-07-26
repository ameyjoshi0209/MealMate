<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
echo "<script>alert('Logged out successfully');
                window.location.href='../index.php';</script>";
