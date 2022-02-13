<?php $this->load->view('restrita/layout/navibar'); ?>

<?php $this->load->view('restrita/layout/sidebar'); ?>




<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <!-- add content here -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">                         
                            <h4><?php echo $titulo; ?></h4>                       
                        </div>

                        <?php echo form_open('/restrita/sistema/'); ?>



                        <div class="card-body">

                            <?php if ($message = $this->session->flashdata('sucesso')): ?>
                                <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                                    <div class="alert-icon"><i class="fas fa fa-check-circle"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Perfeito!</div>
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>      
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ($message = $this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                                    <div class="alert-icon"><i class="fas fa fa-check-circle"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Atenção!</div>
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>      
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-row">


                                <div class="form-group col-md-3">
                                    <label>Razão social</label>
                                    <input type="text" name="sistema_razao_social" class="form-control" placeholder="Razão social" value="<?php echo (isset($sistema) ? $sistema->sistema_razao_social : set_value('sistema_razao_social')); ?>">
                                    <?php echo form_error('sistema_razao_social', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Nome fantasia</label>
                                    <input type="text" name="sistema_nome_fantasia" class="form-control" placeholder="Nome fantasia" value="<?php echo (isset($sistema) ? $sistema->sistema_nome_fantasia : set_value('sistema_nome_fantasia')); ?>">
                                    <?php echo form_error('sistema_nome_fantasia', '<div class="text-danger">', '</div>'); ?>
                                </div> 

                                <div class="form-group col-md-3">
                                    <label>CNPJ</label>
                                    <input type="text" name="sistema_cnpj" class="form-control cnpj" placeholder="CNPJ" value="<?php echo (isset($sistema) ? $sistema->sistema_cnpj : set_value('sistema_cnpj')); ?>">
                                    <?php echo form_error('sistema_cnpj', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Inscrição estadual</label>
                                    <input type="text" name="sistema_ie" class="form-control" placeholder="Inscrição estadual" value="<?php echo (isset($sistema) ? $sistema->sistema_ie : set_value('sistema_ie')); ?>">
                                    <?php echo form_error('sistema_ie', '<div class="text-danger">', '</div>'); ?>
                                </div> 

                            </div>

                            <div class="form-row">


                                <div class="form-group col-md-3">
                                    <label>Telefone fixo</label>
                                    <input type="text" name="sistema_telefone_fixo" class="form-control phone_with_ddd" placeholder="Telefone fixo" value="<?php echo (isset($sistema) ? $sistema->sistema_telefone_fixo : set_value('sistema_telefone_fixo')); ?>">
                                    <?php echo form_error('sistema_telefone_fixo', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Celular</label>
                                    <input type="text" name="sistema_telefone_movel" class="form-control sp_celphones" placeholder="Celular" value="<?php echo (isset($sistema) ? $sistema->sistema_telefone_movel : set_value('sistema_telefone_movel')); ?>">
                                    <?php echo form_error('sistema_telefone_movel', '<div class="text-danger">', '</div>'); ?>
                                </div> 

                                <div class="form-group col-md-3">
                                    <label>E-mail</label>
                                    <input type="email" name="sistema_email" class="form-control " placeholder="E-mail" value="<?php echo (isset($sistema) ? $sistema->sistema_email : set_value('sistema_email')); ?>">
                                    <?php echo form_error('sistema_email', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>URL do site</label>
                                    <input type="url" name="sistema_site_url" class="form-control" placeholder="URL do site" value="<?php echo (isset($sistema) ? $sistema->sistema_site_url : set_value('sistema_site_url')); ?>">
                                    <?php echo form_error('sistema_site_url', '<div class="text-danger">', '</div>'); ?>
                                </div> 

                            </div>

                            <div class="form-row">


                                <div class="form-group col-md-2">
                                    <label>Cep</label>
                                    <input type="text" name="sistema_cep" class="form-control cep" placeholder="Cep" value="<?php echo (isset($sistema) ? $sistema->sistema_cep : set_value('sistema_cep')); ?>">
                                    <?php echo form_error('sistema_cep', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Endereço</label>
                                    <input type="text" name="sistema_endereco" class="form-control" placeholder="Endereço" value="<?php echo (isset($sistema) ? $sistema->sistema_endereco : set_value('sistema_endereco')); ?>">
                                    <?php echo form_error('sistema_endereco', '<div class="text-danger">', '</div>'); ?>
                                </div> 

                                <div class="form-group col-md-2">
                                    <label>Número</label>
                                    <input type="text" name="sistema_numero" class="form-control " placeholder="Número" value="<?php echo (isset($sistema) ? $sistema->sistema_numero : set_value('sistema_numero')); ?>">
                                    <?php echo form_error('sistema_numero', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Cidade</label>
                                    <input type="text" name="sistema_cidade" class="form-control" placeholder="Cidade" value="<?php echo (isset($sistema) ? $sistema->sistema_cidade : set_value('sistema_cidade')); ?>">
                                    <?php echo form_error('sistema_cidade', '<div class="text-danger">', '</div>'); ?>
                                </div> 

                                <div class="form-group col-md-1">
                                    <label>UF</label>
                                    <input type="text" name="sistema_estado" class="form-control" placeholder="UF" value="<?php echo (isset($sistema) ? $sistema->sistema_estado : set_value('sistema_estado')); ?>">
                                    <?php echo form_error('sistema_estado', '<div class="text-danger">', '</div>'); ?>
                                </div> 

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <label>Quantidade de produtos em destaque</label>
                                    <input type="number" name="sistema_produtos_destaques" class="form-control" placeholder="Quantidade de produto em destaque" value="<?php echo (isset($sistema) ? $sistema->sistema_produtos_destaques : set_value('sistema_produtos_destaques')); ?>">
                                    <?php echo form_error('sistema_produtos_destaques', '<div class="text-danger">', '</div>'); ?>
                                </div>

                            </div>

                        </div>
                        <!--Botao Submit-->
                        <div class="card-footer">
                            <button title="Salvar" class="btn btn-primary mr-2">Salvar</button>                      
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <?php $this->load->view('restrita/layout/sidebar_settings'); ?>
</div>