<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headstyle.css">
    <link rel="stylesheet" href="menustyle.css">
    <link rel="stylesheet" href="footbutton.css">

    <title>Scholarhsip Management System</title>
    <style>
        /* ------------------------------- */



        #headtitle {
            text-align: center;
        }

        #headdesc {
            padding: 2px 2px;
        }

        ol li a {
            list-style: none;
            text-decoration: none;
            color: black;
        }

        ol li {
            padding: 3px 3px;
            border: 1px solid black;
            margin: 2px 2px;
            height: 20px;
        }




        /* -------------home------------------------ */

        .home a {
            text-decoration: none;
            display: block;
            color: black;
            padding: 10px 10px;
            font-size: larger;
        }


        .menuAdmin {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            padding: 3px 3px;
            margin: 2px 2px;
            width: 20%;


        }

        .active {
            background-color: #18ca89;

        }



        /* -------------------------------------------- */
        .headingsAdmin {
            background-color: #18ca89;
            width: 100%;
            color: white;
            padding: 6px 6px;

        }

        .currSch {
            padding: 2px 2px;
        }

        .menu {
            margin-left: -2%;
        }



        /* ----------------------- */

        .boxes {
            border: 0.5px solid #18ca89;
            padding: 3px 3px;
            margin: 8px 3px;
        }

        /* ----------form---------------- */

        label {
            display: inline-block;
            width: 250px;
            margin: 10px 0px;
        }

        .allReq {
            display: inline-block;
            width: 200px;
            margin: 10px 0px;
        }

        select {
            width: 210px;
        }

        input {
            width: 200px;
        }

        input {
            height: 20px;
        }

        .rightside {
            margin-left: 25px;
            display: inline-block;
            width: 200px;

        }

        #incomeLable {
            display: inline-block;
            width: 200px;
        }

        .mLabel {
            display: inline-block;
            width: 10px;
        }

        #meritDisplay {
            display: none;
        }

        #needDisplay {
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
        <div class="log">
            <a id="login" href="Login.php">Logout</a>
        </div>
    </div>

    <center>
        <h2 id="portal">Welcome to Admin Portal</h2>
        <p id="portalDesc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam iusto amet esse, possimus iure
            ex eius maiores minus, consectetur earum fugiat, repellat eveniet asperiores! Error id dignissimos accusamus
            illum alias corporis quas necessitatibus dolore sapiente molestiae quaerat obcaecati, vel ab adipisci aut
            facilis quae dolor repudiandae perspiciatis incidunt itaque earum? Dolore hic labore id necessitatibus.</p>
    </center>


    <div class="appbody">
        <div class="menu">
            <ul>
                <li class="appmenu"><a href="adminHome.php">Home</a></li>
                <li class="appmenu"><a class="active" href="createNew.php">Create New Scholarship</a></li>
                <li class="appmenu"><a href="updateAd.php">Update Advertised Scholarship</a></li>
                <li class="appmenu"><a href="pubExSch.php">Publish Existing Scholarship</a></li>
                <li class="appmenu"><a href="shortlist.html">View Shortlisted Candidates</a></li>
                <li class="appmenu"><a href="viewPrevious.html">View Previous Scholarhsip</a></li>
                <li class="appmenu"><a href="stdRecord.html">View Student Record</a></li>
                <li class="appmenu"><a href="contact.php">Update Contact Details</a></li>
            </ul>
        </div>
        <div class="currSch">
            <h3 class="headingsAdmin">Create New Scholarhsip</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum ab quas illum odio qui repellat,
                consectetur neque at? Tenetur officiis ipsam libero sed minima mollitia commodi enim, saepe dolorum
                nulla obcaecati
            </p>
            <form action="scholarshipClass.php" method="post">
                <?php
                $name = $_SESSION["schNameBySearch"];
                include("facadeClass.php");
                $db = new DBFacade();
                $resultArray = $db->searchScholarship($name);
                ?>
                <label for="schName" class="allReq">Name of Scholarhsip</label>
                <input type="text" name="schName" readonly value="<?php echo("$resultArray[0]");?>" id="schId"
                required>
                <label for="schCategory" class="rightside" class="allReq">Category of Scholarship</label>
                <select name="category" id="schCategory">
                    <option value="<?php echo($resultArray[1]);?>" selected="selected" readonly>
                        <?php echo($resultArray[1]);?> base Category
                    </option>
                </select>
                <br>
                <label for="seat" class="allReq">Total Number of Seat</label>                
                <input type="text" readonly value="<?php echo($resultArray[3]);?>"  name="seat" id="seat" required min="1">
                <label for="lastDateApply" class="rightside" class="allReq">Closing Date</label>
                <input type="date"   name="lastDate" id="lastDateApply" min="<?php date("Y/m/d") ?>" required>
                <br>

                <label for="seat" class="allReq">Amount per Students</label>
                <input type="text" readonly name="stipend" id="seat" required min="1" pattern="/^-?\d+\.?\d*$/"
                   value="<?php echo($resultArray[2]);?>"  onKeyPress="if(this.value.length==7) return false;">

                <label for="Interview" class="rightside" class="allReq">Publishing Date</label>
                <input type="date" name="publishDate" id="publishDate" readonly required>
                <br>

                <hr>
                <div class="need" id="needDisplay">
                    <h3 class="headingsAdmin">Set Need Based Criteria</h3>
                    <label for="maxIncome" id="incomeLable">Maximum Monthly Income</label>
                    <input type="text" readonly name="income" value=" <?php echo($resultArray[6]);?>"  id="income" min="1000" required>
                    <hr>
                </div>

                <div class="merit" id="meritDisplay">
                    <h3 class="headingsAdmin">Set Merit Based Criteria</h3>
                    <label for="Inter" class="mLable">Minimum Intermediate Percentage</label>
                    <input type="text" readonly name="Inter" id="minInter" max="90" value="<?php echo($resultArray[7]);?>">
                    <br>
                    <label for="cgpa" class="mLable">Minimum CGPA</label>
                    <input type="number" readonly name="minCgpa" id="minCGPA" max="4" value="<?php echo($resultArray[6]);?>">
                    <br>
                    <label for="program" class="mLable">Specified Program for Scholarhsip</label>
                    <select name="Sprogram" id="Sprogram">
                    <option value="<?php echo($resultArray[8]);?>" selected="selected">
                        <?php echo($resultArray[8]);?>
                    </option>
                      
                    </select>
                    <label for="program" class="mLable">Specified Department for Scholarhsip</label>
                    <select name="Sdept" id="Sdept">
                        <option value="0" selected="selected"><?php echo($resultArray[9]) ?></option>      
                    </select>
                    <br>
                    <label for="semester" class="mLable">Specified Semester for Scholarhsip</label>
                    <select name="Ssemester" id="Ssemester" readonly>
                        <option value=" <?php echo($resultArray[11]);?>" selected="selected"> <?php echo($resultArray[11]);?></option>
                    </select>

                    <label for="region" class="mLable">Scholarhsip for Any Specified Region</label>
                    <select name="docmicile" id="domicile" readonly>
                        <option value=" <?php echo($resultArray[10]);?>" selected="selected"> <?php echo($resultArray[10]);?></option>
                    </select>
                    <hr>
                    
                </div>
                <center>
                    <div class="next">
                      <button class="footbutton" name="existAdBtn" value="SUBMIT">PUBLISH</button>
                    </div>
                </center>
            </form>

        </div>

    </div>
    <footer>
    <center>
    <div class="qauFooter">


    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("lastDateApply").setAttribute("min", today);
        var maxtoday = (yyyy + 1) + `-` + mm + `-` + dd;
        document.getElementById("lastDateApply").setAttribute("max", maxtoday);

        document.getElementById(`publishDate`).value=today;

  
            function myFunction() {
                let a = document.getElementById(`schCategory`).value;
                if(a=="need"){
                    let need = document.getElementById(`needDisplay`)
                    let displaySet2 = need.style.display
                    if(displaySet2==''){
                        need.style.display = `block`
                    }
                }
                if(a=="merit"){
                    let merit = document.getElementById(`meritDisplay`)
                    let displaySet1 = merit.style.display
                    if(displaySet1==''){
                        merit.style.display = `block`
                    }

                }
            }




    </script>








</body>

</html>