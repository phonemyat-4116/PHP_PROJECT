<?php
    require_once "../helper/database.php";

    class ProductController extends DB{
        // store 
        public function store($request){
            try{
                $statement = $this->pdo->prepare(
                    "
                    INSERT INTO products 
                        (name, price, stock, description, category_id, created_at, updated_at)
                    VALUES 
                        (:name, :price, :stock, :description, :category_id, now(), now());
                    "
                );
            
                $statement->bindParam(":name", $request["name"]);
                $statement->bindParam(":price", $request["price"]);
                $statement->bindParam(":stock", $request["stock"]);
                $statement->bindParam(":description", $request["description"]);
                $statement->bindParam(":category_id", $request["category_id"]);
                if($statement->execute()){
                    header("Location: http://localhost:8080/products/index.php");
                }else{
                    throw new Exception("Error while creating a new product!");
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        // index 
        public function index(){
            try{
                $statement = $this->pdo->query(
                    'SELECT * FROM products
                    WHERE deleted_at IS NULL;'
                );
                $products = $statement->fetchAll(PDO::FETCH_OBJ);
                return $products;
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        // update 
        public function update($request, $id){
            try{
                $statement = $this->pdo->prepare(
                    '
                    UPDATE products
                    SET name = :name, 
                        price = :price, 
                        stock = :stock, 
                        description = :description,
                        category_id = :category_id,
                        created_at = :created_at,
                        updated_at = NOW()
                    WHERE id = :id;
                    '
                );
                $statement->bindParam(":name",$request["name"]);
                $statement->bindParam(":price",$request["price"]);
                $statement->bindParam(":stock",$request["stock"]);
                $statement->bindParam(":description",$request["description"]);
                $statement->bindParam(":category_id",$request["category_id"]);
                $statement->bindParam(":created_at",$request["created_at"]);
                $statement->bindParam(":id", $id);
                
                if($statement->execute()){
                    header("Location: http://localhost:8080/products/index.php");
                }else{
                    throw new Exception("Error occurs during updating data");
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        // edit 
        public function edit($id){
            try{
                $statement = $this->pdo->prepare(
                    'SELECT * FROM products
                    WHERE id = :id;'
                );
                $statement->bindParam(":id", $id);
                $statement->execute();
                $product = $statement->fetch(PDO::FETCH_OBJ);
                $categories = $this->pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_OBJ);
                
                $result = ["product"=>$product, "categories"=>$categories];
                return $result;
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function destroy($id){
            try{
                $statement = $this->pdo->prepare(
                    '
                    UPDATE products 
                        SET deleted_at = NOW()
                    WHERE id = :id;
                    '
                );
                $statement->bindParam(':id', $id);
                if($statement->execute()){
                    header("Location: http://localhost:8080/products/index.php");
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }