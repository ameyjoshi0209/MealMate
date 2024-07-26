<style>
	body {
		background-color: #6a0ba1;
	}

	.bton {
		background-color: #04AA6D;
		border: none;
		color: white;
		text-align: center;
		text-decoration: none;
		display: block;
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 30px;
		margin-top: 20px;
		font-size: 16px;
		padding: 12px 15px;
		border-radius: 12px;
		transition: 0.7s;
	}

	.bton1 {
		background-color: #1086e0;
		border: none;
		color: white;
		padding: 10px 18px;
		text-align: center;
		text-decoration: none;
		display: block;
		font-size: 16px;
		border-radius: 12px;
		transition: 0.7s;
	}

	.bton:hover {
		transition: 0.7s;
		box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
	}

	.bton1:hover {
		transition: 0.7s;
		box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
	}

	a {
		text-decoration: none;
		color: white;

	}
</style>
<button class="bton1"><a href="../index.php">Back to home</a></button>


<?php
session_start();
require_once '../connection.php';
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcode = $path . time() . ".png";
$qrimage = time() . ".png";
$uname = $_SESSION['username'];
$qrtext = $_SESSION['username'];

if (isset($_SESSION['username'])) {
	$rec = mysqli_query($conn, "select name from users where username='$qrtext'");
	while ($row = $rec->fetch_assoc()) {
		$Name = $row['name']; ?>
		<h1 style="text-align: center;margin-top: -30px;margin-bottom: 10px;">QR Code Generated for <?php echo $row['name']; ?></h1>
	<?php
	}
}

if (isset($_REQUEST['sbt-btn'])) {
	$sql = "SELECT * FROM `qrcode` where username='$username' ";
	$query = mysqli_query($conn, "insert into qrcode (`id`,`qrimage`,`username`) Value  ( '', '$qrimage','$qrtext') ");
	// }
	if ($qrtext) {
	?>
		<script>
			alert("Data save successfully");
		</script>
<?php
	}
}
QRcode::png("http://localhost/MealMate/qrcode/get.php?data=" . $qrtext, $qrcode, 'H', 10, 10);

echo "<img src='" . $qrcode . "' height=490 style='position: relative; right:-24em;'>";
?>
<button class="bton"><a href="<?php echo $qrcode; ?>" download="<?php echo $Name; ?>">Download QR Code</a></button>
<h3><?php echo "http://localhost/MealMate/qrcode/get.php?data=" . $qrtext; ?></h3>