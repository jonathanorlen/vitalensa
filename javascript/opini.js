// document.getElementById("textarea").addEventListener("keyup", check_form);

 $(document).ready(function(){
   var _URL = window.URL || window.webkitURL;

   $('#banner').change(function () {
     var file  =  $(this)[0].files[0];

     img = new Image();
     var imgwidth = 0;
     var imgheight = 0;
     var maxwidth = 1680;
     var maxheight = 800;

     img.src = _URL.createObjectURL(file);
     img.onload = function() {
       imgwidth = this.width;
       imgheight = this.height;
       if(imgwidth == maxwidth && imgheight == maxheight){
         $("#prev_img").attr("src",img.src);
         $("#preview").hide();
         $("#prev_img").show();
         $("#banner_alert").hide();
       }else{
        $("#banner_text").text('Ukuran Banner Harus 1680 x 800');
        $("#banner_alert").show();
        $("#banner").filestyle('clear');
        $('#banner').val(''); 
        $("#prev_img").attr("src",'');
        $("#preview").show();
        $("#prev_img").hide();
      }
    };
    img.onerror = function() {             
     $("#response").text("not a valid file: " + file.type);
   }

 });

   $('#foto').change(function () {
     var file  =  $(this)[0].files[0];

     img = new Image();
     var imgwidth = 0;
     var imgheight = 0;
     var maxwidth = 500;
     var maxheight = 400;

     img.src = _URL.createObjectURL(file);
     img.onload = function() {
       imgwidth = this.width;
       imgheight = this.height;
       if(imgwidth >= maxwidth && imgheight >= maxheight){
         $("#prev_img_display").attr("src",img.src);
         $("#image_display").hide();
         $("#prev_img_display").show();
         $("#image_display_alert").hide();
       }else{
        $("#image_display_text").text('Ukuran Display Image Harus Di Atas 500 x 400');
        $("#image_display_alert").show();
        $("#foto").filestyle('clear');
        $('#foto').val(''); 
        $("#prev_img_display").attr("src",'');
        $("#image_display").show();
        $("#prev_img_display").hide();
      }
    };
    img.onerror = function() {             
     $("#response").text("not a valid file: " + file.type);
   }

 });
 });


 function check_form(){

  var judul_berita = $('#judul').val();
  var display = $('#display').val();
  var isi = $('.textarea').val();
  var image_display = $('#foto').val();

  if(judul_berita.length < 15){
    document.getElementById("list_judul_berita").style.color = "#ff5555";
    document.getElementById("icon_judul_berita").classList.remove('fa-check');
    document.getElementById("icon_judul_berita").classList.add('fa-times');

  }else{
    document.getElementById("list_judul_berita").style.color = "#36de02";
    document.getElementById("icon_judul_berita").classList.remove('fa-times');
    document.getElementById("icon_judul_berita").classList.add('fa-check');
  }

  if(display.length > 100 || display.length < 30){
    document.getElementById("list_display_text").style.color = "#ff5555";
    document.getElementById("icon_display_text").classList.remove('fa-check');
    document.getElementById("icon_display_text").classList.add('fa-times');
  }else{
    document.getElementById("list_display_text").style.color = "#36de02";
    document.getElementById("icon_display_text").classList.remove('fa-times');
    document.getElementById("icon_display_text").classList.add('fa-check');
  }

  // if(isi.length < 350){
  //   document.getElementById("list_isi_berita").style.color = "#ff5555";
  //   document.getElementById("icon_isi_berita").classList.remove('fa-check');
  //   document.getElementById("icon_isi_berita").classList.add('fa-times');
  // }else{
  //   document.getElementById("list_isi_berita").style.color = "#36de02";
  //   document.getElementById("icon_isi_berita").classList.remove('fa-times');
  //   document.getElementById("icon_isi_berita").classList.add('fa-check');
  // }

  if(image_display == ''){
    document.getElementById("list_image_display").style.color = "#ff5555";
    document.getElementById("icon_image_display").classList.remove('fa-check');
    document.getElementById("icon_image_display").classList.add('fa-times');
  }else{

    document.getElementById("list_image_display").style.color = "#36de02";
    document.getElementById("icon_image_display").classList.remove('fa-times');
    document.getElementById("icon_image_display").classList.add('fa-check');
  }

  if(image_display == '' || display.length > 100 || display.length < 30 || judul_berita.length < 15){
    document.getElementById("submit").disabled = true;
  }else{
    document.getElementById("submit").disabled = false;
  }
  
  }; 
