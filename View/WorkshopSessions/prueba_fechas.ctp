<?php
$this->set('datework',$datework);
		
		$usuario = $this->Session->read('Auth.User.username');
		$this->set('usuario',$usuario);
		//$fields = array('week', 'away_team_id', 'home_team_id');
		$specific_condition=$this->WorkshopSession->query("select distinct specific_condition.name from user inner join (institution inner join (institution_specific_condition inner join specific_condition on institution_specific_condition.specific_condition_id=specific_condition.id_specific_condition) on institution.id_institution=institution_specific_condition.institution_id) on user.institution_id = institution.id_institution where user.username = '$usuario'");
		$this->set('specific_condition',$specific_condition);
		
		$public_type=$this->WorkshopSession->query("select distinct public_type.name from user inner join (institution inner join public_type on institution.public_type_id = public_type.id_public_type) on user.institution_id = institution.id_institution where user.username = '$usuario'");
		$this->set('public_type',$public_type);
		
		
		foreach ($public_type as $public_type){
		$public_typep=$public_type['public_type']['name'];
		
		}
		$this->set('public_typep',$public_typep);
		
		$institutionid=$this->WorkshopSession->query("select distinct institution.id_institution from institution inner join user on institution.id_institution = user.institution_id where user.username = '$usuario'");
		foreach ($institutionid as $institutionid){
		$institutionidp=$institutionid['institution']['id_institution'];
		
		}
		$this->set('institutionidp',$institutionidp);
		/* 	Cuando el usuario no elije condiciones especificas se debe hacer una consulta sin los joins de las condiciones especificas para que nos liste todos los talleres */
		if($specific_condition==null){
			$querya="select distinct workshop_session.workshop_day from public_type inner join (public_type_workshop inner join (workshop inner join workshop_session on workshop.id_workshop = workshop_session.workshop_id) on public_type_workshop.workshop_id = workshop.id_workshop) on public_type.id_public_type = public_type_workshop.public_type_id  where and workshop_session.institution_id = '0' and public_type.name = '$public_typep'";		
		}
		/*Se listan todos los talleres con los joins de las condiciones específicas */
		else{
			  $querya="select distinct workshop_session.workshop_day from specific_condition inner join (specific_condition_workshop inner join (public_type inner join (public_type_workshop inner join (workshop inner join workshop_session on workshop.id_workshop = workshop_session.workshop_id) on public_type_workshop.workshop_id = workshop.id_workshop) on public_type.id_public_type = public_type_workshop.public_type_id) on specific_condition_workshop.workshop_id = workshop.id_workshop) on  specific_condition.id_specific_condition = specific_condition_workshop.specific_condition_id where workshop_session.institution_id = '0' and public_type.name = '$public_typep' and (specific_condition.name = ";
			  //$queryid="select distinct workshop.id_workshop from specific_condition inner join (specific_condition_workshop inner join (public_type inner join (public_type_workshop inner join (workshop inner join workshop_session on workshop.id_workshop = workshop_session.workshop_id) on public_type_workshop.workshop_id = workshop.id_workshop) on public_type.id_public_type = public_type_workshop.public_type_id) on specific_condition_workshop.workshop_id = workshop.id_workshop) on  specific_condition.id_specific_condition = specific_condition_workshop.specific_condition_id where workshop_session.workshop_day = '$datework' and public_type.name = '$public_typep' and specific_condition.name = ";
			  				
			$i=0;
			
			foreach ($specific_condition as $condition){
				
			if ($i<1)
				$querya=$querya."'".$condition['specific_condition']['name']."'";
				//$queryid=$queryid."'".$condition['specific_condition']['name']."'";
			if ($i>=1)
				$querya=$querya." OR specific_condition.name ="."'".$condition['specific_condition']['name']."'";
				//$queryid=$queryid." OR specific_condition.name ="."'".$condition['specific_condition']['name']."'";
			$i++;
			}
			
			
			$querya=$querya.")";
		
		}
		//$this->set('querya',$querya);
		//$this->set('queryid',$queryid);
		
		
		$taller=$this->WorkshopSession->query($querya);
		$this->set(compact('taller'));
		
		if ($taller == Array ( ))
		{
			$this->Session->setFlash(__('En la fecha seleccionada no hay carpas disponibles con los criterios especificados por usted en el registro'));
			return $this->redirect(array('controller' => 'WorkshopSessions', 'action' => 'addworkshop'));
		}
		
?>