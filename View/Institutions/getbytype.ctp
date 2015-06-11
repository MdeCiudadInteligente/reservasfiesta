<?php if ($type == "Institucion Educativa"){ ?>
<script language="javascript">
document.getElementById('educational_inst_type').style.visibility = 'visible';
document.getElementById('code_education').style.visibility = 'visible';
</script>
<B><label>Tipo de institución educativa</label></B>
<select name="data[Institution][educational_inst_type]" id="Institutioneducational_inst_type" required="required">
<option value="">Selecione la Institución</option>
<option value="Institución Pública">Institución Pública</option>
<option value="Institución Privada">Institución Privada</option>
</select>
<br>
<br>
<B><label for="Institutioncode_education">Código DANE</label></B>
<input id="Institutioncode_education" required="required" maxlength="45" name="data[Institution][code_education]">
<div id="Info"></div>

<?php 
}
else{
?>	
<script language="javascript">
document.getElementById("Institutioneducational_inst_type").options[0].selected = true;
</script>
<br>
<br>
<?php 
}
?>
