<?php
if(isset($_POST["gambar"]) AND $_POST["gambar"]!=""){
	function get_luminance($pixel){
		$pixel = sprintf('%06x',$pixel);
		$red = hexdec(substr($pixel,0,2))*0.30;
		$green = hexdec(substr($pixel,2,2))*0.59;
		$blue = hexdec(substr($pixel,4))*0.11;
		return $red+$green+$blue;
	}

	$dir = './edge/';
	foreach(glob($dir.'*.*') as $v){
		unlink($v);
	}
	$img = $_POST["gambar"];
	$source_image = $img;
	$starting_img = imagecreatefromjpeg($source_image);
	$im_data = getimagesize($source_image);
	$final = imagecreatetruecolor($im_data[0],$im_data[1]);
	for($x=1;$x<$im_data[0]-1;$x++){
		for($y=1;$y<$im_data[1]-1;$y++){
			$pixel_up = get_luminance(imagecolorat($starting_img,$x,$y-1));
			$pixel_down = get_luminance(imagecolorat($starting_img,$x,$y+1)); 
			$pixel_left = get_luminance(imagecolorat($starting_img,$x-1,$y));
			$pixel_right = get_luminance(imagecolorat($starting_img,$x+1,$y));
			$pixel_up_left = get_luminance(imagecolorat($starting_img,$x-1,$y-1));
			$pixel_up_right = get_luminance(imagecolorat($starting_img,$x+1,$y-1));
			$pixel_down_left = get_luminance(imagecolorat($starting_img,$x-1,$y+1));
			$pixel_down_right = get_luminance(imagecolorat($starting_img,$x+1,$y+1));
	 
			// konvolusion
			$conv_x = ($pixel_up_right+($pixel_right*2)+$pixel_down_right)-($pixel_up_left+($pixel_left*2)+$pixel_down_left);
			$conv_y = ($pixel_up_left+($pixel_up*2)+$pixel_up_right)-($pixel_down_left+($pixel_down*2)+$pixel_down_right);
	 
			// hitung jarak
			// $gray = sqrt($conv_x*$conv_x+$conv_y+$conv_y);
			$gray = abs($conv_x)+abs($conv_y);
	 
			// inverting tapi tidak negative                
			$gray = 255-$gray;
	 
			if($gray > 255){
				$gray = 255;
			}
			if($gray < 0){
				$gray = 0;
			}
	 
			$new_gray  = imagecolorallocate($final,$gray,$gray,$gray);
			imagesetpixel($final,$x,$y,$new_gray);            
		}
	}	
	$random_image_id = rand();
	$create_new_imgs = $dir.$random_image_id.$img;
	imagejpeg($final, $create_new_imgs, 100);
	imagedestroy($starting_img);
	imagedestroy($final);
	//print '<h2>Hasil Edge Detection (Sobel)</h2><hr/><div class="clear"></div>';
	print '<img width="100" src="'.$create_new_imgs.'"/>';
}else{
	print '<h2>Silahkan pilih salah satu gambar disamping terlebih dahulu.</h2><div class="clear"></div>';
}
?>
