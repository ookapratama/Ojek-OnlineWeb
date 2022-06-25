<?php
//data database
$servername = "localhost";
$database = "db_ojol";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

function tampil($table)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM $table");
    return $result;
}

function tambah($table, $value)
{
    global $conn;
    $query = "INSERT INTO $table values $value";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($table, $id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM $table WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function update($table, $query)
{
    global $conn;
    $result = mysqli_query($conn, "UPDATE $table SET $query");
    return mysqli_affected_rows($conn);
}