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
			<h3>Please convert image to .png before upload</h3>
		</center>

<?php		
			if($this->session->flashdata("messages")) {
				echo $this->session->flashdata("messages");
			}
?>
		<div id="upload">
		<center><h2>Add new book</h2></center>
			<?php echo form_open_multipart('Admin/do_upload');?>
			<table>
				<tbody>
					<tr><td><label for="title">Title</label></td><td>:</td><td><input type="text" name="title"></td></tr>
					<tr><td><label for="author">Author</label></td><td>:</td><td><input type="text" name="author"></td></tr>
					<tr><td><label for="price">Price</label></td><td>:</td><td><input type="text" name="price"></td></tr>
				</tbody>
			</table>
			<h4>Book image: </h4>

			<input class="uploadbtn" type="file" name="userfile" size="20" />

			<br><br>

			<input class="uploadbtn" type="submit" value="upload" />

			</form>
		</div>

		<div id="order">
			<center><h2>New order(s)</h2></center>
<?php 		foreach($orders as $order) {
?>		
				<center><h4><a href="/Admin/viewOrderById/<?= $order['id']?>"><?= $order['first_name'] . " " . $order['last_name'] ?> </a></h4></center>
<?php   	}
?>  		
		</div>
	</div>
</body>
</html>



