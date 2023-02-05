<?php

include('common.class.php');

class Catagory extends Common
{
    public $id, $name, $rank, $status, $created_by, $created_date, $modified_by, $modified_date;

    public function save()
    {
        $con = mysqli_connect('localhost', 'root', '', 'news_magazine');
        $sql = "Insert into catagory(name,rank,status,created_by,created_date) values( '$this->name' ,'$this->rank' ,'$this->status' ,'$this->created_by' ,'$this->created_date')";
        $con->query($sql);
        if ($con->affected_rows == 1 && $con->insert_id > 0) {
            return $con->insert_id;
        } else {
            return false;
        }
    }
    public function retrieve()
    {
        $con = mysqli_connect('localhost', 'root', '', 'news_magazine');
        $sql = "select * from catagory";
        $var = $con->query($sql);
        if ($var->num_rows > 0) {
            $datalist = $var->fetch_all(MYSQLI_ASSOC);
            return $datalist;
        } else {
            return false;
        }
    }
    public function edit()
    {
        $con = mysqli_connect('localhost', 'root', '', 'news_magazine');
        $sql = "UPDATE `catagory` SET `name`='$this->name',
                                      `rank`='$this->rank',
                                      `status`='$this->status',
                                      `modified_by`='$this->modified_by', 
                                      `modified_date`='$this->modified_date' 
                                       where id ='$this->id' ";
        // UPDATE `users` SET `id`='[value-1]',`name`='[value-2]',`username`='[value-3]',`email`='[value-4]',`password`='[value-5]',`status`='[value-6]',`role`='[value-7]',`last_login`='[value-8]' WHERE 1
        $con->query($sql);
        if ($con->affected_rows == 1 && $con->insert_id > 0) {
            return $con->insert_id;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $con = mysqli_connect('localhost', 'root', '', 'news_magazine');
        $sql = "delete from catagory where id ='$this->id'";
        $var = $con->query($sql);
        if ($var) {
            return "success";
        } else {
            return "failed";
        }
    }

    public function getById()
    {
        $con = mysqli_connect('localhost', 'root', '', 'news_magazine');
        $sql = "select * from catagory where id ='$this->id'";
        $var = $con->query($sql);
        if ($var->num_rows) {
            $data = $var->fetch_object();

            return $data;
        } else {
            return [];
        }
    }
}
