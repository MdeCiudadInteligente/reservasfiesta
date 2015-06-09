<?php if ($ciudad == "Medellin"){ ?>
<script language="javascript">
document.getElementById('comuna').style.visibility = 'visible';
document.getElementById('neighborhood').style.visibility = 'visible';
</script>
<B><label>Comuna Institución</label></B>
<select name="data[Institution][comune]" id="InstitutionComune" required="required">
<option value="">Selecione la comuna</option>
<option value="Comuna 1 - Popular">Comuna 1 - Popular</option>
<option value="Comuna 2 - Santa Cruz">Comuna 2 - Santa Cruz</option>
<option value="Comuna 3 - Manrique">Comuna 3 - Manrique</option>
<option value="Comuna 4 - Aranjuez">Comuna 4 - Aranjuez</option>
<option value="Comuna 5 - Castilla">Comuna 5 - Castilla</option>
<option value="Comuna 6 - Doce de Octubre">Comuna 6 - Doce de Octubre</option>
<option value="Comuna 7 - Robledo">Comuna 7 - Robledo</option>
<option value="Comuna 8 - Villa hermosa">Comuna 8 - Villa hermosa</option>
<option value="Comuna 9 - Buenos Aires">Comuna 9 - Buenos Aires</option>
<option value="Comuna 10 - La Candelaria">Comuna 10 - La Candelaria</option>
<option value="Comuna 11 - Laureles - Estadio: ">Comuna 11 - Laureles - Estadio</option>
<option value="Comuna 12 - La América">Comuna 12 - La Am&eacute;rica</option>
<option value="Comuna 13 - San Javier">Comuna 13 - San Javier</option>
<option value="Comuna 14 - El Poblado">Comuna 14 - El Poblado</option>
<option value="Comuna 15 - Guayabal">Comuna 15 - Guayabal</option>
<option value="Comuna 16 - Belén">Comuna 16 - Bel&eacute;n</option>
<option value="Comuna 50 - Palmitas">Comuna 50 - Palmitas</option>
<option value="Comuna 60 - San Cristóbal">Comuna 60 - San Crist&oacute;bal</option>
<option value="Comuna 70 - Altavista">Comuna 70 - Altavista</option>
<option value="Comuna 80 - San Antonio de Prado">Comuna - San Antonio de Prado </option>
<option value="Comuna 90 - Santa Elena">Comuna - Santa Elena</option>
</select>
<br>
<br>
<B><label for="InstitutionNeighborhood">Barrio</label></B>
<input id="InstitutionNeighborhood" required="required" maxlength="45" name="data[Institution][neighborhood]">
<?php 
}

else{
?>	
<script language="javascript">
document.getElementById("InstitutionComune").options[0].selected = true;
</script>
<br>
<br>
<?php if ($ciudad == "Otras"){?>
<B><label for="InstitutionCity2">Nombre de la ciudad o municipio</label></B>
<input id="InstitutionCity2" required="required" maxlength="45" name="data[Institution][city2]">
<div></div>
<?php 
}
?>
<?php 
}
?>

	