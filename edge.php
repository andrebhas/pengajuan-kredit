<script>
$(function() {
	var a = '<?php echo $_POST["gambar"]; ?>';
	
	
	$("#sobel").html("computing...");
	$.ajax({
		type	: "POST",
		url		: "sobel.php",
		data	: "gambar="+a,
		cache	: false,
		success	: function(r){
			$("#sobel").html(r);
		}
	});
});
</script>

<h2>Hasil Edge Detection</h2><hr/><div class="clear"></div>

<div style="width:100px; text-align:center; margin-right:15px; float:left;">
	Metode <b>Robert</b>
	<div id="robert"></div>
</div>

<div style="width:100px; text-align:center; margin-right:15px; float:left;">
	Metode <b>Prewitt</b>
	<div id="prewitt"></div>
</div>

<div style="width:100px; text-align:center; margin-right:15px; float:left;">
	Metode <b>Sobel</b>
	<div id="sobel"></div>
</div>

<br clear="both"/>