<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Jogo extends CI_Controller{
        public function jogar(){
            $modo = $this->session->userdata("modo-jogo");
            if($modo =="pc"){
                 $this->form_validation->set_rules("nome","nome","required|min_length[3]");
                $validacao = $this->form_validation->run();
                if($validacao){
                    $marcador = $this->input->post('marcador');
                    $nomeJogador = $this->input->post('nome');
                    if($marcador == "x"){
                        $jogadores = array("jogadorx"=>$nomeJogador,"jogadoro"=>"computador");
                        $this->load->view('paginas/tabuleiro.php',$jogadores);
                    }else{
                        $jogadores = array("jogadoro"=>$nomeJogador,"jogadorx"=>"computador");
                        $this->load->view('paginas/tabuleiro.php',$jogadores);
                    }
                }else{
                    $this->load->view('paginas/contraPc.php');
                }
            }elseif ($modo=="amigo") {
                $this->form_validation->set_rules("nomejx","nomejx","required|min_length[3]");
                $this->form_validation->set_rules("nomejo","nomejo","required|min_length[3]");
                $validacao = $this->form_validation->run();
                if($validacao){
                    $jogadorx= $this->input->post('nomejx');
                    $jogadoro = $this->input->post('nomejo');
                    $jogadores = array("jogadorx"=>$jogadorx,"jogadoro"=>$jogadoro);
                    $this->load->view('paginas/tabuleiro.php',$jogadores);
                }else{
                    $this->load->view('paginas/contraJogador.php');
                }
                
            }else{
                $this->session->set_flashdata("erro","Opa, parece que estamos com um problema na sessão 'modo-jogo'");
                redirect("Inicio/index");
            }
            
        }  

        public function validar(){
            $vencedor = $this->input->post('vencedor');
            $jogadorx = $this->input->post('jogadorx');
            $jogadoro = $this->input->post('jogadoro');
            $replay = TRUE;
            $modo = $this->session->userdata("modo-jogo");
            if($modo == "pc"){
                $computador = TRUE;
            }else{
                $computador = FALSE;
            }
            /* TABULEIRO */
            $l1c1 = $this->input->post('l1c1');
            $l1c2 = $this->input->post('l1c2');
            $l1c3 = $this->input->post('l1c3');
            $l2c1 = $this->input->post('l2c1');
            $l2c2 = $this->input->post('l2c2');
            $l2c3 = $this->input->post('l2c3');
            $l3c1 = $this->input->post('l3c1');
            $l3c2 = $this->input->post('l3c2');
            $l3c3 = $this->input->post('l3c3');
            /*
                verificando por linha!! 
                l1c1 | l1c2 | l1c3
                ------------------
                l2c1 | l2c2 | l2c3
                ------------------
                l3c1 | l3c2 | l3c3
            */
            $partida = array(
                "COMPUTADOR"=>$computador,
                "XIS"=>$jogadorx,
                "CIRCULO"=>$jogadoro,
                "REPLAY"=>$replay,
                "VENCEDOR"=>$vencedor,
                "L1C1" => $l1c1,
                "L1C2" => $l1c2,
                "L1C3" => $l1c3,
		        "L2C1" => $l2c1,
                "L2C2" => $l2c2,
                "L2C3" => $l2c3,
                "L3C1" => $l3c1,
                "L3C2" => $l3c2,
                "L3C3" => $l3c3
            );
            $this->load->model("jogadores_model");
            $this->jogadores_model->salvarPartida($partida);
            $this->session->set_flashdata("salvo","Partida salva com sucesso!");
            redirect('Inicio/index');
        }
            
        public function sair(){
            $this->session->unset_userdata("modo-jogo");
            redirect('Inicio/index');
        }
        public function replay($id){
            $this->load->model("jogadores_model");
            $partida = $this->jogadores_model->buscarPorId($id);
            if($partida != null){
                $dados = array("partida" => $partida);
                $this->session->set_flashdata("replay","Assistindo replay !!");
                $this->load->view('paginas/tabuleiro.php',$dados);
            }else{
                $this->session->set_flashdata("replay","Não foi possivel reproduzir este replay!");
                redirect('Inicio/index');
            }
        }
    }