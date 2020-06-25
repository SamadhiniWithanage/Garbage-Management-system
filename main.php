<?php 

include "db_config.php";


    class User{

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


        //--------------------*****registration start****-----------------------------

        public function reg_user($fname,$lname,$email,$nic,$password,$address,$phoneno,$usertype){
        

            $passwordEn =md5($password);
            
            $sql="SELECT * FROM users WHERE email='$email' OR nic ='$nic'";


            //checking email is available in the database

            $check =$this->db->query($sql);
            $count_row =$check->num_rows;

            //if email is not in the database insert the record

            if($count_row == 0){

                $sqlIn="INSERT INTO users SET fName='$fname', lName='$lname', email='$email', nic='$nic', password='$passwordEn', address='$address', phoneNo='$phoneno', userType='$usertype'";

                $result =mysqli_query($this->db,$sqlIn) or die(mysqli_connect_errno()."DATA CANNOT INSERTED");
                return $result;

            }

            else{
                return false;
            }

        }



        //---------------------------------**** registration closed*******--------------------------


        


        //----------------------------*****Login process is statted*****----------------------------

        public function login($email, $password){
            $passwordEn =md5($password);

            $sql2="SELECT userId, userType from users WHERE email='$email' and  password='$passwordEn'";

            //checking email address is availabale in the table

            $result = mysqli_query($this->db,$sql2);
            $user_data = mysqli_fetch_array($result);
            $count_row =$result->num_rows;


            if($count_row == 1 && $user_data['userType']=="Buyer"){
                header("location:BuyersHome.php");
                
                //login using sessions
                $_SESSION['login'] =true;
                $_SESSION['userId']=$user_data['userId'];
                
                return true;
                
              
            }

            else if($count_row == 1 && $user_data['userType']=="Saller"){
                header("location:sellerHome.php");
                
                //login using sessions
                $_SESSION['login'] =true;
                $_SESSION['userId']=$user_data['userId'];
                
                return true;
                
            }

            else{
                
                echo 'Wrong user name or password';
                return false;
                

              
            }
        }

        //------------------****login process closed*****-------------------------------------



        



        

        //----------------------------*****Admin Login process is statted*****----------------------------

        public function Adminlogin($email, $password){
            $passwordEn =md5($password);

            $sql2="SELECT adminId from admint WHERE emailadmin='$email' and  passwordadmin ='$passwordEn'";

            //checking email address is availabale in the table

            $result = mysqli_query($this->db,$sql2);
            $user_data = mysqli_fetch_array($result);
            $count_row =$result->num_rows;


            if($count_row == 1){
                //login using sessions
                $_SESSION['login'] =true;
                $_SESSION['adminId']=$user_data['adminId'];
                return true;
            }

            else{
                return false;
            }
        }

        //------------------****Admin login process closed*****-------------------------------------



        //----------------------***showing the fullname***---------------------------------
        public function get_firstname($userid){
            $sql3="SELECT fName from users WHERE userId=$userid";
            $result =mysqli_query($this->db,$sql3);
            $user_data =mysqli_fetch_array($result);
            echo $user_data['fName'];
        } 

        //------------------------closed---------------------------------------------


        //----------------------***showing the email of admin***---------------------------------
        public function get_email($adminid){
            $sql3="SELECT emailadmin from admint WHERE adminId=$adminid";
            $result =mysqli_query($this->db,$sql3);
            $user_data =mysqli_fetch_array($result);
            echo $user_data['emailadmin'];
        } 

        //------------------------closed---------------------------------------------

        //------------------***** starting the sessions*****-----------------------------
        public function get_session(){
            return $_SESSION['login'];
        }

        public function user_logout(){
            $_SESSION['login'] =FALSE;
            session_destroy();
        }






        //------------------------****password conformation check start *******-----------------------------------

        public function verifyHash($password, $cpassword) {
            if (password_verify($password, $cpassword)) {
                echo "paswords matching";
            } else {
                echo "passwords doesnot matching re enter the passwords";
            }
        }


        //---------------------------------****** password conformation check close *******--------------------------



    }

?>