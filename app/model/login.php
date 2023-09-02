<?php
if(isset($_GET['error'])){
  if($_GET['error']=='legeVelden'){
    echo "<p class='midden'>please fill in username/</p>";
  } else if($_GET['error']=='foutLogin'){
    echo "<p class='midden'>Password not recognised</p>";
  }
}
