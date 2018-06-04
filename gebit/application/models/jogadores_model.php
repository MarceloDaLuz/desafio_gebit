<?php
    class jogadores_model extends CI_Model{
        /* salvar partida */
        public function salvarPartida($partida){
            $this->db->insert("PARTIDA",$partida);
        }
        public function buscarPartida(){
            return $this->db->get("PARTIDA")->result_array();
        }
        public function buscarPorId($id){
            return $this->db->get_where("PARTIDA",array("ID" =>$id))->row_array();
        }
    }