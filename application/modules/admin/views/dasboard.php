<style type="text/css">

.containercu-rectangle{
 position: relative;
 background-size:cover;
 background-color:red;
 background-repeat: no-repeat;
 background-position: center;
 border-radius:12px;
 width: 100%;
 padding-top:56.25%; /* 1:1 Aspect Ratio */
}

.containercu-rectangle > .text {
  position: absolute;
  bottom: 8px;
  left: 16px;
  font-size: 18px;
}
</style>
<div id="sukses">

</div>

<div id="modal-gate">

</div>
<section id="content">

    <div class="page page-hz-menu-layout" >

        <div class="pageheader">

            <h2>Dashboard<span>// You can place subtitle here</span></h2>

        </div>

        <!-- <p class="lead">This is the horizontal menu layout template.</p> -->

        <div class="row">
            <div class="col-md-10">
                <div class="col-md-6">
                    <?php 
                    @$get1=$this->db->query("SELECT * FROM home WHERE id='1' ")->row();
                    @$content = $this->db->query("SELECT * FROM content WHERE id='$get1->id_content' ");
                    @$result = $content->row();

                    @$get2=$this->db->query("SELECT * FROM home WHERE id='2' ")->row();
                    @$content2 = $this->db->query("SELECT * FROM content WHERE id='$get2->id_content' ");
                    @$result2 = $content2->row();

                    ?>
                    <div class="containercu-rectangle" style="background-image: url(../foto/<?php echo @$result->foto ?>)!important">
                        <div class="text">

                        </div>
                    </div>
                    <h2>
                        <?php echo @$result->judul;?>
                    </h2>
                </div>

                <div class="col-md-6" >
                    <div class="containercu-rectangle" style="background-image: url(../foto/<?php echo @$result2->foto ?>)!important">
                        <div class="text">
                        </div>
                    </div>
                    <h2><?php echo @$result2->judul;?>
                    </h2>
                </div>
            </div>
            <div class="col-md-2">
                <a id="home" >
                    <div class="tile-widget bg-greensea text-center p-30 col-xs-6 col-md-12">
                        <i class="fa fa-pencil fa-3x"></i>
                        <h4>Edit header</h4>
                    </div>
                </a>
                <a id="image">
                    <section class="tile tile-simple" style="margin-top:20px">
                        <div class="tile-widget bg-dutch text-center p-30 col-xs-6  col-md-12">
                            <i class="fa fa-file-image-o fa-3x"></i>
                            <h4>Galery</h4>
                        </div>
                    </section>
                </a>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:20px">
        <div class="col-md-12">
            <div class="col-md-3 col-6 col-sm-6 col-xs-6">
                <a href="<?php echo('renungan')?>" style="text-decoration:none;">
                    <section class="tile tile-simple">
                        <div class="tile-widget bg-dutch text-center p-30">
                            <i class="fa fa-book fa-3x"></i>
                            <h4>Renungan</h4>
                        </div>
                        <div class="tile-body text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $get_renungan = $this->db->query("SELECT * FROM content WHERE category='renungan'")->result();
                                    $tot_renungan = 0;
                                    foreach ($get_renungan as $renungan) {
                                        $tot_renungan++;
                                    }
                                    ?>
                                    <h2 class="m-0"><?php echo $tot_renungan?></h2>
                                    <span class="text-muted">Content</span>
                                </div>
                                    <!-- <div class="col-md-6">
                                        <h2 class="m-0">964</h2>
                                        <span class="text-muted">New Comments</span>
                                    </div> -->
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-6 col-sm-6 col-xs-6">
                    <a href="<?php echo('opini')?>" style="text-decoration:none;">
                        <section class="tile tile-simple">
                            <div class="tile-widget bg-danger text-center p-30">
                                <i class="fa fa-comments fa-3x"></i>
                                <h4>Opini</h4>
                            </div>
                            <div class="tile-body text-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        $get_opini = $this->db->query("SELECT * FROM content WHERE category='opini'")->result();
                                        $tot_opini = 0;
                                        foreach ($get_opini as $renungan) {
                                            $tot_opini++;
                                        }
                                        ?>
                                        <h2 class="m-0"><?php echo $tot_opini?></h2>
                                        <span class="text-muted">Content</span>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <h2 class="m-0">964</h2>
                                        <span class="text-muted">New Comments</span>
                                    </div> -->
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-6 col-sm-6 col-xs-6">
                    <a href="<?php echo('aktivitas')?>" style="text-decoration:none;">
                        <section class="tile tile-simple">
                            <div class="tile-widget bg-blue text-center p-30">
                                <i class="fa fa-male fa-3x"></i>
                                <h4>Aktivitas</h4>
                            </div>
                            <div class="tile-body text-center">
                                <div class="row">
                                    <div class="col-md-12">
                                     <?php
                                     $get_aktivitas = $this->db->query("SELECT * FROM content WHERE category='aktivitas'")->result();
                                     $tot_aktivitas = 0;
                                     foreach ($get_aktivitas as $renungan) {
                                        $tot_aktivitas++;
                                    }
                                    ?>
                                    <h2 class="m-0"><?php echo $tot_aktivitas?></h2>
                                    <span class="text-muted">Content</span>
                                </div>
                                <!-- <div class="col-md-6">
                                    <h2 class="m-0">964</h2>
                                    <span class="text-muted">New Comments</span>
                                </div> -->
                            </div>
                        </div>
                    </section>
                </a>
            </div>
        </div>
    </div>

</div>

</section>

<!-- <a href="#" class="float">
    <i class="fa fa-file-image-o my-float" style="font-size:30px;font-color:white"></i>
</a> -->

<div class="modal fade" id="modal_home" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:45px">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="data_form" data-parsley-validate=""  novalidate="" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">Ubah Home !</h3>
                </div>
                <div class="modal-body">
                    <h3>Home 1</h3>
                    <select id="select-beast" name="id1" required class="demo-default"
                    placeholder="Select a person...">
                    <option value="">Select a Content...</option>
                    <?php 
                    $home1 = $this->db->get_where('home',array('id',1))->row();
                    $get=$this->db->query("SELECT * FROM content ")->result();
                    foreach ($get as $get) {
                        ?>
                        <option <?php if(@$home1->id_content == $get->id){echo 'selected';}?> value="<?php echo @$get->id?>"><?php echo @$get->judul ?></option>
                        <?php }?>

                    </select>

                    <h3>Home 2</h3>
                    <select id="select-beast2" required class="demo-default"
                    placeholder="Select a person..." name="id2">
                    <option value="">Select a Content...</option>
                    <?php
                    $home2 = $this->db->query("SELECT * FROM home WHERE id='2'")->row();
                    $oke=$this->db->query("SELECT * FROM content ")->result();
                    foreach ($oke as $get1) {
                        ?>
                        <option <?php  if($home2->id_content == $get1->id){echo 'selected';}?> value="<?php echo @$get1->id?>"><?php echo @$get1->judul ?></option>
                        <?php }?>

                    </select>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
                    <button class="btn btn-lightred" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="snackbar">Some text some message..</div>

<div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:45px">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Alert!</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" id="hapus_id" value="">
                Apakah anda yakin akan menghapus Gambar tersebut?
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" onclick="hapus()"><i class="fa fa-trash"></i> Hapus</button>
                <button class="btn btn-lightred" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url().'javascript/image.js'?>"></script>
<script>

    $("a#home").click( function() {    
        $('#modal_home').modal('show');   
    });

    $("a#image").click( function() {    

        $('#modal-gate').load('<?php echo base_url().'admin/modal_image'?>');
        
    });

    $('#select-beast').selectize({
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        }
    });
    $('#select-beast2').selectize({
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        }
    });
    $(".theme-selector").hide();


    $("#data_form").submit( function() {    
        var formData = new FormData($(this)[0]);

        $.ajax( {  
         type :"post",  
         method: 'POST',
         url : "<?php echo base_url() . 'admin/admin/home_edit' ?>",  
         cache :false,  
         contentType: false,
         processData: false,
         data :formData,
         success : function(data) { 
            alert("Data Tersave.");
            location.reload();             
        },  
        error : function() {  
           alert("Data gagal dimasukkan.");  
       }  
   });
        return false;                          
    });
</script>

</script>
