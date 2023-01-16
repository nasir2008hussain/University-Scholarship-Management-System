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
    <link rel="stylesheet" href="menustyle.css">
    <title>Scholarship Management System</title>
    <style>
      
        /* -------------------------------------------------- */
        .intro ol li {
            padding: 2px 2px;
        }

        .introP {
            padding: 3px 3px;
        }

        /* ---------------------------------- */
      
        .next a {
            text-decoration: none;
            border: 2px solid black;
            color: black;
            width: 150px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color:  #05a86c;
            margin-left: 25%;
        }

        #next:hover {
            background-color:  #05ca82;
            color: white;
        }

        /* --------------------------- */

        #agree {
            display: flex;
            align-items: center;
            justify-content: center;
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quam pariatur fugit saepe unde repellendus</p>
        </div>
       <div class="log">
        <a  id="login" href="studentProfile.php">HOME</a>
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
                <li class="appmenu"><a class="active" href="needApplication.php">Instruction</a></li>
                <li class="appmenu"><a href="needPersonal.php">Personal Infromation</a></li>
                <li class="appmenu"><a href="needEducation.php">Education Information</a></li>
                <li class="appmenu"><a href="needFinancial.php">Financial Information</a></li>
                <li class="appmenu"><a href="needDocument.php">Document</a></li>
                <li class="appmenu"><a href="needReview.php">Review & Submit</a></li>
            </ul>
        </div>
        <div class="intro">
            <h3 class="bodyHeadings" id="inst">Instruction</h3>
            <p class="introP">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, deserunt pariatur
                excepturi ad
                perferendis blanditiis, ex maxime numquam repudiandae, sunt sint harum odit architecto fugit aliquid
                fuga facilis vel dolore rem magnam dicta molestiae. Sed ea obcaecati debitis suscipit, provident
                reprehenderit. Dolores ullam asperiores voluptatibus.</p>
            <ol>
                <li class="inst">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quas inventore
                    adipisci quos!</li>
                <li class="inst">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda laudantium eos
                    provident quisquam distinctio.</li>
                <li class="inst">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore, facilis.</li>
                <li class="inst">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium vitae unde optio
                    assumenda nemo?</li>
                <li class="inst">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li class="inst">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia quo nobis atque
                    minima accusantium veniam!</li>
            </ol>
            <p class="introP">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil non ratione fugit dolore
                aliquam cumque veniam sequi illum, error quasi aliquid facilis nam repellendus impedit saepe quas
                nostrum magnam debitis doloremque perferendis suscipit officiis?</p>
            <ol type="i">
                <li class="inst">Lorem ipsum dolor sit amet consectetur.</li>
                <li class="inst">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi dignissimos ipsam
                    aspernatur?</li>
                <li class="inst">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni perferendis laborum
                    quidem ea atque.</li>
                <li class="inst">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, magni?</li>
            </ol>
        </div>
    </div>

    <center>
        <div class="next">
            <a id="next" href="needPersonal.php">Next</a>
        </div>
    </center>


</body>

</html>
<?php } ?>
<?php } ?>