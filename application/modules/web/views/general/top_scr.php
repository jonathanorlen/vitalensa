<!DOCTYPE html>
<html>
<head>
	<title>
		Vitalensa - Family Blogger
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'front/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'front/css/stylecu.css'?>">
	<script src="<?php echo base_url().'javascript/jquery-3.3.1.min.js'?>"></script>
	<!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<style>

	.search{
		/*float: right;
		padding: 6px;
		margin-top: 8px;
		margin-right: 16px;
		border: none;*/
		padding: 6px;
		margin-right: 16px;
		border:0.1px solid #c1c1c1;
		font-size: 17px;
		width:100%;
	}

	@media screen and (max-width: 600px) {
		.search{
			float: none;
			display: block;
			text-align: left;
			margin: 0;
			padding: 14px;
		}

		.search{
			border: 1px solid #ccc;  
		}
	}

	@font-face {
		font-family: "SF Display Bold";
		src: url("<?php echo base_url()?>front/fonts/SFProDisplay-Bold.ttf");
	}

	@font-face {
		font-family: "SF Text Bold";
		src: url("<?php echo base_url()?>front/fonts/SFProText-Bold.ttf");
	}

	@font-face {
		font-family: "SF Display Semibold";
		src: url("<?php echo base_url()?>front/fonts/SFProDisplay-Semibold.ttf");
	}

	@font-face {
		font-family: "SF Text Semibold";
		src: url("<?php echo base_url()?>front/fonts/SFProText-Semibold.ttf");
	}

	@font-face {
		font-family: "SF Display Heavy";
		src: url("<?php echo base_url()?>front/fonts/SFProDisplay-Heavy.ttf");
	}

	@font-face {
		font-family: "SF Display Regular";
		src: url("<?php echo base_url()?>front/fonts/SFProDisplay-Regular.ttf");
	}

	@font-face {
		font-family: "SF Display Medium";
		src: url("<?php echo base_url()?>front/fonts/SFProDisplay-Medium.ttf");
	}

	@font-face {
		font-family: "SF Text Regular";
		src: url("<?php echo base_url()?>front/fonts/SFProText-Regular.ttf");
	}

</style>
</head>
<body>

	<!-- <div class="parallax" style="height:450px !important;z-index:-100"></div> -->
	<?php if($menu == 'index'){?>
	<div class="parallax" style="height:340px;width:100%;position:absolute;background-color:red;background-image: url('<?php echo base_url().'front/image/wallpaper2.jpg'?>');">

	</div>
	<?php }?>
	<div class="main-content sticky-topcu">
		<div class="container">
			<div class="row" >
				<div class="col-md-12 center" style="padding-right:0px;padding-left:0px">
					<div class="nav">
						<div class="nav-header">
							<div class="nav-title">
								<a href="<?php echo base_url()?>" style="text-decoration:none;color:#5CBE95">
									VITALENSA
								</a>
							</div>
						</div>
						<div class="nav-btn">
							<label for="nav-check">
								<span></span>
								<span></span>
								<span></span>
							</label>
						</div>
						<input type="checkbox" id="nav-check">
						<div class="nav-links" style="align-self: center;">
							<a class="hide" style="width:330px;height:0px"></a>
							<a class="anav" href="<?php echo base_url().'web/kategori/opini'?>">Opini</a>
							<a class="anav" href="<?php echo base_url().'web/kategori/renungan'?>">Renungan</a>
							<a class="anav" href="<?php echo base_url().'web/kategori/aktivitas'?>">Aktivitas</a>
							<a>
								<input type="text" placeholder="Search.." class="search" id="input_search">
							</a>
							<a>
								<button type="button" id="search" class="btn-lg btn-secondry search-float" style="border-radius:40px;border:0px solid black;padding: 10px 20px 10px 20px"><i class="fa fa-search"></i></button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:45px">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title custom-font">Hasil Pencarian</h3>
				</div>
				<div class="modal-body">
					<span style="font-family:SF Display Bold;font-size:65px;font-size:#c6c6c6">
						Coming Soon
					</span>
					</div>
					<div class="modal-footer">
						<button class="btn btn-lightred" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-gate">
			
		</div>
		<?php if($menu == 'index'){?>
		<h1 style="z-index:10;position:absolute;width:100%;text-align:center;color:white;font-family:SF Display Semibold" id="hellos"></h1>
		<?php }?>


		<script type="text/javascript">
			$("#search").click( function() {
				$('#modal_search').modal('show');    
				/*var search = $('#input_search').val();
				$('#modal-gate').load(<?php echo base_url().'web/modal_search/'?>+search);   */
			});

			var d = new Date();
			var n = d.getHours();

			if(n >= 6 && n <= 10){
				var hellos = ["Selamat Datang", "Selamat Pagi"];
			}

			if(n >= 11 && n <= 14){
				var hellos = ["Selamat Datang", "Selamat Siang"];
			}

			if(n >= 15 && n <= 18){
				var hellos = ["Selamat Datang", "Selamat Sore"];
			}

			if(n >= 19 && n <= 19){
				var hellos = ["Selamat Datang", "Selamat Petang"];
			}

			if(n >= 20 && n <= 23){
				var hellos = ["Selamat Datang", "Selamat Malam"];
			}
			var index = 0;                                
			$("#hellos").text(hellos[0]);

			(function animate() {                    
				$("#hellos").fadeOut(2000, function() {  
					index = (index + 1) % hellos.length;
					this.textContent = hellos[index];
				}).fadeIn(1000, animate);
			})();
		</script>