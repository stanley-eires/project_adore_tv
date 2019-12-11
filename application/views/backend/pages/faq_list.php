<div class="content row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
				<h4>FAQ List</h4>
				<div class="table-responsive">
					<table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
						<thead class='text-primary'>
							<tr>
								<th>#</th>
								<th>FAQ Question</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$counter = 1;
								foreach ($faqs as $row):
								?>
							<tr>
								<td><?= $counter++;?></td>
								<td class='text-uppercase'><?= $row->question;?></td>
								<td>
									<div class="btn-group btn-group-sm">
										<a class="btn btn-outline-info " data-toggle="modal" data-target="#edit<?= $row->faq_id;?>" data-backdrop='static'>
										<i class="mdi mdi-pencil"></i></a>
										<a href="<?= base_url();?>admin/faq_delete/<?= $row->faq_id;?>" class="btn btn-outline-danger" onclick="return confirm('Want to delete?')">
										<i class="mdi mdi-delete"></i></a>
									</div>
									
								</td>
							</tr>
							<div class="modal fade" id="edit<?= $row->faq_id;?>" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Edit FAQ</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<form method="post" action="<?= base_url();?>admin/faq_edit/<?= $row->faq_id;?>">
												<div class="form-group mb-3">
													<label for="question">FAQ Question</label>
													<input type="text" class="form-control" id = "question" name="question" value="<?= $row->question;?>">
												</div>

												<div class="form-group mb-3">
													<label for="answer">FAQ Answer</label>
													<textarea class="form-control" id="answer" name="answer" rows="6"><?= $row->answer;?></textarea>
												</div>

												<div class="form-group float-right">
													<input type="submit" class="btn btn-light btn-orange" value="Update">
												</div>

											</form>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
            </div>
        </div>
	</div>
	<div class="col-md-4">
        <div class="card">
			<div class="card-header">
				<h4 class="header-title">Create FAQ</h4>
			</div>
            <div class="card-body">
				<form method="post" action="<?= base_url();?>admin/faq_create">
					<div class="form-group mb-3">
						<label for="question">FAQ Question</label>
						<input type="text" class="form-control" id = "question" name="question">
					</div>

					<div class="form-group mb-3">
						<label for="answer">FAQ Answer</label>
						<textarea class="form-control" id="answer" name="answer" rows="6"></textarea>
					</div>

					<div class="form-group float-right">
						<input type="submit" class="btn btn-light btn-orange" value="Create">
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
