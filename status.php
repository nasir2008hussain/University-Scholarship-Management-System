<?php
session_start();
if(isset($_SESSION["myUsername"])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headstyle.css">
  
    <title>Document</title>
</head>

<body>
    <style>
        /* ------------------------------- */
        #headtitle {
            text-align: center;
        }

        #headdesc {
            padding: 2px 2px;
        }

        /* ---------------------------- */
        /* -------for profile section-------- */
        .profile {
            display: flex;
        }

        #mydp {
            height: 150px;
            width: 150px;
            border: 3px solid #04AA6D;
            border-radius: 50%;
            padding: 5px 5px;
            margin: 4px 14px;
        }

        /* ------------------------------------- */
        #profileDesc {
            display: inline-block;
            margin: 15px 25px;
        }

        label {
            display: inline-block;
            width: 150px;
            text-align: left;
            margin: 3px 3px;
        }

        input {
            border: 0px solid black;
            width: 500px;
            padding: 3px 3px;
            color: black;
            margin: 1px 1px;
            font-size: medium;
        }

        /* ------------------status------------ */
        .status h3 {
            display: inline;
        }

        .status{
            display: inline-block;
            border: 2px solid #04AA6D;
            padding: 3px 3px;
            margin: 5px 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 250px;
            width: 350px;
            border-radius: 12px;
        }





        /* ------------------------------------------ */
      

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


        /* ---------------------------------------- */


        /* ---------------------------------------- */
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
                <a id="login" href="index.php">Logout</a>
            </div>
        </div>



        <section id="topsection">
            <h3 id="headtitle">
                Welcome To Your Scholarhsip Portal
            </h3>
            <p id="headdesc">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint aliquid nulla odit facere corporis?
                Laborum
                cum numquam obcaecati. Nesciunt repudiandae et fugiat perferendis velit magnam amet quam quasi quas?
                Ducimus
                qui odio alias earum?. Lorem ipsum dolor sit amet consectetur, adipisicing elit. In soluta aliquid
                itaque
                nulla ab? Tenetur architecto illum est quis, ullam possimus saepe cupiditate! Odit illo nemo vero ea
                nihil
                temporibus aliquid quae.
                <hr>
            </p>
        </section>

        <div class="profile">
            <div id="dp">
                <?php

                $myName=$_SESSION["myUsername"];
                ?>
          
                <?php
                include("facadeClass.php");
                $db=new DBFacade();
                $Name2 = $db->retrieveStudentInfo($myName);
                echo '<img id="mydp" src="data:image/jpeg;base64,' . base64_encode($Name2[5]) . '" width="40" height="40"/>';
                ?>
                
            </div>
            <div id="profileDesc">
                <label for="name">Name </label>
                <input type="text" name="name" id="name" disabled value="<?php echo("$Name2[0]") ?>">
                <br>
                <label for="registration">Registration No </label>
                <input type="number" name="registration" id="registration" disabled value="<?php echo("$Name2[1]") ?>">
                <br>
                <label for="department">Department </label>
                <input type="text" name="dept" id="dept" disabled value="<?php echo("$Name2[2]") ?>">
                <br>
                <label for="program">Program</label>
                <input type="text" name="program" id="program" disabled value="<?php echo("$Name2[3]") ?>">
                <br>
                <label for="semester">Semester</label>
                <input type="number" name="semester" id="semester" disabled value="<?php echo("$Name2[4]") ?>">
            </div>
        </div>
        <hr>
        

        <center>
            <div class="status">
                <p id="report">Your application with Tracking ID <h3 id="trackingID">040721343</h3> is <h3 id="final">submitted</h3>successfully! Lorem ipsum dolor sit amet.</p>
            </div>
        </center>

        <center>
            <p id="notes">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati accusamus dicta nisi alias debitis perferendis ipsum odit quasi aut porro sit eius fugit, ipsam nam aperiam modi dolorem neque. Vel, fuga? Nostrum quisquam provident rerum, exercitationem nemo eligendi quod laudantium hic magnam, vitae consectetur laboriosam.
            </p>
        </center>
        <center>
        <div class="schApply">
            <button id="back" onclick="history.back()">BACK</button>
        </div>
        </center>




    </body>
<?php } ?>
</html>