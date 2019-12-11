<?php include 'header_browse.php';?>
<div class="page-header header-filter" filter-color="orange" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/bg18.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	<div class="content container mt-5 text-left">
		<div class="row">
			<div class="col-md-12">
				<h3 class="display-4"><?= ('Billing History');?></h3>
				<hr>
			</div>
			<div class="col-md-9 table-responsive">
				<table class="table  text-white">
					<tbody>
						<tr>
							<th><?= ('Date');?></th>
							<th><?= ('Package');?></th>
							<th><?= ('Service Period');?></th>
							<th><?= ('Payment Method');?></td>
							<th><?= ('Amount Paid');?></th>
							<th><?= ('Option');?></td>
						</tr>
						<?php 
							$subscription_history	=	$this->subscription_model->get_subscription_of_user($this->session->userdata('user_id'));
							foreach ($subscription_history as $row):
						?>
						<tr>
							<td>
								<?= date("d M, Y" , $row->payment_timestamp);?>
							</td>
							<td>
								<?= $this->subscription_model->get_plan_detail($row->plan_id,"name")?>
							</td>
							<td>
								<?= date("d M, Y" , $row->timestamp_from);?>
								-
								<?= date("d M, Y" , $row->timestamp_to);?>
							</td>
							<td>
								<?= $row->payment_method?>
							</td>
							<td>
								<?= $row->currency.' '.number_format($row->paid_amount);?>
							</td>
							<td><a href="<?= base_url('browse/report_invoice/');?><?= $row->subscription_id.'/'.$this->session->userdata('user_id'); ?>" class="btn btn-orange btn-sm" target="blank"><i class="fa fa-print"></i></a></td>
						</tr> 
						<?php endforeach;?>
					</tbody>
				</table>
				<a href="<?= base_url('browse/youraccount')?>" class="btn btn-outline-secondary"><?= ('Go Back');?></a>
			</div>
		</div>	
	</div>
</div>
<?php include 'footer.php';?>


