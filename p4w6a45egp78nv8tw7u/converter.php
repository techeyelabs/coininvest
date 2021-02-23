<?php
class converter
{
	
       /**
        * Stores function type's name
        *
        * @var string $type
        */
       private $type;
       /**
        * Stores the output
        *
        * @var string $result
        */
       public $result;
       /**
        * Stores inputs
        *
        * @var array $data
        */
       private $data = array();


       /**
        * Constructs a Lib_Converter object with given parameters
        * also it will invoke array to excel,array to csv,array to tab,array to xml process
        *
        * @param string $type
        * @param array $data
        * @return Lib_Converter
        */

       public function converter($type,$data=array(),$filename)
       {

               $this->type = $type;
               $this->data = $data;

               if($this->isValidCall())
               {
                       if(strtolower($type)=='excelconverter')
                               $this->arrayToExcel($filename);
                }
       }
	    private function isValidCall()
       {
               if(strtolower($this->type)!='excelconverter')
               {
                       echo '<b>Component Error!<b> Invalid argument <i>type</i> -
excelconverter or csvconverter or tabconverter or xmlconverter
expected';
                       exit();
               }
               else if(!is_array($this->data))
               {
                       echo '<b>Component Error!<b> Invalid argument data type
<i>data</i> - array expected';
                       exit();
               }
               else if(empty($this->data))
               {
                       echo '<b>Component Error!<b> Invalid argument data type <i>data</i>
- fill all the fields';
                       exit();
               }
               return true;
       }

     

       /**
        * This function convert array to excel file
        *
        * @return string $result
        */

       function arrayToExcel($filename)
       {
		       $resultArray=$this->data;
               header("Content-type: application/x-ms-download");
               header("Content-Disposition: attachment; filename=".$filename."");
               header("Pragma: no-cache");
               header("Expires: 0");

               $out='<table border=1>';
               $arr=array();
               foreach ($resultArray as $value)
               {
                       $arr[]=array_keys($value);

               }
               $out.="<tr>";
               for($i=0;$i<count($arr[0]);$i++)
               {
                               $out.="<th>".$arr[0][$i]."&nbsp;</th>";
               }
               $out.="</tr>";

               for ($x=0; $x<count($resultArray); $x++)
               {
                  $out.="<tr>";
                       for ($y=0; $y<count($resultArray[$x]); $y++)
                       {
                               $var=$arr[0][$y];
                               $out.="<td>".$resultArray[$x][$var]."&nbsp;</td>";
                       }
                       $out.="</tr>";
               }

             echo   $this->result=$out;exit;
               return true;
       }
}
        
?>