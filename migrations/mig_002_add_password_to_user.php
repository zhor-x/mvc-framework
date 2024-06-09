<?php

class  mig_002_add_password_to_user
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
         $db->pdo->exec("ALTER TABLE users ADD column password VARCHAR(255) NOT NULL");
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $db->pdo->exec("ALTER TABLE users DROP column password");

    }
}