<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;

		// display article
if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$data = $article -> fetch_data($id);
		
?>
<!-- create the HTML page -->
<html>
	<head>
		<title>GPB CMS</title>
	<link rel="stylesheet" href="assets/styles.css" />
	</head>
	
	<body>
	
		<div class="container">
			<a href="index.php" id="logo"> GPB CMS </a>
			<h4>
				<?php echo $data['article_title'];?>
				- 
				<small>
						posted <?php echo date('l jS', $data['article_timestamp']); ?>
				</small>
			</h4>
			<p><?php echo  $data['article_content']; ?></p>
			<a href="index.php">&larr; Back</a>
		</div>
	</body>
	
</html>
<!-- END of hml page --  >
		
<?php
		
		
} else {
	header('Location: index.php');
	exit();
	}
?>