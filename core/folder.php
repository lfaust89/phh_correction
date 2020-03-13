<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);

function getDirrecurse($path = '../img/produits', $level = 0)
{
	$ignore = array('cgi-bin', '.', '..');
	$dir = @opendir($path);
		while(false !== ($file = readdir($dir)))
		{ 
			if(!in_array($file, $ignore))
			{     
				$spaces = str_repeat('&nbsp;', ($level*4));	 
				if(is_dir("$path/$file"))
				{ 
					echo "<strong>$spaces $file</strong><br />"; 
					getDirrecurse( "$path/$file", ($level+1));       
				} 
				else 
				{ 
					echo "$spaces $file<br />"; 
				}
			}
		}
	closedir($dir); 
}

getDirrecurse();
?>