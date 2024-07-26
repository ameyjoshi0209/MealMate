<?php session_start();
include '../connection.php';
if (!empty($_SESSION["aname"])) { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Owner Side</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/admin_home.css" />
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-1 pb-1">
            <a class="navbar-brand text-primary" href="../Admin/admin_home.php" style="margin-left: 20px;font-size:25px;">MealMate®</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            </div>
            <a href="../admin/report.html"><button style="margin-right: 16px;padding:7px 25px" class="btn btn-warning">Generate Report</button></a>
            <div class="align">
                <div class="btn-group dropstart">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none;">
                        <img src="https://cdn-icons-png.flaticon.com/512/236/236831.png" width="40" height="40" class="rounded-circle">
                    </button>
                    <ul class="dropdown-menu">
                        <h6 class="dropdown-header"><?php echo $_SESSION["aname"] ?></h6>
                        <li><a class="dropdown-item" href="../admin/admin_logout.php"><img src="../assets/img/box-arrow-left.svg" height="17" width="25"> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>

        <h1 style="display: flex;justify-content: center;font-family: Google Sans;color:bisque;">Registered User Information</h1><br>

        <div class="container-fluid">
            <div class="row mt-3 g-3">
                <?php
                $records = mysqli_query($conn, "select * from users");
                while ($data = mysqli_fetch_array($records)) {
                ?>
                    <div class="col-sm-4">
                        <div class="card" id="usr-card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $data['name']; ?></h5>
                                <h6><i>email: <?php echo $data['username']; ?></i></h6>
                                <p class="card-text">Mob. No.: <?php echo $data['phone']; ?></p>
                                <a href="../admin/get_admin.php?data=<?php echo $data["username"] ?>"><button class=" btn mt-3 edit-btn">More Details</button></a>
                            </div>
                        </div>
                    </div>
                <?php }  ?>
            </div>
        </div>
        <br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } else {
    echo "<script>window.location.href='../Admin/admin_login.php';</script>";
} ?>