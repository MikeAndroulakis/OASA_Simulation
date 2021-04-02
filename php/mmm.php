<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <title> ΟΑΣΑ-Αρχική Σελίδα </title>
        <link rel="stylesheet" href="../css/main.css">
		
        <link rel="stylesheet" href="../css/tickets.css">
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
		<center> <b style='font-size:large;'> Το έντονο κυκλοφοριακό πρόβλημα που επικρατεί στην πρωτεύουσα οδήγησε στην εφαρμογή τεχνικών που συμβάλλουν στην αποτελεσματική διαχείριση 
		της κυκλοφορίας και στη λήψη μέτρων με στόχο την αναβάθμιση των υπηρεσιών των Μέσων Μαζικής Μεταφοράς(ΜΜΜ) 
		και κατά συνέπεια τη βελτίωση της ποιότητας ζωής του πολίτη. Ένα τέτοιο μέτρο είναι η προνομιακή μεταχείριση των ΜΜΜ κατά μήκος των 
		οδικών αρτηριών, με χωροθέτηση </font> <font color="##33ccff"> <b>Αποκλειστικών Λωρίδων Λεωφορείων (ΑΛΛ)</b> </font> Μέσων
		Μαζικής Μεταφοράς. Τα τελευταία χρόνια ο ΟΑΣΑ σε 
		συνεργασία με το Υπουργείο Υποδομών Μεταφορών και Δικτύων, λαμβάνοντας υπόψη την διεθνή εμπειρία και τις μέχρι σήμερα θετικές συνέπειες από 
		την λειτουργία των ΑΛΛ, ανέπτυξε ένα συνεκτικό δίκτυο λεωφορειολωρίδων μήκους 50
		περίπου χλμ.Οι λεπτομέριες λειτουργίας των <font color="##33ccff"> ΑΛΛ </font> συνοψίζονται στα εξής </b></center>
		<br>
		<br>
		<br>
		
		<b>
		<center>
		<table  style="width:70%; font-size:large;">
		<tr>
			<td rowspan="6"  bgcolor="#ccccff" width="7%"> <font color="#1855c5"> <center> <b><h1> ΣΚΟΠΟΣ </h1> </b> </center> </font> </td>
		</tr>
		<tr>
			<td colspan="4"> <center> Αύξηση της ταχύτητας των ΜΜΜ σε 23 χλμ /ώρα </center></td>
		</tr>
		<tr>
			<td colspan="4"> <center> Βελτίωση της ποιότητας μεταφοράς των ΜΜΜ με αποτέλεσμα να είναι περισσότερο ελκυστικά για το επιβατικό κοινό </center> </td> 
		</tr>
		<tr>
			<td colspan="4"> <center> Αύξηση της επιβατικής κίνησης των ΜΜΜ και μείωση της χρήσης των ΙΧ οχημάτων </center></td>
		</tr>
		<tr>
			<td colspan="4"> <center> Μείωση της κατανάλωσης καυσίμων για τα ΜΜΜ </center></td>
		</tr>
		<tr>
			<td colspan="4"> <center> Βελτίωση των περιβαλλοντικών συνθηκών </center></td>
		</tr>
		<tr>
			<td rowspan="6"  bgcolor="#ccccff" > <font color="#1855c5"> <center> <b><h1> ΣΗΜΑΝΣΗ </h1> </b> </center> </font> </td>
			
		</tr>
		<tr>
			<td colspan="4"> <center> Συνεχής διαγράμμιση πλάτους 10-20 εκ. (χρησιμοποιείται σε τμήματα αποκλειστικής χρήσης των ΜΜΜ) </center></td>
		</tr>
		<tr>
			<td colspan="4"> <center> Διακεκομμένη διαγράμμιση πλάτους 10-20 εκ. (χρησιμοποιείται σε τμήματα μικτής κίνησης πριν τις δεξιές στροφές, εισόδους σε παρόδιες 
			, χρήσεις, θέσεις ταξί κτλ) </center> </td> 
		</tr>
		<tr>
			<td colspan="4"> <center> Ανακλαστήρες σε μονή ή διπλή ή τετραπλή σειρά </center></td>
		</tr>
		<tr>
			<td colspan="4"> <center> Χρωματισμός με ειδικό αντιολισθηρό τάπητα </center></td>
		</tr>
		<tr>
			<td colspan="4"> <center> Διάφοροι τύποι πινακίδων </center></td>
		</tr>
		<tr>
			<td bgcolor="#ccccff" ><font color="#1855c5"><center> <b> <h1> ΩΡΕΣ ΛΕΙΤΟΥΡΓΙΑΣ </h1> </b> </center></font></td>
			<td colspan="4"> 
				<center> Η ρύθμιση για τις <font color="##33ccff"> ΑΛΛ </font> παράλληλης ροής ισχύει από Δευτέρα έως Παρασκευή από 06:00 έως 21:00 και το Σάββατο από 06:00 έως 16:00.
				Η ρύθμιση για τις <font color="##33ccff"> ΑΛΛ </font> αντίθετης ροής ισχύει για όλο το 24ωρο.
				</center>
			</td>
		</tr>
		<tr>
			<td bgcolor="#ccccff" ><font color="#1855c5"><center> <b> <h1> ΠΑΡΑΒΙΑΣΗ ΤΩΝ </font> <font color="##33ccff"> ΑΛΛ </font> </h1> </b> </center></font></td>
			<td colspan="4"> 
			<center> Το έργο της αστυνόμευσης των λεωφορειολωρίδων έχει αναλάβει η Τροχαία Αττικής. Τονίζεται ότι το ύψος του προστίμου εισόδου σε <font color="##33ccff"> 
			ΑΛΛ </font>  είναι 200 ΕΥΡΩ.
			Σε περίπτωση στάθμευσης σε <font color="##33ccff"> ΑΛΛ </font> , επιπλέον του προστίμου εισόδου, αφαιρούνται οι πινακίδες και απομακρύνονται τα
			οχήματα. Τα έσοδα από τα πρόστιμα 
			εισπράττονται από την Τοπική Αυτοδιοίκηση και όχι από τον ΟΑΣΑ.</center></td>
		</tr>
		
		
		</table> </center>
		
    </body>


</html>
		
	</body>
	
</html>