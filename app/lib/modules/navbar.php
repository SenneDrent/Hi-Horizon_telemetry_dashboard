<div class="container-fluid">
  <div class="row sticky-top">
    <div class="col-lg-6 col-md-6 col-sm-12">
      <nav class="navbar navbar-dark pl-0" style="background-color: #191414;">

        <a class="navbar-brand" href="#">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon border-0" style="outline: none;"></span>
          </button>
          <?php echo ucfirst($page)?>
        </a>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item <?php if ($page == 'dashboard'){ echo 'active';}?>">
              <a class="nav-link" href="?page=dashboard">Dashboard <?php if ($page == 'dashboard'){ echo "<span class='sr-only'>(current)</span>";}?></a>
            </li>
            <li class="nav-item <?php if ($page == 'recordingmenu'){ echo 'active';}?>">
              <a class="nav-link" href="?page=recordingmenu">Recordings <?php if ($page == 'recordingmenu'){ echo "<span class='sr-only'>(current)</span>";}?></a>
            </li>
            <li class="nav-item <?php if ($page == 'settings'){ echo 'active';}?>">
              <a class="nav-link" href="?page=settings">settings <?php if ($page == 'settings'){ echo "<span class='sr-only'>(current)</span>";}?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="app/database/phpliteadmin.php">Database</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=logout">Logout</a>
            </li>
            <span class="border-bottom border-light"></span>
          </ul> 
        </div>
        
      </nav>    
    </div> 
  </div>
</div>


