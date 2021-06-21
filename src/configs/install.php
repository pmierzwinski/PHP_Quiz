<?php
try {
    $filePath = __DIR__ ."/../configs/configs.txt";
    try{
        $file = @fopen($filePath, "r");
    }catch (Exception $e){
        echo($e);
        die();
    }
    if(!$file){
        echo("Brak pliku configs w ".$filePath);
        die();
    }
    $fileSize = filesize($filePath);
    $fileText = fread($file, $fileSize);
    fclose($file);

    $data = json_decode($fileText,true);
    if(empty($data["host"])){$host = "";}
    else{$host = $data["host"];}
    if(empty($data["user"])){$user = "";}
    else{$user = $data["user"];}
    if(empty($data["pass"])){$pass = "";}
    else{$pass = $data["pass"];}
    if(empty($data["dbName"])){$dbName = "";}
    else{$dbName = $data["dbName"];}
    if(empty($data["adminPass"])){$adminPass = "";}
    else{$adminPass = $data["adminPass"];}

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC);

    $sql = "
CREATE TABLE answers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
answer TEXT,
question INT(6),
correct INT(6)
);
CREATE TABLE questions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
question TEXT
);
CREATE TABLE results (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user TEXT,
result TEXT
);
CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
login TEXT,
password TEXT
);
INSERT INTO users (login, password) VALUES ('admin', '".$adminPass."')
";

    $conn->query($sql);
    echo "Instalacja ukonczona pomyslnie!";
}
catch(PDOException $e) {
    die($e->getMessage());
}