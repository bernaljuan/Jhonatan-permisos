<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate tables
        DB::statement("SET foreign_key_checks=0");
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            Permission::truncate();
            Role::truncate();
        DB::statement("SET foreign_key_checks=1");



        //user admin
        $useradmin= User::where('email','admin@admin.com')->first();
        if ($useradmin) {
            $useradmin->delete();
        }
        $useradmin= User::create([
            'name'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('admin')    
        ]);

        //rol admin
        $roladmin=Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator',
            'full-access' => 'yes'
    
        ]);

         //rol Registered User
         $roluser=Role::create([
            'name' => 'Registered User',
            'slug' => 'registereduser',
            'description' => 'Registered User',
            'full-access' => 'no'
    
        ]);
        
        //table role_user
        $useradmin->roles()->sync([ $roladmin->id ]);
      
        
        //permission
        $permission_all = [];

        
        //permission role
        $permission = Permission::create([
            'name' => 'Lista de roles',
            'slug' => 'role.index',
            'description' => 'Listar roles',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Ver rol',
            'slug' => 'role.show',
            'description' => 'Ver roles',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Crear roles',
            'slug' => 'role.create',
            'description' => 'Crear roles',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Editar roles',
            'slug' => 'role.edit',
            'description' => 'Editar roles',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Eliminar rol',
            'slug' => 'role.destroy',
            'description' => 'Usuario puede eliminar rol',
        ]);

        $permission_all[] = $permission->id;
    
        


        //permission user
        $permission = Permission::create([
            'name' => 'Listar usuarios',
            'slug' => 'user.index',
            'description' => 'Listar usuarios',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Mostrar usuario',
            'slug' => 'user.show',
            'description' => 'Mostrar usuario',
        ]);        
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Editar usuario',
            'slug' => 'user.edit',
            'description' => 'Editar usuario',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Eliminar usuario',
            'slug' => 'user.destroy',
            'description' => 'Eliminar usuario',
        ]);
        
        $permission_all[] = $permission->id;


        //new
        $permission = Permission::create([
            'name' => 'Show own user',
            'slug' => 'userown.show',
            'description' => 'A user can see own user',
        ]);        
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Edit own user',
            'slug' => 'userown.edit',
            'description' => 'A user can edit own user',
        ]);

        

        
        
        /*$permission = Permission::create([
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'A user can create user',
        ]);
        
        $permission_all[] = $permission->id;
        */
        
        //table permission_role
        //$roladmin->permissions()->sync( $permission_all);


        $permission = Permission::create([
            'name' => 'Lista de productos',
            'slug' => 'products.index',
            'description' => 'A user can list user',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Crear producto',
            'slug' => 'products.create',
            'description' => 'A user can see user',
        ]);        
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Editar productos',
            'slug' => 'products.edit',
            'description' => 'A user can edit user',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Eliminar productos',
            'slug' => 'products.destroy',
            'description' => 'A user can destroy user',
        ]);
        
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Eliminar productos',
            'slug' => 'products.destroy',
            'description' => 'A user can destroy user',
        ]);
        
        $permission_all[] = $permission->id;


        $permission = Permission::create([
            'name' => 'Lista de ordenes pendientes',
            'slug' => 'admin.order',
            'description' => 'Lista de ordenes pendientes',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Editar estado de orden',
            'slug' => 'admin.order.edit',
            'description' => 'Editar estado de orden',
        ]);




        $permission = Permission::create([
            'name' => 'Lista de publicaciones',
            'slug' => 'posts.index',
            'description' => 'Lista de publicaciones',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Crear publicacion',
            'slug' => 'posts.create',
            'description' => 'Crear publicacion',
        ]);        
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Editar publicaciones',
            'slug' => 'posts.edit',
            'description' => 'Editar publicaciones',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Editar publicaciones',
            'slug' => 'posts.destroy',
            'description' => 'Editar publicaciones',
        ]);
        

        
    }
}
