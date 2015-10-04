<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends MX_Controller {
	function __construct(){
        parent::__construct();
		//$this->output->enable_profiler(TRUE);// DEBUNGE TRUE FALSE
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// -- CONTROLA EL NIVEL DEL USUARIO. puede ver la pagina? quien es? 0=sin registrarse, 1=registrado, 2=editor 3=Supervisor 4=ADMIN -
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function nivel($requerido){
		//$datos['DEPURADOR'] = $this->config->item('DEPURADOR');
		
		if($requerido > 1){
			$this->load->config('sesion');// application\config
			$this->load->library('Sesion');
			$this->load->model('Sesion_model');
			$consulta = $this->Sesion_model->ver();
			foreach ($consulta->result() as $c) {
				
					$SESION['nombre'] = $c->sesion_alias;
					$SESION['usuario'] = $c->sesion_usuario_id;
					$SESION['nivel'] = $c->sesion_nivel;
					$SESION['data'] = $c->user_data;
					$SESION['entrada'] = $c->sesion_ultima_entrada;					
					$SESION['so'] = $c->sesion_so;
					$SESION['ip'] = $c->sesion_ip;
					$SESION['id'] = $c->sesion_id;
									
				if($requerido >= $c->sesion_nivel){//nivel requerido distinto de nivel del usuario ?
					if($requerido > 2){
						redirect('admin/login');
					}else{
						redirect('login');
					}
				}else{				
					return $SESION;
				}//FIN nivel requerido distinto de nivel del usuario ?
			}// FIN foreach
		}// FIN if
	}// FIN function
}