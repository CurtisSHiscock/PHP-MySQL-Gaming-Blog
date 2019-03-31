<!-- public functions -->
<!-- Modals -->
<?php require_once(ROOT_PATH . './includes/modals.php');?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--pathfinder-red);">
  <a class="navbar-brand" href="/" alt="Pathfinder">
    <?php echo '<img src="' . BASE_URL . '\static\images\logo.png" alt="">';?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Follower Bar -->
  <div>
      <img id="follower" style="user-select:none;box-sizing:border-box;display:inline-block;display:none;position:absolute;top:45px;left:200px" src="<?php echo BASE_URL ."/static/images/follower.png"?>">
  </div>
  <!-- // Follower Bar -->
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    	<!-- Display navbar items from db -->
    	<?php
    	  $navbar_items = getNavbar($conn);
      	foreach ($navbar_items as $navbar_item){
          echo '<a class="nav-item  nav-link ';
          echo (($navbar_item['navbar_items_href'] == $_SERVER['REQUEST_URI']) ? 'active' : '');
          echo '" href="'. BASE_URL .'' .$navbar_item['navbar_items_href']. '">' . $navbar_item['navbar_items_name'] . '</a>';
		    }
      ?>
      <?php
      if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == "Admin")){
        echo '<a class="nav-item  nav-link ';
        echo BASE_URL . "/create_post" == $_SERVER['REQUEST_URI'] ? 'active' : '';
        echo '" href="'. BASE_URL .'' ."/create_post". '">' . "Create Post" . '</a>';
      }
      ?>
    </div>
  </div>
  <div>
    <p style="align-text:left;margin:0px 40px 0px 0px;color:white;"> 
      <?php
        if(isset($_SESSION['user'])){
          echo $_SESSION['message'] . ", " . $_SESSION['user']['username'];
        }
      ?>
    </p>
  </div>
  <form class="form-inline">
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#login" data-whatever="@login" <?php if(isset($_SESSION['user'])){echo 'style="display:none;"';}?>>Login</button>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#register" data-whatever="@register" <?php if(isset($_SESSION['user'])){echo 'style="display:none;"';}?>>Register</button>
  </form>
  <form method="post" action="/">
      <button name="logout_btn" value="logout" class="btn btn-outline-light" <?php if(!isset($_SESSION['user'])){echo 'style="display:none;"';}?>>Logout</button>
  </form>
</nav>