<?php
    session_start();
    if(isset($_SESSION['redirect'])){
        if($_SESSION['redirect']===true){
            unset($_SESSION['redirect']);
            header("Location: searchBarResult.php");
            exit();
        }
        unset($_SESSION['redirect']);
    }
    if(isset($_SESSION['tickets'])){
        unset($_SESSION['tickets']);
    }
    if(isset($_SESSION['Pages'])){
        unset($_SESSION['Pages']);
    }
    if(!isset($_SESSION['isLoggedIn'])){
        $_SESSION['isLoggedIn']=false;
    }
    if(isset($_SESSION['LoadErrorMessage'])){
        $signInErrorMessage=$_SESSION['LoadErrorMessage'];
        unset($_SESSION['LoadErrorMessage']);
    }
    if(isset($_SESSION['erStations1'])){
        if($_SESSION['erStations1']==true){
            $inStation1='<input type="text" style="border: 1px solid red;" name="stations1" id="stations1" autocomplete="off" list="Sstations" placeholder="Στάση" onchange="changeStartStation()"/>';
        }
        else{
            $inStation1='<input type="text" name="stations1" id="stations1" autocomplete="off" list="Sstations" placeholder="Στάση" onchange="changeStartStation()"/>';
        }
        unset($_SESSION['erStations1']);
    }
    else{
        $inStation1='<input type="text" name="stations1" id="stations1" autocomplete="off" list="Sstations" placeholder="Στάση" onchange="changeStartStation()"/>';
    }
    if(isset($_SESSION['erStations2'])){
        if($_SESSION['erStations2']==true){
            $inStation2='<input type="text" name="stations2" style="border: 1px solid red;" id="stations2" autocomplete="off" list="Estations" placeholder="Στάση" onchange="changeEndStation()"/>';
        }
        else{
            $inStation2='<input type="text" name="stations2" id="stations2" autocomplete="off" list="Estations" placeholder="Στάση" onchange="changeEndStation()"/>';
        }
        unset($_SESSION['erStations2']);
    }
    else{
        $inStation2='<input type="text" name="stations2" id="stations2" autocomplete="off" list="Estations" placeholder="Στάση" onchange="changeEndStation()"/>';
    }
    require_once 'loginDatabase.php';
    $conn = new \MySQLi($hn,$un,$pw,$db);
    if($conn->connect_error) die($conn->connect_error);
    $query = "SELECT id,name FROM buslines";
    $result = $conn->query($query);
    $buslines = [];
    while($row = mysqli_fetch_array($result))
    {
        $buslines[] = $row;
    }
    $query = "SELECT id,name FROM stations";
    $result = $conn->query($query);
    $stations = [];
    while($row = mysqli_fetch_array($result))
    {
        $stations[] = $row;
    }
    $query = "SELECT station_id,line_id FROM stationline";
    $result = $conn->query($query);
    $stationline = [];
    while($row = mysqli_fetch_array($result))
    {
        $stationline[] = $row;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['lines1'] = test_input($_POST["lines1"]);
        $_SESSION['lines2'] = test_input($_POST["lines2"]);
        $_SESSION['stations1'] = test_input($_POST["stations1"]);
        if($_SESSION['stations1'] ==''){
            $_SESSION['erStations1']=true;
        }
        else{
            $_SESSION['erStations1']=false;
        }
        $_SESSION['stations2'] = test_input($_POST["stations2"]);
        if($_SESSION['stations2'] ==''){
            $_SESSION['erStations2']=true;
        }
        else{
            $_SESSION['erStations2']=false;
        }
        if($_SESSION['erStations2']===true || $_SESSION['erStations1']===true){
            $_SESSION['redirect']=false;
        }
        else{
            $_SESSION['redirect']=true;
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
        <link rel="stylesheet" href="../css/searchBar.css">
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
        <h1 align='center' style=' font-size: 80px; font-family: Trebuchet; color: black;'><b>Εύρεση διαδρομής</b></h1>
        <p align='center' style=' font-size: 50px; font-family: Trebuchet; color: black;'><b>Πού θέλετε να πάτε;</b></p>
        <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div>
                <label for="text">Αφετηρία&nbsp;&nbsp; </label>
                <input type="text" name="lines1" autocomplete="off" id="lines1" list="Slines" placeholder="Γραμμή" onchange="changeStartBusline()"/>
                <datalist id="Slines" onchange>
                <?php 
                            foreach($buslines as $item){
                        ?>
                        <option value="<?php echo $item['name']; ?>"></option>
                        <?php
                            }
                        ?>
                </datalist>
                <?php echo $inStation1?>
                <datalist id="Sstations">
                <?php
                            foreach($stations as $item){
                        ?>
                        <option value="<?php echo $item['name']; ?>"></option>
                        <?php
                            }
                        ?>
                </datalist>
            </div>
            <div>
                <label for="text">Τερματικός</label>
                <input type="text" name="lines2" id="lines2" autocomplete="off" list="Elines" placeholder="Γραμμή" onchange="changeEndBusline()"/>
                <datalist id="Elines">
                    <?php 
                            foreach($buslines as $item){
                        ?>
                        <option value="<?php echo $item['name']; ?>"></option>
                        <?php
                            }
                        ?>
                </datalist>
                <?php echo $inStation2?>
                <datalist id="Estations">
                        <?php
                            foreach($stations as $item){
                        ?>
                        <option value="<?php echo $item['name']; ?>"></option>
                        <?php
                            }
                        ?>
                </datalist>
            </div>
            <button type="submit" class="submit" >Επιβεβαίωση</button>
       </form>
       <div class="footer">

        <p>Copyright &copy; OASA</p>
        </div>
    </body>
    <script>
function changeStartBusline(parameters) {
    var station = <?php echo json_encode($stations); ?>;
    var buslines = <?php echo json_encode($buslines); ?>;
    var stationline = <?php echo json_encode($stationline); ?>;
    var val = document.getElementById("lines1").value;
    var count = Object.keys(buslines).length;
    var i,j;
    var text="";
    var idStation;
    var idBusline=-1;
    for (i = 0; i < count; i++) {
        if(buslines[i][1] === val){
            idBusline = buslines[i][0];
            break;
        }
    }
    var count2 = Object.keys(station).length;
    count = Object.keys(stationline).length;
    for (i = 0; i < count; i++) {
        if(stationline[i][1] === idBusline){
            idStation = stationline[i][0];
            for(j = 0; j < count2 ; j++){
                if(station[j][0] === idStation){
                    text += "<option value='"+station[j][1]+"'></option>";
                    break;
                }
            }
        }
       if(idBusline === -1){
            idStation = stationline[i][0];
            for(j = 0; j < count2 ; j++){
                text += "<option value='"+station[j][1]+"'></option>";
            }
            break;
        }
    }
    $("#Sstations").html(text);
};


function changeStartStation(parameters) {
    var station = <?php echo json_encode($stations); ?>;
    var buslines = <?php echo json_encode($buslines); ?>;
    var stationline = <?php echo json_encode($stationline); ?>;
    var val = document.getElementById("stations1").value;
    var count = Object.keys(station).length;
    var i,j;
    var text="";
    var idStation=-1;
    var idBusline;
    for (i = 0; i < count; i++) {
        if(station[i][1] === val){
            idStation = station[i][0];
            break;
        }
    }
    var count2 = Object.keys(buslines).length;
    count = Object.keys(stationline).length;
    for (i = 0; i < count; i++) {
        if(stationline[i][0] === idStation){
            idBusline = stationline[i][1];
            for(j = 0; j < count2 ; j++){
                if(buslines[j][0] === idBusline){
                    text += "<option value='"+buslines[j][1]+"'></option>";
                    break;
                }
            }
        }
        if(idStation === -1){
            idBusline = stationline[i][1];
            for(j = 0; j < count2 ; j++){
                text += "<option value='"+buslines[j][1]+"'></option>";
            }
            break;
        }
    }
    $("#Slines").html(text);
};

function changeEndBusline(parameters) {
    var station = <?php echo json_encode($stations); ?>;
    var buslines = <?php echo json_encode($buslines); ?>;
    var stationline = <?php echo json_encode($stationline); ?>;
    var val = document.getElementById("lines2").value;
    var count = Object.keys(buslines).length;
    var i,j;
    var text="";
    var idStation;
    var idBusline=-1;
    for (i = 0; i < count; i++) {
        if(buslines[i][1] === val){
            idBusline = buslines[i][0];
            break;
        }
    }
    var count2 = Object.keys(station).length;
    count = Object.keys(stationline).length;
    for (i = 0; i < count; i++) {
        if(stationline[i][1] === idBusline){
            idStation = stationline[i][0];
            for(j = 0; j < count2 ; j++){
                if(station[j][0] === idStation){
                    text += "<option value='"+station[j][1]+"'></option>";
                    break;
                }
            }
        }
        if(idBusline === -1){
            idStation = stationline[i][0];
            for(j = 0; j < count2 ; j++){
                text += "<option value='"+station[j][1]+"'></option>";
            }
            break;
        }
    }
    $("#Estations").html(text);
};


function changeEndStation(parameters) {
    var station = <?php echo json_encode($stations); ?>;
    var buslines = <?php echo json_encode($buslines); ?>;
    var stationline = <?php echo json_encode($stationline); ?>;
    var val = document.getElementById("stations2").value;
    var count = Object.keys(station).length;
    var i,j;
    var text="";
    var idStation=-1;
    var idBusline;
    for (i = 0; i < count; i++) {
        if(station[i][1] === val){
            idStation = station[i][0];
            break;
        }
    }
    var count2 = Object.keys(buslines).length;
    count = Object.keys(stationline).length;
    for (i = 0; i < count; i++) {
        if(stationline[i][0] === idStation){
            idBusline = stationline[i][1];
            for(j = 0; j < count2 ; j++){
                if(buslines[j][0] === idBusline){
                    text += "<option value='"+buslines[j][1]+"'></option>";
                    break;
                }
            }
        }
        if(idStation === -1){
            idBusline = stationline[i][1];
            for(j = 0; j < count2 ; j++){
                text += "<option value='"+buslines[j][1]+"'></option>";
            }
        break;
        }
    }
    console.log(text);
    $("#Elines").html(text);


};
    </script>
</html>