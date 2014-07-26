<?php
 $line= $registers[0]['Register'];
 $this->Csv->addRow(array_keys($line));
 foreach ($registers as $register)
 {
      $line = $register['Register'];
      
      //debug($line);
      
       $this->Csv->addRow($line);
       //debug($inscription);
 }
 
 $filename='registro';
 echo  $this->Csv->render($filename);
?>