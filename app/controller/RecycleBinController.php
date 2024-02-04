<?php
    require_once "../helper/database.php";
    require_once "../model/Product.php";
    require_once "../helper/redirect.php";
    require_once "../helper/storage.php";

    class RecycleBinController extends DB{
        public function product(){
            try{
                $products = new Product();
                return $products->allWithSoftDelete();
            }
            catch(Exception $e) 
            {
                echo $e->getMessage();
            }
        }

        public function destroy($id){
            try{
                $products = new Product();
                $filePath = $products->first($id)->image;
                Storage::deleteImage($filePath);
                $products->delete($id);
                redirect_Recycle('product.php');
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function restore($id) 
        {
            try{
                $products = new Product();
                $products->recoverDelete($id);
                redirect_Recycle('product.php');
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
    }