<!DOCTYPE html>
<html lang="en">
    
<?php session_start(); 

    $total2=0;

    require "../Util/ConexionBD.php";
    require "../DAO/ModeloCliente.php";
    require "../DAO/ModeloUsuario.php";
    
    if(!empty($_SESSION['usuario1']) && !empty($_SESSION['pass1'])){
        header('Location: ./Administrador/');
    }
    
    if(empty($_SESSION['usuario2']) && empty($_SESSION['pass2'])){
        header('Location:../');
        exit();
    }
    
    $usuario2= $_SESSION['usuario2'];
    $pass2= $_SESSION['pass2'];

    require '../front/header.php' ;
?>

<body>
    
        
        <?php 
        
            if($_SESSION['usuario2']!=null){

                $usuarioDAO= new ModeloUsuario();

                $finalcliente= $usuarioDAO->getUsuario($usuario2, $pass2);

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
                                                            <li><a href="../Clientes/profile.php"><i class="fa fa-user"></i><?= $finalcliente['nomb'] ?></a></li>
								<li><a href="../Clientes/"><i class="fa fa-star"></i> Lista de deseos</a></li>
								<li><a href="../Clientes/checkout.php"><i class="fa fa-crosshairs"></i> Revisar</a></li>
								
                                                                <li><a href="../Clientes/cart.php">
                                                                        
                                                                    <i class="fa fa-shopping-cart">
                                                                        
                                                                        <?php
                                           
                                                                        $objcc= new ConexionBD();
                                                                        $conexx= $objcc->getConexionBD();
                                                                        $productcarrito=0;

                                                                        $recordss= $conexx->prepare("call selectProductos();");
                                                                        $ii= $recordss->execute();

                                                                                 if (($ii) > 0) {
                                                                                     //instanciamos todos los produtos que tengamos
                                                                                     while($listaa= $recordss->fetch(PDO::FETCH_ASSOC)){
                                                                                         
                                                                                         if(isset($_SESSION['carrito'])){
                                                                                         //como en este tenemos un array clave-valor es mas facil que recorra todos los documentos
                                                                                            foreach($_SESSION['carrito'] as $clave => $valor){
                                                                                                //verifica que nuestro iventario coicida con algo de nuestra lista para que solo muestre lo de deseemos
                                                                                               if($listaa['id_producto']==$clave && $valor!=0){
                                                                                                   $productcarrito++;
                                                                                               }
                                                                                            }
                                                                                         }
                                                                                     }
                                                                                 }


                                                                        ?>
                                                                        
                                                                        <?php if($productcarrito>0){ ?>
                                                                            
                                                                        <span style="font-family: sans-serif" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                                            <?=$productcarrito?>
                                                                            <span class="visually-hidden">

                                                                            </span>
                                                                        </span>
                                                                        
                                                                        <?php }?>
                                                                        
                                                                    </i> Carrito</a>
                                                                </li>
                                                                
                                                                <style>
                                                                    @media (min-width: 1200px) {
                                                                        .modal-lj {
                                                                           width: 85%;
                                                                        }
                                                                     }
                                                                     .Custom_Cancel > .sa-button-container > .cancel  {
                                                                            background-color: #cccccc;
                                                                            border-color: #cccccc;
                                                                            margin-top: 15px;
                                                                         }
                                                                         .Custom_Cancel > .sa-button-container > .cancel:hover {
                                                                            background-color: #dedcdc;
                                                                            border-color: #dedcdc;
                                                                            margin-top: 15px;
                                                                         }
                                                                </style>
                                                                
                                                                <script>
                                                                        
                                                                    function salir() {
                                                                    swal({
                                                                        title: "Hay productos en el carrito!",
                                                                        text: "¿Seguro que quieres salir?",
                                                                        type: "info",
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: '#DD6B55',
                                                                        confirmButtonText: 'Sí, estoy seguro',
                                                                        cancelButtonText: "No, no cancelar",
                                                                        closeOnConfirm: false,
                                                                        closeOnCancel: false,
                                                                        customClass: "Custom_Cancel"
                                                                     },
                                                                     function(isConfirm){

                                                                       if (isConfirm){
                                                                         swal("Nos vemos!", "Muchas gracias por tu confianza", "success");

                                                                         function myFunction() {
                                                                            window.location = '../Controlador/logout.php';
                                                                          }
                                                                          setTimeout(myFunction, 2000);

                                                                        } else {
                                                                          swal("No hay problema!", "Los productos en el carrito están a salvo", "error");
                                                                             e.preventDefault();
                                                                        }
                                                                     });
                                                                };
                                                                </script>
                                                                
                                                                <?php if($productcarrito>0){ ?>
                                                                
								<li><a href="javascript:salir()"><i class="fa fa-lock"></i> Salir</a></li>
                                                                <?php }else{?>
                                                                <li><a href="../Controlador/logout.php"><i class="fa fa-lock"></i> Salir</a></li>
                                                                <?php }?>
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
								<li><a href="../Clientes/">Inicio</a></li>
								<li class="dropdown"><a class="active">Tienda<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="../Clientes/">Productos</a></li>
                                                                        <li><a href="../Clientes/checkout.php">Revisar</a></li> 
                                                                        <li><a href="../Clientes/cart.php" class="active">Carrito</a></li> 
                                                                        <li><a href="../Controlador/logout.php">Salir</a></li> 
                                                                    </ul>
                                                                </li> 
								<li class="dropdown"><a>Perfil<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="../Clientes/profile.php"><?= $finalcliente['nomb'] ?> <?= $finalcliente['ape'] ?></a></li>

                                                                    </ul>
                                                                </li> 
								<li><a href="../Clientes/orders.php">Mis pedidos</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<!--<input type="text" placeholder="Buscar"/>-->
						</div>
					</div>
				</div>
				</div>
			</div>
	</header>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="../Clientes/">Inicio</a></li>
				  <li class="active">Carrito de compras</li>
				</ol>
			</div>
			<div class="table-responsive cart_info" id="cart-container">
				<table class="table table-condensed" id="shop-table">
					<thead>
						<tr class="cart_menu">
							<td class="image">Artículo</td>
							<td class="description">Descripción</td>
							<td class="price">Precio</td>
							<td class="quantity">Cantidad</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                                            
                                           <?php
                                           
                                           $objc= new ConexionBD();
                                           $conex= $objc->getConexionBD();
                                           
                                           //$sql1= "call selectProductos()";
                                           //$query = $conex->query($sql1);
                                           
                                           $records= $conex->prepare("call selectProductos();");
                                           $i= $records->execute();
                                           
                                           
                                           //$lista=$query->fetch_array();
                                        
                                  
                                                     //verificamos que nuestra consulta nos regrese algo
                                                    if (($i) > 0) {
                                                        //instanciamos todos los produtos que tengamos
                                                        while($lista= $records->fetch(PDO::FETCH_ASSOC)){
                                                            
                                                            if(isset($_SESSION['carrito'])){
                                                            //como en este tenemos un array clave-valor es mas facil que recorra todos los documentos
                                                            foreach($_SESSION['carrito'] as $clave => $valor){
                                                                //verifica que nuestro iventario coicida con algo de nuestra lista para que solo muestre lo de deseemos
                                                            if($lista['id_producto']==$clave && $valor!=0){
                                                       
                                                     
                                                   
                                                    
                                           ?>
						<tr>
							<td class="cart_product">
                                                            <a href=""><img src="../<?php echo $lista['imagen'] ?>" width="100px" height="100px"alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $lista['nom_prod'] ?></a></h4>
								<p>Web ID: <?php echo $lista['id_producto'] ?></p>
							</td>
							<td class="cart_price">
								<p>S/. <?php echo $lista['precio_prod']?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="" onClick="sumar(<?php echo $clave ?>)"> + </a>
									<input class="cart_quantity_input" type="text" id="quantity" name="quantity" value="<?php echo $valor ?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="" onClick="restar(<?= $clave ?>, <?= $valor?>)"> - </a>
								</div>
							</td>
							<td class="cart_total">
                                                        <p class="cart_total_price">S/.<?php echo $total1=$lista['precio_prod']*$valor;
                                                        $total2=$total2+$total1 ?></p>
							</td>
							<td class="cart_delete">
                                                            <span id="idarticulo" style="display:none;"><?php echo $lista['id_producto'] ?></span>
								<a onClick="delate(<?php echo $clave ?>)" class="cart_quantity_delete" href="" id="deleteitem"><i class="fa fa-times" ></i></a>
							</td>
						</tr> 
                        
                        

                                                
                                                            <?php }
                                                        }   } }
                                                 }
                                           ?>

						
					</tbody>
				</table>
                               <?php if((isset($_SESSION['carrito']))==false || $_SESSION['carrito']==null ){
    
    
?>
                               <h4>No hay productos en el carrito</h4>
                               <?php }?>
			</div>
                                                
                        <a href="javascript:window.history.go(-2);">Seguir comprando</a>                        
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Qué te gustaría hacer después?</h3>
				<p>Elija si tiene un código de descuento o puntos de recompensa que desea usar.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Usar código de cupón</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Usar el vale de regalo</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimar costos de envío e impuestos</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Ciudad:</label>
								<select class="form-control">
									<option>Lima</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Distrito:</label>
								<select name="ubigeo" class="form-control" required="true">
                                                                                    <option value="" selected="">Distrito de residencia</option>
                                                                                    <option value="1">Ancón</option>
                                                                                    <option value="2">Ate</option>
                                                                                    <option value="3">Barranco</option>
                                                                                    <option value="4">Carabayllo</option>
                                                                                    <option value="5">Chaclacayo</option>
                                                                                    <option value="6">Chorrillos</option>
                                                                                    <option value="7">Cieneguilla</option>
                                                                                    <option value="8">Comas</option>
                                                                                    <option value="9">El Agustino</option>
                                                                                    <option value="10">Independencia</option>
                                                                                    <option value="11">Jesus María</option>
                                                                                    <option value="12">La Molina</option>
                                                                                    <option value="13">La Victoria</option>
                                                                                    <option value="14">Lima</option>
                                                                                    <option value="15">Lince</option>
                                                                                    <option value="16">Los Olivos</option>
                                                                                    <option value="17">Lurigancho - Chosica</option>
                                                                                    <option value="18">Lurín</option>
                                                                                    <option value="19">Magdalena del Mar</option>
                                                                                    <option value="20">Miraflores</option>
                                                                                    <option value="21">Pachacámac</option>
                                                                                    <option value="22">Pucusana</option>
                                                                                    <option value="23">Pueblo Libre</option>
                                                                                    <option value="24">Puente Piedra</option>
                                                                                    <option value="25">Punta Hermosa</option>
                                                                                    <option value="26">Punta Negra</option>
                                                                                    <option value="27">Rímac</option>
                                                                                    <option value="28">San Bartolo</option>
                                                                                    <option value="29">San Borja</option>
                                                                                    <option value="30">San Isidro</option>
                                                                                    <option value="31">San Juan de Lurigancho</option>
                                                                                    <option value="32">San Juan de Miraflores</option>
                                                                                    <option value="33">San Luis</option>
                                                                                    <option value="34">San Martin de Porres</option>
                                                                                    <option value="35">San Miguel</option>
                                                                                    <option value="36">Santa Anita</option>
                                                                                    <option value="37">Santa María del Mar</option>
                                                                                    <option value="38">Santa Rosa</option>
                                                                                    <option value="39">Santiago de Surco</option>
                                                                                    <option value="40">Surquillo</option>
                                                                                    <option value="41">Villa El Salvador</option>
                                                                                    <option value="42">Villa María del Triunfo</option>
                                                                    </select>
							
							</li>
							<li class="single_field zip-field">
								<label>Código postal:</label>
								<input type="text" class="form-control">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Obtener</a>
						<a class="btn btn-default check_out" href="">Continuar</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Subtotal <span id="txt-subtotal">S/. <?php echo $total2 ?></span></li>
							<li>Impuesto <span>18%</span></li>
							<li>Costo de envío <span>S/. 10.00</span></li>
							<li>Total <span id="txt-total">S/. <?php $total3=($total2*100.0)/100.0 *1.18 +10; echo round($total3,2) ?></span></li>
						</ul>
							<a class="btn btn-default update" href="checkout.php?subtotal=<?php echo $total2 ?>&?total=<?php echo round($total3,2) ?>">Check Out</a>
							<!--<a class="btn btn-default check_out" href="">Check Out</a>-->
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>E-</span>COMMERCE</h2>
							<p>Estamos para ofrecerte productos de primera calidad y atención especializada.</p>
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
								<li><a href="mailto:anderson.fuentes@ieee.org">Contáctanos</a></li>
								<li><a href="https://www.google.com/maps/place/Universidad+Aut%C3%B3noma+del+
                                                                Per%C3%BA/@-12.1956783,-76.9717862,19.12z/data=!4m5!3m4!1s0x91157f78ac
                                                                4dc955:0xd267131e6b012132!8m2!3d-12.195444!4d-76.9719563" target="_blank">Ubicación</a></li>
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
				<div class="row">
                                        <?php 
                                        $Object = new DateTime();
                                        $Year = $Object->format("Y");
                                        ?>
					<p class="pull-left">Copyright © <?=$Year?> E-COMMERCE Inc. All rights reserved.</p>
					<p class="pull-right">Desarrollado por <span><a target="_blank" href="https://pe.linkedin.com/in/andersonfuentes">Anderson Fuentes</a></span></p>
				</div>
			</div>
		</div>
		
		
		
	</footer><!--/Footer-->
	
        <script >  function delate(x){
                var param = {
            idclave: x

        };

        $.ajax({
            data: param,
            url: "../Controlador/carritodelate.php",
            method: "post",
            success: function(data) {
                /*La variable data contiene la respuesta de tu script PHP*/
            }
        });
        location.reload();
            }

        </script>
        
        <script>  
        
        function sumar(x){
                var param = {
            idclave: x, op:1

        };

        $.ajax({
            data: param,
            url: "../Controlador/increase.php",
            method: "post",
            success: function(data) {
                /*La variable data contiene la respuesta de tu script PHP*/
            }
        });
        location.reload();
            }

        </script>
        
        <script>  
        
        function restar(x, cantidad){
                var param = {
            idclave: x, op:2, cant: cantidad

        };

        $.ajax({
            data: param,
            url: "../Controlador/increase.php",
            method: "post",
            success: function(data) {
                /*La variable data contiene la respuesta de tu script PHP*/
            }
        });
        location.reload();
            }

        </script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.scrollUp.min.js"></script>
        <script src="../js/jquery.prettyPhoto.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/carrito.js"></script>
        
            <?php } ?>
    
</body>
</html>