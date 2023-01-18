<?php

class DBFacade
{

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

      $query = "SELECT * FROM admin WHERE name = '$username' AND password = '$password'";
      $results = mysqli_query($this->connect(), $query);
      if (mysqli_num_rows($results) > 0) {
         $row = mysqli_fetch_row($results);
         $query1 = "SELECT * FROM admin WHERE password = '$row[3]'";
         $results1 = mysqli_query($this->connect(), $query1);
         $row2 = mysqli_fetch_row($results1);
         $std = "admin";
         return $std;
      }
      else{
         $query = "SELECT * FROM students WHERE registration = '$username' AND password = '$password'";
         $results = mysqli_query($this->connect(), $query);
   
         if (mysqli_num_rows($results) > 0) {
            $row = mysqli_fetch_row($results);
   
            $query1 = "SELECT * FROM students WHERE registration = '$row[0]'";
            $results1 = mysqli_query($this->connect(), $query1);
            $row2 = mysqli_fetch_row($results1);
            $std = "student";
            return $std;
         }
         return -1;
      }
   }

   function getDepartment()
   {
      $query1 = "SELECT * FROM departments ";
      $results1 = mysqli_query($this->connect(), $query1);
      $i = 0;
      $deptArray=array();
      if ($results1->num_rows > 0) {
         while ($optionData = $results1->fetch_assoc()) {
            $deptArray[$i] = $optionData['departmentName'];
            $i++;
         }
      }
      return $deptArray;
   }

   function setContact($contact,$mail){
      $my_query1 = "UPDATE admin SET contact = '$contact', email='$mail' WHERE name='admin'";
      $result1 = mysqli_query($this->connect(), $my_query1);
      if ($result1) {
         header('location:adminHome.php');
      } else {
         echo ("Not updated successfully");
      }

   }

   function getFooter()
   {
      $query = "SELECT * FROM admin WHERE name='admin'";
      $results = mysqli_query($this->connect(), $query);
      $contactDetail = array();
      if (mysqli_num_rows($results) > 0) {
         $row = mysqli_fetch_row($results);
         $contactDetail[0] = $row[0];
         $contactDetail[1] = $row[1];
      }
      return $contactDetail;
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
      // echo ("$name, $seat,$stipend,$lastDate,$publishDate,$category,$minCgpa,$inter,$program,$domicile,$department, $semester,$income");
     
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

   function getadScholarsipInfoStudent($username1){
      $username = $username1;
      $curStatus = "submitted";
   
      $my_query1 = "SELECT scholarships.name,scholarships.lastDate FROM scholarships
      WHERE scholarships.lastDate>=now() AND  scholarships.name 
      NOT IN (
         SELECT applicants.applicantScholarshipName FROM applicants
         WHERE applicants.applicationStatus='$curStatus' AND applicants.applicantRegNo='$username'
         
         )" ; 

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

      // $my_query1 = "SELECT scholarships.name,scholarships.lastDate FROM scholarships LEFT JOIN applicants ON scholarships.name=applicants.applicantScholarshipName WHERE 
      // applicants.applicantID IS NOT NULL AND applicants.applicantRegNo='$username' AND scholarships.name != applicants.applicantScholarshipName";
   }


   function getadScholarsipInfoAdmin(){
      $curStatus = "active";
      $result = mysqli_query($this->connect(),"SELECT COUNT(*),scholarships.name,scholarships.lastDate FROM scholarships INNER JOIN applicants ON scholarships.name=applicants.applicantScholarshipName WHERE scholarships.currentStatus='$curStatus' AND applicants.applicantScholarshipName IS NOT NULL GROUP BY scholarships.name");
   
      $i = 0;
      $arrScholarship = array();
      while ($row = mysqli_fetch_array($result)) {
         $Name = $row["name"];
         $lastDate = $row["lastDate"];
         $count = $row["COUNT(*)"];
         $arrScholarship[$i] = ($Name);
         $i++;
         $arrScholarship[$i] = $count;
         $i++;
         $arrScholarship[$i] = $lastDate;
         $i++;
      }
      return $arrScholarship;
   }

   function getarchScholarsipInfo(){
      $my_query1 = "SELECT * FROM scholarships WHERE lastDate > DATE_SUB(now(), INTERVAL 3 MONTH) && lastDate < now()";
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
            header('location:updateAd.php');
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
      $status = "active";
      $my_query1 = "UPDATE scholarships SET lastDate = '$lastDate', publishDate='$publishDate', currentStatus='$status' WHERE name='$sname'";
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
      

      if($searchStdResult[5]=="1"){
         if($searchStdResult[5]==$searchScholarshipResult[6]){
            if($searchStdResult[1]>=$searchScholarshipResult[2]){
               $eligible = "1";
               return $eligible;
            }
         }
      }
      else if($searchStdResult[0]>=$searchScholarshipResult[1]){
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
         $altContact = $row["altContactNo"];
         $my_query13 = "SELECT * FROM domicile WHERE domicileId='$dmc'";
         $results13 = mysqli_query($this->connect(), $my_query13);
         while ($row13 = mysqli_fetch_array($results13)) {
            $dmc  = $row13["domicileName"];
         }
      }
      $studentInfo=array($Name,$FatherName,$Gender,$Cnic,$DOB,$Contact,$dmc,$email,$city,$permAdd,$currAdd,$altContact);
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

   // ---------------applicant-------------------------------
   function updateStudentInfo($studentInfo){

      $username = $studentInfo->getUsername();
      $contact = $studentInfo->getContact();
      $email = $studentInfo->getEmail();
      $address = $studentInfo->getCurrAdd();
      $altContact = $studentInfo->getAltContact();
   
  
      $my_query1 = "UPDATE students SET contactNo= '$contact', email = '$email', residentialAddress='$address', altContactNo='$altContact'  WHERE registration='$username'";
     
      $result1 = mysqli_query($this->connect(), $my_query1);
      if ($result1) {
         $ret = "1";
         return $ret;
      } else {
         $retsvalue = "2";
         return $retsvalue;
      }
   }

   // --------------------applying for merit scholarhsip----------------------------

   function applyingForMerit($meritApply){
      $username = $meritApply->getUsername();
      $schName = $meritApply->getScholarshipName();
      $inter = $meritApply->getInter();
      $challan = $meritApply->getChallan();
      $transcript = $meritApply->getTranscript();
      $myDate = date('Y-m-d');
      $status = "submitted";
      $inter = mysqli_real_escape_string($this->connect(),$inter);
      $challan = mysqli_real_escape_string($this->connect(),$challan);
      $transcript=mysqli_real_escape_string($this->connect(),$transcript);
      $my_query1 = "INSERT INTO applicants (applicantRegNo, applicantScholarshipName, applyDate, interDoc, semesterChallan, transcripts,applicationStatus) VALUES ('$username','$schName','$myDate','$inter','$challan','$transcript','$status')";

   
      $results1 = mysqli_query($this->connect(), $my_query1);
      if($results1) {
      $ret="1";
         return $ret;
      } else {
      $ret="2";
         return $ret;
      }
   }


   // need base applying

   function applyingForNeed($needApply){
      $username = $needApply->getUsername();
      $schName = $needApply->getScholarshipName();
      $inter = $needApply->getInter();
      $challan = $needApply->getChallan();
      $transcript = $needApply->getTranscript();
      $myDate = date('Y-m-d');
      $status = "submitted";

      $income = $needApply->getIncome();
      $reserve = $needApply->getReserve();
      $exp = $needApply->getExp();
      $saving = $needApply->getNet();
      $prop = $needApply->getProp();
      $house = $needApply->getHouse();
      $payslip = $needApply->getPaySlip();
      $ebill = $needApply->getEbill();
  

      $inter = mysqli_real_escape_string($this->connect(),$inter);
      $challan = mysqli_real_escape_string($this->connect(),$challan);
      $transcript=mysqli_real_escape_string($this->connect(),$transcript);
      $payslip=mysqli_real_escape_string($this->connect(),$payslip);
      $ebill=mysqli_real_escape_string($this->connect(),$ebill);

      $income1 = intval($income);
      $exp1 = intval($exp);
      $saving1 = intval($saving);
      $prop1 = intval($prop);

     

      echo("$username,$schName,$income1,$exp1,$saving1,$prop1,$house,$reserve,$status");

      $my_query1 = "INSERT INTO applicants (applicantRegNo, applicantScholarshipName, applyDate, interDoc,  
      semesterChallan, 
transcripts,applicationStatus,reserved,totalIncome,totalExpenses,savedIncome,propertyWorth,House) VALUES ('$username','$schName','$myDate','$inter','$challan','$transcript','$status','$reserve','$income1',
'$exp1','$saving1','$prop1','$house')";

      $results1 = mysqli_query($this->connect(), $my_query1);
      if($results1) {
      $ret="1";
         return $ret;
      } else {
      $ret="2";
         return $ret;
      }

   }

   // -------------------------shortlisting------------------------------

   function getForShortlist(){
      $status="active";
      $my_query1 = "SELECT * FROM scholarships WHERE currentStatus='$status' && lastDate<now()";
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

   // ----------------for status of application-------------------------------

   function getApplicationStatus($username){
      $status = "submitted";
      $my_query1 = "SELECT * FROM applicants WHERE applicantRegNo='$username' AND  applicationStatus='$status'";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $i = 0;
      $statusReport = array();
      while ($row = mysqli_fetch_array($result1)) {
         $Name = $row["applicantScholarshipName"];
         $statusReport[$i] = ($Name);
         $i++;
      }
      return $statusReport;

   }

   function showApplicationStatus($username,$scholarshipName){
      $status = "submitted";
      $my_query1 = "SELECT * FROM applicants WHERE applicantRegNo='$username' AND  applicantScholarshipName='$scholarshipName' AND applicationStatus='$status'";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $i = 0;
      $statusReport = array();
      while ($row = mysqli_fetch_array($result1)) {
         $Name = $row["applicantScholarshipName"];
         $statusReport[$i] = ($Name);
         $i++;
         $report=$row["applyDate"];
         $statusReport[$i] = $report;
         $i++;
         $tracking = $row["applicantID"];
         $statusReport[$i] = $tracking;
         $i++;
         $currStatus = $row["applicationStatus"];
         $statusReport[$i] = $currStatus;
         $i++;
      }
      return $statusReport;

   }

   // -------------generate shortlist--------------------------
   function generateShortlistNow($name){
      $schName = $name;
      $my_query1 = "SELECT * FROM scholarships WHERE name='$schName'";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $Name = "";
      $seat=0;
      $sem = "";
      $shortArray=array();
      $i = 0;
      $reg=0;
      $todaydate = date("Y-m-d", time());  //<== DON'T FORGET THE 2ND ARGUMENT TO date(): TIME-STAMP. YOU MAY USE: time()
      $sqlDate   = date('Y-m-d', strtotime($todaydate));
      
      while ($row = mysqli_fetch_array($result1)) {
       
         $Name = $row["category"];
         $seat = $row["seat"];
         $sem = $row["semester"];
         
      }


      
      if ($Name=="need") {
      
       $my_query2 = "SELECT students.* FROM students 
      WHERE registration IN
      (
       SELECT applicants.applicantRegNo FROM applicants
       WHERE applicants.applicantScholarshipName='$schName'
       ORDER BY
       CASE 
       WHEN applicants.reserved='orphan' THEN 1
       WHEN applicants.reserved='disabled' THEN 2
       WHEN applicants.reserved='no' THEN 3
       ELSE 4 END ASC,
       CASE 
       WHEN applicants.reserved='no' THEN 
       applicants.totalIncome ASC, applicants.savedIncome DESC, applicants.propertyWorth ASC
       ELSE 0 END
      )";

         $result2 = mysqli_query($this->connect(), $my_query2);
         error_reporting(E_ERROR | E_PARSE);
         while ($row2 = mysqli_fetch_array($result2)) {
            $shortArray[$i] = $row2["registration"];
            $i++;
            $shortArray[$i] = $row2["name"];
            $i++;
            $shortArray[$i] = $row2["fatherName"];
            $i++;
            $shortArray[$i] = $row2["contactNo"];
            $i++;
            $dept = $row2["department"];
            $my_query3 = "SELECT * FROM departments WHERE departmentId='$dept'";
            $results3 = mysqli_query($this->connect(), $my_query3);
            while ($row = mysqli_fetch_array($results3)) {
               $shortArray[$i] = $row["departmentName"];
            }

            $i++;
            $program = $row2["program"];
            $my_query5 = "SELECT * FROM programs WHERE programId='$program'";
            $results5 = mysqli_query($this->connect(), $my_query5);
            while ($row = mysqli_fetch_array($results5)) {
               $shortArray[$i] = $row["programName"];
            }
            $i++;
            $shortArray[$i] = $row2["semester"];
            $i++;
         }
     
         return $shortArray;
      }



      if($Name=="merit"){
         if ($sem != "1") 
         {
          $my_query2 = "SELECT students.* FROM students 
          WHERE students.semester!='1' AND registration IN
          (
           SELECT applicants.applicantRegNo FROM applicants
           WHERE applicants.applicantScholarshipName='$schName'
          )
          ORDER BY 
           interMarksObt DESC, cgpa DESC , lastGpa DESC LIMIT $seat";
         
         $result2 = mysqli_query($this->connect(), $my_query2);

         while ($row2 = mysqli_fetch_array($result2)) {
               $reg = $row2["registration"];
               $shortArray[$i] = $row2["registration"];
               $i++;
               $shortArray[$i] = $row2["name"];
               $i++;
               $shortArray[$i]=$row2["fatherName"];
               $i++;
               $shortArray[$i] = $row2["contactNo"];
               $i++;
               $dept = $row2["department"];
               $my_query3 = "SELECT * FROM departments WHERE departmentId='$dept'";
               $results3 = mysqli_query($this->connect(), $my_query3);
               while ($row = mysqli_fetch_array($results3)) {
                  $shortArray[$i]  = $row["departmentName"];
               }
   
               $i++;
               $program = $row2["program"];
               $my_query5 = "SELECT * FROM programs WHERE programId='$program'";
               $results5 = mysqli_query($this->connect(), $my_query5);
               while ($row = mysqli_fetch_array($results5)) {
                  $shortArray[$i] = $row["programName"];
               }

               $i++;
               $shortArray[$i] = $row2["semester"];
               $i++;
               $shortQuery="UPDATE applicants SET applicants.applicationStatus='selected', applicants.availingDate='$sqlDate' 
               WHERE applicants.applicantScholarshipName='$schName'
               AND applicants.applicantRegNo='$reg' AND applicants.availingDate is null";
               mysqli_query($this->connect(), $shortQuery);
         }
            return $shortArray;

         }
         if($sem == "1"){
            $my_query2 = "SELECT students.* FROM students 
            WHERE registration IN
            (
             SELECT applicants.applicantRegNo FROM applicants
             WHERE applicants.applicantScholarshipName='$schName'
            )
            ORDER BY 
             interMarkObt DESC LIMIT $seat";
           //   -query to fetch
           $result2 = mysqli_query($this->connect(), $my_query2);
  
           while ($row2 = mysqli_fetch_array($result2)) {
                 $shortArray[$i] = $row2["registration"];
                 $i++;
                 $shortArray[$i] = $row2["name"];
                 $i++;
                 $shortArray[$i]=$row2["fatherName"];
                 $i++;
                 $shortArray[$i] = $row2["contactNo"];
                 $i++;
                 $dept = $row2["department"];
                 $my_query3 = "SELECT * FROM departments WHERE departmentId='$dept'";
                 $results3 = mysqli_query($this->connect(), $my_query3);
                 while ($row = mysqli_fetch_array($results3)) {
                    $shortArray[$i]  = $row["departmentName"];
                 }
     
                 $i++;
                 $program = $row2["program"];
                 $my_query5 = "SELECT * FROM programs WHERE programId='$program'";
                 $results5 = mysqli_query($this->connect(), $my_query5);
                 while ($row = mysqli_fetch_array($results5)) {
                    $shortArray[$i] = $row["programName"];
                 }
  
                 $i++;
                 $shortArray[$i] = $row2["semester"];
               $i++;
             

           }


              return $shortArray;

         }

   }

   // -----------------inform student for shortlisted-----------------------------

   }

   function getApplicationSuccess($username){
      $status = "selected";
      $my_query1 = "SELECT * FROM applicants WHERE applicantRegNo='$username' AND  applicationStatus='$status'";
      $result1 = mysqli_query($this->connect(), $my_query1);
      $i = 0;
      $statusReport = array();
      while ($row = mysqli_fetch_array($result1)) {
         $Name = $row["applicantScholarshipName"];
         $start=$row["availingDate"];
         $statusReport[$i] = ($Name);
         $i++;
         $statusReport[$i] = $start;
         $i++;
      }
      return $statusReport;

   }


   
function informStudent($schName){
      $deactiveSch = $schName;
      $my_query2 = "UPDATE applicants SET applicants.applicationStatus='rejected' WHERE applicationStatus='submitted' AND applicants.applicantScholarshipName='$schName'";
      $result1 = mysqli_query($this->connect(), $my_query2);
      return $result1;
}

}
?>
