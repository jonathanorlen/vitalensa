	<div class="main-content bg1" style="margin-top:30px">
		<div class="container">
			<div class="row" >
				<?php 
				$get1 = $this->db->query("SELECT * FROM home WHERE id='1'")->row();
				$content = $this->db->query("SELECT * FROM content WHERE id='$get1->id_content' ");
				$result = $content->row();

				$get2=$this->db->query("SELECT * FROM home WHERE id='2' ")->row();
				$content2 = $this->db->query("SELECT * FROM content WHERE id='$get2->id_content' ");
				$result2 = $content2->row();
				if(@$result->id != ''){
				?>

				<div class="col-md-6 " style="margin-top:40px">
					<a href="<?php echo base_url().'web/read/'.$result->category.'/'.$result->id?>" style="text-decoration:none">
						<div class="containercu-rectangle title-shadow" style="background-image: url(<?php echo base_url().'foto/'.$result->foto ?>)">
							<div class="text" style="z-index:11;color:white;font-weight:600;font-size:26px;font-family:SF Display Semibold">
								<?php echo $result->judul?>
							</div>
						</div>
					</a>
				</div>
				<?php } if(@$result2->id != ''){?>
				<div class="col-md-6 " style="margin-top:40px">
					<a href="<?php echo base_url().'web/read/'.$result2->category.'/'.$result2->id?>" style="text-decoration:none">
						<div class="containercu-rectangle title-shadow" style="background-image: url(<?php echo base_url().'foto/'.$result2->foto ?>)">
							<div class="text" style="z-index:11;color:white;font-weight:600;font-size:26px;font-family:SF Display Semibold">
								<?php echo $result2->judul?>
							</div>
						</div>
					</a>
				</div>
				<?php }?>
			</div>
		</div>
	</div>

	<div class="main-content">
		<div class="container">
			<div class="row " style="margin-top:3.5em">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12" style="border-left:6px solid #32BD8F;margin-left:8px">
							<h1 class="" style="font-family:SF Display Bold;color:#313131
">
								Renungan
								<a href="<?php echo base_url().'web/kategori/renungan'?>" style="text-decoration:none">
									<span style="float:right;font-size:22px;/*color:#525252*/;font-family:SF Display Regular">
										Lainnya
									</span>
								</a>
							</h1>
						</div>
					</div>
				</div>
				<div class="slider">
					<div class="slides">
						<div class="col-md-4 col-sm-7 col-7" style="padding:10px;margin-top:50px;">
							<img src="<?php echo base_url().'front/ilustrasi/rohani.png'?> " class="image-content">
						</div>
						<?php
						$this->db->order_by("date", "desc");
						$this->db->order_by("id", "desc");
						$this->db->limit(4);
						$this->db->where("category","renungan");
						$get_renungan = $this->db->get("content")->result();

						foreach($get_renungan as $get){
							?>
							<div class="col-md-3 col-7 col-sm-8" style="padding:10px;"">
								<a href="<?php echo base_url().'web/read/renungan/'.$get->id?>" style="text-decoration:none;color:black">
									<div class="card shadow card-home" style="border-radius:10px;min-height:300px;border:0px solid white;">
										<div class="image-square" style="background-image:url(<?php echo base_url().'foto/'.$get->foto?>)"></div>
										<div class="row" style="padding:8px">
											<div class="col-md-12" style="padding-top:0px;padding-bottom:0px;font-weight:bold;color:#838383;font-family:SF Text Regular">
												<span style="font-size:12.5px"><i class='far fa-calendar-alt'></i> <?php echo $get->date?>, </span>
												<span style="font-size:12.5px"><i class='far fa-clock'></i> <?php echo $get->time ?></span>
											</div>
											<div class="col-md-12" style="padding-top:5px;">
												<h5 style="font-family:SF Display Semibold"><?php echo $get->judul?></h5>
											</div>
											<div style="width:35%;margin-left:14.3px;border:1.6px solid #ecf0f1"></div>
											<div class="col-md-12" style="margin-top:3px;font-size:14px;font-family:SF Display Regular">
												<h6><?php echo $get->display?></h6>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php }?>
						</div>
					</div>
			</div>

			<div class="row" style="margin-top:3em">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12" style="border-left:6px solid #32BD8F;margin-left:8px">
							<h1 class="" style="font-family:SF Display Bold;color:#313131">
								Opini
								<a href="<?php echo base_url().'web/kategori/opini'?>" style="text-decoration:none">
									<span style="float:right;font-size:22px;/*color:#525252*/;font-family:SF Display Regular">
										Lainnya
									</span>
								</a>
							</h1>
						</div>
					</div>
				</div>
				<div class="slider">
					<div class="slides">
						<div class="col-md-4 col-sm-7 col-7" style="padding:10px;margin-top:50px;">
							<img src="<?php echo base_url().'front/ilustrasi/opini.png'?> " class="image-content">
						</div>
						<?php
						$this->db->order_by("date", "desc");
						$this->db->order_by("id", "desc");
						$this->db->limit(4);
						$this->db->where("category","opini");
						$get_opini = $this->db->get("content")->result();

						foreach($get_opini as $get){
							?>
							<div class="col-md-3 col-7 col-sm-8" style="padding:10px;"">
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
							<?php }?>
						</div>
					</div>
				</div>


				<div class="row" style="margin-top:3em">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12" style="border-left:6px solid #32BD8F;margin-left:8px">
							<h1 class="" style="font-family:SF Display Bold;color:#313131">
								Aktivitas
								<a href="<?php echo base_url().'web/kategori/aktivitas'?>" style="text-decoration:none">
									<span style="float:right;font-size:22px;/*color:#525252*/;font-family:SF Display Regular">
										Lainnya
									</span>
								</a>
							</h1>
						</div>
					</div>
				</div>
				<div class="slider">
					<div class="slides">
						<div class="col-md-4 col-sm-7 col-7" style="padding:10px;margin-top:50px;">
							<img src="<?php echo base_url().'front/ilustrasi/aktivitas.png'?> " class="image-content">
						</div>
						<?php
						$this->db->order_by("date", "desc");
						$this->db->order_by("id", "desc");
						$this->db->limit(4);
						$this->db->where("category","aktivitas");
						$get_aktivitas = $this->db->get("content")->result();

						foreach($get_aktivitas as $get){
							?>
							<div class="col-md-3 col-9 col-sm-8" style="padding:10px;"">
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
						</div>
					</div>
				</div>

				</div>

			</div>
