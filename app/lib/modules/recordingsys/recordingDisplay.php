<?php
    $sql = "SELECT * FROM rdb.". $tableName;
    $statement = $db->query($sql);

    $result = [];

    if($statement){
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        foreach ($row as $key => $value) {
            $result[$key] = [];
            array_push($result[$key], $value);
        }
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
          foreach ($row as $key => $value) {
            array_push($result[$key], $value);
           }
        }
    }
?>

<div class="container-fluid">
    <h1 class=><?php echo $tableName; ?></h1>

    <form method=get action="index.php">
        <input type="submit" value="back" />
        <input type="hidden" value="recordingmenu" name="page"/>
    </form>
</div>

<div id ="graphContainer" class="container">
</div>

<script type="text/javascript">
var result=<?php echo json_encode($result); ?>;
</script>

<script type="text/javascript" src="app/lib/js/graph.js"></script>
<script type="text/javascript" src="app/lib/js/statclass.js"></script>
<script type="text/javascript" src="app/lib/js/recordGraphInit.js"></script>