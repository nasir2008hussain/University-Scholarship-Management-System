
<?php
     include("facadeClass.php");

                class student
                {
                    private $username;
                    private $email;
                    private $contact;
                    private $address;
                    private $altContact;
                    private $interDoc;
                    private $semesterChallan;
                    private $semesterTranscript;
          
                    private $scholarshipName;
                    private $income;
                    private $exp;
                    private $net;
                    private $house;
                    private $reserve;
                    private $prop;

                    private $payslip;
                    private $ebill;
                

                    public function __construct()
                    {
                    }

                    public function updateStudentInformation($u, $e, $c,$a,$ac)
                    {
                        $this->username = $u;
                        $this->email = $e;
                        $this->contact = $c;
                        $this->address = $a;
                        $this->altContact = $ac;
                    }
                    public function getUsername(){
                        return $this->username;
                    }
                    public function getEmail(){
                        return $this->email;
                    }
                    public function getContact(){
                        return $this->contact;
                    }
                    public function getCurrAdd(){
                        return $this->address;
                    }
                    public function getAltContact(){
                        return $this->altContact;
                    }

                    public function updateStudent(){
                        $db = new DBFacade();
                        $id=$db->updateStudentInfo($this);
                        return $id;
                    }

                    function 
                    applyNowSetterMerit($username,$scholarhsipName,$inter,$semTranscript,$challan){
                        $this->username = $username;
                        $this->scholarshipName = $scholarhsipName;
                        $this->interDoc = $inter;
                        $this->semesterChallan = $challan;
                        $this->semesterTranscript = $semTranscript;
                   
                    }

                    function      applyNowSetterNeed($username,$scholarhsipName,$income,$exp,$net,$prop,$houses,$reserve,$inter,$challan,$tran,$payslip,$ebill){
                        $this->username = $username;
                        $this->scholarshipName = $scholarhsipName;
                        $this->income = $income;
                        $this->exp = $exp;
                        $this->net = $net;
                        $this->prop = $prop;
                        $this->house = $houses;
                        $this->reserve = $reserve;
                        $this->interDoc = $inter;
                        $this->semesterChallan = $challan;
                        $this->semesterTranscript = $tran;
                        $this->payslip = $payslip;
                        $this->ebill = $ebill;
                    }
                    public function getScholarshipName(){
                        return $this->scholarshipName;
                    }
                    public function getInter(){
                        return $this->interDoc;
                    }
                    public function getChallan(){
                        return $this->semesterChallan;
                    }
                    public function getTranscript(){
                        return $this->semesterTranscript;
                    }
                   
                    public function getIncome(){
                        return $this->income;
                    }
                    public function getExp(){
                        return $this->exp;
                    }
                    public function getNet(){
                        return $this->net;
                    }
                    public function getProp(){
                        return $this->prop;
                    }
                    public function getHouse(){
                        return $this->house;
                    }
                    public function getReserve(){
                        return $this->reserve;
                    }
                    public function getPaySlip(){
                        return $this->payslip;
                    }
                    public function getEbill(){
                        return $this->ebill;
                    }
                


                    function applyNowForMerit(){
                        $db = new DBFacade;
                        $id = $db->applyingForMerit($this);
                        return $id;
                    }

                    function applyNowForNeed(){
                        $db = new DBFacade();
                        $id = $db->applyingForNeed($this);
                        return $id;
                    }


                }
                
?>


<?php
session_start();
if (isset($_SESSION["myUsername"])) {
?>
<?php
if(isset($_SESSION["applyNowSch"])){
?>

<?php } ?>
<?php } ?>

<!------------------------------ merit ----------------------- -->

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['mPersonalBtn'])){
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $curradd = $_POST['tempadd'];
    $altContact = $_POST['altcontact'];
    $username=$_SESSION["myUsername"];
    $updateStudent = new student();
    $updateStudent->updateStudentInformation($username, $email, $contact, $curradd, $altContact);
    $id = $updateStudent->updateStudent();
    if($id=="1"){
           header('location: meritEducation.php');
    }
    else{
           echo ("Not updated successfully");
    }
}
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['mDocumentBtn'])){


    $interDoc = $_FILES['mInterDoc'];
    $interDoc_file_content = file_get_contents($interDoc['tmp_name']);
    $_SESSION["docInter"] = "$interDoc_file_content";
    // move_uploaded_file($interDoc['tmp_name'], $interDoc_file_path);

    $semesterChallan = $_FILES['mSemesterChallan'];
    $semesterChallan_file_content = file_get_contents($semesterChallan['tmp_name']);
    $_SESSION["docChallan"] = "$semesterChallan_file_content";
    // move_uploaded_file($semesterChallan['tmp_name'], $semesterChallan_file_path);

    $semesterTranscript = $_FILES['mSemesterTranscript'];
    $semesterTranscript_file_content = file_get_contents($semesterTranscript['tmp_name']);
    $_SESSION["docTranscript"] = "$semesterTranscript_file_content";

    header('location: meritReview.php');

}
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['mFinalBtn'])){
    $interDoc = $_SESSION["docInter"];
    $semChallan = $_SESSION["docChallan"];
    $semTranscript = $_SESSION["docTranscript"];
    $username = $_SESSION["myUsername"];
    $schName = $_SESSION["applyNowSch"];
    $meritApply = new student();
    
    $meritApply->applyNowSetterMerit($username, $schName, $interDoc, $semTranscript,$semChallan);
    $id = $meritApply->applyNowForMerit();
    if($id=="1"){
        header("location:studentProfile.php");
    }
    else{
         echo ("something wrong please try again!");
    }
}
?>  
<!-- // ------------------------------need------------------------- -->
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['nPersonalBtn'])){
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $curradd = $_POST['tempadd'];
    $altContact = $_POST['altcontact'];
    $username=$_SESSION["myUsername"];
    $updateStudent = new student();
    $updateStudent->updateStudentInformation($username, $email, $contact, $curradd, $altContact);
    $id = $updateStudent->updateStudent();
    if($id=="1"){
           header('location: needEducation.php');
    }
    else{
           echo ("Not updated successfully");
    }
}
?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['nFinancialBtn'])){
    $totalIncome= $_POST['totIncome'];
    $totalExpenses = $_POST['totexp'];
    $netSavedMonthly = $totalIncome-$totalExpenses;
    $totalProperty = $_POST['prop'];
    $houseType = $_POST['houseStatus'];
    $reserved = $_POST['reserveSeat'];
    $_SESSION["income"] = $totalIncome;
    $_SESSION["expenses"] = $totalExpenses;
    $_SESSION["net"] = $netSavedMonthly;
    $_SESSION["prop"] = $totalProperty;
    $_SESSION["house"] = $houseType;
    $_SESSION["reserve"] = $reserved;
    header('location: needDocument.php');
}
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['nDocumentBtn'])){


    $interDoc = $_FILES['nInter'];
    $interDoc_file_content = file_get_contents($interDoc['tmp_name']);
    $_SESSION["ndocInter"] = "$interDoc_file_content";
    

    $semesterChallan = $_FILES['nSemesterChallan'];
    $semesterChallan_file_content = file_get_contents($semesterChallan['tmp_name']);
    $_SESSION["ndocChallan"] = "$semesterChallan_file_content";
  

    $semesterTranscript = $_FILES['nSemesterTranscript'];
    $semesterTranscript_file_content = file_get_contents($semesterTranscript['tmp_name']);
    $_SESSION["ndocTranscript"] = "$semesterTranscript_file_content";

    $fatherPaySlip = $_FILES['nPaySlip'];
    $fatherPaySlip_file_content = file_get_contents($fatherPaySlip['tmp_name']);
    $_SESSION["ndocPaySlip"] = "$fatherPaySlip_file_content";

    $Ebill = $_FILES['Ebill'];
    $Ebill_file_content = file_get_contents($Ebill['tmp_name']);
    $_SESSION["nEbill"] = "$Ebill_file_content";

 

    header('location: needReview.php');

}
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['nFinalBtn'])){

    $interDoc = $_SESSION["ndocInter"];
    $semChallan = $_SESSION["ndocChallan"];
    $semTranscript = $_SESSION["ndocTranscript"];
    $paySlip = $_SESSION["ndocPaySlip"];
    $Ebill = $_SESSION["nEbill"];
  

    $username = $_SESSION["myUsername"];
    $schName = $_SESSION["applyNowSch"];

    $totalIncome = $_SESSION["income"];
    $totalExpenses = $_SESSION["expenses"];
    $netSavedMonthly = $_SESSION["net"];
    $reserved = $_SESSION["reserve"];
    $houseType = $_SESSION["house"];
    $totalProperty = $_SESSION["prop"];

    $needApply = new student();
    
    $needApply->applyNowSetterNeed($username, $schName, $totalIncome, $totalExpenses,$netSavedMonthly, $totalProperty,$houseType,$reserved,$interDoc,$semChallan,$semTranscript,$paySlip,$Ebill);
    $id = $needApply->applyNowForNeed();
    if($id=="1"){
        header("location:studentProfile.php");
    }
    else{
         echo ("something wrong please try again!");
    }
}
?> 

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['viewStatus'])) {
        $scholarshipName = $_POST['applySchStatus'];
        $_SESSION["forStatus"] = "$scholarshipName";
        header('location: status.php');
     }
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inform'])) {
        $resultSch= $_POST['schName'];
        $db=new DBFacade();
        $id=$db->informStudent($resultSch);
        if($id){
        header("location:adminHome.php");
        }
        else{
        echo ("not inform successfully!");
        }
     }
?>









