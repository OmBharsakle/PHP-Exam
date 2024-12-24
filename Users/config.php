<?php

class Config
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $datatype = "exam";
    private $connection;

    public function connect()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->datatype);
    }

    public function __construct()
    {
        $this->connect();
    }

    public function insert($name,$email,$phone)
    {
        $query = "INSERT INTO users (name,email,phone) VALUES('$name','$email','$phone')";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function update($id, $name, $email,$phone)
    {
        $this->connect();
        $query = "UPDATE users SET name='$name', email='$email', phone=$phone WHERE id=$id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function fetch()
    {
        $query = "SELECT * FROM users";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = $id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    

}
