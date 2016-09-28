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
			<span class="welcome"> Welcome Guest! e-Comix is the best place to meet your comic book needs!</span>
			<a class="logreg" href="/login">Login/Registration</a>
		</div>
		

		<div id="main">
<?php 
			foreach ($books as $book) {
?>	
				<div class="book">
					<center><a href="/login"><img src="/assets/images/<?= $book['id']?>.png"></a></center>
					<center><a  class="title" href="/login"><p><?= $book['title']?></a></p>
					<p class="author">by <?=  $book['author'] ?></p></center>
					<center><p class="price">Price: $<?= $book['price'] ?></p></center>
				</div>
<?php  	
			}
?>
		</div>
	</div>
</body>
</html>

