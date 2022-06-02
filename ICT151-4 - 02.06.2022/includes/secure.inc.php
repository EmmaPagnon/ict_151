<?php 
require_once(WAY."/includes/autoload.inc.php");
require(WAY."/plugins/vendor/autoload.php");

//print_r($_SESSION);
if(isset($_SESSION['fb_access_token'])){
   $fb = new \Facebook\Facebook([
     'app_id' => '147464722612840',
     'app_secret' => '8a5a960c7f8cbeeecb56f058af83f8f5',
     'default_graph_version' => 'v2.5',
     //'default_access_token' => '{access-token}', // optional
   ]);
   
   try {
      // Get the \Facebook\GraphNodes\GraphUser object for the current user.
      // If you provided a 'default_access_token', the '{access-token}' is optional.
      $response = $fb->get('/me?fields=email,name,id', $_SESSION['fb_access_token']);
   } catch(\Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      // echo 'Graph returned an error: ' . $e->getMessage();
      header('Location: '.URL.'/login.php');
      exit;
   } catch(\Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      // echo 'Facebook SDK returned an error: ' . $e->getMessage();
	   header('Location: '.URL.'/login.php');
      exit;
   }
   
   $me = $response->getGraphUser();
   if($me->getEmail() != ""){
     
      // echo 'Logged in as ' . $me->getName(). $me->getEmail(). $me->getId();
      $per = new Personne();
      $per->init_by_mail($me->getEmail());
      $_SESSION['id'] = $per->get_id_per();
	  $per =  new Personne($_SESSION['id']);
   }
   
}else{

   $per =  new Personne($_SESSION['id']);
   
   if(!$per->check_connect()){
      session_destroy();
      header('Location: '.URL.'/login.php');
      exit;
   }

}
?>