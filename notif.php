<?php
// Set the content type to application/json
header('Content-Type: application/json');

// Database connection parameters
$host = 'localhost'; // or 'localhost'
$db   = 'monitoring_die';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
  // Create a new PDO instance
  $pdo = new PDO($dsn, $user, $pass, $options);

  // Prepare and execute the SQL query
  $stmt = $pdo->query('
  SELECT 
        shift, mesin_dc, general_die, tanggal, unique_die,sum(total_shot) as total_shot
    FROM 
        unique_die_shots
    WHERE 
        total_shot > 0 
    GROUP BY 
        shift, mesin_dc, general_die, tanggal, unique_die
    ORDER BY 
        unique_die 
        ASC  
  ');

    //   $stmt = $pdo->query("
    // SELECT 
    //   uds.id, 
    //   uds.unique_die, 
    //   uds.total_shot,
    //   concat(uds.value_die,mnt.A1N) A1N,
    //   concat(uds.value_die,mnt.B1N) B1N,
    //   concat(uds.value_die,mnt.C1N) C1N,
    //   concat(uds.value_die,mnt.C2N) C2N,
    //   concat(uds.value_die,mnt.C3N) C3N, 
    //   concat(uds.value_die,mnt.C4N) C4N
    // FROM 
    //   unique_die_shots uds
    //   LEFT JOIN monitoringuniquedie mnt ON REPLACE(REPLACE(upper(mnt.nama_die),'UNIQUE DIE N','UDN'),'UDNH ','UDN1') = uds.unique_die
    // ");

  // Fetch all the data as an associative array
  $data = $stmt->fetchAll();

  // Return the data as a JSON response
  echo json_encode($data);
} catch (PDOException $e) {
  // Handle any database connection or query errors
  echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
