<!DOCTYPE html>
<html lang="en">

<?php

    session_start();
    
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(window).on('load', function () {
                setTimeout(function () {
              $(".loader-page").css({visibility:"hidden",opacity:"0"})
            }, 130);

          });
    </script>
    
    <div class="loader-page"></div>
    
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
								<li><a href="../Clientes/" class="active">Inicio</a></li>
								<li class="dropdown"><a>Tienda<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="../Clientes/" class="active">Productos</a></li>

                                                                                    <li><a href="../Clientes/checkout.php">Revisar</a></li> 
                                                                                    <li><a href="../Clientes/cart.php">Carrito</a></li> 
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
						<div class="">
                                                    <form action="index.php" method="get">
                                                        <div class=" rounded">
                                                           <input type="text" class="form-control rounded" placeholder="Buscar producto" name="search"
                                                                  aria-describedby="search-addon" style="width: 100%" required=""/>
                                                           <span class="" id="search-addon">
                                                             <button type="submit" class="btn btn-primary" style="float: next; margin-top: -57px; margin-left: 225px; ">
                                                                 <i class="fas fa-search"></i>
                                                             </button>
                                                           </span>
                                                         </div>   
                                                   </form>
						</div>
					</div>
				</div>
				</div>
			</div>
	</header>
	
        <?php 
        
            $objc= new ConexionBD();
            $conex= $objc->getConexionBD();
            $records= $conex->prepare("select count(*) as total from tbl_producto where tag!='Cancelado' order by id_producto desc;");
            $records->execute();
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            $results= $records->fetch(PDO::FETCH_ASSOC);
                    
            $count=$results;
            
            $paginas= $count['total']/18;
            
            round($paginas,0);
            
            $pagfinal= round($paginas,0);
            
        
        ?>
    
        <?php 
        
            if(!empty($_GET)){
                
                if(isset($_GET["page"])){
                    
                    
                    $pageact= $_GET['page'];

                    if($_GET['page']==1){

                        $max= $pageact*18+1;

                        $min= $max - 18;

                    }else{
                        $max= $pageact*18;

                        $min= $max - 18;
                    }

                    $clienteDAO= new ModeloCliente();

                    $products= $clienteDAO->getProductsFilters($min, $max);
                        
                    
                }elseif(isset($_GET["category"])){
                    
                    $category= $_GET['category'];
                    
                    $clienteDAO= new ModeloCliente();

                    $products= $clienteDAO->getProductsFiltersCategory($category);
                    
                    ?>
    
                    <script>
                      $(document).ready(function() {
                            $('#pagination').remove();
                            $('#pagination2').remove();
                            $('#resultcategory').show();
                            $('#resultcategory2').show();
                        });
                    </script>
    
                    <?php
                    
                    
                }elseif(isset($_GET["brand"])){
                    
                    $brand= $_GET['brand'];
                    
                    $clienteDAO= new ModeloCliente();

                    $products= $clienteDAO->getProductsFiltersBrand($brand);
                    
                    ?>
                    
                    <script>
                      $(document).ready(function() {
                            $('#pagination').remove();
                            $('#pagination2').remove();
                            $('#resultbrand').show();
                            $('#resultbrand2').show();
                        });
                    </script>
                    
                    <?php
                    
                }elseif(isset($_GET["search"])){
                    
                    $search= $_GET['search'];
                    
                    $clienteDAO= new ModeloCliente();

                    $products= $clienteDAO->getResultSearch($search);
                    ?>
    
                    <script>
                      $(document).ready(function() {
                            $('#pagination').remove();
                            $('#pagination2').remove();
                            $('#resultword').show();
                            $('#resultword2').show();
                        });
                    </script>
                    
                    <?php
                    
                }
                
            }else{
                
                $clienteDAO= new ModeloCliente();
                $products= $clienteDAO->getProductsFilters(1, 19);
                
            }
            
        ?>
        
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categorías</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
                                                    <?php 
                                                    
                                                    $clienteDAO= new ModeloCliente();
                                                    $categorias= $clienteDAO->getAllCategorias();
                                                    
                                                    ?>
                                                    
                                                    <?php foreach ($categorias as $categ){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
                                                                    <h4 class="panel-title"><a href="?category=<?=$categ['categoria']?>"><?= $categ['categoria'] ?></a></h4>
								</div>
							</div>
                                                    <?php }?>
                                                    
						</div><!--/category-productsr-->
					
						<div class="brands_products"><!--brands_products-->
                                                        
                                                        <?php 

                                                        $marcas= $clienteDAO->getAllMarcas();

                                                        ?>
							<h2>MARCAS</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                                                    <?php foreach ($marcas as $marc){ ?>
                                                                        <li><a href="?brand=<?=$marc['MARCA']?>"> <span class="pull-right">(<?= $marc['CUENTA'] ?>)</span><?= $marc['MARCA'] ?></a></li>
                                                                    <?php } ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Rango de precios</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="90" data-slider-step="5" data-slider-value="[20,50]" id="sl2" ><br />
								 <b>S/ 0</b> <b class="pull-right">S/ 90</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="../imagenes/images/shop/segundaimagenprincipal.png" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
                            
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">CATÁLOGO</h2>
                                                
                                                <div class="col-sm-4" id="resultword" style="display: none;">
                                                    <?php if(isset($_GET["search"])){ ?>
                                                    <b style="font-size: 18px">Resultados para: <?= $search ?></b>
                                                    <?php } ?>
                                                </div>
                                                
                                                <div class="col-sm-12" id="resultword2" style="display: none;">
                                                    <br>
                                                </div>
                                                
                                                
                                                <div class="col-sm-4" id="resultcategory" style="display: none;">
                                                    <?php if(isset($_GET["category"])){ ?>
                                                    <b style="font-size: 18px; text-transform: uppercase"><?= $category ?> en MarketApp</b>
                                                    <?php } ?>
                                                </div>
                                                
                                                <div class="col-sm-12" id="resultcategory2" style="display: none;">
                                                    <br>
                                                </div>
                                                
                                                
                                                <div class="col-sm-4" id="resultbrand" style="display: none;">
                                                    <?php if(isset($_GET["brand"])){ ?>
                                                    <b style="font-size: 18px; text-transform: uppercase">MARCA: <?= $brand ?></b>
                                                    <?php } ?>
                                                </div>
                                                
                                                <div class="col-sm-12" id="resultbrand2" style="display: none;">
                                                    <br>
                                                </div>
                                                
                                                
                                                <ul class="pagination" id="pagination">
                                                    
                                                        <?php if(!empty($_GET['page'])){ ?>
                                                    
                                                    
                                                            <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                                            <li class="<?php if($pageact==$i){?> active <?php }?>"><a href="?page=<?=$i?>"><?=$i?></a></li>

                                                            <?php }?>
                                                        
                                                        <?php }else{?>
                                                        
                                                            <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                                                <li class="<?php if($i==1){?> active <?php }?>"><a href="?page=<?=$i?>"><?=$i?></a></li>

                                                            <?php }?>
                                                        
                                                        <?php }?>
							
							<li><a >&raquo;</a></li>
						</ul>
                                                
                                                <br>
                                                
                                                <?php if($products!=null){?>
                                                
						<?php foreach( $products as $producto){ ?>
            
                                                
                                                    <div class="col-sm-4">
                                                    
                                                            <div class="product-image-wrapper">
                                                                    <div class="single-products">
                                                                            <div class="productinfo text-center">
                                                                                    <img src="../<?=$producto['imagen']?>" alt="" style="width: 250px; height: 250px"/>
                                                                                    <h2>S/.<?=$producto['precio_prod']?></h2>
                                                                                    <p><?=$producto['nom_prod']?></p>

                                                                                   <a href="../Clientes/product-details.php?id=<?=$producto['id_producto']?>" class="btn btn-default add-to-cart">
                                                                                   <i class="fa fa-shopping-cart"></i>Ver detalles</a>
                                                                            </div>
                                                                            <div class="product-overlay">
                                                                                    <div class="overlay-content">
                                                                                            <h2>S/.<?=$producto['precio_prod']?></h2>
                                                                                            <p><?=$producto['nom_prod']?></p>
                                                                                            <a href="../Clientes/product-details.php?id=<?=$producto['id_producto']?>" class="btn btn-default add-to-cart">
                                                                                            <i class="fa fa-shopping-cart"></i>Ver detalles</a>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="choose">
                                                                            <ul class="nav nav-pills nav-justified">
                                                                                    <li><a href=""><i class="fa fa-plus-square"></i>Añadir a la lista</a></li>
                                                                                    <li><a href=""><i class="fa fa-plus-square"></i>Visualizar</a></li>
                                                                            </ul>
                                                                    </div>
                                                            </div>
                                                    </div>
        
                                                <?php } ?>
                                                
                                                <?php } ?>
                                                
                                                <div class="col-sm-9" style="padding: 0; margin: 0">
                                                    <ul class="pagination" id="pagination2">

                                                            <?php if(!empty($_GET['page'])){ ?>


                                                                <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                                                <li class="<?php if($pageact==$i){?> active <?php }?>"><a href="?page=<?=$i?>"><?=$i?></a></li>

                                                                <?php }?>

                                                            <?php }else{?>

                                                                <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                                                    <li class="<?php if($i==1){?> active <?php }?>"><a href="?page=<?=$i?>"><?=$i?></a></li>

                                                                <?php }?>

                                                            <?php }?>

                                                            <li><a >&raquo;</a></li>
                                                    </ul>
                                                </div>
					</div><!--features_items-->
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
								<li><a href="mailto:anderson.fuentes@ieee.org">Contactános</a></li>
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
	
         <?php }?>
        
        <?php
            if(isset($_SESSION['registrook'])){

                ?>

                <script type="text/javascript">
                          swal("Bienvenido a E-commerce!", "Ya puedes empezar a ordenar tus pedidos :D", "success");
                </script>

            <?php

            unset($_SESSION['registrook']);
            }
        ?>
  
    <script src="../js/jquery.js"></script>
    <script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
      
</body>
</html>