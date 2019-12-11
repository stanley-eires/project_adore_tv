<div class="content row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Subscription History</h4>
				<div class="row">
					<div class="col">
						<select class="select2 form-control " name="month" id="month" >
							<option value="January" 	<?= ($month == 'January')? 'selected':'';?>>January</option>
							<option value="February" 	<?= ($month == 'February')? 'selected':'';?>>February</option>
							<option value="March" 		<?= ($month == 'March')? 'selected':'';?>>March</option>
							<option value="April" 		<?= ($month == 'April')? 'selected':'';?>>April</option>
							<option value="May" 		<?= ($month == 'May')? 'selected':'';?>>May</option>
							<option value="June" 		<?= ($month == 'June')? 'selected':'';?>>June</option>
							<option value="July" 		<?= ($month == 'July')? 'selected':'';?>>July</option>
							<option value="August" 		<?= ($month == 'August')? 'selected':'';?>>August</option>
							<option value="September" 	<?= ($month == 'September')? 'selected':'';?>>September</option>
							<option value="October" 	<?= ($month == 'October')? 'selected':'';?>>October</option>
							<option value="November" 	<?= ($month == 'November')? 'selected':'';?>>November</option>
							<option value="December" 	<?= ($month == 'December')? 'selected':'';?>>December</option>
						</select>
					</div>
					<div class="col">
						<select class="select2 form-control" name="month" id="year" >
						<?php for ($i = date("Y"); $i > 2000 ; $i--):?>
							<option value="<?= $i?>" <?= ($year == $i)? 'selected':'';?>><?= $i?></option>
						<?php endfor?>
						</select>
					</div>
					<div class="col">
						<button type="button" onClick="submit()" class="btn btn-sm btn-outline-primary">Filter</button>
					</div>
				</div>
				<br>
				<div class="table-responsive">
					<table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
						<thead class='text-primary'>
							<tr>
								<th>
									#
								</th>
								<th>Date</th>
								<th>Purchased Package</th>
								<th>Paid Amount</th>
								<th>Method</th>
								<th>User</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$subscriptions	=	$this->subscription_model->get_subscription_report($month, $year);
										$counter 		=	1;
								$total_sale		=	0;
										foreach ($subscriptions as $row):
								$total_sale	+=	$row['paid_amount'];
										?>
							<tr class='text-center'>
								<td><?= $counter++;?></td>
								<td><?= date("d M, Y" , $row['payment_timestamp']);?></td>
								<td class='text-uppercase'><?= $this->db->get_where('plan', array('plan_id'=>$row['plan_id']))->row()->name;?></td>
								<td><?= $row['currency'] . ' ' . $row['paid_amount'];?></td>
								<td><?= $row['payment_method'];?></td>
								<td><?= $row['name']?></td>
								<td><a href="<?= base_url();?>admin/report_invoice/<?= $row['subscription_id'].'/'.$row['user_id']; ?>" class="btn btn-outline-info btn-sm" target="blank"><i class="mdi mdi-printer"></i></a></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
				<!-- <hr> -->
				<!-- <div style="text-align: center;">
					Total sale : <?= '$' . $total_sale;?>
				</div> -->
            </div>
        </div>
    </div>
</div>

<script>
	function submit()
	{
		year  = document.getElementById("year").value;
		month = document.getElementById("month").value;
		window.location = "<?= base_url();?>admin/report/" + month + "/" + year;
	}
</script>
