<?php
session_start();
if (isset($_SESSION["myUsername"])) {
?>
<?php
if(isset($_SESSION["applyNowSch"])){
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headstyle.css">
    <link rel="stylesheet" href="footbutton.css">
    <link rel="stylesheet" href="formstyle.css">
    <link rel="stylesheet" href="menustyle.css">
    <link rel="stylesheet" href="footer.css">
    <title>Scholarship Management System</title>
    <style>
        /* ---------------------------------- */
        .leftside {
            display: inline-block;
            width: 100px;
            text-align: left;
        }

        .rightside {
            margin-left: 15px;
            display: inline-block;
            width: 220px;
            text-align: left;

        }


        /* ----------------------------------- */
     
    </style>

</head>

<body>

    <div class="myhead">
        <div id="logo">
            <img id="qaulogo" src="qau.jpg" alt="loading....">
        </div>

        <div id="qauname">
            <h2>QUAID-I-AZAM UNIVERSITY SCHOLARSHIP AID OFFICE</h2>
            <p>Quaid-i-Azam University is an international seat of intellectual learning that illuminates the human minds</p>
        </div>
        <div class="log">
            
            <a id="login" href="studentProfile.php">HOME</a>
        </div>
    </div>

    <div class="appHead">
        <h3>
            
        <?php 
            $name=$_SESSION["applyNowSch"];
            echo ($name);
            ?>
        </h3>
        <p id="appDesc">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia aperiam doloribus quia illum quod a
            repellat perferendis alias, dicta tempore architecto dolorum? Iste, assumenda saepe, ex architecto optio
            a alias, minus deleniti delectus sunt facere quibusdam rem molestias corrupti dolorem adipisci
            laudantium voluptatem eius! Nihil fuga ad voluptatibus odio voluptatum mollitia magni architecto libero
            modi.
        </p>
    </div>

    <div class="appbody">
    <?php
            include("facadeClass.php");
            $db = new DBFacade();
            $username = $_SESSION["myUsername"];
            $educationInfo = $db->getEducationInfo($username);
            ?>
        <div class="menu">
            <ul>
                <li class="appmenu"><a href="#">Instruction</a></li>
                <li class="appmenu"><a href="#">Personal Infromation</a></li>
                <li class="appmenu"><a class="active" href="meritEducation.php">Education Information</a></li>
                <li class="appmenu"><a href="#">Document</a></li>
                <li class="appmenu"><a href="#">Review & Submit</a></li>
            </ul>
        </div>
        <form action="noaction.php" class="myform">
            <h3 class="bodyHeadings" id="ed">Education Information</h3>
            <p id="edDesc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, laborum, omnis vitae
                eos nam recusandae quos maiores dolore quasi officia pariatur aspernatur? Vel iusto, totam aspernatur
                quia voluptates repellat sunt assumenda officiis voluptatum ducimus.</p>
            <hr>
            <h3 class="bodyHeadings" id="hssc">Higher Secondary School Certificate</h3>
            <label for="inter">Program</label>
            <input type="text" id="interProgram" value="<?php echo("$educationInfo[0]") ?>" name="inter" required disabled autocomplete="disabled" autofocus>
            <label for="obtMark">Mark Obtained</label>
            <input type="number" name="obtMark"  value="<?php echo("$educationInfo[1]") ?>"  id="obtMark" required disabled autocomplete="disabled" autofocus>
            <label for="totMark">Total Marks</label>
            <input type="number" name="totMark"  value="<?php echo("$educationInfo[2]") ?>" id="totalMark" required disabled autocomplete="disabled" autofocus>
            <br>

            <label for="grad">Year Complete</label>
            <input type="number" name="year" id="interYear"  value="<?php echo("$educationInfo[3]") ?>" required disabled autocomplete="disabled" autofocus>
            <br>



            <h3 class="bodyHeadings" id="uni">University Information</h3>

            <label for="semester" class="leftside">Semester</label>
            <input type="number" name="semester" id="semester"  value="<?php echo("$educationInfo[4]") ?>" required disabled autocomplete="disabled" autofocus>
            <label for="department" class="rightside">Department</label>
            <input type="text" name="department" id="dept"  value="<?php echo("$educationInfo[5]") ?>" required disabled autocomplete="disabled" autofocus>
            <br>

            
            <label for="program" class="leftside">Program</label>
            <input type="text" name="program"  value="<?php echo("$educationInfo[6]") ?>" id="program" required disabled autocomplete="disabled" autofocus>
            <br>

            <label for="cgpa" class="leftside">CGPA</label>
            <input type="number" name="cgpa"  value="<?php echo("$educationInfo[7]") ?>" id="cgpa" required disabled autocomplete="disabled" autofocus>
            <label for="gpa" class="rightside">Last Semester GPA</label>
            <input type="number" name="gpa"  value="<?php echo("$educationInfo[8]") ?>" id="gpa" required disabled autocomplete="disabled" autofocus>
            <br>

            <label for="enrol" class="leftside">Admitted Year</label>
            <input onchange="validate()"  value="<?php echo("$educationInfo[9]") ?>" type="number" name="ayear" id="ayear" required disabled autocomplete="disabled"
                autofocus>
            <label for="grad" class="rightside">Expected Degree Complete Year</label>
            <input onchange="validate()"  value="<?php echo("$educationInfo[10]") ?>" type="number" name="gyear" id="gyear" required disabled autocomplete="disabled"
                autofocus>
            <br>

            <center>
                <div class="next">
                    <a href="meritPersonal.php" class="footbutton">Previous</a>
                    <a href="meritDocument.php" class="footbutton">Next</a>
                </div>
            </center>
        </form>
    </div>

    <footer>
    <center>
    <div class="qauFooter">
    <?php
    $db = new DBFacade();
    $getContact=$db->getFooter();
?>

        <h3 id="footername">Quaid-i-Azam University Islamabad, 45320, Pakistan.</h3>
        <br>
        <label for="contact">Tel : </label>
        <input type="text" name="tel" id="tel" disabled value="<?php echo($getContact[0]) ?>">
        <label for="Email">Email : </label>
        <input type="email" name="email" id="em" disabled value="<?php echo($getContact[1]) ?>"">
    </div>
</center>
    </footer>

</body>

</html>

<?php } ?>
<?php } ?>