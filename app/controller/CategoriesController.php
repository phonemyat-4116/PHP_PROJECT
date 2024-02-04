<?php
    // require_once "../helper/database.php";
    // require_once "../model/Category.php";
    // require_once "../helper/redirect.php";
    require_once __DIR__ . "/../../vendor/autoload.php";

    class CategoriesController extends DB
    {
        function index(){
            try{
                $category = new Category();
                View::renderView('index', $category->all());
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        function store($request){
            try{
                $category = new Category();
                $category->create($request);
                redirect_Category('index.php');
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        function edit($id)
        {
            try {
                $category = new Category();
                return $category->first($id);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function update($request, $id)
        {
            try {
                $category = new Category();
                $category->update($request, $id);
                redirect_Category('index.php');
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
