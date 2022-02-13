<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Master extends CI_Controller {

    public function __construct() {
        parent::__construct();


        if (!$this->ion_auth->logged_in()) {
            redirect('restrita/login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Categorias pai cadastradas',
            'styles' => array(
                'bundles/datatables/datatables.min.css',
                'bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'
            ),
            'scripts' => array(
                'bundles/datatables/datatables.min.js',
                'bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
                'bundles/jquery-ui/jquery-ui.min.js',
                'js/page/datatables.js',
            ),
            'master' => $this->core_model->get_all('categorias_pai'),
        );

//         echo '<pre>';
//         print_r($data['categorias_pai']);
//         exit();

        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/master/index');
        $this->load->view('restrita/layout/footer');
    }

    public function core($categoria_pai_id = NULL) {


        $categoria_pai_id = (int) $categoria_pai_id;

        if (!$categoria_pai_id) {

            //cadastrar

            $this->form_validation->set_rules('categoria_pai_nome', 'Nome da categoria pai', 'trim|required|min_length[4]|max_length[30]|callback_valida_nome_categoria');

            if ($this->form_validation->run()) {




                $data = elements(
                        array(
                            'categoria_pai_nome',
                            'categoria_pai_ativa',
                        ), $this->input->post()
                );

                //Definindo o Metalink
                $data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']);

                $data = html_escape($data);

                $this->core_model->insert('categorias_pai', $data);
                redirect('restrita/master');
            } else {
                //erro de validaçao

                $data = array(
                    'titulo' => 'Cadastrar categoria pai',
                );


                $this->load->view('restrita/layout/header', $data);
                $this->load->view('restrita/master/core');
                $this->load->view('restrita/layout/footer');
            }
        } else {

            if (!$master = $this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id))) {

                $this->session->set_flashdata('error', 'A categoria pai não foi encontrada!');
                redirect('restrita/master');
            } else {

                //editando.........

                $this->form_validation->set_rules('categoria_pai_nome', 'Nome da categoria pai', 'trim|required|min_length[4]|max_length[30]|callback_valida_nome_categoria');

                if ($this->form_validation->run()) {


                    if ($this->input->post('categoria_pai_ativa') == 0) {
                        //definir proibição de desativação

                        if ($this->core_model->get_by_id('categorias', array('categoria_pai_id' => $categoria_pai_id))) {

                            $this->session->set_flashdata('error', 'Essa categoria pai não pode ser desativada, pois está vinculada a uma categoria filha  ');
                            redirect('restrita/categorias');
                        }
                    }



                    $data = elements(
                            array(
                                'categoria_pai_nome',
                                'categoria_pai_ativa',
                            ), $this->input->post()
                    );

                    //Definindo o Metalink
                    $data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']);

                    $data = html_escape($data);

                    $this->core_model->update('categorias_pai', $data, array('categoria_pai_id' => $categoria_pai_id));
                    redirect('restrita/master');
                } else {
                    //erro de validaçao

                    $data = array(
                        'titulo' => 'Editar categoria pai',
                        'master' => $master,
                    );

//                    echo '<pre>';
//                    print_r($data['categoria_pai']);
//                    exit();

                    $this->load->view('restrita/layout/header', $data);
                    $this->load->view('restrita/master/core');
                    $this->load->view('restrita/layout/footer');
                }
            }
        }
    }

    public function valida_nome_categoria($categoria_pai_nome) {

        $categoria_pai_id = (int) $this->input->post('categoria_pai_id');

        if (!$categoria_pai_id) {
            //cadastrando

            if ($this->core_model->get_by_id('categorias_pai', array('categoria_pai_nome' => $categoria_pai_nome))) {
                $this->form_validation->set_message('valida_nome_categoria', 'Essa categoria pai já existe');
                return false;
            } else {
                return true;
            }
        } else {

            //editando

            if ($this->core_model->get_by_id('categorias_pai', array('categoria_pai_nome' => $categoria_pai_nome, 'categoria_pai_id !=' => $categoria_pai_id))) {
                $this->form_validation->set_message('valida_nome_categoria', 'Essa categoria pai já existe');
                return false;
            } else {
                return true;
            }
        }
    }

    public function delete($categoria_pai_id = NULL) {

        $categoria_pai_id = (int) $categoria_pai_id;

        if (!$categoria_pai_id || !$this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id))) {
            $this->session->set_flashdata('error', 'Essa categoria pai não foi encontrada');
            redirect('restrita/master');
        }

        if ($this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id, 'categoria_pai_ativa' => 1))) {
            $this->session->set_flashdata('error', 'Não é permitido excluir uma categoria pai ativa');
            redirect('restrita/master');
        }

        $this->core_model->delete('categorias_pai', array('categoria_pai_id' => $categoria_pai_id));
        redirect('restrita/master');
    }

}
