<?PHP session_start();

function generateCode($characters) 
{
		/* list all possible characters, similar looking characters and vowels have been removed */
		$possible = '123456789AtKinSonsEFGHIJKLMNOPQRSTUVWXYZ';
		$code = '';
		$i = 0;
		while ($i < $characters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
}

		$width =  '250';
		$height = '90';
		$characters = '5';
		
		$code = generateCode($characters);
		/* font size will be 75% of the image height */
		$font_size = 30;//$height * 0.45; //10;//
		$image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
		/* set the colours */
		$background_color = imagecolorallocate($image, 234, 234, 234);
		$text_color = imagecolorallocate($image, 0, 0, 0);
		$noise_color = imagecolorallocate($image, 90, 90, 90);
		/* generate random dots in background */
		for( $i=0; $i<($width*$height)/5; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		/* generate random lines in background */
		for( $i=0; $i<($width*$height)/300; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		/* create textbox and add text */
		$textbox = imagettfbbox($font_size, 0,  "assets/arial.ttf", $code) or die('Error in imagettfbbox function');
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color,  "assets/arial.ttf" , $code) or die('Error in imagettftext function');
		/* output captcha image to browser */
		header('Content-Type: image/jpeg');
		header('Cache-Control: no-cache, must-revalidate');
		imagejpeg($image);
		imagedestroy($image);
		$_SESSION['security_code'] = $code;		
	

	

?>