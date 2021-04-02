<?php
    session_start();
    json_encode($_GET);
    if(!isset($_SESSION['isLoggedIn'])){
        $_SESSION['isLoggedIn']=FALSE;
    }
    if(isset($_SESSION['Pages'])){
        unset($_SESSION['Pages']);
    }
    if(isset($_SESSION['tickets'])){
        unset($_SESSION['tickets']);
    }
    if(isset($_SESSION['signInErrorMessage'])){
        $signInErrorMessage=$_SESSION['signInErrorMessage'];
        unset($_SESSION['signInErrorMessage']);
    }
    if(isset($_SESSION['LoadErrorMessage'])){
        unset($_SESSION['LoadErrorMessage']);
    }
    require_once 'loginDatabase.php';
    $conn = new \MySQLi($hn,$un,$pw,$db);
    if($conn->connect_error) die($conn->connect_error);
    $query = "SELECT * FROM buslines";
    $result = $conn->query($query);
    $buslines = [];
    while($row = mysqli_fetch_array($result))
    {
        $buslines[] = $row;
    }
    $query = "SELECT * FROM stationline";
    $result = $conn->query($query);
    $stationline = [];
    while($row = mysqli_fetch_array($result))
    {
        $stationline[] = $row;
    }
    
    $query = "SELECT * FROM linesregion";
    $result = $conn->query($query);
    $linesregion = [];
    while($row = mysqli_fetch_array($result))
    {
        $linesregion[] = $row;
    }

    $query = "SELECT * FROM stations";
    $result = $conn->query($query);
    $stations = [];
    while($row = mysqli_fetch_array($result))
    {
        $stations[] = $row;
    }
    $query = "SELECT * FROM regions";
    $result = $conn->query($query);
    $regions = [];
    while($row = mysqli_fetch_array($result))
    {
        $regions[] = $row;
    }
    $text="";
    $list1="";
    $list2="";
    $list2 .="<option value=λεωφορείο>";
    $list2 .="<option value=τρόλλευ>";
    $count=count($stations);
    $list3="";
    usort($stations,"cmp");
    for ($j = 0; $j < $count; $j++){
        $list3 .="<option value='";
        $list3 .=$stations[$j][1];
        $list3 .="'>";
    }
    $count=count($regions);
    $list4="";
    usort($regions,"cmp");
    for ($j = 0; $j < $count; $j++){
        $list4 .="<option value='";
        $list4 .=$regions[$j][1];
        $list4 .="'>";
    }
    usort($buslines,"cmp");
    $count=count($buslines);
    if(!isset($_SESSION['Pages'])){
        $_SESSION['Pages']=$count/3.0;
        $_SESSION['curPage']=0;
    }
    if(isset($_GET['page'])){
        $_SESSION['curPage']=$_GET['page']-1;
    }
    $searchName = FALSE;
    $searchType = FALSE;
    $searchStation = FALSE;
    $searchRegion = FALSE;
    $hidden=array();
    $selectList1='<input autocomplete="off" list="list1" type="text" id="myInput" onkeyup="searchName()" placeholder="Γραμμή" title="Type in a name">';
    $selectList2='<input autocomplete="off" list="list2" type="text" id="myInput2" onkeyup="searchType()" placeholder="Είδος" title="Type in a name">';
    $selectList3='<input autocomplete="off" list="list3" type="text" id="myInput3" onkeyup="searchStation()" placeholder="Στάση" title="Type in a name">';
    $selectList4='<input autocomplete="off" list="list4" type="text" id="myInput4" onkeyup="searchRegion()" placeholder="Περιοχή" title="Type in a name">';
    if(isset($_GET['search'])){
        if($_GET['search'] === 'yes'){
            if($_GET['searchtype'] === 'name'){
                $element=urldecode($_GET['searchvalue']);
                $selectList1 ='<input autocomplete="off" list="list1" type="text" id="myInput" onkeyup="searchName()" placeholder="Γραμμή" title="Type in a name" value="';
                $selectList1.=$element;
                $selectList1 .= '">';
                $searchName = TRUE;
            }
            if($_GET['searchtype'] === 'type'){
                $searchType = TRUE;
                $element=urldecode($_GET['searchvalue']);
                $selectList2 ='<input autocomplete="off" list="list2" type="text" id="myInput2" onkeyup="searchType()" placeholder="Είδος" title="Type in a name" value="';
                $selectList2.=$element;
                $selectList2 .= '">';
            }
            if($_GET['searchtype'] === 'station'){
                $searchStation = TRUE;
                $element=urldecode($_GET['searchvalue']);
                $selectList3 ='<input autocomplete="off" list="list3" type="text" id="myInput3" onkeyup="searchStation()" placeholder="Στάση" title="Type in a name" value="';
                $selectList3.=$element;
                $selectList3 .= '">';
            }
            if($_GET['searchtype'] === 'region'){
                $searchRegion = TRUE;
                $element=urldecode($_GET['searchvalue']);
                $selectList4 ='<input autocomplete="off" list="list4" type="text" id="myInput4" onkeyup="searchRegion()" placeholder="Περιοχή" title="Type in a name" value="';
                $selectList4.=$element;
                $selectList4 .= '">';
            }
        }
        unset($_SESSION['search']);
        for ($j = 0; $j < $count; $j++){
            array_push($hidden, TRUE);
        }
     }
     else{
        for ($j = 0; $j < $count; $j++){
            array_push($hidden, FALSE);
        }
     }
     $countPage=0;
     $itemsCounter=0;
     $hiddenCount=0;

    for ($j = 0; $j < $count; $j++){
        $count2=count($stationline);
        for ($i = 0; $i < $count2; $i++){
            
            if($buslines[$j][0] === $stationline[$i][2]){
                $query = "SELECT name FROM stations WHERE id=";
                $query .= $stationline[$i][1];
                $result = $conn->query($query);
                $name = [];
                while($row = mysqli_fetch_array($result))
                {
                    $name[] = $row;
                }
                if($searchStation === TRUE){
                    if(urldecode($_GET['searchvalue']) === $name[0][0]){
                        $hidden[$j] = FALSE;
                    }
                }
            }
        }
        $count2=count($linesregion);
        for ($i = 0; $i < $count2; $i++){
            if($buslines[$j][0] === $linesregion[$i][1]){
                $query = "SELECT name FROM regions WHERE id=";
                $query .= $linesregion[$i][2];
                $result = $conn->query($query);
                $name = [];
                while($row = mysqli_fetch_array($result))
                {
                    $name[] = $row;
                }
                if($searchRegion === TRUE){
                    if(urldecode($_GET['searchvalue']) === $name[0][0]){
                        $hidden[$j] = FALSE;
                    }
                }
            }
        }
        if($searchName === TRUE){
            if(urldecode($_GET['searchvalue']) === $buslines[$j][1]){
                $hidden[$j] = FALSE;
            }
        }
        if($searchType === TRUE){
            $w=$buslines[$j][1];
            $w=urldecode($_GET['searchvalue']);
            $w=$buslines[$j][2];
            if(urldecode($_GET['searchvalue']) === $buslines[$j][2]){
                $hidden[$j] = FALSE;
            }
        }
        if($hidden[$j] === TRUE && $j<3*$_SESSION['curPage']){
            $hiddenCount=$hiddenCount+1;
        }
    }

    $stationsToPrint=array(array());

    for ($j = 3*$_SESSION['curPage']+$hiddenCount; $j < $count; $j++){
        $stationToPrint=array();
        $list1 .="<option value='";
        $list1 .=$buslines[$j][1];
        $list1 .="'>";
        $a=1*$_SESSION['curPage'];
            if($hidden[$j] === TRUE){
                $text .= "<tr style=display:none;><td>";
            }
            else{
                $w=$buslines[$j][1];
                $a=((3*($_SESSION['curPage']+1)) - (3*$_SESSION['curPage']));
                if($itemsCounter < $a){
                    $text .= "<tr><td>";
                    $itemsCounter=$itemsCounter+1;
                }
                else{
                    $text .= "<tr style=display:none;><td>";
                }
                $countPage=$countPage+1;
            }
        $text .= $buslines[$j][1];
        $text .= "</td><td>";
        $text .= $buslines[$j][2];
        $text .= "</td><td>";
        if($buslines[$j][3] === "1"){
            $text .= "Ναι";
        }
        else{
            $text .= "Όχι";
        }
        $text .= "</td><td style=display:none;>";
        $count2=count($stationline);
        for ($i = 0; $i < $count2; $i++){
            if($buslines[$j][0] === $stationline[$i][2]){
                $query = "SELECT name FROM stations WHERE id=";
                $query .= $stationline[$i][1];
                $result = $conn->query($query);
                $name = [];
                while($row = mysqli_fetch_array($result))
                {
                    $name[] = $row;
                }
                array_push($stationToPrint,$name[0][0]);
                $text .= $name[0][0];
                $text .= ",";
            }
        }
        echo "<script>console.log('Debug Objects: " . $stationToPrint[1] . "' );</script>";
        $stationsToPrint[$j]=array();
        $stationsToPrint[$j]=$stationToPrint;

        $text .= "</td><td style=display:none;>";
        $count2=count($linesregion);
        for ($i = 0; $i < $count2; $i++){
            if($buslines[$j][0] === $linesregion[$i][1]){
                $query = "SELECT name FROM regions WHERE id=";
                $query .= $linesregion[$i][2];
                $result = $conn->query($query);
                $name = [];
                while($row = mysqli_fetch_array($result))
                {
                    $name[] = $row;
                }
                $msg=$name[0][0];
                $text .= $name[0][0];
                $text .= ",";
            }
        }
        $text .= "</td><td><button class='submit' value='$j' onclick='showModal(this.value)'>Εμφάνισε στάσεις</button>";
        $text .= "</td></tr>";
        if(isset($_GET['search'])){
            $hidden[$j] = TRUE;
         }
         else{
            $hidden[$j] = FALSE;
         }
    }

    for ($j = 3*$_SESSION['curPage']-1+$hiddenCount; $j >= 0; $j--){
                $stationToPrint=array();
                $list1 .="<option value='";
                $list1 .=$buslines[$j][1];
                $list1 .="'>";
                $a=1*$_SESSION['curPage'];
                if($hidden[$j] === TRUE){
                    $text .= "<tr style=display:none;><td>";
                }
                else{
                    $w=$buslines[$j][1];
                    $a=((3*($_SESSION['curPage']+1)) - (3*$_SESSION['curPage']));
                    $text .= "<tr style=display:none;><td>";
                    $countPage=$countPage+1;
                }
                $text .= $buslines[$j][1];
                $text .= "</td><td>";
                $text .= $buslines[$j][2];
                $text .= "</td><td>";
                if($buslines[$j][3] === "1"){
                    $text .= "Ναι";
                }
                else{
                    $text .= "Όχι";
                }
                $text .= "</td><td style=display:none;>";
                $count2=count($stationline);
                for ($i = 0; $i < $count2; $i++){
                    if($buslines[$j][0] === $stationline[$i][2]){
                        $query = "SELECT name FROM stations WHERE id=";
                        $query .= $stationline[$i][1];
                        $result = $conn->query($query);
                        $name = [];
                        while($row = mysqli_fetch_array($result))
                        {
                            $name[] = $row;
                        }
                        array_push($stationToPrint,$name[0][0]);
                        $text .= $name[0][0];
                        $text .= ",";
                    }
                }
                $stationsToPrint[$j]=array();
                $stationsToPrint[$j]=$stationToPrint;
        
                $text .= "</td><td style=display:none;>";
                $count2=count($linesregion);
                for ($i = 0; $i < $count2; $i++){
                    if($buslines[$j][0] === $linesregion[$i][1]){
                        $query = "SELECT name FROM regions WHERE id=";
                        $query .= $linesregion[$i][2];
                        $result = $conn->query($query);
                        $name = [];
                        while($row = mysqli_fetch_array($result))
                        {
                            $name[] = $row;
                        }
                        $msg=$name[0][0];
                        $text .= $name[0][0];
                        $text .= ",";
                    }
                }
                $text .= "</td></tr>";
                if(isset($_GET['search'])){
                    $hidden[$j] = TRUE;
                 }
                 else{
                    $hidden[$j] = FALSE;
                 }
            }

    $Pages=$countPage/3.0;
    $page='';
    $page = "<div class='pagination'>";
    for ($i = 0; $i < $Pages; $i++){
        if(isset($_GET['search'])){
            if($_SESSION['curPage'] === $i){
            $page .= "<a href='schedules.php?page=";
            $page .= $i+1;
            if($searchName === TRUE){
                $page .= "&search=yes&searchtype=name&searchvalue=";
            }
            else if($searchType === TRUE){
                $page .= "&search=yes&searchtype=type&searchvalue=";
            }
            else if($searchStation === TRUE){
                $page .= "&search=yes&searchtype=station&searchvalue=";
            }
            else{
                $page .= "&search=yes&searchtype=region&searchvalue=";
            }
            $page .= rawurlencode($_GET['searchvalue']);
            $page .= "'class='active'>";
            $page .= $i+1;
            $page .= "</a>";
        }
        else{
            $page .= "<a href='schedules.php?page=";
            $page .= $i+1;
            if($searchName === TRUE){
                $page .= "&search=yes&searchtype=name&searchvalue=";
            }
            else if($searchType === TRUE){
                $page .= "&search=yes&searchtype=type&searchvalue=";
            }
            else if($searchStation === TRUE){
                $page .= "&search=yes&searchtype=station&searchvalue=";
            }
            else{
                $page .= "&search=yes&searchtype=region&searchvalue=";
            }
            $page .= rawurlencode($_GET['searchvalue']);
            $page .= "'>";
            $page .= $i+1;
            $page .= "</a>";
        }
         }
         else{
            if($_SESSION['curPage'] === $i){
                $page .= "<a href='schedules.php?page=";
                $page .= $i+1;
                $page .= "'class='active'>";
                $page .= $i+1;
                $page .= "</a>";
            }
            else{
                $page .= "<a href='schedules.php?page=";
                $page .= $i+1;
                $page .= "'>";
                $page .= $i+1;
                $page .= "</a>";
            }
         }
    }
    $page .= "</div>";
    function cmp($a, $b)
    {
        if ($a[1] == $b[1]) {
            return 0;
        }
        return ($a[1] < $b[1]) ? -1 : 1;
    }  
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <title> ΟΑΣΑ-Αρχική Σελίδα </title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/schedules.css">
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
        <div style='text-align:center;'>
        <button id='filtersButton' class="button" onclick="openFilters()">Φίλτρα</button>
        <div id='filters'  style="display: none;">
        <?php echo $selectList1?>
        <datalist id="list1">
            <?php echo $list1?>
        </datalist>
        <?php echo $selectList2?>
        <datalist id="list2">
            <?php echo $list2?>
        </datalist>
        <?php echo $selectList3?>
        <datalist id="list3">
            <?php echo $list3?>
        </datalist>
        <?php echo $selectList4?>
        <datalist id="list4">
            <?php echo $list4?>
        </datalist>
        </div>
                </div>
        <table id="myTable">
            <tr class="header">
                <th style='width:30%'>Γραμμή</th>
                <th style='width:20%'>Είδος</th>
                <th style='width:20%'>24ωρη</th>
                <th style='width:20%'>Στάσεις</th>
            </tr>
            <?php echo $text?>
        </table>
        <div style='text-align:center;'>
        <div class="pagination">
            <?php echo $page?>
                </div>
        </div>
        <div id="myModal" class="modal">
                <div class="modal-content">
                    <div id="modalBody" class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancelbtn2" onclick='closeModal()' >Πίσω</button>
                    </div>
                </div>
                </div>
                <div style='text-align:center;'>
            <a href='index.php'><button type="button" class="cancelbtn">Αρχική Σελίδα</button></a>
            </div>

    </body>

    <script>
function searchName() {
  var input, filter, dataString;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  if(filter === ''){
    dataString = "schedules.php?";
  }
  else{
    dataString = "schedules.php?search=yes&searchtype=name&page=1&searchvalue="+encodeURIComponent(filter);
  }
  window.location.href = dataString;
}

function searchType() {
  var input, filter, dataString;
  input = document.getElementById("myInput2");
  filter = input.value;
  if(filter === ''){
    dataString = "schedules.php?";
  }
  else{
    dataString = "schedules.php?search=yes&searchtype=type&page=1&searchvalue="+encodeURIComponent(filter);
  }
  window.location.href = dataString;
}

function searchStation() {
  var input, filter, dataString;
  input = document.getElementById("myInput3");
  filter = input.value;
  if(filter === ''){
    dataString = "schedules.php?";
  }
  else{
    dataString = "schedules.php?search=yes&searchtype=station&page=1&searchvalue="+encodeURIComponent(filter);
  }
  window.location.href = dataString;
}

function searchRegion() {
  var input, filter, dataString;
  input = document.getElementById("myInput4");
  filter = input.value;
  if(filter === ''){
    dataString = "schedules.php?";
  }
  else{
    dataString = "schedules.php?search=yes&searchtype=region&page=1&searchvalue="+encodeURIComponent(filter);
  }
  window.location.href = dataString;
}
function showModal(pos){
                    var modal = document.getElementById("myModal");
                    var stations = <?php echo json_encode($stationsToPrint) ?>;
                    console.log(stations[pos]);
                    modal.style.display = "block";
                    text="<ul class='a'>";
                    for(var i=0;i<stations[pos].length;i++){
                        text=text.concat("<li>"+stations[pos][i]+"</li>");
                    }
                    text=text.concat("</ul>");
                    document.getElementById("modalBody").innerHTML=text;
                }
                function closeModal(){

                    var modal = document.getElementById("myModal");
                    modal.style.display = "none";
                }
    function openFilters(){
        var filters = document.getElementById("filters");
        if(filters.style.display === "none"){
            filters.style.display = "block";
        }
        else{
            filters.style.display = "none";
        }
    }

</script>
</html>