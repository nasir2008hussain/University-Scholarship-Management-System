<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headstyle.css">
    <link rel="stylesheet" href="menustyle.css">
    <link rel="stylesheet" href="footer.css">
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
        .active{
            background-color: #18ca89;
    
        }
       
      

        /* -------------------------------------------- */
        .headingsAdmin{
            background-color: #18ca89;
            width: 100%;
            color: white;
            padding: 6px 6px;
        
        }
        .currSch{
            padding: 2px 2px;
        }
        .menu{
            margin-left: -2%;
        }



        /* ----------------------- */

        .boxes{
            border: 0.5px solid #18ca89;
            padding: 3px 3px;
            margin: 8px 3px;
        }
        /* ----------------- */
        #resume{
            float: right;
            border: 1px solid black;
            background-color: #18ca89;
            color: white;
            padding: 1px 1px;
            margin-right: 5px;
            border-radius: 5px;
            width: 90px;
            text-align: center;
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
            <a id="login" href="index.php">Logout</a>
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
                <li class="appmenu"><a class="active" href="adminHome.php">Home</a></li>
                <li class="appmenu"><a href="createNew.php">Create New Scholarship</a></li>
                <li class="appmenu"><a href="updateAd.php">Update Advertised Scholarship</a></li>
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
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum ab quas illum odio qui repellat, consectetur neque at? Tenetur officiis ipsam libero sed minima mollitia commodi enim, saepe dolorum nulla obcaecati 
            </p>
            <ol>
                <?php
                include("facadeClass.php");
                  $db = new DBFacade();
                  $row=$db->getadScholarsipInfo();
                  $count = sizeof($row);
                  $i = 0;
                  ?>
                  <?php for ($i=0;$i<$count;$i++) { ?>
                    <li class="adSch"><a><?php echo($row[$i]); $i++;?></a></li>
                   <div class="boxes">
                    <p class="box1">
                        <label for="total">Number of Student Applied</label>
                        <input type="number" name="applied" id="applied" readonly>
                        <label for="date">Last Date</label>
                        <input type="date" name="lastDate" value="<?php echo($row[$i]); ?>" id="lastdate" readonly>
                    </p>
                </div>
               
                  <?php }  ?>

                
                <!-- <li class="adSch">Ehsaas Undergraduate Scholarhsip</li>
                <div class="boxes">
                    <p class="box1">
                        <label for="total">Number of Student Applied</label>
                        <input type="number" name="applied" id="applied" disabled>
                        <label for="date">Last Date</label>
                        <input type="date" name="lastDate" id="lastdate" disabled>
                    </p>
                </div>
                <li class="adSch">PM Undergraduate Scholarhsip</li>
                    <div class="boxes">
                        <p class="box1">
                            <label for="total">Number of Student Applied</label>
                            <input type="number" name="applied" id="applied" disabled>
                            <label for="date">Last Date</label>
                            <input type="date" name="lastDate" id="lastdate" disabled>
                        </p>
                    </div>
                <li class="adSch">GB Govt Undergraduate Scholarhsip</li>
                    <div class="boxes">
                        <p class="box1">
                            <label for="total">Number of Student Applied</label>
                            <input type="number" name="applied" id="applied" disabled>
                            <label for="date">Last Date</label>
                            <input type="date" name="lastDate" id="lastdate" disabled>
                        </p>
                    </div> -->
            </ol>
        </div>

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

   

        






</body>

</html>