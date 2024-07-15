<?php

$error = [
  'champs' => 'Vous devez remplir tous les champs pour vous connecter.',
  'login-error' => 'Votre mot de passe ou votre email est incorrect.',
  'accountdeleted' => 'Une erreur s\'est produite. Veuillez réessayer.',
  'accountnotedited' => 'Une erreur s\'est produite. Veuillez réessayer.',
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
  'commentnotadded' => 'Le commentaire n\'a pas pu être ajouté. Veuillez réessayer.',
  'checkuperror' => 'Une erreur est survenue, veuillez réessayer.',
  'timeerror' => 'Une erreur est survenue, veuillez réessayer.',
];

$sucess = [
  'userAdded' => 'Le nouvel utilisateur a été ajouté avec succès.',
  'userEdited' => 'Le compte a été édité avec succès.',
  'timeupdated' => 'Les horaires ont été modifiés avec succès.',
  'accountdeleted' => 'Le compte a bien été supprimé',
  'accountedited' => 'Le compte a bien été modifié',
  'serviceEdited' => 'Le service a bien été édité',
  'serviceAdded' => 'Le nouveau service a été ajouté avec succès.',
  'servicedeleted' => 'Le service a bien été supprimé.',
  'reviewdeleted' => 'L\'avis a bien été supprimé.',
  'reviewvalidated' =>  'L\'avis a bien été validé.',
  'habitatedited' => 'L\'habitat a bien été modifié.',
  'habitatdeleted' => 'L\'habitat a bien été supprimé.',
  'habitatadded' => 'L\'habitat a bien été ajouté.',
  'animaldeleted' => 'L\'animal a bien été supprimé.',
  'animaledited' => 'L\'animal a bien été modifié.',
  'animaladded' => 'L\'animal a bien été ajouté.',
  'commentsent' => 'Le commentaire a été envoyé avec succès.',
  'checkupadded' => 'Le nouvel avis a bien été ajouté.',
  'foodrecorded' => 'La nourriture a bien été enregistrée.',
  'emailsent' => 'Votre email a bien été envoyé. Nous vous répondrons le plus rapidement possible.',
  'speciesdeleted' => 'L\'espèce a bien été supprimée.',
  'specieedited' => 'L\'espèce a bien été modifiée.',
  'speciesadded' => 'L\'espèce a bien été ajoutée.',
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
      "Animaux & Nourriture" => [
      '/seeanimals' => 'Liste des animaux',
      '/feeding' => 'Nourrir un animal',
      ],
      "Habitats" => [
        '/habitats' => 'Voir les habitats', 
        '/seeHabitatComment' => 'Voir les commentaires',
      ],
      '/services' => 'Gérer les services',
      '/review' => 'Avis des visiteurs',
  ],
  "vétérinaire" => [
      "Vue visiteur" => [
          '/' => 'Accueil', 
          '/habitats' => 'Habitats',
          '/services' => 'Services',
          '/contact' => 'Contact',
      ],
      "Habitats" => [
        '/habitats' => 'Voir les habitats', 
        '/commenthabitat' => 'Commenter un habitat',
        '/seeHabitatComment' => 'Voir les commentaires',
      ],
      "Comptes rendus animaux" => [
        '/checkupanimal' => 'Rédiger un compte rendu',
        '/seecheckup' => 'Consulter l\'historique',
      ],
      "Animaux & Alimentation" => [
        '/seeanimals' => 'Liste des animaux',
        '/seefeeding' => 'Historiques d\'alimentation',
      ],

  ],
  "admin" => [
      '/dashboard' => 'Dashboard',
      "Comptes" => [
          '/showaccounts' => 'Voir ou modifier les utilisateurs',
          '/signup' => 'Ajouter un compte',
      ],
      "Services et Horaires" => [
          '/time' => 'Modifier les horaires',
          '/services' => 'Modifier un service',
          '/addservice' => 'Ajouter un service',
      ],
      "Habitats" => [
          '/habitats' => 'Modifier un habitat',
          '/addhabitat' => 'Ajouter un habitat',
          '/seeHabitatComment' => 'Voir les commentaires',
          '/commenthabitat' => 'Commenter un habitat',

      ],
      "Animaux" => [
          '/seeanimals' => 'Liste des animaux',
          '/addspecies' => 'Ajouter une espèce',
          '/addanimal' => 'Ajouter un animal',
          '/seefeeding' => 'Historique d\'alimentation',
          '/seecheckup' => 'Comptes rendus vétérinaire',
      ],
      '/review' => 'Avis visiteurs',
  ],
];
  function checkRole($role) {
    if(!isset($_SESSION["userEmail"]) || !isset($_SESSION["userRole"])) {
      return $role = "visiteur";
    } else {
      return $role = $_SESSION["userRole"];
    }
  }

