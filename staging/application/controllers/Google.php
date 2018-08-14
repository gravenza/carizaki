<?php
 
Class Google extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->helper('sluq_helper');
        $this->load->model('admin_model');
        

    }
    public function table()
    {
        return 'tbl_members';
    }
    public function id()
    {
        return 'id_members';
    }

  function index() {
        require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '524945768455-t8c5d34eopp5654kjkb98tn3lm9iv86p.apps.googleusercontent.com'; 
$client_secret = 'f8MlKaJcFXvkdbMZOS3VEdae';
$redirect_uri = 'http://localhost/bluescope/google';



//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


//Display user info or display login url as per the info we have.

if (isset($authUrl)){ 
    //show login url
   echo "<a href='".$authUrl."'>login</a>";
    
} else {
    
            $user = $service->userinfo->get(); //get user info 
            
            
            //check if user exist in database using COUNT
            $result = $this->Admin_model->sum_data_param('email',$user->email,'tbl_members');
            if($result>0)
            {
                echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
            }
            else
            {
                echo 'Hi '.$user->name.', Thanks for Registering!';
                $data = array(
                    'id_members' => '',
                    'nama' => $user->name,
                    'email' => $user->email
                    );
                $insert = $this->Admin_model->insert('tbl_members',$data);
                if($insert)
                {
                    redirect('/applicator');
                }
               
            }

    }
}

}