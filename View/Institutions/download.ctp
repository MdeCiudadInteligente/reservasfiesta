<?php
 //Se crea la linea de encabezado
 //Se obtienen los nombres que están dentro del array de Institución
 //$line= $institutions[0]['Institution'];
 $line=(array('id_institution'=>"",'name'=>"",'mail'=>"",'address'=>"",'phone'=>"",'neighborhood'=>"",'comune'=>"",'city'=>"",'code_education'=>"",'inst_type'=>"",'educational_inst_type'=>"",'modification_timestamp'=>""));
 //Se mezclan los encabezados obtenidos más otros adicionales.
 $line= array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>"",'name'=>"",'description'=>"",'username'=>"",'name'=>"",'identity'=>"",'celular'=>"",'mail'=>"",'name'=>"",'name'=>"",'name'=>"",'members_number'=>"",'name'=>"",'description'=>""));
 //Se adiciona la linea de encabezados.
 $this->Csv->addRow(array_keys($line));
 
 //debug($institutions);
 
 //Por cada instirución se obtienen todos los datos
 foreach ($institutions as $institution)
 {
	  //Se define la linea que se creará creando primero el array con los datos de la isntitución de la iteración actual
 	  //$line = $institution['Institution'];
	  $id_institution=$institution['Institution']['id_institution'];
	  $name=$institution['Institution']['name'];
	  $mail=$institution['Institution']['mail'];
	  $address=$institution['Institution']['address'];
	  $phone=$institution['Institution']['phone'];
	  $neighborhood=$institution['Institution']['neighborhood'];
	  $comune=$institution['Institution']['comune'];
	  $city=$institution['Institution']['city'];
	  $code_education=$institution['Institution']['code_education'];
	  $institution_type=$institution['Institution']['inst_type'];
	  $educational_type=$institution['Institution']['educational_inst_type'];
	  $modification_timestamp=$institution['Institution']['modification_timestamp'];
	  
	  
	  $line['id_institution']=$id_institution;
      $line['name']=$name;
      $line['mail']=$mail;
      $line['address']=$address;
	  $line['phone']=$phone;
      $line['neighborhood']=$neighborhood;
      $line['comune']=$comune;
      $line['city']=$city;
	  $line['code_education']=$code_education;
      $line['inst_type']=$institution_type;
      $line['educational_inst_type']=$educational_type;
      $line['modification_timestamp']=$modification_timestamp;
	  
	  
 	  //Se mezcla el array obtenido anteriormente con un nuevo array que contiene los demás campos, los cuales por ahora se ponen vacios.
      $line= array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>"",'name'=>"",'description'=>"",'username'=>"",'name'=>"",'identity'=>"",'celular'=>"",'mail'=>"",'name'=>"",'name'=>"",'name'=>"",'members_number'=>"",'name'=>"",'description'=>""));
      
      $public_type_name=$institution['PublicType']['name'];
      $line['Public_Type_name']=$public_type_name;
    
      //debug($workshopSessions);
      
      foreach ($groups as $group){      	
      		$workshop_day=$workshopSession['WorkshopSession']['workshop_day'];
      		$workshop_time=$workshopSession['WorkshopSession']['workshop_time'];
      		$travel_time=$workshopSession['WorkshopSession']['travel_time'];
      		$workshop_name=$workshopSession['Workshop']['name'];
      		//debug($workshopSession);
      		 
      		$line['workshop_day']=$workshop_day;
      		$line['workshop_time']=$workshop_time;
      		$line['travel_time']=$travel_time;
      		$line['workshop_name']=$workshop_name;
      	
      }
      
      //Se busca la información de la Sesión de Taller correspondiente a la institución actual 
       foreach ($workshopSessions as $workshopSession){
      	if ($workshopSession['WorkshopSession']['institution_id'] == $institution['Institution']['id_institution']){ 
      	$workshop_day=$workshopSession['WorkshopSession']['workshop_day'];
      	$workshop_time=$workshopSession['WorkshopSession']['workshop_time'];
      	$travel_time=$workshopSession['WorkshopSession']['travel_time'];
      	$workshop_name=$workshopSession['Workshop']['name'];
      	//debug($workshopSession);
      	
      	$line['workshop_day']=$workshop_day;
      	$line['workshop_time']=$workshop_time;
      	$line['travel_time']=$travel_time;
      	$line['workshop_name']=$workshop_name;
      	}
      }
      
      //Se busca la información del responsable asociado a la Institución de la iteración actual.
      foreach ($responsibles as $responsible){
      	if ($responsible['Responsible']['institution_id']==$institution['Institution']['id_institution']){
      	$id_responsible=$responsible['Responsible']['identity'];
      	$responsible_name=$responsible['Responsible']['name'];
      	$responsible_celular=$responsible['Responsible']['celular'];
      	$responsible_mail=$responsible['Responsible']['mail'];
      	
        $line['identity']=$id_responsible;
      	$line['responsible_name']=$responsible_name;
      	$line['responsible_celular']=$responsible_celular;
      	$line['responsible_mail']=$responsible_mail;
      	}
      }
      
      //Se busca la información de la institución educativa asociada a la Institución de la iteración actual.
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
      
      //Se buscan las condición especificas asociadas a la institución de la iteración actual.
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
      
      //Se adiciona la linea que resulta de la iteración actual
       $this->Csv->addRow($line);
       //debug($inscription);
 }
 
 $filename='grupos';
 echo  $this->Csv->render($filename);
?>