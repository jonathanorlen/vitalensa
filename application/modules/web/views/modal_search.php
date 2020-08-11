<div class="modal fade" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:45px">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title custom-font">Hasil Pencarian</h3>
			</div>
			<div class="modal-body">
				<?php
				$this->db->order_by("date", "desc");
				$this->db->order_by("id", "desc");
				$get_aktivitas = $this->db->get("content")->result();

				foreach($get_aktivitas as $get){
					?>
					<a href="<?php echo base_url().'web/read/'.$get->category.'/'.$get->id?>" style="text-decoration:none;color:black">
						<div class="col-md-12 card" style="margin-top:8px">
							<div class="row" style="padding:0px !important">
								<div class="col-md-12" style="margin-top:5px;font-family:SF Display Semibold;font-size:20px">
									<?php echo $get->judul ?>
								</div>
								<span style="font-size:12.5px;padding-left:15px;color:#838383;font-family:SF Text Regular"><i class='far fa-calendar-alt'></i> <?php echo $get->date?>, <?php echo $get->time ?></span>
								<div class="col-md-12" style="margin-bottom:5px;font-family:SF Display Regular">
									<?php echo $get->display ?>
								</div>
							</div>
						</div>
					</a>
					<?php }?>
				</div>
				<div class="modal-footer">
					<button class="btn btn-lightred" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				</div>
			</div>
		</div>
	</div>