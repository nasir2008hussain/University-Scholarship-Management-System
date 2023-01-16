<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headstyle.css">
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


        /* --------collapse---------------------------- */

        .collapsible {
            margin-top: 2px;
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

        .collapsible:after {
            content: '\002B';
            color: white;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
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
        }

        .apply:hover {
            cursor: pointer;
            background-color: #04b474;
        }

        /* -------------login------------------------ */

        #login a {
            border: 1px solid black;
            border-radius: 4px;

        }

        /* -------------------------------------------- */
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
            <a id="login" href="Login.php">Login</a>
        </div>
    </div>



    <section id="topsection">
        <h3 id="headtitle">
            APPLY FOR SCHOLARSHIP
        </h3>
        <p id="headdesc">

            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint aliquid nulla odit facere corporis? Laborum
            cum numquam obcaecati. Nesciunt repudiandae et fugiat perferendis velit magnam amet quam quasi quas? Ducimus
            qui odio alias earum?. Lorem ipsum dolor sit amet consectetur, adipisicing elit. In soluta aliquid itaque
            nulla ab? Tenetur architecto illum est quis, ullam possimus saepe cupiditate! Odit illo nemo vero ea nihil
            temporibus aliquid quae.
        </p>
    </section>

    <button class="collapsible">Archived Scholarship</button>
    <div class="content">
        <ol type="1">
        <?php
            include("facadeClass.php");
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
                <li> <input style="border: 0px solid black; width: 50%;"  type="text" name="applySch" id="applyNowSch" readonly value="<?php echo($row[$i]);?>"> <button class="apply" name="archive" value="submit">View</button></li>
                </form>
            <?php }  ?>
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
                <li> <a><?php echo($row[$i]); $i++;?></a> <input style="color: darkred;" value="<?php echo($row[$i]); ?>" type="date" disabled class="lastDate"> <a
                href="Login.php" class="apply">Apply</a> </li>
            <?php }  ?>

        </ol>
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


    <!-- ------------------------------------------------------------------- -->
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>