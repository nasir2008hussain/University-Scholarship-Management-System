<?php
session_start();
if (isset($_SESSION["myUsername"])) {
?>
<?php
if(isset($_SESSION["applyNowSch"])){
?>

<?php
  $username = $_SESSION["myUsername"];
  $scholarshipname = $_SESSION["applyNowSch"];
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    include("facadeClass.php");
                    $db = new DBFacade();
                    $check=$db->checkEligibility($username, $scholarshipname);
                    if ($check == "1") {
                        $db2 = new DBFacade();
                        $openApp = $db2->getScholarshipCategory($scholarshipname);
                       if($openApp=="merit"){
                        header("location: meritApplication.php");
                       } else {
                            header("location: needApplication.php");
                        }
                    }
                    else{
                        echo ("You are not Eligible for this Scholarhsip");
                    }
                    
                }


?>
<?php } ?>
<?php } ?>