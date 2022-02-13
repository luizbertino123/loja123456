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
                            <a title="Voltar" class="btn btn-dark float-right" href="<?php echo base_url('restrita/categorias'); ?>"><i class="fa fa-chevron-circle-left">&nbsp;</i>Voltar</a>                            
                        </div>

                        <?php
                        $atributos = array(
                            'name' => 'form_core',
                        );

                        if (isset($categoria)) {
                            $categoria_id = $categoria->categoria_id;
                        } else {
                            $categoria_id = '';
                        }
                        ?>

                        <?php echo form_open('/restrita/categorias/core/' . $categoria_id, $atributos); ?>





                        <div class="card-body">

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Nome da categoria</label>
                                    <input type="text" name="categoria_nome" class="form-control" placeholder="Nome da categoria" value="<?php echo (isset($categoria) ? $categoria->categoria_nome : set_value('categoria_nome')); ?>">
                                    <?php echo form_error('categoria_nome', '<div class="text-danger">', '</div>'); ?>
                                </div>   

                                <!--select de perfil de cliente ativo-->
                                <div class="form-group col-md-3">
                                    <label>Ativa</label>
                                    <select class="form-control" name="categoria_ativa">
                                        <?php if (isset($categoria)): ?>

                                            <option value="1" <?php echo ($categoria->categoria_ativa == 1 ? 'selected' : ''); ?>>Sim</option>
                                            <option value="0" <?php echo ($categoria->categoria_ativa == 0 ? 'selected' : ''); ?>>Não</option>

                                        <?php else: ?>

                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>

                                        <?php endif; ?>
                                    </select>
                                </div>

                                <!--select de perfil de cliente ativo-->
                                <div class="form-group col-md-3">
                                    <label>Categoria pai</label>
                                    <select class="form-control" name="categoria_pai_id">

                                        <?php foreach ($masters as $pai): ?>


                                            <?php if (isset($categoria)): ?>

                                                <option value="<?php echo $pai->categoria_pai_id; ?>" <?php echo ($pai->categoria_pai_id == $categoria->categoria_pai_id ? 'selected' : '') ?>><?php echo $pai->categoria_pai_nome; ?></option>

                                            <?php else: ?>

                                                <option value="<?php echo $pai->categoria_pai_id; ?>" ><?php echo $pai->categoria_pai_nome; ?></option>

                                            <?php endif; ?>

                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <?php if (isset($categoria)): ?>

                                    <div class="form-group col-md-3">
                                        <label>Meta link da categoria<mark>"este campo não pode ser editado"</mark></label>
                                        <input type="text" name="categoria_meta_link" class="form-control" value="<?php echo $categoria->categoria_meta_link; ?>" readonly="">
                                    </div> 

                                <?php endif; ?>




                            </div>


                            <div class="form-row">


                                <?php if (isset($categoria)): ?>
                                    <input type="hidden" name="categoria_id" value="<?php echo $categoria->categoria_id ?>">
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