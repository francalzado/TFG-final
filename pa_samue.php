
<?php 
include ("funciones.php");//lo deberias de tener unificado

$roles_bus=$_REQUEST['roles_bus'];

$ids_roles_bus=implode(',',$_REQUEST['roles_bus']);

if($ids_roles_bus==''){
	$verroles = "SELECT * FROM roles ORDER BY id asc";
}else{
	$verroles = "SELECT * FROM roles WHERE id IN (".$ids_roles_bus.") ORDER BY id asc";
}
$vrol = log_mysql_query($verroles);
$num_roles = mysqli_num_rows($vrol);
$verpermisos= "SELECT * FROM sel_permisos ORDER BY id asc";
$vper = log_mysql_query($verpermisos);
$str_head_permissions="";
$num_permission=mysqli_num_rows($vper);

//array_permisos=1|4|5|8;

//TABLA roles
//rol_administrador 1|4|5|8


if(isset($_REQUEST['guardar'])){	
	$error=0;
	while($row_roles = mysqli_fetch_array($vrol)){
	//for($i=1;$i<=$num_roles;$i++){
		$str_insert_permisos ="";
		for($x=1;$x<=$num_permission;$x++){		
			if($_POST['ck_'.$x.'_'.$row_roles['id']]){
				$str_insert_permisos.=$x."|";
			}
		}
		$str_insert_per="UPDATE roles SET permisos='$str_insert_permisos' WHERE id=".$row_roles['id']."";
		$qr_upd_per = log_mysql_query($str_insert_per);	
		if(!$qr_upd_per)$error=1;
	}

	if($error==0){
		echo "<div class='alert alert-success'>Los permisos han sido actualizados correctamente.</div>";
		?>		
		<script language="JavaScript">				
			setTimeout ("window.location.href='/intranet/permisos'", 2000); 
		</script>	 			
		<?php
	}
}

$ancho  = (100/($num_roles+1));
$str_head_roles="";

while($row_rol = mysqli_fetch_array($vrol)){
	$nombre_rol = $row_rol['nombre'];
	$id_rol = $row_rol['id'];
	$str_head_roles .="<td>".$nombre_rol."</td>";
}
$contador=1;



while($row = mysqli_fetch_array($vper)) {
	$nombre_permiso=$row['valor'];
	$id_permiso=$row['id'];

	$celdas="";

	$listar_roles = log_mysql_query($verroles);
	
	
	while($row_rol2 = mysqli_fetch_array($listar_roles)){

		$verpermisos= "SELECT * FROM roles WHERE id=".$row_rol2['id']."";

		
		$qr_verpermisos = log_mysql_query($verpermisos);
		if($row_perm = mysqli_fetch_array($qr_verpermisos)){
			$array_permisos = explode("|",$row_perm['permisos']);
		}
		$celdas.="<td><input type='checkbox'";
		if(in_array($id_permiso, $array_permisos)){
			$celdas.=" checked "; 
		}
		$celdas.= " name='ck_".$id_permiso."_".$row_rol2['id']."' /></td>";
		
	}

	if($contador%2==0){
		$str_color="background-color:#ddd;";
	}else $str_color="";
	$str_head_permissions.="<tr style='".$str_color."'><td style=';text-align:left;padding:5px; min-width: 200px'>".$nombre_permiso."</td>".$celdas."</tr>";
	$contador++;
}


?>

<!-- CABECERA -->
<form autocomplete="off" method="post" action="">
	<div class="form-group">
		<label class="col-md-2 col-sm-12 control-label">Roles:</label>
		<div class="col-md-4 col-sm-12">
		<select name='roles_bus[]' class='form-control multi-select' multiple>
				<?php 
				echo "<option value=''>Todas</option>";
				
				$nombre_cliente="SELECT * FROM roles WHERE borrado=0";
		        $result_nombre_cliente=log_mysql_query($nombre_cliente);
		        while ($row3=mysqli_fetch_array($result_nombre_cliente)){    
		            $id_rol= $row3['id'];  
		            $nombre_rol=$row3['nombre'];     
		        ?>
		        <option value="<?php echo $id_rol;?>" <?php if (in_array($id_rol, $roles_bus)){echo "selected";}?>><?php echo $nombre_rol;?></option>
		        <?php }?>
			</select>
		</div>
		<button class='btn blue' type='submit'>Buscar</button>
	</div>
	<div class="clearfix"></div>
	<div id="div1" class="table-responsive" style="overflow-x: hidden; overflow-y: hidden; height:55px; margin-right: 14px;">
		<table class="table" style="text-align:center;" >
			<thead>
				<tr style="font-weight:bold;">
					<td style="min-width: 200px"></td>
					<?php echo $str_head_roles; ?>
				</tr>
			</thead>
		</table>
	</div>
	<div class="clearfix"></div><br>
	<div id="div2" class="table-responsive" style="width:100%; overflow-x: auto;height:430px; margin-top: -35px;">
		<table class="table" style="text-align:center; margin-top: -34px;" >
			<thead>
				<tr style="font-weight:bold; color:#fff;">
					<td></td>
					<?php echo $str_head_roles; ?>
				</tr>
			</thead>
			<tbody>
				<?php echo $str_head_permissions; ?>
			</tbody>
		</table>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-12" align="right">
		<input type="submit" class="btn green" name="guardar" value="Guardar"/>
	</div>
</form>