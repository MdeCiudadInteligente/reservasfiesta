<?php
 $line= $institutions[0]['Institution'];
 $line= array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>""));
 $this->Csv->addRow(array_keys($line));
 foreach ($institutions as $institution)
 {
      $line = $institution['Institution'];
      $line = array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>""));
      
      
      foreach ($workshopSessions as $workshopSession){
      	
      		$workshop_day=$workshopSession['WorkshopSession']['workshop_day'];
      		$workshop_time=$workshopSession['WorkshopSession']['workshop_time'];
      		$travel_time=$workshopSession['WorkshopSession']['travel_time'];
      		//debug($workshopSession);
      		$line['workshop_day']=$workshop_day;
	      	$line['workshop_time']=$workshop_time;
	      	$line['travel_time']=$travel_time;
      
      }	
      
     /* $workshop_day=$institution['workshop_session']['workshop_day'];
      $workshop_time=$institution['workshop_session']['workshop_time'];
      $travel_time=$institution['workshop_session']['travel_time'];
      
      $line['workshop_day']=$workshop_day;
      $line['workshop_time']=$workshop_time;
      $line['travel_time']=$travel_time;*/
      
      //debug($line);
      
       $this->Csv->addRow($line);
       //debug($inscription);
 }
 
 $filename='grupos';
 echo  $this->Csv->render($filename);
?>