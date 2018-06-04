<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Modo extends CI_Controller{
        public function pc(){
            $this->session->set_userdata("modo-jogo","pc");
            $this->load->view('paginas/contraPC.php');
        }
        public function pvp(){
            $this->session->set_userdata("modo-jogo","amigo");
            $this->load->view('paginas/contraJogador.php');
        }

    }