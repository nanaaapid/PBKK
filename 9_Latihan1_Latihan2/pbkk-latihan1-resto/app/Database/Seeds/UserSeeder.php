<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'nama' => 'Administrator',
                'role' => 'admin',
            ],
            [
                'username' => 'kasir',
                'password' => password_hash('kasir123', PASSWORD_DEFAULT),
                'nama' => 'Kasir Restoran',
                'role' => 'user',
            ]
        ];

        foreach ($users as $user) {
            $existing = $this->db->table('users')
                ->where('username', $user['username'])
                ->get()
                ->getRowArray();

            if (!$existing) {
                $this->db->table('users')->insert($user);
            }
        }
    }
}