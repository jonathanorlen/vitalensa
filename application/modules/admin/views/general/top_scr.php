<!doctype html>
<html lang="en">



<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>VITALENSA ADMIN</title>
    <link rel="icon" type="image/ico" href="<?php echo base_url().'component/gkjw.png'?>" />
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>



        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="<?php echo base_url().'component/assets/css/vendor/bootstrap.min.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'component/assets/css/vendor/animate.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'component/assets/css/vendor/font-awesome.min.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'component/assets/js/vendor/animsition/css/animsition.min.css'?>">


        <!-- project main css files -->
        <link rel="stylesheet" href="<?php echo base_url().'component/assets/css/main.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'component/navbar/stylecu.css'?>">
        <!--/ stylesheets -->

        <link rel="stylesheet" href="<?php echo base_url().'css/normalize.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'css/stylesheet.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'css/selectize.css'?>">
        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="<?php echo base_url().'javascript/jquery.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'javascript/selectize.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'javascript/orlen_js.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'javascript/index.js'?>"></script>
        <script src="<?php echo base_url().'component/assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js'?>"></script>

        <link href="<?php echo base_url() . 'component/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'?>" rel="stylesheet" type="text/css" />
        <!--/ modernizr -->




    </head>

    <body id="minovate" class="appWrapper hz-menu">

        <div id="wrap" class="animsition">






            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
            <div class="navbar-cu bg-greensea" style="z-index: 1000">
                <a style="padding-bottom:10px !important" onclick="openNav()"><span style="cursor:pointer;color:#fff">&#9776;</span></a>
                <a class="display" style="float:right;color:#fff" data-toggle="modal" data-target="#myModal" onclick="backMenu();"><img src="<?php echo base_url().'foto/'.$this->session->userdata('username')->foto?>" width="27px" height="27px" style="border-radius:100%;border-color:black;margin-right:5px">
                </a>
            </div>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><img src="<?php echo base_url().'foto/'.$this->session->userdata('username')->foto?>" width="35px" height="35px" style="border-radius:100%;border-color:black;margin-right:5px">
                        <?php echo $this->session->userdata('username')->name?></h4>
                    </div>
                    <div class="modal-body" id="change-menu" style="padding:10px">
                      <div class="list-group">
                          <a href="#" class="list-group-item" onclick="openprofile()">Ubah Profile</a>
                          <a href="#" class="list-group-item" onclick="openPasword()">Ubah Password</a>
                      </div>
                  </div>
                  <div class="modal-body" id="change-profile" style="padding:10px;display: none;">
                    <div class="form-group">
                        <i class="fa fa-arrow-left" onclick="backMenu()" style="font-size:20px"> Back</i>
                    </div>
                    <form name="profile_form" role="form" method="post" id="profile_form" data-parsley-validate=""  novalidate="" enctype="multipart/form-data">
                        <div class="form-group" style="text-align:center;">
                          <img src="<?php echo base_url().'foto/'.$this->session->userdata('username')->foto?>" style="width:200px;height:200px; border:1px solid black; border-radius:100%;">
                          <br>
                          <br>
                          <input type="file" required name="foto" id="gambar" class="filestyle" data-buttonText="Foto Profile" data-iconName="fa fa-inbox" accept="image/*" onchange="image_square('gambar')">
                      </div>
                      <div class="form-group">
                          <label for="usr">Name : </label>
                          <input type="text" class="form-control" name="name" id="name" value="<?php echo  $this->session->userdata('username')->name?>">
                      </div>
                      <div class="form-group">
                        <label for="usr">Username : </label>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $this->session->userdata('username')->username?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="submit" style="width:100%;">SUBMIT</button> 
                    </div>
                </form>
            </div>
            <div class="modal-body" id="change-password" style="padding:10px;display:none">
               <div class="form-group">
                <i class="fa fa-arrow-left" onclick="backMenu()" style="font-size:20px"> Back</i>
            </div>
            <form name="password_form" role="form" method="post" id="password_form" data-parsley-validate=""  novalidate="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usr">Password :</label>
                    <input type="password" class="form-control" id ="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}>
                </div>
                <div class="form-group">
                    <label for="usr">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" id="submit" style="width:100%;">SUBMIT</button> 
                </div>
            </form>

        </div>
        <div class="modal-footer" id="logout">
            <a href="<?php echo base_url().'admin/logout'?>" >
                <button type="button" class="btn btn-default"style="width:100%">Log Out</button>    
            </a>
        </div>
    </div>
</div>
</div>


<script>
    $("#profile_form").submit( function() {    
        var formData = new FormData($(this)[0]);

        $.ajax( {  
         type :"post",  
         method: 'POST',
         url : "<?php echo base_url() . 'admin/ubah_profile' ?>",  
         cache :false,  
         contentType: false,
         processData: false,
         data :formData,
         success : function(data) {  
          if(data == 1){
            location.reload();

        }else{

        }             
    },  
    error : function() {  
       alert("Data gagal dimasukkan.");  
   }  
});
        return false;                          
    });  

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }

    function openprofile() {
        $("#change-profile").show();
        $("#change-menu").hide();
        $("#logout").hide();
    }

    function openPasword() {
        $("#change-password").show();
        $("#change-menu").hide();
        $("#logout").hide();
    }

    function backMenu() {
        $("#change-profile").hide();
        $("#change-password").hide();
        $("#change-menu").show();
        $("#logout").show();
    }

    $("#password_form").submit( function() {    
        var formData = new FormData($(this)[0]);

        var password = $("#password").val();
        var konfirmasi = $("#confirm").val();
        if(password == konfirmasi){
            $.ajax( {  
             type :"post",  
             method: 'POST',
             url : "<?php echo base_url() . 'admin/ubah_password' ?>",  
             cache :false,  
             contentType: false,
             processData: false,
             data :formData,
             success : function(data) {  
                if(data == 1){
                    window.location.href = "<?php echo base_url() . 'admin/logout' ?>";
                }else{
                    alert("Error, return again");
                }             
            },  
            error : function() {  
                alert("Data gagal dimasukkan.");  
            }  
        });
        }else{
            alert("Password dan Konfirmasi Password tidak sama");
        }
        return false;         
    }); 

    function CheckPassword(inputtxt) 
    { 
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        if(inputtxt.value.match(passw)) 
        { 
            alert('Correct, try another...')
            return true;
        }
        else
        { 
            alert('Wrong...!')
            return false;
        }
    }
</script>

<style type="text/css">
    .dropdown-menu{
        top:initial !important;
        float: none !important;
        left:19px
    }

    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;} 
        to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;} 
        to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }

</style>