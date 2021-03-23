<?php

//	Includes

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();

// print_r($articles);

?>
<html>
	
	<head>
		<title>GPB CMS</title>
		<link rel="stylesheet" href="assets/styles.css" />
	</head>
	
	<body>
	<?php
	?>
	<div class="container">
			<a href="index.php" id="logo"> GPB CMS </a>
		<ol>
			<?php foreach ($articles as $article){ ?>
				<li>
					<a href="article.php?id=<?php echo $article['article_id']; ?>">
						<?php echo $article['article_title']; ?>
					</a>
					- 
					<small>
						posted <?php echo date('l jS', $article['article_timestamp']); ?>
					</small>
				</li>
			<?php } ?>
		</ol>
		
		<br />
		<br />
		
		<small>
			<a href="././admin">&larr; admin </a>
		</small>
	</div>
	
	</body>

</html>
