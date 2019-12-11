<?php
	$subscription	=	$this->db->get_where('subscription', array('subscription_id' => $subscription_id))->row_array();
	$plan_id = $subscription['plan_id'];
	$plan = $this->db->get_where('plan', array('plan_id' => $plan_id))->row_array();

	$user	=	$this->db->get_where('user', array('user_id' => $user_id))->row_array();
?>
<div class='container my-5'>	
		<section class="card">
          <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row">
              <div class="col-md-6 col-sm-12 text-center text-md-left">
			  	<a  href="<?= base_url('browse/home');?>"><img  class='img-thumbnail bg-dark'src="<?= base_url('assets/img/NEW2.png');?>" alt="adoreTv.png" width="70px"></a>
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
				<button onclick='window.print()' class="btn btn-orange btn-lg my-1"><i class="fa fa-print" ></i> Print</button>
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
                  <p>Am just going to put jargon so this place can take shape until i get something better to put. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet illum tenetur neque in accusantium laboriosam atque, iste commodi error laborum molestias explicabo quo dignissimos cumque similique debitis nisi architecto natus! Hic sit reprehenderit dolore ullam, explicabo perferendis laborum velit provident facilis, ut eligendi odio ipsum? Officia corporis ipsum quod non corrupti molestias qui excepturi eos, labore placeat a voluptate facilis dolores! Voluptate inventore culpa sit. Cum accusantium dicta laboriosam, fugiat vel minus nemo consequuntur nihil est labore ratione recusandae sapiente, provident necessitatibus asperiores illum..</p>
                </div>
              </div>
            </div>
          </div>
        </section>
	</div>	
