<!DOCTYPE html>
<html lang="en">

<?php

    session_start();
    
    require "../Util/ConexionBD.php";
    require "../DAO/ModeloCliente.php";
    require "../DAO/ModeloAdmin.php";
    require "../DAO/ModeloUsuario.php";
    require_once '../DAO/Formato.php';
    
    if(!empty($_SESSION['usuario2']) && !empty($_SESSION['pass2'])){
        header('Location: ./Administrador/');
    }
    
    if(empty($_SESSION['usuario1']) && empty($_SESSION['pass1'])){
        header('Location:../');
        exit();
    }
    
    $usuario1= $_SESSION['usuario1'];
    $pass1= $_SESSION['pass1'];
    
    $formato= new Formato();
    
    require '../front/header.php' ;
    
?>

<body>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(window).on('load', function () {
                    setTimeout(function () {
                  $(".loader-page").css({visibility:"hidden",opacity:"0"})
                }, 150);

              });
        </script>

        <div class="loader-page"></div>
        
        <?php 
        
            if($_SESSION['usuario1']!=null){

                $usuarioDAO= new ModeloUsuario();
                $adminDAO= new ModeloAdmin();

                $finaladmin= $usuarioDAO->getUsuario($usuario1, $pass1);

        ?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="tel:940-223-612""><i class="fa fa-phone"></i> +51 940 223 612</a></li>
								<li><a href="mailto:supermercadobambu@gmail.com"><i class="fa fa-envelope"></i> supermercadobambu@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://es-la.facebook.com/autonomadelperu/" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/autonomadelperu" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://pe.linkedin.com/school/universidad-aut%C3%B3noma-del-per%C3%BA/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a><i class="fa fa-dribbble"></i></a></li>
								<li><a><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
                                                    <a href="."><img src="../imagenes/logo_B.png" alt="" width="80"/></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									PERU
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">LIMA</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									MONEDA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">SOLES</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                                            <li><a href="profile.php"><i class="fa fa-user"></i><?= $finaladmin['nomb'] ?> <?= $finaladmin['ape'] ?></a></li>
								<li><a href="orders.php"><i class="fa fa-star"></i> Ordenes</a></li>
								<li><a href="clients.php"><i class="fa fa-crosshairs"></i> Clientes</a></li>
								<li><a href="../Controlador/logout.php"><i class="fa fa-lock"></i> Salir</a></li>								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
                                                                <li><a href="../Administrador/">Principal</a></li>
								<li class="dropdown"><a>Tienda<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="clients.php">Clientes</a></li>
                                                                        <li><a href="employee.php">Empleados</a></li>
                                                                            <li><a href="users.php">Usuarios</a></li>
                                                                            <li><a href="../Controlador/logout.php">Salir</a></li> 
                                                                    </ul>
                                                                </li> 
								<li class="dropdown"><a class="active">Perfil<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="profile.php"><?= $finaladmin['nomb'] ?> <?= $finaladmin['ape'] ?></a></li>

                                                                    </ul>
                                                                </li> 
								<li class="dropdown"><a>Upkeep<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="warehouse.php">Almacén</a></li>
                                                                    </ul>
                                                                </li> 
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
                                                    <form action="index.php" method="get" class="searchform">
							<!--<input type="text" name="search" class="form-control" placeholder="Buscar producto" style="background-color: #f0eded; color: #000"/>-->
                                                    </form>
						</div>
					</div>
				</div>
				</div>
			</div>
	</header>
	
	<section id="advertisement">
            
            <div class="container container-web-page">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="text-center card-box">
                                <div class="member-card pt-2 pb-2" style="text-align: left">
                                    <h3 class="font-weight-bold poppins-regular text-uppercase">MIS DATOS DE USUARIO</h3>
                                    <p style="font-size: 16px"><?= $formato->saludo() ?> <b><?= $finaladmin['nomb'] ?> </b>! En esta sección podrás visualizar tu información de seguridad y acceso</p>
                                    <hr>
                                    <div class="row">
                                    <div class="container">
                                        <div class="main-body">

                                              <!-- Breadcrumb -->

                                              <!-- /Breadcrumb -->

                                              <div class="row gutters-sm">
                                                    <div class="col-md-7">
                                                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                                                        <ol class="breadcrumb">
                                                          <li class="breadcrumb-item"><a href="javascript:window.history.go(-2);">Inicio</a></li>
                                                          <li class="breadcrumb-item active" aria-current="page">Perfil de usuario</li>
                                                        </ol>
                                                      </nav>
                                                      <div class="card mb-7">
                                                        <div class="card-body">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage">Nombres y apellidos:</label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage" style="font-weight: 400"><?=$finaladmin['nomb']?> <?=$finaladmin['ape']?></label>
                                                            </div>
                                                          </div>
                                                          <hr>
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage">Correo electrónico:</label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage" style="font-weight: 400"><?=$finaladmin['correo']?></label>
                                                            </div>
                                                          </div>
                                                          <hr>
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage">Username:</label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage" style="font-weight: 400"><?=$finaladmin['username']?></label>
                                                            </div>
                                                          </div>
                                                          <hr>

                                                          <div class="modal fade " id="editinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document"> 
                                                                     <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>EDITAR DATOS DE ACCESO</b></h4>
                                                                            </div>
                                                                            <div class="modal-body" style="text-align: justify;">
                                                                                <script type="text/javascript">
                                                                                    $(document).ready(function(){

                                                                                        $("#idForm").bind("submit",function(){
                                                                                            // Capturamnos el boton de envío
                                                                                            var btnEnviar = $("#btnEnviar");
                                                                                            $.ajax({
                                                                                                type: $(this).attr("method"),
                                                                                                url: $(this).attr("action"),
                                                                                                data:$(this).serialize(),
                                                                                                beforeSend: function(){
                                                                                                    /*
                                                                                                    * Esta función se ejecuta durante el envió de la petición al
                                                                                                    * servidor.
                                                                                                    * */
                                                                                                    // btnEnviar.text("Enviando"); Para button 
                                                                                                    btnEnviar.val("Enviando"); // Para input de tipo button
                                                                                                    btnEnviar.attr("disabled","disabled");
                                                                                                },
                                                                                                complete:function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta al termino de la petición
                                                                                                    * */
                                                                                                    btnEnviar.val("Enviar formulario");
                                                                                                    btnEnviar.removeAttr("disabled");
                                                                                                },
                                                                                                success: function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta cuando termina la petición y esta ha sido
                                                                                                    * correcta
                                                                                                    * */
                                                                                                    $("#mostrar").html(data);
                                                                                                },
                                                                                                error: function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta si la peticón ha sido erronea
                                                                                                    * */
                                                                                                    alert("Problemas al tratar de enviar el formulario");
                                                                                                }
                                                                                            });
                                                                                            // Nos permite cancelar el envio del formulario
                                                                                            return false;
                                                                                        });
                                                                                    });
                                                                                </script>

                                                                                <script type="text/javascript">
                                                                                    $(document).ready(function(){

                                                                                        $("#idForm2").bind("submit",function(){
                                                                                            // Capturamnos el boton de envío
                                                                                            var btnEnviar = $("#btnEnviar2");
                                                                                            $.ajax({
                                                                                                type: $(this).attr("method"),
                                                                                                url: $(this).attr("action"),
                                                                                                data:$(this).serialize(),
                                                                                                beforeSend: function(){
                                                                                                    /*
                                                                                                    * Esta función se ejecuta durante el envió de la petición al
                                                                                                    * servidor.
                                                                                                    * */
                                                                                                    // btnEnviar.text("Enviando"); Para button 
                                                                                                    btnEnviar.val("Enviando"); // Para input de tipo button
                                                                                                    btnEnviar.attr("disabled","disabled");
                                                                                                },
                                                                                                complete:function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta al termino de la petición
                                                                                                    * */
                                                                                                    btnEnviar.val("Enviar formulario");
                                                                                                    btnEnviar.removeAttr("disabled");
                                                                                                },
                                                                                                success: function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta cuando termina la petición y esta ha sido
                                                                                                    * correcta
                                                                                                    * */
                                                                                                    $("#mostrar").html(data);
                                                                                                },
                                                                                                error: function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta si la peticón ha sido erronea
                                                                                                    * */
                                                                                                    alert("Problemas al tratar de enviar el formulario");
                                                                                                }
                                                                                            });
                                                                                            // Nos permite cancelar el envio del formulario
                                                                                            return false;
                                                                                        });
                                                                                    });
                                                                                </script>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <form action="../Controlador/OperationsAdmin.php" method="POST" id="idForm">
                                                                                            <input type="hidden" class="form-control" name="idusuario" value="<?=$finaladmin['id_usuario']?>"/>
                                                                                            <input type="hidden" class="form-control" name="op" value="10"/>
                                                                                            <div class="form-group">
                                                                                                    <label >Nombres:</label>
                                                                                                    <input type="text" class="form-control" name="nombres" id="inputMessage" value="<?=$finaladmin['nomb']?>" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label>Apellidos:</label>
                                                                                                    <input type="text" class="form-control" name="apellidos" value="<?=$finaladmin['ape']?>" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label >Correo electrónico:</label>
                                                                                                    <input type="email" class="form-control" name="correo" value="<?=$finaladmin['correo']?>" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <button type="submit" id="btnEnviar" class="btn btn-danger form-control">Actualizar información</button>
                                                                                            </div>
                                                                                        </form>
                                                                                        <div id="mostrar">

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <form action="../Controlador/OperationsAdmin.php" method="POST" id="idForm2">
                                                                                            <input type="hidden" class="form-control" name="idusuario" value="<?=$finaladmin['id_usuario']?>"/>
                                                                                            <input type="hidden" class="form-control" name="op" value="11"/>
                                                                                            <div class="form-group">
                                                                                                    <label >Username:</label>
                                                                                                    <input type="text" class="form-control" disabled="true" value="<?=$finaladmin['username']?>"/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label>Ingresa tu contraseña actual:</label>
                                                                                                    <input type="password" name="passactual" class="form-control" value="" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label>Ingresa una nueva contraseña:</label>
                                                                                                    <input type="password" name="passnew1" class="form-control" value="" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label>Confirma tu nueva contraseña:</label>
                                                                                                    <input type="password" name="passnew2" class="form-control"  value="" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <button type="submit" id="btnEnviar2" class="btn btn-info form-control">Actualizar contraseña</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" data-dismiss="modal" class="btn btn-default cerrarModal">Cerrar</button>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                          <div class="row">
                                                            <div class="col-sm-12">
                                                              <a class="btn btn-success " data-toggle="modal" data-target="#editinfo">Editar información de seguridad y acceso</a>
                                                            </div>
                                                          </div>
                                                          <hr>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end col -->

                        <?php 

                            $empdatos= $adminDAO->getEmpleado($usuario1, $pass1);

                        ?>

                        <style>
                            @media (min-width: 1200px) {
                                .modal-la {
                                   width: 60%;
                                }
                             }
                        </style>

                        <div class="col-md-5" style="background-color: #f7f7f7; border-color: red #080;">
                            <div class="text-center card-box">
                                <div class="member-card pt-2 pb-2" >
                                    <h3 class="font-weight-bold poppins-regular text-uppercase" style="text-align: left">MI PERFIL DE EMPLEADO</h3>
                                    <p style="text-align: left; font-size: 16px" >En esta sección podrás visualizar tu información como empleado</p>
                                    <hr>
                                    <div class="thumb-lg member-thumb mx-auto"><img src="../<?=$empdatos['imagen']?>" class="rounded-circle img-thumbnail" alt="profile-image" style="width: 205px; height: 200px; border-radius: 20%; pointer-events: none"></div>
                                    <div class="">
                                        <h4><?=$empdatos['nom_empleado']?> <?=$empdatos['ape_empleado']?></h4>
                                        <button type="button" data-toggle="modal" data-target="#editinfoempleado" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Editar datos</button>
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mt-3">
                                                        <h4><?=$empdatos['num_doc']?></h4>
                                                        <p class="mb-0 text-muted">Número de documento</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mt-3">
                                                        <h4><?=$empdatos['tel_empleado']?></h4>
                                                        <p class="mb-0 text-muted">Teléfono</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mt-3">
                                                        <?php $ubigg= $adminDAO->getUbigeoById($empdatos['id_ubigeo']); ?>
                                                        <h4><?=$empdatos['direccion']?> - <?= strtoupper($ubigg['distrito'])?> - <?= strtoupper($ubigg['provincia'])?></h4>
                                                        <p class="mb-0 text-muted">Dirección</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade " id="editinfoempleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-la" role="document"> 
                             <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>EDITAR INFORMACIÓN DEL EMPLEADO</b></h4>
                                    </div>
                                    <div class="modal-body" style="text-align: justify;">
                                        <div class="row">
                                            <script type="text/javascript">
                                                $(document).ready(function(){

                                                    $("#idForm3").bind("submit",function(){
                                                        // Capturamnos el boton de envío
                                                        var btnEnviar = $("#btnEnviar3");
                                                        //var formData = new FormData(this);
                                                        $.ajax({
                                                            type: $(this).attr("method"),
                                                            url: $(this).attr("action"),
                                                            data:new FormData(this),
                                                            enctype: 'multipart/form-data',
                                                            processData: false,
                                                            contentType: false,
                                                            cache: false,
                                                            beforeSend: function(){

                                                                btnEnviar.val("Enviando"); // Para input de tipo button
                                                                btnEnviar.attr("disabled","disabled");
                                                            },
                                                            complete:function(data){

                                                                btnEnviar.val("Enviar formulario");
                                                                //btnEnviar.removeAttr("disabled");
                                                            },
                                                            success: function(data){

                                                                swal("Imagen actualizada", "La foto de perfil se actualizó correctamente!", "success");
                                                                function myFunction() {
                                                                    location.reload();
                                                                  }
                                                                  setTimeout(myFunction, 2000);

                                                            },
                                                            error: function(data){
                                                                /*
                                                                * Se ejecuta si la peticón ha sido erronea
                                                                * */
                                                                alert("Problemas al tratar de enviar el formulario");
                                                            }
                                                        });
                                                        // Nos permite cancelar el envio del formulario
                                                        return false;
                                                    });
                                                });
                                            </script>
                                            <form action="../Controlador/OperationsAdmin.php" method="POST" id="idForm3">
                                                <input type="hidden" class="form-control" name="idempleado" value="<?=$empdatos['id_empleado']?>"/>
                                                <input type="hidden" class="form-control" name="op" value="12"/>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <center>
                                                            <img src="../<?=$empdatos['imagen']?>" class="form-control" style="pointer-events: none; width: 265px; height: 260px;" alt="">
                                                        </center>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">EDITAR IMAGEN</label>
                                                            <input type="file" class="form-control" name="archivo" accept="image/gif, image/jpeg, image/png" required/>
                                                    </div>
                                                    <div class="form-group">
                                                            <button type="submit" id="btnEnviar3" class="btn btn-warning form-control">EDITAR IMAGEN</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <script type="text/javascript">
                                                $(document).ready(function(){

                                                    $("#idForm4").bind("submit",function(){
                                                        // Capturamnos el boton de envío
                                                        var btnEnviar = $("#btnEnviar4");
                                                        $.ajax({
                                                            type: $(this).attr("method"),
                                                            url: $(this).attr("action"),
                                                            data:$(this).serialize(),
                                                            beforeSend: function(){
                                                                /*
                                                                * Esta función se ejecuta durante el envió de la petición al
                                                                * servidor.
                                                                * */
                                                                // btnEnviar.text("Enviando"); Para button 
                                                                btnEnviar.val("Enviando"); // Para input de tipo button
                                                                btnEnviar.attr("disabled","disabled");
                                                            },
                                                            complete:function(data){
                                                                /*
                                                                * Se ejecuta al termino de la petición
                                                                * */
                                                                btnEnviar.val("Enviar formulario");
                                                                btnEnviar.removeAttr("disabled");
                                                            },
                                                            success: function(data){
                                                                /*
                                                                * Se ejecuta cuando termina la petición y esta ha sido
                                                                * correcta
                                                                * */
                                                                $("#mostrar").html(data);
                                                            },
                                                            error: function(data){
                                                                /*
                                                                * Se ejecuta si la peticón ha sido erronea
                                                                * */
                                                                alert("Problemas al tratar de enviar el formulario");
                                                            }
                                                        });
                                                        // Nos permite cancelar el envio del formulario
                                                        return false;
                                                    });
                                                });
                                            </script>

                                            <form action="../Controlador/OperationsAdmin.php" method="POST" id="idForm4">
                                                <input type="hidden" class="form-control" name="idemp" value="<?=$empdatos['id_empleado']?>"/>
                                                <input type="hidden" class="form-control" name="op" value="13"/>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                            <label for="inputMessage">TIPO DE DOCUMENTO: </label>
                                                            <select name="tipodoc" class="form-control"  required="true">
                                                                    <option value="<?=$empdatos['id_tipodoc']?>" selected=""><?=$empdatos['descripcion_tipodoc']?></option>

                                                                    <?php $tipo= $adminDAO->getFilterTipoDoc($empdatos['id_tipodoc']); ?>

                                                                    <?php foreach ($tipo as $tp){ ?>
                                                                        <option value="<?=$tp['id_tipodocumento']?>"><?=$tp['descripcion_tipodoc']?></option>
                                                                    <?php } ?>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">N° DE DOCUMENTO: </label>
                                                            <input type="text" name="numdoc" class="form-control" value="<?=$empdatos['num_doc']?>" required/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">DISTRITO: </label>
                                                            <?php $ubig= $adminDAO->getUbigeoById($empdatos['id_ubigeo']); ?>

                                                            <select name="ubigeo" class="form-control"  required="true">
                                                                    <option value="<?=$empdatos['id_ubigeo']?>" selected=""><?=$ubig['distrito']?> - <?=strtoupper($ubig['provincia'])?></option>

                                                                    <?php $listubigeo= $adminDAO->getFilterUbigeo($empdatos['id_ubigeo']); ?>

                                                                    <?php foreach ($listubigeo as $ub){ ?>
                                                                        <option value="<?=$ub['id_ubigeo']?>"><?=$ub['distrito']?> - <?=strtoupper($ub['provincia'])?></option>
                                                                    <?php } ?>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">DIRECCIÓN: </label>
                                                            <input type="text" name="direccion" class="form-control" value="<?=$empdatos['direccion']?>" required/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">FECHA DE NACIMIENTO: </label>
                                                            <input type="date" name="fecha" class="form-control" value="<?=$empdatos['fenaci']?>" required/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">TELÉFONO: </label>
                                                            <input type="text" name="telefono" class="form-control" value="<?=$empdatos['tel_empleado']?>" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-7" style="float: right">
                                                    <button type="submit" id="btnEnviar4" class="btn btn-danger form-control">EDITAR INFORMACIÓN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default cerrarModal">Cerrar</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
	</section>    
        
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>S</span>upermercado BAMBÚ</h2>
							<p>Estamos para ofrecerte productos de primera calidad.</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=qQFFqM3TTH4" target="_blank">
									<div class="iframe-img">
										<img src="../imagenes/images/home/plazavea1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Historia de Plaza Vea</p>
								<h2>07 OCTUBRE 2O19</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=OV988963HGk" target="_blank">
									<div class="iframe-img">
										<img src="../imagenes/images/home/tottus1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>TOTTUS</p>
								<h2>24 MAYO 2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=cuVer5IkwnY" target="_blank">
									<div class="iframe-img">
										<img src="../imagenes/images/home/metro1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>METRO FIESTAS PATRIAS</p>
								<h2>06 JULIO 2020</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=MjNV7DvYrv0" target="_blank">
									<div class="iframe-img">
										<img src="../imagenes/images/home/falabella1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>SAGA FALABELLA</p>
								<h2>05 JUNIO 2020</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="../imagenes/images/home/map.png" alt="" />
							<p>Panamericana Sur km. 16.3 - Villa El Salvador</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Servicios</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="mailto:supermercadobambu@gmail.com">Contactános</a></li>
								<li><a href="https://maps.app.goo.gl/B3LR6PE79x89Skkr7" target="_blank">Ubicación</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Socios</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="https://www.plazavea.com.pe/" target="_blank">Plaza Vea</a></li>
								<li><a href="https://www.tottus.com.pe/tottus/" target="_blank">Tottus</a></li>
								<li><a href="https://www.metro.pe/" target="_blank">Metro</a></li>
								<li><a href="https://www.falabella.com.pe/falabella-pe/" target="_blank">Saga Falabella</a></li>
						
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Políticas</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="http://www2.congreso.gob.pe/sicr/cendocbib/con4_uibd.nsf/0AC1BCBF94F59BD705257EEA0057F060/$FILE/PoliticaNutrici%C3%B3n_y_SeguridadAlimentaria.pdf" target="_blank">Nutrición</a></li>
								<li><a href="http://www.digesa.minsa.gob.pe/compial/archivos/Politica_Nacional_Inocuidad_Alimentos.pdf" target="_blank">Inocuidad alimentaria</a></li>
								<li><a href="https://acuerdonacional.pe/politicas-de-estado-del-acuerdo-nacional/politicas-de-estado%E2%80%8B/politicas-de-estado-castellano/ii-equidad-y-justicia-social/15-promocion-de-la-seguridad-alimentaria-y-nutricion/" target="_blank">Seguridad alimentaria</a></li>
								<li><a href="http://repositorio.up.edu.pe/bitstream/handle/11354/2018/PortocarreroFelipe2000.pdf?sequence=1" target="_blank">Gestión pública</a></li>
								<li><a href="https://docs.wfp.org/api/documents/WFP-0000050572/download/" target="_blank">Programa Mundial de Alimentos</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Proveedores</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="https://www.gloria.com.pe/" target="_blank" >Gloria</a></li>
								<li><a href="https://www.nestle.com.pe/" target="_blank" >Nestle</a></li>
								<li><a href="https://www.alicorp.com.pe/pe/es/" target="_blank">Alicorp</a></li>
								<li><a href="https://www.fritolay.com/" target="_blank">Frito Lay</a></li>
								<li><a href="http://costenoalimentos.com.pe/costeno" target="_blank">Costeño</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Sobre ti</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Correo electrónico" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Obtenga las actualizaciones más recientes de
                                                                nuestro sitio y se actualizará usted mismo ...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				
			</div>
		</div>
		
	</footer><!--/Footer-->
	
    <?php } ?>

    <script src="../js/jquery.js"></script>
    <script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    
</body>
</html>