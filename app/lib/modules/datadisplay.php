<div id = 'dataToolbar' class="contrast p-2 mb-2 rounded">
    <div id = dataToolbarRow class="row">
        <!-- <div class="col-lg-2 col-md-2 col-sm-12">
            <button type= "button" class="btn btn-light" onclick="dashboardDisplay.resetGraphs()">reset graphs</button>
        </div> -->
        <div id= "recordButtonContainer" class= "col-lg-2 col-md-2 col-sm-12">
            <button id ="recordButton" type= "button" class="btn btn-light" onclick="startRecording('new')">record</button>
        </div>
        <form id ='saveForm' class='mb-0 col-lg-8 col-md-8 col-sm-12' onsubmit='return saveRecording()'>
            <input id ='saveNameTextBox' type= 'text' class="form-control mb-1 col-md-6" style='display: none'></input>
            <input id ='saveButton' type='submit' class="form-control mb-1 col-md-2 btn btn-light" value='save' style='display: none'></input>
            <button id ='deleteButton' type= 'button' class="form-control mb-1 col-md-2 btn btn-light" onclick='deleteRecording()'style='display: none'>delete</button>
        </form>
    </div>
</div>

<div class = "row no-gutters">
    <!-- data kolom 1 -->
    <div class="col-6">
        <div class="pl-3 pr-3 pt-1 mr-2 contrast rounded"> 
            <div class="mt-3">
                <div id = "dataColumn1"></div>
            </div>
        </div>
    </div>
    <!-- data kolom 2 -->
    <div class="col-6">
        <div class="pl-3 pr-3 pt-1 contrast rounded">
            <div class = "mt-3"></div>
                <div id = "dataColumn2"></div>

                
        </div>
    </div>
</div>

<div>
    <div id = "latencyTextBox">time since last post: </div>
</div>   

