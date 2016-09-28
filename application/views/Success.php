<?php 
$count = 0;
foreach($carts as $cart){
	$count++;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Comix</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">
</head>
<body>
	<CENTER><h1>e-Comix: The Best Exotic Comic Books Collection</h1></CENTER>

	<div id="wrapper">
		<?php $this->load->view('search');
		?>
		<div id="nav">
			<span class="welcome"> Welcome <?= $this->session->userdata['currentUser']['first_name'] ?> !</span>
			<a class="login" href="/Books/viewCart">Your Cart(0)</a>
			<a class="marginleft20" href="/Books">Home</a>
			<a class="marginleft20" href="/Login/logout">Logout</a>
		</div>
		<br><br><br>
		<center>
			<h2>Thank you <?= $this->session->userdata['currentUser']['first_name'] ?> for your business. Confirmation email will be sent to <?= $this->session->userdata['currentUser']['email'] ?></h2>
			<h3><a href="/Login/logout">Logout</a><span class="marginleft20">or</span><a class="marginleft20" href="/Books">Continue Shopping</a> </h3> 

		</center>
	</div>
</body>
</html>