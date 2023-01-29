<?php

include('common.class.php');

class Catagory extends Common
{
    public $id, $name, $rank, $status, $created_by, $created_date, $modified_by, $modified_date;

    public function save(){
        $con=mysqli_connect('localhost','root','','news_magazine');
        $sql="Insert into catagory(name,rank,status,created_by,created_date) values( '$this->name' ,'$this->rank' ,'$this->status' ,'$this->created_by' ,'$this->created_date')";
        $con->query($sql);
        if($con->affected_rows == 1 && $con->insert_id>0)
        {
            return $con->insert_id;
        }else{
            return false;
        }
    }
    public function retrieve(){

    }
    public function edit(){

    }
    public function delete(){

    }
}

?>