<?php
    require_once "../helper/database.php";
    require_once "../model/Product.php";
    require_once "../model/Category.php";
    require_once "../helper/redirect.php";

    class ProductController extends DB{
        // store 
        public function store($request){
            try{
                $product_Model = new Product();
                $product_Model->create($request);
                redirect_Product("index.php");
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
                $products = new Product();
                echo json_encode($products->all());
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        // update 
        public function update($request, $id){
            try{
                $product_Model = new Product();
                $product_Model->update($request, $id);
                redirect_Product("index.php");
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        // edit 
        public function edit($id){
            try{
                $product_Model = new Product();
                $product = $product_Model->first($id);
                $category_Model = new Category();
                $categories = $category_Model->all();

                return ["product"=>$product, "categories"=>$categories];
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function destroy($id){
            try{
                $product_Model = new Product();
                $product_Model->destroy($id);
                redirect_Product("index.php");
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }