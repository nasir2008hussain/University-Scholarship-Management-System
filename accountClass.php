<?php

    include("facadeClass.php");

class Account {
  

  private $username;
  private $password;
  public static $myName;
  public static $myPass;

  function __construct( $un, $pw) {
 
    $this->username = $un;
  	$this->password = $pw;
 
  }

  function setUsername($username){
    $this->username = $username;
  }
  function setPassword($password){
    $this->password = $password;
  }
  function getUsername(){
    $myName = $this->username;
    return $this->username;
  }

  function getPassword(){
    $myPass = $this->password;
    return $this->password;
  }
  
  function isAccountValid()
  {
    $db = new DBFacade();
    $id = $db->checkValidAccount($this);
   return $id;
  }  
}
?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username=="admin"&&$password=="admin")
    {
      header('location: adminHome.php');
    } 
    else{ 
    $account = new Account($username, $password);
    
   $id= $account->isAccountValid();
    if($id!=-1)
    {
         session_start();
          $_SESSION["myUsername"] = "$username";
          $msg = " Logged in Successfully ....";
          header('location: studentProfile.php');

    }
    else {
      session_start();
      $error = "Username or Password incorrect";
      $_SESSION["error"] = $error;
      header('location: Login.php'); 
    }    
    }
  }

  else{
    echo ("Fatal Error");
  }
?>
