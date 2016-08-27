<?php

class AdminController extends AdminControllerCore
{
protected function uploadPDF($pub_id)
	{
	if(isset($this->fieldPdfSettings['name']))
	{
		$name=$this->fieldPdfSettings['name'];
		if (isset($_FILES[$name]['tmp_name']) && !empty($_FILES[$name]['tmp_name']))
		{
			
			// Delete old pdf
			if (Validate::isLoadedObject($object = $this->loadObject(true)))
				$object->deletePDF();
			//else
			//	return false;

			// Check pdf validity
			//$max_size = isset($this->max_pdf_size) ? $this->max_pdf_size : 0;
			//if ($error = ImageManager::validateUpload($_FILES[$name], Tools::getMaxUploadSize($max_size)))
			//	$this->errors[] = $error;

			$tmp_name = tempnam(_PS_TMP_PUB_DIR_, 'PS');
			//$this->errors[] = Tools::displayError($tmp_name);
			if (!$tmp_name)
				return false;

			if (!move_uploaded_file($_FILES[$name]['tmp_name'], $tmp_name))
				return false;

			/*// Evaluate the memory required to resize the image: if it's too much, you can't resize it.
			if (!ImageManager::checkImageMemoryLimit($tmp_name))
				$this->errors[] = Tools::displayError('This image cannot be loaded due to memory limit restrictions, please increase your memory_limit value on your server configuration.');

			// Copy new image
			if (empty($this->errors) && !ImageManager::resize($tmp_name, _PS_IMG_DIR_.$dir.$id.'.'.$this->imageType, (int)$width, (int)$height, ($ext ? $ext : $this->imageType)))
				$this->errors[] = Tools::displayError('An error occurred while uploading image.');
*/
	if($this->checkPDF($_FILES[$name])){

		if (!copy($tmp_name, _PS_PUBLICATIONS_DIR_.$pub_id.'.pdf'))
				return false;
	
			if (count($this->errors))
				return false;
	
				unlink($tmp_name);
				return true;
		}
	else {
	$this->errors[] = Tools::displayError('You can only upload pdf files.');
	return false;
	}
		}
		return false;
	}				
	return false;
		}
	protected function checkPDF($file)
	{
			/* Detect mime content type */
			$mime_type = false;
			$types = array('application/pdf');

			if (function_exists('finfo_open'))
			{
					if(!$finfo = finfo_open(FILEINFO_MIME_TYPE))
                        $finfo = finfo_open(FILEINFO_MIME);
                
					$mime_type = finfo_file($finfo, $file['tmp_name']);
					finfo_close($finfo);
			}
			elseif (function_exists('mime_content_type'))
					$mime_type = mime_content_type($file['tmp_name']);
			elseif (function_exists('exec'))
					$mime_type = trim(exec('file -b --mime-type '.escapeshellarg($file['tmp_name'])));
        
            if (empty($mime_type) || $mime_type == 'regular file')
									$mime_type = $file['type'];
            if (($pos = strpos($mime_type, ';')) !== false)
									$mime_type = substr($mime_type, 0, $pos);

			return $mime_type && in_array($mime_type, $types);
	}
    
	protected function pdfReady()
	{
       
if(isset($this->fieldPdfSettings['name']))
	{
        $object = $this->loadObject(true);
		$name=$this->fieldPdfSettings['name'];
		if (isset($_FILES[$name]['tmp_name']) && !empty($_FILES[$name]['tmp_name']))
		return $this->checkPDF($_FILES[$name]);
        else return $object->existsPDF();
	}
            
		return false;	
	}
	
	//uploading of zip, rar and pdf
	protected function uploadFile($pub_id,$tmp_folder=_PS_TMP_NAE_DIR_,$dest_folder=_PS_NEWS_AND_EVENTS_DIR_)
	{
	if(isset($this->fieldFileSettings['name']))
	{
		$name=$this->fieldFileSettings['name'];
		if (isset($_FILES[$name]['tmp_name']) && !empty($_FILES[$name]['tmp_name']))
		{
			
			// Delete old file
			if (Validate::isLoadedObject($object = $this->loadObject(true)))
				$object->deleteFile(false,$dest_folder);


			$tmp_name = tempnam($tmp_folder, 'PS');
			
			//$this->errors[] = Tools::displayError($tmp_name.$file_type);
			if (!$tmp_name)
				return false;

			if (!move_uploaded_file($_FILES[$name]['tmp_name'], $tmp_name))
				return false;
		

	if($file_type=$this->checkFile($_FILES[$name])){ 
				
		//$this->errors[] = Tools::displayError($tmp_name.'--'.$dest_folder.$pub_id.$file_type);
		
		if (!copy($tmp_name, $dest_folder.$pub_id.$file_type))
				return false;
	
			if (count($this->errors))
				return false;
	
				unlink($tmp_name);
				return true;
		}
	else {
	$this->errors[] = Tools::displayError('You can only upload pdf,rar or zip files.');
	return false;
	}
		}
		return false;
	}				
	return false;
		}
		
		
	protected function checkFile($file)
	{
			/* Detect mime content type */
			$mime_type = false;
			$types = array('application/pdf'=>'.pdf','application/zip'=>'.zip','application/x-rar-compressed'=>'.rar','multipart/x-zip'=>'.zip','application/x-rar'=>'.rar');

			if (function_exists('finfo_open'))
			{
					$finfo = finfo_open(FILEINFO_MIME);
					$mime_type = finfo_file($finfo, $file['tmp_name']);
					finfo_close($finfo);
			}
			elseif (function_exists('mime_content_type'))
					$mime_type = mime_content_type($file['tmp_name']);
			elseif (function_exists('exec'))
					$mime_type = trim(exec('file -b --mime-type '.escapeshellarg($file['tmp_name'])));
					if (empty($mime_type) || $mime_type == 'regular file')
									$mime_type = $file['type'];
					if (($pos = strpos($mime_type, ';')) !== false)
									$mime_type = substr($mime_type, 0, $pos);

			if( $mime_type && array_key_exists($mime_type, $types))
			return $types[$mime_type];
			
			return false;
	}

	protected function fileReady()
	{
	if(isset($this->fieldFileSettings['name']))
	{
		$name=$this->fieldFileSettings['name'];
		if (isset($_FILES[$name]['tmp_name']) && !empty($_FILES[$name]['tmp_name']))
		return $this->checkFile($_FILES[$name]);
	}
		return false;	
	}
	
	}

