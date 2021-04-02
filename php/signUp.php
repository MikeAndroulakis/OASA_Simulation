<?php
session_start();
if(isset($_SESSION['redirect'])){
    unset($_SESSION['redirect']);
    header("Location: successfulSignUp.php");
    exit();
}
if(isset($_SESSION['Pages'])){
    unset($_SESSION['Pages']);
}
if(isset($_SESSION['tickets'])){
    unset($_SESSION['tickets']);
}
if(isset($_SESSION['LoadErrorMessage'])){
    $signInErrorMessage=$_SESSION['LoadErrorMessage'];
    unset($_SESSION['LoadErrorMessage']);
}
date_default_timezone_set('Europe/Sofia'); 
$today=date("Y-m-d");
require_once 'loginDatabase.php';
$conn = new \MySQLi($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$submit=false;
$signInErrorMessage="";
if(isset($_SESSION['signInErrorMessage'])){
    $signInErrorMessage=$_SESSION['signInErrorMessage'];
    unset($_SESSION['signInErrorMessage']);
}
$name = $surname = $time = $date = $email = $password = "";
$phone=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $surname = test_input($_POST["surname"]);
    $time = test_input($_POST["date"]);
    if ($time) {
        $date = date('Y-m-d', strtotime($time));
    } else {
        echo 'Invalid Date: ' . $_POST['date'];
    }
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $phone = test_input($_POST["phone"]);
    $submit=true;
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

<head>
        <title> ΟΑΣΑ-Αρχική Σελίδα </title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/signUp.css">
    </head>
    <body>
    <header>
            <a href="index.php" style="text-decoration:none;">
                <img id="logo" src="../images/logo.png">
            </a>
            <img id="text" src="../images/bla.png">
            <div class="rightOfHeader">
                <?php
                    $isLoggedIn=$_SESSION['isLoggedIn'];
                    if($isLoggedIn === false){
                        ?>
                        <a href="signUp.php" class="buttonHeader2">Εγγραφή</a>
                        <a href="login.php" class="buttonHeader">Σύνδεση</a>
                        <?php
                    }
                    else{
                        ?>
                        <div class="dropdown">
                            <button class="dropbtn">Ο λογαρισμός μου  <i class="down"></i></button>
                                <div class="dropdown-content">
                                    <a href="Account.php">Προβολή στοιχείων</a>
									<a href="customize.php">Επεξεργασία στοιχείων</a>
									<a href="disconnect.php">Αποσύνδεση</a>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </header>
        <div class="navbar">
            <a href="index.php">Αρχική σελίδα</a>
            <a href="schedules.php">Δρομολόγια</a>
            <div class="dropdown2">
                <button class="dropbtn2">ΑμεΑ 
                    <i class="down"></i></button>
                </button>
                <div class="dropdown-content2">
					<a href="capabilities.php">Δυνατότητες</a>
                    <a href="accessibletransportation.php">Προσβάσιμα Μέσα</a>
                    <a href="accessiblestops.php">Προσβάσιμες Στάσεις</a>
                </div>
            </div>
            <div class="dropdown2">
                <button class="dropbtn2">Εισιτήρια 
                    <i class="down"></i></button>
                </button>
                <div class="dropdown-content2">
                    <a href="tickets.php">Πληροφορίες Εισιτηρίων</a>
                    <a href="loadticket.php">Φόρτωση 
 Εισιτηρίων</a>
                    <a href="buyticket.php">Έκδοση Εισιτηρίων</a>
                </div>
            </div> 
			<div class="dropdown2">
                <button class="dropbtn2">Πληροφορίες Μετακίνησης 
                    <i class="down"></i></button>
                </button>
                <div class="dropdown-content2">
                    <a href="mmm.php">ΜΜΜ</a>
                    <a href="perioxes.php">Περιοχές</a>
                </div>
            </div> 
            <div class="dropdown2">
                <button class="dropbtn2">Επικοινωνία
                    <i class="down"></i></button>
                </button>
                <div class="dropdown-content2">
                    <a style='pointer-events: none;'>Τηλέφωνο: 210-82.00.999</a>
                    <a style='pointer-events: none;'>email: oasa@oasa.gr</a>
                </div>
            </div> 
        </div>
    </body>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div style="padding: 16px; " >
            <h1 align="center" style=' font-size: 50px;'>Εγγραφή Χρήστη</h1>
            <p align="center" style=' font-size: 30px;'>Συμπληρώστε τα πεδία</p>
            <h3 align="center" id="signInErrorMessage"><?php echo "$signInErrorMessage"?></h3>
            <label><b>Όνομα</b></label>
            <input type="text" name="name" placeholder="Εισάγετε το μικρό σας όνομα" required>
            <label><b>Επίθετο</b></label>
            <input type="text" name="surname" placeholder="Εισάγετε το επίθετό σας" required>
            <label><b>Ημερομηνία Γέννησης</b></label>
            <input type="date" name="date" max="<?php echo date("Y-m-d"); ?>" required>
            <label><b>Email</b></label>
            <input type="email" name="email" placeholder="Εισάγετε το email σας" required>
            <div>
                <label><b>Κωδικός Πρόσβασης</b></label>
                <input type="password" onkeyup='check();' name="password" id="password" placeholder="Εισάγετε τον κωδικό σας" required>
                <meter max="4" id="password-strength-meter"></meter>
                <p style='display:inline' id="password-strength-text"></p>
            </div>
            <br>
            <label><b>Επιβεβαίωση κωδικού πρόσβασης</b></label>
            <input type="password" onkeyup='check();' id="checkpassword" name="checkpassword" placeholder="Επιβεβαιώστε τον κωδικό σας" required>
            <label><b>Κινητό Τηλέφωνο</b></label>
            <input type="number" name="phone" placeholder="Εισάγετε το κινητό σας">
            <label><input type="checkbox" style="margin-bottom:20px;" required><b>Aποδέχομαι τους <a id="termsButton" onclick="openTerms()">όρους χρήσης</a></b></label>
            <div>
                <button type="button" class="cancelbtn" onClick="history.go(-1);" >Πίσω</button>
                <button type="submit" class="submit" >Επιβεβαίωση</button>
            </div>
        </div>
</form>
<script>
var strength = {
  0: "Πολύ Κακή",
  1: "Κακή",
  2: "Μέτρια",
  3: "Καλή",
  4: "Πολύ Καλή"
}
var password = document.getElementById('password');
var meter = document.getElementById('password-strength-meter');
var text = document.getElementById('password-strength-text');

password.addEventListener('input', function() {
  var val = password.value;
  var result = zxcvbn(val);

  meter.value = result.score;

  if (val !== "") {
    text.innerHTML = "Ασφάλεια κωδικού: " + strength[result.score]; 
  } else {
    text.innerHTML = "";
  }
});

var check = function() {
  if(document.getElementById('password').value === ""){
    document.getElementById('message').innerHTML = '';
  } 
  else if(document.getElementById('checkpassword').value === ""){
    document.getElementById('message').innerHTML = '';
  } 
  else if(document.getElementById('password').value ==
    document.getElementById('checkpassword').value) {
    document.getElementById('password').style.color = 'green';
    document.getElementById('password').style.border = '1px solid green';
    document.getElementById('checkpassword').style.color = 'green';
    document.getElementById('checkpassword').style.border = '1px solid green';
  } else {
    document.getElementById('password').style.color = 'red';
    document.getElementById('password').style.border = '1px solid red';
    document.getElementById('checkpassword').style.color = 'red';
    document.getElementById('checkpassword').style.border = '1px solid red';
  }
}
function openTerms(){
    window.open("../html/terms.html");
}

</script>


</html>


<?php
    if($submit === true){
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($query);
        if(!$result) {
            echo $conn->error;
        }
        else{
            $row_cnt = $result->num_rows;
            if($row_cnt > 0){
                $_SESSION['signInErrorMessage']="Το email χρησιμοποίειται ήδη";
                $submit=false;
            }
        }
        if($submit === true){
            $query = "INSERT INTO users VALUES(NULL,'$name','$surname','$date','$email','$password','$phone')";
            $result = $conn->query($query);
            if(!$result) {
                echo $conn->error;
            }
            $_SESSION['redirect']=true;
        }
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>