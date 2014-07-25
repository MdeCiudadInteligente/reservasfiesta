<?php
 $line= $institutions[0]['Institution'];
 $line= array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>"",'Public_Type_name'=>"",'code'=>"",'type'=>"",'grade'=>"",'id_responsible'=>"",'responsible_name'=>"",'responsible_celular'=>"",'responsible_mail'=>"",'specific_conditioninstitution'=>""));
 $this->Csv->addRow(array_keys($line));
 foreach ($institutions as $institution)
 {
      $line = $institution['Institution'];
      $line = array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>"",'Public_Type_name'=>"",'code'=>"",'type'=>"",'grade'=>"",'id_responsible'=>"",'responsible_name'=>"",'responsible_celular'=>"",'responsible_mail'=>"",'specific_conditioninstitution'=>""));
      
      $public_type_name=$institution['PublicType']['name'];
      
   
      
      $line['Public_Type_name']=$public_type_name;
    
      
       foreach ($workshopSessions as $workshopSession){
      	if ($workshopSession['WorkshopSession']['institution_id']==$institution['Institution']['id_institution']){ 
      	$workshop_day=$workshopSession['WorkshopSession']['workshop_day'];
      	$workshop_time=$workshopSession['WorkshopSession']['workshop_time'];
      	$travel_time=$workshopSession['WorkshopSession']['travel_time'];
      	//debug($workshopSession);
      	
      	$line['workshop_day']=$workshop_day;
      	$line['workshop_time']=$workshop_time;
      	$line['travel_time']=$travel_time;
      	}
      }
      
      foreach ($responsibles as $responsible){
      	if ($responsible['Responsible']['institution_id']==$institution['Institution']['id_institution']){
      	$id_responsible=$responsible['Responsible']['id_responsible'];
      	$responsible_name=$responsible['Responsible']['name'];
      	$responsible_celular=$responsible['Responsible']['celular'];
      	$responsible_mail=$responsible['Responsible']['mail'];
      	
        $line['id_responsible']=$id_responsible;
      	$line['responsible_name']=$responsible_name;
      	$line['responsible_celular']=$responsible_celular;
      	$line['responsible_mail']=$responsible_mail;
      	}
      }
      
      
      foreach ($educationalInstitutions as $educationalInstitution){
      	if ($educationalInstitution['EducationalInstitution']['institution_id']==$institution['Institution']['id_institution']){
      	$code=$educationalInstitution['EducationalInstitution']['code'];
      	$type=$educationalInstitution['EducationalInstitution']['type'];
      	$grade=$educationalInstitution['EducationalInstitution']['grade'];

      	$line['code']=$code;
      	$line['type']=$type;
      	$line['grade']=$grade;
      	}
      }
      
      $institutionspecificCondname='';
      $specificConditioninsfinal='';
      foreach ($institutionspecificConditions as $institutionspecificCondition){
      	if ($institutionspecificCondition['InstitutionSpecificCondition']['institution_id']==$institution['Institution']['id_institution']){
      		$institutionspecificCond=$institutionspecificCondition['InstitutionSpecificCondition']['specific_condition_id'];
      		foreach ($specificConditions as $specificCondition){
      			
      			if ($specificCondition['SpecificCondition']['id_specific_condition']==$institutionspecificCond){
      				$institutionspecificCondname=$specificCondition['SpecificCondition']['name'];
      				$specificConditioninsfinal=$specificConditioninsfinal.''.$institutionspecificCondname.',';
      			}
      			
      		}
      		
      		//$specificConditionins=$this->Institution->find('all', array('conditions'=>array('id_specific_condition'=>$institutionspecificCondition)));
      		//$specificConditioninsfinal=$specificConditioninsfinal+$specificConditionins;
      		$line['specific_conditioninstitution']=$specificConditioninsfinal;
      	}

      }
      
      
      //debug($line);
      
       $this->Csv->addRow($line);
       //debug($inscription);
 }
 
 $filename='grupos';
 echo  $this->Csv->render($filename);
?>