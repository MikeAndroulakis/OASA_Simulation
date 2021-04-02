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
				
		
		<br> <br>  
		<h1 align="center" style=' font-size: 40px;'>Εισιτήρια χωρίς μετακινήσεις προς αεροδρόμιο</h1>
		
		<center> 
		<table style="width:50%">
			<tr>
				<td rowspan="2"> <center> <font color="#1855c5"> <a href="http://www.athenstransport.com/" target= _blank" >Information About Transportation</a> 
				</font> </center> </td>
				<td  colspan="2"> <center> <font color="#1855c5"> <h2> ATH.<font color="#009933">E<font color="#ffa31a">Ν</font><font color="#e60073">A
				<font color="#99ebff">CARD</font></font> </h2> </font> &nbsp <font color="#00ccff"> Πολλαπλό Εισιτήριο </font> </center> </td>
				<td colspan="2"> <center> <font color="#1855c5"> <h2> ATH.<font color="#009933">E<font color="#ffa31a">Ν</font><font color="#e60073">A
				<font color="#99ebff">CARD</font></font> </h2> </font> &nbsp <font color="#00ccff"> Ανώνυμη Κάρτα </font> </center> </td>
				<td colspan="2"> <center> <font color="#1855c5"> <h2> ATH.<font color="#009933">E<font color="#ffa31a">Ν</font><font color="#e60073">A
				<font color="#99ebff">CARD</font></font> </h2> </font> &nbsp <font color="#00ccff"> Προσωποποιημένη Κάρτα </font> </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff">  <center> Ολόκληρο </center> </td> 
				<td bgcolor="#ccccff"> <center> Μειωμένο </center> </td>
				<td bgcolor="#ccccff"> <center> Ολόκληρο </center> </td>
				<td bgcolor="#ccccff"> <center> Μειωμένο </center> </td>
				<td bgcolor="#ccccff"> <center> Ολόκληρο </center> </td>
				<td bgcolor="#ccccff"> <center> Μειωμένο </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Ένα εισιτήριο 90 λεπτών </center> </td>
				<td> <center> 1,40 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 1,40 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 1,40 € </center> </td>
				<td> <center> 0,60 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Δύο εισιτήρια 90 λεπτών </center> </td>
				<td> <center> 2,70 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 2,70 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 2,70 € </center> </td>
				<td> <center> 1,20 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Πέντε εισιτήρια 90 λεπτών </center> </td>
				<td> <center> 6,50 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 6,50 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 6,50 € </center> </td>
				<td> <center> 3 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Έντεκα εισιτήρια 90 λεπτών </center> </td>
				<td> <center> 13,50 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 13,50 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 13,50 € </center> </td>
				<td> <center> 6 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 24 ωρών </center> </td>
				<td> <center> 4,50 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 4,50 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 4,50 € </center> </td>
				<td> <center> &#10060 </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 5 ημερών </center> </td>
				<td> <center> 9 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 9 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 9 € </center> </td>
				<td> <center> &#10060 </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 30 ημερών </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 30 € </center> </td>
				<td> <center> 15 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 90 ημερών </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 85 € </center> </td>
				<td> <center> 43 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 180 ημερών </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 170 € </center> </td>
				<td> <center> 85 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 365 ημερών </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 330 € </center> </td>
				<td> <center> 165 € </center> </td>
			</tr>
			
			
		</table>
		</center>
		
		<p> <font color="red"> <?php for($i=1;$i<=314;$i++){echo '&nbsp';} ?> &#10060=Δεν είναι διαθέσιμο </font> </p>
		
		<br> <br>  
		<h1 align="center" style=' font-size: 40px;'>Εισιτήρια με μετακινήσεις προς αεροδρόμιο</h1>
		<center> 
		<table style="width:50%">
			<tr>
				<td width="24%" rowspan="2"> <center> <font color="#1855c5"> <a href="http://www.athenstransport.com/" target= _blank" >Information About Transportation</a> 
				</font> </center> </td>
				<td colspan="2" width="20%"> <center> <font color="#1855c5"> <h2> ATH.<font color="#009933">E<font color="#ffa31a">Ν</font><font color="#e60073">A
				<font color="#99ebff">CARD</font></font> </h2> </font> &nbsp <font color="#00ccff"> Πολλαπλό Εισιτήριο </font> </center> </td>
				<td colspan="2" width="20%"> <center> <font color="#1855c5"> <h2> ATH.<font color="#009933">E<font color="#ffa31a">Ν</font><font color="#e60073">A
				<font color="#99ebff">CARD</font></font> </h2> </font> &nbsp <font color="#00ccff"> Ανώνυμη Κάρτα </font> </center> </td>
				<td  colspan="2" width="20%"> <center> <font color="#1855c5"> <h2> ATH.<font color="#009933">E<font color="#ffa31a">Ν</font><font color="#e60073">A
				<font color="#99ebff">CARD</font></font> </h2> </font> &nbsp <font color="#00ccff"> Προσωποποιημένη Κάρτα </font> </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff">  <center> Ολόκληρο </center> </td> 
				<td bgcolor="#ccccff"> <center> Μειωμένο </center> </td>
				<td bgcolor="#ccccff"> <center> Ολόκληρο </center> </td>
				<td bgcolor="#ccccff"> <center> Μειωμένο </center> </td>
				<td bgcolor="#ccccff"> <center> Ολόκληρο </center> </td>
				<td bgcolor="#ccccff"> <center> Μειωμένο </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο Λεωφορείου Exoress για Αεροδρόμιο </center> </td>
				<td> <center> 6 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 6 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 6 € </center> </td>
				<td> <center> 3 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο Μετρό για Αεροδρόμιο </center> </td>
				<td> <center> 10 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 10 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 10 € </center> </td>
				<td> <center> 5 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο Μετρό μετ επιστροφής για Αεροδρόμιο (εντός 48 ωρών) </center> </td>
				<td> <center> 18 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 18 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 18 € </center> </td>
				<td> <center> 3 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο Μετρό μεταξύ Αεροδρομίου &Παλλήνη - Κάντζα - Κορωπί </center> </td>
				<td> <center> 6 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 6 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 6 € </center> </td>
				<td> <center> 3 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Τουριστικό εισιτήριο 3 ημερών (περιλαμβάνει μετακινήσεις προς Αεροδρόμιο) </center> </td>
				<td> <center> 22 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 22 € </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 22 € </center> </td>
				<td> <center> &#10060 </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 30 ημερών </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 49 € </center> </td>
				<td> <center> 25 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 90 ημερών </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 142 € </center> </td>
				<td> <center> 71 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 180 ημερών </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 250 € </center> </td>
				<td> <center> 125 € </center> </td>
			</tr>
			<tr>
				<td bgcolor="#ccccff" >  <center> Εισιτήριο 365 ημερών </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> &#10060 </center> </td>
				<td> <center> 490 € </center> </td>
				<td> <center> 245 € </center> </td>
			</tr>
			
		</table>
		</center>
		
		<p> <font color="red"> <?php for($i=1;$i<=314;$i++){echo '&nbsp';} ?> &#10060=Δεν είναι διαθέσιμο </font> </p>
		
		
	</body>
	
</html>