<div class="main-content" style="margin-top:45px">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-12 mag-innert-right" style="float:left;">
				<div style="width:100%;padding-bottom:5em">
					<a onclick="goBack()" style="float:left;">
						<img src="<?php echo base_url().'front/image/kembali.png'?>" style="width:100%">
					</a>
					<h3 style="float:right;">
						<span class="chip" style="background-color:#4cd964;float:right;color:white">
							<?php 
							$uri2 = $this->uri->segment(4);
							$uri = $this->uri->segment(3);
							$get_data = $this->db->query("SELECT * FROM content WHERE id=$uri2")->row();
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

				<h2 style="margin-bottom:1em;font-family:SF text Bold"><?php echo $get_data->judul;?></h2>
				<img src="<?php echo base_url().'foto/'.$get_data->foto?>" style="width:100%">
				<div class="" style="padding:8px;border-radius:10px">
					<h5 style="margin-top:20px;width:100%;color: #6b6b6b;font-family:SF Text Regular">
						<span><i class='far fa-calendar-alt'></i> <?php echo tanggal_indo($get_data->date);?> </span>
						<span style="float:right;"><i class='far fa-clock'></i> <?php echo $get_data->time;?></span>
					</h5>
					<hr style="border:1px solid #e1e1e1;width:100%;margin-top:2em;margin-bottom:2em">
					<span style="font-size:16px;width:100%;font-family:SF Text Regular">
						<?php echo $get_data->text;?>
					</span>
					<hr style="border:1px solid #e1e1e1;width:100%;margin-top:2em;margin-bottom:1em">
					<span style="font-family:SF Text Semibold;font-size:30px;">Bagikan</span>
					<div width="100%" style="">
						<a href="https://web.whatsapp.com/send?text= <?php echo $get_data->judul;?> <?php echo base_url().'web/read/'.$get_data->category.'/'.$get_data->id?>" data-action="share/whatsapp/share" target="_blank">
							<button class="btn btn-warning btn-lg" style="margin-right:10px;background-color:#24CD63;color:white;margin-top:0.5em">
								<i class="fa fa-whatsapp"></i> Whatsapp
							</button>
						</a>
						<a href="http://twitter.com/share?text=<?php echo $get_data->judul;?> <?php echo base_url().'web/read/'.$get_data->category.'/'.$get_data->id?>" target="_blank">
							<button class="btn btn-warning btn-lg" style="margin-right:10px;background-color: #00A7E7;color:white;margin-top:0.5em">
								<i class="fa fa-twitter"></i> Twitter
							</button>
						</a>

						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url().'web/read/'.$get_data->category.'/'.$get_data->id?>" target="_blank">
							<button class="btn btn-warning btn-lg" style="margin-right:10px;background-color:#3360FF;color:white;margin-top:0.5em">
								<i class="fa fa-facebook"></i> Facebook
							</button>
						</a>
					</div>
				</div>

			</div>

			<div class="col-md-4 col-12 mag-innert-right" style="float:right;">
				<?php 
				$this->db->limit(1);
				$this->db->order_by('date','desc');
				$this->db->order_by('id','desc');
				$this->db->where('category','renungan');
				$renungan = $this->db->query("SELECT * FROM content");
				$get_renungan = $renungan->row();

				if($get_renungan != NULL){
					?>
					<div class="col-md-12" style="margin-top:2em">
						<a href="<?php echo base_url().'web/read/'.$get_renungan->category.'/'.$get_renungan->id?>" style="color:black;text-decoration:none">
							<div class="card shadow" style="border-radius:10px;min-height:300px;border:0px solid white">
								<div class="image-square" style="background-image:url(<?php echo base_url().'foto/'.$get_renungan->foto ?>)"></div>
								<div class="row" style="padding:8px">
									<div class="col-md-12" style="padding-top:0px;padding-bottom:0px;font-weight:bold;color:#838383">
										<span style="font-size:11.5px"> <i class='far fa-calendar-alt'></i> 1 Feb 2019</span>
										<span style="font-size:11.5px;float:right;"> <i class='far fa-clock'></i> 19.20</span>
									</div>
									<div class="col-md-12" style="padding-top:5px;">
										<h5> <?php echo $get_renungan->judul?> </h5>
									</div>
									<br>
									<div class="col-md-12" style="padding-top:5px;font-size:13.5px">
										Menjadi Berkat Ditengah pahitnya dunia sfdsdlfsdlfk opsadkfasokdopkk ugugui uukhuihuh hiuhuihuihi uhiuh
									</div>
								</div>
							</div>
						</a>
					</div>
					<?php }?>
					<?php 
					$this->db->limit(1);
					$this->db->order_by('date','desc');
					$this->db->order_by('id','desc');
					$this->db->where('category','opini');
					$get_opini = query("SELECT * FROM content")->row();
					if($get_opini != NULL){
						?>
						<div class="col-md-12" style="margin-top:2em">
							<a href="<?php echo base_url().'web/read/aktivitas/'.$get->id?>" style="text-decoration:none;color:black">
								<div class="card shadow card-home" style="border-radius:10px;min-height:295px;border:0px solid white;">
									<div style="width:100%;height:70px;border-left:8px solid #38D39F;border-radius:10px 0px;padding:4px;">
										<span style="font-size:28px;float:left;width:100%;padding-left:12px;font-family:SF Display Bold" class="font-activity-date"><?php echo tanggal_indo($get->date)?></span>
										<span style="font-size:18px;float:left;width:100%;padding-left:12px;margin-top:-7px;font-family:SF Display Medium" class="font-activity-time"> <i class="fa fa-clock"></i>             <?php echo $get->time ?></span>
									</div>
									<div class="image-square" style="background-image:url(<?php echo base_url().'foto/'.$get->foto?>)"></div>
									<div class="row" style="padding:8px">
										<div class="col-md-12" style="padding-top:5px;">
											<h4 style="font-family:SF Display Regular"><?php echo $get->judul?></h4>
										</div>
									</div>
								</div>
							</a>
						</div>
						<?php }?>

						<!-- <?php 
						$this->db->limit(1);
					$this->db->order_by('date','desc');
					$this->db->order_by('id','desc');
					$this->db->where('category','aktivitas');
					$get_aktivitas = $this->db->get("content")->row();

						if($get_aktivitas != NULL){
							?>
							<div class="col-md-12" style="margin-top:2em">
								<a href="<?php echo base_url().'web/read/renungan/'.$get->id?>" style="text-decoration:none;color:black">
									<div class="card shadow card-home" style="border-radius:10px;min-height:300px;border:0px solid white;">
										<div class="image-square" style="background-image:url(<?php echo base_url().'foto/'.$get->foto?>)"></div>
										<div class="row" style="padding:8px">
											<div class="col-md-12" style="padding-top:0px;padding-bottom:0px;font-weight:bold;color:#838383;font-family:SF Text Regular">
												<span style="font-size:12.5px"><i class='far fa-calendar-alt'></i> <?php echo $get->date?>, </span>
												<span style="font-size:12.5px"><i class='far fa-clock'></i> <?php echo $get->time ?></span>
											</div>
											<div class="col-md-12" style="padding-top:5px;">
												<h4 style="font-family:SF Display Semibold"><?php echo $get->judul?></h4>
											</div>
											<div style="width:35%;margin-left:14.3px;border:1.6px solid #ecf0f1"></div>
											<div class="col-md-12" style="margin-top:3px;font-size:14px;font-family:SF Display Regular">
												<?php echo $get->display?>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php }?> -->
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