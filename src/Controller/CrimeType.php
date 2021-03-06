<?php
namespace App\Controller;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
class CrimeType extends DB
{
    public $id = "";
    public $crimeType = "";




    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data=Array()){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('crime_type',$data)){
            $this->crimeType=$data['crime_type'];
        }



        return $this;

    }

    public function store(){
        $query="INSERT INTO `criminaldb`.`crimetable` (`crime_type`) VALUES ( '{$this->crimeType}');";

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Successfully Saved
</div>");
            Utility::redirect('crime.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            Utility::redirect('crime.php');

        }
    }
    public function index(){
        $_allCrime= array();
        $query="SELECT * FROM `crimetable`";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allCrime[]=$row;
        }
        return $_allCrime;
    }
    public function viewCrime(){

        $query="SELECT * FROM `crimetable` where `crime_id`='".$this->id."'";
        $result= mysqli_query($this->conn,$query);
        if ($result) {
            $row = mysqli_fetch_object($result);
            return $row;

        }
    }
    public function update()
    {
        $query = "UPDATE `crimetable` SET `crime_type` = '" . $this->crimeType . "' WHERE `crime_id` =" . $this->id;

        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Updated.
</div>");
            Utility::redirect('crimeall.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            Utility::redirect('crimeall.php');
        }
    }
    public function deleteCrimeType(){
        $query="Delete from `criminaldb`.`crimetable` where `crimetable`.`crime_id`='".$this->id."'";

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been deleted successfully.
</div>");
            Utility::redirect('crimeall.php');

        }
        else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been deleted.
</div>");
            Utility::redirect('crimeall.php');

        }
    }

}