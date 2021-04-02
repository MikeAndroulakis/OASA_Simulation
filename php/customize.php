<?php
session_start();
if(isset($_SESSION['redirect'])){
    unset($_SESSION['redirect']);
    header("Location: successfulSignUp.php");
    exit();
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
    $Name = test_input($_POST["name"]);
    $Surname = test_input($_POST["surname"]);
    $Date = test_input($_POST["date"]);
    if ($time) {
        $date = date('Y-m-d', strtotime($time));
    } else {
        echo 'Invalid Date: ' . $_POST['date'];
    }
    $Mail = test_input($_POST["email"]);
    $Password = test_input($_POST["password"]);
    $Phone = test_input($_POST["phone"]);
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
        <link rel="stylesheet" href="../css/customize.css">

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
		<form action="insert.php" method="post">
            <div style="padding: 16px; " >
                <h1 align="center" style=' font-size: 30px;'>Επεξεργασία στοιχείων λογαριασμού</h1>
				<label><b>Όνομα</b></label> 
				<textarea type="text" name="name" required value=><?php echo$_SESSION['Name']?></textarea>
				<label><b>Επίθετο</b></label>
				<textarea type="text" name="surname" required><?php echo$_SESSION['Surname']?></textarea>
                <label><b>Ημερομηνία Γέννησης</b></label>
                <input type="date" name="date" max="<?php echo date("Y-m-d"); ?>" value='<?php echo $_SESSION['Date'] ?>' required>
				<label><b>Email</b></label>
				<textarea type="email" name="email" required><?php echo $_SESSION['Email'] ?></textarea>
				<div>
					<label><b>Αλλαγή Κωδικού Πρόσβασης</b></label>
                    <input type="password" onkeyup='check();' name="password" id="password"></input>
                    <br>
					<meter max="4" id="password-strength-meter"></meter>
					<p style='display:inline' id="password-strength-text"></p>
				</div>
                <br>
                <br>
				<label><b>Επιβεβαίωση Νέου Κωδικού Πρόσβασης</b></label>
				<input type="password" onkeyup='check();' id="checkpassword" name="checkpassword"></input>
                <label><b>Κινητό Τηλέφωνο</b></label>
				<textarea type="number" name="phone" required><?php echo $_SESSION['Phone']?></textarea>
                <div>
                <a href='index.php'><button type="button" class="cancelbtn">Αρχική Σελίδα</button></a>
                    <button class="submit" >Αποθήκευση</button> </p> </form>
                </div>    
			</div>
		</form>
	</body>
		
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

  // Update the password strength meter
  meter.value = result.score;

  // Update the text indicator
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




