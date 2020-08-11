<div class="main-content">
	<div class="container">
		<div class="row">
			<div style="width:100%;padding-top:2em;padding-left:1em;padding-right:1em;">
				<a onclick="goBack()" style="float:left;">
					<img src="<?php echo base_url().'front/image/kembali.png'?>">
				</a>
				<h3 style="float:right;">
					<span class="head-title" style="font-size:55px; color: black">
						<?php 
						$uri = $this->uri->segment(3);
						if($uri == 'renungan'){
							echo 'Renungan';
						}else if($uri == 'opini'){
							echo 'Opini';
						}else if($uri == 'aktivitas'){
							echo 'Aktivitas';
						}
						?>
					</span>
				</h3>
			</div>
		</div>
		<div class="col-md-12" style="margin-top:3em">
			<div class="row">
				<div class="col-md-12" style="border-left:6px solid #48ffc2;margin-left:8px">
					<h1 class="" style="font-family:SF Display Bold;color:#313131">
						Terbaru
					</h1>

				</div>
			</div>
		</div>
		<div class="slider">
			<div class="slides" >
				<?php
				$this->db->order_by("date", "desc");
				$this->db->order_by("id", "desc");
				$this->db->limit(4);
				$this->db->where("category",$uri);
				$get_renungan = $this->db->get("content")->result();

				foreach($get_renungan as $get){
					?>
					<div class="col-md-3 col-8 col-sm-8" style="padding:10px;">
						<a href="<?php echo base_url().'web/read/renungan/'.$get->id?>" style="text-decoration:none;color:black">
							<div class="card shadow card-new" style="border-radius:10px;min-height:260px;border:0px solid white;">
								<div class="image-square" style="background-image:url(<?php echo base_url().'foto/'.$get->foto?>)"></div>
								<div class="row" style="padding:8px">
									<div class="col-md-12" style="padding-top:0px;padding-bottom:0px;font-weight:bold;color:#838383;font-family:SF Text Regular">
										<span style="font-size:12.5px"><i class='far fa-calendar-alt'></i> <?php echo $get->date?>, </span>
										<span style="font-size:12.5px"><i class='far fa-clock'></i> <?php echo $get->time ?></span>
									</div>
									<div class="col-md-12" style="padding-top:5px;">
										<h5 style="font-family:SF Display Semibold"><?php echo $get->judul?></h5>
									</div>
								</div>
							</div>
						</a>
					</div>
					<?php }?>
				</div>
			</div>

			<hr style="border:1px solid #e1e1e1;width:100%;margin-top:2em;margin-bottom:2em">

			<div class="row">
				<div class="col-md-12">
					<div class="row" style="margin-top:7px;padding:15px">
						<?php
						$this->db->order_by("date", "desc");
						$this->db->order_by("id", "desc");
						$this->db->limit(4,9);
						$this->db->where("category",$uri);
						$get_renungan2 = $this->db->get("content")->result();

						foreach($get_renungan2 as $get){
							?><a href="<?php echo base_url().'web/read/'.$get->category.'/'.$get->id?>" style="text-decoration:none;color:black">
								<div class="col-md-3 col-sm-12 col-12" style="padding:10px;">
									<div class="card shadow" style="border-radius:10px;min-height:300px;border:0px solid white">
										<div class="image-square"></div>
										<div class="row" style="padding:8px">
											<div class="col-md-12" style="padding-top:0px;padding-bottom:0px;font-weight:bold;color:#838383">
												<span style="font-size:11.5px"><i class='far fa-calendar-alt'></i> 1 Feb 2019</span>
												<span style="font-size:11.5px;float:right;"><i class='far fa-clock'></i> 19.20</span>
											</div>
											<div class="col-md-12" style="padding-top:5px;">
												<h5> Menjadi Berkat Ditengah pahitnya dunia</h5>
											</div>
											<br>
											<div class="col-md-12" class="subtitle" style="padding-top:5px;font-size:13.5px">
												Menjadi Berkat Ditengah pahitnya dunia sfdsdlfsdlfk opsadkfasokdopkk ugugui uukhuihuh hiuhuihuihi uhiuh
											</div>
										</div>
									</div>
								</div>
							</a>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</body>
		<script>
			function goBack() {
				window.history.back();
			}
		</script>