<?php
	require_once 'loginDatabase.php';
	$conn = new \MySQLi($hn,$un,$pw,$db);
	if(!$conn){
		echo 'Not connected to server';
	}
	if($conn->connect_error) die($conn->connect_error);
	$Email=$_POST['email'];
	$query="DELETE FROM users WHERE email='$Email'";
	$result = $conn->query($query);
    if(!$result) {
        echo $conn->error;
    }
			
	$Name=$_POST['name'];
	$Surname=$_POST['surname'];
	$Date=$_POST['date'];
	$Mail=$_POST['email'];
	$Password=$_POST['password'];
	$Phone=$_POST['phone'];
	$query = "INSERT INTO users VALUES(NULL,'$Name','$Surname','$Date','$Mail','$Password','$Phone')";
	$result = $conn->query($query);
        if(!$result) {
            echo $conn->error;
        }
					
?>

<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> ΟΑΣΑ-Αρχική Σελίδα </title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/successfulSignUp.css">
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
		
		<?php
		
			require_once 'loginDatabase.php';
			$conn = new \MySQLi($hn,$un,$pw,$db);
			if(!$conn){
				echo 'Not connected to server';
			}
			if($conn->connect_error) die($conn->connect_error);
			$Email=$_SESSION['Email'];
			$result = mysqli_query($conn,"DELETE FROM users WHERE email='$Email'");
			if(!$result) {
				echo "edw $conn->error";
			}
			$name=$_POST['name'];
			$surname=$_POST['surname'];
			$date=$_POST['date'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$phone=$_POST['phone'];
			
			
			$_SESSION['Name']=$name;
			$_SESSION['Surname']=$surname;
			$_SESSION['Date']=$date;
			$_SESSION['Email']=$email;
			$_SESSION['Password']=$password;
			$_SESSION['Phone']=$phone;
			
			mysqli_query($conn,"INSERT INTO users (id,name,surname, birth,email,password,phone) 
			VALUES (NULL,'$name','$surname','$date','$email','$password','$phone')");
			$_SESSION['Email']=$_POST['email'];
			if(!$result) {
				echo "edw $conn->error";
			}
				
		?>
		
		
		<br> 
		<br> 
		<br> 
		<br> 
		<br> 
		<h1 align="center" style=' font-size: 50px;'>Τα στοιχεία άλλαξαν επιτυχώς!</h1>
		<br>
		<br>
		<div style="text-align: center;">
            <a href="index.php" class="buttonHeader">Αρχική Σελίδα</a>
        </div>
		
		
    </body>
</html>
		
