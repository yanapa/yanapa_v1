<?php
class SPhpMessageSource extends CPhpMessageSource
{

// DEVINF - added for getMessageFile function
private $_files=array();														// DEVINF

	/**
	 *
	 * DEVINF - RO - 2012-09-12 - Original function modified to allow language fallback (for instance: if en_gb folder does not exist, use en)
	 *
	 * Determines the message file name based on the given category and language.
	 * If the category name contains a dot, it will be split into the module class name and the category name.
	 * In this case, the message file will be assumed to be located within the 'messages' subdirectory of
	 * the directory containing the module class file.
	 * Otherwise, the message file is assumed to be under the {@link basePath}.
	 * @param string $category category name
	 * @param string $language language ID
	 * @return string the message file path
	 */
	protected function getMessageFile($category,$language)
	{
		if(!isset($this->_files[$category][$language]))
		{
		
			$baseLanguage = substr($language,0,2);								// DEVINF
			
			if(($pos=strpos($category,'.'))!==false)
			{
				$moduleClass=substr($category,0,$pos);
				$moduleCategory=substr($category,$pos+1);
				$class=new ReflectionClass($moduleClass);
				$this->_files[$category][$language]=dirname($class->getFileName()).DIRECTORY_SEPARATOR.'messages'.DIRECTORY_SEPARATOR.$language.DIRECTORY_SEPARATOR.$moduleCategory.'.php';
				if($language !== $baseLanguage) 								// DEVINF
				{																// DEVINF
					if (!file_exists($this->_files[$category][$language]))		// DEVINF
					{															// DEVINF
					$this->_files[$category][$language]=dirname($class->getFileName()).DIRECTORY_SEPARATOR.'messages'.DIRECTORY_SEPARATOR.$baseLanguage.DIRECTORY_SEPARATOR.$moduleCategory.'.php';		// DEVINF
					}															// DEVINF
				}																// DEVINF
			}
			else {
				$this->_files[$category][$language]=$this->basePath.DIRECTORY_SEPARATOR.$language.DIRECTORY_SEPARATOR.$category.'.php';
				if($language !== $baseLanguage)									// DEVINF
				{																// DEVINF
					if (!file_exists($this->_files[$category][$language])) 		// DEVINF
					{															// DEVINF
					$this->_files[$category][$language]=$this->basePath.DIRECTORY_SEPARATOR.$baseLanguage.DIRECTORY_SEPARATOR.$category.'.php';		// DEVINF
					}															// DEVINF
				}																// DEVINF
			}
		}
		return $this->_files[$category][$language];
	}
	
}