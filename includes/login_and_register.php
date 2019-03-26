<!-- login and register php -->
<!-- Handles login and register... you've likely figured that out, though -->
<!-- Will be moved to a proper CRUD module at some point. I promise. Honestly. -->
<?php
    //vars
    $username = "";
    $email = "";
    $errors = array(); //TODO: Do something with errors

    if(isset($_POST['register_btn'])){
        // Area under construction - needs lot of verification/validation logic 
        //Variables
        $username = esc($_POST['username']);
        $email = esc($_POST['email']);
        $password_1 = esc($_POST['password_1']);
        //Check existig users - TODO: add this
        $check_existing_user = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        // Fetch users with name/email
        $result = mysqli_query($conn, $check_existing_user);
        $user = mysqli_fetch_assoc($result);
        //Insert new user
        $password = md5($password_1);//hash password
        $query = "INSERT INTO users (username, email, password, created_at, updated_at) VALUES ('$username', '$email', '$password', now() , now())";
        mysqli_query($conn, $query);
    }

    // if(isset($_POST['register_btn'])){
    //     echo "<script>console.log('register_debug_1');</script>";
    //     // $password_2 = esc($_POST['password_2']);

    //     //Validate
    //     if(empty($username)) {array_push($errors, "Please enter username");}        
    //     if(empty($email)) {array_push($errors, "Please enter email");}
    //     if(empty($password_1)) {array_push($errors, "Please enter password");}
    //     // if(empty($password_2 || $password_1 != $password_2)) {array_push($errors,"The passwords you enterred do not match");}

    //     $check_existing_user = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    //     echo $check_existing_user;
    //     $result = mysqli_query($conn, $check_existing_user);
    //     $user = mysqli_fetch_assoc($result);

    //     // Check for existing user/email
    //     if($user) {
    //         if($user['username'] === $username) {
    //             array_push($errors, "Username already exists");
    //         }
    //         if($email['email'] === $email){
    //             array_push($errors, "Email already exists");
    //         }
    //     }

    //     echo "<br>Error Count: ";
    //     echo count($errors) . '<br>';
    //     if(count($errors) == 0){
    //         echo "Hello!";
    //         $password = md5($password_1);
    //         echo "Hello!";
    //         $query = "INSERT INTO users (username, email, password, created_at, updated_at) VALUES (". $username . ", " .$email.", ".$password.", now() ,  now())";
    //         if(!mysqli_query($conn, $query)){
    //             echo mysqli_error($conn);
    //         }
    //         echo 'hello';

    //         //Get id of user
    //         $reg_user_id = mysqli_insert_id($conn);
            
    //         $_SESSION['user'] = getUserById($reg_user_id);

    //         // If admin

    //         if(in_array($_SESSION['user']['role'],['Admin','Author'])){
    //             $_SESSION['message'] = 'You are now logged in';
    //             //go to admin area
    //             header('location: ' . BASE_URL .'admin/dashboard.php');
    //             exit(0);
    //         } else {
    //             $_SESSION['message'] = 'You are now logged in';
    //             //go to public area
    //             header('location: /');
    //             exit(0);
    //         }
    //     }
    // }
    // LOG USER IN
	if (isset($_POST['login_btn'])) {
		$username = esc($_POST['username']);
		$password = esc($_POST['password']);

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
				$_SESSION['user'] = getUserById($reg_user_id); 

				// if user is admin, redirect to admin area
				if ( in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
					$_SESSION['message'] = "You are now logged in";
					// redirect to admin area
					header('location: ' . BASE_URL . '/admin/dashboard.php');
					exit(0);
				} else {
					$_SESSION['message'] = "You are now logged in";
					// redirect to public area
					header('location: index.php');				
					exit(0);
				}
			} else {
				array_push($errors, 'Wrong credentials');
			}
		}
	}

	// Get user info from user id
	function getUserById($id)
	{
		global $conn;
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		// returns user in an array format: 
		// ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
		return $user; 
    }
    //escape value for form
    function esc(String $value)
	{	
		// bring the global db connect object into function
		global $conn;

		$val = trim($value); // remove empty space sorrounding string
		$val = mysqli_real_escape_string($conn, $value);

		return $val;
	}
?>