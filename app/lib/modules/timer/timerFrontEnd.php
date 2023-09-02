<div class="collapse show" id="timer" data-parent="#tijd">
    <div class="row">
        <form id='timeSetForm' onsubmit="return ajaxgo()" class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-row form-inline px-0 py-0">
                <div class="col form-inline">
                    <input type="text" id ='timeSetH' class="form-control mb-1 col-md-4" placeholder="hour" name ='timeSetH'>
                    <input type="text" id ='timeSetM' class="form-control mb-1 col-md-4" placeholder="min" name ='timeSetM'>
                    <input type="text" id ='timeSetS' class="form-control mb-1 col-md-4" placeholder="sec" name ='timeSetS'>
                    <input type="submit" value="Enter" class="btn btn-light btn-block"></input>
                </div>
            </div> 
        </form>
        <!-- start button -->
        <form id = 'timeStart' onsubmit="return ajaxgetit('hasStarted')" class="col-lg-3 col-md-3 col-sm-12">
            <div class="">
                <input type="hidden" name="hasStarted" value="true" id="hasStarted" />
                <button type="submit" id = "timeFlow" value ="Start" class="btn btn-light btn-block">Start</input>
            </div>
        </form>
        <!-- reset button -->
        <form id = 'timeStop' onsubmit="return ajaxgetit('hasStopped')" class="col-lg-3 col-md-3 col-sm-12">
            <div class="">
                <input type="hidden" name="hasStopped" value="false" id="hasStopped"/>
                <button type="submit" id = "timeFlow" value ="Stop" class="btn btn-light btn-block">Reset</input>
            </div> 
        </form>
    </div>
    <!-- timerbar -->
    <div class="sticky-top">
        <p id= 'timeText' class="text-center my-0"></p>
        <div class="progress" style="height: calc(2.25rem + 2px);">
            <div class="progress-bar bg-danger" id='timeBar' role="progressbar"></div>
        </div>
    </div>
</div>