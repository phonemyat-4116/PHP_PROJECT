<?php
    require_once "../helper/database.php";
    require_once "../model/Category.php";
    
    class CategoriesController extends DB
    {
        function index(){
            try{
                $category = new Category();
                return $category->all();
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        function store($request){
            try{
                $statement = $this->pdo->prepare('
                    INSERT INTO categories (name, created_at, updated_at)
                    VALUES (:name, NOW(), NOW());
                ');
                $statement->bindParam(':name', $request["name"]);
                if($statement->execute()){
                    header("Location: http://localhost:8080/categories/index.php");
                }else{
                    throw new Exception("Error Occurs creating categories");
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        function edit($id)
        {
            try {
                $statement = $this->pdo->prepare("SELECT * FROM category WHERE id = :id");
                $statement->bindParam(":id", $id);
                if ($statement->execute()) {
                    $category = $statement->fetch(PDO::FETCH_OBJ); 
                    return $category;
                } else {
                    throw new Exception("Error!");
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function update ($request, $id)
        {
            try {
                $statement = $this->pdo->prepare("
                    update category 
                        set 
                            name = :name
                        where id = :id
                "); 
                $statement->bindParam(":id", $id);
                $statement->bindParam(":name", $request["name"]);

                if ($statement->execute())
                {
                    header("Location: http://localhost:8080/category/index.php");
                } else {
                    throw new Exception("Error while updating product!");
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function destroy($id)
        {
            try {
                $statement = $this->pdo->prepare("
                    DELETE FROM category WHERE id = :id
                ");
                $statement->bindParam(":id", $id);
                if ($statement->execute()) {
                    header("Location: http://localhost:8080/category/index.php");
                } else {
                    throw new Exception("Errors");
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>
