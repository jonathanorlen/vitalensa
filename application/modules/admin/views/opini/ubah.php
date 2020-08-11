<script type="text/javascript" src="<?php echo base_url().'javascript/berita.js'?>"></script>

<div class="page page-tables-footable" style="z-index:0">

  <div class="pageheader">

    <h2>Opini</h2>

    <div class="page-bar">

      <ul class="page-breadcrumb">
        <li>
          <a href="<?php echo base_url().'admin/dasboard'?>"><i class="fa fa-home"></i> Dashboard</a>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/opini'?>">Opini</a>
        </li>
        <li>
          <a href="#">Ubah Opini</a>
        </li>
      </ul>

    </div>

  </div>

  <div id="sukses">

  </div>
  <!-- row -->
  <div class="row" style="z-index:0">
    <!-- col -->

    <form name="data_form" role="form" method="post" id="data_form" data-parsley-validate=""  novalidate="" enctype="multipart/form-data">

      <div class="col-md-8 col-xs-12 pull-left">

      	<?php 
        $id = $this->uri->segment(4);
        $renungan = $this->db->get_where('content',array('id' => $id))->row();
        ?>
        <!-- tile -->
        <div class="tile">

          <!-- tile header -->
          <div class="tile-header dvd dvd-btm bg-blue">
            <h1 class="custom-font"><i class="fa fa-pencil"></i> <strong>Ubah</strong> Tulis Opini</h1>
          </div>
          <div class="tile-body">

            <div class="form-group">
              <label>Judul Opini</label>
              <input type="hidden" name="id" value="<?php echo $renungan->id?>">
              <input type="text" class="form-control" required name="judul" id="judul" placeholder="Judul" onkeyup="check_form()" value="<?php echo $renungan->judul?>"/>
            </div>

            <hr class="line-dashed line-full">

            <div class="form-group">
              <label class="control-label">Display</label>
              <textarea class="form-control" name="display" required id="display" placeholder="Display" style="width: 100%; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" onkeyup="check_form()" >
              	<?php echo $renungan->display?>
              </textarea>
            </div>

            <hr class="line-dashed line-full">

            <div class="form-group">
              <label class="control-label">Isi</label>
              <textarea class="textarea" id="textarea" required name="isi" id="isi" placeholder="Display" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" onkeyup="check_form()" >
              	<?php echo $renungan->text?>
              </textarea>
            </div>
          </div>
          <!-- /tile body -->

        </div>
        <!-- /tile -->

      </div>

      <div class="col-md-4 col-xs-12 pull-right">


        <!-- tile -->
        <div class="tile">

          <!-- tile header -->
          <div class="tile-header dvd dvd-btm bg-lightred">
            <h1 class="custom-font"><i class="fa fa-image"></i> <strong>Pengaturan Gambar</strong></h1>
          </div>
          <div class="tile-body">

            <div id="image_display" <?php if(!empty($renungan->foto)){echo "hidden";}?> style="width:80%;height:200px;margin:0 auto;border: 3px solid gray;border-radius: 3px;margin-bottom: 15px;border-style: dashed;">
              <div style="width:100%;height:100%">
                <center> 
                  <h2>
                    Image Display Harus Di Isi
                    <br>
                    <p>
                      <h3>Ukuran Di atas <span style="color:red">500 x 400</span></h3>
                    </p>
                    <p>
                      <h1><i class="fa fa-upload"></i></h1>
                    </p>
                  </h2>
                </center>
              </div>
            </div>
            <img src="<?php echo base_url().'/foto/'.$renungan->foto?>" id="prev_img_display" width="100%" height='auto' <?php if(empty($renungan->foto)){echo "hidden";}?> style="border:3px solid grey;border-style: dashed;">
            
            <div class="alert alert-danger alert-dismissable" id="image_display_alert" hidden style="margin-bottom:10px">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Alert!</strong> <span id="image_display_text"></span>
            </div>

            <div class="form-group">
              <label class="control-label">Image Display</label>
              <input type="file" required name="foto" id="foto" onchange="check_form()" class="filestyle" data-buttonText="Image Display" data-iconName="fa fa-inbox" accept="image/*">
            </div>
          </div>

          <ul class="fa-ul" style="margin-left:50px">
            <li id="list_judul_berita" style="color:#36de02">
              <h4>
                <i class="fa-li fa fa-check" id="icon_judul_berita"></i>Judul Berita <small>( 15 Huruf )</small>
              </h4>
            </li>
            <li id="list_display_text" style="color:#36de02">
              <h4>
                <i class="fa-li fa fa-check" id="icon_display_text"></i>Display Text <small>( 250 Huruf )</small>
              </h4>
            </li>
            <!-- <li id="list_isi_berita" style="color:#36de02">
              <h4>
                <i class="fa-li fa fa-check" id="icon_isi_berita"></i>Isi Berita <small>( 350 Huruf )</small>
              </h4>
            </li> -->
            <li id="list_image_display" style="color:#36de02">
              <h4>
                <i class="fa-li fa fa-check" id="icon_image_display"></i>Image Display
              </h4>
            </li>
          </ul>

          <div class="tile-footer text-right bg-tr-black lter dvd dvd-top">
            <!-- SUBMIT BUTTON -->
            <!-- <a href="<?php echo base_url().'admin/berita'?>" class="btn btn-warning pull-left"><i class="fa fa-arrow-left"></i> Kembali</a> -->
            <button type="submit" class="btn btn-success" id="submit_ubah">Submit</button>
          </div>

          <!-- /tile body -->

        </div>
        <!-- /tile -->

      </div>

    </form>
    <!-- /col -->
  </div>
  <!-- /row -->

  <div id="snackbar">Some text some message..</div>

</div>

<div id="modal-gate">
  
</div>
<a href="#" class="float" id="image">
    <i class="fa fa-file-image-o my-float" style="font-size:30px;font-color:white"></i>
</a>

<script type="text/javascript">
   $("a#image").click( function() {    
        
        $('#modal-gate').load('<?php echo base_url().'admin/modal_image'?>');
        
    });
</script>

<script type="text/javascript">
 $("#data_form").submit( function() {    
  var formData = new FormData($(this)[0]);

  $.ajax( {  
   type :"post",  
   method: 'POST',
   url : "<?php echo base_url() . 'admin/opini/simpan_ubah' ?>",  
   cache :false,  
   contentType: false,
   processData: false,
   data :formData,
   success : function(data) {  
    if(data == 1){
      var alert = '<div class="alert alert-success">Sudah Di simpan.</div>';
      $("#sukses").html(alert); 
      document.getElementById("snackbar").style.color = "white";
      document.getElementById("snackbar").style.background = "green";

      $("#snackbar").addClass(" btn-warning");
      $("#snackbar").text("Data Berhasil Di Simpan !");

      var x = document.getElementById("snackbar")
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);

      setTimeout(function(){
        window.location = "<?php echo base_url() . 'admin/opini' ?>";
      }   ,1500);  
    }else{
      var alert = '<div class="alert alert-warning">Form Tidak Lengkap.</div>';
      $("#sukses").html(alert);   

      document.getElementById("snackbar").style.color = "white";
      document.getElementById("snackbar").style.background = "red";

      $("#snackbar").addClass(" btn-warning");
      $("#snackbar").text("Form Tidak lengkap !");

      var x = document.getElementById("snackbar")
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    }                
  },  
  error : function() {  
   alert("Data gagal dimasukkan.");  
 }  
});
  return false;                          
});  
</script>