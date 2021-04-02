<?php
    session_start();
    if(isset($_SESSION['Pages'])){
        unset($_SESSION['Pages']);
    }
    if(!isset($_SESSION['isLoggedIn'])){
        $_SESSION['isLoggedIn']=false;
    }
    if(isset($_SESSION['LoadErrorMessage'])){
        unset($_SESSION['LoadErrorMessage']);
    }
    $ErrorMessage="";
    if(isset($_SESSION['BuyErrorMessage'])){
        $ErrorMessage=$_SESSION['BuyErrorMessage'];
        unset($_SESSION['BuyErrorMessage']);
    }
    require_once 'loginDatabase.php';
    $conn = new \MySQLi($hn,$un,$pw,$db);
    if($conn->connect_error) die($conn->connect_error);
    $tickets="";
    if(!isset($_SESSION['tickets'])){
        $_SESSION['goBack']=-1;
        unset($_SESSION["emailToSend"]);
        $tickets="";
        $_SESSION['tickets']=array(array("a",2,3));
        $payButton="<button type='button' id='payButton' class='disabled' onclick='showModal()' disabled>Πληρωμή</button>";
    }
    else{
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $_SESSION['goBack']=$_SESSION['goBack']-1;
        }
        if(count($_SESSION['tickets']) === 1){
            unset($_SESSION["emailToSend"]);
            $payButton="<button type='button' id='payButton' class='disabled' onclick='showModal()' disabled>Πληρωμή</button>";
        }
        else{
            $payButton="<button type='button' id='payButton' class='submit' onclick='showModal()'>Πληρωμή</button>";
        }
        $count=count($_SESSION['tickets']);
        $tickets="";
        $sum=0;
        for($i=1;$i<$count;$i++){
            $tickets .= "<li>";
            $tickets .= $_SESSION['tickets'][$i][0];
            $tickets .="  x";
            $tickets .= $_SESSION['tickets'][$i][1];
            $sum=$sum+floatval($_SESSION['tickets'][$i][2])*$_SESSION['tickets'][$i][1];
            $tickets .="<span class=";
            $tickets .= "close";
            $tickets .= " id=";
            $tickets .= $i;
            $tickets .= ">&times;</span></li>";
        }
        $tickets .= "<li id='sum' style='pointer-events:none;'>";
        $tickets .= "Συνολικό ποσό: ";
        $tickets .= $sum;
        $tickets .= " <p style='display:inline'>&euro;</p></li>";
    }
    if(isset($_GET['remove'])){
        $hasToRemove = $_GET['remove'];
    }
    else{
        $hasToRemove = -1;
    }
    if($hasToRemove !== -1){
        unset($_SESSION['tickets'][$hasToRemove]);
    }
    if(isset($_SESSION["emailToSend"])){
        $email="<input disabled placeholder='Εισάγετε την email' type='email' name='email' value='";
        $email .= $_SESSION["emailToSend"];
        $email .="'required>";
    }
    else{
            if($_SESSION['isLoggedIn'] === true){
                $email="<input placeholder='Εισάγετε την email' type='email' name='email' value='";
                $email .= $_SESSION['Email'];
                $email .="'required>";
            }
            else{
                $email='<input placeholder="Εισάγετε την email" type="email" name="email"required>';
            }
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["checkboxairport"])){
                $checkboxairport=true;
            }
            else{
                $checkboxairport=false;
            }
            if(!isset($_SESSION["emailToSend"])){
                $_SESSION["emailToSend"]=$_POST["email"];
            }
            $amount = test_input($_POST["number"]);
            if($checkboxairport===false){
                $type=$_POST["notairport"];
                if($type === '0'){
                    $_SESSION['BuyErrorMessage']="Επιλέξτε είδος εισιτηρίου";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                else if($type === '1'){
                    $data=array("Ένα εισιτήριο 90 λεπτών",$amount,1.40);
                    array_push($_SESSION['tickets'], $data);
                }
                else if($type === '2'){
                    $data=array("Δύο εισιτήρια 90 λεπτών",$amount,2.70);
                    array_push($_SESSION['tickets'], $data);
                }
                else if($type === '3'){
                    $data=array("5 εισιτήρια 90 λεπτών",$amount,6.50);
                    array_push($_SESSION['tickets'], $data);
                }
                else if($type === '4'){
                    $data=array("11 εισιτήρια 90 λεπτών",$amount,13.50);
                    array_push($_SESSION['tickets'], $data);
                }
                else if($type === '5'){
                    $data=array("Εισιτήριο 24 ωρών",$amount,4.50);
                    array_push($_SESSION['tickets'], $data);
                }
                else{
                    $data=array("Εισιτήριο 5 ημερών",$amount,9);
                    array_push($_SESSION['tickets'], $data);
                }
            }
            else{
                $type=$_POST["airport"];
                if($type === '0'){
                    $_SESSION['BuyErrorMessage']="Επιλέξτε είδος εισιτηρίου";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                else if($type === '1'){
                    $data=array("Εισιτήριο Λεωφορείου Express για Αεροδρόμιο",$amount,6);
                    array_push($_SESSION['tickets'], $data);
                }
                else if($type === '2'){
                    $data=array("Εισιτήριο Metro για Αεροδρόμιο",$amount,10);
                    array_push($_SESSION['tickets'], $data);
                }
                else if($type === '3'){
                    $data=array("Εισιτήριο Metro μετ΄επιστροφής για Αεροδρόμιο",$amount,18);
                    array_push($_SESSION['tickets'], $data);
                }
                else if($type === '4'){
                    $data=array("Τουριστικό εισιτήριο 3 ημερών",$amount,22);
                    array_push($_SESSION['tickets'], $data);
                }
                else{
                    $data=array("Εισιτήριο 30 ημερών",$amount,49);
                    array_push($_SESSION['tickets'], $data);
                }
            }
            echo "<meta http-equiv='refresh' content='0'>";
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <title> ΟΑΣΑ-Αρχική Σελίδα </title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/buyticket.css">
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
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div style="padding: 16px; " >
                    <h1 align="center" style=' font-size: 50px;'>Αγορά Εισιτηρίου</h1>
                    <h3 id="ErrorMessage"><?php echo "$ErrorMessage"?></h3>
                    <label class="container"><b>Μετακίνηση προς το αεροδρόμιο</b>
                        <input name="checkboxairport" type="checkbox" value="airport" onchange="changeAirportStatus()">
                        <span class="checkmark"></span>
                    </label>
                    <label><b>Είδος εισιτηρίου</b></label>
                    <div style="position: relative;">
                        <div id="notairport" class="custom-select" style="width:420px; position: absolute;">
                            <select name="notairport">
                                        <option value='0' selected>Επιλέξτε</option>
                                        <option value='1'>Ένα εισιτήριο 90 λεπτών - 1,40<p>&euro;</p></option>
                                        <option value='2'>Δύο εισιτήρια 90 λεπτών - 2,70<p>&euro;</p></option>
                                        <option value='3'>5 εισιτήρια 90 λεπτών - 6,50<p>&euro;</p></option>
                                        <option value='4'>11 εισιτήρια 90 λεπτών - 13,50<p>&euro;</p></option>
                                        <option value='5'>Εισιτήριο 24 ωρών - 4,50<p>&euro;</p></option>
                                        <option value='6'>Εισιτήριο 5 ημερών - 9<p>&euro;</p></option>
                            </select>
                        </div>
                        <div id="airport" class="custom-select" style="width:420px; position: absolute; display: none;">
                            <select name="airport">
                                        <option value='0' selected>Επιλέξτε</option>
                                        <option value='1'>Εισιτήριο Λεωφορείου Express για Αεροδρόμιο - 6<p>&euro;</p></option>
                                        <option value='2'>Εισιτήριο Metro για Αεροδρόμιο - 10<p>&euro;</p></option>
                                        <option value='3'>Εισιτήριο Metro μετ΄επιστροφής για Αεροδρόμιο - 18<p>&euro;</p></option>
                                        <option value='4'>Τουριστικό εισιτήριο 3 ημερών - 22<p>&euro;</p></option>
                            </select>
                        </div>
                    </div>
                    <br><br><br>
                    <label><b>Ποσότητα εισιτηρίων</b></label> 
                    <input placeholder="Εισάγετε την ποσότητα" type="number" name="number"  min='1' required>
                    <label><b>Email αποστολής εισιτηρίων</b></label>
                        <?php
                            echo $email;
                        ?>
                    <ul>
                        <?php
                            echo $tickets;
                        ?>
                    </ul>
                    <br><br><br>
                    <div>
                        <button type="button" class="cancelbtn" onClick="goBack()" >Πίσω</button>
                        <button type="submit" class="submit" id="addButton" >Προσθήκη</button>
                        <?php echo $payButton?>
                    </div>
                </div>
                <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1>Είστε σίγουροι;<h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancelbtn" onclick='closeModal()' >Πίσω</button>
                        <a style="text-decoration: none;" href="successfulBuyTicket.php"><button type="button" class="submit">Επιβεβαίωση</button></a>
                    </div>
                </div>

                </div>
            </form>
            <script>
                var closebtns = document.getElementsByClassName("close");
                var i;
                for (i = 0; i < closebtns.length; i++) {
                value=closebtns[i].id;
                closebtns[i].addEventListener("click", function() {
                    this.parentElement.style.display = 'none';
                    removeItem(value);
                    location.reload();
                });
                }
                var x, i, j, selElmnt, a, b, c;
                var hasDiscount=false;
                var needsAirport=false;
                x = document.getElementsByClassName("custom-select");
                for (i = 0; i < x.length; i++) {
                selElmnt = x[i].getElementsByTagName("select")[0];
                a = document.createElement("DIV");
                a.setAttribute("class", "select-selected");
                a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                x[i].appendChild(a);
                b = document.createElement("DIV");
                b.setAttribute("class", "select-items select-hide");
                for (j = 1; j < selElmnt.length; j++) {
                    c = document.createElement("DIV");
                    c.innerHTML = selElmnt.options[j].innerHTML;
                    c.addEventListener("click", function(e) {
                        var y, i, k, s, h;
                        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                        h = this.parentNode.previousSibling;
                        for (i = 0; i < s.length; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                        }
                        h.click();
                    });
                    b.appendChild(c);
                }
                x[i].appendChild(b);
                a.addEventListener("click", function(e) {
                    e.stopPropagation();
                    closeAllSelect(this);
                    this.nextSibling.classList.toggle("select-hide");
                    this.classList.toggle("select-arrow-active");
                    });
                }
                function closeAllSelect(elmnt) {
                var x, y, i, arrNo = [];
                x = document.getElementsByClassName("select-items");
                y = document.getElementsByClassName("select-selected");
                for (i = 0; i < y.length; i++) {
                    if (elmnt == y[i]) {
                    arrNo.push(i)
                    } else {
                    y[i].classList.remove("select-arrow-active");
                    }
                }
                for (i = 0; i < x.length; i++) {
                    if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                    }
                }
                }
                document.addEventListener("click", closeAllSelect);
                function changeTypeStatus() {
                    var x = document.getElementById("notairport");
                    if (x.style.display === "none") {
                        if(hasDiscount === false && needsAirport == false){
                            x.style.display = "block";
                        }
                    } else {
                        x.style.display = "none";
                    }
                    var x = document.getElementById("airport");
                    if (x.style.display === "none") {
                        if(hasDiscount === false && needsAirport == true){
                            x.style.display = "block";
                        }
                    } else {
                        x.style.display = "none";
                    }
                }
                function removeItem(pos){
                    dataString = 'remove=' + pos;
                    $.ajax({
                        type: "GET",
                        url: "loadTicket.php",
                        data: dataString,
                        cache: false
                        });
                }
                function changeAirportStatus(){
                    if(needsAirport === false){
                        needsAirport=true;
                    }
                    else{
                        needsAirport=false;
                    }
                    changeTypeStatus();
                }
                function showModal(){
                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";
                }
                function closeModal(){

                    var modal = document.getElementById("myModal");
                    modal.style.display = "none";
                }
                function goBack(){
                    var pos = <?php echo $_SESSION['goBack'];?>;
                    history.go(pos);
                }
        </script>
    </body>
</html>