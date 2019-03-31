<!-- login and register php -->
<!-- Handles login and register... you've likely figured that out, though -->
<!-- Will be moved to a proper CRUD module at some point. I promise. Honestly. -->
<?php
    //vars
    $username = "";
    $email = "";
    $password_1 = "";
    $password_2 = "";

    $errors = array(); //TODO: Do something with errors
    echo "<script>console.log(". json_encode($_POST) .")</script>";

    if(isset($_POST['register_btn'])){
        // Area under construction - needs lot of verification/validation logic 
        //Variables
        $username = esc($_POST['username'], $conn);
        $email = esc($_POST['email'], $conn);
        $password_1 = esc($_POST['password_1'], $conn);
        $password_1 = esc($_POST['password_1'], $conn);

        //Verify filled fields
        if(empty($username)) {array_push($errors, "Please enter username");}        
        if(empty($email)) {array_push($errors, "Please enter email");}
        if(empty($password_1)) {array_push($errors, "Please enter password");}
        if($password_1 != $password_2) {array_push($errors, "Password mismatch");}

        //Check existig users - TODO: add this
        $check_existing_user = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        // Fetch users with name/email
        $result = mysqli_query($conn, $check_existing_user);
        $user = mysqli_fetch_assoc($result);
        // Check for existing user/email
        if($user) {
            if($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if($user['email'] === $email){
                array_push($errors, "Email already exists");
            }
        }
        //Insert new user
        if(count($errors) > 0) {
            echo "<script>console.log('Errors found')</script>";
            echo "<script>console.log(". json_encode($errors) .")</script>";
        } else {
            $password = md5($password_1);//hash password
            $query = "INSERT INTO users (username, email, password, created_at, updated_at) VALUES ('$username', '$email', '$password', now() , now())";
            mysqli_query($conn, $query);
        }
    }

    // LOG USER IN
	if (isset($_POST['login_btn'])) {
		$username = esc($_POST['username'], $conn);
		$password = esc($_POST['password'], $conn);

		if (empty($username)) { array_push($errors, "Username required"); }
		if (empty($password)) { array_push($errors, "Password required"); }
		if (empty($errors)) {
			$password = md5($password); // encrypt password
			$sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";

			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// get id of created user
				$reg_user_id = mysqli_fetch_assoc($result)['id']; 

				// put logged in user into session array
				$_SESSION['user'] = getUserById($reg_user_id, $conn); 
				// if user is admin, redirect to admin area
				if ( in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
					$_SESSION['message'] = "You are now logged in";
					// redirect to admin area
					header('location: ' . BASE_URL . '/'); //Implement admin dash
					exit(0);
				} else {
					$_SESSION['message'] = "You are now logged in";
					// redirect to public area
					header('location: ./');				
					exit(0);
				}
			} else {
				array_push($errors, 'Wrong credentials');
			}
		}
	}

	// Get user info from user id
	function getUserById($id, $conn)
	{
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		// returns user in an array format: 
		// ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
		return $user; 
    }
    //escape value for form
    function esc(String $value, $conn)
	{	
        // bring the global db connect object into function
        
		$val = trim($value); // remove empty space sorrounding string
		$val = mysqli_real_escape_string($conn, $value);

		return $val;
    }

    //logout
    if(isset($_POST['logout_btn'])){
        // session_start();
        session_destroy();
        session_start();
        header('location:./');
    }
?>