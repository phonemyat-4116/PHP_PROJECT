<?php
    require_once "../helper/database.php";

    class RecycleBinController extends DB{
        public function product(){
            $statement = $this->pdo->query(
                '
                SELECT * FROM products
                WHERE deleted_at IS NOT NULL;
                '
            );
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }

        public function destroy($id){
            try{
                $statement = $this->pdo->prepare("
                DELETE FROM products
                WHERE id = :id;
                ");
                $statement->bindParam(":id",$id);
                if($statement->execute()){
                    header("Location: http://localhost:8080/recycle_bin/product.php");
                }else{
                    throw new Exception("Error while deleting");
                }
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }