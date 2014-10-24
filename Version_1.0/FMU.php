<?
	function ft_check_cookie($c) {
		global $ft;
		// Check primary user.
		if ($c == md5(USERNAME.PASSWORD)) {
			return USERNAME;
		}
		// Check users array.
		if (is_array($ft['users']) && sizeof($ft['users']) > 0) {
			// Loop through users.
			foreach ($ft['users'] as $user => $a) {
				if ($c == md5($user.$a['password'])) {
					return $user;
				}
			}
		}
		return FALSE;
	}
	function Revisar_Login() {
		return true;
		/*
		global $ft;
	  $valid_login = 0;
		if (LOGIN == TRUE) {
			if (empty($_SESSION['ft_user_'.MUTEX])) {
			  $cookie_mutex = str_replace('.', '_', MUTEX);
				// Session variable has not been set. Check if there is a valid cookie or login form has been submitted or return false.
	      if (REMEMBERME == TRUE && !empty($_COOKIE['ft_user_'.$cookie_mutex])) {
	        // Verify cookie.
	        $cookie = ft_check_cookie($_COOKIE['ft_user_'.$cookie_mutex]);
	        if (!empty($cookie)) {
	  			  // Cookie valid. Login.
	  				$_SESSION['ft_user_'.MUTEX] = $cookie;
	  				ft_invoke_hook('loginsuccess', $cookie);
	  				ft_redirect();
	        }
				}
				if (!empty($_POST['act']) && $_POST['act'] == "dologin") {
					// Check username and password from login form.
					if (!empty($_POST['ft_user']) && $_POST['ft_user'] == USERNAME && $_POST['ft_pass'] == PASSWORD) {
						// Valid login.
						$_SESSION['ft_user_'.MUTEX] = USERNAME;
						$valid_login = 1;
					}
					// Default user was not valid, we check additional users (if any).
					if (is_array($ft['users']) && sizeof($ft['users']) > 0) {
						// Check username and password.
						if (array_key_exists($_POST['ft_user'], $ft['users']) && $ft['users'][$_POST['ft_user']]['password'] == $_POST['ft_pass']) {
							// Valid login.
							$_SESSION['ft_user_'.MUTEX] = $_POST['ft_user'];
							$valid_login = 1;
						}
					}
					if ($valid_login == 1) {
					  // Set cookie.
						if (!empty($_POST['ft_cookie']) && REMEMBERME) {
						  setcookie('ft_user_'.MUTEX, md5($_POST['ft_user'].$_POST['ft_pass']), time()+60*60*24*3);
						} else {
						  // Delete cookie
						  setcookie('ft_user_'.MUTEX, md5($_POST['ft_user'].$_POST['ft_pass']), time()-3600);
						}
						ft_invoke_hook('loginsuccess', $_POST['ft_user']);
						ft_redirect();
					} else {
					  ft_invoke_hook('loginfail', $_POST['ft_user']);
	  				ft_redirect("act=error");
					}
				}
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			return TRUE;
		}
		*/
	}
	function ft_check_user($username) {
	  global $ft;
	  if ($username == USERNAME) {
	    return TRUE;
	  } elseif (is_array($ft['users']) && sizeof($ft['users']) > 0 && array_key_exists($username, $ft['users'])) {
	    return TRUE;
	  }
	  return FALSE;
	}
	function ft_clean_settings($settings) {
	  // TODO: Clean DIR, UPLOAD and FILEACTIONS so they can't start with ../
	  return $settings;
	}
	function Headers_Fallaron() {}
?>