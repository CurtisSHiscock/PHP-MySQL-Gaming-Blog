<?php
/* * * * * * * * * * * * * * *
* Returns all navbar_items
* * * * * * * * * * * * * * */
function getNavbar() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM navbar_items";
	$result = mysqli_query($conn, $sql);

	// fetch all navbar_items as an associative array called $navbar_items
	$navbar_items = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $navbar_items;
}

/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true";
	$result = mysqli_query($conn, $sql);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $posts;
}

// more functions to come here ...
?>