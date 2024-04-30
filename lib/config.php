<?php
$openingTimes = [
  'Tous les jours du lundi au vendredi : de 10h à 18h',
  'Le weekend, les vacances et les jours fériés : de 9h à 20h',
];

$error = [
  'champs' => 'Vous devez remplir tous les champs pour vous connecter.',
  'login-error' => 'Votre mot de passe ou votre email est incorrect.',
  'accountdeleted' => 'Une erreur s\'est produite. Veuillez réessayer.',
  'addservice' => 'Le service n\'a pas pu être ajouté. Veuillez réessayer.',
  'notimage' => 'Le fichier envoyé doit impérativement être une image.',
  'uploaderror' => 'Une erreur s\'est produite lors de l\'envoi de l\'image.',
  'servicedeleted' => 'Le service n\'a pas pu être supprimé.',
  'reviewdeleted' => 'L\'avis n\'a pas pu être supprimé.',
  'reviewnotvalidated' => 'L\'avis n\'a pas pu être validé.',
  'habitatnotedited' => 'L\'habitat n\'a pas pu être modifié.',
  'habitatnotdeleted' => 'L\'habitat n\'a pas pu être supprimé.',
  'habitatnotadded' => 'L\'habitat n\'a pas pu être ajouté.',
  'animalnotdeleted' => 'L\'animal n\'a pas pu être supprimé.',

];

$sucess = [
  'userAdded' => 'Le nouvel utilisateur a été ajouté avec succès.',
  'userEdited' => 'Le compte a été édité avec succès.',
  'timeupdated' => 'Les horaires ont été modifiés avec succès.',
  'accountdeleted' => 'Le compte a bien été supprimé',
  'serviceEdited' => 'Le service a bien été édité',
  'serviceAdded' => 'Le nouveau service a été ajouté avec succès.',
  'servicedeleted' => 'Le service a bien été supprimé.',
  'reviewdeleted' => 'L\'avis a bien été supprimé.',
  'reviewvalidated' =>  'L\'avis a bien été validé.',
  'habitatedited' => 'L\'habitat a bien été modifié.',
  'habitatdeleted' => 'L\'habitat a bien été supprimé.',
  'habitatadded' => 'L\'habitat a bien été ajouté.', 
  'animaldeleted' => 'L\'animal a bien été supprimé.',

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
          '/showaccounts' => 'Voir les utilisateurs',
          '/signup' => 'Ajouter un compte',
          '/editaccount' => 'Editer un compte'
      ],
      "Services et Horaires" => [
          '/time' => 'Modifier les horaires',
          '/services' => 'Modifier un service',
          '/addservice' => 'Ajouter un service',
      ],
      "Habitats" => [
          '/habitats' => 'Modifier un habitat',
          '/addhabitat' => 'Ajouter un habitat',
      ],
      "Animaux" => [
          '/seeanimals' => 'Liste des animaux',
          '/addspecies' => 'Ajouter une espèce',
          '/addanimal' => 'Ajouter un animal',
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

