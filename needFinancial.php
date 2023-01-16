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
        /* ----------------------------------- */
        label {
            display: inline-block;
            width: 200px;
            text-align: left;
            margin-left: 3px;
        }

        .single {
            display: inline-block;
            width: 350px;
            text-align: left;

        }

        .house {
            display: inline-block;
            width: 100px;
            text-align: left;

        }


        /* ------------------------------------------------- */
        
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
                <li class="appmenu"><a href="#">Instruction</a></li>
                <li class="appmenu"><a href="#">Personal Infromation</a></li>
                <li class="appmenu"><a href="#">Education Information</a></li>
                <li class="appmenu"><a class="active" href="needFinancial.php">Financial Information</a></li>
                <li class="appmenu"><a href="#">Document</a></li>
                <li class="appmenu"><a href="#">Review & Submit</a></li>
            </ul>
        </div>

        <form action="applicantClass.php" method="post" class="myform">
            <h3 class="bodyHeadings" id="finfo">Financial Information</h3>
            <p id="fDesc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, laborum, omnis vitae
                eos nam recusandae quos maiores dolore quasi officia pariatur aspernatur? Vel iusto, totam aspernatur
                quia voluptates repellat sunt assumenda officiis voluptatum ducimus.</p>
            <hr>
            <label for="income">Father/Guardian Income</label>
            <input onchange="sumIncome()" type="number" name="income" id="income" min="1000" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" required placeholder="e.g. 35000">

            <label for="occupation">Father/Guardian Occupation</label>
            <select name="occupation" id="occupation" required>
                <option value="" selected="selected" disabled="disabled">-- select one --</option>
                <optgroup label="Healthcare Practitioners and Technical Occupations:">
                    <option value="1">- Chiropractor</option>
                    <option value="2">- Dentist</option>
                    <option value="3">- Dietitian or Nutritionist</option>
                    <option value="4">- Optometrist</option>
                    <option value="5">- Pharmacist</option>
                    <option value="6">- Physician</option>
                    <option value="7">- Physician Assistant</option>
                    <option value="8">- Podiatrist</option>
                    <option value="9">- Registered Nurse</option>
                    <option value="10">- Therapist</option>
                    <option value="11">- Veterinarian</option>
                    <option value="12">- Health Technologist or Technician</option>
                    <option value="13">- Other Healthcare Practitioners and Technical Occupation</option>
                </optgroup>
                <optgroup label="Healthcare Support Occupations:">
                    <option value="14">- Nursing, Psychiatric, or Home Health Aide</option>
                    <option value="15">- Occupational and Physical Therapist Assistant or Aide</option>
                    <option value="16">- Other Healthcare Support Occupation</option>
                </optgroup>
                <optgroup label="Business, Executive, Management, and Financial Occupations:">
                    <option value="17">- Chief Executive</option>
                    <option value="18">- General and Operations Manager</option>
                    <option value="19">- Advertising, Marketing, Promotions, Public Relations, and Sales Manager
                    </option>
                    <option value="20">- Operations Specialties Manager (e.g., IT or HR Manager)</option>
                    <option value="21">- Construction Manager</option>
                    <option value="22">- Engineering Manager</option>
                    <option value="23">- Accountant, Auditor</option>
                    <option value="24">- Business Operations or Financial Specialist</option>
                    <option value="25">- Business Owner</option>
                    <option value="26">- Other Business, Executive, Management, Financial Occupation</option>
                </optgroup>
                <optgroup label="Architecture and Engineering Occupations:">
                    <option value="27">- Architect, Surveyor, or Cartographer</option>
                    <option value="28">- Engineer</option>
                    <option value="29">- Other Architecture and Engineering Occupation</option>
                </optgroup>
                <optgroup label="Education, Training, and Library Occupations:">
                    <option value="30">- Postsecondary Teacher (e.g., College Professor)</option>
                    <option value="31">- Primary, Secondary, or Special Education School Teacher</option>
                    <option value="32">- Other Teacher or Instructor</option>
                    <option value="33">- Other Education, Training, and Library Occupation</option>
                </optgroup>
                <optgroup label="Other Professional Occupations:">
                    <option value="34">- Arts, Design, Entertainment, Sports, and Media Occupations</option>
                    <option value="35">- Computer Specialist, Mathematical Science</option>
                    <option value="36">- Counselor, Social Worker, or Other Community and Social Service Specialist
                    </option>
                    <option value="37">- Lawyer, Judge</option>
                    <option value="38">- Life Scientist (e.g., Animal, Food, Soil, or Biological Scientist, Zoologist)
                    </option>
                    <option value="39">- Physical Scientist (e.g., Astronomer, Physicist, Chemist, Hydrologist)</option>
                    <option value="40">- Religious Worker (e.g., Clergy, Director of Religious Activities or Education)
                    </option>
                    <option value="41">- Social Scientist and Related Worker</option>
                    <option value="42">- Other Professional Occupation</option>
                </optgroup>
                <optgroup label="Office and Administrative Support Occupations:">
                    <option value="43">- Supervisor of Administrative Support Workers</option>
                    <option value="44">- Financial Clerk</option>
                    <option value="45">- Secretary or Administrative Assistant</option>
                    <option value="46">- Material Recording, Scheduling, and Dispatching Worker</option>
                    <option value="47">- Other Office and Administrative Support Occupation</option>
                </optgroup>
                <optgroup label="Services Occupations:">
                    <option value="48">- Protective Service (e.g., Fire Fighting, Police Officer, Correctional Officer)
                    </option>
                    <option value="49">- Chef or Head Cook</option>
                    <option value="50">- Cook or Food Preparation Worker</option>
                    <option value="51">- Food and Beverage Serving Worker (e.g., Bartender, Waiter, Waitress)</option>
                    <option value="52">- Building and Grounds Cleaning and Maintenance</option>
                    <option value="53">- Personal Care and Service (e.g., Hairdresser, Flight Attendant, Concierge)
                    </option>
                    <option value="54">- Sales Supervisor, Retail Sales</option>
                    <option value="55">- Retail Sales Worker</option>
                    <option value="56">- Insurance Sales Agent</option>
                    <option value="57">- Sales Representative</option>
                    <option value="58">- Real Estate Sales Agent</option>
                    <option value="59">- Other Services Occupation</option>
                </optgroup>
                <optgroup label="Agriculture, Maintenance, Repair, and Skilled Crafts Occupations:">
                    <option value="60">- Construction and Extraction (e.g., Construction Laborer, Electrician)</option>
                    <option value="61">- Farming, Fishing, and Forestry</option>
                    <option value="62">- Installation, Maintenance, and Repair</option>
                    <option value="63">- Production Occupations</option>
                    <option value="64">- Other Agriculture, Maintenance, Repair, and Skilled Crafts Occupation</option>
                </optgroup>
                <optgroup label="Transportation Occupations:">
                    <option value="65">- Aircraft Pilot or Flight Engineer</option>
                    <option value="66">- Motor Vehicle Operator (e.g., Ambulance, Bus, Taxi, or Truck Driver)</option>
                    <option value="67">- Other Transportation Occupation</option>
                </optgroup>
                <optgroup label="Other Occupations:">
                    <option value="68">- Military</option>
                    <option value="69">- Homemaker</option>
                    <option value="70">- Other Occupation</option>
                    <option value="71">- Don't Know</option>
                    <option value="72">- Not Applicable</option>
                </optgroup>
            </select>
            <br>
            <label for="reserve" class="house">Reserve Quota</label>
            <select name="reserveSeat" id="htype" required>
                <option value="" selected="selected" disabled="disabled">-- select one --</option>
                <option value="orphan">Orphan</option>
                <option value="disabled">Disabled Person</option>
                <option value="no">Not Applicable</option>
            </select>
            <br>
            <label for="fee">Semester Fee</label>
            <input type="number" onchange="sumExpenses()" min="1000" name="sfee" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" id="sfee" required placeholder="e.g. 45000">
            <label for="fee">Other University Expenses </label>
            <input type="number" onchange="sumExpenses()" min="0" name="otherfee" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" id="otherfee" required placeholder="e.g. 45000">
            <br>
            <label for="familymem">Total Family Member</label>
            <input type="number" name="member" min="1" id="member" required placeholder="e.g. 8"
                pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;">
            <label for="EarnMem">No. Of Earning Member</label>
            <input type="number" min="1" name="earn" id="earn" required placeholder="e.g. 3" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==2) return false;">
            <br>
            <label for="sibling" class="single">Sibling in School/College/University</label>
            <input onchange="validate2()" type="number" name="sib" id="sib" min="0" required placeholder="e.g. 5"
                pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;">
            <br>
            <label for="Support" class="single">Monthly Income Support from other/any source</label>
            <input type="number" onchange="sumIncome()" name="support" min="0" id="support" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" required placeholder="e.g. 15000">
            <br>
            <label for="prop" class="single">All property worth[House,Car,Land etc]</label>
            <input type="number" name="prop" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==9) return false;" min="0" id="prop" required placeholder="e.g. 555000000">
            <br>
            <label for="house" class="house">House Status</label>
            <select onchange="validate()" name="houseStatus" id="house" required>
                <option oncanplay="validate()" value="" selected="selected" disabled="disabled">-- select one --
                </option>
                <option onchange="validate()" value="rent">Rented</option>
                <option onchange="validate()" value="own">Owned</option>
                <option onchange="validate()" value="join">Joined System</option>
            </select>
            <label for="htype" class="house">House Type</label>
            <select name="htype" id="htype" required>
                <option value="" selected="selected" disabled="disabled">-- select one --</option>
                <option value="ph">Pukka House</option>
                <option value="kh">Kuchha House</option>
                <option value="spk">Semi Pukka House</option>
            </select>
            <label for="rent" class="house">Rent of House</label>
            <input type="number" onchange="sumExpenses()" name="rent" id="rent" min="1000" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" required disabled="disabled"
                placeholder="e.g. 20000">
            <br>

            <label for="ubill">Monthly Utility Bill</label>
            <input onchange="sumExpenses()" type="number" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" min="1000" name="ubill" id="ubill" required
                placeholder="e.g. 14000">

            <label for="gbill">Average 6 month Gas Bill</label>
            <input onchange="sumExpenses()" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" min="1000" type="number" name="gbill" id="gbill"
                required placeholder="e.g. 4000">
            <br>
            <label for="ebill" class="single">Average 6 month Electricity Bill</label>
            <input onchange="sumExpenses()" type="number" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" min="1000" name="ebill" id="ebill" required
                placeholder="e.g. 6000">
            <br>
            <label for="mbill" class="single">Monthly Medicine Expenditure</label>
            <input onchange="sumExpenses()" type="number" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" min="0" name="mbill" id="mbill" required
                placeholder="e.g. 2000">
            <br>
            <label for="edbill" class="single">Fees of All Siblings (Not taking any Scholarhsip)</label>
            <input type="number" onchange="sumExpenses()" name="edbill" id="edbill" disabled pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" min="100" required placeholder="e.g. 5000">
            <br>

            <label for="miscbill" class="single">Other Miscellaneous Expenditure</label>
            <input onchange="sumExpenses()" type="number" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==6) return false;" min="0" name="misc" id="misc" required
                placeholder="e.g. 7000">
            <br>

            <label for="totIncome">Total Monthly Income</label>
            <input type="number" name="totIncome" id="totIncome" readonly>
            <label for="totExp">Total Monthly Expenditure</label>
            <input type="number" name="totexp" id="totExp" readonly>
            <center>
                <div class="next">
                    <a href="needEducation.php" class="footbutton">Previous</a>
                    <button value="submit" name="nFinancialBtn" class="footbutton">Save&Next</button>
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

        let sum = 0


        function sumIncome() {
            let income = document.getElementById(`income`).value
            let support = document.getElementById(`support`).value
            let totIncome = document.getElementById(`totIncome`)
            if (income.length != 0) {
                totIncome.value = income
            }
            if (support.length != 0) {
                totIncome.value = support
            }
            if (income.length != 0 && support.length != 0) {
                let z = parseInt(income)
                let x = parseInt(support)
                let y = z + x
                totIncome.value = y
            }
            if (income.length == 0 && support.length == 0) {
                totIncome.value = ``
            }
        }

        function sumExpenses() {


            let sfee = document.getElementById(`sfee`).value
            let otherfee = document.getElementById(`otherfee`).value
            let rent = document.getElementById(`rent`).value
            let ubill = document.getElementById(`ubill`).value
            let gbill = document.getElementById(`gbill`).value
            let ebill = document.getElementById(`ebill`).value
            let edbill = document.getElementById(`edbill`).value
            let mbill = document.getElementById(`mbill`).value
            let miscbill = document.getElementById(`misc`).value
            let totExp = document.getElementById(`totExp`)


            if (sfee.length != 0 && otherfee.length != 0 && ubill.length != 0 && gbill.length != 0 && ebill.length != 0 && mbill.length != 0 && miscbill.length != 0) {
                let a = parseInt(sfee)
                let b = parseInt(ubill)
                let c = parseInt(gbill)
                let d = parseInt(ebill)
                let f = parseInt(mbill)
                let g = parseInt(miscbill)
                let i = parseInt(rent)
                let o = parseInt(otherfee)
                if (isNaN(i)) i = 0;
                let j = parseInt(edbill)
                if (isNaN(j)) j = 0;
                sum = a + b + c + d + f + g + i + j + o
                totExp.value = sum
            }
            else {
                totExp.value = ``
            }

        }

        function validate() {
            let house = document.getElementById(`house`).selectedIndex
            if (house == 1) {
                let rent = document.getElementById(`rent`)
                rent.disabled = false
                rent.value = ``
            }
            else {
                let rent = document.getElementById(`rent`)
                rent.disabled = true
                rent.value = ``
                sumExpenses()
            }
        }

        function validate2() {
            let sib = document.getElementById(`sib`).value
            if (sib.length != 0) {
                if (sib != 0) {
                    let edbill = document.getElementById(`edbill`)
                    edbill.disabled = false
                    edbill.value = ``
                    sumExpenses()
                }
                else {
                    let edbill = document.getElementById(`edbill`)
                    edbill.disabled = true
                    edbill.value = ``
                    sumExpenses()
                }
            }
            else {
                let edbill = document.getElementById(`edbill`)
                edbill.disabled = true
                edbill.value = ``
                sumExpenses()
            }
        }

        
    </script>



</body>

</html>
<?php } ?>
<?php } ?>