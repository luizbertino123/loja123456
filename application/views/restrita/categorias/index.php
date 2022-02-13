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
                            <a title="Cadastrar usuário" class="btn btn-primary float-right" href="<?php echo base_url('restrita/categorias/core'); ?>"><i class="fa fa-plus">&nbsp;</i>Cadastrar</a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Nome da categoria filha</th>
                                            <th class="text-center">Meta link da categoria filha</th>
                                            <th class="text-center">Data de criação</th>
                                            <th class="text-center">Ativa</th>
                                            <th class="nosort text-center">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categorias as $categoria): ?>
                                            <tr>
                                                <td class="text-center"><?php echo $categoria->categoria_id; ?></td>
                                                <td class="text-center"><?php echo $categoria->categoria_nome?></td>
                                                <td class="text-center"><i data-feather="link-2" class="text-info"></i>&nbsp;&nbsp;<?php echo $categoria->categoria_meta_link; ?></td>
                                                <td class="text-center"><?php echo formata_data_banco_com_hora($categoria->categoria_data_criacao); ?></td>
                                                <td class="text-center"><?php echo ($categoria->categoria_ativa == 1 ? '<span class="badge badge-success">Sim</span>' : '<span class="badge badge-danger">Não</span>'); ?></td>


                                                <td class="text-center">
                                                    <a title="Editar usuário" href="<?php echo base_url('restrita/categorias/core/' . $categoria->categoria_id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;&nbsp;Editar</a>&nbsp;&nbsp;
                                                    <a title="Excluir usuário" href="<?php echo base_url('restrita/categorias/delete/' . $categoria->categoria_id); ?>" class="btn btn-danger delete" data-confirm="Tem certeza da exclusão da categoria?"><i class="fa fa-trash">&nbsp;&nbsp;</i>Excluir</a>
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