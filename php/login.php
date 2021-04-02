<?php
session_start();
if(isset($_SESSION['Pages'])){
    unset($_SESSION['Pages']);
}
if(isset($_SESSION['tickets'])){
    unset($_SESSION['tickets']);
}
if(isset($_SESSION['redirect'])){
    unset($_SESSION['redirect']);
    $_SESSION['isLoggedIn']=true;
    header("Location: successfulLogin.php");
    exit();
}
if(isset($_SESSION['LoadErrorMessage'])){
    $signInErrorMessage=$_SESSION['LoadErrorMessage'];
    unset($_SESSION['LoadErrorMessage']);
}
require_once 'loginDatabase.php';
$conn = new \MySQLi($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$submit=false;
$signInErrorMessage="";
if(isset($_SESSION['signInErrorMessage'])){
    $signInErrorMessage=$_SESSION['signInErrorMessage'];
    unset($_SESSION['signInErrorMessage']);
}
$email = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
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
    <head>
        <title> ΟΑΣΑ-Αρχική Σελίδα </title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/login.css">
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
            <h1 align="center" style=' font-size: 50px;'>Σύνδεση Χρήστη</h1>
            <h3 align="center" id="signInErrorMessage"><?php echo "$signInErrorMessage"?></h3>
            <label><b>Email χρήστη</b></label>
            <input type="email" name="email" placeholder="Εισάγετε το email σας" required>
            <label><b>Κωδικός Πρόσβασης</b></label>
            <input type="password" name="password" id="password" placeholder="Εισάγετε τον κωδικό σας" required>
            <div>
                <button type="button" class="cancelbtn" onClick="history.go(-1);" >Πίσω</button>
                <button type="submit" class="submit" >Επιβεβαίωση</button>
            </div>
        </div>
    </form>


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
            if($row_cnt === 0){
                $_SESSION['signInErrorMessage']="Δεν βρέθηκε χρήστης με αυτό το email";
                $submit=false;
            }
            else{
                $row = mysqli_fetch_row($result);
                $_SESSION['Name']=$row[1];
                $_SESSION['Surname']=$row[2];
                $_SESSION['Date']=$row[3];
                $_SESSION['Email']=$row[4];
                $_SESSION['Password']=$row[5];
                $_SESSION['Phone']=$row[6];
                $counter=0;
                $result->data_seek($counter);
                if(strcmp($result->fetch_assoc()['password'],$password) !==0){
                    $_SESSION['signInErrorMessage']="Λάθος κωδικός πρόσβασης";
                }
                else{
                    $_SESSION['redirect']=true;
                }
            }
        }
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>