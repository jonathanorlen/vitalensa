function image_square($id) {
  var img = $id;
 $("<img>").attr("src", $(img).attr("src")).load(function(){
  alert(img);
  var realWidth = this.width;
  var realHeight = this.height;
  alert("Original width=" + realWidth + ", " + "Original height=" + realHeight);
});
}