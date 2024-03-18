<?php
$twForm="";
$errors = "";
$output	="";
$logout="";
if(isset($_POST['submit']))
{
	if ($_POST['username'] != "") {
		$_POST['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		if ($_POST['username'] == "") {
			$errors .= 'Please enter a valid nausernameme.<br/><br/>';
		}
	} else {
		$errors .= 'Please enter your username.<br/>';
	}

	

	if ($_POST['source'] != "") {
		$homepage = filter_var($_POST['source'], FILTER_SANITIZE_URL);
		if (!filter_var($homepage, FILTER_VALIDATE_URL)) {
			$errors .= "$homepage is <strong>NOT</strong> a valid URL.<br/><br/>";
		}
	} else {
		$errors .= 'Please enter your home page.<br/>';
	}

	if ($_POST['quote'] != "") {
		$_POST['quote'] = filter_var($_POST['quote'], FILTER_SANITIZE_STRING);
		if ($_POST['quote'] == "") {
			$errors .= 'Please enter a message to send.<br/>';
		}
	} else {
		$errors .= 'Please enter a message to send.<br/>';
	}

	if (!$errors) {
	$usuario = $_POST['username'];
	$wallet = $_POST['wallet'];
	$quote = $_POST['quote'];
	$enlace = $_POST['profile'];
	$source = $_POST['source'];
	$status = $_POST['status'];
	$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO quotations (username, wallet, quote, link, source, status) VALUES (:usuario, :wallet, :quote, :enlace, :source, :status)");

	// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
	// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
	
	$my_Insert_Statement->bindParam(':usuario', $usuario);
	$my_Insert_Statement->bindParam(':wallet', $wallet);
	$my_Insert_Statement->bindParam(':quote', $quote);
	$my_Insert_Statement->bindParam(':enlace', $enlace);
	$my_Insert_Statement->bindParam(':source', $source);
	$my_Insert_Statement->bindParam(':status', $status);
	
	// Execute the query using the data we just defined
	// The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
	
	if ($my_Insert_Statement->execute()) {
	  echo "<div style='text-align:center; padding-top:15px;'>Your sudmission added successfully<br/></div>";
	  $url1="https://vegalms.com/vegafact/";
	  header("Refresh: 5; URL=$url1");
	} else {
	  echo "Unable to create record";
	}

	

		
	} else {
		echo '<div style="color: red; text-align:center; padding-top:15px;">' . $errors . '<br/></div>';
	}

}


// If OAuth token not matched
if(isset($_REQUEST['oauth_token']) && $_SESSION['token'] !== $_REQUEST['oauth_token']){
	//Remove token from session
	unset($_SESSION['token']);
	unset($_SESSION['token_secret']);
}


// If user already verified 
if(isset($_SESSION['status']) && $_SESSION['status'] == 'verified' && !empty($_SESSION['request_vars'])){
	//Retrive variables from session
	$username = $_SESSION['request_vars']['screen_name'];
	$twitterId		  = $_SESSION['request_vars']['user_id'];
	$oauthToken 	  = $_SESSION['request_vars']['oauth_token'];
	$oauthTokenSecret = $_SESSION['request_vars']['oauth_token_secret'];
	$name			  = $_SESSION['userData']['first_name'].' '.$_SESSION['userData']['last_name'];
	$profilePicture	  = $_SESSION['userData']['picture'];
	$myLink =$_SESSION['userData']['link'];
	/*
	 * Prepare output to show to the user
	 */
	$twClient = new TwitterOAuth(TW_CONSUMER_KEY, TW_CONSUMER_SECRET, $oauthToken, $oauthTokenSecret);
	$myTweets = $twClient->get('account/verify_credentials');
		$stat = $myTweets->statuses_count;
		$following = $myTweets->friends_count;
		$followers = $myTweets->followers_count;
	//If user submits a tweet to post to twitter
	if(isset($_POST["tpost"])){
		$my_update = $twClient->post('statuses/update', array('status' => $_POST["tpost"]));
	}
	$f_contents = file("vlib.txt"); 
    $line = $f_contents[rand(0, count($f_contents) - 1)];
	$vlib =$line.nl2br("-#VegaLibrary");
	$twForm .= '<form method="post" action="#">';
	$twForm .='<div class="hds"><h1 class="heading-1">VegaLibrary</h1><div class="divider-1"> <span></span></div><textarea readonly  name="tpost">'.$vlib.'</textarea><br/><br/><input type="submit" value="Tweet" class="logoutbtn" style="width:230px;"/></div>';
	$twForm .= '</form>';
	$logout.='<br/><br/><a href="logout.php" class="logoutbtn">Logout</a>';
	// Display username and logout link
	//echo '<div style="float:left; margin-top:420px;padding:30px;position:fixed;"><a href="logout.php" class="logoutbtn">Logout</a></div>';
	
	$imagex = str_replace('_normal', '_bigger', $profilePicture);

	$output .='<h1 class="text-center wh_clr pad-btn-20">#VegaFacts User Dashboard</h1>';
	$output .='<div class="welcome_txt  wh_clr">Welcome <strong>'.$username.'</strong> User ID : '.$twitterId.'</div>';
	$output .='<div class="wrapercito">
						<div class="container">
							<img src="'.$imagex.'" class="profile-img">
							<div class="content">
								<div class="sub-content"><h1>'.$name.' </h1><span>'.$username.'</span></div>
								<div class="data">
									<div class="inner-data">
										<span><i class="fa fa-users" aria-hidden="true"></i></span><p style="color:#000;">'.$followers.'</p>
									</div>
									<div class="inner-data">
										<span><i class="fa fa-user" aria-hidden="true"></i></span><p style="color:#000;">'.$following.'</p>
									</div>
									<div class="inner-data">
										<span><i class="fa fa-rss" aria-hidden="true"></i></span><p style="color:#000;">'.$stat.'</p>
									</div>
									
								</div>
								<a href="logout.php" class="logoutbtn mb_lg">Logout</a>
							</div>
						</div>
						
						
						
						<div class="content_text">
						<form method="post" action="#" class="vgForm" id="vForm" _lpchecked="1">
							<div class="input-group mb-3">
							  <div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-comment fa-2x"></i></span>
							  </div>
							  <input class="form-control" type="text" name="quote" maxlength="278" placeholder="Quote" required="">
							</div>
							<div class="input-group mb-3">
							  <div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user fa-2x"></i></span>
							  </div>
							  <input class="form-control" type="text" name="username" placeholder="Username" required="" value="'.$username.'" readonly>
							</div>
							
							<div class="input-group mb-3">
							  <div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-link fa-2x"></i></span>
							  </div>
							  <input class="form-control" id="source" type="text" name="source" placeholder="Source" required="">
							</div>
							
							<div class="input-group mb-3">
							  <div class="input-group-prepend">
								<span class="input-group-text"><i class="fab fa-twitter fa-2x"></i></span>
							  </div>
							  
							  <input class="form-control" type="text" name="profile" placeholder="Twitter Profile" required="" value="'.$myLink.'" readonly="">
							</div>
							
							<div class="input-group mb-3">
							  <div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-wallet fa-2x"></i></span>
							  </div>
							  <input class="form-control" id="wallet" type="text" name="wallet" placeholder="Wallet" onkeyup="checkaddress()" required="">
							  <input type="hidden" name="status" value="Pending">

							</div>
							<span id="validation" style="display:flex;"></span>
							
							<div style="text-align: right;">
								<input class="btn btn-success" type="submit" name="submit" value="Submit">
							</div>
						</form>
						
						</div>
					</div>';
		//include 'call.php';
		
		//call
		$result = $my_Db_Connection->query("SELECT * FROM quotations WHERE username = '{$_SESSION['request_vars']['screen_name']}' ORDER BY id DESC LIMIT 7");
		$output .='<table class="table">
			  <thead>
				<tr style="border-bottom: dotted;color: #fff;border-top: hidden;">
				  <th scope="col">MY SUBMISSIONS</th>
				  <th scope="col" style="text-align:right;">PAYMENT</th>
				</tr>
			  </thead><tbody>';
		
		while($row = $result->fetch())
		{
		$output .="
			<tr>
				<td>".$row['quote']."</td>
				<td style='text-align: center;'>".$row['status']."</td>
			</tr>";
		}
		
		
		//balance
		$resultado = $my_Db_Connection->query("SELECT * FROM users WHERE username = '{$_SESSION['request_vars']['screen_name']}'");

		while($rowx = $resultado->fetch())
		{
			
		$output .='
				<tr>
				  <td colspan="2" style="color: #fff;text-align: center;font-weight: bold;">BALANCE: '.$rowx['balance'].' XRP</td>
				</tr>';


		/* $output .="<tr style='text-transform: uppercase; border-bottom: hidden; border-left: hidden; border-right: hidden;'>
		  <th colspan='3' style='padding-top:10px;'>
			Balance: ".$rowx['balance']." XRP
		  </th>
		</tr>
		</table>";  */
		}
		
		$output .="</tbody>
			</table>";
		
}elseif(isset($_REQUEST['oauth_token']) && $_SESSION['token'] == $_REQUEST['oauth_token']){
	// Call Twitter API
	$twClient = new TwitterOAuth(TW_CONSUMER_KEY, TW_CONSUMER_SECRET, $_SESSION['token'] , $_SESSION['token_secret']);
	
	// Get OAuth token
	$access_token = $twClient->getAccessToken($_REQUEST['oauth_verifier']);
	
	// If returns success
	if($twClient->http_code == '200'){
		// Storing access token data into session
		$_SESSION['status'] = 'verified';
		$_SESSION['request_vars'] = $access_token;
		
		// Get user profile data from twitter
		$userInfo = $twClient->get('account/verify_credentials');
		
		// Initialize User class
		$user = new User();
		
		// Getting user's profile data
		$name = explode(" ",$userInfo->name);
		$fname = isset($name[0])?$name[0]:'';
		$lname = isset($name[1])?$name[1]:'';
		$profileLink = 'https://twitter.com/'.$userInfo->screen_name;
		$twUserData = array(
			'oauth_uid'     => $userInfo->id,
			'first_name'    => $fname,
			'last_name'     => $lname,
			'locale'        => $userInfo->lang,
			'picture'       => $userInfo->profile_image_url,
			'link'          => $profileLink,
			'username'		=> $userInfo->screen_name
		);
		
		// Insert or update user data to the database
		$twUserData['oauth_provider'] = 'twitter';
		$userData = $user->checkUser($twUserData);
		
		// Storing user data into session
		$_SESSION['userData'] = $userData;
		$TotalTweets = $user_data['statuses_count'];
		
		// Remove oauth token and secret from session
		unset($_SESSION['token']);
		unset($_SESSION['token_secret']);
		
		// Redirect the user back to the same page
		header('Location: ./');
	}else{
		$output .= '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
}else{
	// Fresh authentication
	$twClient = new TwitterOAuth(TW_CONSUMER_KEY, TW_CONSUMER_SECRET);
	$request_token = $twClient->getRequestToken(TW_REDIRECT_URL);
	
	// Received token info from twitter
	$_SESSION['token']		 = $request_token['oauth_token'];
	$_SESSION['token_secret']= $request_token['oauth_token_secret'];
	
	// If authentication returns success
	if($twClient->http_code == '200'){
		// Get twitter oauth url
		$authUrl = $twClient->getAuthorizeURL($request_token['oauth_token']);
		$output .='<span class="intro">#VegaFACTS</span>';
		$output .='<div class="vgaDesc"><p style="font-size: 14px;line-height: 24px;">Long story short...<br/>Historical and scientific facts in one Tweet! <br/>That\'s what <b>#VegaFacts</b> is about!<br/>Share knowledge. Earn crypto.</p>👈🤠👉</div>';
		
		$output .='<div class="lgdv"><a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="btn login_btn"><i class="fab fa-twitter" style="color:#fff;"></i> Login with Twitter</a></div>';
		
		
		
	}else{
		$output .= '<h3 style="color:red">Error connecting to Twitter! Try again later!</h3>';
	}
}
 
?>