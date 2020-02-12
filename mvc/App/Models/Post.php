<?php

namespace App\Models;
use PDO;

class Post extends \Core\Model {
    public static function getAll() {
        try {
            $db = static::getDb();
            $stmt = $db->query("SELECT id,title,content_text FROM posts");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>