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
                            <a title="Cadastrar produtos" class="btn btn-primary float-right" href="<?php echo base_url('restrita/produtos/core'); ?>"><i class="fa fa-plus">&nbsp;</i>Cadastrar</a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Código</th>
                                            <th class="text-center">Nome do produto</th>
                                            <th class="text-center">Marca</th>
                                            <th class="text-center">Categoria</th>
                                            <th class="text-center">Valor</th>
                                            <th class="text-center">Ativo</th>
                                            <th class="nosort text-center">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($produtos as $produto): ?>
                                            <tr>


                                                <td class="text-center"><?php echo $produto->produto_codigo; ?></td>
                                                <td class="text-center"><?php echo $produto->produto_nome; ?></td>
                                                <td class="text-center"><?php echo $produto->marca_nome; ?></td>
                                                <td class="text-center"><?php echo $produto->categoria_nome; ?></td>
                                                <td class="text-center"><?php echo 'R$&nbsp;' . number_format($produto->produto_valor, 2); ?></td>
                                                <td class="text-center"><?php echo ($produto->produto_ativo == 1 ? '<span class="badge badge-success">Sim</span>' : '<span class="badge badge-danger">Não</span>'); ?></td>



                                                <td class="text-center">
                                                    <a title="Editar usuário" href="<?php echo base_url('restrita/produtos/core/' . $produto->produto_id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;&nbsp;Editar</a>&nbsp;&nbsp;
                                                    <a title="Excluir usuário" href="<?php echo base_url('restrita/produtos/delete/' . $produto->produto_id); ?>" class="btn btn-danger delete" data-confirm="Tem certeza da exclusão do produto?"><i class="fa fa-trash">&nbsp;&nbsp;</i>Excluir</a>
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