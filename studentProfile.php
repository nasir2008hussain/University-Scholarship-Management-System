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

        /* ------------------collapse------------ */
        .collapsible {
            margin-top: 4px;
            background-color: #059c65;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        .collapsible:hover {
            background-color: #138a5e;
        }


        ol li a {
            list-style: none;
            text-decoration: none;
            color: black;
        }

        ol li {
            padding: 5px 3px;
            border: 1px solid black;
            margin: 5px 2px;
            height: 20px;
        }


        /* ------------------------------------------ */
        .lastDate {
            float: right;
            border: 1px solid black;
            width: 150px;
            padding: 2px 2px;
            height: 14px;
            font-size: medium;
        }

        .apply {
            float: right;
            background-color: #05ca82;
            border: 1px solid #059c65;
            border-radius: 2px;
            color: white;
            width: 70px;
            text-align: center;
            margin-right: 5px;
            text-decoration: none;
            padding: 0.5px 0.5px;
            font-size: medium;
        }
        .apply:hover{
            cursor: pointer;
            background-color: black;
            color: white;
        }

        /* ---------------------------------------- */
        .status {
            float: right;
            margin-right: 50px;
            border: 1px solid black;
            border-radius: 4px;
            background-color: #40dba2;
            padding: 2px 2px;
            color: white;
            height: 18px;
            text-align: center;
            width: 88px;
        }

        .status:hover {
            cursor: pointer;
        }

        /* ---------------------------------------- */
        #continue{
            padding: 5px 5px;
            text-align: center;
        }

        /* ---------------------- */
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
        

        <button class="collapsible">Current Scholarship Status</button>
        <div class="content">
            <ol type="1">
                <li> <a>Ehsaas Undergraduate Scholarship</a> <a href="status.php" class="status">View Status</a> </li>
                <li> <a>PM Undergraduate Scholarship</a> <a href="status.php" class="status">View Status</a> </li>
            </ol>
        </div>


        <button class="collapsible">Apply for Scholarship</button>
        <div class="content">
            <ol type="1">
            <?php
            $db = new DBFacade();
            $row=$db->getadScholarsipInfo();
            $count = sizeof($row);
            $i = 0;
            ?>
            <?php for ($i=0;$i<$count;$i++) { ?>
                <form action="scholarshipClass.php" method="post">
                <li> <input type="text" name="applySch" id="applyNowSch" readonly value="<?php echo($row[$i]); $i++;?>"> <input  style="color: red;" value="<?php echo($row[$i]); ?>" type="date" disabled class="lastDate"> <button class="apply" name="advertise" value="submit">Apply</button></li>
                </form>
                
            <?php }  ?>
            </ol>
        </div>
        <button class="collapsible">Archived Scholarship</button>
        <div class="content">
            <ol type="1">
        <?php
    
            $db = new DBFacade();
            $row=$db->getarchScholarsipInfo();
            $count = sizeof($row);
            if($count==0){
            echo ("No scholarship in this section");
            }
            $i = 0;
            ?>
             <?php for ($i=0;$i<$count;$i++) { ?>
                <form action="scholarshipClass.php" method="post">
                <li> <input type="text" name="applySch" id="applyNowSch" readonly value="<?php echo($row[$i]);?>"> <button class="apply" name="archive" value="submit">View</button></li>
                </form>
                
            <?php }  ?>
            </ol>
        </div>

        <div class="h" style="visibility: hidden;">
        
    </div>
    </body>
    <script>
    
    </script>


    

   <?php }?>
</html>