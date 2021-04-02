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
		
		
		
	<br> <br>  
	<h1 align="center" style=' font-size: 50px;'>Περιοχές Ευθύνης του ΟΑΣΑ</h1>
	<center>
	
	
	<table style="width:50%">
			<tr>
				<td bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> ΚΩΔ.ΟΑΣΑ </b> </center> </font> </td>
				<td bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> ΟΝΟΜΑΣΙΑ </b> </center> </font> </td>
				<td bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> ΚΩΔ.ΟΑΣΑ </b> </center> </font> </td>
				<td bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> ΟΝΟΜΑΣΙΑ </b> </center> </font> </td>
				<td bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> ΚΩΔ.ΟΑΣΑ </b> </center> </font> </td>
				<td bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> ΟΝΟΜΑΣΙΑ </b> </center> </font> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 01 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΓΙΑ ΒΑΡΒΑΡΑ </center> </td>
				<td bgcolor="#ccccff" >  <center> 28 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΚΟΡΩΠΙ </center> </td>
				<td bgcolor="#ccccff" >  <center> 56 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΔΡΟΣΙΑ* </center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 02 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΓ.ΙΩΑΝ.ΡΕΝΤΗΣ<font color="#ff0000">*</font> </center> </td>
				<td bgcolor="#ccccff" >  <center> 29 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΜΑΝΔΡΑ<font color="#ff0000">**</font> </center> </td>
				<td bgcolor="#ccccff" >  <center> 57 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΕΚΑΛΗ* </center> </td>	
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 03 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΓ.ΠΑΡΑΣΚΕΥΗ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 30 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΜΕΤΑΜΟΡΦΩΣΗ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 58 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΕΛΛΗΝΙΚΟ<font color="#ff0000">*</font> </center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 04 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΓ.ΔΗΜΗΤΡΙΟΣ </center> </td>
				<td bgcolor="#ccccff" >  <center> 31 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΜΟΣΧΑΤΟ<font color="#ff0000">*</font> </center> </td>
				<td bgcolor="#ccccff" >  <center> 59 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΖΕΦΥΡΙ<font color="#ff0000">*</font> </center> </td>	
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 05 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΓΙΟΙ ΑΝΑΡΓΥΡΟΙ </center> </td>
				<td bgcolor="#ccccff" >  <center> 32 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΝΕΑ ΙΩΝΙΑ </center> </td>
				<td bgcolor="#ccccff" >  <center> 60 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΚΡΥΟΝΕΡΙ<font color="#ff0000">*</font> </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 06 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΘΗΝΑ </center> </td>
				<td bgcolor="#ccccff" >  <center> 33 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΝΕΑ ΣΜΥΡΝΗ </center> </td>
				<td bgcolor="#ccccff" >  <center> 61 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΛΥΚΟΒΡΥΣΗ<font color="#ff0000">*</font> </center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 07 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΙΓΑΛΕΩ </center> </td>
				<td bgcolor="#ccccff" >  <center> 34 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΝΕΑ ΦΙΛΑΔΕΛΦΕΙΑ<font color="#ff0000">*</font> </center> </td>
				<td bgcolor="#ccccff" >  <center> 62 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΜΑΓΟΥΛΑ<font color="#ff0000">*</font></center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 08 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΛΙΜΟΣ </center> </td>
				<td bgcolor="#ccccff" >  <center> 35 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΙΛΙΟΝ(ΝΕΑ ΛΙΟΣΙΑ) </center> </td>
				<td bgcolor="#ccccff" >  <center> 63 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΜΕΛΙΣΣΙΑ<font color="#ff0000">*</font> </center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 09 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΜΑΡΟΥΣΙΟ </center> </td>
				<td bgcolor="#ccccff" >  <center> 36 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΝΙΚΑΙΑ<font color="#ff0000">*</font> </center> </td>
				<td bgcolor="#ccccff" >  <center> 64 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΡΟΔΟΠΟΛΗ(ΜΠΑΛΑ)<font color="#ff0000">*</font> </center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 10 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΝΩ ΛΙΟΣΙΑ<font color="#ff0000">*</font> </center> </td>
				<td bgcolor="#ccccff" >  <center> 37 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΑΛΑΙΟ ΦΑΛΗΡΟ </center> </td>
				<td bgcolor="#ccccff" >  <center> 65 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΝΕΑ ΕΡΥΘΡΑΙΑ<font color="#ff0000">*</font> </center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 11 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΡΓΥΡΟΥΠΟΛΗ<font color="#ff0000">*</font> </center> </td>
				<td bgcolor="#ccccff" >  <center> 38 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΑΙΑΝΙΑ<font color="#ff0000">*</font> </center> </td>
				<td bgcolor="#ccccff" >  <center> 66 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΝΕΑ ΠΕΝΤΕΛΗ<font color="#ff0000">*</font> </center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 12 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΣΠΡΟΠΥΡΓΟΣ </center> </td>		
				<td bgcolor="#ccccff" >  <center> 39 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΕΙΡΑΙΑΣ </center> </td>
				<td bgcolor="#ccccff" >  <center> 67 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΝΕΑ ΧΑΛΚΗΔΟΝΑ<font color="#ff0000">*</font> </center> </td>	
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 13 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΧΑΡΝΑΙ ΜΕΝΙΔΙ<font color="#ff0000">*</font> </center> </td>
				<td bgcolor="#ccccff" >  <center> 40 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΕΡΑΜΑ </center> </td>
				<td bgcolor="#ccccff" >  <center> 68 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΝΕΟ ΨΥΧΙΚΟ<font color="#ff0000">*</font> </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 14 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΒΥΡΩΝΑΣ </center> </td>
				<td bgcolor="#ccccff" >  <center> 41 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΕΡΙΣΤΕΡΙ </center> </td>
				<td bgcolor="#ccccff" >  <center> 69 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΑΛΛΗΝΗ<font color="#ff0000">*</font> </center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 15 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΓΑΛΑΤΣΙ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 42 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΕΤΡΟΥΠΟΛΗ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 70 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΑΠΑΓΟΥ<font color="#ff0000">*</font> </center> </td>				
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 16 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΓΛΥΦΑΔΑ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 43 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΣΠΑΤΑ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 71 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΕΝΤΕΛΗ(ΠΑΛΑΙΑ)<font color="#ff0000">*</font> </center> </td>			
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 17 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΔΑΦΝΗ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 44 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΤΑΥΡΟΣ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 72 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΠΕΥΚΗ<font color="#ff0000">*</font> </center> </td>			
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 18 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΔΡΑΠΕΤΣΩΝΑ<font color="#ff0000">*</font></center> </td>	
				<td bgcolor="#ccccff" >  <center> 45 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΥΜΗΤΤΟΣ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 73 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΣΤΑΜΑΤΑ<font color="#ff0000">*</font> </center> </td>			
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 19 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΕΛΕΥΣΙΝΑ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 46 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΧΑΪΔΑΡΙ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 74 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΦΙΛΟΘΕΗ<font color="#ff0000">*</font> </center> </td>			
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 20 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΖΩΓΡΑΦΟΥ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 47 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΧΑΛΑΝΔΡΙ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 75 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΦΥΛΗ<font color="#ff0000">*</font> </center> </td>			
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 21 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΗΛΙΟΥΠΟΛΗ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 48 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΧΟΛΑΡΓΟΣ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 76 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΨΥΧΙΚΟ<font color="#ff0000">*</font> </center> </td>				
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 22 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΗΡΑΚΛΕΙΟ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 49 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΓΙΟΣ ΣΤΕΦΑΝΟΣ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 77 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΝΘΟΥΣΑ<font color="#ff0000">*</font> </center> </td>			
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 23 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΚΑΙΣΑΡΙΑΝΗ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 50 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΝΟΙΞΗ<font color="#ff0000">*</font></center> </td>	
				<td bgcolor="#ccccff" >  <center> 78 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΑΡΤΕΜΙΣ(ΛΟΥΤΣΑ)<font color="#ff0000">*</font> </center> </td>				
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 24 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΚΑΛΛΙΘΕΑ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 51 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΒΑΡΗ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 79 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΓΕΡΑΚΑΣ<font color="#ff0000">*</font> </center> </td>			
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 24 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΚΑΜΑΤΕΡΟ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 52 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΒΟΥΛΑ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 80 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΘΡΑΚΟΜΑΚΕΔΟΝΕΣ<font color="#ff0000">*</font> </center> </td>			
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 25 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΚΕΡΑΤΣΙΝΙ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 53 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΒΟΥΛΙΑΓΜΕΝΗ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 81 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΒΑΡΥΠΟΜΠΗ<font color="#ff0000">*</font> </center> </td>			
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 26 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΚΗΦΙΣΙΑ<font color="#ff0000">*</font></center> </td>	
				<td bgcolor="#ccccff" >  <center> 54 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΒΡΙΛΗΣΣΙΑ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 82 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΔΙΟΝΥΣΟΣ<font color="#ff0000">*</font> </center> </td>		
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> 27 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΚΟΡΥΔΑΛΛΟΣ </center> </td>	
				<td bgcolor="#ccccff" >  <center> 55 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΓΛΥΚΑ ΝΕΡΑ<font color="#ff0000">*</font> </center> </td>	
				<td bgcolor="#ccccff" >  <center> 83 </center> </td>
				<td bgcolor="#e1e1ea" >  <center> ΣΑΡΩΝΙΔΑ<font color="#ff0000">***</font> </center> </td>			
			</tr>
			
				
			<br></br>
			</table>
			</center>
			<center> <p> <font color="MediumBlue "> *: Δήμοι & Κοινότητες υπό συνένωση. </font> </p> </center>
			<center> <p> <font color="MediumBlue "> **:Ο Δήμος Μάνδρας στην Δυτική Αττική συνενώνεται στον νεοσύστατο Δήμο Μάνδρας-Ειδυλίας με τους 
			υφιστάμενους (εκτός περιοχής ευθύνης ΟΑΣΑ) Δήμους Βιλίων, Ερυθρών και την υφιστάμενη (εκτός περιοχής ευθύνης ΟΑΣΑ) 
			Κοινότητα Οινόης </font> </p> </center>
			<center> <p> <font color="MediumBlue "> ***:Η Κοινότητα Σαρωνίδας στην Ανατολική Αττική συνενώνεται στον νεοσύστατο Δήμο Σαρωνικού 
			με τον υφιστάμενο (εκτός περιοχής ευθύνης ΟΑΣΑ) Δήμο Καλυβίων Θορικού και τις υφιστάμενες (εκτός περιοχής ευθύνης ΟΑΣΑ) Κοινότητες 
			Αναβύσσου, Κουβαρά και Παλαιάς Φώκαιας. </font> </p> </center>
			
			<br>
			
			<h1 align="center" style=' font-size: 50px;'>Τομείς</h1>
			<br>
			<center>
			<table style="width:50%">
				<tr>
					<td bgcolor="#ccccff" width="5%"> <center> <font color="#1855c5"> <b> ΑΡΙΘΜΟΣ </b> </a> </font> </center> </td>
					<td bgcolor="#ccccff" width="95%"> <center> <font color="#1855c5"> <b> ΠΕΡΙΟΧΗ </b> </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 0 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΑΘΗΝΑ </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 1 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΝΕΑ ΣΜΥΡΝΗ - ΠΑΛΑΙΟ ΦΑΛΗΡΟ - ΑΛΙΜΟΣ - ΕΛΛΗΝΙΚΟ - ΓΛΥΦΑΔΑ - ΒΟΥΛΑ - ΒΟΥΛΙΑΓΜΕΝΗ - ΒΑΡΗ </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 2 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΔΑΦΝΗ - ΑΓΙΟΣ ΔΗΜΗΤΡΙΟΣ - ΑΡΓΥΡΟΥΠΟΛΗ - ΗΛΙΟΥΠΟΛΗ - ΥΜΗΤΤΟΣ - ΒΥΡΩΝΑΣ - ΚΑΙΣΑΡΙΑΝΗ - ΖΩΓΡΑΦΟΥ </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 3 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΓΕΡΑΚΑΣ - ΑΝΘΟΥΣΑ - ΓΛΥΚΑ ΝΕΡΑ - ΠΑΛΛΗΝΗ - ΣΠΑΤΑ - ΠΑΙΑΝΙΑ - ΚΟΡΩΠΙ - ΑΡΤΕΜΙΔΑ - ΣΑΡΩΝΙΔΑ </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 4 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΠΑΠΑΓΟΣ - ΧΟΛΑΡΓΟΣ - ΝΕΟ ΨΥΧΙΚΟ - ΑΓΙΑ ΠΑΡΑΣΚΕΥΗ - ΧΑΛΑΝΔΡΙ - ΒΡΙΛΗΣΣΙΑ - ΠΕΝΤΕΛΗ - ΝΕΑ ΠΕΝΤΕΛΗ 
					- ΜΑΡΟΥΣΙ </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 5 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΠΕΥΚΗ - ΛΥΚΟΒΡΥΣΗ - ΜΕΛΙΣΣΙΑ - ΚΗΦΙΣΙΑ - ΝΕΑ ΕΡΥΘΡΑΙΑ - ΕΚΑΛΗ - ΑΝΟΙΞΗ - ΔΡΟΣΙΑ - ΔΙΟΝΥΣΟΣ -
					ΡΟΔΟΠΟΛΗ - ΣΤΑΜΑΤΑ - ΑΓΙΟΣ ΣΤΕΦΑΝΟΣ -ΚΡΥΟΝΕΡΙ - ΒΑΡΥΜΠΟΜΠΗ - ΜΑΡΟΥΣΙ </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 6 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΨΥΧΙΚΟ - ΦΙΛΟΘΕΗ - ΓΑΛΑΤΣΙ - ΝΕΑ ΙΩΝΙΑ - ΝΕΑ ΦΙΛΑΔΕΛΦΕΙΑ - ΝΕΟ ΗΡΑΚΛΕΙΟ - ΜΑΡΟΥΣΙ - ΜΕΤΑΜΟΡΦΩΣΗ - 
					ΝΕΑ ΧΑΛΚΗΔΟΝΑ </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 7 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΠΕΡΙΣΤΕΡΙ - ΠΕΤΡΟΥΠΟΛΗ - ΙΛΙΟΝ - ΑΓΙΟΙ ΑΝΑΡΓΥΡΟΙ - ΚΑΜΑΤΕΡΟ - ΑΝΩ ΛΙΟΣΙΑ - ΑΧΑΡΝΑΙ - ΘΡΑΚΟΜΑΚΕΔΟΝΕΣ - 
					ΖΕΦΥΡΙ - ΦΥΛΗ </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 8 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΧΑΙΔΑΡΙ - ΑΙΓΑΛΕΩ - ΑΓΙΑ ΒΑΡΒΑΡΑ - ΚΟΡΥΔΑΛΛΟΣ - ΝΙΚΑΙΑ - ΤΑΥΡΟΣ - ΑΓΙΟΣ ΙΩΑΝΝΗΣ ΡΕΝΤΗΣ - ΚΕΡΑΤΣΙΝΙ - 
					ΔΡΑΠΕΤΣΩΝΑ - ΠΕΡΑΜΑ - ΜΑΝΔΡΑ - ΜΑΓΟΥΛΑ - ΕΛΕΥΣΙΝΑ - ΑΣΠΡΟΠΥΡΓΟΣ </center> </td>
				</tr>
				<tr>
					<td bgcolor="#e1e1ea"> <center> 9 </center> </td>
					<td bgcolor="#e1e1ea"> <center> ΚΑΛΛΙΘΕΑ - ΜΟΣΧΑΤΟ - ΠΕΙΡΑΙΑΣ </center> </td>
				</tr>
			</table>
			</center>
			
			<br>
		</body>


</html>