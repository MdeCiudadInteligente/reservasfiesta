<?php
 //Se crea la linea de encabezado
 //Se obtienen los nombres que están dentro del array de groups
 //$line= $groups[0]['Group'];
 $line=(array('id_group'=>"",'name'=>"",'members_number'=>""));
 //Se mezclan los encabezados obtenidos más otros adicionales.
 $line= array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>"",'name'=>"",'description'=>"",'username'=>"",'name'=>"",'identity'=>"",'celular'=>"",'mail'=>"",'name'=>"",'name'=>"",'name'=>"",'name'=>"",'mail'=>"",'address'=>"",'phone'=>"",'neighborhood'=>"",'comune'=>"",'city'=>"",'code_education'=>"",'inst_type'=>"",'educational_inst_type'=>"",'modification_timestamp'=>"",'name'=>"",'description'=>"",'specific_conditioninstitution'=>""));
 //Se adiciona la linea de encabezados.
 $this->Csv->addRow(array_keys($line));
 
 //debug($groups);
 
 //Por cada groups se obtienen todos los datos
 foreach ($groups as $group)
 {
	  //Se define la linea que se creará creando primero el array con los datos de la isntitución de la iteración actual
 	  //$line = $institution['Institution'];
	  $id_group=$group['Group']['id_group'];
	  $name=$group['Group']['name'];
	  $members_num=$group['Group']['members_number'];	  
	  
	  $line['id_group']=$id_group;
      $line['name']=$name;
      $line['members_number']=$members_num;
     
 	  //Se mezcla el array obtenido anteriormente con un nuevo array que contiene los demás campos, los cuales por ahora se ponen vacios.
      $line= array_merge($line, array('workshop_day'=>"",'workshop_time'=>"",'travel_time'=>"",'name'=>"",'description'=>"",'username'=>"",'name'=>"",'identity'=>"",'celular'=>"",'mail'=>"",'name'=>"",'name'=>"",'name'=>"",'name'=>"",'mail'=>"",'address'=>"",'phone'=>"",'neighborhood'=>"",'comune'=>"",'city'=>"",'code_education'=>"",'inst_type'=>"",'educational_inst_type'=>"",'modification_timestamp'=>"",'name'=>"",'description'=>""));
      
      $public_type_name=$group['PublicType']['name'];
      $line['Public_Type_name']=$public_type_name;
    
      //debug($workshopSessions);
      
      //Se busca la información de la Sesión de Taller correspondiente a el grupo actual 
       foreach ($workshopSessions as $workshopSession){
      	if ($workshopSession['WorkshopSession']['group_id'] == $group['Group']['id_group']){ 
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
      //usuarios asociados con la institucion.
      foreach ($users as $user){
	      	if ($user['User']['id_user']==$group['Group']['user_id']){
	      		$username=$user['User']['username'];
	      		$user_name=$user['User']['name'];
	      		$user_identidad=$user['User']['identity'];
	      		$user_celular=$user['User']['celular'];
	      		$user_mail=$user['User']['mail'];
	
	      		$line['username']=$username;
	      		$line['name']=$user_name;
	      		$line['identity']=$user_identidad;
	      		$line['responsible_celular']=$responsible_celular;
	      		$line['responsible_mail']=$responsible_mail;
	      	}
	      	
	      	foreach ($institutionUsers as $institutionUser){
	      		if ($institutionUser['InstitutionUser']['user_id']==$user['User']['id_user']){
	      			foreach ($institutions as $institution){
			      		if ($institution['Institution']['id_institution']==$institutionUsers['InstitutionUser']['institution_id']){
			      			$institution_name=$institution['Institution']['name'];
			      			$institution_mail=$institution['Institution']['mail'];
			      			$institution_address=$institution['Institution']['address'];
			      			$institution_phone=$institution['Institution']['phone'];
			      			$institution_neighborhood=$institution['Institution']['neighborhood'];
			      			$institution_comune=$institution['Institution']['comune'];
			      			$institution_city=$institution['Institution']['city'];
			      			$institution_code_education=$institution['Institution']['code_education'];
			      			$institution_inst_type=$institution['Institution']['inst_type'];
			      			$institution_educational_inst_type=$institution['Institution']['educational_inst_type'];
			      			$institution_modification_timestamp=$institution['Institution']['modification_timestamp'];
			      	
			      			$line['name']=$institution_name;
			      			$line['mail']=$institution_mail;
			      			$line['address']=$institution_address;
			      			$line['phone']=$institution_phone;
			      			$line['neighborhood']=$institution_neighborhood;
			      			$line['comune']=$institution_comune;
			      			$line['city']=$institution_city;
			      			$line['code_education']=$institution_code_education;
			      			$line['inst_type']=$institution_inst_type;			      			
			      			$line['educational_inst_type']=$institution_educational_inst_type;
			      			$line['modification_timestamp']=$institution_modification_timestamp;
	      				}
	      	
	      			}
      			}
	     	}
      	
      }
      
      //Se buscan las condición especificas asociadas a la institución de la iteración actual.
      $grouppecificCondname='';
      $specificConditioninsfinal='';
      foreach ($groupSpecificConditions as $groupSpecificCondition){
      	if ($groupSpecificCondition['GroupSpecificCondition']['group_id']==$group['Group']['id_group']){
      		$groupspecificCond=$groupSpecificCondition['GroupSpecificCondition']['specific_condition_id'];
      		foreach ($specificConditions as $specificCondition){
      			
      			if ($specificCondition['SpecificCondition']['id_specific_condition']==$groupspecificCond){
      				$grouppecificCondname=$specificCondition['SpecificCondition']['name'];
      				$specificConditioninsfinal=$specificConditioninsfinal.''.$grouppecificCondname.',';
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