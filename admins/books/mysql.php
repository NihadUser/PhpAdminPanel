<?php
    function sqlConnection (){
        try{
        return new PDO("mysql:host=localhost;dbname=book_task","root","");
        }catch(PDOException $send){
            exit("error".$send->getMessage());
        }
        
    }
?>