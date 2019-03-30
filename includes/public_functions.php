<?php
/* * * * * * * * * * * * * * *
* Returns all navbar_items
* * * * * * * * * * * * * * */
function getNavbar($conn) {
	$sql = "SELECT * FROM navbar_items";
	$result = mysqli_query($conn, $sql);

	// fetch all navbar_items as an associative array called $navbar_items
	$navbar_items = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $navbar_items;
}

/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts($conn) {
	$sql = "SELECT * FROM posts WHERE published=true";
	$result = mysqli_query($conn, $sql);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $posts;
}

function getClasses($conn){
	//NOTE: ONLY RETURNS CORE
	$sql = "SELECT * FROM classes where source != 'none'";
	$result = mysqli_query($conn, $sql);

	$classes = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $classes;
}

function getSingleClass($conn, $class){
	$sql = "SELECT * FROM classes WHERE name='$class' LIMIT 1";
	// echo $sql;
	$result = mysqli_query($conn, $sql);

	$class = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $class[0];
}
// more functions to come here ...
?>