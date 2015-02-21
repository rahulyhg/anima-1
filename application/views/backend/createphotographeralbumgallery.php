<div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <div class="pull-right">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Creative Artist Sub-Category Album Details
            </header>
            <div class="panel-body">
                <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createphotographeralbumgallerysubmit");?>' enctype='multipart/form-data'>
                    <div class="panel-body">
                        <div class="form-group" style="display:none;">
                            <label class="col-sm-2 control-label" for="normal-field">photographeralbum</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="photographeralbumid" value='<?php echo $photographeralbumid;?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">title</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="title" value='<?php echo set_value(' title ');?>'>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Image</label>
                            <div class="col-sm-4">
                                <input type="file" id="normal-field" class="form-control" name="image" value='<?php echo set_value(' image ');?>'>
                            </div>
                        </div>
<!--
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Type</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="type" value='<?php echo set_value(' type ');?>'>
                            </div>
                        </div>
-->
                       
<!--
                    <div class=" form-group">
                      <label class="col-sm-2 control-label">Select type</label>
                      <div class="col-sm-4">
                        <?php 	 echo form_dropdown('type',$type,set_value('type'),'id="typeid" onchange="operatorcategories()" class="chzn-select form-control" 	data-placeholder="Choose a type..."');
                        ?>
                      </div>
                    </div>
-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Order</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ');?>'>
                            </div>
                        </div>
<!--
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Json</label>
                            <div class="col-sm-8">
                                <textarea name="json" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'json');?></textarea>
                            </div>
                        </div>
-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Save</button>
<!--                                <a href="<?php echo site_url(" site/viewpage "); ?>" class="btn btn-secondary">Cancel</a>-->
                            </div>
                        </div>
                </form>
                </div>
        </section>
        </div>
    </div>
