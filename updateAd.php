<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headstyle.css">
    <link rel="stylesheet" href="menustyle.css">
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

        /* ------------------------------------- */
        .lastDate {
            float: right;
            margin-right: 10px;
            background-color: #18ca89;
            border: 0.5px solid black;
            border-radius: 3px;
            padding: 2px 2px;
            width: 80px;
        }
        .lastDate:hover{
            cursor: pointer;
            color: white;
            
        }
        #d1{
            background-color: white;
            width: 160px;
            padding: 1px 1px;
        }
        #d1:hover{
            cursor: pointer;
            color: black;
            
        }
        .adList{
            height: 25px;
            align-items: center;
        }
        /* ------------------- */
        .schName{
            color: black;
            border: 1px solid #18ca89;
            width: 50%;

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
                <li class="appmenu"><a class="active" href="updateAd.php">Update Advertised Scholarship</a></li>
                <li class="appmenu"><a href="pubExSch.php">Publish Existing Scholarship</a></li>
                <li class="appmenu"><a href="shortlist.php">View Shortlisted Candidates</a></li>
                <li class="appmenu"><a href="viewPrevious.html">View Previous Scholarhsip</a></li>
                <li class="appmenu"><a href="stdRecord.html">View Student Record</a></li>
                <li class="appmenu"><a href="contact.php">Update Contact Details</a></li>
            </ul>
        </div>
        <div class="currSch">

            <h3 class="headingsAdmin">Advertised Scholarhsip</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum ab quas illum odio qui repellat,
                consectetur neque at? Tenetur officiis ipsam libero sed minima mollitia commodi enim, saepe dolorum
                nulla obcaecati
            </p>

                <ol type="1">
                    <?php
                    include("facadeClass.php");
                    $db = new DBFacade();
                    $row=$db->getadScholarsipInfo();
                    $count = sizeof($row);
                    $i = 0;
                    ?>
                    <?php for ($i=0;$i<$count;$i++) { ?>
                        <li class="adLit">
                        <form action="scholarshipClass.php" method="post">
                        <input class="schName" readonly value="<?php echo($row[$i]); $i++;?>" name="schName">
                        <button class="lastDate" name="updateAdBtn" >SAVE</button> 
                         <input value="<?php echo($row[$i]); ?>" min="<?php echo($row[$i]); ?>" name="lastDate"  type="date" class="lastDate" id="d1" >
                        </form>
                    <?php }  ?>
                        </li>

                </ol>
        </div>
</body>

</html>