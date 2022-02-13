<?php

defined('BASEPATH') or exit('Ação não permitida');

class Usuarios extends CI_Controller {

    public function __construct() {

        parent::__construct();

        //sessao valida
    }

    public function index() {

        $data = array(
            'titulo' => 'Usuários cadastrados',
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
            'usuarios' => $this->ion_auth->users()->result(),
        );

        // echo '<pre>';
        // print_r($data['usuarios']);
        // exit();

        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/usuarios/index');
        $this->load->view('restrita/layout/footer');
    }

    public function core($usuario_id = NULL) {

        $usuario_id = (int) $usuario_id;

        if (!$usuario_id) {

            //*********cadastrar usuario********************//*

            $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[30]');
            $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[30]');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[4]|max_length[100]|valid_email|callback_valida_email');
            $this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[4]|max_length[30]|callback_valida_usuario');
            $this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[8]|max_length[50]');
            $this->form_validation->set_rules('confirma', 'Confirma Senha', 'trim|required|matches[password]');

            if ($this->form_validation->run()) {

//                [first_name] => Leonardo
//                [last_name] => Pereira
//                [email] => leogames850@gmail.com
//                [username] => Wick
//                [password] => 12345678
//                [confirma] => 12345678
//                [perfil] => 2
//                [active] => 1


                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $email = $this->input->post('email');
                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'active' => $this->input->post('active'),
                );
                $group = array($this->input->post('perfil')); // Sets user to admin or custumer

                if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                    $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
                } else {
                    $this->session->set_flashdata('error', $this->ion_auth->errors());
                }
                redirect('restrita/usuarios');
            } else {

                //Erro de validação
                $data = array(
                    'titulo' => 'Cadastrar usuário',
                    'grupos' => $this->ion_auth->groups()->result(),
                );

                $this->load->view('restrita/layout/header', $data);
                $this->load->view('restrita/usuarios/core');
                $this->load->view('restrita/layout/footer');
            }
        } else {

            if (!$usuario = $this->ion_auth->user($usuario_id)->row()) {

                $this->session->set_flashdata('error', 'Usuário não foi encontrado');
                redirect('restrita/usuarios');
            } else {

                //Edita o usuario
                //validaçao dos campos
//                [first_name] => Admin
//                [last_name] => istrator
//                [email] => admin@admin.com
//                [username] => administrator
//                [password] =>
//                [confirma] =>
//                [perfil] => 1
//                [active] => 1
//                [usuario_id] => 1
                //"trim" serve para remover os espaços

                $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[30]');
                $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[30]');
                $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[4]|max_length[100]|valid_email|callback_valida_email');
                $this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[4]|max_length[30]|callback_valida_usuario');
                $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]|max_length[50]');
                $this->form_validation->set_rules('confirma', 'Confirma Senha', 'trim|matches[password]');

                if ($this->form_validation->run()) {

//                    echo '<pre>';
//                    print_r($this->input->post());
//                    exit();

                    $data = elements(
                            array(
                                'first_name',
                                'last_name',
                                'email',
                                'username',
                                'password',
                                'active',
                            ), $this->input->post()
                    );

                    $password = $this->input->post('password');

                    /*                     * ******Não atualiza a senha se a mesma nao foi passada******* */
                    if (!$password) {
                        unset($data['password']);
                    }

                    /* Sanitizando o $data */
                    $data = html_escape($data);


                    if ($this->ion_auth->update($usuario_id, $data)) {

                        $perfil = (int) $this->input->post('perfil');

                        if ($perfil) {

                            $this->ion_auth->remove_from_group(NULL, $usuario_id);
                            $this->ion_auth->add_to_group($perfil, $usuario_id);
                        }


                        $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
                    } else {
                        $this->session->set_flashdata('error', $this->ion_auth->errors());
                    }
                    redirect('restrita/usuarios');
                } else {
                    //Erro de validaçao

                    $data = array(
                        'titulo' => 'Editar usuário',
                        'usuario' => $usuario,
                        'perfil' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                        'grupos' => $this->ion_auth->groups()->result(),
                    );

                    $this->load->view('restrita/layout/header', $data);
                    $this->load->view('restrita/usuarios/core');
                    $this->load->view('restrita/layout/footer');
                }
            }
        }
    }

    public function valida_email($email) {

        $usuario_id = $this->input->post('usuario_id');

        if (!$usuario_id) {

            //cadastrando....

            if ($this->core_model->get_by_id('users', array('email' => $email))) {
                $this->form_validation->set_message('valida_email', 'Esse e-mail já existe');
                return false;
            } else {
                return true;
            }
        } else {
            //editando....

            if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
                $this->form_validation->set_message('valida_email', 'Esse e-mail já existe');
                return false;
            } else {
                return true;
            }
        }
    }

    public function valida_usuario($username) {

        $usuario_id = $this->input->post('usuario_id');

        if (!$usuario_id) {

            //cadastrando....

            if ($this->core_model->get_by_id('users', array('username' => $username))) {
                $this->form_validation->set_message('valida_usuario', 'Esse usuário já existe');
                return false;
            } else {
                return true;
            }
        } else {
            //editando....

            if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
                $this->form_validation->set_message('valida_usuario', 'Esse usuário já existe');
                return false;
            } else {
                return true;
            }
        }
    }

    public function delete($usuario_id = NULL) {

        $usuario_id = (int) $usuario_id;

        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
            $this->session->set_flahsdata('error', 'O usuário não foi encontrado');
            redirect('restrita/usuarios');
        } else {

            //começa a exclusão
            if ($this->ion_auth->is_admin($usuario_id)) {
                $this->session->set_flashdata('error', 'Não é permitido excluir um usuário com o perfil de Administrador');
                redirect('restrita/usuarios');
            }
            if($this->ion_auth->delete_user($usuario_id)){
                $this->session->set_flashdata('sucesso', 'Usuário excluido com sucesso!');
            }else{
                $this->session->set_flashdata('error', $this->ion_auth->errors());
            }
            redirect('restrita/usuarios');
            
        }
    }

}
