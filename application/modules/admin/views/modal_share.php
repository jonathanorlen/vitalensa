<div class="modal fade" id="modal_share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:45px">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title custom-font">Yuk Bagikan kontenmu Ke Dunia !!!</h3>
			</div>
			<?php 
			$uri = $this->uri->segment(3);
			$get_data = $this->db->query("SELECT * FROM content WHERE id=$uri")->row();
			if($uri == 'renungan'){
				echo 'Renungan';
			}else if($uri == 'opini'){
				echo 'Opini';
			}else if($uri == 'aktivitas'){
				echo 'Aktivitas';
			}
			?>
			<div class="modal-body">
				<a href="https://web.whatsapp.com/send?text= <?php echo @$get_data->judul;?> <?php echo @base_url().'web/read/'.$get_data->category.'/'.$get_data->id?>" data-action="share/whatsapp/share" target="_blank">
					<button class="btn btn-warning btn-lg" style="margin-right:10px;background-color:#24CD63;color:white;margin-top:1em">
						<i class="fa fa-whatsapp"></i> Whatsapp
					</button>
				</a>
				<a href="http://twitter.com/share?text=<?php echo @$get_data->judul;?> <?php echo @base_url().'web/read/'.$get_data->category.'/'.$get_data->id?>" target="_blank">
					<button class="btn btn-warning btn-lg" style="margin-right:10px;background-color: #00A7E7;color:white;margin-top:1em">
						<i class="fa fa-twitter"></i> Twitter
					</button>
				</a>

				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo @base_url().'web/read/'.$get_data->category.'/'.$get_data->id?>" target="_blank">
					<button class="btn btn-warning btn-lg" style="margin-right:10px;background-color:#3360FF;color:white;margin-top:1em">
						<i class="fa fa-facebook"></i> Facebook
					</button>
				</a>
			</div>
			<div class="modal-footer">
				<button class="btn btn-lightred" data-dismiss="modal"><i class="fa fa-times"></i> Close </button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#modal_share').modal('show');   
	});
</script>