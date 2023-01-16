
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
    <link rel="html" href="needPersonal.php">
    <link rel="stylesheet" href="headstyle.css">
    <link rel="stylesheet" href="footbutton.css">
    <link rel="stylesheet" href="formstyle.css">
    <title>Scholarship Management System</title>
    <style>
        .appHead {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #appDesc {
            padding: 3px 3px;
        }

        ul li a {
            text-decoration: none;
            color: black;
            font-size: larger;
            padding: 3px 3px;
            display: flex;
        }

        ul {
            border-right: 1px solid black;
            width: 300px;

        }

        ul li {
            list-style: none;
            border-bottom: 1px solid gray;
            padding: 3px 3px;
        }

        /* -------------------------------------------------- */
        .appbody {
            display: flex;
            flex-direction: row;
        }

        .appbody .menu ul li a.active {
            background-color: #04AA6D;
            color: white;
        }

        /* ---------------------------------- */
    

       

        /* ------------------------------------ */


        table {
            width: 80%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        #mysop {
            width: 90%;
            height: 20%;
            padding-top: 0%;
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quam pariatur fugit saepe unde
                repellendus</p>
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
                <li class="appmenu"><a href="needApplication.php">Instruction</a></li>
                <li class="appmenu"><a href="needPersonal.php">Personal Infromation</a></li>
                <li class="appmenu"><a href="needEducation.php">Education Information</a></li>
                <li class="appmenu"><a href="needFinancial.php">Financial Information</a></li>
                <li class="appmenu"><a href="needDocument.php">Document</a></li>
                <li class="appmenu"><a class="active" href="needReview.php">Review & Submit</a></li>
            </ul>
        </div>
        <form action="noaction.php" class="myform" onSubmit="return validate();">
            <h3 class="bodyHeadings" id="sop">Statement of Purpose</h3>
            <p id="sop">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda, quas? Quos rem dignissimos
                molestiae voluptate, illum facere eveniet animi ipsum quis vero? (character limit 1200)</p>
            <hr>
            <input name="sopname" id="mysop" required maxlength="1200" minlength="400" autocomplete="off" autofocus>
            <br>

            <p id="final">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur delectus eum vero ipsam
                quaerat corporis possimus?</p>

            <input type="text" name="nameblock" id="sign" required autocomplete="off" autofocus>

            <label for="error" id="errorSign"></label>
            <br>

            <div class="next">
                <button value="submit" class="footbutton">SUBMIT</button>
            </div>


        </form>

    </div>
   


</body>

</html>

<?php } ?>
<?php } ?>