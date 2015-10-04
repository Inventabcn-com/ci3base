<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sesion_model extends CI_Model{
	function __construct(){
        parent::__construct();				
    }
	//mustra sesion_ip, sesion_so, sesion_ultima_entrada, sesion_nivel,sesion_alias con el sesion_id  determinado
    function ver() { 
		$id = $this->sesion->ver('sesion_id');
		$consulta = $this->db->where('sesion_id', $id);
		$consulta = $this->db->get('sesion');
		return $consulta;
    }	
    function usuario() { 
		$id = $this->sesion->ver('sesion_id');
		$consulta = $this->db->where('sesion_id', $id);
		$consulta = $this->db->get('sesion');
		foreach($consulta->result() as $ver){
			return $ver->sesion_usuario_id;
		}		
    }
     // login
    function actualizar($sesion_usuario_id, $sesion_alias, $sesion_nivel){
        $consulta = array(
            'sesion_usuario_id '=> $sesion_usuario_id,
			'sesion_alias '=> $sesion_alias,
            'sesion_nivel' => $sesion_nivel
        );
        $this->db->where('sesion_id', $this->sesion->ver('sesion_id'));
		$this->db->update('sesion',$consulta);
        return; 
    }		
}