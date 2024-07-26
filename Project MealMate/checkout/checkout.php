<?php session_start();
if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">

        <style>
            * {
                box-sizing: border-box;
                font-family: 'Open Sans', sans-serif;
                font-size: 18px;
                /*   border: 1px solid black; */
                margin: 0;
                padding: 0;
            }

            body {
                margin: 0;
                padding: 10% 0;
                position: relative;
                min-height: 100vh;
                background: #527853;
                display: flex;
                justify-content: center;
                animation: fadein 5s;
                animation-fill-mode: forwards;
            }

            .fadeIn {
                animation: fadein 5s;
                animation-fill-mode: forwards;
            }

            @keyframes fadein {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            label {
                display: block;
            }

            /* Model Container */
            .model {
                width: 900px;
                height: 700px;
                background: #C6A969;
                color: white;
                position: relative;
                border-radius: 20px;
                overflow: hidden;
                animation-fill-mode: forwards;
            }

            .model:after {
                width: 30px;
                content: 'X';
                height: 30px;
                color: black;
                position: absolute;
                text-align: center;
                padding-top: 3px;
                top: 0;
                right: -30px;
                background-color: #bdc3c7;
            }

            @keyframes slideInFromLeft {
                0% {
                    transform: translateY(-100%);
                }

                100% {
                    transform: translateX(0);
                }
            }

            .room {
                width: 50%;
                height: 100%;
                background: url(https://images.unsplash.com/photo-1600335895229-6e75511892c8?auto=format&fit=crop&q=80&w=2787&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D) no-repeat center center;
                background-size: cover;
                display: inline-block;
                vertical-align: top;
                position: relative;
                border-radius: 10px;
                /* Added border-radius for rounded corners */
                overflow: hidden;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                /* Added box-shadow for 3D effect */
            }

            .text-cover {
                position: absolute;
                top: 0;
                width: 100%;
                background: rgba(0, 0, 0, 0.7);
                padding: 20px;
            }

            .text-cover>* {
                margin: 10px 0;
            }

            .text-cover h1 {
                font-size: 1.8rem;
            }

            .text-cover .price {
                color: #e67e22;
            }

            .text-cover .price span {
                font-size: 1.4rem;
                font-weight: 700;
            }


            .payment {
                width: 40%;
                height: 100%;
                color: #000000;
                display: inline-block;
                vertical-align: top;
                text-align: center;
            }

            .receipt-box {
                padding: 32px;
                border-bottom: 2px solid #527853;
                border-radius: 21px;
                background-color: #ecf0f1;
                margin-left: 48px;
                margin-top: 86px;
                width: 94%;
                height: 40%;
            }

            .payment-info {
                width: 76%;
                padding: 21px;
                border-radius: 16px;
                background-color: #ecf0f1;
                border-bottom: 2px solid #34495e;
                margin-top: 60px;
                margin-left: 78px;
            }

            .receipt-box h3,
            .payment-info h3 {
                margin-bottom: 1rem;
                color: #2c3e50;
                border-bottom: 2px solid #34495e;
            }


            input[type=text] {
                width: 100%;
                padding: 8px 10px 10px;
                margin: 15px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .btn {
                padding: 5px 18px;
                border: none;
                color: white;
                width: 88%;
                display: block;
                background: #527853;
                text-transform: uppercase;
                border-radius: 10px;
                margin-top: -35px;
                margin-left: 15px;
                /* Adjust the margin to move the button up */
            }

            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
            }

            .table td {
                font-size: 0.8rem;
                font-style: italic;
                padding: .25rem;
                vertical-align: top;

            }


            .table td:nth-child(2) {
                text-align: right;
            }
        </style>
    </head>

    <?php
    include '../connection.php';
    $records = mysqli_query($conn, "select * from users where username='" . $_SESSION['username'] . "'");
    $data = mysqli_fetch_array($records);
    ?>

    <body>
        <div class="model">
            <div class="room">
                <div class="text-cover">
                    <h1>MealMate</h1>
                </div>
            </div>
            <div class="payment">
                <div class="receipt-box">
                    <h3>Reciept Summary</h3>
                    <table class="table">
                        <tr>
                            <td style="font-size: large;">DELUXE = </td>
                            <td style="font-size: large;">₹4,600</td>
                        </tr>
                        <tr>
                            <td style="font-size: large;">Discount = </td>
                            <td style="font-size: large;">₹600</td>
                        </tr>
                        <tfoot>
                            <tr>
                                <td style="font-size: large;">Sum = </td>
                                <td style="font-size: large;">₹4,000</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="payment-info">
                    <h3>Payment Info</h3>
                    <form action="../payment/request.php" method="post">
                        <input type="hidden" name="appId" value="API-ID-HERE" />
                        <input type="hidden" name="orderId" value="<?php echo "ORDER_ID_" . rand(1111, 9999); ?>" />
                        <input type="hidden" name="orderAmount" value="4000" />
                        <input type="hidden" name="orderCurrency" value="INR" />
                        <input type="hidden" name="orderNote" value="" />
                        <input type="hidden" name="customerName" value="<?php echo $data['name']; ?>" />
                        <input type="hidden" name="customerPhone" value="<?php echo $data['phone']; ?>" />
                        <input type="hidden" name="customerEmail" value="<?php echo $data['username']; ?>" />
                        <input type="hidden" name="returnUrl" value="http://localhost/MealMate/payment/response.php" />
                        <input type="hidden" name="notifyUrl" value="" />

                        <!-- <form action="../qrcode/qrcode.php" method="post"> -->
                        <br><br>
                        <!-- <a href="#"> -->
                        <!-- <input type="text" name="qrtext" id="qrtext" placeholder="Enter QR Text" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" class="form-control" /> -->
                        <input class="btn" type="submit" name="sbt-btn" value="Pay Securely"></button>
                        <!-- <input type="submit" name="sbt-btn" value="QR Generate" class="btn btn-success" /> -->
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <script src="script.js"></script>
        <script>
            var model = document.querySelector(".model");

            function fadeIn() {
                console.log('fadein')
                model.className += " fadeIn";
            }
        </script>
    </body>

    </html>
<?php } ?>