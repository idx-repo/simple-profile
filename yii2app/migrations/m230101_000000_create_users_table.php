<?php

use yii\db\Migration;

/**
 * Class m230101_000000_create_users_table
 * Migration untuk tabel pengguna (users) dan seed data akun bawaan.
 */
class m230101_000000_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull()->unique(),
            'password_hash' => $this->string(255)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(100)->null(),
            'email' => $this->string(100)->null()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $now = time();

        // Seed data: Akun 'admin' (password: admin) dan 'demo' (password: demo)
        $this->insert('{{%users}}', [
            'id' => 1,
            'username' => 'admin',
            'password_hash' => '$2y$10$XMm4v0hSNsFMfzmrjbguL.pyyYuaY4wfGoPbBGhKx4xcqdq5VgiUW',
            'auth_key' => 'fU9xM82yZ_N5K0a9G1r3mB4qW6eT7yUi',
            'access_token' => 'token-admin-1234567890',
            'email' => 'admin@example.com',
            'status' => 10,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $this->insert('{{%users}}', [
            'id' => 2,
            'username' => 'demo',
            'password_hash' => '$2y$10$G8VZJJAq.1pwJekufKnjK.99OtZyMihtvO5LuZt5Sy..pgxR76rVu',
            'auth_key' => 'eA4mP91xR_T7L2b8V0k5nC3vY8wE2xOp',
            'access_token' => 'token-demo-1234567890',
            'email' => 'demo@example.com',
            'status' => 10,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
