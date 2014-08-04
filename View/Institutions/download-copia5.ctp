<?php
 //Se crea la linea de encabezado
 //Se obtienen los nombres que están dentro del array de Institución
 $line= $institutions[0]['Institution'];
 //Se mezclan los encabezados obtenidos más otros adicionales.

 //Se adiciona la linea de encabezados.
 $this->Csv->addRow(array_keys($line));
 
 //debug($institutions);
 
 //Por cada instirución se obtienen todos los datos
 foreach ($institutions as $institution)
 {
	  //Se define la linea que se creará creando primero el array con los datos de la isntitución de la iteración actual
 	  $line = $institution['Institution'];
	  
	  
	  
	  
	  
	  
 	  //Se mezcla el array obtenido anteriormente con un nuevo array que contiene los demás campos, los cuales por ahora se ponen vacios.
    
      
      //Se adiciona la linea que resulta de la iteración actual
       $this->Csv->addRow($line);
       //debug($inscription);
 }
 
 $filename='grupos';
 echo  $this->Csv->render($filename);
?>