<?php
$openingTimes = [
  'Tous les jours du lundi au vendredi : de 10h à 18h',
  'Le weekend, les vacances et les jours fériés : de 9h à 20h',
];

// $mainMenu2 = [
//   '/' => 'Accueil', 
//   '/habitats' => 'Habitats & Animaux',
//   '/services' => 'Services',
//   '/contact' => 'Contact',
// ];

$error = [
  'champs' => 'Vous devez remplir tous les champs pour vous connecter.',
  'login-error' => 'Votre mot de passe ou votre email est incorrect.'
];

$sucess = [
  'userAdded' => 'Le nouvel utilisateur a été ajouté avec succès.',
  'userEdited' => 'Le compte a été édité avec succès.',
  'timeupdated' => 'Les horaires ont été modifiés avec succès.',
];

$mainMenu = [
  "visiteur" => [
      '/' => 'Accueil', 
      '/habitats' => 'Habitats & Animaux',
      '/services' => 'Services',
      '/contact' => 'Contact',
  ],
  "employé" => [
      "Vue visiteur" => [
          '/' => 'Accueil', 
          '/habitats' => 'Habitats',
          '/services' => 'Services',
          '/contact' => 'Contact',
      ],
      '/feeding' => 'Nourrir un animal',
      '/services' => 'Gérer les services',
      '/seereviews' => 'Avis des visiteurs',
  ],
  "vétérinaire" => [
      "Vue visiteur" => [
          '/' => 'Accueil', 
          '/habitats' => 'Habitats',
          '/services' => 'Services',
          '/contact' => 'Contact',
      ],
      '/addreport' => 'Comptes rendus animaux',
      '/habitat' => 'Habitats',
      '/seefeeding' => 'Alimentation',
  ],
  "admin" => [
      '/dashboard' => 'Dashboard',
      // "Vue visiteur" => [
      //     '/' => 'Accueil', 
      //     '/habitats' => 'Habitats',
      //     '/services' => 'Services',
      //     '/contact' => 'Contact',
      // ],
      "Comptes" => [
          '/seeusers' => 'Voir les utilisateurs',
          '/signup' => 'Ajouter un compte',
          '/editaccount' => 'Editer un compte'
      ],
      "Services et Horaires" => [
          '/time' => 'Modifier les horaires',
          '/services' => 'Modifier un service',
          '/addservices' => 'Ajouter un service',
      ],
      "Habitats" => [
          '/edithabitat' => 'Modifier un habitat',
          '/addhabitat' => 'Ajouter un habitat',
      ],
      "Animaux" => [
          '/seeanimals' => 'Voir les animaux',
          '/insertanimal' => 'Créer un animal',
          '/editanimal' => 'Modifier un animal',
          '/seefeeding' => 'Historique d\'alimentation',
          '/seereports' => 'Comptes rendus vétérinaire',
      ],
      '/seereviews' => 'Avis visiteurs',
  ],
];
  function checkRole($role) {
    if(!isset($_SESSION["userEmail"]) || !isset($_SESSION["userRole"])) {
      return $role = "visiteur";
    } else {
      return $role = $_SESSION["userRole"];
    }
  }

