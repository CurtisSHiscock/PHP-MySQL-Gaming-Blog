<!-- public functions -->
<?php 
	require_once(ROOT_PATH . '/includes/public_functions.php');
?>
<!-- registration backend. This may be a little too much. TODO: check performance with and without this section -->
<?php
  require_once(ROOT_PATH . './includes/login_and_register.php');
?>


<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--pathfinder-red);">
  <a class="navbar-brand" href="/" alt="Pathfinder">
    <?php 
        echo '<img src="' . BASE_URL . '\static\images\logo.png" alt="">';
      ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    	<!-- Display navbar items from db -->
    	<?php
    	  $navbar_items = getNavbar();
      	foreach ($navbar_items as $navbar_item){
          echo '<a class="nav-item  nav-link ';
          echo (($navbar_item['navbar_items_href'] == $_SERVER['REQUEST_URI']) ? 'active' : '');
          echo '" href="' . $navbar_item['navbar_items_href'] . '">' . $navbar_item['navbar_items_name'] . '</a>';
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

<!-- Dear lord, just add the modals in their own page -->
<!-- Register -->
<div class="modal" tabindex="-1" role="dialog" id="register">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><!-- Register message goes here --></p>
        <form method="post" action="<?php echo BASE_URL . '/index.php'?>">
        <div class="form-group row">
            <label for="inputUsername3" class="col-sm-2 col-form-label email">Username</label>
            <div class="col-sm-10">
              <input type="username" class="form-control" id="inputUsername3" placeholder="Username" value="<?php echo $username ?>" name="username" required>
            </div>
          </div>        
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label email">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $email ?>" name="email" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password_1" required>
              <input type="password" class="form-control" id="inputPassword3-confirm" placeholder="Password" name="password_2" required>
            </div>
          </div>          
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" id="register_btn" class="btn btn-primary" name='register_btn'>Sign up</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /register -->

<!-- Register -->
<div class="modal" tabindex="-1" role="dialog" id="login">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><!-- Login message goes here --></p>
        <form method="post" action="<?php echo BASE_URL . '/index.php'?>">
        <div class="form-group row">
            <label for="inputUsername3" class="col-sm-2 col-form-label email">Username</label>
            <div class="col-sm-10">
              <input type="username" class="form-control" id="inputUsername4" placeholder="Username" value="<?php echo $username ?>" name="username" required>
            </div>
          </div>        
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required>
            </div>
          </div>          
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" id="login_btn" class="btn btn-primary" name='login_btn'>Sign in</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /register -->