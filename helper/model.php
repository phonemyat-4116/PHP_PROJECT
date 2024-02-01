<?php
    require_once "database.php";
    class Model
    {
        public $table;
        function __construct()
        {
            // calling static method 
            DB::connect();
        }

        protected function query($sql, $params = [])
        {
            $statement = DB::$pdo->prepare($sql);
            $statement->execute($params);
            return $statement;
        }

        public function all()
        {
            // return DB::$pdo->query("SELECT * FROM {$this->table}")->fetchAll(PDO::FETCH_OBJ);
            $sql = "SELECT * FROM {$this->table}";
            return $this->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }

        public function first($column)
        {
            $sql = "SELECT * FROM {$this->table} WHERE id = ?";
            return $this->query($sql, [$column])->fetch(PDO::FETCH_OBJ);
        }

        public function create($data)
        {
            $column = implode(", ", array_keys($data));
            $params = ":" . implode(", :", array_keys($data));
            $sql = "
                INSERT INTO {$this->table} 
                    ($column, created_at, updated_at) 
                VALUES 
                    ($params, NOW(), NOW())
            ";
            $this->query($sql, $data);
        }

        public function update($data, $column)
        {
            // die(var_dump($data));
            $clause = "";
            foreach($data as $key => $value){
                $clause .= "$key = :$key, ";
            }
            $sql = "
            UPDATE {$this->table}
                SET $clause updated_at = NOW()
            WHERE id = :id
            ";
            $data["id"] = $column;
            return $this->query($sql, $data);
        }

        public function delete($column)
        {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";
            $this->query($sql, [$column]);
        }

        public function softDelete($column)
        {
            $sql = "
                UPDATE {$this->table}
                    SET deleted_at = NOW()
                WHERE id = ?
            ";
            $this->query($sql, [$column]);
        }

        public function recoverDelete($column)
        {
            $sql = "UPDATE {$this->table}
                SET deleted_at = NULL
            WHERE id = ?";
            $this->query($sql, [$column]);
        }

        public function allWithSoftDelete()
        {
            $sql = "SELECT * FROM products WHERE deleted_at IS NOT NULL";
            return $this->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }
    }

    // INSERT INTO products 
    //     (name, price, stock, description, category_id, created_at, updated_at)
    // VALUES 
    //     (:name, :price, :stock, :description, :category_id, now(), now());