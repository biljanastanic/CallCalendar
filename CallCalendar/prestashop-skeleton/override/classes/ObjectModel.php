<?php

abstract class ObjectModel extends ObjectModelCore
{
public function deletePDF($force_delete = false)
	{
		if (!$this->id_pdf)
			return false;
		
		if ($force_delete || !$this->hasMultishopEntries())
		{
			// Deleting pdf file 
			if ($this->pdf_dir)
			{
				if (file_exists($this->pdf_dir.$this->id_pdf.'.pdf')
					&& !unlink($this->pdf_dir.$this->id_pdf.'.pdf'))
					return false;
			}
		}
		return true;
	}
public function existsPDF()
	{
		if (!$this->id_pdf)
			return false;
		
    if (file_exists($this->pdf_dir.$this->id_pdf.'.pdf'))
    return true;
        
		return false;
	}
public function deleteFile($force_delete = false,$dest_dir=null)
	{
		if (!$this->id_file)
			return false;
		
		if ($force_delete || !$this->hasMultishopEntries())
		{
			// Deleting pdf file 
			if ($dest_dir)
			{
				if ((file_exists($dest_dir.$this->id_file.'.pdf')
					&& !unlink($dest_dir.$this->id_file.'.pdf')) or 
					(file_exists($dest_dir.$this->id_file.'.rar')
					&& !unlink($dest_dir.$this->id_file.'.rar')) or
					(file_exists($dest_dir.$this->id_file.'.zip')
					&& !unlink($dest_dir.$this->id_file.'.zip')))
			return false;
			}
		}
		return true;
	}
}

