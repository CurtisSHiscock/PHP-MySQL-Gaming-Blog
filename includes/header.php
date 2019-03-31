<link rel="stylesheet" type="text/css" href= "<?php echo BASE_URL ?>/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<?php echo '<link rel="stylesheet" type="text/css" href="'. BASE_URL .'/static/css/public_styles.css">' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php echo '<script src="'. BASE_URL .'/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>' ?>
<script src="<?php echo BASE_URL . "/static/js/main.js" ?>"></script>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<!-- Include modal menus -->
<?php require_once(ROOT_PATH . '/includes/modals.php'); ?>
<!-- Retrieve all posts from database  -->