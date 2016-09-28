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
			
		<div id="main">
			<div id="leftcontent">
				<img style="height: 650px; width: 500px;" src="/assets/images/<?= $book['id']?>.png">
			</div>
			<div id="rightcontent">
				<center>
					<h2><?= $book['title']?></h2>
					<h3><?= $book['author']?></h3>
					<a href="/Books/addBookFromDetail/<?= $book['id'] ?>"><button>Add to Cart</button></a><br><br>
				</center>
				<h3>Reviews</h3>
				<div id="reviews">
<?php

					if($this->session->flashdata("review_messages")) {
						echo $this->session->flashdata("review_messages");
					}
	 				foreach($reviews as $review) {
?>						<div>
							<h3><?= $review['first_name'] . " " . $review['last_name'] . " review:"  ?></h3>
<?php
							$created_at = new DateTime($review['created_at']);
				 			$time_zone =  new DateTimeZone('America/Los_Angeles');
				 			$created_at->setTimezone($time_zone);
				 			echo date_format($created_at,'M d 20y , g:i A T') ;
				 			echo "<br> Rating: ";
				 			for ($i=1; $i<= $review['rating']; $i++) {
								echo '<img style="height: 15px; width: 15px;" src="/assets/images/yellowstar.png">';
							}
							for ($i=1; $i<= 5 - $review['rating']; $i++) {
								echo '<img style="height: 15px; width: 15px;" src="/assets/images/whitestar.png">';
							}
?> 	
							<p><?= $review['content'] ?></p>
						</div>
<?php   			}
?>





				</div>	
				<div>
					<form action="/Books/addReview/<?= $book['id']?>" method="post">
						<h3>Add a review</h3>
						<label class="rating" for="rating">Rating: </label>
						<select class="rating" name="rating">
							<option value="5">5</option>
							<option value="4">4</option>
							<option value="3">3</option>
							<option value="2">2</option>
							<option value="1">1</option>
					
						</select><br><br>
						<textarea class="addreview" name="review" placeholder="Write a Review"></textarea><br><br>
						<input type="submit" name="submit" value="Add Review">
					</form>
				</div>
			</div>	
				
		</div>
	</div>
</body>
</html>