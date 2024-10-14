<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnoModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Método para contar el número total de registros en la tabla de alumnos
    public function get_count() {
        return $this->db->count_all('alumnos');
    }

    // Método para obtener los registros de acuerdo a la página actual
    public function get_records($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('alumnos');

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return [];
    }

    // Método para buscar registros
	public function search($search_term, $foremp, $limit, $offset) {
		// Inicia el cacheo de la consulta
		$this->db->start_cache();
	
		// Si hay un término de búsqueda, aplicar `LIKE`
		if (!empty($search_term)) {
			$this->db->group_start(); // Abre un grupo para agrupar los likes con OR
			$this->db->like('numerodocumento', $search_term);
			$this->db->or_like('nombres', $search_term);
			$this->db->or_like('apellidos', $search_term);
			$this->db->or_like('email', $search_term);
			$this->db->or_like('telefono', $search_term);
			$this->db->group_end(); // Cierra el grupo
		}
	
		// Si hay una empresa seleccionada, aplicar `WHERE`
		if (!empty($foremp)) {
			$this->db->where('id_empresa', $foremp);
			$this->db->from('vw_alumnos_por_empresa'); // Cambiar la tabla para empresa
		} else {
			$this->db->from('alumnos'); // Tabla predeterminada
		}
	
		$this->db->stop_cache(); // Detiene el cacheo de la consulta
	
		// Obtener el total de resultados (sin paginación)
		$total_query = $this->db->get();
		//order
		$this->db->order_by('id_alumno','desc');
		$total_rows = $total_query->num_rows();
	
		// Aplicar limit y offset para la paginación
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
	
		$this->db->flush_cache(); // Limpia el cacheo de la consulta
	
		// Devolver los resultados y el total de filas
		return ['results' => $query->result(), 'total_rows' => $total_rows];
	}
	

    // Método para contar el número total de resultados de búsqueda
    public function count_search_results($search_term, $foremp) {
		// Inicia el cacheo de la consulta
		$this->db->start_cache();

		// Si hay un término de búsqueda, aplicar `LIKE`
		if (!empty($search_term)) {
			$this->db->group_start(); // Abre un grupo para agrupar los likes con OR
			$this->db->like('numerodocumento', $search_term);
			$this->db->or_like('nombres', $search_term);
			$this->db->or_like('apellidos', $search_term);
			$this->db->or_like('email', $search_term);
			$this->db->or_like('telefono', $search_term);
			$this->db->group_end(); // Cierra el grupo
		}

		// Si hay una empresa seleccionada, aplicar `WHERE`
		if (!empty($foremp)) {
			$this->db->where('id_empresa', $foremp);
			$this->db->from('vw_alumnos_por_empresa'); // Cambiar la tabla para empresa
		} else {
			$this->db->from('alumnos'); // Tabla predeterminada
		}

		$this->db->stop_cache(); // Detiene el cacheo de la consulta

		// Obtener el total de resultados (sin paginación)
		$total_query = $this->db->get();
		$total_rows = $total_query->num_rows();

		$this->db->flush_cache(); // Limpia el cacheo de la consulta

		return $total_rows;
	}

	//get empresa for select
	public function getEmpresaSelect(){
		$this->db->select('id_empresa, razonsocial');
		$this->db->where('tipo','EM');
		$query = $this->db->get('empresas');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function showAllAlumno(){
		$this->db->order_by('id_alumno','desc');
		$query = $this->db->get('alumnos');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	// public function showAllForEmpresa(){
	// 	$id = $this->input->get('id');
	// 	$this->db->where('id_empresa', $id);
	// 	$this->db->order_by('id_alumno','desc');
	// 	$query = $this->db->get('vw_alumnos_por_empresa');
	// 	if($query->num_rows() > 0){
	// 		return $query->result();
	// 	}else{
	// 		return false;
	// 	}
	// }

	public function editAlumno(){
		$id = $this->input->get('id');
		$this->db->where('id_alumno', $id);
		$query = $this->db->get('alumnos');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function getEmpresa() {
	 	$this->db->select('id_empresa, razonsocial');
	 	$this->db->where('tipo','EM');
	 	$query = $this->db->get('empresas');
		$empresas = array();
		if ($query -> result()){
 			foreach ($query->result() as $empresa){
 				$empresas[$empresa->id_empresa] = $empresa->razonsocial;
 			}
 			return $empresas;
 		}else{
 		return FALSE;
 		}
 	}

	public function updateAlumno($field){
		$id = $this->input->post('txtIdAlumno');
		$this->db->where('id_alumno',$id);
		$this->db->update('alumnos',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//delete alumno, primero verifica si el alumno tiene cursos asignados
	public function deleteAlumno(){
		// Obtener el id del alumno
		$id = $this->input->post('id');
		// Verificar si el alumno tiene cursos asignados
		$this->db->where('id_alumno', $id);
		$query = $this->db->get('alumno_grupo');
	
		if($query->num_rows() > 0){
			return 'has_courses';
		}else{
			$this->db->where('id_alumno', $id);
			$this->db->delete('alumnos');
			if($this->db->affected_rows() > 0){
				return 'true';
			}else{
				return 'false';
			}
		}
	}
	

	public function addAlumnoByCertInternacional() {
		// Obtener datos del formulario
		$tipodocumento = $this->input->post('txttipodocumento');
		$txtnumerodocumento = $this->input->post('txtnumerodocumento');
		$txtapellidos = $this->input->post('txtapellidos');
		$txtnombres = $this->input->post('txtnombres');
		$txtfnacimiento = $this->input->post('txtfnacimiento');
		$txttelefono = $this->input->post('txttelefono');
		$txtemail = $this->input->post('txtemail');
		$txtcargo = $this->input->post('txtcargo');

		$config['upload_path']          = './uploads/fotos';
        $config['allowed_types']        = 'png|PNG|jpg|JPG';
        $config['max_size']             = 0;
      	$this->load->library('upload', $config);

		if($this->upload->do_upload("fotoperfil")){
			$datfirm = array('upload_data' => $this->upload->data());
			$fotoperfil = $datfirm['upload_data']['file_name'];
		}else{
			$fotoperfil = 'default.png';
		}
	
		// Datos para la empresa
		$dataforempresa = array(
			'razonsocial' => '-',
			'ruc' => $txtnumerodocumento,
			'direccion' => '-',
			'emailcontacto' => $txtemail,
			'nombrecontacto' => $txtnombres,
			'apellidoscontacto' => $txtapellidos,
			'telefono' => $txttelefono,
			'emailfactura' => '-',
			'empresa_pn' => '',
			'cargo_pn' => $txtcargo,
			'nombreusuario' => $txtnumerodocumento,
			'password' => $txtnumerodocumento,
			'tyc' => '1',
			'tipo' => 'PN'
		);
	
		// Guardar la empresa
		if (!$this->db->insert('empresas', $dataforempresa)) {
			return false; // Manejo de error en la inserción
		}
	
		// Datos para el alumno
		$dataforalumno = array(
			'tipodocumento' => $tipodocumento,
			'numerodocumento' => $txtnumerodocumento,
			'apellidos' => $txtapellidos,
			'nombres' => $txtnombres,
			'fnacimiento' => $txtfnacimiento,
			'telefono' => $txttelefono,
			'email' => $txtemail,
			'fotoperfil' => $fotoperfil,
		);
	
		// Guardar alumno y devolver el ID
		if ($this->db->insert('alumnos', $dataforalumno)) {
			// Retornar ID del alumno insertado
			return $this->db->insert_id(); 
		} else {
			return false; // Manejo de error en la inserción
		}
	}
	
	


}
