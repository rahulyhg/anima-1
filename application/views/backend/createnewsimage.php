<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewnewsimage?id=').$newsid; ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 news Image Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createnewsimagesubmit');?>" enctype= "multipart/form-data">
			  
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="normal-field">Title</label>
                    <div class="col-sm-4">
                        <input type="text" id="normal-field" class="form-control" name="title" value='<?php echo set_value(' title ');?>'>
                   </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="normal-field">Order</label>
                    <div class="col-sm-4">
                        <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ');?>'>
                   </div>
                </div>
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">news</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="news" value="<?php echo set_value('news',$newsid);?>">
					
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control"  name="image" value="<?php echo set_value('image');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewnewsimage'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>

