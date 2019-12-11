<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Creativeitem" />
    <meta name="author" content="Creativeitem" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Print</title>
	<link rel="shortcut icon" href="<?= base_url();?>assets/global/favicon.png">
	<!-- App css -->
	<link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" />
	<link href="<?= base_url('assets/backend/css/app.min.css') ?>" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
	$subscription	=	$this->db->get_where('subscription', array('subscription_id' => $subscription_id))->row_array();
	$plan_id = $subscription['plan_id'];
	$plan = $this->db->get_where('plan', array('plan_id' => $plan_id))->row_array();

	$user	=	$this->db->get_where('user', array('user_id' => $user_id))->row_array();
?>
<div class='container my-5'>	
		<section class="card bg-light">
          <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row">
              <div class="col-md-6 col-sm-12 text-center text-md-left">
                <a  href="<?= base_url('browse/home');?>"><img  src="<?= base_url('assets/img/NEW2.png');?>" alt="adoreTv.png" height="50px" class='img-thumbnail bg-dark'>
                </a>
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-right">
                <h2>INVOICE</h2>
              </div>
            </div>
            
            <div class="row pt-2">
              <div class="col-sm-12 text-center text-md-left">
                <p class="text-muted">Bill To</p>
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-left">
			  	<p><span class="text-muted font-weight-bold">Name: </span> <?= $user['name']?></p>
                <p class='text-orange'><span class="text-muted font-weight-bold">Email: </span><?= $user['email']?></p>
                
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p><span class="text-muted">Date Generated:</span> <?= date('d/m/Y') ?></p>
                <p><span class="text-muted">Terms :</span> Due on Receipt</p>
				<button onclick='window.print()' class="btn btn-outline-warning btn-lg my-1"><i class="fa fa-print" ></i> Print</button>
              </div>
            </div>
            
            <div id="class="pt-2">
              <div class="row">
                <div class="table-responsive col-sm-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Your Plan</th>
                        <th class="text-right">Payment Date</th>
                        <th class="text-right">Service Period</th>
                        <th class="text-right">Payment Method</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>
                          <p><?= $plan['name']; ?></p>
                        </td>
                        <td class="text-right"><?= date('d M Y', $subscription['payment_timestamp']); ?></td>
                        <td class="text-right"><?= date('d M Y', $subscription['timestamp_from']); ?> - <?= date('d M Y', $subscription['timestamp_to']); ?></td>
                        <td class="text-right"><?= $subscription['payment_method']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="row">
                    <div class="col-md-10">
                      <table class="table">
					  <h6>More Details</h6>
                        <tbody>
                          <tr>
                            <td>Payment Method:</td>
                            <td class="text-right"><?= $subscription['payment_method']; ?></td>
                          </tr>
                          <tr>
                            <td>Payment Amount:</td>
                            <td class="text-right"><?= $subscription['paid_amount'].' '.$subscription['currency'];?></td>
                          </tr>
						  <tr>
						  	<td>Plan ID:</td>
                            <td class="text-right"># <?= $plan_id?></td>
						  </tr>
						  <tr>
						  	<td>Subscription ID:</td>
                            <td class="text-right"># <?= $subscription_id?></td>
						  </tr>
                          <tr>
                            <td>User ID</td>
                            <td class="text-right">#<?= $this->session->userdata('user_id')?></td>
                          </tr>
                          <tr>
                            <td>User Full Name:</td>
                            <td class="text-right"><?= $user['name']?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <h6>Terms & Condition</h6>
                  <p>You know, being a test pilot isn't always the healthiest business
                    in the world. We predict too much for the next year and yet far
                    too little for the next 10.</p>
                </div>
              </div>
            </div>
          </div>
        </section>
	</div>	


    
</body>
</html>
