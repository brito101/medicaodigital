<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        DB::table('permissions')->insert([
            /** ACL  1 to 11 */
            [
                'name' => 'Acessar ACL',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Permissões',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Permissões',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Permissões',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Permissões',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Sincronizar Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Atribuir Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],

            /** Users 12 to 17 */
            [
                'name' => 'Acessar Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Usuário',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            // Complexes 18 to 22
            [
                'name' => 'Acessar Condomínios',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Condomínios',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Condomínios',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Condomínios',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Condomínios',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            /** Blocks 23 to 27 */
            [
                'name' => 'Acessar Blocos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Blocos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Blocos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Blocos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Blocos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            /** Apartments 28 to 32 */
            [
                'name' => 'Acessar Apartmantos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Apartmantos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Apartmantos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Apartmantos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Apartmantos',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            /** Meters 33 to 37 */
            [
                'name' => 'Acessar Medidores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Medidores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Medidores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Medidores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Medidores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            /** Residents 38 to 42 */
            [
                'name' => 'Acessar Moradores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Moradores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Moradores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Moradores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Moradores',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            /** Residents 43 to 47 */
            [
                'name' => 'Acessar Contas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Contas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Contas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Contas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Contas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
        ]);
    }
}
