<?php
session_start();
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
    <link rel="stylesheet" href="footer.css">
    <title>Scholarhsip Management System</title>
    <style>
        .schHead {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #schDesc {
            padding: 3px 3px;
        }

        #EC {
            margin-top: 2px;
            background-color: #04AA6D;
            color: white;
            cursor: pointer;
            padding: 12px;
            border: none;
            text-align: left;
            outline: none;
            font-size: 18px;
        }

        ol li {
            padding: 2px 2px;
        }

        .schApply a {
            text-decoration: none;
            border: 2px solid black;
            color: black;
            width: 150px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color:  #05ca82;
        }

        #ApplyNow:hover {
            background-color: #02b171;
            color: white;
        }
        #back{
            text-decoration: none;
            border: 2px solid black;
            color: black;
            width: 150px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color:  #05ca82;
        }
        #back:hover {
            background-color: #02b171;
            color: white;
            cursor: pointer;
        }
    /* ------------------------- */
    #needEC{
        display: none;
    }
    #meritEC{
        display: none;
    }
    </style>
</head>

<body onload="myFunction()">

    <div class="myhead">
        <div id="logo">
            <img id="qaulogo" src="qau.jpg" alt="loading....">
        </div>

        <div id="qauname">
            <h2>QUAID-I-AZAM UNIVERSITY SCHOLARSHIP AID OFFICE</h2>
            <p>Quaid-i-Azam University is an international seat of intellectual learning that illuminates the human minds</p>
        </div>

    </div>

    <div class="schHead">
        
        <?php
        include("facadeClass.php");
        $name=$_SESSION["applyNowSch"];
        $db = new DBFacade();
        $schInfoArray= $db->schHomeInfo($name);
        $count = sizeof($schInfoArray);
        ?>
        <h3>
            <?php echo("$schInfoArray[0]")?>
        </h3>
        <p id="schDesc">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia aperiam doloribus quia illum quod a
            repellat perferendis alias, dicta tempore architecto dolorum? Iste, assumenda saepe, ex architecto optio
            a alias, minus deleniti delectus sunt facere quibusdam rem molestias corrupti dolorem adipisci
            laudantium voluptatem eius! Nihil fuga ad voluptatibus odio voluptatum mollitia magni architecto libero
            modi.
        </p>
    </div>

    <div class="Eligibility Criteria" id="meritEC">
        <h3 id="EC">Eligibility Criteria</h3>
        <ol type="a">
        <li class="Ecriteria">It is a <b>Merit Base Scholarhsip</b>. Only those student who are on regular basis can apply for this scholarhsip</li>
            <li class="Ecriteria">The minimum Intermediate Percentage required to apply for this scholarhsip is <b><?php echo($schInfoArray[7])?></b>. </li>
            <li class="Ecriteria">The Minimum CGPA required for this scholarhsip is <b><?php echo($schInfoArray[6])?></b> cgpa. No need to worry if you are first semester student. </li>
            <li class="Ecriteria">Student from <b><?php echo($schInfoArray[8])?></b> Program can apply for this scholarhsip.</li>
            <li class="Ecriteria">Student from <b><?php echo($schInfoArray[9])?></b> Department can apply for this scholarhsip.</li>
            <li class="Ecriteria">Student from <b><?php echo($schInfoArray[10])?></b> region (domicile) can apply for this scholarhsip.
            </li>
            <li class="Ecriteria">Student of <b><?php echo($schInfoArray[11])?></b> semester can apply for this scholarhsip.
            </li>
        </ol>
    </div>

    <div class="Eligibility Criteria" id="needEC">
        <h3 id="EC">Eligibility Criteria</h3>
        <ol type="a">
            <li class="Ecriteria">It is a <b>Need Base Scholarhsip</b>. Only those student who are on regular basis can apply for this scholarhsip</li>
            <li class="Ecriteria">Student from any Department and Program who are deserving are eligible to apply.</li>
            <li class="Benefits">Monthly income of Parent/Guardian should be less than or equal to <b><?php echo($schInfoArray[2])?> </b> /- PKR.</li>
        </ol>
    </div>

    <div class="Eligibility Criteria">
        <h3 id="EC">Grant Benefits</h3>
        <ol type="a">
            <li class="Benefits">A stipend of <b><?php echo($schInfoArray[2])?></b>/- PKR will be provided to each candidate for one semester.</li>
            <li class="Benefits">The duration of scholarhsip is of only one semester.</li>
        </ol>
    </div>

 

    <div class="GeneralInfo">
        <h4 style="color: red;">Note : </h4>
        <ul>
            <li>Please read all the Eligibility criteria before applying to Scholarhsip.</li>
            <li>You can not apply to any other Scholarhsip if you get selected for any scholarhsip for one semester</li>
            <li>
                The University Scholarhsip Account Section Office has right to cancel the scholarhsip of any candidate during semester.
            </li>
            <li>
                Last Date to apply for this scholarhsip is <b><?php echo($schInfoArray[4])?></b>
            </li>
            <li>
                Only <b><?php echo($schInfoArray[3])?> </b>students will get benefits from this scholarhsip. So please apply for this scholarhsip befor last date.
            </li>
        </ul>
    </div>
    <input type="text" name="" id="displayLogic" value="<?php echo($schInfoArray[1])?>" style="visibility: hidden;">

    <center>
        <div class="schApply">
            <button id="back" onclick="history.back()">BACK</button>
            <!-- <a href="needApplication.php" id="ApplyNow">APPLY</a> -->
        </div>
    </center>

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
<?php } ?>

<script>
           function myFunction() {
                let a = document.getElementById(`displayLogic`).value;
                if(a=="need"){
                    let need = document.getElementById(`needEC`)
                    let displaySet2 = need.style.display
                    if(displaySet2==''){
                        need.style.display = `block`
                    }
                }
                if(a=="merit"){
                    let merit = document.getElementById(`meritEC`)
                    let displaySet1 = merit.style.display
                    if(displaySet1==''){
                        merit.style.display = `block`
                    }

                }
            }
    
</script>
</html>