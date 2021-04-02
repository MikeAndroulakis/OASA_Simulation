<?php
    session_start();
    if(isset($_SESSION['tickets'])){
        $count=count($_SESSION['tickets']);
        $tickets="";
        $sum=0;
        for($i=1;$i<$count;$i++){
            $tickets .= "Είδος: ";
            $tickets .= $_SESSION['tickets'][$i][0];
            $tickets .="   Ποσότητα: ";
            $tickets .= $_SESSION['tickets'][$i][1];
            $sum=$sum+floatval($_SESSION['tickets'][$i][2])*$_SESSION['tickets'][$i][1];
            $tickets .="   ";
        }
        $tickets .= "Συνολικό ποσό: ";
        $tickets .= $sum;
        echo "<script>console.log('Debug Objects: " . $tickets . "' );</script>";
    }
    unset($_SESSION['tickets']);
    if(!isset($_SESSION['isLoggedIn'])){
        $_SESSION['isLoggedIn']=false;
    }
    if(isset($_SESSION['Pages'])){
        unset($_SESSION['Pages']);
    }
   // mail("marios1268@hotmail.com","Tickets",$tickets);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> ΟΑΣΑ-Αρχική Σελίδα </title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/successfulLoadTicket.css">
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
        <h1 align="center" style=' font-size: 50px;'>Επιτυχής Αγορά!</h1>
        <p align="center" style=' font-size: 30px;'>Συνεχίστε την περιήγηση σας.</p>
        <div style="text-align: center;">
        <a href="index.php" style="text-decoration:none;"><button type="button">Αρχική Σελίδα</button></a>
        </div>
    </body>


</html>