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

      public function display_confirm($table_name)  
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

