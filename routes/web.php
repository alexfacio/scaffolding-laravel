<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
	'prefix' => config('rules_route.base_sindi'),
	'namespace' => 'Admin'
	], function() {

	return view('admin.login');
});

//ACL
Route::group(['prefix' => 'acl'], function(){
	/*Route::get('change_psw', function(){
		$user = \App\User::where('email', '=', 'daniela.mercado@gv.com.mx')->first();
		$user->password	= bcrypt('morfeus');
		if( $user->save() ){
			return "CAMBIO";
		}
	});*/

	/*Route::get('rol_admin', function(){
		$msg = '';
		$tipo = 'super-admin';
		//Crear un Rol
		$roleAdmin = new Kodeine\Acl\Models\Eloquent\Role();
		$roleAdmin->name = 'Super-Administrador';
		$roleAdmin->slug = $tipo;
		$roleAdmin->description = 'Privilegios de Super-Administrador';
		if( $roleAdmin->save() ){
			$msg.='<p>Rol '.$tipo.' Creado</p>';
		}

		$user = \App\User::find(1);
		$es_nuevo = false;
		if( !$user ){
			$user = new App\User;
			$es_nuevo = true;
		}
		$user->name     = 'Super-Administrador';
		$user->email    = 'c.torres@unexpect.mx';
		$user->password = bcrypt('');
		if( $user->save() ){
			if( $es_nuevo ){
				$msg.='<p>Usuario Creado</p>';
			}
			else{
				$msg.='<p>Usuario Actualizado</p>';
			}
		}

		// by object
		//$user->assignRole($roleAdmin);
		// or by id
		//$user->assignRole($roleAdmin->id);
		// or by just a slug
		$user->assignRole($tipo);
		$msg.='Usuario Asignado al Rol '.$tipo;

		return $msg;

	});*/

	/*Route::get('perm_admin_prod', function(){
		//Crear permiso para administración de productos
		$permission = new Kodeine\Acl\Models\Eloquent\Permission();
		$perm = $permission->create([
			'name'        => 'productos',
			'slug'        => [          // pass an array of permissions.
				'create'     => true,
				'view'       => true,
				'update'     => true,
				'delete'     => true,
				//'view.phone' => true
			],
			'description' => 'Gestiona los permisos de sección de Productos'
		]);

		return "<p>Permiso para productos Creado</p>";
	});*/

	/*Route::get('asig_admin_prod', function(){
		//Crear Asigna permisos a un rol
		$roleAdmin = Kodeine\Acl\Models\Eloquent\Role::find(1); // Role para admin
		// or by name
		$roleAdmin->assignPermission('productos');

		return "<p>Permisos de 'productos' asignados a rol 'admin'</p>";

	});*/

	/*Route::get('add_perm_admin/{seccion}/{user_id}', function($seccion, $user_id){
		$msg = '';

		//Crear permiso para administración de productos
		$permission = new Kodeine\Acl\Models\Eloquent\Permission();
		$perm = $permission->create([
			'name'        => $seccion,
			'slug'        => [          // pass an array of permissions.
				'create'     => true,
				'view'       => true,
				'update'     => true,
				'delete'     => true,
				//'view.phone' => true
			],
			'description' => 'Gestiona los permisos de sección de '.ucfirst($seccion)
		]);

		$msg.="<p>Permiso para ".$seccion." Creado</p>";

		//Crear Asigna permisos a un rol
		$roleAdmin = Kodeine\Acl\Models\Eloquent\Role::find($user_id); // Role para admin
		// or by name
		$roleAdmin->assignPermission($seccion);

		$msg.="<p>Permisos de '".$seccion."' asignados a rol 'admin'</p>";

		return $msg;

	});*/

	/*Route::get('add_perm_user_admin', function(){
		$user = \App\User::find(1);//Usuario Administrador

		// crear permisos CRUD
		// create.productos, view.productos, update.productos, delete.productos
		// returns false si el alias existe.
		if( $user->addPermission('productos') ){
			return "<p>Sel el agregaron permisos de 'productos' al usuario Administrador</p>";
		}
		else{
			return "<p>El Alias de productos ya existe</p>";
		}
	});*/

	/*Route::get('permisos_user_admin', function(){
		$user = \App\User::find(1);
		return $user->getPermissions();

	});*/

	//Indica si el usuario administrador tiene el rol especificado
	/*Route::get('user_admin_es_rol/{rol}', function($rol){
		$user = \App\User::find(1); //Usuario Administrador
		if( $user->is($rol) ){
			return "<p>El usuario Administrador tiene rol: <span style='color:green'>".$rol.'</span><p>';
		}
		else{
			return "<p>El usuario Administrador NO TIENE el rol: <span style='color:red;'>".$rol.'</span><p>';
		}

	});*/

	//Validar permisos
	/*Route::get('valida_user_admin/{tipo}', function($tipo){
		$user = \App\User::find(1); //Usuario Administrador
		//return $user->can('delete.productos');
		if( $user->can($tipo) ){
			return "El usuario puede <span style='color:green'>".$tipo."</span>";
		}
		return "El usuario NO PUEDE <span style='color:red'>".$tipo."</span>";
	});*/
});
