<?php $this->load->view('restrita/layout/navibar'); ?>

<?php $this->load->view('restrita/layout/sidebar'); ?>




<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <!-- add content here -->

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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4><?php echo $titulo; ?></h4>
                            <a title="Cadastrar usuário" class="btn btn-primary float-right" href="<?php echo base_url('restrita/usuarios/core'); ?>"><i class="fa fa-plus">&nbsp;</i>Cadastrar</a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th class="text-center">Nome completo</th>
                                            <th class="text-center">E-mail</th>
                                            <th class="text-center">Usuário</th>
                                            <th class="text-center">Perfil de acesso</th>
                                            <th class="text-center">Status</th>
                                            <th class="nosort text-center">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($usuarios as $usuario): ?>
                                            <tr>
                                                <td class="text-center"><?php echo $usuario->id; ?></td>
                                                <td class="text-center"><?php echo $usuario->first_name . '&nbsp;' . $usuario->last_name; ?></td>
                                                <td class="text-center"><?php echo $usuario->email; ?></td>
                                                <td class="text-center"><?php echo $usuario->username; ?></td>
                                                <td class="text-center"><?php echo ($this->ion_auth->is_admin($usuario->id) ? 'Administrador' : 'Clientes'); ?></td>
                                                <td class="text-center"><?php echo ($usuario->active == 1 ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>'); ?></td>


                                                <td class="text-center">
                                                    <a title="Editar usuário" href="<?php echo base_url('restrita/usuarios/core/' . $usuario->id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;&nbsp;Editar</a>&nbsp;&nbsp;
                                                    <a title="Excluir usuário" href="<?php echo base_url('restrita/usuarios/delete/' . $usuario->id); ?>" class="btn btn-danger delete" data-confirm="Tem certeza da exclusão?"><i class="fa fa-trash">&nbsp;&nbsp;</i>Excluir</a>
                                                </td>                                          
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php $this->load->view('restrita/layout/sidebar_settings'); ?>



</div>