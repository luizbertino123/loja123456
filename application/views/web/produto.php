



<?php $this->load->view('web/layout/navbar'); ?>



<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('master/'.$produto->categoria_pai_meta_link); ?>"><?php echo $produto->categoria_pai_nome; ?></a></li>
                <li class="active"><a href="<?php echo base_url('categoria/'.$produto->categoria_meta_link); ?>"><?php echo $produto->categoria_nome; ?></a></li>
            </ul>
        </div>
    </div>
</div>


<!-- Li's Breadcrumb Area End Here -->
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        
                        
                        
                        <?php foreach ($fotos_produtos as $foto): ?>                     
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="<?php echo base_url('uploads/produtos/small/'.$foto->foto_caminho); ?>" data-gall="myGallery">
                                <img src="<?php echo base_url('uploads/produtos/'.$foto->foto_caminho); ?>" alt="<?php $produto->produto_nome; ?>">
                            </a>
                        </div>
                        <?php endforeach; ?>
                        
                        
                    </div>
                    <div class="product-details-thumbs slider-thumbs-1">
                        
                        <?php foreach ($fotos_produtos as $foto): ?>
                        
                        <div class="sm-image"><img src="<?php echo base_url('uploads/produtos/small/'.$foto->foto_caminho); ?>" alt="<?php $produto->produto_nome; ?>"></div>
                    
                        <?php endforeach; ?>
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2><?php echo $produto->produto_nome; ?></h2>
                        <span class="product-details-ref"><b>Código:&nbsp;</b><?php echo $produto->produto_codigo; ?></span>
                        
                        <p class="mt-10"><span class="product-details-ref"><b>Marca:&nbsp;</b><a href="<?php echo base_url('marca/'.$produto->marca_meta_link); ?>"><?php echo $produto->marca_nome; ?></a></span></p>
                        
                        <p class="mt-10"><span class="product-details-ref"><b>Estoque:&nbsp;</b><b><?php echo ($produto->produto_quantidade_estoque > 0 ? '<span class="badge-pill badge-success">'.$produto->produto_quantidade_estoque.'</span>' : '<span class="badge-pill badge-danger">Indisponível</span>'); ?></b></span></p>
                        
                        
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2"><?php echo 'R$&nbsp;' . number_format($produto->produto_valor, 2); ?></span> 
                        </div>
                        
                                           
                        <div class="single-add-to-cart">
                            
                            <?php 
                            
                            $atributos = array(
                                'class' => 'cart-quantity'
                            );
                            
                            ?>
                            
                            <?php echo form_open('ajax', $atributos); ?>                           
                                <div class="quantity">
                                    <label>Calcular frete e prazo</label>
                                    <div class="" style="min-width: 140px; float: left; margin-right: 10px; position: relative; text-align: left;">
                                        <input type="text" id="cep" name="cep" class="cart-plus-minus-box cep" placeholder="Digite o CEP">
                                    </div>
                                </div>                                        
                            <button type="button" id="btn-calcula-frete" name="produto_id" data-id="<?php echo $produto->produto_id; ?>" class="add-to-cart bg-primary" style="font-size: 20px; padding: 8px 30px" type="submit"><span class="text-white"></span><span class="text-white">&nbsp;&nbsp;ok</span></button>
                            <div class="pt-15 text-primary" id="retorno-frete"></div>                               
                            <?php echo form_close(); ?>
                        </div>
                        
                        <!--Botão de adcionar ao carrinho-->
                        <div class="single-add-to-cart">
                            <form action="#" class="cart-quantity">
                                <div class="quantity">
                                    <label>Quantidade</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" style="font-size: 20px" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <button class="add-to-cart" style="font-size: 20px;" type="submit"><span class="text-white"><i class="fa fa-shopping-basket"></i></span><span class="text-white">&nbsp;&nbsp;Comprar</span></button>
                                <p class="pt-20">Este produto é vendido e entrege por&nbsp;&nbsp;<b><?php echo $sistema->sistema_razao_social; ?></b></p>
                            </form>    
                        </div>
                        
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>



<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Descrição</span></a></li>
                        
                    </ul>               
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <span><?php echo $produto->produto_descricao; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->


