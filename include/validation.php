<?php 
// date_default_timezone_set("Europe/London");
date_default_timezone_set('Etc/GMT');
error_reporting(0); 



function alphacheck($value)

{

		$len=strlen($value);

		

		{

			for($i=0;$i<$len;$i++)

			{

				

				$a=ord($value[$i]);

				if(!(($a>=65 and  $a<=90) or ($a>=97 and $a<=122) or ($a==32) or ($a==46)))

				{

					  return 0;

				}

				

			}

			return 1;

		}

}



function alphanumericcheck($value)

{



		$len=strlen($value);

		

			for($i=0;$i<$len;$i++)

			{

				

				

				 $a=ord($value[$i]);

				if(!(($a>=65 and  $a<=90) or ($a>=97 and $a<=122) or ($a>=44 and $a<=57) or ($a==32) or ($a>=63 and $a<=64)))

				{

					  

					  return 0;

				}

				

				

			}

			return 1;

		

		

		



}



function numericcheck($value)

{

		$len=strlen($value);

		for($i=0;$i<$len;$i++)

		{

			

		  	$a=ord($value[$i]);

			if(!($a>=48 and $a<=57))

			{

				 return 0;

			}

			

		}

		return 1;

}



function clear($value)

{

	if(strlen($value)!=0)

	{

		return 1;

	}

	else

	{

		return 0;

	}



}



function interestcheck($value)

{

		$len=strlen($value);

		for($i=0;$i<$len;$i++)

		{

			

		  	$a=ord($value[$i]);

			if(!(($a>=48 and $a<=57) or ($a==46)))

			{

				 return 0;

			}

			

		}

		return 1;

}



function mailbodyCheck($value)

{



		$len=strlen($value);

		

			for($i=0;$i<$len;$i++)

			{

				

				

				 $a=ord($value[$i]);

				if(!(($a>=65 and  $a<=90) or ($a>=97 and $a<=122) or ($a>=44 and $a<=57) or ($a==32) or ($a>=63 and $a<=64) or ($a==60) or ($a==62)))

				{

					  

					  return 0;

				}

				

				

			}

			return 1;

		

		

		



}







?>