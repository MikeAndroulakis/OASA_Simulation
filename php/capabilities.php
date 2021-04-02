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
		<br>
		<br>
		<br>
		<br>
		
		<b>
		<center>
		<table  style="width:70%; font-size: large;">
		<tr>
			<td colspan="7"  width="10%" bgcolor="#ccccff" > <center> <font color="#1855c5"> <h1> <b> ΔΥΝΑΤΟΤΗΤΕΣ </b> 
			</h1> </font> </center> </td>
			
		</tr>
		<tr>
			<td colspan="1" rowspan="6"  bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> <span style='font-size:50px;'> &#128647;</span>
			</b> </center> </font> </td>
		</tr>
		<tr>
			<td> <center> Πηγαίνεις στον πλησιέστερο σταθμό της οικίας σου ή της διαδρομής που επιθυμείς. </center></td>
		</tr>
		<tr>
			<td> <center> Από τις ράμπες των πεζοδρομίων προσεγγίζεις τον ανελκυστήρα του σταθμού. </center> </td> 
		</tr>
		<tr>
			<td> <center> Εισέρχεσαι στον ανελκυστήρα και κατεβαίνεις στις αποβάθρες των σταθμών. Όλοι οι ανελκυστήρες είναι πλήρως προσβάσιμοι
			και στην είσοδο και στην έξοδο τους. Εάν αντιμετωπίσεις πρόβλημα χρησιμοποίησε το κουδούνι κινδύνου. </center></td>
		</tr>
		<tr>
			<td> <center> Από τις αποβάθρες εισέρχεσαι στους συρμούς είτε μόνος είτε με την βοήθεια του συνοδού σου ή των υπευθύνων των σταθμών,
			οι οποίοι θα σου παράσχουν κάθε δυνατή βοήθεια, όταν θα τους ζητηθεί. Η επιβίβαση-αποβίβαση για τα αναπηρικά αμαξίδια γίνεται 
			ευκολότερη στο πρώτο ή το τελευταίο βαγόνι, γιατί φέρουν ράμπα για το κενό που υπάρχει μεταξύ αποβάθρας 
			και συρμού και σχετική σήμανση. </center></td>
		</tr>
		<tr>
			<td> <center> Εάν έχεις πρόβλημα όρασης ζήτησε βοήθεια από τον υπεύθυνο του σταθμού, ο οποίος θα σε βοηθήσει στην επιβίβαση και 
			θα ενημερώσει τον υπεύθυνο του σταθμού που θα αποβιβασθείτε για να σε βοηθήσει. </center></td>
		</tr>
		<tr>
			<td colspan="1" rowspan="4" width="10%" bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> <span style='font-size:50px;'> &#128643;</span>
			</b> </center> </font> </td>
			
		</tr>
		<tr>
			<td> <center> Ακολούθησε όλες τις παραπάνω οδηγίες, γιατί όλοι οι σταθμοί του ΗΣΑΠ έχουν ανακαινισθεί με σκοπό την πλήρη 
				πρόσβαση των Εμποδιζομένων Ατόμων (Ράμπες, Ανελκυστήρες, Φύλακες κ.λ.π.). </center></td>
		</tr>
		<tr>
			<td> <center> Εισέρχεσαι στους συρμούς από την πρώτη πόρτα του πρώτου βαγονιού, όπου υπάρχει και σχετική σήμανση. </center> </td> 
		</tr>
		<tr>
			<td> <center> Στους σταθμούς Άγ. Νικολάου, Ομόνοιας, Μοναστηράκι καλέστε τους φύλακες να φέρουν την κινητή ράμπα και να σας βοηθήσουν,
				αφού την τοποθετήσουν, επειδή στους παραπάνω σταθμούς υπάρχει μεγάλο κενό μεταξύ αποβάθρας και συρμών. Υπάρχει σχετική σήμανση 
				στα βαγόνια των συρμών και ηχητική ενημέρωση στους παραπάνω σταθμούς. </center></td>
		</tr>
		<tr>
			<td height="100" rowspan="3"  bgcolor="#ccccff"><center><font color="#1855c5"><b><span  align="center" style='font-size:50px;'>&#128651;</span> 
			</b></font></center></td>
			
		</tr>
		<tr>
			<td> <center> Πλησιάζεις τον πλησιέστερο σταθμό της οικίας σου, συνήθως με την βοήθεια συνοδού, γιατί η πρόσβαση προς τις ράμπες των 
				στάσεων του ΤΡΑΜ δεν είναι εύκολη, επειδή τα πεζοδρόμια δεν έχουν ακόμη 
				προσαρμοσθεί κατάλληλα. </center></td> 
		</tr>
		<tr>
			<td> <center> Εισέρχεσαι στους συρμούς μόνος σου ή με την βοήθεια του συνοδού σου όπου υπάρχουν ειδικές θέσεις για Εμποδιζόμενα Άτομα. </center> </td> 
		</tr>
		<tr>
			<td colspan="1" rowspan="6" bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> <span style='font-size:50px;'> &#128652;</span> 
			</b> </center> </font> </td>
			
		</tr>
		<tr>
			<td> <center> Πλησιάζεις την κοντινότερη στάση της λεωφορειακής γραμμής που χρησιμοποιείς μόνος ή με την βοήθεια συνοδού. </center></td>
		</tr>
		<tr>
			<td> <center> Να προτιμήσετε τις στάσεις με προεξοχές που έχουν τοποθετηθεί για εξυπηρέτηση των Εμποδιζομένων Ατόμων. </center> </td> 
		</tr>
		<tr>
			<td> <center> Όταν πλησιάζει το λεωφορείο σου, ο οδηγός όταν σταματήσει είναι υποχρεωμένος να χρησιμοποιήσει την επιγονάτηση ή την ράμπα, 
				εάν έχει το λεωφορείο. Σχεδόν όλα τα λεωφορεία έχουν επιγονάτηση, ενώ το 1/4 αυτών φέρει 
				ράμπες. </center></td>
		</tr>
		<tr>
			<td> <center> Με την βοήθεια του συνοδού σου, των επιβατών ή του οδηγού επιβιβάζεσαι. Όλοι οι οδηγοί έχουν ενημερωθεί να παρέχουν 
				κάθε βοήθεια στα εμποδιζόμενα άτομα. <b> Εάν έχεις κάποιο παράπονο κάλεσε τον ΟΑΣΑ, τηλ. 2108200887  ή 
				στο τηλεφωνικό κέντρο του ΟΑΣΑ 11185 </center></td>
		</tr>
		<tr>
			<td> <center> Εάν υπάρχουν ομάδες Εμποδιζομένων Ατόμων (Σχολεία, Σύλλογοι, κ.λ.π. ) που θα πρέπει να μετακινούνται καθημερινά, 
				κάλεσε τον ΟΑΣΑ στα τηλ. 2108200883, 2108200881 για εξυπηρέτησή σας. Ήδη εξυπηρετείται με την λεωφ. Γραμμή 030 το Κ.Ε.Ε.Π.Ε.Α. 
				Κέντρο Επαγγελματικής Εκπαίδευσης Παιδιών με Ειδικές Ανάγκες. Επίσης η λεωφ. Γραμμή 911 
				εξυπηρετεί τον "Φάρο Τυφλών". </center></td>
		</tr>
		<tr>
			<td colspan="1" rowspan="6" bgcolor="#ccccff" > <font color="#1855c5"> <center> <b> <span style='font-size:50px;'> &#128654;</span> 
			</b> </center> </font> </td>
			
		</tr>
		<tr>
			<td> <center> Πλησιάζεις την κοντινότερη στάση της γραμμής τρόλεϊ που χρησιμοποιείς. </center></td>
		</tr>
		<tr>
			<td> <center> Να προτιμήσετε τις στάσεις με προεξοχές, που έχουν τοποθετηθεί για εξυπηρέτηση των Εμποδιζομένων Ατόμων. </center> </td> 
		</tr>
		<tr>
			<td> <center> Όταν πλησιάσει και σταματήσει το τρόλεϊ, ο οδηγός είναι υποχρεωμένος να χρησιμοιήσει την επιγονάτηση ή την ράμπα, 
				εάν έχει το τρόλεϊ. Όλα τα τρόλεϊ έχουν επιγονάτηση και το 1/4 ράμπες. </center></td>
		</tr>
		<tr>
			<td> <center> Με την βοήθεια του συνοδού σου των επιβατών και των οδηγών επιβιβάζεσαι. Όλοι οι οδηγοί έχουν ενημερωθεί να παρέχουν 
				κάθε διευκόλυνση στα εμποδιζόμενα άτομα.</center></td>
		</tr>
		
		</table></center>
		
		<center> <p> <font color="MediumBlue ">  <span style='font-size:30px;'> &#128647;=ΜΕΤΡΟ </span> </font> </p> </center>
		<center> <p> <font color="MediumBlue "> <span style='font-size:30px;'> &#128643;=ΗΛΕΚΤΡΙΚΟΣ ΣΙΔΗΡΟΔΡΟΜΟΣ </span> </font> </p> </center>
		<center> <p> <font color="MediumBlue "> <span style='font-size:30px;'> &#128651;=ΤΡΑΜ </span> </font> </p> </center>
		<center> <p> <font color="MediumBlue "> <span style='font-size:30px;'> &#128652;=ΛΕΩΦΟΡΕΙΟ </span> </font> </p> </center>
		<center> <p> <font color="MediumBlue "> <span style='font-size:30px;'> &#128654;=ΤΡΟΛΕΪ </span> </font> </p> </center>
	</body>
	
</html>