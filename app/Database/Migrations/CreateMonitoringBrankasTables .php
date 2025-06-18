<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMonitoringBrankasTables extends Migration
{
    public function up()
    {
        // Table: admin
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'email'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admin');

        // Table: anggota
        $this->forge->addField([
            'id_anggota'   => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'tag'          => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id_anggota', true);
        $this->forge->addUniqueKey('tag');
        $this->forge->createTable('anggota');

        // Table: riwayat_berhasil
        $this->forge->addField([
            'id_riwayat_berhasil' => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'id_anggota'          => ['type' => 'INT', 'null' => true, 'unsigned' => true],
            'tanggal_akses'       => ['type' => 'DATE', 'null' => true],
            'waktu_akses'         => ['type' => 'TIME', 'null' => true],
            'foto'                => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id_riwayat_berhasil', true);
        $this->forge->addKey('id_anggota');
        $this->forge->createTable('riwayat_berhasil');

        // Table: riwayat_gagal
        $this->forge->addField([
            'id_riwayat_gagal'   => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'tanggal_percobaan'  => ['type' => 'DATE', 'null' => true],
            'waktu_akses'        => ['type' => 'TIME', 'null' => true],
            'tag_tidak_dikenal'  => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'foto'               => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id_riwayat_gagal', true);
        $this->forge->createTable('riwayat_gagal');

        // Foreign Key
        $this->db->query('ALTER TABLE riwayat_berhasil ADD CONSTRAINT riwayat_berhasil_ibfk_1 FOREIGN KEY (id_anggota) REFERENCES anggota(id_anggota)');
    }

    public function down()
    {
        $this->forge->dropTable('riwayat_gagal', true);
        $this->forge->dropTable('riwayat_berhasil', true);
        $this->forge->dropTable('anggota', true);
        $this->forge->dropTable('admin', true);
    }
}
