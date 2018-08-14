<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//facebook api information goes here


	$config['api_id']       = '1786282058333735';
	$config['api_secret']   = '75478df139a65618e0f888c77f29bf35';
	$config['redirect_url'] = 'http://localhost/bluescope/fb/user_login';  //change this if you are not using my fb controller
	$config['logout_url']   = 'http://localhost/bluescope/fb/';          //User will be redirected here when he logs out.
	$config['permissions']  = array('email','public_profile');

