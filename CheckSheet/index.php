<?php
// Database connection
$servername = "localhost";
$username = "root";  // replace with your db username
$password = "";      // replace with your db password
$dbname = "monitoring_die";  // replace with your db name

session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from unique_die_shots where total_shot > 0
$sql = "SELECT 
            shift, mesin_dc, general_die, tanggal, unique_die,total_shot
        FROM 
            unique_die_shots
        WHERE 
            total_shot > 0
        ORDER BY 
            unique_die,
            value_die 
            ASC";
$result = $conn->query($sql);

// Initialize array to store total shots for each Unique Die
$unique_die_totals = array();

// HTML starts
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Sheet Total Unique Die</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
            
    .navbar {
      background: rgba(0, 0, 0, 0.8);
      border-bottom: 1px solid #444;
    }

    .navbar-brand,
    .nav-link {
      color: #f0f0f0 !important;
    }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px auto;
            max-width: 1200px;
        }
        .left-table, .right-table {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
        }
        .left-table {
            width: 70%;
        }
        .right-table {
            width: 25%;
            margin-left: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .summary-table th {
            background-color: #4CAF50;
            color: white;
        }
        .summary-table td {
            background-color: #f9f9f9;
            font-weight: bold;
        }
    </style>
</head>
<body>

  <!-- Navbar start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.html">Unique Die</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="../index.html">Home</a>
          </li>
          <li class="nav-item">
            <span id="badge" class="badge badge-pill badge-primary" style="background:red;float:right;margin-bottom:-11px;"></span>
            <a class="nav-link" href="../CheckSheet/index.php">Check Sheet</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar end -->

<div class="container">
    <!-- Main Check Sheet Table -->
    <div class="left-table">
        <h1>Check Sheet Total Unique Die</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Shift</th>
                    <th>Mesin DC</th>
                    <th>General Die</th>
                    <th>Tanggal</th>
                    <th>Unique Die N</th>
                    <th>Total Shot</th>
                </tr>
            </thead>
            <tbody>';

// Fetch data from database and output rows in table

$no = 1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <tr>
            <td>' . $no++ . '</td>
            <td>' . $row["shift"] . '</td>
            <td>' . $row["mesin_dc"] . '</td>
            <td>' . $row["general_die"] . '</td>
            <td>' . date("d/m/Y", strtotime($row["tanggal"])) . '</td>
            <td>' . $row["unique_die"] . '</td>
            <td>' . $row["total_shot"] . '</td>
        </tr>';

        // Calculate total shots per Unique Die
        if (isset($unique_die_totals[$row["unique_die"]])) {
            $unique_die_totals[$row["unique_die"]] += $row["total_shot"];
        } else {
            $unique_die_totals[$row["unique_die"]] = $row["total_shot"];
        }
    }
} else {
    echo '<tr><td colspan="7">No data available</td></tr>';
}

echo '
            </tbody>
        </table>
    </div>';

// Summary table for total shots
echo '
    <!-- Total Shot Summary Table -->
    <div class="right-table">
        <table class="summary-table">
            <thead>
                <tr>
                    <th>Value</th>
                    <th>Total Shot</th>
                </tr>
            </thead>
            <tbody>';

// Display total shots for each Unique Die only if total shots > 0
ksort($unique_die_totals); // Sort by Unique Die (UDN1, UDN2, etc.)
foreach ($unique_die_totals as $unique_die => $total_shot) {
    if ($total_shot > 0) { // Check if total shot is greater than 0
        echo '
        <tr>
            <td>Total Shot ' . $unique_die . '</td>
            <td id="totalshot'.$unique_die.$total_shot.'" >' . $total_shot . '</td>
        </tr>';
    }
}
echo '
            </tbody>
        </table>
    </div>
</div>

</body>
</html>';

$conn->close();
?>

<script>
    // sessionStorage.clear(); 
    async function notifcheck(p,t){
        let notifcheck = sessionStorage.getItem("notifcheck");
        if (notifcheck != null) {
            notifcheck = [notifcheck] ;
        }else{
            notifcheck = [] ;

        }
        notifcheck.push(p) ;
        
        sessionStorage.setItem("notifcheck",notifcheck+t);
        window.location.reload();
    }

    async function notifikasi() {
        
        try {
            
            var notifcheck  = sessionStorage.getItem("notifcheck");
            const response  = await fetch('../notif.php');
            const data      = await response.json();
            notif           = [] ;
            for(x in data){
                const uniquedie = data[x]['unique_die'];
                var tdshot      = document.getElementById('totalshot'+uniquedie+data[x]['total_shot']);
                if(notifcheck == null){
                    notifcheck = 'null';
                }
                if(data[x]['total_shot'] == 5000){ //5000
                    notif.push(uniquedie) ;
                    if(notifcheck.search(uniquedie+'5000') <= 0 ){
                        tdshot.setAttribute("style",`background-color:#fbff0d;`);
                        tdshot.setAttribute("onClick",`notifcheck('`+uniquedie+`',5000)`);
                    }
                }else if(data[x]['total_shot'] == 10000){ //10000
                    notif.push(uniquedie) ;

                    if(notifcheck.search(uniquedie+'10000') <= 0){
                        tdshot.setAttribute("style",`background-color:#87CEFA;`);
                        tdshot.setAttribute("onClick",`notifcheck('`+uniquedie+`',10000)`);
                    }
                }else if(data[x]['total_shot'] == 20000){ //20000
                    notif.push(uniquedie) ;
                    if(notifcheck.search(uniquedie+'20000') <= 0){
                        tdshot.setAttribute("style",`background-color:#FFC0CB;`);
                        tdshot.setAttribute("onClick",`notifcheck('`+uniquedie+`',20000)`);
                    }
                }else if(data[x]['total_shot'] == 40000){ //40000
                    notif.push(uniquedie) ;
                    if(notifcheck.search(uniquedie+'40000') <= 0){
                        tdshot.setAttribute("style",`background-color:#90EE90;`);
                        tdshot.setAttribute("onClick",`notifcheck('`+uniquedie+`',40000)`);
                    }
                }

                sessionStorage.setItem("notif",notif);

            }
        } catch (error) {
        }
    }

    //menjalankan notifikasi setiap 2 menit sekali
    window.setInterval(function(){
        notifikasi();
        window.location.reload();
    },20000);
    notifikasi()
    
    let totalnotif       = sessionStorage.getItem("notif") ? sessionStorage.getItem("notif").split(",") : []  ;
    let totalnotifcheck  = sessionStorage.getItem("notifcheck") ? sessionStorage.getItem("notifcheck").split(",") : [] ;
    let totalnotifall    = totalnotif.length - totalnotifcheck.length 
    // console.log(totalnotifcheck);
    if(totalnotifall >= 1){
        let badge = document.getElementById('badge');
        badge.textContent  = totalnotifall;
    }

</script>