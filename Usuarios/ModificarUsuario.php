<?php

date_default_timezone_set('UTC');
// Una forma de expresar la fecha 
//los demas valores de usuario se toman de main.php

$busqueda = mysqli_query($con, "SELECT * FROM usuarios WHERE numero_documento = '$id_usuario' ");//cambiar nombre de la tabla de busqueda
while($row = mysqli_fetch_array($busqueda)){			
    $id_usuario1        = $row['id_usuario'];        
    $apellidos          = $row['apellidos'];
    $nombres            = $row['nombres'];
    $id_tipo_documento  = $row['id_tipo_documento'];
    $numero_documento   = $row['numero_documento'];
    $id_genero          = $row['id_genero'];
    $id_municipio       = $row['id_municipio'];
    $telefono           = $row['telefono'];
    $usuario            = $row['usuario'];
    $clave              = $row['clave'];
    $correo             = $row['correo'];
    $id_perfil          = $row['id_perfil'];
    $id_entidad         = $row['id_entidad'];
    $estado             = $row['estado'];
    $fecha_registro     = $row['fecha_registro'];
}
?>

 <body style="background-color: #64AF59;">
    <?php 
        date_default_timezone_set('America/Bogota');
        $time = time();
        $fecha=  date("Y-m-d", $time); 
    ?>

  <section class="fblanco" >
    <div class="container pi3x">
        <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
            <fieldset>

                <!-- Form Name -->
                <h3 class="centrar letra n600 azulo pi">Modificar Usuario</h3>

                <!-- Appended checkbox --><!-- Text input-->
                <div class="form-group" style="display:none">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="id_usu" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $id_usuario1; ?>">
                    </div>
                </div>           
                
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="nom_usu" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo  $nombres; ?>" >                    
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="ape_usu" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" value="<?php echo  $apellidos; ?>">                 
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. Docuemento </label>                 
                    <div class="col-md-4">
                        <input id="textinput" name="num_doc_usu" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $numero_documento; ?>" >                    
                    </div>
                </div>
                
                <!-- Multiple Radios (inline) -->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>  
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="tip_doc_usu" id="tip_doc_usu">
                            <?php
                                $busqueda1 = mysqli_query($con,"SELECT * FROM tipos_documentos WHERE id_tipo_documento = '$id_tipo_documento'");
                                while($row1 = mysqli_fetch_array($busqueda1)){		  
                                    $id_tipo_documento = $row1['id_tipo_documento'];
                                    $descripcion = $row1['descripcion'];             
                                }
                             ?>
                                <option value="<?php echo $id_tipo_documento ?>"><?php echo $descripcion ?></option>
                                <?php
                                    $con1 = mysqli_query($con,"SELECT * FROM tipos_documentos");
                                    $reg = mysqli_fetch_array($con1);
                                    do {
                                        $id = $reg['id_tipo_documento'];
                                        $des = $reg['descripcion'];
                                ?>
                                <option value="<?php echo $id;?>" ><?php echo $des;?> </option>
                                <?php
                                    }
                                    while($reg = mysqli_fetch_array($con1));
                                ?>      
                            </select>                            
                        </div>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Genero</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="genero_usu" id="genero_usu"> 
                            <?php
                                $busqueda1 = mysqli_query($con,"SELECT * FROM generos WHERE id_genero = '$id_genero' ");
                                while($row1=mysqli_fetch_array($busqueda1)){
                                    $id_genero=$row1['id_genero'];		
                                    $descripcion=$row1['descripcion'];             	  
                                }
                            ?>
                                <option value="<?php echo $id_genero ?>"><?php echo $descripcion ?></option>
                                <?php 
                                    $con = mysqli_query($con,"SELECT * FROM generos");
                                    $reg = mysqli_fetch_array($con);
                                    do {
                                        $id_usu = $reg['id_genero'];
                                        $des_usu = $reg['descripcion'];
                                ?>
                                <option value="<?php echo $id_usu;?>" ><?php echo $des_usu;?> </option>
                                <?php 
                                    } 
                                    while($reg=mysqli_fetch_array($con));
                                ?>        
                            </select>
                        </div>
                    </div>
                 </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="municipio_usu" id="municipio_usu">
                            <?php 
                                include('../conexion/conexion.php');
                                $busqueda11 = mysqli_query($con,"SELECT * FROM municipios WHERE id_municipio = '$id_municipio' ");
                                while($row2=mysqli_fetch_array($busqueda11)){                              
                                    $id_municipio1=$row2['id_municipio'];
                                    $des_municipio=$row2['descripcion'];  
                                }
                            ?>
                                <option value="<?php echo $id_municipio1; ?>"><?php echo $des_municipio;  ?></option>
                                <?php 
                                    $con2 = mysqli_query($con,"SELECT * FROM municipios WHERE id_departamento = '15'");
                                    $reg2 = mysqli_fetch_array($con2);
                                    do {
                                        $id_mun = $reg2['id_municipio'];
                                        $des_mun = $reg2['descripcion'];
                                ?>
                                <option value="<?php echo $id_mun;?>" ><?php echo $des_mun;?> </option>
                                <?php
                                    }
                                    while($reg2 = mysqli_fetch_array($con2));
                                ?>       
                            </select>
                        </div>
                    </div>
                </div>                    
                
                <div class="form-group" style="display:none">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Cargo</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="cargo_usu" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php  $busqueda12=mysqli_query($con,"SELECT * FROM perfiles where id_perfil='$id_perfil' ");
                            while($row12 = mysqli_fetch_array($busqueda12)){
                                echo $id_perfil = $row12['id_perfil'];
                                $descripcion1 = $row12['descripcion'];       	  
                            }
                            ?>" readonly>
                    </div>
                </div>  
                
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Cargo</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="cargo_usu1" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php  $busqueda12=mysqli_query($con,"SELECT * FROM perfiles where id_perfil='$id_perfil' ");
                            while($row12=mysqli_fetch_array($busqueda12)){                               
                                $id_perfil=$row12['id_perfil'];		
                                echo $descripcion1=$row12['descripcion'];             
                            } ?>" readonly>
                    </div>
                </div>  
                
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>
                    <div class="col-md-4">
                        <input id="textinput" name="tel_usu" type="tel" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required value="<?php echo $telefono?>" >                    
                    </div>
                </div>                
                
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="email_usu" type="email" placeholder="" class="form-control input-md" required value="<?php echo $correo ?>" >  
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Usuario</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="usuario_usu" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $usuario ?>">    
                    </div>
                </div>
                
                <!-- Button Drop Down --><!-- Multiple Radios (inline) -->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Contraseña</label> 
                    <div class="col-md-4">
                        <input id="textinput" name="contra_usu" type="password" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $clave ?>" >                    
                    </div>
                </div>              
                
                <div class="form-group" style="display:none">
                    <label class="col-md-4 control-label letra n600 azulo" for="radios">Autorizar Acceso<span class="centrar letra n600 azulo pi"></span></label>
                    <div class="col-md-4"> 
                        <label class="radio-inline" for="radios-0">
                            <input <?php if($estado=="1"){echo "checked";} ?> value="1" type="radio" name="estado"/>Autorizado 
                        </label> 
                        <label class="radio-inline" for="radios-1">      
                            <input <?php if($estado=="0"){echo "checked";} ?> value="0" type="radio" name="estado"/>Denegado     
                        </label>                  
                    </div>
                </div>             
                
                <div class="form-group" style="display:none">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_entidad</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="id_entidad" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $id_entidad ?>" >                       
                    </div>
                </div>
                
                <div class="form-group" >
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha de Registro</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="fecha" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $fecha_registro ?>" readonly >                    
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>               
            </fieldset>
        </form>
    </div>        
  </section>

    
    <?php 
        if($_POST){ //si se ha presionado enviar
            $id_usu=$_POST['id_usu'];
            $nom_usu=$_POST['nom_usu'];
            $ape_usu=$_POST['ape_usu'];
            $num_doc_usu=$_POST['num_doc_usu'];
            $tip_doc_usu=$_POST['tip_doc_usu'];  
            $genero_usu=$_POST['genero_usu'];
            $municipio_usu=$_POST['municipio_usu'];
            $cargo_usu=$_POST['cargo_usu'];
            $tel_usu=$_POST['tel_usu'];
            $email_usu=$_POST['email_usu'];
            $usuario_usu=$_POST['usuario_usu'];
            $contra_usu=$_POST['contra_usu'];
            $id_entidad=$_POST['id_entidad'];
            $estado=$_POST['estado'];
            $fecha_ing =$_POST['fecha'];
            
            mysqli_query($con,"UPDATE `usuarios` SET 
                id_usuario='$id_usu',
                apellidos='$ape_usu',
                nombres='$nom_usu',
                id_tipo_documento='$tip_doc_usu',
                numero_documento='$num_doc_usu',
                id_genero='$genero_usu',
                id_municipio='$municipio_usu',
                telefono='$tel_usu',
                usuario='$usuario_usu',
                clave='$contra_usu',
                correo='$email_usu',
                id_perfil='$cargo_usu',
                id_entidad=' $id_entidad',
                estado='$estado',
                fecha_registro='$fecha_ing' 
                WHERE numero_documento='$id_usuario'");

            mysqli_close($con);
        echo '<script language = javascript>
            alert("la Informacion ha sido Guardada Correctamente")
            self.location = "main.php?key=4"
            </script>'; 
        }
    ?>
    
    <script>
        function numeros(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " 0123456789";
            especiales = [8,37,39,46];
            tecla_especial = false
            for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                } 
            }
            if(letras.indexOf(tecla)==-1 && !tecla_especial)
                return false;
        }
            </script>
            
    <script>
        function redimensiona(){
            top.grand(document.body.scrollHeight);
        }
            </script>
 </body>