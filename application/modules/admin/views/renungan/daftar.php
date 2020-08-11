<div class="page page-tables-footable" style="z-index:0">

	<div class="pageheader">

		<h2>Renungan</h2>

		<div class="page-bar">

			<ul class="page-breadcrumb">
				<li>
					<a href="<?php echo base_url().'admin/dasboard'?>"><i class="fa fa-home"></i> Dashboard</a>
				</li>
				<li>
					<a href="#">Renungan</a>
				</li>
			</ul>

		</div>

	</div>

	<div class="row">
		<div class="col-md-2 col-xs-6">
			<a href="<?php echo base_url().'admin/renungan/tambah'?>">
				<button type="button" class="btn btn-primary btn-lg mb-10" style="width:100%;border:0px solid black">
					<i class="fa fa-pencil"></i> Tulis Renungan
				</button>
			</a>
		</div>
		<!-- <div class="col-md-2 col-xs-6">
			<button type="button" class="btn btn-default btn-lg mb-10" style="width:100%"><i class="fa fa-list"></i> Daftar</button>
		</div> -->
	</div>

	<div class="sukses">
		
	</div>
	<!-- row -->
	<div class="row">
		<!-- col -->
		<div class="col-md-12">


			<!-- tile -->
			<section class="tile">

				<!-- tile header -->
				<div class="tile-header dvd dvd-btm">
					<h1 class="custom-font"><strong>Daftar</strong></h1>
				</div>
				<!-- /tile header -->

				<!-- tile body -->
				<div class="tile-body">

					<div class="table-responsive">
						<table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom footable-loaded phone breakpoint">
							<thead>
								<tr>
									<th width="10%">No</th>
									<th width="45%">Judul</th>
									<th width="">Tanggal</th>
									<th width="20%">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php
								/*if($akses != 'su')
								{
									$this->db->where('upload',$ambil->id);
								}*/
								$get_event = $this->db->query("SELECT * FROM content WHERE category='renungan'");
								$hasil_event = $get_event->result();
								$i = 0;
								foreach ($hasil_event as $item){
									$i ++;
									?>                

									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $item->judul;?></td>
										<td><?php echo tanggalindo($item->date);?></td>
										<td>
											<a id="share" key="<?php echo $item->id?>" title="Share" class="btn btn-primary btn-rounded btn-icon-only btn-ef btn-ef-7 btn-ef-7c mb-10" style="position:relative;padding:10px 15px;text-decoration:none">
												<i class="fa fa-share-alt" style="font-size:15px;position:relative;line-height:10px"></i>
											</a>
											<a href="<?php echo base_url().'web/read/renungan/'.$item->id?>" target="_blank" title="Preview" class="btn btn-info btn-rounded btn-icon-only btn-ef btn-ef-7 btn-ef-7c mb-10" style="position:relative;padding:10px 15px">
												<i class="fa fa-file-text-o" style="font-size:15px;position:relative;line-height:10px"></i>
											</a>
											<a href="<?php echo base_url().'admin/renungan/ubah/'.$item->id?>" title="Ubah" class="btn btn-warning btn-rounded btn-icon-only btn-ef btn-ef-7 btn-ef-7c mb-10" style="position:relative;padding:10px 15px">
												<i class="fa fa-pencil" style="font-size:15px;position:relative;line-height:10px"></i>
											</a>
											<a key="<?php echo $item->id?>" id="hapus" title="Hapus" class="btn btn-danger btn-rounded btn-icon-only btn-ef btn-ef-7 btn-ef-7c mb-10" style="position:relative;padding:10px 15px">
												<i class="fa fa-trash" style="font-size:15px;position:relative;line-height:10px"></i>
											</a>
										</td>
									</tr>

									<?php } ?>

								</tbody>
								
							</table>
						</div>
					</div>
					<!-- /tile body -->

				</section>
				<!-- /tile -->

			</div>
			<!-- /col -->
		</div>
		<!-- /row -->
		<div id="snackbar">Some text some message..</div>
		
	</div>

	<div id="modal-gate">
		
	</div>

<div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:45px">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title custom-font">Alert!</h3>
			</div>
			<div class="modal-body">
				<input type="hidden" id="hapus_id" value="">
				Apakah anda yakin akan menghapus Content tersebut?
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" onclick="hapus()"><i class="fa fa-trash"></i> Hapus</button>
				<button class="btn btn-lightred" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
			</div>
		</div>
	</div>
</div>

<script>
	$("a#share").click( function() {    
			var id = $(this).attr('key');
    		$('#modal-gate').load('<?php echo base_url().'admin/modal_share/'?>'+id);

  		});

	$("a#hapus").click( function() {    
		$('#hapus_id').val($(this).attr('key'));    
		$('#modal_hapus').modal('show');   
	});

	function hapus(){
		var id = $('#hapus_id').val();
		$.ajax( {  
			type :"post",  
			url :"<?php echo base_url() . 'admin/renungan/hapus' ?>",  
			cache :false,  
			data :{id:id},
			success : function(data) { 
				$(".sukses").html(data);   
				$('#modal_hapus').modal('hide'); 

				document.getElementById("snackbar").style.color = "white";
				document.getElementById("snackbar").style.background = "green";

				$("#snackbar").addClass(" btn-warning");
				$("#snackbar").text("Data Berhasil Di Hapus !");

				var x = document.getElementById("snackbar")
				x.className = "show";
				setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);

				setTimeout(function(){window.location = "<?php echo base_url() . 'admin/renungan/daftar' ?>";},1000);              
			},  
			error : function() {  
				alert("Data gagal dimasukkan.");  
			}  
		});
		return false;
	}

</script>