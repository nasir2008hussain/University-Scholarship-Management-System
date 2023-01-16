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



        /* ----------------------- */
        .adSch{
            margin: 15px 0px;
            height: 25px;
            font-size: medium;
        
            /* justify-content: center; */
           
        }
        .view{
            float: right;
            background-color: #18ca89;
            border-radius: 5px;
            margin-right: 10px;
            font-size: medium;
            padding: 1px 1px;
            width: 50px;
            text-align: center;
        }
        .view:hover{
            color: white;

        }
        /* -------------------- */
        label{
            /* display: inline-block; */
            width: 170px;
            font-size: x-large;
        }
        #search{
            height: 35px;
            width: 300px;
            border-radius: 5px;
            margin: 0px 15px;
        }
        #searchBtn{
            height: 35px;
            width: 100px;
            border-radius: 5px;
            background-color: #18ca89;
            font-size: medium;
        }
        #searchBtn:hover{
            cursor: pointer;
            color: white;
        }

        /* -------------------- */
        #archName{
            padding: 3px 3px;
            border: 1px solid #18ca89;
            width: 60%;
            font-size: medium;
        }
        #viewbtn:hover{
            cursor: pointer;
            color: white;
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
                <li class="appmenu"><a href="createNew.html">Create New Scholarship</a></li>
                <li class="appmenu"><a href="updateAd.php">Update Advertised Scholarship</a></li>
                <li class="appmenu"><a class="active" href="pubExSch.html">Publish Existing Scholarship</a></li>
                <li class="appmenu"><a href="shortlist.php">View Shortlisted Candidates</a></li>
                <li class="appmenu"><a href="viewPrevious.html">View Previous Scholarhsip</a></li>
                <li class="appmenu"><a href="stdRecord.html">View Student Record</a></li>
                <li class="appmenu"><a href="contact.html">Update Contact Details</a></li>
            </ul>
        </div>
        <div class="currSch">

            <center>
                <h3 class="headingsAdmin">Search Scholarhsip</h3>
                <label for="search" id="sLable">Search Scholarhsip</label>
                <form action="scholarshipClass.php" method="post">
                    <input type="search" name="search" id="search" placeholder="search by Name">
                    <button value="submit" id="searchBtn" name="btnSearch">Search</button>
                </form>
            </center>

            <!-- yourdate_column > DATE_SUB(now(), INTERVAL 6 MONTH) -->
            
          
            <h3 class="headingsAdmin">Recently Archived Scholarhsip</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum ab quas illum odio qui repellat,
                consectetur neque at? Tenetur officiis ipsam libero sed minima mollitia commodi enim, saepe dolorum
                nulla obcaecati
            </p>
            <ol>
                <?php
                include("facadeClass.php");
                $db = new DBFacade();
                $demand = "onlyName";
                $archiveArray=$db->getRecentlyArchive($demand);
                $i = 0;
                $count = sizeof($archiveArray);
                if($count==0){
                    "No recently closed scholarship (3 months) ";
                }            
                ?>
               <?php for ($i=0;$i<$count;$i++) { ?>
                <form action="scholarshipClass.php" method="post">
                <li class="adSch"><input id="archName" type="text" name="schName" value="<?php echo($archiveArray[$i]);?>"> 
                <button id="viewbtn" class="view" value="submit" name="view">VIEW</button></li>
                </form>
             
            <?php }  ?>
            
            </ol>
        </div>

    </div>








</body>

</html>