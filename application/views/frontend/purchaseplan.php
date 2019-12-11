<?php include 'header_browse.php';?>
<div class="page-header header-filter" >
    <div class="page-header-image">
	</div>
	<div class="container mt-3 text-white">
		<div class="row">
			<div class="col-md-12">
				<h3 class="display-4">Purchase Membership</h3>
				<hr>
			</div>
			<div class="col-md-8">
				<h4 class="">Purchase any of the membership package from below.</h4>
				<ul class="">
					<li>Select any of your preferred membership package & make payment</li>
					<li>You can cancel your subscription anytime later.</li>
				</ul>
		
				<div class="table-responsive">
					<table class="table text-white">
						<tbody>
							<tr>
								<th class='text-uppercase'>Packages</th>
								<?php
									$plans = $this->subscription_model->get_active_plans();
									foreach ($plans as $row):
									?>
								<th class='text-center text-uppercase'><?= $row['name'];?></th>
								<?php endforeach;?>
							</tr>
							<tr>
								<td>Monthly price</td>
								<?php
									$plans = $this->subscription_model->get_active_plans();
									foreach ($plans as $row):
									?>
								<td class="text-center">₦ <?= number_format($row['price']);?></td>
								<?php endforeach;?>
							</tr>
							<tr>
								<td>Screens you can watch on at the same time</td>
								<?php
									$plans = $this->subscription_model->get_active_plans();
									foreach ($plans as $row):
									?>
								<td class="text-center"><?= $row['screens'];?></td>
								<?php endforeach;?>
							</tr>
							<tr>
								<td>Watch on your laptop, TV, phone and tablet</td>
								<?php
									$plans = $this->subscription_model->get_active_plans();
									foreach ($plans as $row):
									?>
								<td align="center"><i class="fa fa-check" aria-hidden="true"></i></td>
								<?php endforeach;?>
							</tr>
							<tr>
								<td>HD available</td>
								<?php
									$plans = $this->subscription_model->get_active_plans();
									foreach ($plans as $row):
									?>
								<td class="text-center"><i class="fa fa-check" aria-hidden="true"></i></td>
								<?php endforeach;?>
							</tr>
							<tr>
								<td>Unlimited movies and TV shows</td>
								<?php
									$plans = $this->subscription_model->get_active_plans();
									foreach ($plans as $row):
									?>
								<td class="text-center"><i class="fa fa-check" aria-hidden="true"></i></td>
								<?php endforeach;?>
							</tr>
							<tr>
								<td>Cancel anytime</td>
								<?php
									$plans = $this->subscription_model->get_active_plans();
									foreach ($plans as $row):
									?>
								<td class="text-center"><i class="fa fa-check" aria-hidden="true"></i></td>
								<?php endforeach;?>
							</tr>
							<tr>
								<td></td>
								<?php
									$plans = $this->subscription_model->get_active_plans();
									foreach ($plans as $row):
									?>
								<td class="text-center">
									<input type="radio" name="plan_id" value="<?= $row['plan_id'];?>" onchange="enable_payment(<?= $row['price'];?>,<?= $row['plan_id'];?>)" />
								</td>
								<?php endforeach;?>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="d-flex justify-content-end">
					<a href="<?= base_url('browse/youraccount');?>" class="btn btn-outline-secondary">Go Back</a>
					<form method='POST' onsubmit="payWithPaystack(event)" id='myform'>
						<script src="https://js.paystack.co/v1/inline.js"></script>
						<button type="submit" onclick="" class="btn btn-orange" disabled id='payment_paystack'> Pay with Paystack </button>
					</form>
					<input type="submit" formaction="" 
						class="btn btn-orange" id="payment_interswitch" disabled value="Pay by Interswitch">
				</div>
			</div>
			<script>
				var PRICE = null;
				var PLAN_ID = null;
				function enable_payment(price,plan_id){
					PRICE = price;
					PLAN_ID = plan_id;
					$('#payment_paystack').removeAttr('disabled');
					$('#payment_interswitch').removeAttr('disabled');
				}
				function payWithPaystack(e) {
					e.preventDefault();
					var handler = PaystackPop.setup({
						key: '<?= $this->payment_model->get_paystack_key('public')?>',
						email: '<?= $this->user_model->get_current_user_detail()->email;?>',
						amount: PRICE*100,
						currency: "NGN",
						callback: function (response) {
							window.location = `<?= base_url('browse/payment_success_paystack/card/')?>${PLAN_ID}/${response.reference}`;
						},
					});
					handler.openIframe();
				}
			</script>
		</div>
	</div>
</div>