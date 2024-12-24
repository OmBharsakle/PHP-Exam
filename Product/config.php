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

    public function insert($productname,$price)
    {
        $query = "INSERT INTO products (productname,price) VALUES('$productname','$price')";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }

    public function update($id, $productname, $price)
    {
        $this->connect();
        $query = "UPDATE products SET productname='$productname', price='$price' WHERE id=$id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function fetch()
    {
        $query = "SELECT * FROM products";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function delete($id)
    {
        $query = "DELETE FROM products WHERE id = $id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

}
