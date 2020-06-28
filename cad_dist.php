<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO paciente (nome, cpf, fone)
    VALUES (:nome, :cpf, :fone)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':fone', $fone);

    $nome           = $_POST['nome'];
    $cpf           = $_POST['cpf'];
    $fone        = $_POST['fone'];

    $stmt->execute();


    echo "Paciente cadastrado com sucesso!";
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: index_dist.php');
?> 