<?php

    include("facadeClass.php");

class scholarship {
  

  private $name;
  private $seat;
    private $stipend;
    private $lastDate;
    private $publishDate;
    private $category;


  function __construct($name,$seat,$stipend,$lastDate, $publishDate,$category) {

    $this->category = $category;
    $this->name = $name;
    $this->seat = $seat;
    $this->stipend = $stipend;
    $this->lastDate = $lastDate;
    $this->publishDate = $publishDate;

  }
  function getname(){
    return $this->name;
  }
  function getstipend(){
    return $this->stipend;
  }
  function getlastDate(){
    return $this->lastDate;
  }
  function getpublishDate(){
    return $this->publishDate;
  }
  function getSeat(){
    return $this->seat;
  }
  function getCategory(){
    return $this->category;
  }

}

class merit extends scholarship{
  private $cgpa;
  private $interPercent;
  private $region;
  private $department;
  private $program;
  private $semester;

  public function __construct($cgpa,$inter,$region,$dept,$program,$semester)
  {
    $this->cgpa = $cgpa;
    $this->interPercent = $inter;
    $this->region = $region;
    $this->department = $dept;
    $this->semester = $semester;
    $this->program = $program;
  }

  public function getCgpa(){
    return $this->cgpa;
  }
  public function getInter(){
    return $this->interPercent;
  }
  public function getRegion(){
    return $this->region;
  }
  public function getDept(){
    return $this->department;
  }
  public function getSemester(){
    return $this->semester;
  }
  public function getProgram(){
    return $this->program;
  }


}

class need extends scholarship{
  private $income;
  public function __construct($income){
    $this->income=$income;
  }
  public function getIncome(){
    return $this->income;
  }
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {

  $name = $_POST['schName'];
  $category = $_POST['category'];
  $stipend = $_POST['stipend'];
  $seat = $_POST['seat'];
  $lastDate = $_POST['lastDate'];
  $publishDate = $_POST['publishDate'];

  $scholarship = new scholarship($name, $seat, $stipend, $lastDate, $publishDate, $category);
  if ($scholarship->getCategory() == "need") {
    $income = $_POST['income'];
    $need = new need($income);
    $db = new DBFacade();
    $db->createNeedScholarship($need,$scholarship);
  }
if($scholarship->getCategory()=="merit"){
      $minCgpa = $_POST['minCgpa'];
      $interPercent = $_POST['Inter'];
      $semester = $_POST['Ssemester'];
      $department = $_POST['Sdept'];
      $program = $_POST['Sprogram'];
      $domicile = $_POST['domicile'];
      $merit = new merit($minCgpa,$interPercent,$domicile,$department,$program,$semester);
      $db = new DBFacade();
      $db->createMeritScholarship($merit,$scholarship);

}
  } 
?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['advertise'])){
    $applySchName = $_POST["applySch"];
    session_start();
    $_SESSION["applyNowSch"] = "$applySchName";
    header("location: schApplicationHome.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['archive'])){
    $applySchName = $_POST["applySch"];
    session_start();
    $_SESSION["applyNowSch"] = "$applySchName";
    header("location: archiveView.php");
}
?>


<?php

//include("facadeClass.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnSearch'])) {
    $search = $_POST['search'];
    $db = new DBFacade();
    $resultArray=$db->searchScholarship($search);
    $count = sizeof($resultArray);
    if($count!=0){
        session_start();
        $_SESSION["schNameBySearch"] = "$resultArray[0]";
        header('location: savedSch.php');

    }
    else{
        echo ("No search Result Found");
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['view'])) {
    $name = $_POST['schName'];
    $db = new DBFacade();
    $demand = null;
    $resultArray=$db->getRecentlyArchive($demand);
    $count = sizeof($resultArray);
    if($count!=0){
        session_start();
        $_SESSION["schNameBySearch"] = "$name";
        header('location: savedSch.php');

    }
    else{
        echo ("No search Result Found");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['updateAdBtn'])) {

  $name = $_POST['schName'];
  $lastDate = $_POST['lastDate'];
  $db = new DBFacade();
  $db->updateScholarship($name, $lastDate);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['existAdBtn'])) {

  $sname = $_POST['schName'];
  $lastDate = $_POST['lastDate'];
  $publishDate = $_POST['publishDate'];
  $db = new DBFacade();
  $db->publishExistsScholarship($sname, $lastDate, $publishDate);
}


?>