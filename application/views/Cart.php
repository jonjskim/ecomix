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
			<a class="login" href="/Books/viewCart">Your Cart(<?= $count ?>)</a>
			<a class="marginleft20" href="/Books">Home</a>
			<a class="marginleft20" href="/Login/logout">Logout</a>
		</div>

		<div id="cart">
			<h2><?= $this->session->userdata['currentUser']['first_name'] . " "?>, this is your list:</h2><br><br>
			<table>
				<thead>
					<tr>
						<th></th>
						<th class="carttitle">Book(s)</th>
						<th>Price</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
<?php   		$count = 0;
				$sum = 0;
				foreach($carts as $cart) {
					$count++;
					$sum = $sum + $cart['price'];
?>
					<tr>
						<td class="count"><?= $count?></td>
						<td class="carttitle"><a class="title" href="/Books/viewBook/<?= $cart['id'] ?>"><?= $cart['title']?></a></td>
						<td>$<?= $cart['price'] ?></td>
						<td><a class="remove" href="/Books/removeCart/<?= $cart['id'] ?>">Remove</a></td>
					</tr>

<?php				}
					$sumten = $sum * 100;
?>				
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td class="border">Total</td>
						<td class="border"><?= $sum ?></td>
						<td></td>
					</tr>
				</tfoot>
			</table>
		</div>
<?php
		if ($address) {
?>
			<center><h3>Shipping Address</h3>
				<table>
					<tr><td>Street Number</td><td>:</td><td><?= $address['street_number'] ?> </td></tr>
					<tr><td>City</td><td>:</td><td><?= $address['city'] ?> </td></tr>
					<tr><td>State</td><td>:</td><td><?= $address['state'] ?> </td></tr>
					<tr><td>Zip Code</td><td>:</td><td><?= $address['zipcode'] ?> </td></tr>
				</table>
			</center>
<?php   } else {
?>
			<center><h3>Please Enter your shipping address</h3>
				<form action="/Books/insertAddress" method="post">
					<table>
						<tbody>
							<tr><td><label for="street_number">Street Number</label></td><td></td><td><input type="text" name="street_number"></td></tr>
							<tr><td><label for="city">City:</label></td><td></td><td><input type="text" name="city"></td></tr>
							<tr><td><label for="state">State:</label></td><td></td><td><input type="text" name="state"></td></tr>
							<tr><td><label for="zipcode">Zipcode:</label></td><td></td><td><input type="text" name="zipcode"></td></tr>
						</tbody>
					</table>
					<input class="button" type="submit" value="Add my Address">	
				</form>
			</center>




<?php 	}
?>











		<div class='web'>
			<form action="/StripePayment" method="POST">
				<script src="https://checkout.stripe.com/checkout.js"
				class="stripe-button"
				data-key="pk_test_fJEA20hX7iozsyN2bM826fUh"
				data-name="ecomix.com"
				data-description="Payment of <?= $sum ?>"
				data-amount="<?= $sumten ?>" />
				</script>
			</form>
		</div>
	</div>
</body>
</html>



<table>
				<tr><td></td><td></td></tr>
			</table>