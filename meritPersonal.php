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


        /* -----------------form styling------------------- */
        .addresses {
            width: 450px;
            height: 25px;
        }

        label {
            display: inline-block;
            width: 150px;
            text-align: left;
        }

        input,
        select {
            margin-right: 15px;
        }
        
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
        <div class="menu">

            <ul>
                <li class="appmenu"><a href="#">Instruction</a></li>
                <li class="appmenu"><a class="active" href="meritPersonal.php">Personal Infromation</a></li>
                <li class="appmenu"><a href="#">Education Information</a></li>
                <li class="appmenu"><a href="#">Document</a></li>
                <li class="appmenu"><a href="#">Review & Submit</a></li>
            </ul>
        </div>
        <form action="applicantClass.php" method="post" class="myform" onSubmit="return validate();">
            <h3 class="bodyHeadings" id="personal">Personal Information</h3>
            <p id="personaldesc">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate non temporibus qui recusandae. A
                nisi vel fugiat velit impedit? Labore accusamus minus reprehenderit.
            </p>
            <hr>

            <?php
            include("facadeClass.php");
            $db = new DBFacade();
            $username = $_SESSION["myUsername"];
            $personalInfo = $db->getPersonalInfo($username);
            ?>

            <label for="name">Name</label>
            <input autocomplete="disabled" disabled="disabled" type="text" name="name" id="rname" required
                maxlength="30" value="<?php echo("$personalInfo[0]");?>">
            <label for="fname">Father Name</label>
            <input autocomplete="disabled" disabled="disabled" type="text" name="fname" id="fname" required
                maxlength="30" value="<?php echo("$personalInfo[1]");?>">
            <br><br>

            <label for="nic">CNIC</label>
            <input type="text" name="cnic" value="<?php echo("$personalInfo[3]");?>" id="cnic" disabled required maxlength="13">

            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" min="1980-01-01" value="<?php echo("$personalInfo[4]");?>"  max="2005-12-31" required disabled>
            <br><br>

            <label for="contact">Contact No</label>
            <input onchange="return validate()" value="<?php echo("$personalInfo[5]");?>" type="text" name="contact" id="contact" required placeholder="03XXXXXXXXX"
                maxlength="11" autocomplete="on"  onKeyPress="if(this.value.length==11) return false;">

            <label for="domicile">Domicile</label>
            <input type="text" id="province" value="<?php echo("$personalInfo[6]");?>" name="domicile" disabled="disabled" autocomplete="disabled" autofocus>
            <br>
            <label for="error" id="errorContact"></label>
            <br>

            <label for="email">Email</label>
            <input onchange="validate()" value="<?php echo("$personalInfo[7]");?>" type="email" name="email" id="email" required placeholder="abc123@gmail.com"
                maxlength="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">

            <label for="city">City</label>
            <input type="text" id="city" value="<?php echo("$personalInfo[8]");?>" name="city" disabled autocomplete="disabled" autofocus>
            <br>
            <label for="error" id="errorEmail"></label>
            <br>

            <label for="Permanent">Permanent Address</label>
            <input disabled name="permadd" value="<?php echo("$personalInfo[9]");?>"  id="permadd" class="addresses" maxlength="150" required>
            <br><br>

            <label for="Temporary">Residential Address</label>
            <input onchange="validate()" value="<?php echo("$personalInfo[10]");?>"  name="tempadd" id="resadd" class="addresses" maxlength="150"
                placeholder="abc town xyz road house#2 street No 2" required>
            <br>
            <label for="error" id="errorAddress2"></label>
            <br>

            <label for="contact">Alternate Mobile No</label>
            <input onchange="validate()" value="<?php echo("$personalInfo[11]");?>" placeholder="03XXXXXXXXX" type="text" name="altcontact" id="altcontact" required  onKeyPress="if(this.value.length==11) return false;">
            <br>
            <label for="error" id="errorContact2"></label>
            <br>

            <center>
                <div class="next">
                    <button value="submit" class="footbutton" name="mPersonalBtn">Save&Next</button>
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
    <!-- ---------------------script form validation -->
    <script>

        function doesContainNumber(name) {
            for (i = 0; i < name.length; i++) {
                if (!((name[i] >= 'a' && name[i] <= 'z') || (name[i] >= 'A' && name[i] <= 'Z'))) {
                    if (name[i] == ` ` || name[i] == `.`) {
                        continue
                    }
                    else {
                        return false;
                    }
                }
            }

            return true;
        }

        function isNumeric(cnic) {
            for (var i = 0; i < cnic.length; i++) {
                if (!(cnic[i] >= 0 && cnic[i] <= 9)) {
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


        function validcontact(contact) {
            let firstTwo = ['0', '3']
            for (i = 0; i < 2; i++) {
                if (firstTwo[i] != contact[i]) {
                    return false;
                }
            }
            for (i = 2; i < contact.length; i++) {
                if (!(contact[i] >= '0' && contact[i] <= '9')) {
                    return false;
                }
            }
            return true;
        }


        function validate() {
    
            let contact = document.getElementById(`contact`).value
            let email = document.getElementById(`email`).value
            let contact2 = document.getElementById(`altcontact`).value
            let residential = document.getElementById(`resadd`).value


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

            if (contact.length != 0) {
                if (contact.length != 11 || !validcontact(contact)) {
                    let errorContact = document.getElementById("errorContact");
                    errorContact.innerHTML = "Please enter a valid contact";
                    errorContact.style.color = "red";
                    return false
                }
                else {
                    let errorContact = document.getElementById("errorContact");
                    errorContact.innerHTML = "";
                    errorContact.style.color = "";
                }
            }
            else {
                let errorContact = document.getElementById("errorContact");
                errorContact.innerHTML = "";
                errorContact.style.color = "";
            }

            if (contact2.length != 0) {
                if (contact2.length != 11 || (!validcontact(contact2))) {
                    let errorContact2 = document.getElementById("errorContact2");
                    errorContact2.innerHTML = "Please enter a valid contact";
                    errorContact2.style.color = "red";
                    return false
                }
                else {
                    let errorContact2 = document.getElementById("errorContact2");
                    errorContact2.innerHTML = "";
                    errorContact2.style.color = "";
                }
            }
            else {
                let errorContact2 = document.getElementById("errorContact2");
                errorContact2.innerHTML = "";
                errorContact2.style.color = "";
            }


            if (residential.length != 0) {
                if (residential.length <= 15) {
                    let errorAdd2 = document.getElementById("errorAddress2");
                    errorAdd2.innerHTML = "*Address is too short";
                    errorAdd2.style.color = "red";
                    return false
                }
                else {
                    let errorAdd2 = document.getElementById("errorAddress2");
                    errorAdd2.innerHTML = "";
                    errorAdd2.style.color = "";
                }
            }
            else {
                let errorAdd2 = document.getElementById("errorAddress2");
                errorAdd2.innerHTML = "";
                errorAdd2.style.color = "";
            }
        }


    </script>



</body>

</html>
<?php } ?>
<?php } ?>