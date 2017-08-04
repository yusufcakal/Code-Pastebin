<?php 

	require "database.php";

	$code = new Database;

	$id = $_GET['id'];

	$data = $code->selectFunction($id);

	$url =  "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'].""; 

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Insert and Sharing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Bitter:700|Roboto&amp;subset=latin-ext" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="css/prism.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div class="container">

	<?php if ($data) { ?>

		<div class="row">

		<h4 class="alert alert-success"> Paylaşmak için <a href=""> <?php echo $url; ?> </a> kopyalayabilirsiniz.  </h4>

			<div class="col-md-12">
				<h3><?php echo $data['title']; ?></h3>
				<h4><?php echo $data['name']; ?> tarafından <?php echo $data['date']; ?>  tarihinde eklendi. </h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<pre style="margin-bottom: 20px;" class="line-numbers language-<?php echo $data['language']; ?>"> <!-- kod renklendirme -->
 					<code   class="language-<?php echo $data['language']; ?>" ><?php echo $data['code']; ?></code>
 				</pre>
			</div>
		</div>

	<?php	} else{ ?>
				<div class="row">
				<div class="col-md-12">
					<h2> Sayfa Bulunamadı </h2>
				</div>
			</div>
	<?php  	} ?>

	</div>

	<script src="js/prism.js"></script>
	<script type="text/javascript">
	
	$( document ).ready(function() {
    	document.querySelector("code > span").style.marginLeft = "-155px";
	});
		
	</script>
</body>
</html>
