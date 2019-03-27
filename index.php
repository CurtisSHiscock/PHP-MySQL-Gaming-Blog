<!-- Include config -->
<?php require_once('./config.php'); ?>
<!-- Include header information -->
<?php require_once(ROOT_PATH. '/includes/header.php'); ?>
<!-- Include navbar -->
<?php require_once(ROOT_PATH . '/includes/navbar.php'); ?>
<!-- Use public functions -->
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pathfinder | Home</title>
</head>

<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<hr>
		<div class="content">
			<?php foreach ($posts as $post): ?>
				<div class="post" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
					<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
						<div class="post_info">
							<h3><?php echo $post['title'] ?></h3>
							<div class="info">
								<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
								<span class="read_more">Read more...</span>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach ?>
		</div>
		<!-- Footer -->
		<?php require_once(ROOT_PATH . '/includes/footer.php'); ?>
		<!-- // Footer -->
	</div>
	<!-- // Page content -->		
</body>
</html>