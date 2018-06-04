<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Inicio extends CI_Controller{
        public function index(){
            /*carrega pagina inicio */
            $this->load->model("jogadores_model");
            $partidas = $this->jogadores_model->buscarPartida();
            if(!$partidas){
                $this->load->view('paginas/inicio.php');
            }else{
                $dados = array("partidas"=> $partidas);
                $this->load->view('paginas/inicio.php',$dados);
            }
            
        }
        public function modoJogo(){
            $opcao = $this->input->post('modo');
            if($opcao != NULL){
                switch($opcao){
                    case 'pc':
                        redirect('Modo/PC');
                    break;
                    case 'amigo':
                        redirect('Modo/PVP');
                    break;
                }
            }else{
                $this->session->set_flashdata("status","Selecione um modo de jogo");
            }
            
        }
        
    }