<style>
    table {
      border-collapse: collapse;
      width: 100%;
      font-family: Arial, sans-serif;
    }

    th {
      background-color: #A9A9A9;
      text-align: center;
      padding: 20px;
    }

    td {
      border: 2px solid #dddddd;
      padding: 15px;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    .status {
      display: inline-block;
      padding: 5px 10px;
      border-radius: 5px;
      color: white;
    }

    .active {
      background-color: green;
    }

    .waiting {
      background-color: yellow;
      color: black;
    }

    .delete {
      float: right;
      color: red;
      cursor: pointer;
    }
</style>
<html>

<body bgcolor="#FFF5EE">
  <h2>
    <center>Report </center>
    <button style="background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  position: relative;
  margin-top: -30px;
  margin-left: 90%;
  padding: 10px 28px;
  text-align: center;
  text-decoration: none;
  font-size: 16px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
      onClick="window.print()">Print</button>
  </h2>
</body>

</html>
<?php
require_once 'connection.php';

if ($_POST) {

  $startDate = $_POST['startDate'];
  // $date = DateTime::createFromFormat('d/m/Y', $startDate);
  $date = DateTime::createFromFormat('d-m-Y H:i:s', $startDate);
  // $start_date = $date->format("Y-m-d");
  $start_date = $date->format("'Y-m-d h:i:s'");


  $endDate = $_POST['endDate'];
  // $format = DateTime::createFromFormat('d/m/Y', $endDate);
  $format = DateTime::createFromFormat('d-m-Y H:i:s', $endDate);
  // $end_date = $format->format("Y-m-d");
  $end_date = $format->format("'Y-m-d h:i:s'");

  $sql = "SELECT * FROM users WHERE dt >= '$start_date' AND dt <= '$end_date'";
  $query = $conn->query($sql);

  $table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Client Name</th>
			<th>Username</th>
			<th>Contact</th>
			<th>Starting Date</th>
		</tr>

		<tr>';
  $totalAmount = 0;
  while ($result = $query->fetch_assoc()) {
    $table .= '<tr>
				<td><left>' . $result['name'] . '</left></td>
				<td><left>' . $result['username'] . '</left></td>
				<td><left>' . $result['phone'] . '</left></td>
				<td><left>' . $result['dt'] . '</left></td>
			</tr>';

    if ($result = mysqli_query($conn, $sql)) {
      // Return the number of rows in result set
      $rowcount = mysqli_num_rows($result);
      $totalAmount = $rowcount;
    }




    //$totalAmount = mysqli_num_rows($result);
  }
  $table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total Number of Users</center></td>
			<td><center>' . $totalAmount . '</center></td>
		</tr>
	</table>
	';

  echo $table;
}

?>