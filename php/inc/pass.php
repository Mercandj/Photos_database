
<?php

  function w_log($user, $pass, $string) {
    $date = date("d-m-Y");
    $heure = date("H:i");

    $filename = 'log.txt';
    $somecontent = $date." ".$heure."  LOGIN:".$string."  USER:".$user."  PASS:".$pass."\n";

    ecrire_fichier($filename, $somecontent);
  }


  $user_pass_list = array("user" => "user", "toto" => "toto");

  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $connect = 'false';

  //check if the user exists in our array
  if(array_key_exists($user, $user_pass_list)){
    //if it does, then check the password
    if($user_pass_list[$user] == $pass){
      $connect = 'true';
      header("Location: ../../html/home/index.php");
      die();
        
     }else{
      header("Location: ../../index.html");
      die();
    }
  }else{
    header("Location: ../../index.html");
    die();
   }
  
?>
