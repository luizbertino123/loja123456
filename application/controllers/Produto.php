<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Produto extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($produto_meta_link = NULL) {
        
        $sistema = info_header_footer();

        if (!$produto_meta_link || !$produto = $this->produtos_model->get_by_id($produto_meta_link)) {

            redirect('/');
        } else {

            $data = array(
                'titulo' => 'Detalhes produto',
                'produto' => $produto,
                'sistema' => $sistema,
                'scripts' => array(
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                    'js/add_produto.js',
                ),
            );

            $data['fotos_produtos'] = $this->core_model->get_all('produtos_fotos', array('foto_produto_id' => $produto->produto_id));
            
//            echo'<pre>';
//            print_r($data);
//            exit();

            $this->load->view('web/layout/header', $data);
            $this->load->view('web/produto');
            $this->load->view('web/layout/footer');
        }
    }

}
