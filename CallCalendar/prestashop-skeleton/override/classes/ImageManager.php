<?php

class ImageManager extends ImageManagerCore
{

	/**
	 * Resize, cut and optimize image
	 *
	 * Zoom & Croop when the destination file name
	 * contains the '_timthumb' phrase
	 * - Modified by www.bazingadesigns.com/en
	 * (TimThumb ZoomCrop port)
	 *
	 * @param string $src_file Image object from $_FILE
	 * @param string $dst_file Destination filename
	 * @param integer $dst_width Desired width (optional)
	 * @param integer $dst_height Desired height (optional)
	 * @param string $file_type
	 * @return boolean Operation result
	 */
	public static function resize($src_file, $dst_file, $dst_width = null, $dst_height = null, $file_type = 'jpg', $force_type = false)
	{
		if (!file_exists($src_file))
			return false;
		list($src_width, $src_height, $type) = getimagesize($src_file);

		// If PS_IMAGE_QUALITY is activated, the generated image will be a PNG with .jpg as a file extension.
		// This allow for higher quality and for transparency. JPG source files will also benefit from a higher quality
		// because JPG reencoding by GD, even with max quality setting, degrades the image.
		if (Configuration::get('PS_IMAGE_QUALITY') == 'png_all'
			|| (Configuration::get('PS_IMAGE_QUALITY') == 'png' && $type == IMAGETYPE_PNG) && !$force_type)
			$file_type = 'png';
		
		if (strpos($dst_file, 'staff') !== FALSE)
			$zoomCrop = true;
		else 
			$zoomCrop = false;

		if (!$src_width)
			return false;

		if (!$dst_width)
			$dst_width = $src_width;
		if (!$dst_height)
			$dst_height = $src_height;
	
		$src_image = ImageManager::create($type, $src_file);

		$width_diff = $dst_width / $src_width;
		$height_diff = $dst_height / $src_height;

		if ($zoomCrop == true) {		 
			if ($dst_width > 0 && $dst_height < 1) 
			{
				$dst_height = floor ($src_height * ($dst_width / $src_width));
			} else if ($dst_height > 0 && $dst_width < 1) 
			{
				$dst_width = floor ($src_width * ($dst_height / $src_height));
			}
				 
			$src_x = $src_y = 0;
			$src_w = $src_width;
			$src_h = $src_height;
			
			$cmp_x = $src_width / $dst_width;
			$cmp_y = $src_height / $dst_height;
			
			if ($cmp_x > $cmp_y) 
			{
				$src_w = round (($src_width / $cmp_x * $cmp_y));
				$src_x = round (($src_width - ($src_width / $cmp_x * $cmp_y)) / 2);
			
			} else if ($cmp_y > $cmp_x) 
			{
			
				$src_h = round (($src_height / $cmp_y * $cmp_x));
			  	$src_y = round (($src_height - ($src_height / $cmp_y * $cmp_x)) / 2);
			
			}
			 			
		}
		else if ($width_diff > 1 && $height_diff > 1)
		{
			$next_width = $src_width;
			$next_height = $src_height;
		}
		else
		{
			if (Configuration::get('PS_IMAGE_GENERATION_METHOD') == 2 || (!Configuration::get('PS_IMAGE_GENERATION_METHOD') && $width_diff > $height_diff))
			{
				$next_height = $dst_height;
				$next_width = round(($src_width * $next_height) / $src_height);
				$dst_width = (int)(!Configuration::get('PS_IMAGE_GENERATION_METHOD') ? $dst_width : $next_width);
			}
			else
			{
				$next_width = $dst_width;
				$next_height = round($src_height * $dst_width / $src_width);
				$dst_height = (int)(!Configuration::get('PS_IMAGE_GENERATION_METHOD') ? $dst_height : $next_height);
			}
		}

		$dest_image = imagecreatetruecolor($dst_width, $dst_height);

		// If image is a PNG and the output is PNG, fill with transparency. Else fill with white background.
		if ($file_type == 'png' && $type == IMAGETYPE_PNG)
		{
			imagealphablending($dest_image, false);
			imagesavealpha($dest_image, true);
			$transparent = imagecolorallocatealpha($dest_image, 255, 255, 255, 127);
			imagefilledrectangle($dest_image, 0, 0, $dst_width, $dst_height, $transparent);
		}
		else
		{
			$white = imagecolorallocate($dest_image, 255, 255, 255);
			imagefilledrectangle ($dest_image, 0, 0, $dst_width, $dst_height, $white);
		}

		if ($zoomCrop == true)  			
			imagecopyresampled($dest_image, $src_image, 0, 0, $src_x, $src_y, $dst_width, $dst_height, $src_w, $src_h);
		else
			imagecopyresampled($dest_image, $src_image, (int)(($dst_width - $next_width) / 2), (int)(($dst_height - $next_height) / 2), 0, 0, $next_width, $next_height, $src_width, $src_height);
		
		return (ImageManager::write($file_type, $dest_image, $dst_file));
	}

}