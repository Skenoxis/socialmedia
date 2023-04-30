<?php
    require 'init.php';

    $data = [
        'supprimer_publication' => $_POST['supprimer']
    ];

    $supprimer = $pdo->prepare('DELETE FROM publication WHERE publication_id = :supprimer_publication');
    $supprimer->execute($data);

    header('Location: index.php')
?>