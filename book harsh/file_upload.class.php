<?
class File_upload 
{
	public $photo_image;
	public $final_result;
	public $image_dir;
	
	function __construct()
	{
		$this->photo_image = '';
		$this->final_result = '';
		$this->image_dir = '';
	}
	
	function upload_file($image_name,$photo_image, $image_dir,$resize_width='',$resize_height='',$thumb_width='',$thumb_height='')
	{
		$this->photo_image = $photo_image;
		$this->image_dir = $image_dir;
		$photo_known_types = array(
							'image/pjpeg' => 'jpg',
							'image/jpeg' => 'jpg',
							'image/JPEG' => 'jpg',
							'image/JPEG' => 'JPG',
							'image/jpeg' => 'JPG',
							'image/gif' => 'gif',
							'image/bmp' => 'bmp',
							'image/PNG' => 'PNG',
							'image/PNG' => 'png',
							'image/png' => 'PNG',
							'image/png' =>'png');
		$gd_function_suffix = array(
							'image/pjpeg'=> 'JPEG',
							'image/jpeg'=> 'JPEG',
							'image/gif'=> 'GIF',
							'image/bmp'=> 'WBMP',
							'image/png'=>'PNG');
							
		if(!$photo_image['error'])
		{
			if($photo_image['size'] > 0 && $photo_image['size'] < 2000000)
			{
				if(array_key_exists($photo_image['type'], $photo_known_types))
				{
					list($file_name,$ext) = explode('.', $photo_image['name']);
					$extension = $photo_known_types[$photo_image['type']];
					//$photo_name = $file_name.'.'.$extension;
					//$photo_name = $photo_image['name'];
					$photo_name = $image_name;
					
					list($rwidth, $rheight) = getimagesize($photo_image['tmp_name']);
					$function_suffix = $gd_function_suffix[$photo_image['type']];
					$function_to_read = 'imagecreatefrom'.$function_suffix;
					$function_to_write = 'image'.$function_suffix;
					if($resize_width == '' && $resize_height == '')
					{
						if(copy($photo_image['tmp_name'],$image_dir.$photo_name))
							$final_result = 'Image is copied in its absolute size';
					}
					else
					{
						if($rwidth > $rheight)
						{
							$width = $resize_width;
							$height = $resize_height;
						}
						else
						{
							$height = $resize_height;
							$width = $resize_width;
						}
						$src_handle = $function_to_read($photo_image['tmp_name']);
						if($src_handle)
						{
							$des_handle = imagecreatetruecolor($width, $height);
							imagecopyresampled($des_handle, $src_handle, 0, 0, 0, 0, $width, $height, $rwidth, $rheight);
						}
						if($thumb_width != '' && $thumb_height != '')
						{
							$thumb_width = $thumb_width;
							$thumb_height = $thumb_height;
							$src_handle1 = $function_to_read($photo_image['tmp_name']);
							$des_handle1 = imagecreatetruecolor($thumb_width, $thumb_height);
							imagecopyresampled($des_handle1, $src_handle1, 0, 0, 0, 0, $thumb_width, $thumb_height, $rwidth, $rheight);
							$create1 = $function_to_write($des_handle1, $image_dir.'thumb_'.$photo_name);
							if($create1)
							{	
								imagedestroy($des_handle1);
							}
						}
						$create = $function_to_write($des_handle, $image_dir.$photo_name);
						if($create)
						{
							imagedestroy($des_handle);
							return true;
						}
						else
						{
							$final_result .='<div style="color:red; font-weight:bold">Your image is not uploaded !!! </div><br/>';
						}
					}
				}
				else
					$final_result .='<div style="color:red; font-weight:bold">It is not a valid image file<br/>Please Select another Image File as jpeg, png, bmp</div>';
			}
			else
				$final_result .='<div style="color:red; font-weight:bold">Please Enter a file which file size is between 1KB to 2 MB !!!</div>';
		}
		else
		{
			$final_result .='<div style="color:red; font-weight:bold">There is an error on file '.$photo_image['name'].'</div>';	
		}
		return $final_result;
	}
}
?>