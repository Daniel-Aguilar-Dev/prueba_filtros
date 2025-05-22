<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Sistema\General\Modulo;
use App\Models\Sistema\General\Submodulo;
use App\Models\Sistema\General\RoleSubmodulo;
use App\Models\Sistema\General\UserRoleSubmodulo;
use App\Models\Sistema\General\RoleSubmoduloPermission;

class DataGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulo1 = Modulo::create(['id' => 11, 'nombre' => 'Sistema']);
        $modulo2 = Modulo::create(['id' => 12, 'nombre' => 'Indicadores']);
        $modulo3 = Modulo::create(['id' => 13, 'nombre' => 'Evaluación']);
        $modulo4 = Modulo::create(['id' => 14, 'nombre' => 'Planeación']);

        // Sistema
        $modulo1->submodulos()->create(['id' => 101, 'nombre' => 'General']);

        // Indicadores
        $modulo2->submodulos()->create(['id' => 102, 'nombre' => 'General']);
        $modulo2->submodulos()->create(['id' => 103, 'nombre' => 'Acuerdos del consejo universitario']);
        $modulo2->submodulos()->create(['id' => 104, 'nombre' => 'Programas Educativos']);
        $modulo2->submodulos()->create(['id' => 105, 'nombre' => 'Docentes']);
        $modulo2->submodulos()->create(['id' => 106, 'nombre' => 'Investigación']);
        $modulo2->submodulos()->create(['id' => 107, 'nombre' => 'Matrícula']);
        $modulo2->submodulos()->create(['id' => 108, 'nombre' => 'Cooperación']);
        $modulo2->submodulos()->create(['id' => 109, 'nombre' => 'Extensión']);
        $modulo2->submodulos()->create(['id' => 110, 'nombre' => 'Infraestructura']);
        $modulo2->submodulos()->create(['id' => 111, 'nombre' => 'Personal']);

        // Evaluación
        $modulo3->submodulos()->create(['id' => 112, 'nombre' => 'General']);
        $modulo3->submodulos()->create(['id' => 113, 'nombre' => 'Valuación de metas PIDE']);
        $modulo3->submodulos()->create(['id' => 114, 'nombre' => 'Matriz Indicadores']);

        // Planeación
        $modulo4->submodulos()->create(['id' => 115, 'nombre' => 'General']);
        $modulo4->submodulos()->create(['id' => 116, 'nombre' => 'Informes rectoría']);
        $modulo4->submodulos()->create(['id' => 117, 'nombre' => 'Informes UA']);

        //ROLES
        $rol1 = \Spatie\Permission\Models\Role::create(['name' => 'Super-usuario']);
        $rol2 = \Spatie\Permission\Models\Role::create(['name' => 'Admin']);
        $rol3 = \Spatie\Permission\Models\Role::create(['name' => 'Revisor']);
        $rol4 = \Spatie\Permission\Models\Role::create(['name' => 'Editor']);
        $rol5 = \Spatie\Permission\Models\Role::create(['name' => 'Consultor']);

        //PERMISOS
        $permiso1 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.usuarios.index', 'description' => 'Ver usuarios', 'guard_name' => 'web']);
        $permiso2 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.usuarios.create', 'description' => 'Crear usuarios', 'guard_name' => 'web']);
        $permiso3 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.usuarios.edit', 'description' => 'Editar usuarios', 'guard_name' => 'web']);
        $permiso4 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.usuarios.destroy', 'description' => 'Eliminar usuarios', 'guard_name' => 'web']);

        $permiso5 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.secciones.index', 'description' => 'Ver secciones', 'guard_name' => 'web']);
        $permiso6 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.secciones.create', 'description' => 'Crear secciones', 'guard_name' => 'web']);
        $permiso7 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.secciones.edit', 'description' => 'Editar secciones', 'guard_name' => 'web']);
        $permiso8 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.secciones.destroy', 'description' => 'Eliminar secciones', 'guard_name' => 'web']);

        $permiso9 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.permisos.index', 'description' => 'Ver permisos', 'guard_name' => 'web']);
        $permiso10 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.permisos.create', 'description' => 'Crear permisos', 'guard_name' => 'web']);
        $permiso11 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.permisos.edit', 'description' => 'Editar permisos', 'guard_name' => 'web']);
        $permiso12 = \Spatie\Permission\Models\Permission::create(['name' => 'sistema.general.permisos.destroy', 'description' => 'Eliminar permisos', 'guard_name' => 'web']);


        // Después de crear los submódulos y los roles
        $roles = Role::all(); // Obtener todos los roles

        // Obtener todos los submódulos creados
        $submodulos = Submodulo::all();

        // Asignar los 5 roles a cada submódulo
        foreach ($submodulos as $submodulo) {
            foreach ($roles as $role) {
                RoleSubmodulo::create([
                    'role_id' => $role->id,
                    'submodulo_id' => $submodulo->id,
                ]);
            }
        }


        // Crear usuarios
        $usuario1 = User::create([
            'name' => 'Daniel Aguilar',
            'email' => 'example@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $usuario2 = User::create([
            'name' => 'Consultor Docentes',
            'email' => 'example2@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $usuario3 = User::create([
            'name' => 'Revisor Indicadores',
            'email' => 'example3@example.com',
            'password' => bcrypt('12345678'),
        ]);

        // Obtener submódulos
        $subGeneralSistema = Submodulo::where('nombre', 'General')
            ->whereHas('modulo', fn($q) => $q->where('nombre', 'Sistema'))->first();

        $subDocentesIndicadores = Submodulo::where('nombre', 'Docentes')
            ->whereHas('modulo', fn($q) => $q->where('nombre', 'Indicadores'))->first();

        $subGeneralIndicadores = Submodulo::where('nombre', 'General')
            ->whereHas('modulo', fn($q) => $q->where('nombre', 'Indicadores'))->first();

        // Obtener roles
        $rolSuper = Role::where('name', 'Super-usuario')->first();
        $rolConsultor = Role::where('name', 'Consultor')->first();
        $rolRevisor = Role::where('name', 'Revisor')->first();

        // Obtener role_submodulo
        $roleSubGeneralSistema = RoleSubmodulo::where('role_id', $rolSuper->id)
            ->where('submodulo_id', $subGeneralSistema->id)->first();

        $roleSubDocentesIndicadores = RoleSubmodulo::where('role_id', $rolConsultor->id)
            ->where('submodulo_id', $subDocentesIndicadores->id)->first();

        $roleSubGeneralIndicadores = RoleSubmodulo::where('role_id', $rolRevisor->id)
            ->where('submodulo_id', $subGeneralIndicadores->id)->first();

        // Insertar en user_role_submodulo
        UserRoleSubmodulo::create([
            'user_id' => $usuario1->id,
            'role_submodulo_id' => $roleSubGeneralSistema->id,
        ]);

        UserRoleSubmodulo::create([
            'user_id' => $usuario2->id,
            'role_submodulo_id' => $roleSubDocentesIndicadores->id,
        ]);

        UserRoleSubmodulo::create([
            'user_id' => $usuario3->id,
            'role_submodulo_id' => $roleSubGeneralIndicadores->id,
        ]);
    }
}
