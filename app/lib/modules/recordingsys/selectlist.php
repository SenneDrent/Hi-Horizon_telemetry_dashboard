<div class="container-fluid">
  <table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">date</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
          <?php
                  $i = 1;
                  foreach ($result as $table) {
                      $date = $tableDates[$i - 1]["time"];
                      echo '<tr>';
                      echo '<th scope="row">'. $i .'</th>';
                      echo '<td class="col-md-6"><a href="?page=recordingmenu&recording='. $table .'">'. $table .'</a></td>';
                      echo '<td class="col-md-6">'. date("d-m-y H:i", $date) . '</td>';
                      echo '<td>';
                      echo '<form id="'.$table.'DeleteButton" action="index.php" method="GET">';
                      echo "<input type='submit' class='btn btn-light form-control' name='task' value='delete' onClick='return confirmDelete()'></input>";
                      echo '<input type="hidden" name="name" value="'. $table .'"></input>';
                      echo '<input type="hidden" name="page" value="recordingsredirect"></input>';
                      echo '</form>';
                      echo '</td>';
                      echo '</a></tr>';
                      $i++;
                  }
          ?>
    </tbody>
  </table>
</div>