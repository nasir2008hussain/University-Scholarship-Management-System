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


        /* ------------------------------------ */
        input {
            border: 0px solid black;
        }


        table {
            width: 80%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            padding: 3px 3px;
            text-align: left;
        }

        th {
            padding: 4px 4px;
        }

        .docx {
            margin: 2px 2px;
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
                <li class="appmenu"><a href="#">Personal Infromation</a></li>
                <li class="appmenu"><a href="#">Education Information</a></li>
                <li class="appmenu"><a class="active" href="meritDocument.php">Document</a></li>
                <li class="appmenu"><a href="#">Review & Submit</a></li>
            </ul>
        </div>
        <form action="applicantClass.php" id="mdocx"  method="post" enctype="multipart/form-data"  class="myform" onSubmit="return FileValidation();">
            <h3 class="bodyHeadings" id="docHead">Document</h3>
            <p id="docDesc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis earum mollitia magnam
                cumque ullam tempore, molestias doloremque totam nostrum ipsum laborum atque dolores cum qui, ut placeat
                distinctio nihil ex. Molestiae iure aliquid quod hic eveniet</p>
            <hr>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Upload File</th>
                    <th>Remarks</th>
                </tr>

                <tr>
                    <td>Intermediate DMC</td>
                    <td><input onchange="FileValidation1()" type="file" class="docx" accept=".jpg,.jpeg,.png,.pdf," id="interDoc" name="mInterDoc"></td>
                    <td><input type="url" name="remark" id="remark1" readonly></td>
                </tr>

                <tr>
                    <td>Last Semester Transcript</td>
                    <td><input onchange="FileValidation2()" type="file" class="docx" id="tranDoc" name="mSemesterTranscript"
                            accept=".jpg,.jpeg,.png,.pdf"></td>
                    <td><input type="text" name="remark" id="remark2"></td>
                </tr>

                <tr>
                    <td>Current Semester Challan</td>
                    <td><input onchange="FileValidation3()" type="file" accept=".jpg,.jpeg,.png,.pdf," class="docx" id="chalDoc" name="mSemesterChallan"></td>
                    <td><input type="text" name="remark" id="remark3"></td>
                </tr>
            </table>

            <center>
                <div class="next">
                    <a href="meritEducation.php" class="footbutton">Previous</a>
                    <button value="submit" class="footbutton" name="mDocumentBtn">Save&Next</button>
                 
                </div>
            </center>
        </form>
    </div>
    <footer>
    <center>
    <div class="qauFooter">
    <?php
      include("facadeClass.php");
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

    <script>

        function validateExtension(filename) {
            var extensionfile = filename.split('.').pop();
            extensionfile = extensionfile.toLowerCase()
            if (extensionfile != `pdf` && extensionfile != `jpg` && extensionfile != `jpeg` && extensionfile != `png`) {
                return false
            }
            else {
                return true
            }
        }

        function validateSize(fileinput) {
            var MaxSizeInBytes = 2097152;
            if (fileinput.files && fileinput.files.length == 1 && fileinput.files[0].size > MaxSizeInBytes) {
                return false;
            }
            return true;
        }

        function FileValidation1() {
            var fileInput = document.getElementById('interDoc');
            var fileName = fileInput.files[0].name;
            if (!validateExtension(fileName) || !validateSize(fileInput)) {
                var error = document.getElementById(`remark1`)
                if (!validateExtension(fileName)) {
                    error.value = `file extension not allowed`
                }
                else {
                    error.value = `file size should be less than 3MB`
                }
                error.style.color = `red`
                return false
            }
            else {
                var error = document.getElementById(`remark1`)
                error.value = `Success!`
                error.style.color = `green`
                return true
            }
        }
        function FileValidation2() {
            var fileInput = document.getElementById('tranDoc');
            var fileName2 = fileInput.files[0].name;
            if (!validateExtension(fileName2) || !validateSize(fileInput)) {
                var error = document.getElementById(`remark2`)
                if (!validateExtension(fileName2)) {
                    error.value = `file extension not allowed`
                }
                else {
                    error.value = `file size should be less than 3MB`
                }
                error.style.color = `red`
                return false
            }
            else {
                var error = document.getElementById(`remark2`)
                error.value = `Success!`
                error.style.color = `green`
                return true
            }
        }

        function FileValidation3() {
            var fileInput = document.getElementById('chalDoc');
            var fileName3 = fileInput.files[0].name;
            if (!validateExtension(fileName3) || !validateSize(fileInput)) {
                var error = document.getElementById(`remark3`)
                if (!validateExtension(fileName3)) {
                    error.value = `file extension not allowed`
                }
                else {
                    error.value = `file size should be less than 3MB`
                }
                error.style.color = `red`
                return false
            }
            else {
                var error = document.getElementById(`remark3`)
                error.value = `Success!`
                error.style.color = `green`
                return true
            }
        }


        function FileValidation() {
            r1 = document.getElementById(`remark1`).value
            r2 = document.getElementById(`remark2`).value
            r3 = document.getElementById(`remark3`).value
      
            if ((r1 == `Success!` || r1=='') && r2 == `Success!` && r3 == `Success!`) {
              return true
            }
            else {
               return false
            }

        }

        $("#mdocx").submit(function(event){
   loadAjax();
   event.preventDefault()
})

    </script>


</body>

</html>

<?php } ?>
<?php } ?>