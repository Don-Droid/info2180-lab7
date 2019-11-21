<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'Don@#201$';
$dbname = 'world';
$input = $_GET['country'];


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$input%';");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<table align="center" border="1px" style= "width:600px; line-height:40px;">
    <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence Year</th>
        <th>Head of State</th>
    </tr>
<?php foreach ($results as $row): ?>
    <tr>
  <td><?= $row['name']; ?></td>
  <td><?= $row['continent']; ?></td>
  <td><?= $row['independence_year']; ?></td>
  <td><?= $row['head_of_state']; ?></td>
  </tr>
<?php endforeach; ?>
</table>

