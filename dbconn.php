<?php

class Databases{
    public $con;
    public $error;  
    
    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "webtwo");
    
        if (!$this->con){
            echo 'Database Connection Error ' . mysqli_connect_error($this->con);
        }
    } 
    
    public function insert($table_name, $data)  
    {  
           $string = "INSERT INTO ".$table_name." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')";  
           if(mysqli_query($this->con, $string))  
           {  
                return true;  
           }  
           else  
           {  
                echo mysqli_error($this->con);  
           }  
    }
    
    public function display($table_name)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }  






     }
     class Sold{
          public $db;



          public function __construct(){
               $this->db =new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
               if(mysqli_connect_errno()){
                   echo "Error: could not connect the database";
                   exit;
               }
               else{
                   //echo "database connect succesfully";
               }
   
           }

//---------------------*** data insertion close******----------------------------------------

//---------------------***function to calculate remaining plactic amount***--------------------

   public function calPlastic(){

       $soldPlastic = mysqli_query($this->db,'SELECT sum(plasticQty) FROM solditems');
       if (FALSE === $soldPlastic) die("Select sum failed: ".mysqli_error);
       $row = mysqli_fetch_row($soldPlastic);
       $sumOfSoldPlastic = $row[0];

      // echo "Sold plastic Quentity :           ". $sumOfSoldPlastic ."<br>";


       $insertPlastic = mysqli_query($this->db,'SELECT sum(plasticQty) FROM confirmeditems');
       if (FALSE === $insertPlastic) die("Select sum failed: ".mysqli_error);
       $row = mysqli_fetch_row($insertPlastic);
       $sumOfInsertPlastic = $row[0];

      // echo "Insert plastic Quentity : ". $sumOfInsertPlastic . "<br>";

       $remainPlasticQty = $sumOfInsertPlastic - $sumOfSoldPlastic;

       echo $remainPlasticQty;


      


   }

//---------------------***close function calculate plastic amount****---------------------------


//---------------------***function to calculate remaining Metal amount***--------------------

public function calcMetal(){

$soldMetal = mysqli_query($this->db,'SELECT sum(metalQty) FROM solditems');
if (FALSE === $soldMetal) die("Select sum failed: ".mysqli_error);
$row = mysqli_fetch_row($soldMetal);
$sumOfSoldMetal = $row[0];

// echo "Sold Metal Quentity : ".  $sumOfSoldMetal ."<br>";


$insertMetal = mysqli_query($this->db,'SELECT sum(metalQty) FROM confirmeditems');
if (FALSE === $insertMetal) die("Select sum failed: ".mysqli_error);
$row = mysqli_fetch_row($insertMetal);
$sumOfInsertMetal = $row[0];

// echo "Insert Metal Quentity : ". $sumOfInsertMetal . "<br>";

$remainMetalQty = $sumOfInsertMetal - $sumOfSoldMetal;

echo $remainMetalQty;


}

//---------------------***close function calculate Metal amount****---------------------------


//---------------------***function to calculate remaining Metal amount***--------------------

public function calcBuilding(){

$soldBuilding = mysqli_query($this->db,'SELECT sum(buildingQty) FROM solditems');
if (FALSE === $soldBuilding) die("Select sum failed: ".mysqli_error);
$row = mysqli_fetch_row($soldBuilding);
$sumOfSoldBuilding = $row[0];

//echo "Sold Building Waste Quentity : ".  $sumOfSoldBuilding ."<br>";


$insertBuilding = mysqli_query($this->db,'SELECT sum(buildingQty) FROM confirmeditems');
if (FALSE === $insertBuilding) die("Select sum failed: ".mysqli_error);
$row = mysqli_fetch_row($insertBuilding);
$sumOfInsertBuilding = $row[0];

// echo "Insert Building Waste Quentity : ". $sumOfInsertBuilding . "<br>";

$remainBuildingQty = $sumOfInsertBuilding - $sumOfSoldBuilding;

echo $remainBuildingQty;


}
    
     
}

