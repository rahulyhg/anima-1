<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 news Image Details
			</header>
			
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editnewsimagesubmit');?>" enctype= "multipart/form-data">
				
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">news</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="news" value="<?php echo set_value('news',$before->news);?>">
					
				  </div>
				</div>
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">newsimage</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="newsimageid" value="<?php echo set_value('newsimageid',$before->id);?>">
					
				  </div>
				</div>
				
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="normal-field">Title</label>
                    <div class="col-sm-4">
                        <input type="text" id="normal-field" class="form-control" name="title" value='<?php echo set_value(' title ',$before->name);?>'>
                   </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="normal-field">Order</label>
                    <div class="col-sm-4">
                        <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ',$before->order);?>'>
                   </div>
                </div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
					<?php if($before->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
						<?php }
					?>
				  </div>
				</div>
				
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>
