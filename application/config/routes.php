<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['login/ingresar'] = "LoginController";

//Inicio
$route['inicio'] = "InicioController";


//Inicio
$route['perfil'] = "PerfilController";

//Empresa
$route['empresas'] = "EmpresaController";

//Empresa
$route['personasnaturales'] = "PersonaNaturalController";

//Cursos
$route['cursos'] = "CursoController";

//Capacitador
$route['capacitadores'] = "CapacitadorController";

//Reservas
$route['reservas'] = "ReservaController";

//Realizar Reserva
$route['crear_reserva'] = "CrearReservaController";

//Alumno
$route['alumnos'] = "AlumnoController";


/*Grupo Detalle*/
/*Grp es igual a Grupos*/
$route['grp_em']="Grp_emController";
$route['grp_em/grupos']="Grp_emController/viewGrupos";

$route['grp_pn']="Grp_pnController";
$route['grp_pn/grupos']="Grp_pnController/viewGrupos";

$route['grp_cs']="Grp_csController";
$route['grp_cs/curso']="Grp_csController/viewCurso";


/*Grupo*/
$route['bancos']="BancoController";

/*Configuración*/
$route['settings']="SettingController";

/*Registro-Online*/

$route['empresas_registro_online'] = "EmpresaControllerRegistroOnline";


/*Reportes*/
$route['rpt/alumcurs']="RptController/alumCurs";
$route['rpt/alumcurs/curso']="RptController/viewVistaCurso";

$route['rpt/alumcert']="RptController/alumCert";

$route['rpt/pagos_empresas']="RptController/viewVistaPagosEmpresas";

$route['rpt/pagos_personas_natural']="RptController/viewVistaPagosPersonasNatural";

$route['rpt/correos'] = "RptController/viewCorreos";

$route['calendario'] = 'CalendarController';




/*Route Empresa------------------------*/

/*Login*/
$route['emp'] = "emp/LoginController";
$route['emp/e_login'] = "emp/LoginController";

/*Inicio*/
$route['emp/e_inicio'] = "emp/InicioController";

/*Alumnos*/
$route['emp/e_alumnos'] = "emp/AlumnoController";


/*Perfil*/
$route['emp/e_perfil'] = "emp/PerfilController";

/*Cursos*/
$route['emp/e_cursos'] = "emp/CursoController";

/*Grupos*/
$route['emp/e_grupos'] = "emp/GrupoController";

/*Grupo Detalle*/
$route['emp/e_grupos/detalle']="E_GrupoDetalleController";
$route['emp/e_grupos/detalle/verGrupoDetalle']="E_GrupoDetalleController/verGrupoDetalle";

/*Reportes*/
$route['emp/e_rpt/listacursos'] = "emp/RptController/viwListaCursos";

$route['emp/e_rpt/listacursos/curso'] = "emp/RptController/viewCursosAlumnos";

/*Verificar al profesional*/
$route['verificar_al_profesional']="VerificarProfesionalController";




