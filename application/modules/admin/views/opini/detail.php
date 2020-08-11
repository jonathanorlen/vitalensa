<div class="page page-tables-footable" style="z-index:0">

  <div class="pageheader">

    <h2>Berita</h2>

    <div class="page-bar">

      <ul class="page-breadcrumb">
        <li>
          <a href="<?php echo base_url().'admin/dasboard'?>"><i class="fa fa-home"></i> Dashboard</a>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/opini'?>">Opini</a>
        </li>
        <li>
          <a href="#">Detail Opini</a>
        </li>
      </ul>

    </div>

  </div>

  <!-- row -->
  <div class="row" style="z-index:0">
    <!-- col -->
    <div class="col-md-12">


      <!-- tile -->
      <section class="tile">

        <!-- tile header -->
        <div class="tile-header dvd dvd-btm">
          <h1 class="custom-font"><strong>Detail</strong></h1>
        </div>
        <div class="tile-body">
          <?php
          $id = $this->uri->segment(4);
          $get = $this->db->query("SELECT * FROM berita where id='$id'");
          $hasil = $get->row();

          $string_foto = $hasil->foto;
          list($name_img) = (explode('|',$string_foto));
          ?>
          <form class="form-horizontal" name="data_form" role="form" method="post" id="data_form" data-parsley-validate="" action="" novalidate="">

            <div class="form-group">
              <label class="col-sm-2 control-label">Judul Opini</label>
              <div class="col-sm-8">
                <input disabled="" type="text" name="nip" class="form-control" value="<?php echo $hasil->judul?>" placeholder="Judul Berita" required="" data-parsley-id="4708"><ul class="parsley-errors-list" id="parsley-id-4708"></ul>
              </div>
            </div>

            <hr class="line-dashed line-full">

            <div class="form-group">
              <label class="col-sm-2 control-label">Display</label>
              <div class="col-sm-8">
                <textarea style="width:100%;height:100px" class="form-control" disabled>
                  <?php echo $hasil->display?>
                </textarea>
              </div>
            </div>

            <hr class="line-dashed line-full">

            <div class="form-group">
              <label class="col-sm-2 control-label">WYSIWYG</label>
              <div class="col-sm-10">
                <div id="summernote">Hello Summernote</div>
              </div>
            </div>


          </div>
          <div class="tile-footer text-right bg-tr-black lter dvd dvd-top">
            <!-- SUBMIT BUTTON -->
            <a href="<?php echo base_url().'admin/berita'?>" class="btn btn-warning pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-success" id="form4Submit">Submit</button>
          </div>
        </form>
        <!-- /tile body -->

      </section>
      <!-- /tile -->

    </div>
    <!-- /col -->
  </div>
  <!-- /row -->

</div>
<script type="text/javascript">
  $('#summernote').summernote({
    height: 200
  });
</script>

