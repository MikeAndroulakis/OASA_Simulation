<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <title> ΟΑΣΑ-Αρχική Σελίδα </title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/accessiblestations.css">
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
		
		
		<br>
		<br>
		<br>
		<br>
		<br>
		<b>
		
		<center>
		<table  style="width:70%">
			<tr>
				<td colspan="7"  bgcolor="#ccccff" > <center> <font color="#1855c5"> <h1> <b> ΠΡΟΣΒΑΣΙΜΑ ΜΕΣΑ </b> 
				</h1> </font> </center> </td>
			</tr>
			<tr>
				 <th bgcolor="#ccccff" width="33%"> <font color="#1855c5"> <h2> <b> ΜΕΣΟ </b> </h2> </font> </th>
				 <th bgcolor="#ccccff" width="33%"> <font color="#1855c5"> <h2> <b> ΔΡΟΜΟΛΟΓΙΟ </b> </h2> </font> </th>
				 <th bgcolor="#ccccff" width="33%"> <font color="#1855c5"> <h2> <b> ΤΥΠΟΣ </b> </h2> </font> </th>
			</tr>
			<tr>
				<td> <center> <h3> <b> 140 </b> </h3> </center> </td> 
				<td> <center> <h3> <b> ΓΛΥΦΑΔΑ - ΠΟΛΥΓΩΝΟ </b> </h3> </center> </td>
				<td> <center> <p> <span style='font-size:40px;'> &#128652; </span> </p> </center> </td>
			</tr>
			<tr>
				<td> <center> <h3> <b> 212 </b> </h3> </center> </td> 
				<td> <center> <h3> <b> ΚΑΡΕΑΣ - ΒΥΡΩΝΑΣ - ΥΜΗΤΤΟΣ - ΣΤ. ΔΑΦΝΗ  </b> </h3> </center> </td>
				<td> <center> <p> <span style='font-size:40px;'> &#128652; </span> </p> </center> </td>
			</tr>
			<tr>
				<td> <center> <h3> <b> 209 </b> </h3> </center> </td> 
				<td> <center> <h3> <b>  ΜΕΤΑΜΟΡΦΩΣΗ - ΣΥΝΤΑΓΜΑ </b> </h3> </center> </td> 
				<td> <center> <p> <span style='font-size:40px;'> &#128654; </span> </p> </center> </td>
			</tr>
			<tr>
				<td> <center> <h3> 500 </h3> </center>
				<td> <center> <h3> ΠΕΙΡΑΙΑΣ-ΚΗΦΙΣΙΑ </h3> </center> </td>
				<td> <center> <p> <span style='font-size:40px;'> &#128652; </span> </p> </center> </td>
			</tr>
		</table>
		</center>
		<br>
		<center> <p> <font color="MediumBlue "> <span style='font-size:30px;'> &#128652;=ΛΕΩΦΟΡΕΙΟ </span> </font> </p> </center>
		<center> <p> <font color="MediumBlue "> <span style='font-size:30px;'> &#128654;=ΤΡΟΛΕΪ </span> </font> </p> </center>
		
	</body>
	
</html>