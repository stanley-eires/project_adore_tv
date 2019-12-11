<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-plain">
				<div class="card-body row">
					<div class="col-md-4">
						<div class="card card-bodys shadow-sm">
							<div class="row no-gutters text-center">
								<div class="col-md-7">
									<h5 class="text-muted font-weight-normal">Total Movies</h5>
									<h3 class="display-4"><?= $this->db->from('movie')->count_all_results();?></h3>
								</div>
								<div class="col-md-5">
									<i class="d-none d-md-block mdi mdi-movie fa-6x"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-bodys shadow-sm">
							<div class="row no-gutters text-center">
								<div class="col-md-7">
									<h5 class="text-muted font-weight-normal">Total TV Series</h5>
									<h3 class="display-4"><?= $this->db->from('series')->count_all_results();?></h3>
								</div>
								<div class="col-md-5">
									<i class="d-none d-md-block mdi mdi-movie-roll fa-6x"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-bodys shadow-sm">
							<div class="row no-gutters text-center">
								<div class="col-md-7">
									<h5 class="text-muted font-weight-normal">Total Episodes</h5>
									<h3 class="display-4"><?= $this->db->from('episode')->count_all_results();?></h3>
								</div>
								<div class="col-md-5">
									<i class="d-none d-md-block mdi mdi-video-stabilization fa-6x"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-bodys shadow-sm">
							<div class="row no-gutters text-center">
								<div class="col-md-7">
									<h5 class="text-muted font-weight-normal">Registered Users</h5>
									<h3 class="display-4"><?= $this->db->from('user')->count_all_results();?></h3>
								</div>
								<div class="col-md-5">
									<i class="d-none d-md-block mdi mdi-account-multiple-check fa-6x"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-bodys shadow-sm">
							<div class="row no-gutters text-center">
								<div class="col-md-7">
									<h5 class="text-muted font-weight-normal">Active Subscription</h5>
									<h3 class="display-4">
										<?php
											$total_active_subscription	=	0;
											$users	=	$this->db->get('user')->result_array();
											foreach ($users as $row){
												$plan_id	=	$this->subscription_model->get_active_plan_of_user($row['user_id']);
												if ($plan_id != false)
													$total_active_subscription++;
											}
											echo $total_active_subscription;
										?>
									</h3>
								</div>
								<div class="col-md-5">
									<i class="d-none d-md-block mdi mdi-wallet-membership fa-6x"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-bodys shadow-sm">
							<div class="row no-gutters text-center">
								<div class="col-md-7">
									<h5 class="text-muted font-weight-normal">Sales This Month</h5>
									<h3 class="fa-3x font-weight-bolder">
										<?php
											$total_sale	=	0;
											$month			=	date("F");
											$year 			=	date("Y");
											$subscriptions	=	$this->subscription_model->get_subscription_report($month, $year);
											foreach ($subscriptions as $row)
												$total_sale	+=	$row['paid_amount'];
											echo currency(number_format($total_sale));
										?>
									</h3>
								</div>
								<div class="col-md-5">
									<i class="d-none d-md-block mdi mdi-cash fa-6x"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
