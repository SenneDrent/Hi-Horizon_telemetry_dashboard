<?php include $dirPathLib['LIB_PATH'] . 'modules/navbar.php'?>

<script type="text/javascript" src="app/lib/js/functions.js"></script>

<div class= "container fluid">
<h3>data types</h3>



<div>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">unit</th>
            <th scope="col">abbreviation</th>
            <th scope="col">default value</th>
            <th scope="col">value type</th>
            <th scope="col">display</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <?php
            if ($dataTypes) {
                for ($array = 0; $array < count($dataTypes); $array++) {
                    echo "<tr>";
                        echo "<td class='col-md-2'>". $dataTypes[$array]["name"] ."</td>";
                        echo "<td class='col-md-1'>". $dataTypes[$array]["unit"] ."</td>";
                        echo "<td class='col-md-2'>". $dataTypes[$array]["abbreviation"] ."</td>";
                        echo "<td class='col-md-2'>". $dataTypes[$array]["value"] ."</td>";
                        echo "<td class='col-md-2'>". $dataTypes[$array]["valueType"] ."</td>";
                        if ($dataTypes[$array]["display"] == 1) {
                            echo "<td class='col-md-2'>True</td>";
                        }
                        if ($dataTypes[$array]["display"] == 0) {
                            echo "<td class='col-md-2'>False</td>";
                        }
                        echo "<td>";
                            echo "<form id='".$dataTypes[$array]["name"]."DeleteButton' action='index.php' method='GET'>";
                            echo "<input type='submit' class='btn btn-light form-control' name='task' value='delete' onClick='return confirmDelete()'></input>";
                            echo "<input type='hidden' name='name' value='".$dataTypes[$array]["name"]."'></input>";
                            echo "<input type='hidden' name='abbreviation' value='".$dataTypes[$array]["abbreviation"]."'></input>";
                            echo "<input type='hidden' name='page' value='settingsredirect'></input>";
                            echo "</form>";
                        echo "</td>";
                    echo "</tr>";
                }
            }
            else
            {
                echo "no datatypes have been added yet";
            }
            ?>
            <tr id="addRow" hidden="true">
                
                <form id="newDatatypeForm" action="index.php" method="GET">
                    <td id="nameInputTd"><input type="text" id="name" class="form-control" name="name" placeholder="name"></input></td>
                    <td id="unitInputTd"><input type="text" id="unit" class="form-control" name="unit" placeholder="unit"></input></td>
                    <td id="abbreviationInputTd"><input type="text" id="abbreviation" class="form-control" name="abbreviation" placeholder="abbreviation"></input></td>
                    <td id="valueInputTd"><input type="text" id="value" name="value" class="form-control" placeholder="default value"></input></td>
                    <td id="valueTypeInputTd">
                        <select type="text" id="valueType" name="valueType" class="form-control">
                            <option value="INTEGER">INTEGER</option>
                            <option value="REAL">REAL</option>
                            <option value="TEXT">TEXT</option>
                            <option value="BLOB">BLOB</option>
                            <option value="NUMERIC">NUMERIC</option>
                            <option value="BOOLEAN">BOOLEAN</option>
                            <option value="DATETIME">DATETIME</option>
                        </select>
                    </td>
                    <td id="displayInputTd"><input type="text" id="display" name="display" class="form-control" placeholder="display (0/1)"></input></td>
                    <td id="cancelbuttonTd"><input type="submit" class="form-control btn btn-light" value="Save"></input></td>

                    <input type="hidden" name='task' value='add'></input>
                    <input type="hidden" name='page' value='settingsredirect'></input>
                </form> 
            </tr>
            <tr><tr>
        </tbody>

        
    </table>

    <button id="addDataTypeButton" class="btn btn-light" onclick="revealObject('addRow', 'addDataTypeButton', 'cancel', 'add')">add</button>
</div>




</div>