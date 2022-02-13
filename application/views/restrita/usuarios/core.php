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
                            <a title="Voltar" class="btn btn-dark float-right" href="<?php echo base_url('restrita/usuarios'); ?>"><i class="fa fa-chevron-circle-left">&nbsp;</i>Voltar</a>                            
                        </div>

                        <?php
                        $atributos = array(
                            'name' => 'form_core',
                        );

                        if (isset($usuario)) {
                            $usuario_id = $usuario->id;
                        } else {
                            $usuario_id = '';
                        }
                        ?>

                        <?php echo form_open('/restrita/usuarios/core/' . $usuario_id, $atributos); ?>





                        <div class="card-body">

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nome</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Nome" value="<?php echo (isset($usuario) ? $usuario->first_name : set_value('first_name')); ?>">
                                    <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
                                </div>        

                                <div class="form-group col-md-4">
                                    <label>Sobrenome</label>
                                    <input type="text" name="last_name" class="form-control"  placeholder="Sobrenome" value="<?php echo (isset($usuario) ? $usuario->last_name : set_value('last_name')); ?>">
                                    <?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo (isset($usuario) ? $usuario->email : set_value('email')); ?>">
                                    <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                                </div> 

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Usuário</label>
                                    <input type="text" name="username" class="form-control" placeholder="Usuário" value="<?php echo (isset($usuario) ? $usuario->username : set_value('username')); ?>">
                                    <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Senha</label>
                                    <input type="password" name="password" class="form-control" placeholder="Senha">
                                    <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Confirmar Senha</label>
                                    <input type="password" name="confirma" class="form-control" placeholder="Confirmar senha">
                                    <?php echo form_error('confirma', '<div class="text-danger">', '</div>'); ?>
                                </div>



                            </div>

                            <div class="form-row">

                                <!--select de perfil de acesso -->
                                <div class="form-group col-md-4">
                                    <label>Perfil de acesso</label>
                                    <select class="form-control" name="perfil">

                                        <?php foreach ($grupos as $grupo): ?>

                                            <?php if (isset($usuario)): ?>

                                                <option value="<?php echo $grupo->id; ?>" <?php echo ($grupo->id == $perfil->id ? 'selected' : ''); ?>><?php echo $grupo->name; ?></option>

                                            <?php else: ?>

                                                <option value="<?php echo $grupo->id; ?>"><?php echo $grupo->name; ?></option>

                                            <?php endif; ?>

                                        <?php endforeach; ?>

                                    </select>
                                </div>

                                <!--select de perfil de cliente ativo-->
                                <div class="form-group col-md-4">
                                    <label>Ativo</label>
                                    <select class="form-control" name="active">
                                        <?php if (isset($usuario)): ?>

                                            <option value="1" <?php echo ($usuario->active == 1 ? 'selected' : ''); ?>>Sim</option>
                                            <option value="0" <?php echo ($usuario->active == 0 ? 'selected' : ''); ?>>Não</option>

                                        <?php else: ?>

                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>

                                        <?php endif; ?>
                                    </select>
                                </div>

                                <?php if (isset($usuario)): ?>
                                    <input type="hidden" name="usuario_id" value="<?php echo $usuario->id ?>">
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