<?php

require_once 'controllers/BlogController.php';

// Dans votre fichier principal (index.php ou autre)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['blogId'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];

    $blogController = new BlogController();
    $result = $blogController->updateBlog($id, $titre, $description, $genre);

    // Gérer la réponse, par exemple en affichant un message de succès ou d'erreur
    if ($result['success']) {
        echo "Blog mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du blog: " . $result['message'];
    }
}