<?php
    session_start();
    if(!isset($_SESSION['isLoggedIn'])){
        $_SESSION['isLoggedIn']=false;
    }
    if(isset($_SESSION['Pages'])){
        unset($_SESSION['Pages']);
    }
    if(isset($_SESSION['tickets'])){
        unset($_SESSION['tickets']);
    }
    if(isset($_SESSION['LoadErrorMessage'])){
        $signInErrorMessage=$_SESSION['LoadErrorMessage'];
        unset($_SESSION['LoadErrorMessage']);
    }
    require_once 'loginDatabase.php';
    $conn = new \MySQLi($hn,$un,$pw,$db);
    if($conn->connect_error) die($conn->connect_error);
    $lines1=$_SESSION['lines1'];
    $lines2=$_SESSION['lines2'];
    $stations1=$_SESSION['stations1'];
    $stations2=$_SESSION['stations2'];
    $text="";
    $query = "SELECT id FROM stations WHERE name='$stations1'";
    $result = $conn->query($query);
    $station1 = [];
    while($row = mysqli_fetch_array($result))
    {
        $station1[] = $row;
    }
    $query = "SELECT id FROM stations WHERE name='$stations2'";
    $result = $conn->query($query);
    $station2 = [];
    while($row = mysqli_fetch_array($result))
    {
        $station2[] = $row;
    }
    $query = "SELECT id FROM buslines WHERE name='$lines1'";
    echo "<script>console.log('Debug Objects: " . $lines1 . "' );</script>";
    $result = $conn->query($query);
    $line1 = [];
    while($row = mysqli_fetch_array($result))
    {
        $line1[] = $row;
    }
    $array=[];
    findpath($station1[0][0],$array,$station2,$conn,'NULL');
    if(count($line1)>0){
        $arrayrow = array($line1[0][0],$station1[0][0]);
    }
    else{
        $arrayrow = array(0,$station1[0][0]);
    }
    $array[]=$arrayrow;
    $array = array_reverse($array);

    $count=count($array);
    $count=$count-1;
    for ($x = 0; $x < $count; $x++){
        $j=$x+1;
        $line=$array[$j][0];
        $query = "SELECT name FROM buslines WHERE id='$line'";
        $result = $conn->query($query);
        $lines = [];
        while($row = mysqli_fetch_array($result))
        {
            $lines[] = $row;
        }
        $station=$array[$x][1];
        $query = "SELECT name FROM stations WHERE id='$station'";
        $result = $conn->query($query);
        $stations1 = [];
        while($row = mysqli_fetch_array($result))
        {
            $stations1[] = $row;
        }
        $station=$array[$x][1];
        $query = "SELECT arrive FROM stationline WHERE station_id='$station' AND line_id='$line'";
        $result = $conn->query($query);
        $arrive = [];
        while($row = mysqli_fetch_array($result))
        {
            $arrive[] = $row;
        }
        $j=$x+1;
        $station=$array[$j][1];
        $line=$array[$j][0];



        $query = "SELECT arrive FROM stationline WHERE station_id='$station' AND line_id='$line'";
        $result = $conn->query($query);
        $arrive2 = [];
        while($row = mysqli_fetch_array($result))
        {
            $arrive2[] = $row;
        }


        $query = "SELECT name FROM stations WHERE id='$station'";
        $result = $conn->query($query);
        $stations2 = [];
        while($row = mysqli_fetch_array($result))
        {
            $stations2[] = $row;
        }
        $text .= "<tr><td>";
        $text .= "Γραμμή: ";
        $text .= $lines[0][0];
        $text .= "  <br>Επιβίβαση: ";
        $text .= $stations1[0][0];
        $text .= "  <br>Άφιξη σε: ";
        $text .= $arrive[0][0];
        $text .= "'  <br>Αποβίβαση: ";
        $text .= $stations2[0][0];
        $text .= "  <br>Διάρκεια διαδρομής: ";
        $text .= $arrive2[0][0];
        $text .= "'</td></tr>";
    }



    function findpath($data,&$array,$station2,$conn,$line1) {
        $query = "SELECT * FROM stationline WHERE station_id='$data'";
        $result = $conn->query($query);
        $stationline = [];
        while($row = mysqli_fetch_array($result))
        {
            $stationline[] = $row;
        }
        $count=count($stationline);

        for ($x = 0; $x < $count; $x++) {
            $curline=$stationline[$x][2];
            if($curline === $line1){
                continue;
            }
            $query = "SELECT * FROM stationline WHERE line_id='$curline'";
            $result = $conn->query($query);
            $stationline2 = [];
            while($row = mysqli_fetch_array($result))
            {
                $stationline2[] = $row;
            }
            $count2=count($stationline2);
            for ($j = 0; $j < $count2; $j++){
                if($stationline2[$j][1] === $data){///////
                    continue;
                }
                if($stationline2[$j][1] === $station2[0][0]){
                    $arrayrow = array($curline,$stationline2[$j][1]);
                    $array[]=$arrayrow;
                    return 1;
                }
                $res=findpath($stationline2[$j][1],$array,$station2,$conn,$curline);
                if($res === 1){
                    $arrayrow = array($curline,$stationline2[$j][1]);
                    $array[]=$arrayrow;
                    return 1;
                }
            }
        }
        return 0;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> ΟΑΣΑ-Αρχική Σελίδα </title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/searchBarResult.css">
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
    </body>
    <table id="a">
        <?php echo $text?>
    </table>
    <div style='text-align:center;'>
        <a style='text-decoration: none;' href='index.php'><button type="button" class="cancelbtn">Αρχική Σελίδα</button></a>
    </div>
</html>