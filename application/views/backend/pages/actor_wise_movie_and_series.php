<div class="row content">
    <div class="col-md-9">
        <div class="card"> 
            <div class="card-body">
                <!-- <h4 class="header-title">Actor List</h4> -->
                <ul class="nav nav-pills bg-light nav-justified mb-3">
                    <li class="nav-item">
                        <a href="#movie" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                            <span class="">Movies</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#series" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                            <span class="">TV-Series</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="movie">
						<div class="table-responsive">
                       		<table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
               					<thead class='text-primary'>
               						<tr>
               							<th>#</th>
               							<th></th>
               							<th>Movie Title</th>
               							<th>Genre</th>
               						</tr>
               					</thead>
               					<tbody>
               						<?php
                            			$movies = $this->movie_model->get_actor_wise_movies_and_tv_series($actor_id, 'movie') ;
               							$counter = 1;
               							foreach ($movies as $row):
               							  ?>
               						<tr>
               							<td style="vertical-align: middle;"><?= $counter++;?></td>
               							<td><img src="<?= $this->movie_model->get_thumb_url('movie' , $row['movie_id']);?>" style='width:50px;height:50px' class='img-thumbnail' /></td>
               							<td style="vertical-align: middle;"><?= $row['title'];?></td>
               							<td style="vertical-align: middle;">
               								<?= $this->movie_model->get_genre($row['genre_id'],"name") ?>
               							</td>
										
               						</tr>
               						<?php endforeach;?>
               					</tbody>
							</table>
						</div>	
                    </div>
                    <div class="tab-pane show" id="series">
						<div class="table-responsive">
							<table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
								<thead>
									<tr class='text-primary'>
										<th>
											#
										</th>
										<th></th>
										<th>Series Title</th>
										<th>Genre</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$seriess = $this->movie_model->get_actor_wise_movies_and_tv_series($actor_id, 'series');
										$counter = 1;
										foreach ($seriess as $row):
										?>
									<tr>
										<td style="vertical-align: middle;"><?= $counter++;?></td>
										<td><img src="<?= $this->movie_model->get_thumb_url('series' , $row['series_id']);?>" style='width:50px;height:50px' class='img-thumbnail'  /></td>
										<td style="vertical-align: middle;"><?= $row['title'];?></td>
										<td style="vertical-align: middle;">
											<?= $this->movie_model->get_genre($row['genre_id'],"name") ?>
										</td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
					   </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
