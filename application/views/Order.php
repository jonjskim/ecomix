<html>
<head>
	<title>e-Comix Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">
</head>
<body>
	<div id="wrapper">
		<div id="nav">
			<span class="welcome"> Welcome <?= $this->session->userdata['currentUser']['first_name'] ?> !</span>
			<a class="login" href="/Books">Home</a>
			<a class="marginleft20" href="/Login/logout">Logout</a>
		</div>
		<center>
			<h1>Admin Panel</h1>
			<h3>Remember to click SHIPPED after complete the order</h3>
			<br><br><br><br>
			<h2><?= $user['first_name'] . " " . $user['last_name'] ?></h2>
			<h2><?= $user['street_number'] ?></h2>
			<h2><?= $user['city'] . ", " . $user['state'] . " " . $user['zipcode'] ?></h2><br><br>
			<table>
				<tr><th>Book Name</th><th>Book ID</th></tr>
<?php   		foreach($orderLists as $orderList) {
?>
				<tr><td><?= $orderList['title']?></td><td><center><?= $orderList['book_id'] ?></center></td></tr>
<?php	        }
?>
			</table>
			<br><br><br>
			<a href="/Admin/shipped/<?= $user['user_id'] ?>"><button class="shipbtn">SHIPPED</button></a>
			

		</center>

	</div>
</body>
</html>



