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

    public function insert($orderdate,$status)
    {
        $query = "INSERT INTO orders (orderdate,status) VALUES('$orderdate','$status')";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function update($id,$orderdate,$status)
    {
        $this->connect();
        $query = "UPDATE orders SET orderdate='$orderdate', status='$status' WHERE id=$id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function fetch()
    {
        $query = "SELECT * FROM orders";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function delete($id)
    {
        $query = "DELETE FROM orders WHERE id = $id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

}
