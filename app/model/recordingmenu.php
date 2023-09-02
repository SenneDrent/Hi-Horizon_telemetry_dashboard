<?php 
$sql = "SELECT name FROM rdb.sqlite_master WHERE type ='table' AND name NOT LIKE 'sqlite_%' ";
$statement = $db->query($sql);
$result = [];
if($statement){
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
      array_push($result, $row['name']);
    }
}
$db->beginTransaction();
$tableDates= [];
foreach($result as $tableName) {
  $sql = "SELECT time FROM rdb.". $tableName ." WHERE time = (SELECT MIN(time) FROM ". $tableName .") ";
  $statement = $db->query($sql);
  array_push($tableDates, $statement->fetch(PDO::FETCH_ASSOC));
}
$db->commit();
?>