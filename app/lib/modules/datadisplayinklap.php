<!-- inklapdata -->
<div class="container features padding-top">
    <p>
      <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapseTemp" aria-expanded="false" aria-controls="collapseTemp">
        Temperaturen
      </button>
      <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapseMPPT" aria-expanded="false" aria-controls="collapseMPPT">
        MPPT's
      </button>
    </p>
    <div class="collapse padding-top border-bottom" id="collapseTemp">
        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-12">
                <h3 class="feature-title attribuut">TempMotor</h3>
                <h1 class="waarde" id = "tempMotor2"><?php DisplayStat('tm', 'boatVariables', 'time'); ?><small class="text-muted zij">ºC</small></h1> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12">
                <h3 class="feature-title attribuut">TempBattery</h3>
                <h1 class="waarde" id= "tempBattery2"><?php DisplayStat('tb', 'boatVariables', 'time'); ?><small class="text-muted zij">ºC</small></h1> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12">
                <h3 class="feature-title attribuut">Temp3</h3>
                <h1 class="waarde">n/a<small class="text-muted zij">ºC</small></h1> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12">
                <h3 class="feature-title attribuut">Temp4</h3>
                <h1 class="waarde">n/a<small class="text-muted zij">ºC</small></h1> 
            </div>
        </div>
    </div>
    <div class="container">
        <div class="collapse padding-top border-bottom" id="collapseMPPT">
            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h3 class="feature-title attribuut">MPPT1</h3>
                    <h1 class="waarde" id = "mppt1"><?php DisplayStat('pz', 'boatVariables', 'time'); ?><small class="text-muted zij">W</small></h1> 
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h3 class="feature-title attribuut">MPPT2</h3>
                    <h1 class="waarde">n/a<small class="text-muted zij">W</small></h1> 
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h3 class="feature-title attribuut">MPPT3</h3>
                    <h1 class="waarde">n/a<small class="text-muted zij">W</small></h1> 
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h3 class="feature-title attribuut">MMPT4</h3>
                    <h1 class="waarde">n/a<small class="text-muted zij">W</small></h1> 
                </div>
            </div>
        </div>
    </div>
</div>