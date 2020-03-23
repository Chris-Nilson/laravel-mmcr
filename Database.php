<?php
    namespace App;
    require_once("config.php");
    

    interface Database {
        public function query($query);
    }

    class MySQLDatabase implements Database {
        private static $cursor = null;
        public function __construct() {
            if(self::$cursor == null):
                self::$cursor = new \mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
                if(self::$cursor->connect_errno):
                    exit(json_encode(
                        [
                            "success" => false,
                            "error" => self::$cursor->connect_error]
                        )
                    );
                else:
                    return self::$cursor;
                endif;
            else:
                return self::$cursor;
            endif;
        }

        public function query($query) {
            $result = self::$cursor->query($query);
            $data = array();
            $data["query"] = $query;
            if(self::$cursor->error):
                $data["success"] = false;
                $data["errno"] = self::$cursor->errno;
                $data["error"] = self::$cursor->error;
                die(json_encode($data));
            else:
                $data["success"] = true;
                $data["error"] = self::$cursor->error;
                $data["affected_rows"] = self::$cursor->affected_rows;
                $data["field_count"] = self::$cursor->field_count;
                $data["insert_id"] = self::$cursor->insert_id;

                
                if(!self::$cursor->insert_id):
                    $data["data"] = array();
                    while($row = $result->fetch_assoc()) {
                        if(self::$cursor->field_count == 1):
                            $key = array_keys($row)[0];
                            array_push($data["data"], $row[$key] );
                        else:
                            array_push($data["data"], $row);
                        endif;
                    }
                endif;
                return $data;
            endif;
        }
    }

    function db_query(Database $cursor, $query) {
        $res = $cursor->query($query);
        
        return $res;
    }
?>