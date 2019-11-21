<?php
$host = getenv('IP');
$username = 'dondroid';
$password = 'Don@#201$';
$dbname = 'world';
$input = $_GET['country'];


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$input%';");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>

