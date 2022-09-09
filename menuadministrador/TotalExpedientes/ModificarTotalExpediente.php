<head>
    <title>Menú Principal dos</title>
</head>

<body>
    <?php

    $codigo_expediente = $_GET['codigo_expediente'];
 
    //echo $codigo_expediente." - ".$id_ninnos;

    $busqueda50 = mysqli_query($con, "SELECT * FROM expediente WHERE codigo_expediente = '$codigo_expediente' "); //cambiar nombre de la tabla de busqueda
    while ($row50 = mysqli_fetch_array($busqueda50)) {
        $codigo_expediente              = $row50['codigo_expediente'];
        $Fecha_inicio_expediente        = $row50['Fecha_inicio_expediente'];
        $id_ninnos                      = $row50['id_ninnos'];
        $id_cuidadores                  = $row50['id_cuidadores'];
        $id_discapacidad                = $row50['id_discapacidad'];
        $id_indicador                   = $row50['id_indicador'];
        $id_maltrato                    = $row50['id_maltrato'];
        $id_victima                     = $row50['id_victima'];
        $Descripcion_expediente         = $row50['Descripcion_expediente'];
        $id_derecho                     = $row50['id_derecho'];
        $Observacion                    = $row50['Observacion'];
        $Veredicto_Caso                 = $row50['Veredicto_Caso'];
        $Fecha_finalizacion_expediente  = $row50['Fecha_finalizacion_expediente'];
        $id_entidad                     = $row50['id_entidad'];
        $id_usuario_exp                 = $row50['id_usuario_exp'];
        $id_estadocaso                  = $row50['id_estadocaso'];
    }
    $consultar_expe = mysqli_query($con, "SELECT * FROM ninnosnna WHERE id_ninnos = '$id_ninnos' "); //cambiar nombre de la tabla de busqueda
    while ($row = mysqli_fetch_array($consultar_expe)) {
        $id_ninnos1         = $row['id_ninnos'];
        $No_identificacion  = $row['No_identificacion'];
        $Nombres            = $row['Nombres'];
        $Apellidos          = $row['Apellidos'];
    }
    $consultar_expe2 = mysqli_query($con, "SELECT * FROM cuidadores WHERE id_ninos = '$id_ninnos' "); //cambiar nombre de la tabla de busqueda
    while ($row1 = mysqli_fetch_array($consultar_expe2)) {
        // cuidadores
        $id_cuidadores      = $row1['id_cuidadores'];
        $id_tipo_documento  = $row1['id_tipo_documento'];
        $No_Cedula          = $row1['No_Cedula'];
        $NombresCuida       = $row1['Nombres_cuidadores'];
        $ApellidosCuida     = $row1['Apellidos_cuidadores'];
        $Fecha_Nacimiento   = $row1['Fecha_Nacimiento'];
        $Edad               = $row1['Edad'];
        $Direccion          = $row1['Direccion'];
        $telefono_movil     = $row1['telefono_movil'];
        $correo_electronico = $row1['correo_electronico'];
        $id_parentesco      = $row1['id_parentesco'];
        $id_estado          = $row1['id_estado'];
        $id_estrato         = $row1['id_estrato'];
        $id_etnia           = $row1['id_etnia'];
        $id_genero          = $row1['id_genero'];
        $id_niveleducativo  = $row1['id_niveleducativo'];
        $id_regimen         = $row1['id_regimen'];
        $id_eps             = $row1['id_eps'];
        $id_municipio       = $row1['id_municipio'];
        $id_provincia       = $row1['id_provincia'];
        $id_zona            = $row1['id_zona'];
        $Puntaje_Sisben     = $row1['Puntaje_Sisben'];
        $fecha_cuida        = $row1['fecha_cuida'];
        $id_usuario         = $row1['id_usuario'];
        $id_ninos           = $row1['id_ninos'];
    }

   

    //Validar si se está ingresando con sesión correctamente
    if (!$_SESSION) {
        echo '<script language = javascript>
        alert("usuario no autenticado")
        self.location = "index.html"
        </script>';
    }
    $id_usuario = $_SESSION['numero_documento'];
    $consulta = "SELECT * FROM usuarios WHERE numero_documento = '$id_usuario' ";
    $resultado = mysqli_query($con, $consulta) or die(mysqli_error());
    $fila = mysqli_fetch_array($resultado);
    $nombres    = $fila['nombres'];
    $apellido   = $fila['apellidos'];
    date_default_timezone_set('America/Bogota');
    $time       = time();
    $fecha      = date("Y-m-d", $time);
    ?>
    <section class="fblanco">
        <div class="container pi3x">
            <form class="form-horizontal ps2x" method="post" enctype="multipart/form-data">
                <fieldset>
                    <!-- Form Name -->
                    <h3 class="centrar letra n600 azulo pi">Consultar Expediente</h3>
                    <!-- Appended checkbox -->
                    <!-- Appended checkbox -->
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Codigo del expediente</label>
                        <div class="col-md-4">
                            <input id="cod_exp" name="cod_exp" type="text" placeholder="" class="form-control input-md" value="<?php echo $codigo_expediente; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha de Inicio del Expediente</label>
                        <div class="col-md-4">
                            <input id="fecha_exp" name="fecha_exp" type="text" placeholder="" class="form-control input-md" value="<?php echo $Fecha_inicio_expediente ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de Ni&ntilde;o, Ni&ntilde;a o Adolescente</label>
                        <div class="col-md-4">
                            <input id="nom_nna_exp" name="nom_nna_exp" type="text" placeholder="" class="form-control input-md" value="<?php echo $Apellidos; ?> <?php echo $Nombres; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento de Ni&ntilde;o, Ni&ntilde;a o Adolescente </label>
                        <div class="col-md-4">
                            <input id="num_nna_exp" name="num_nna_exp" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $No_identificacion; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre de Madre, Padre o Acudiente</label>
                        <div class="col-md-4">
                            <input id="nom_mpa_exp" name="nom_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $ApellidosCuida; ?> <?php echo $NombresCuida; ?> " readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. de Documento de Madre, Padre o Acudiente</label>
                        <div class="col-md-4">
                            <input id="num_mpa_exp" name="num_mpa_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $No_Cedula ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_cuidadores</label>
                        <div class="col-md-4">
                            <input id="cuidadores_exp" name="cuidadores_exp" type="text" placeholder="" class="form-control input-md" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $id_cuidadores ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Restablecimiento de Derechos</label>
                        <div class="col-md-4">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM derechos WHERE id_derecho = '$id_derecho' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_derecho = $row1['id_derecho'];
                                $des_derecho = $row1['descripcion_derechos'];
                            }
                            ?>
                            <select name="derechos_exp" id="derechos_exp" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_derecho ?>"><?php echo $des_derecho ?></option>
                                <?php
                                $derechos = mysqli_query($con, "SELECT * FROM derechos");
                                $reg = mysqli_fetch_array($derechos);
                                do {
                                    $id_derecho = $reg['id_derecho'];
                                    $des_derecho = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id_derecho; ?>"><?php echo $des_derecho; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($derechos));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Discapacidad</label>
                        <div class="col-md-4">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM discapacidades WHERE id_discapacidad='$id_discapacidad' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_discapacidad = $row1['id_discapacidad'];
                                $des_discapacidad = $row1['descripcion_discapacidades'];
                            }
                            ?>
                            <select name="discapacidad_exp" id="discapacidad_exp" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_discapacidad ?>"><?php echo $des_discapacidad ?></option>
                                <?php
                                $disc = mysqli_query($con, "SELECT * FROM discapacidades");
                                $reg = mysqli_fetch_array($disc);
                                do {
                                    $id_discapacidad = $reg['id_discapacidad'];
                                    $des_discapacidad = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id_discapacidad; ?>"><?php echo $des_discapacidad; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($disc));
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Indicador</label>
                        <div class="col-md-4">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM indicadores WHERE id_indicador = $id_indicador ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_indi = $row1['id_indicador'];
                                $des_indi = $row1['descripcion_indicadores'];
                            }
                            ?>
                            <select name="indicadores_exp" id="indicadores_exp" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_indi ?>"><?php echo $des_indi ?></option>
                                <?php
                                $indi = mysqli_query($con, "SELECT * FROM indicadores");
                                $reg = mysqli_fetch_array($indi);
                                do {
                                    $id_indi = $reg['id_indicador'];
                                    $des_indi = $reg['descripcion_indicadores'];
                                ?>
                                    <option value="<?php echo $id_indi; ?>"><?php echo $des_indi; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($indi));
                                ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Maltrato</label>
                        <div class="col-md-4">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM maltratos WHERE id_maltrato='$id_maltrato' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_maltrato = $row1['id_maltrato'];
                                $des_maltrato = $row1['descripcion_maltratos'];
                            }
                            ?>

                            <select name="maltratos_exp" id="maltratos_exp" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_maltrato  ?>"><?php echo $des_maltrato  ?></option>
                                <?php
                                $maltra = mysqli_query($con, "SELECT * FROM  maltratos");
                                $reg = mysqli_fetch_array($maltra);
                                do {
                                    $id_maltrato = $reg['id_maltrato'];
                                    $des_maltrato = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id_maltrato; ?>"><?php echo $des_maltrato; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($maltra));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Víctimas</label>
                        <div class="col-md-4">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM victimas WHERE id_victima = '$id_victima' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_victima = $row1['id_victima'];
                                $des_victima = $row1['descripcion_victimas'];
                            }
                            ?>
                            <select name="victima_exp" id="victima_exp" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo  $id_victima  ?>"><?php echo  $des_victima  ?></option>
                                <?php
                                $vict = mysqli_query($con, "SELECT * FROM  victimas");
                                $reg = mysqli_fetch_array($vict);
                                do {
                                    $id_victima = $reg['id_victima'];
                                    $des_victima = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id_victima; ?>"><?php echo $des_victima; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($vict));
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Descripci&oacute;n de los hechos</label>
                        <div class="col-md-4">
                            <textarea class="form-control input-md" name="descripcion_exp" disabled><?php echo $Descripcion_expediente ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Observaciones</label>
                        <div class="col-md-4">
                            <textarea class="form-control input-md" name="obs_exp" disabled><?php echo $Observacion ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Veredicto del Caso</label>
                        <div class="col-md-4">
                            <textarea class="form-control input-md" name="veredicto_exp" disabled><?php echo $Veredicto_Caso ?></textarea>
                        </div>
                    </div>

                    <!-- Text input-->
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha De Finalizaci&oacute;n del Expediente</label>
                        <div class="col-md-4">
                            <input id="finalizacion_exp" name="finalizacion_exp" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $Fecha_finalizacion_expediente ?>" disabled>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Entidad</label>
                        <div class="col-md-4">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM entidades WHERE id_entidad='$id_entidad' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {
                                $id_entidad = $row1['id_entidad'];
                                $des_entidad = $row1['descripcion_entidades'];
                            }
                            ?>
                            <select name="entidad_exp" id="entidad_exp" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_entidad ?>"><?php echo $des_entidad  ?></option>
                                <?php
                                $ent = mysqli_query($con, "SELECT * FROM entidades");
                                $reg = mysqli_fetch_array($ent);
                                do {
                                    $id_entidad = $reg['id_entidad'];
                                    $des_entidad = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id_entidad; ?>"><?php echo $des_entidad; ?> </option>
                                <?php
                                } while ($reg = mysqli_fetch_array($ent));
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estado del Expediente</label>
                        <div class="col-md-4">
                            <?php
                            $busqueda1 = mysqli_query($con, "SELECT * FROM estado_caso WHERE id_estadocaso = '$id_estadocaso' ");
                            while ($row1 = mysqli_fetch_array($busqueda1)) {                                
                                $des_estadocaso = $row1['descripcion_estado_caso'];
                            }
                            ?>
                            <select name="estadocaso_exp" id="estadocaso_exp" disabled class="form-control" style="text-transform: uppercase;">
                                <option value="<?php echo $id_estadocaso ?>"><?php echo $des_estadocaso ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario </label>
                        <div class="col-md-4">
                            <input id="id_usuario_exp" name="id_usuario_exp" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $id_usuario ?>" required>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
        
    </section>
</body>

</html>