<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = [
            'nama' => 'Vaselle Administrator',
            'email' => 'admin@vaselle.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'admin'
        ];

        $exists = $this->db->table('users')
            ->where('email', $admin['email'])
            ->countAllResults();

        if (!$exists) {
            $this->db->table('users')->insert($admin);
        }
    }
}