<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Sistema extends CI_Controller {

    public function __construct() {
        parent::__construct();


        if (!$this->ion_auth->logged_in()) {
            redirect('restrita/login');
        }
    }

    public function index() {


        $this->form_validation->set_rules('sistema_razao_social', 'Razão social', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('sistema_nome_fantasia', 'Nome fantasia', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('sistema_cnpj', 'CNPJ', 'trim|required|exact_length[18]');
        $this->form_validation->set_rules('sistema_ie', 'Inscrição estadual', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('sistema_telefone_fixo', 'Telefone fixo', 'trim|required|exact_length[14]');
        $this->form_validation->set_rules('sistema_telefone_movel', 'Telefone móvel', 'trim|required|min_length[14]|max_length[15]');
        $this->form_validation->set_rules('sistema_cep', 'CEP', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('sistema_endereco', 'Endereço', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('sistema_numero', 'Número', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('sistema_cidade', 'Cidade', 'trim|required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('sistema_estado', 'UF', 'trim|required|exact_length[2]');
        $this->form_validation->set_rules('sistema_site_url', 'URL do site', 'trim|required|valid_url|max_length[100]');
        $this->form_validation->set_rules('sistema_email', 'Email de contato', 'trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('sistema_produtos_destaques', 'Quantidade produtos destaque', 'trim|required|integer');

        if ($this->form_validation->run()) {


            /*
             * [sistema_razao_social] => Loja virtual Inc
              [sistema_nome_fantasia] => Vende tudo!
              [sistema_cnpj] => 80.838.809/0001-26
              [sistema_ie] => 683.90228-49
              [sistema_telefone_fixo] => (41) 3232-3030
              [sistema_telefone_movel] => (41) 9999-9999
              [sistema_email] => vendetudo@contato.com.br
              [sistema_site_url] => http://vendetudo.com.br
              [sistema_cep] => 80510-000
              [sistema_endereco] => Rua da Programação
              [sistema_numero] => 54
              [sistema_cidade] => Curitiba
              [sistema_estado] => PR
              [sistema_produtos_destaques] => 6
              [value] => 1
              [icon-input] => 1
              [custom-switch-checkbox] => on
             */

            $data = elements(
                    array(
                        'sistema_razao_social',
                        'sistema_nome_fantasia',
                        'sistema_cnpj',
                        'sistema_ie',
                        'sistema_telefone_fixo',
                        'sistema_telefone_movel',
                        'sistema_email',
                        'sistema_site_url',
                        'sistema_cep',
                        'sistema_endereco',
                        'sistema_numero',
                        'sistema_cidade',
                        'sistema_estado',
                        'sistema_produtos_destaques',
                    ), $this->input->post()
            );

            $data['sistema_estado'] = strtoupper($data['sistema_estado']);

            $data = html_escape($data);

            $this->core_model->update('sistema', $data, array('sistema_id' => 1));
            redirect('restrita/sistema');
            
            
        } else {
            //Erro de validaçao

            $data = array(
                'titulo' => 'Informações da loja',
                'scripts' => array(
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ),
                'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),
            );

            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/sistema/index');
            $this->load->view('restrita/layout/footer');
        }
    }
    
    public function correios() {


        $this->form_validation->set_rules('config_cep_origem', 'CEP de origem', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('config_codigo_pac', 'Serviço PAC', 'trim|required|exact_length[5]');
        $this->form_validation->set_rules('config_codigo_sedex', 'Serviço SEDEX', 'trim|required|exact_length[5]');
        $this->form_validation->set_rules('config_somar_frete', 'Valor a ser somado ao frete', 'trim|required');
        $this->form_validation->set_rules('config_valor_declarado', 'Valor declarado', 'trim|required');

        if ($this->form_validation->run()) {



            $data = elements(
                    array(
                        'config_cep_origem',
                        'config_codigo_pac',
                        'config_codigo_sedex',
                        'config_somar_frete',
                        'config_valor_declarado',
                    ), $this->input->post()
            );

            //Remove a vírgula
            $data['config_somar_frete'] = str_replace(',' , '', $data['config_somar_frete']);
            
            $data['config_valor_declarado'] = str_replace(',' , '', $data['config_valor_declarado']);

            $data = html_escape($data);

            $this->core_model->update('config_correios', $data, array('config_id' => 1));
            redirect('restrita/sistema/correios');
            
            
        } else {
            //Erro de validaçao

            $data = array(
                'titulo' => 'Editar informações dos correios',
                'scripts' => array(
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ),
                'correio' => $this->core_model->get_by_id('config_correios', array('config_id' => 1)),
            );

            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/sistema/correios');
            $this->load->view('restrita/layout/footer');
        }
    }
        
   
}
    
    


