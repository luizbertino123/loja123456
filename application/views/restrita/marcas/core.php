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

                        <!--Botao voltar-->
                        <div class="card-footer">
                            <a title="Voltar" class="btn btn-dark float-right" href="<?php echo base_url('restrita/marcas'); ?>"><i class="fa fa-chevron-circle-left">&nbsp;</i>Voltar</a>                            
                        </div>

                        <?php
                        $atributos = array(
                            'name' => 'form_core',
                        );

                        if (isset($marca)) {
                            $marca_id = $marca->marca_id;
                        } else {
                            $marca_id = '';
                        }
                        ?>

                        <?php echo form_open('/restrita/marcas/core/' . $marca_id, $atributos); ?>





                        <div class="card-body">

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nome da marca</label>
                                    <input type="text" name="marca_nome" class="form-control" placeholder="Nome da marca" value="<?php echo (isset($marca) ? $marca->marca_nome : set_value('marca_nome')); ?>">
                                    <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
                                </div>   

                                <!--select de perfil de cliente ativo-->
                                <div class="form-group col-md-4">
                                    <label>Ativa</label>
                                    <select class="form-control" name="marca_ativa">
                                        <?php if (isset($marca)): ?>

                                            <option value="1" <?php echo ($marca->marca_ativa == 1 ? 'selected' : ''); ?>>Sim</option>
                                            <option value="0" <?php echo ($marca->marca_ativa == 0 ? 'selected' : ''); ?>>Não</option>

                                        <?php else: ?>

                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>

                                        <?php endif; ?>
                                    </select>
                                </div>

                                <?php if (isset($marca)): ?>

                                    <div class="form-group col-md-4">
                                        <label>Meta link da marca <mark>"este campo não pode ser editado"</mark></label>
                                        <input type="text" name="marca_meta_link" class="form-control" value="<?php echo $marca->marca_meta_link; ?>" readonly="">
                                    </div> 

                                <?php endif; ?>




                            </div>


                            <div class="form-row">


                                <?php if (isset($marca)): ?>
                                    <input type="hidden" name="marca_id" value="<?php echo $marca->marca_id ?>">
                                <?php endif; ?>

                            </div>
                        </div>
                        <!--Botao Submit-->
                        <div class="card-footer">
                            <button title="Salvar" class="btn btn-primary mr-2">Salvar</button>                      
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>

            </div>
    </section>

    <?php $this->load->view('restrita/layout/sidebar_settings'); ?>
</div>