<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cashfree Response</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .bton {
            background-color: #04AA6D;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: block;
            margin: 20px auto 30px;
            font-size: 16px;
            padding: 10px 38px;
            border-radius: 12px;
            transition: 0.7s;
        }

        .bton1 {
            background-color: #4481e3;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            padding: 9px 33px;
            border-radius: 12px;
            transition: 0.7s;
            position: absolute;
            top: 10px;
            right: 15px;
        }

        .bton1:hover {
            transition: 0.7s;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }

        .bton:hover {
            transition: 0.7s;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>

<body>
    <h1 align="center">MealMate Reciept</h1>

    <?php
    $secretkey = "SECRET-KEY-HERE";
    $orderId = $_POST["orderId"];
    $orderAmount = $_POST["orderAmount"];
    $referenceId = $_POST["referenceId"];
    $txStatus = $_POST["txStatus"];
    $paymentMode = $_POST["paymentMode"];
    $txMsg = $_POST["txMsg"];
    $txTime = $_POST["txTime"];
    $signature = $_POST["signature"];
    $data = $orderId . $orderAmount . $referenceId . $txStatus . $paymentMode . $txMsg . $txTime;
    $hash_hmac = hash_hmac('sha256', $data, $secretkey, true);
    $computedSignature = base64_encode($hash_hmac);
    if ($signature == $computedSignature) {
    ?>
        <div class="container">
            <div class="panel panel-success">
                <div class="panel-heading">Signature Verification Successful</div>
                <div class="panel-body">
                    <!-- <div class="container"> -->
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Order ID</td>
                                <td><?php echo $orderId; ?></td>
                            </tr>
                            <tr>
                                <td>Order Amount</td>
                                <td><?php echo $orderAmount; ?></td>
                            </tr>
                            <tr>
                                <td>Reference ID</td>
                                <td><?php echo $referenceId; ?></td>
                            </tr>
                            <tr>
                                <td>Transaction Status</td>
                                <td><?php echo $txStatus; ?></td>
                            </tr>
                            <tr>
                                <td>Payment Mode</td>
                                <td><?php echo $paymentMode; ?></td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td><?php echo $txMsg; ?></td>
                            </tr>
                            <tr>
                                <td>Transaction Time</td>
                                <td><?php echo $txTime; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- </div> -->

                </div>
            </div>
        </div>
    <?php
    } else {

    ?>
        <div class="container">
            <div class="panel panel-danger">
                <div class="panel-heading">Signature Verification failed</div>
                <div class="panel-body">
                    <!-- <div class="container"> -->
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Order ID</td>
                                <td><?php echo $orderId; ?></td>
                            </tr>
                            <tr>
                                <td>Order Amount</td>
                                <td><?php echo $orderAmount; ?></td>
                            </tr>
                            <tr>
                                <td>Reference ID</td>
                                <td><?php echo $referenceId; ?></td>
                            </tr>
                            <tr>
                                <td>Transaction Status</td>
                                <td><?php echo $txStatus; ?></td>
                            </tr>
                            <tr>
                                <td>Payment Mode</td>
                                <td><?php echo $paymentMode; ?></td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td><?php echo $txMsg; ?></td>
                            </tr>
                            <tr>
                                <td>Transaction Time</td>
                                <td><?php echo $txTime; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>

    <?php
    }
    if ($txStatus == "FAILED") {
    ?>
        <button type="button" class="bton" onclick="window.location.href='../index.php'">OK</button>
        <button type="button" class="bton1" onclick="window.print()">Print</button>
    <?php
    } else {
    ?>
        <button type="button" class="bton" onclick="window.location.href='../qrcode/qrcode.php'">OK</button>
        <button type="button" class="bton1" onclick="window.print()">Print</button>
    <?php
    }
    ?>
</body>

</html>