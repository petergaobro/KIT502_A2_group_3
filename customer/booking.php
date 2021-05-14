<!-- KIT 502 Group 3 last edit 26/03/2021 -->
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">

	<title>KIT_502_web_dev</title>
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/booking.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
	<!---------------part 1-------------------->
	<div class="covid_div">
		<aside class="covid_notice">
			<a class="covid_news" href="https://www.australia.gov.au/">
				<span class="covid_words">Get the latest on our COVID-19 response</span>
			</a>
		</aside>
	</div>

	<div class="log_msg">
	</div>
	<nav class="nav_bar">
		<div class="logo">
			<p>UTas</p>
			<p>Accommodation</p>
		</div>
		<div class="nav_links">
			<ul class="list_nav">
				<li><a class="active_nav" href="../home.php">Home</a></li>
				<li><a class="active_nav" href="./booking.php">Book</a></li>
				<li><a class="active_nav" href="#">Customer</a>
					<div class="sub_user">
						<ul>
							<li><a href="./customer_login.php">Login</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
		<script src="../js/toggle_bar.js" defer></script>
	</nav>
	<div class="Booking_form">
		<?php include('../db_conn.php');
		$sql = "SELECT * FROM house WHERE 1 ";
		$b_city = "";
		$b_checkin = "";
		$b_checkout = "";
		$b_guest = "";
		$house_image="";
		// city
		if (isset($_POST['b_city']) && !empty($_POST['b_city'])) {
			$b_city = $_POST['b_city'];
			$sql .= "AND house_city LIKE '%$b_city%' ";
		}
		// check in date
		if (isset($_POST['b_checkin']) && !empty($_POST['b_checkin'])) {
			$b_checkin = $_POST['b_checkin'];
			$sql .= "AND house_checkin <= '$b_checkin'";
		}
		// check out date
		if (isset($_POST['b_checkout']) && !empty($_POST['b_checkout'])) {
			$b_checkout = $_POST['b_checkout'];
			$sql .= "AND house_checkout >= '$b_checkout'";
		}
		// guest
		if (isset($_POST['b_guest']) && !empty($_POST['b_guest'])) {
			$b_guest = $_POST['b_guest'];
			$sql .= "AND house_guest LIKE '%$b_guest%' ";
		}
		$result = mysqli_query($db, $sql);
		?>
		<form class="Bk_form_tab" method="post" action="booking.php">
			<div class="Bk_tab">
				<i class="fa fa-calendar" aria-hidden="true"></i>

				<select id="form-select" name="b_city" placeholder="House city" value="<?php echo $b_city; ?>">
					<option value="">City</option>
					<option value="Sydney">Sydney</option>
					<option value="Newcastle">Newcastle</option>
					<option value="Wollongong">Wollongong</option>
					<option value="Bendigo">Bendigo</option>
					<option value="Brisbane">Brisbane</option>
					<option value="Gold Coast">Gold Coast</option>
					<option value="Adelaide">Adelaide</option>
					<option value="Hobart">Hobart</option>
					<option value="Melbourne">Melbourne</option>
					<option value="Perth">Perth</option>
				</select>
			</div>
			<div class="Bk_tab">
				<input type="text" class='form-control' placeholder="Check in date" id="checkin" name="b_checkin" value="<?php echo $b_checkin; ?>">
			</div>
			<div class="Bk_tab">
				<input type="text" class='form-control' placeholder="Check out date" id="checkout" name="b_checkout" value="<?php echo $b_checkout; ?>">
			</div>
			<div class="Bk_tab">
				<input type="number" class='form-control' placeholder="Select guest" min="1" id="b_guest" name="b_guest" value="<?php echo $b_guest; ?>">
			</div>
			<div class="Bk_tab">
				<input type="submit" class="Search_btn" value="Search" name="search_client">
			</div>
		</form>
	</div>	
	<div class="Room_type" id="Room_type">
		<table class="Room_bk">
			<?php while ($row = mysqli_fetch_object($result)) { ?>
				<tr>
					<td>
						<div class="img_room">
							<img src=".<?php echo $row->house_image;?>" />
						</div>
					</td>
					<td>
						<h3>City</h3>
						<?php echo $row->house_city ?>
					</td>
					<td>
						<h3>Check in date</h3>
						<?php echo $row->house_checkin ?>
					</td>
					<td>
						<h3>Check out date</h3>
						<?php echo $row->house_checkout ?>
					</td>

					<td>
						<h3>Guest</h3>
						<?php echo $row->house_guest ?>
					</td>
					<td>
						<strong id="strong">Price</strong>
						<?php echo $row->house_price ?>
						<a class="active_nav" href="./login_book.php">Book now</a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="../js/booking.js"></script>
	<footer>
		<p>Copyright &copy; , KIT_502 Assignment_1</p>
	</footer>
</body>
</html>