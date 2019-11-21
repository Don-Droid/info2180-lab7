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

<?php if ($_GET['context'] == "country"):?>

    <table id="table" align="center" border="1px" style= "width:600px; line-height:40px;">
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
<?php elseif($_GET['context'] == "cities"):?>
<?php   $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$input%'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
    <table align="center" border="1px" style= "width:600px; line-height:40px;">
        <tr>
            <th>Name</th>
            <th>District</th>
            <th>Population</th>
        </tr>
    <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['district']; ?></td>
      <td><?= $row['population']; ?></td>
  </tr>
<?php endforeach; ?>  
<?php endif; ?>

