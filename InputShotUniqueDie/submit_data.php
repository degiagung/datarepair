<?php
$servername = "localhost"; // Change to your server name
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "monitoring_die";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$shift = $_POST['shift'];
$mesin_dc = $_POST['mesin_dc'];
$general_die = $_POST['general_die'];
$tanggal = $_POST['tanggal'];
$unique_die = $_POST['unique_die'];
$total_shot = $_POST['total_shot'];

// Array dari value_die yang ingin diinput
$die_values = ['A1N', 'B1N', 'C1N', 'C2N', 'C3N', 'C4N'];

$uniquedieselect  = "concat('UniqueDieN',REPLACE('$unique_die','NH','H'))";
$getdatauniquedie = "SELECT * FROM monitoringuniquedie WHERE upper(replace(nama_die,' ','')) =upper($uniquedieselect)";
$result = $conn->query($getdatauniquedie) ;
if ($result->num_rows > 0) {
  // Loop untuk memasukkan semua data value_die with parameters in table monitoringuniqdie
  while($row = $result->fetch_assoc()) {
    // Loop untuk memasukkan semua data value_die
    foreach ($die_values as $value_die) {
      if($row[$value_die] <= 10) $uniquedienew = 'UDN'.$row[$value_die] ; 
      if($row[$value_die] >= 11) $uniquedienew = 'UDNH'.$row[$value_die]-10 ; 
      // Insert data into the database
      $sql = "INSERT INTO unique_die_shots (shift, mesin_dc, general_die, tanggal, unique_die, value_die, total_shot)
                VALUES ('$shift', '$mesin_dc', '$general_die', '$tanggal', '$uniquedienew', '$value_die', $total_shot)";

      if ($conn->query($sql) === TRUE) {
        // Berhasil memasukkan data, lanjut ke iterasi berikutnya
        continue;
      } else {
        // Jika ada error, tampilkan pesan error dan hentikan proses
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        break;
      }
    } 
  }
  // Jika semua berhasil, tampilkan pesan sukses
  echo "<script>alert('Semua data berhasil disimpan!'); window.location.href = '../index.html';</script>";
}else{
  echo "<script>alert('Data '".$unique_die." Tidak ditemukan); window.location.href = '../index.html';</script>";
}

$conn->close();
