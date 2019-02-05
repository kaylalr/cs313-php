<?php

function dbConnect() {
    $dsn = "dbname=d84du8cv721gks host=ec2-107-20-185-27.compute-1.amazonaws.com port=5432 user=tnyaaptynueduy password=5e9346c7d5f83a2c8a964f87f8d3bf16b1e57c0de6de25c422c3f8e9591a091a sslmode=require";
    $connect = new PDO($dsn);
    return $connect;
}


