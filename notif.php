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
        unique_die,sum(total_shot) as total_shot
    FROM 
        unique_die_shots
    WHERE 
        total_shot > 0 
    GROUP BY 
         unique_die
    ORDER BY 
        unique_die 
        ASC  
  ');
  // Fetch all the data as an associative array
  $data = $stmt->fetchAll();

  // Return the data as a JSON response
  echo json_encode($data);
} catch (PDOException $e) {
  // Handle any database connection or query errors
  echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
