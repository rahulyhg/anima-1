<section class="panel">
    <header class="panel-heading">
        modelvideo Details
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editmodelvideosubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            
            <div class="form-group" style="display:none;">
                <label class="col-sm-2 control-label" for="normal-field">Model</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="modelid" value='<?php echo set_value(' modelid ',$before->model);?>'>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Video</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="video" value='<?php echo set_value(' video ',$before->video);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Order</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ',$before->order);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
<!--                    <a href='<?php echo site_url("site/viewpage"); ?>' class='btn btn-secondary'>Cancel</a>-->
                </div>
            </div>
        </form>
    </div>
</section>
