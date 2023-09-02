<?php
    $task = getPar('task');

    $name = getPar('name');
    $unit = getPar('unit');
    $abbreviation = getPar('abbreviation');
    $value = getPar('value');
    $display = getPar('display');
    $valueType = getPar('valueType');

    if ($task == 'add') {
        try {
            $sql = "INSERT INTO dataTypes(name, unit, abbreviation, value, valueType, display) VALUES('".$name."','".$unit."','".$abbreviation."','".$value."','".$valueType."',".$display.");";
            $db->query($sql);
            $sql = "ALTER TABLE boatVariables ADD COLUMN ". $abbreviation ." ".$valueType." DEFAULT ". $value ." NOT NULL;";
            $db->query($sql);
        }

        catch (Exception $e) {
            echo $e;
        }
    }
    if ($task == 'delete') {
        try {
            if ($name) {
                $newDataTypes = $dataTypes;
                unset($newDataTypes[array_search($abbreviation, array_column($newDataTypes, 'abbreviation'))]);

                $newDataTypeAbbreviationString = ",";
                $newDataTypeColumnAppendString = "";
                foreach ($newDataTypes as $newDataType) {
                    $newDataTypeAbbreviationString .= $newDataType["abbreviation"] .",";
                    $newDataTypeColumnAppendString .= $newDataType["abbreviation"]. " " . $newDataType['valueType'] ." DEFAULT 0, ";
                }
                $newDataTypeAbbreviationString = substr($newDataTypeAbbreviationString,0 ,-1);
                $newDataTypeColumnAppendString = substr($newDataTypeColumnAppendString,0 ,-1);
            }

            
            $db->beginTransaction();
            $sql = "DELETE FROM dataTypes WHERE name = '". $name. "'";
            $db->query($sql);

            $removeColumnsSql = [
                "CREATE TEMPORARY TABLE backup(
                    time DATETIME NOT NULL DEFAULT 0, "
                    . $newDataTypeColumnAppendString .
                    "PRIMARY KEY (time)
                );",
                "INSERT INTO backup SELECT time".$newDataTypeAbbreviationString." FROM boatVariables;",
                "DROP TABLE boatVariables;",
                "CREATE TABLE boatVariables(
                    time DATETIME NOT NULL DEFAULT 0, "
                    . $newDataTypeColumnAppendString .
                    "PRIMARY KEY (time)
                );",
                "INSERT INTO boatVariables SELECT time".$newDataTypeAbbreviationString." FROM backup;",
                "DROP TABLE backup;"
            ];
            foreach($removeColumnsSql as $sql) {
                $db->query($sql);
            }
            $db->commit();
        }

        catch (Exception $e) {
            echo $e;
        }
    }
    // if($e) header("location: index.php?page=settings&error=something went wrong");
    // else header("location: index.php?page=settings");
    header("location: index.php?page=settings");
    die();
?>