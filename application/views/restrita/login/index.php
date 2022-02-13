     

<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4><?php echo $titulo; ?></h4>
                    </div>
                    <div class="card-body">

                        <?php if ($message = $this->session->flashdata('error')): ?>
                            <div class="alert alert-success alert-has-icon alert-dismissible show fade">
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



                        <?php
                        $atritubo = array(
                            'class' => 'needs-validation',
                        );
                        ?>

                        <?php echo form_open('restrita/login/auth'); ?>


                        <div class="form-group">
                            <label for="email">Seu E-mail</label>
                            <input type="email" class="form-control" name="email" tabindex="1" required autofocus>
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Sua senha</label>
                            </div>
                            <input type="password" class="form-control" name="password" tabindex="2" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input id="remember-me" type="checkbox" name="remember" class="custom-control-input" tabindex="3">
                                <label class="custom-control-label" for="remember-me">Manter conectado</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Entrar
                            </button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>