$(document).ready(function(){
 var _URL = window.URL || window.webkitURL;
 $('#gambar').change(function () {
  var file  =  $(this)[0].files[0];

   if(file.size < 2000000){
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
         $("#prev_img").attr("src",img.src);
         $("#img_display").hide();
         $("#prev_img").show();
         $("#image_display_alert").hide();
       }else{
        $("#image_display_text").text('Ukuran Display Image Harus Di Atas 500 x 400');
        $("#image_display_alert").show();
        $("#foto").filestyle('clear');
        $('#foto').val(''); 
        $("#prev_img").attr("src",'');
        $("#img_display").show();
        $("#prev_img").hide();
      }
    };
    img.onerror = function() {             
     $("#response").text("not a valid file: " + file.type);
   }
 }else{
  $("#image_display_text").text('Ukuran Gambar tidak boleh melebihi 2mb');
        $("#image_display_alert").show();
        $("#foto").filestyle('clear');
        $('#foto').val(''); 
        $("#prev_img").attr("src",'');
        $("#img_display").show();
        $("#prev_img").hide();
 }
});
});
