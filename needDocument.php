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
                <li class="appmenu"><a class="active" href="needDocument.php">Document</a></li>
                <li class="appmenu"><a href="needReview.php">Review & Submit</a></li>
            </ul>
        </div>
        <form action="noaction.php" class="myform" onSubmit="return FileValidation();">
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
                    <td><input onchange="FileValidation1()" type="file" class="docx" accept=".jpg,.jpeg,.png,.pdf," id="interDoc" name="intername"></td>
                    <td><input type="url" name="remark" id="remark1" readonly></td>
                </tr>

                <tr>
                    <td>Last Semester Transcript</td>
                    <td><input onchange="FileValidation2()" type="file" class="docx" id="tranDoc" name="tranname"
                            accept=".jpg,.jpeg,.png,.pdf"></td>
                    <td><input type="text" name="remark" id="remark2"></td>
                </tr>

                <tr>
                    <td>Current Semester Challan</td>
                    <td><input onchange="FileValidation3()" type="file" accept=".jpg,.jpeg,.png,.pdf," class="docx" id="chalDoc" name="chalname"></td>
                    <td><input type="text" name="remark" id="remark3"></td>
                </tr>
                <tr>
                    <td>Father Pay Slip</td>
                    <td><input onchange="FileValidation4()" type="file" 
                        accept=".jpg,.jpeg,.png,.pdf," class="docx" id="payDoc" name="payname"></td>
                    <td><input type="text" name="remark" id="remark4"></td>
                </tr>
                <tr>
                    <td>Siblings Fee Challans</td>
                    <td><input onchange="FileValidation5()" type="file" class="docx" id="sibDoc"  accept=".jpg,.jpeg,.png,.pdf," name="sibname"></td>
                    <td><input type="text" name="remark" id="remark5"></td>
                </tr>
                <tr>
                    <td>Electricity Bill (recent)</td>
                    <td><input onchange="FileValidation6()" type="file" class="docx" id="ebillDoc" name="ebillname" accept=".jpg,.jpeg,.png,.pdf,">
                    </td>
                    <td><input type="text" name="remark" id="remark6"></td>
                </tr>
                <tr>
                    <td>Gas Bill (recent)</td>
                    <td><input onchange="FileValidation7()" type="file" class="docx" id="gbillDoc" name="gbillname" accept=".jpg,.jpeg,.png,.pdf,"></td>
                    <td><input type="text" name="remark" id="remark7"></td>
                </tr>
            </table>

            <center>
                <div class="next">
                    <a href="needFinancial.php" class="footbutton">Previous</a>
                    <button value="submit" class="footbutton">Save</button>
                    <a href="needReview.php" class="footbutton">Next</a>
                </div>
            </center>
        </form>
    </div>

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

        function FileValidation4() {
            var fileInput = document.getElementById('payDoc');
            var fileName4 = fileInput.files[0].name;
            if (!validateExtension(fileName4) || !validateSize(fileInput)) {
                var error = document.getElementById(`remark4`)
                if (!validateExtension(fileName4)) {
                    error.value = `file extension not allowed`
                }
                else {
                    error.value = `file size should be less than 3MB`
                }
                error.style.color = `red`
                return false
            }
            else {
                var error = document.getElementById(`remark4`)
                error.value = `Success!`
                error.style.color = `green`
                return true
            }
        }

        function FileValidation5() {
            var fileInput = document.getElementById('sibDoc');
            var fileName5 = fileInput.files[0].name;
            if (!validateExtension(fileName5) || !validateSize(fileInput)) {
                var error = document.getElementById(`remark5`)
                if (!validateExtension(fileName5)) {
                    error.value = `file extension not allowed`
                }
                else {
                    error.value = `file size should be less than 3MB`
                }
                error.style.color = `red`
                return false
            }
            else {
                var error = document.getElementById(`remark5`)
                error.value = `Success!`
                error.style.color = `green`
                return true
            }
        }

        function FileValidation6() {
            var fileInput = document.getElementById('ebillDoc');
            var fileName6 = fileInput.files[0].name;
            if (!validateExtension(fileName6) || !validateSize(fileInput)) {
                var error = document.getElementById(`remark6`)
                if (!validateExtension(fileName6)) {
                    error.value = `file extension not allowed`
                }
                else {
                    error.value = `file size should be less than 3MB`
                }
                error.style.color = `red`
                return false
            }
            else {
                var error = document.getElementById(`remark6`)
                error.value = `Success!`
                error.style.color = `green`
                return true
            }
        }

        function FileValidation7() {
            var fileInput = document.getElementById('gbillDoc');
            var fileName7 = fileInput.files[0].name;
            if (!validateExtension(fileName7) || !validateSize(fileInput)) {
                var error = document.getElementById(`remark7`)
                if (!validateExtension(fileName7)) {
                    error.value = `file extension not allowed`
                }
                else {
                    error.value = `file size should be less than 3MB`
                }
                error.style.color = `red`
                return false
            }
            else {
                var error = document.getElementById(`remark7`)
                error.value = `Success!`
                error.style.color = `green`
                return true
            }
        }

        function FileValidation() {
            r1 = document.getElementById(`remark1`).value
            r2 = document.getElementById(`remark2`).value
            r3 = document.getElementById(`remark3`).value
            r4 = document.getElementById(`remark4`).value
            r5 = document.getElementById(`remark5`).value
            r6 = document.getElementById(`remark6`).value
            r7 = document.getElementById(`remark7`).value
            if (r1 == `Success!` && r2 == `Success!` && r3 == `Success!` && r4 == `Success!` && r5 == `Success!` && r6 == `Success!` && r7==`Success!`) {
              return true
            }
            else {
               return false
            }

        }

    </script>


</body>

</html>
<?php } ?>
<?php } ?>