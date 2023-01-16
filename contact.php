

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
    $db = new DBFacade();
    $contact = $db->getFooter();
    ?>
    <div class="myhead">
        <div id="logo">
            <img id="qaulogo" src="qau.jpg" alt="loading....">
        </div>

        <div id="qauname">
            <h2>QUAID-I-AZAM UNIVERSITY SCHOLARSHIP AID OFFICE</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quam pariatur fugit saepe unde
                repellendus</p>
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
                <li class="appmenu"><a href="createNew.php">Create New Scholarship</a></li>
                <li class="appmenu"><a href="updateAd.php">Update Advertised Scholarship</a></li>
                <li class="appmenu"><a href="pubExSch.php">Publish Existing Scholarship</a></li>
                <li class="appmenu"><a href="shortlist.php">View Shortlisted Candidates</a></li>
                <li class="appmenu"><a href="viewPrevious.html">View Previous Scholarhsip</a></li>
                <li class="appmenu"><a href="stdRecord.html">View Student Record</a></li>
                <li class="appmenu"><a class="active" href="contact.php">Update Contact Details</a></li>
            </ul>
        </div>
        <div class="currSch">
            <h3 class="headingsAdmin">Update Contact Detail</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum ab quas illum odio qui repellat,
                consectetur neque at? Tenetur officiis ipsam libero sed minima mollitia commodi enim, saepe dolorum
                nulla obcaecati
            </p>
            <form action="contactClass.php" method="post" onSubmit="return validate();">
                <label for="Phone Contact Number">Phone Number </label>
                <input onchange=vaidate() placeholder="051-XXXX-XXXX" value="<?php echo($contact[0])?>" type="text" name="contact" id="pNumber" required maxlength="13" >
                <br>
                <label for="error" id="errorPhone"></label>
                <br>
                <label for="MailAssist">Mail</label>
                <input type="email" onchange="validate()" placeholder="abc@qau.edu.pk" value="<?php echo($contact[1])?>" max="30" name="email" id="mail"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required>
                <br>
                <label for="error" id="errorEmail"></label>
                <center>
                    <div class="next">
                        <button class="footbutton" value="submit">SAVE</button>
                    </div>
                </center>
            </form>

        </div>

    </div>

    <script>

        function validPhone(phone) {
            let firstThree = ['0', '5', `1`]
            for (i = 0; i < 3; i++) {
                if (firstThree[i] != phone[i]) {
                    return false;
                }
            }
            for (i = 4; i < 8; i++) {
                if (!(phone[i] >= '0' && phone[i] <= '9')) {
                    return false;
                }
            }
            for (i = 9; i < 13; i++) {
                if (!(phone[i] >= '0' && phone[i] <= '9')) {
                    return false;
                }
            }
            return true;
        }

          
        function isValidEmail(email) {
            let indexofatrate = email.indexOf('@');
            let dotindex = email.lastIndexOf('.');

            if (indexofatrate < 1 || (dotindex - indexofatrate) < 2) {
                return true;
            }
            return false;
        }


        function validate() {

            let phone = document.getElementById(`pNumber`).value
            let email = document.getElementById(`mail`).value

            if (phone.length != 0) {
                if (phone.length != 13 || phone[3]!="-" || phone[8]!="-" || !validPhone(phone)) {

                    let errorPhone = document.getElementById("errorPhone");
                    errorPhone.innerHTML = "Please enter a valid contact";
                    errorPhone.style.color = "red";
                    return false
                }
                else {
                    let errorPhone = document.getElementById("errorPhone");
                    errorPhone.innerHTML = "";
                    errorPhone.style.color = "";
                    return true;
                }
            }
            else {
                let errorPhone = document.getElementById("errorPhone");
                errorPhone.innerHTML = "";
                errorPhone.style.color = "";
            }



            if (email.length != 0) {
                if (isValidEmail(email)) {
                    let errorEmail = document.getElementById("errorEmail");
                    errorEmail.innerHTML = "Please enter a valid email";
                    errorEmail.style.color = "red";
                    return false

                }
                else {
                    let errorEmail = document.getElementById("errorEmail");
                    errorEmail.innerHTML = "";
                    errorEmail.style.color = "";
                }
            }

            else {
                let errorEmail = document.getElementById("errorEmail");
                errorEmail.innerHTML = "";
                errorEmail.style.color = "";
            }



        }


    </script>



</body>

</html>