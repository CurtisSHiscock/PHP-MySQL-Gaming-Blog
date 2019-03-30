<!-- registration backend. This may be a little too much. TODO: check performance with and without this section -->
<?php require_once(ROOT_PATH . './includes/login_and_register.php');?>
<!-- Login -->
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
        <form method="post" action="<?php echo BASE_URL?>">
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
<!-- /Login -->

<!-- Login -->
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
        <form method="post" action="<?php echo BASE_URL?>">
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
<!-- /Login -->

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
        <form method="post" action="<?php echo BASE_URL?>">
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