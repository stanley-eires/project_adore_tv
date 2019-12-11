<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<ul class="nav nav-tabs nav-bordered mb-3">
					<?php if(isset($edit_profile)):?>
					<li class="nav-item">
		            	<a href="#edit" data-toggle="tab" aria-expanded="true" class="nav-link active">
							<?= get_phrase('edit_phrase');?>
                    	</a>
					</li>
		            <?php endif;?>
					<li class="nav-item">
						<a href="#list" data-toggle="tab" aria-expanded="false" class="nav-link <?php if(!isset($edit_profile))echo 'active';?>">
							<i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
							<span class="d-none d-lg-block"><?= get_phrase('language_list');?></span>
						</a>
					</li>
					<li class="nav-item">
						<a href="#add" data-toggle="tab" aria-expanded="true" class="nav-link">
							<i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
							<span class="d-none d-lg-block"><?= get_phrase('add_phrase');?></span>
						</a>
					</li>
					<li class="nav-item">
						<a href="#add_lang" data-toggle="tab" aria-expanded="false" class="nav-link">
							<i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
							<span class="d-none d-lg-block"><?= get_phrase('add_language');?></span>
						</a>
					</li>
				</ul>

				<div class="tab-content">
		            <!----PHRASE EDITING TAB STARTS-->
                    <div class="tab-pane active" id="edit" style="padding: 5px">
                        <div class="row">
                            <?php if(isset($edit_profile)):
	                        	$current_editing_language	=	$edit_profile;
	                        	$language_phrases	=	$this->db->query("SELECT `phrase_id` , `phrase` , `$current_editing_language` FROM `language`")->result_array();
                          		foreach ($language_phrases as $key => $row): ?>
		                          	<div class="col-md-3">
			                            <div class="card">
			                                <div class="card-header">
			                                    <?= $row['phrase'];?>
			                                </div>
			                                <div class="card-body">
			                                  <p>
			                                    <input type="text" class="form-control" name="phrase<?= $row['phrase_id'];?>" value="<?= $row[$current_editing_language]; ?>" onkeyup="enableUpdateButton(<?= $row['phrase_id']; ?>)" id = "phrase-<?= $row['phrase_id'];?>">
			                                  </p>
			                                  <button type="button" class="btn btn-icon btn-primary" style="float: right;" id = "button-<?= $row['phrase_id']; ?>" disabled onclick="updatePhrase(<?= $row['phrase_id'];?>)"> <i class = "mdi mdi-check-circle"></i> </button>
			                                </div> <!-- end card-body-->
			                            </div> <!-- end card-->
		                          	</div> <!-- end col-->
                       			<?php endforeach; ?>
	                      	<?php endif; ?>
                        </div>
                    </div>
                    <!----PHRASE EDITING TAB ENDS-->
		            <!----TABLE LISTING STARTS-->
		            <div class="tab-pane <?php if(!isset($edit_profile))echo 'show active';?>" id="list">

						<div class="table-responsive-sm">
			                <table class="table table-bordered table-centered mb-0">
			                	<thead>
			                    	<tr>
			                        	<th><?= get_phrase('language');?></th>
			                        	<th><?= get_phrase('option');?></th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                    	<?php
											$fields = $this->db->list_fields('language');
											foreach($fields as $field)
											{
												 if($field == 'phrase_id' || $field == 'phrase')continue;
												?>
			                    	<tr>
			                        	<td><?= ucwords($field);?></td>
			                        	<td>
			                            	<a href="<?= base_url();?>index.php?admin/manage_language/edit_phrase/<?= $field;?>"
			                                	 class="btn btn-info">
			                                		<?= get_phrase('edit_phrase');?>
			                                </a>
			                            	<a href="<?= base_url();?>index.php?admin/manage_language/delete_language/<?= $field;?>"
			                                	  class="btn btn-danger">
			                                		<?= get_phrase('delete_language');?>
			                                </a>
			                            </td>
			                        </tr>
			                        <?php
			                        }
			                        ?>
			                    </tbody>
			                </table>
						</div>
					</div>
		            <!----TABLE LISTING ENDS--->


					<!----PHRASE CREATION FORM STARTS---->
					<div class="tab-pane box" id="add" style="padding: 30px">
		                <div class="box-content">
		                    <?= form_open(base_url() . 'index.php?admin/manage_language/add_phrase/' , array('class' => 'form-horizontal form-groups-bordered validate', 'style' => 'width:100%;'));?>
		                        <div class="padded">
		                            <div class="form-group justify-content-md-center">
		                                <label class="col-3 control-label"><?= get_phrase('phrase');?></label>
		                                <div class="col-5">
		                                    <input type="text" class="form-control" name="phrase" data-validate="required" data-message-required="<?= get_phrase('value_required');?>" placeholder="e.g. name, email"/>
		                                </div>
		                            </div>

		                        </div>
		                        <div class="form-group">
		                              <div class="col-sm-offset-3 col-sm-5">
		                                  <button type="submit" class="btn btn-info"><?= get_phrase('add_phrase');?></button>
		                              </div>
									</div>
		                    <?= form_close();?>
		                </div>
					</div>
					<!----PHRASE CREATION FORM ENDS--->

		        	<!----ADD NEW LANGUAGE---->
					<div class="tab-pane box" id="add_lang" style="padding: 30px">
		                <div class="box-content">
		                    <?= form_open(base_url() . 'index.php?admin/manage_language/add_language/' , array('class' => 'form-horizontal form-groups-bordered validate', 'style' => 'width:100%;'));?>
		                        <div class="padded">
		                            <div class="form-group">
		                                <label class="col-sm-3 control-label"><?= get_phrase('language');?></label>
		                                <div class="col-sm-5">
		                                    <input type="text" class="form-control" name="language" data-validate="required" data-message-required="<?= get_phrase('value_required');?>" placeholder="e.g. Spanish, Portugese"/>
		                                </div>
		                            </div>

		                        </div>
		                        <div class="form-group">
		                              <div class="col-sm-offset-3 col-sm-5">
		                                  <button type="submit" class="btn btn-info"><?= get_phrase('add_language');?></button>
		                              </div>
									</div>
		                    <?= form_close();?>
		                </div>
					</div>
		            <!----LANGUAGE ADDING FORM ENDS-->

				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function enableUpdateButton(id) {
		$('#button-'+id).prop('disabled', false);
	}

	function updatePhrase(phraseId) {

		$('#button-'+phraseId).html('<i class = "mdi mdi-progress-check"></i>');
		var updatedValue = $('#phrase-'+phraseId).val();

		var currentEditingLanguage = '<?= $current_editing_language; ?>';

		$.ajax({
			type : "POST",
			url  : "<?= base_url('index.php?admin/update_phrase_with_ajax'); ?>",
			data : {updatedValue : updatedValue, currentEditingLanguage : currentEditingLanguage, phraseId : phraseId},
			success : function(response) {
				$('#button-'+phraseId).html('<i class = "mdi mdi-check-circle"></i>');
				toastr.success('<?= get_phrase('phrase_updated');?>');
			}
		});
	}
</script>
