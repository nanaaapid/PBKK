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
                'nama' => 'Administrator SIAKAD',
                'role' => 'admin'
            ],
            [
                'username' => 'mahasiswa',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'nama' => 'Mahasiswa',
                'role' => 'user'
            ]
        ];

        foreach ($users as $user) {
            $exists = $this->db->table('users')
                ->where('username', $user['username'])
                ->countAllResults();

            if (!$exists) {
                $this->db->table('users')->insert($user);
            }
        }
    }
}