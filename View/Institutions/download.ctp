<?php
 $line= $institutions[0]['Institution'];
 $line= array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>"",'Public_Type_name'=>"",'id_responsible'=>"",'responsible_name'=>"",'responsible_celular'=>"",'responsible_mail'=>""));
 $this->Csv->addRow(array_keys($line));
 foreach ($institutions as $institution)
 {
      $line = $institution['Institution'];
      $line = array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>"",'Public_Type_name'=>"",'id_responsible'=>"",'responsible_name'=>"",'responsible_celular'=>"",'responsible_mail'=>""));
      
   
      
      foreach ($workshopSessions as $workshopSession){
      	
      		$workshop_day=$workshopSession['WorkshopSession']['workshop_day'];
      		$workshop_time=$workshopSession['WorkshopSession']['workshop_time'];
      		$travel_time=$workshopSession['WorkshopSession']['travel_time'];
      		//debug($workshopSession);
      		$line['workshop_day']=$workshop_day;
	      	$line['workshop_time']=$workshop_time;
	      	$line['travel_time']=$travel_time;
      
      }	
      foreach ($institutions as $institution){
      	$public_type_name=$institution['PublicType']['name'];
      	$id_responsible=$institution['Responsible']['id_responsible'];
      	/*$id_responsible=$institution['Responsible']['id_responsible'];
      	$responsible_name=$institution['Responsible']['name'];
      	$responsible_celular=$institution['Responsible']['celular'];
      	$responsible_mail=$institution['Responsible']['mail'];
      	*/
      	$line['Public_Type_name']=$public_type_name;
      	$line['id_responsible']=$id_responsible;
      	/*$line['id_responsible']=$id_responsible;
      	$line['responsible_name']=$responsible_name;
      	$line['responsible_celular']=$responsible_celular;
      	$line['responsible_mail']=$responsible_mail;*/
      }
     /* $workshop_day=$institution['workshop_session']['workshop_day'];
      $workshop_time=$institution['workshop_session']['workshop_time'];
      $travel_time=$institution['workshop_session']['travel_time'];
      
      $line['workshop_day']=$workshop_day;
      $line['workshop_time']=$workshop_time;
      $line['travel_time']=$travel_time;*/
      
      debug($line);
      
       $this->Csv->addRow($line);
       //debug($inscription);
 }
 
 $filename='grupos';
 echo  $this->Csv->render($filename);
?>