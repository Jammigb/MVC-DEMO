  <?php

    class Dbh {

      private static $instance = null;

      private function __construcrt() {}

      public static function getInstance() {

        if(!self::$instance) {
          include '../config/config.php';
          self::$instance = new PDO("pgsql:dbname=$dbname;host=$host", $username, $password, array(
          PDO::ATTR_PERSISTENT => true
         ));
        }
        return self::$instance;
      }
    }

   ?>
