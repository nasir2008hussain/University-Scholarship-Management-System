<?php

class DBFacade
{
   public $Name;
   public function connect()
   {
      $conn = new mysqli("localhost", "root", "", "university scholarship management system", 3306);
      if ($conn == false)
         die("\n >> Database not connected successfully ...");
      return $conn;
   }

   function checkValidAccount($account)
   {
      $username = $account->getUsername();
      $password = $account->getPassword();

      $query = "SELECT * FROM students WHERE registration = '$username' AND password = '$password'";
      $results = mysqli_query($this->connect(), $query);

      if (mysqli_num_rows($results) > 0) {
         $row = mysqli_fetch_row($results);

         $query1 = "SELECT * FROM students WHERE registration = '$row[0]'";
         $results1 = mysqli_query($this->connect(), $query1);
         $row2 = mysqli_fetch_row($results1);
         return $row2[0];
      }
      return -1;
   }


   function createNeedScholarship($need, $scholarship)
   {
      $name = $scholarship->getname();
      $seat = $scholarship->getSeat();
      $stipend = $scholarship->getstipend();
      $lastDate = $scholarship->getlastDate();
      $publishDate = $scholarship->getpublishDate();
      $category = $scholarship->getCategory();
      $income = $need->getIncome();
      $myNull = "";
      echo ("$name, $seat,$stipend,$lastDate,$publishDate,$category,$income,$myNull");
    
      $my_query1 = "INSERT INTO scholarships (name, seat, stipend, lastDate, publishDate, category,income) VALUES ('$name', '$seat','$stipend', '$lastDate', '$publishDate','$category','$income')";

      $results1 = mysqli_query($this->connect(), $my_query1);
      if($results1) {
         echo ("New record created successfully");
       } else {
      echo("Not Insert successfully");
       }
    
   }

   function createMeritScholarship($merit, $scholarship)
   {
      $name = $scholarship->getname();
      $seat = $scholarship->getSeat();
      $stipend = $scholarship->getstipend();
      $lastDate = $scholarship->getlastDate();
      $publishDate = $scholarship->getpublishDate();
      $category = $scholarship->getCategory();
      $minCgpa = $merit->getCgpa();
      $inter = $merit->getInter();
      $program = $merit->getProgram();
      $semester = $merit->getSemester();
      $domicile = $merit->getRegion();
      $department = $merit->getDept();
      $income = "NULL";
      echo ("$name, $seat,$stipend,$lastDate,$publishDate,$category,$minCgpa,$inter,$program,$domicile,$department, $semester,$income");
     
      $my_query1 = "INSERT INTO scholarships (name, seat, stipend, lastDate, publishDate, category,income,minCgpa,interPercent,program,department,domicile,semester) VALUES ('$name', '$seat','$stipend', '$lastDate', '$publishDate','$category',NULL,'$minCgpa','$inter','$program','$department','$domicile','$semester' )";


      $results1 = mysqli_query($this->connect(), $my_query1);
      if($results1) {
      echo ("New record created successfully");
      } else {
      echo("Not Insert successfully");
      }
   }


   function getadScholarsipInfo(){
      $my_query1 = "SELECT * FROM scholarships WHERE lastDate >= now()";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $i = 0;
      $arrScholarship = array();
      while ($row = mysqli_fetch_array($result1)) {
         $Name = $row["name"];
         $lastDate = $row["lastDate"];
         $arrScholarship[$i] = ($Name);
         $i++;
         $arrScholarship[$i] = $lastDate;
         $i++;
      }
      return $arrScholarship;
   }

   function getarchScholarsipInfo(){
      $my_query1 = "SELECT * FROM scholarships WHERE lastDate < now()";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $i = 0;
      $arrScholarship = array();
      while ($row = mysqli_fetch_array($result1)) {
         $Name = $row["name"];
         $arrScholarship[$i] = ($Name);
         $i++;
      }
      return $arrScholarship;
   }


   function updateScholarship($sname,$lastDate){
         $my_query1 = "UPDATE scholarships SET lastDate = '$lastDate' WHERE name='$sname'";
         $result1 = mysqli_query($this->connect(), $my_query1);
         if ($result1) {
            echo ("Record updated successfully");
         } else {
            echo ("Not updated successfully");
         }
   }

   function searchScholarship($search){
      $my_query1 = "SELECT * FROM scholarships WHERE name='$search' AND lastDate < now()";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $searchScholarshipResult = array();
      $i = 0;
      while ($row = mysqli_fetch_array($result1)) {
         $Name = $row["name"];
         $searchScholarshipResult[$i] = $Name;
         $i++;
         $Category = $row["category"];
         $searchScholarshipResult[$i] = $Category;
         $i++;
         $stipend = $row["stipend"];
         $searchScholarshipResult[$i] = $stipend;
         $i++;
         $seat = $row["seat"];
         $searchScholarshipResult[$i] = $seat;
         $i++;
         $lastDate = $row["lastDate"];
         $searchScholarshipResult[$i] = $lastDate;
         $i++;
         $publishDate = $row["publishDate"];
         $searchScholarshipResult[$i] = $publishDate;
         $i++;
         if($Category=="need"){
            $income=$row["income"];
            $searchScholarshipResult[$i] = $income;
         }
         if($Category=="merit"){
            $minCgpa=$row["minCgpa"];
            $searchScholarshipResult[$i] = $minCgpa;
            $i++;
            $inter=$row["interPercent"];
            $searchScholarshipResult[$i] = $inter;
            $i++;
            $program=$row["program"];
            $searchScholarshipResult[$i] = $program;
            $i++;
            $department=$row["department"];
            $searchScholarshipResult[$i] = $department;
            $i++;
            $domicile=$row["domicile"];
            $searchScholarshipResult[$i] = $domicile;
            $i++;
            $semester=$row["semester"];
            $searchScholarshipResult[$i] = $semester;

         }
     
      }
      return $searchScholarshipResult;
   }

   function publishExistsScholarship($sname,$lastDate,$publishDate){
      $InD=null;
      $my_query = "SELECT * FROM scholarships WHERE name ='$sname' ";
      $result=mysqli_query($this->connect(), $my_query);
      while ($row = mysqli_fetch_array($result)) {
         echo ($row["name"]);
         echo ($row["lastDate"]);
         echo($row["publishDate"]);
      }
      $my_query1 = "UPDATE scholarships SET lastDate = '$lastDate', publishDate='$publishDate' WHERE name='$sname'";
      $result1 = mysqli_query($this->connect(), $my_query1);
      if ($result1) {
         header('location: adminHome.php');
      } else {
         echo ("Not updated successfully");
      }
   }

   function getRecentlyArchive($demand){
      $my_query1 = "SELECT * FROM scholarships WHERE lastDate > DATE_SUB(now(), INTERVAL 3 MONTH) && lastDate<now()";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $searchScholarshipResult = array();
      $onlyName = array();
      $i = 0;
      $j = 0;
      while ($row = mysqli_fetch_array($result1)) {
         $Name = $row["name"];
         $searchScholarshipResult[$i] = $Name;
         $onlyName[$j] = $Name;
         $j++;
         $i++;
         $Category = $row["category"];
         $searchScholarshipResult[$i] = $Category;
         $i++;
         $stipend = $row["stipend"];
         $searchScholarshipResult[$i] = $stipend;
         $i++;
         $seat = $row["seat"];
         $searchScholarshipResult[$i] = $seat;
         $i++;
         $lastDate = $row["lastDate"];
         $searchScholarshipResult[$i] = $lastDate;
         $i++;
         $publishDate = $row["publishDate"];
         $searchScholarshipResult[$i] = $publishDate;
         $i++;
         if($Category=="need"){
            $income=$row["income"];
            $searchScholarshipResult[$i] = $income;
         }
         if($Category=="merit"){
            $minCgpa=$row["minCgpa"];
            $searchScholarshipResult[$i] = $minCgpa;
            $i++;
            $inter=$row["interPercent"];
            $searchScholarshipResult[$i] = $inter;
            $i++;
            $program=$row["program"];
            $searchScholarshipResult[$i] = $program;
            $i++;
            $department=$row["department"];
            $searchScholarshipResult[$i] = $department;
            $i++;
            $domicile=$row["domicile"];
            $searchScholarshipResult[$i] = $domicile;
            $i++;
            $semester=$row["semester"];
            $searchScholarshipResult[$i] = $semester;

         }
     
      }
      if ($demand != "onlyName") {
         return $searchScholarshipResult;
      }
      else{
         return $onlyName;
      }

   }

   function schHomeInfo($search){
      $my_query1 = "SELECT * FROM scholarships WHERE name='$search'";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $searchScholarshipResult = array();
      $i = 0;
      while ($row = mysqli_fetch_array($result1)) {
         $Name = $row["name"];
         $searchScholarshipResult[$i] = $Name;
         $i++;
         $Category = $row["category"];
         $searchScholarshipResult[$i] = $Category;
         $i++;
         $stipend = $row["stipend"];
         $searchScholarshipResult[$i] = $stipend;
         $i++;
         $seat = $row["seat"];
         $searchScholarshipResult[$i] = $seat;
         $i++;
         $lastDate = $row["lastDate"];
         $searchScholarshipResult[$i] = $lastDate;
         $i++;
         $publishDate = $row["publishDate"];
         $searchScholarshipResult[$i] = $publishDate;
         $i++;
         if($Category=="need"){
            $income=$row["income"];
            $searchScholarshipResult[$i] = $income;
         }
         if($Category=="merit"){
            $minCgpa=$row["minCgpa"];
            $searchScholarshipResult[$i] = $minCgpa;
            $i++;
            $inter=$row["interPercent"];
            $searchScholarshipResult[$i] = $inter;
            $i++;
            $program=$row["program"];
            $searchScholarshipResult[$i] = $program;
            $i++;
            $department=$row["department"];
            $searchScholarshipResult[$i] = $department;
            $i++;
            $domicile=$row["domicile"];
            $searchScholarshipResult[$i] = $domicile;
            $i++;
            $semester=$row["semester"];
            $searchScholarshipResult[$i] = $semester;

         }
     
      }
      return $searchScholarshipResult;
   }

   function getScholarshipCategory($search)
   {
      $my_query1 = "SELECT * FROM scholarships WHERE name='$search'";
      $result1 = mysqli_query($this->connect(), $my_query1);
      while ($row = mysqli_fetch_array($result1)) {
         $Category = $row["category"];
         return $Category;
      }
   }


   function retrieveStudentInfo($username){
      $my_query1 = "SELECT * FROM students WHERE registration='$username'";
      $results1 = mysqli_query($this->connect(), $my_query1);
      while ($row = mysqli_fetch_array($results1)) {
         $Name = $row["name"];
         $registration = $row["registration"];
         $dept = $row["department"]; 
         $program = $row["program"];
         $semester = $row["semester"];
         $image = $row["profile"];

         $my_query2 = "SELECT * FROM departments WHERE departmentId='$dept'";
         $results2 = mysqli_query($this->connect(), $my_query2);
         while ($row = mysqli_fetch_array($results2)) {
            $dept = $row["departmentName"];
         }

         $my_query3 = "SELECT * FROM programs WHERE programId='$program'";
         $results3 = mysqli_query($this->connect(), $my_query3);
         while ($row = mysqli_fetch_array($results3)) {
            $program = $row["programName"];
         }
      }
      $studentInfo=array($Name,$registration,$dept,$program,$semester,$image);
      return $studentInfo;
   }


   function checkEligibility($username,$schname){
      $my_query1 = "SELECT * FROM scholarships WHERE name='$schname'";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $searchScholarshipResult = array();
      $i = 0;
      while ($row = mysqli_fetch_array($result1)) {
         $Category = $row["category"];
         $searchScholarshipResult[$i] = $Category;
         $i++;
      
         if ($Category == "need") {
            $eligible = "1";
            return $eligible;
         }
         if ($Category == "merit") {
            $minCgpa = $row["minCgpa"];
            $searchScholarshipResult[$i] = $minCgpa;
            $i++;
            $inter = $row["interPercent"];
            $searchScholarshipResult[$i] = $inter;
            $i++;
            $program = $row["program"];
            $searchScholarshipResult[$i] = $program;
            $i++;
            $department = $row["department"];
            $searchScholarshipResult[$i] = $department;
            $i++;
            $domicile = $row["domicile"];
            $searchScholarshipResult[$i] = $domicile;
            $i++;
            $semester = $row["semester"];
            $searchScholarshipResult[$i] = $semester;
         }
      }

         $my_query11 = "SELECT * FROM students WHERE registration='$username'";
         $result11 = mysqli_query($this->connect(), $my_query11);
         $searchStdResult = array();
         $j = 0;
         while ($row1 = mysqli_fetch_array($result11)) {
            
            $searchStdResult[$j] =  $row1["cgpa"];

            $j++;
            $percent = ($row1["interMarksObt"] / $row1["interMarksTotal"]) * 100;
            $searchStdResult[$j] =  $percent;

            $j++;
            $program= $row1["program"];
            $my_query4 = "SELECT * FROM programs WHERE programId='$program'";
            $results4 = mysqli_query($this->connect(), $my_query4);
            while ($row = mysqli_fetch_array($results4)) {
               $searchStdResult[$j] = $row["programName"];
            }

            $j++;
            $dept = $row1["department"];
            $my_query3 = "SELECT * FROM departments WHERE departmentId='$dept'";
            $results3 = mysqli_query($this->connect(), $my_query3);
            while ($row = mysqli_fetch_array($results3)) {
               $searchStdResult[$j]  = $row["departmentName"];
            }

            $j++;
            $domicile = $row1["domicile"];
            $my_query13 = "SELECT * FROM domicile WHERE domicileId='$domicile'";
            $results13 = mysqli_query($this->connect(), $my_query13);
            while ($row13 = mysqli_fetch_array($results13)) {
               $searchStdResult[$j]  = $row13["domicileName"];
            }

            $j++;
            $searchStdResult[$j]  = $row1["semester"];


      }
      

      if($searchStdResult[0]>=$searchScholarshipResult[1] || $searchStdResult[5]=="1"){
         if($searchStdResult[1]>=$searchScholarshipResult[2]){
            if($searchStdResult[2]==$searchScholarshipResult[3]||$searchScholarshipResult[3]=="All"){
               if($searchStdResult[3]==$searchScholarshipResult[4]||$searchScholarshipResult[4]=="All"){
                  if($searchStdResult[4]==$searchScholarshipResult[5]||$searchScholarshipResult[5]=="All"){
                     if($searchStdResult[5]==$searchScholarshipResult[6]||$searchScholarshipResult[6]=="All"){
                        $eligible = "1";
                        return $eligible;

                     }} }}}
      }
      else{
         $eligible = "0";
         return $eligible;
      }
   }

   function getPersonalInfo($username){
      $my_query1 = "SELECT * FROM students WHERE registration='$username'";
      $results1 = mysqli_query($this->connect(), $my_query1);
      while ($row = mysqli_fetch_array($results1)) {
         $Name = $row["name"];
         $FatherName = $row["fatherName"];
         $Gender = $row["gender"];
         $Cnic = $row["cnic"];
         $DOB = $row["dob"];
         $Contact = $row["contactNo"];
         $dmc = $row["domicile"];
         $email = $row["email"];
         $city = $row["city"];
         $permAdd = $row["permanentAddress"];
         $currAdd = $row["residentialAddress"];
         $my_query13 = "SELECT * FROM domicile WHERE domicileId='$dmc'";
         $results13 = mysqli_query($this->connect(), $my_query13);
         while ($row13 = mysqli_fetch_array($results13)) {
            $dmc  = $row13["domicileName"];
         }
      }
      $studentInfo=array($Name,$FatherName,$Gender,$Cnic,$DOB,$Contact,$dmc,$email,$city,$permAdd,$currAdd);
      return $studentInfo;
   }

   function getEducationInfo($username){
      $my_query1 = "SELECT * FROM students WHERE registration='$username'";
      $results1 = mysqli_query($this->connect(), $my_query1);
      while ($row = mysqli_fetch_array($results1)) {
         $iProgram = $row["interProgram"];
         $iMarks = $row["interMarksObt"];
         $iTotal = $row["interMarksTotal"];
         $iYear = $row["interYearComplete"];
         $semester = $row["semester"];
         $department = $row["department"];
         $program = $row["program"];
         $cgpa = $row["cgpa"];
         $gpa = $row["lastGpa"];
         $admitY = $row["admittedYear"];
         $grad = $row["expectGrad"];
      
         $my_query4 = "SELECT * FROM programs WHERE programId='$program'";
         $results4 = mysqli_query($this->connect(), $my_query4);
         while ($row = mysqli_fetch_array($results4)) {
            $program = $row["programName"];
         }

         $my_query3 = "SELECT * FROM departments WHERE departmentId='$department'";
         $results3 = mysqli_query($this->connect(), $my_query3);
         while ($row = mysqli_fetch_array($results3)) {
            $department  = $row["departmentName"];
         }

         $my_query5 = "SELECT * FROM interProgram WHERE interId ='$iProgram'";
         $results5 = mysqli_query($this->connect(), $my_query5);
         while ($row = mysqli_fetch_array($results5)) {
            $iProgram  = $row["interName"];
         }
      
      }
      $studentInfo=array($iProgram,$iMarks,$iTotal,$iYear,$semester,$department,$program,$cgpa,$gpa,$admitY,$grad);
      return $studentInfo;
   }
 

}
?>
