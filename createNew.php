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

<body>
    <?php
    include("facadeClass.php");
    $db=new DBFacade();
    $deptArray = $db->getDepartment();
    $count = sizeof($deptArray);
    ?>
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
                <li class="appmenu"><a href="shortlist.php">View Shortlisted Candidates</a></li>
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
            <form action="scholarshipClass.php" method="post" onSubmit="return validate();">
                <label for="schName" class="allReq">Name of Scholarhsip</label>
                <input onchange="validate()" type="text" name="schName" id="schId" required>

                <label for="schCategory" class="rightside" class="allReq">Category of Scholarship</label>
                <select name="category" id="schCategory" onchange="showContent()" required>
                    <option value="" selected="selected" disabled="disabled">Select a Category</option>
                    <option onchange="showContent()" value="merit">Merit Based Scholarhsip</option>
                    <option onchange="showContent()" value="need">Need Based Scholarhsip</option>
                </select>
                <br>
                <label for="seat" class="allReq">Total Number of Seat</label>
                <input type="number" name="seat" id="seat" required min="1" pattern="/^-?\d+\.?\d*$/"
                    onKeyPress="if(this.value.length==5) return false;">

                <label for="lastDateApply" class="rightside" class="allReq">Closing Date</label>
                <input type="date" name="lastDate" id="lastDateApply" required>

                <label for="seat" class="allReq">Amount per Students</label>
                <input type="number" name="stipend" id="seat" required min="1" pattern="/^-?\d+\.?\d*$/"
                    onKeyPress="if(this.value.length==7) return false;">

                <label for="Interview" class="rightside" class="allReq">Publishing Date</label>
                <input type="date" name="publishDate" readonly  id="publishDate" required>
                <hr>

                <div class="need" id="needDisplay">
                    <h3 class="headingsAdmin">Set Need Based Criteria</h3>
                    <label for="maxIncome" id="incomeLable">Maximum Monthly Income</label>
                    <input type="number" name="income" id="income" min="1000" pattern="/^-?\d+\.?\d*$/"
                        onKeyPress="if(this.value.length==7) return false;">
                    <hr>
                </div>

                <div class="merit" id="meritDisplay">
                    <h3 class="headingsAdmin">Set Merit Based Criteria</h3>
                    <label for="Inter" class="mLable">Minimum Intermediate Percentage</label>
                    <input type="number" name="Inter" id="minInter" min="50" max="95" pattern="/^-?\d+\.?\d*$/"
                        onKeyPress="if(this.value.length==2) return false;">
                    <br>
                    <label for="cgpa" class="mLable">Minimum CGPA</label>
                    <input type="number" name="minCgpa" id="minCGPA" min="0" step="0.1" max="4" pattern="/^-?\d+\.?\d*$/"
                        onKeyPress="if(this.value.length==3)  return false;">
                    <br>
                    <label for="program" class="mLable">Specified Program for Scholarhsip</label>
                    <select name="Sprogram" id="Sprogram">

                        <option value="All" selected="selected">For All Program</option>
                        <option value="BS 4 year">BS 4 year</option>
                        <option value="MSc">MSc</option>
                        <option value="MPhil">Mphil</option>
                        <option value="Ph.D.">Ph.D.</option>
                    </select>

                    <label for="program" class="mLable">Specified Department for Scholarhsip</label>
                    <select name="Sdept" id="Sdept">
                    <option value="All" selected="selected">For All Department</option>
                        <?php for($i=0;$i<$count;$i++) {?>
                        <option value="<?php echo($deptArray[$i]) ?>"><?php echo($deptArray[$i]) ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <label for="semester" class="mLable">Specified Semester for Scholarhsip</label>
                    <select name="Ssemester" id="Ssemester" >

                        <option value="All" selected="selected">For All Semester except 1st</option>
                        <option value="1">1st Semester</option>
                        <option value="2">2nd Semester</option>
                        <option value="3">3rd Semester</option>
                        <option value="4">4th Semester</option>
                        <option value="5">5th Semester</option>
                        <option value="6">6th Semester</option>
                        <option value="7">7th Semester</option>
                        <option value="8">8th Semester</option>
                        <option value="9">9th Semester</option>
                        <option value="10">10th Semester</option>
                    </select>

                    <label for="region" class="mLable">Scholarhsip for Any Specified Region</label>
                    <select name="domicile" id="domicile" >
                        <option value="All" selected="selected">For overall Pakistan</option>
                        <option value="GB">Gigit-Baltistan</option>
                        <option value="AJK">AJK</option>
                        <option value="KPK">KPK</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Balochistan">Balochistan</option>
                        <option value="FATA">FATA</option>
                        <option value="ICT">Islamabad Capital Territory</option>
                        <option value="Sindh Urban">Sindh Urban</option>
                        <option value="Sindh Rural">Sindh Rural</option>
                    </select>
                    <hr>
                </div>
                <center>
                    <div class="next">
                        <button class="footbutton"
                            value="submit" name="create">PUBLISH</button>
                    </div>

                </center>
            </form>

        </div>

    </div>

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

        document.getElementById( "publishDate").value=today;
       
        function doesContainNumber(name) {
            for (i = 0; i < name.length; i++) {
                if(name[i]==` `){
                    continue
                }
                if (!((name[i] >= 'a' && name[i] <= 'z') || (name[i] >= 'A' && name[i] <= 'Z'))) {
                    return false;
                }
            }
            return true;
        }


        function validate() {
            let name = document.getElementById(`schId`).value
            if (name.length == 0 || !doesContainNumber(name)) {
                let errorName = document.getElementById("schId");
                errorName.style.border = "1px solid red";
                return false
            }
            else {
                let errorName = document.getElementById("schId");
                errorName.style.border = "1px solid black";
                return true
            }
        }

        function showContent() {
            let income = document.getElementById(`income`)
            let cgpa = document.getElementById(`minCGPA`)
            let inter = document.getElementById(`minInter`)
            let show = document.getElementById(`schCategory`).selectedIndex
            let merit = document.getElementById(`meritDisplay`)
            let need = document.getElementById(`needDisplay`)
            let displaySet1 = merit.style.display
            let displaySet2 = need.style.display
            if (displaySet1 == `` && displaySet2 == ``) {
                if (show == 1) {
                    if (displaySet1 == ``) {
                        merit.style.display = `block`
                        if (displaySet2 == `block`) {
                            need.style.display = `none`
                        }
                    }
                    if (displaySet1 == `block`) {
                        if (displaySet2 == `block`) {
                            need.style.display = `none`
                        }
                    }
                }

                else {
                    if (displaySet2 == ``) {
                        need.style.display = `block`
                        if (displaySet1 == `block`) {
                            merit.style.display = `none`
                        }
                    }
                    if (displaySet2 == `block`) {
                        if (displaySet1 == `block`) {
                            merit.style.display = `none`
                        }
                    }

                }
            }

            if (displaySet1 == `` && displaySet2 == `block`) {
                merit.style.display = `block`
                need.style.display = ``
            }
            if (displaySet1 == `block` && displaySet2 == ``) {
                need.style.display = `block`
                merit.style.display = ``
            }

            if (merit.style.display == `block`) {
                inter.setAttribute('required', '');
                cgpa.setAttribute('required', '');
                income.removeAttribute(`required`)
            }
            
            if (need.style.display == `block`) {
                income.setAttribute(`required`, ``);
                inter.removeAttribute('required');
                cgpa.removeAttribute('required');
            }
        }



    </script>








</body>

</html>