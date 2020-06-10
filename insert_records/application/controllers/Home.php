<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('home');
	}

	public function loadusers() {

		if(!$this->input->is_ajax_request()) {
			echo json_encode(['status' => false, 'msg' => 'Ups, algo ocurrió']);
			return;
		}

		$this->load->model('musers');

		$all_users = $this->musers->get_allusers();
		if(!$all_users) {
			echo json_encode(['status' => false, 'msg' => 'No hay registros']);
			return;
		}

		echo json_encode(['status' => true, 'data' => $all_users]);
	}

	public function adduser() {
		$data['nombre']   = $this->input->post('nombre');
		$data['email']    = $this->input->post('email');
		$data['telefono'] = $this->input->post('telefono');

		if(!$this->input->is_ajax_request()) {
			echo json_encode(['status' => false, 'msg' => 'Ups, algo ocurrió']);
			return;
		}

		// Validar que el nombre no tenga menos de 3 caracteres
		if(strlen($data['nombre']) < 3 ) {
			echo json_encode(['status' => false, 'msg' => 'El nombre debe tener al menos tres caracteres']);
			return;
		}

		// Validar que el correo ingresado sea válido ( filter_var devuelve true o false)
		if(!filter_var( $data['email'] , FILTER_VALIDATE_EMAIL)) {
			echo json_encode(['status' => false, 'msg' => 'El email ingresado no es válido']);
			return;
		}

		// Validar que el teléfono ingresado sea un número y que tenga 9 caracteres
		if(!is_numeric($data['telefono'])) {
			echo json_encode(['status' => false, 'msg' => 'Tienes que ingresar números']);
			return;
		}

		if( strlen($data['telefono']) != 9 ) {
			echo json_encode(['status' => false, 'msg' => 'El teléfono debe tener nueve caracteres']);
			return;
		}


		// Si pasa todo procedemos a agregar
		$this->load->model('musers');
		$user_data =
		[
			'name'  => $data['nombre'],
			'email' => $data['email'],
			'phone' => $data['telefono']
		];

		$add_user = $this->musers->add_newuser($user_data);

		if(!$add_user) {
			echo json_encode(['status' => false, 'msg' => 'Algo ocurrió, no se pudo insertar el registro']);
			return;
		}

		echo json_encode(['status' => true]);
	}
}