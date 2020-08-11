
<div class="modal fade" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:45px">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title custom-font">Image</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">
                            <!-- <div class="input-group">
                                <input type="text" class="form-control" name="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="search">Search!</button>
                                </span>
                              </div> -->
                              <div style="width:100%;height:100%;overflow-x:scroll;">
                                <div class="tile-body p-0">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th width="13%">Gambar</th>
                                        <th width="65%">Judul</th>
                                        <th width="22%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $num = 0;
                                      $this->db->order_by('id','desc');
                                      $cari = $this->input->post('cari');
                                      if($cari == ''){
                                        $get = $this->db->get('galery')->result();
                                      }else{
                                        $get = $this->db->query(" SELECT * FROM galery WHERE judul LIKE '%$cari%' ");
                                      }
                                      foreach ($get as $value) {
                                        ?>
                                        <tr>
                                          <td><div class="container-square" style="background-image:url(<?php echo base_url()?>foto/<?php echo $value->foto?>)"></div></td>
                                          <td><?php echo $value->judul ?>
                                            <p id="<?php echo $num?>" style="font-size:13px">
                                             <h7> <?php echo base_url().'foto/'.$value->foto?>
                                             </p>
                                           </td>
                                           <td>
                                            <a title="Copy Link To Clipboard" onclick="myFunction(<?php echo $num?>)" class="btn btn-info btn-rounded btn-icon-only btn-ef btn-ef-7 btn-ef-7c mb-10" style="position:relative;padding:10px 15px">
                                              <i class="fa fa-file-text-o" style="font-size:15px;position:relative;line-height:10px"></i>
                                            </a>
                                            <a key="<?php echo $value->id?>" id="hapus" title="Hapus" class="btn btn-danger btn-rounded btn-icon-only btn-ef btn-ef-7 btn-ef-7c mb-10" style="position:relative;padding:10px 15px">
                                              <i class="fa fa-trash" style="font-size:15px;position:relative;line-height:10px"></i>
                                            </a>
                                          </td>
                                        </tr>
                                        <?php $num++;} ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <form id="image_form" data-parsley-validate=""  novalidate="" enctype="multipart/form-data">
                                <div class="col-md-4">
                                  <div class="tile-body">
                                    <div class="form-group">
                                      <div id="img_display" style="width:100%;height:200px;margin:0 auto;border: 3px solid gray;border-radius: 3px;margin-bottom: 15px;border-style: dashed;">
                                        <div style="width:100%;height:100%">
                                          <center> 
                                            <h2>
                                              Image Display Harus Di Isi
                                              <br>
                                            </h2>
                                          </center>
                                        </div>
                                      </div>
                                      <img src="" id="prev_img" width="100%" height='auto' style="display: none;border:3px solid
                                      grey;border-style: dashed;">
                                      <div class="alert alert-danger alert-dismissable" id="image_display_alert" hidden style="margin-bottom:10px">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Alert!</strong> <span id="image_display_text"></span>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label">Image Display</label>
                                        <input type="file" required name="foto" id="gambar" onchange="check_form()" class="filestyle" data-buttonText="Image Display" data-iconName="fa fa-inbox" accept="image/*">
                                      </div>
                                      <label>Nama Gambar</label>
                                      <input type="text" class="form-control" required="" name="judul" id="judul" placeholder="Nama Gambar" onkeyup="check_form()">
                                    </div>
                                    <hr class="line-dashed line-full">
                                  </div>
                                  <button type="submit" class="btn btn-success" style="float:right;">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-lightred" data-dismiss="modal"><i class="fa fa-times"></i> Exit </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript" src="<?php echo base_url().'javascript/foto.js'?>"></script>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        $('#modal_image').modal('show');   
                      });
                      $("#form").submit( function() {  
                        alert('u');
                      });

                      $("#image_form").submit( function() {    
                        var formData = new FormData($(this)[0]);

                        $.ajax( {  
                         type :"post",  
                         method: 'POST',
                         url : "<?php echo base_url() . 'admin/admin/simpan_galery' ?>",  
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
                            $('#modal_image').modal('hide');   
                            $('#modal-gate').load('<?php echo base_url().'admin/modal_image'?>');
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

                      $("a#hapus").click( function() {    
                        $('#hapus_id').val($(this).attr('key'));    
                        $('#modal_hapus').modal('show');   
                      });

                      function hapus(){
                        var id = $('#hapus_id').val();
                        $.ajax( {  
                          type :"post",  
                          url :"<?php echo base_url() . 'admin/admin/hapus_galery' ?>",  
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

                            $('#modal_image').modal('hide');   
                            $('#modal-gate').load('<?php echo base_url().'admin/modal_image'?>');          
                          },  
                          error : function() {  
                            alert("Data gagal dimasukkan.");  
                          }  
                        });
                        return false;
                      }
                    </script>
                    <script type="text/javascript">
                      $(function () {

                        $("#search").click(function()
                        { 
                          var cari = $('#cari_renungan').val();
                          if(cari =='')
                          {
                            alert('Masukan Nama Pencarian');
                          }else{
                            $.ajax( {  
                              type :"post",  
                              url : "<?php echo base_url() . 'admin/admin/modal_image' ?>",  
                              cache :false,  
                              data :({cari:cari}),
                              beforeSend:function(){
                                $('#modal_image').modal('hide');
                                $(".tunggu").show();  
                              },
                              success : function(data) {
                                $(".tunggu").hide();
                                $('#modal-gate').load('<?php echo base_url().'admin/modal_image/'?>');
                                $("#myModal").modal(); 

                              },  
                              error : function() {  
                                alert("Data gagal dimasukkan.");  
                              }  
                            });

                            return false;   
                          }

                        });
                      });

                      function myFunction(containerid) {

                        var elm = document.getElementById(containerid);

                        if(document.body.createTextRange) {
                          var range = document.body.createTextRange();
                          range.moveToElementText(elm);
                          range.select();
                          document.execCommand("Copy");
                          alert("Copied to clipboard");
                        }
                        else if(window.getSelection) {
                          var selection = window.getSelection();
                          var range = document.createRange();
                          range.selectNodeContents(elm);
                          selection.removeAllRanges();
                          selection.addRange(range);
                          document.execCommand("Copy");
                          alert("Copied to clipboard");
                        }
                      }
                    </script>
