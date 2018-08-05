<?php




$i = 0;
// $nouvelId = 0;


// $delet_btn = unset($tab["clé"]); balise name subscribe
// recuperation données
// sauvegarder ligne pour linjecter  dans le php puis ensuite html - creer variabl


function addLine () {

    $titre = $_POST["user_titre"];
    $message = $_POST["user_message"];
    $date = $_POST["user_date"];
    $importance = $_POST["importance"];

    $id_recupered = see_the_last_id_given();

    if ($id_recupered !== null) {
        $id = $id_recupered + 1;
    } else {
        $id = 0;
    }


    $handle = fopen('tache.csv', 'a+');
    fputcsv($handle, array($titre,$message, $date, $importance, $id));
    fclose($handle);

}

function readMyFile () {

  $list = array_map('str_getcsv', file("tache.csv"));
  return $list;

}

function deleteLine ($id_to_delete) {

  $fichierEntier = readMyFile();

  // on ouvre le fichier
  $handle = fopen('tache.csv', 'a+');



  // ! ! ! ! ! ! ! ! !

  // on remet la tête de lecture/écriture du fichier à 0
  fseek($handle, 0);

  // ici on lance la boucle qui va effacer tout le csv () ligne par ligne
  foreach ($fichierEntier as $line) {
    fputcsv($handle, [""]);
  }

  // ! ! ! ! ! ! ! ! !




  // on remet la tête de lecture/écriture du fichier à 0
  fseek($handle, 0);


  //  ! ! ! ! !




  // et ici on (ré)écrit toues les lignes qui doivent rester
  foreach ($fichierEntier as $miniTableau) {

    if ($miniTableau[4] !== $id_to_delete) {
      fputcsv($handle, array($miniTableau[0], $miniTableau[1], $miniTableau[2], $miniTableau[3], $miniTableau[4]));
    }

  }

  // on ferme le fichier
  fclose($handle);

}

function see_the_last_id_given () {

  // ici on rempli $file avec le méga tableau qui contient tout le csv
  $file = readMyFile();

  if ($file == null) return null;

  // ici on chope le dernier mini tableau (la dernier ligne csv)
  $miniTab = $file[count($file) - 1];

  // ici on chope le dernier élément de ce mini tableau
  $lastId = $miniTab[count($miniTab) - 1];


  // les tests pour voir nos valeurs au fur et a mesure de l'écriture du code
  // var_dump($line);
  // echo $lastId;

  return $lastId;
}


if ( isset($_POST["add_btn"])) {

  if ($_POST["add_btn"] == "ajouter" ) {
    addLine();
  }

}

if ( isset($_POST["btn_delete"])) {


  $id_a_effacer = $_POST["btn_delete"];

  echo 'fonction delete va etre appellée';

  deleteLine($id_a_effacer);




}



see_the_last_id_given();

//
//
$all = readMyFile();
//
include "index.php";







//
// function readLine () {
//
//     $list = array_map('str_getcsv', file('taches.csv'));
//
//     if ( ( $handle = fopen("tache.csv", "r") ) !== FALSE ) {
//
//     }
//
// }



// function readAll () {
//
//   while ( $handle ) {
//
//   }
//
// }








//
// function tache() {
//
//   $miniTableau = [];
//
//
//   if ( ( $handle = fopen("tache.csv", "r") ) !== FALSE ) {
//
//       while ( ($tab = fgetcsv($handle) ) !== FALSE) {
//         $miniTableau = $tab;
//       }
//
//
//
//       return $miniTableau;
//       }
//
// }
















// function difficulty() {
//
//   if ($tache[$key][3][0] == true) {
//     echo "<p style=color:green;>"
//   }
//   if ($tache[$key][3][1] == true) {
//     echo "<p style=color:black;>"
//   }
//   if ($tache[$key][3][2] == true) {
//     echo "<p style=color:red;>"
//   }
// }





/*
// prise d'info de l'utilisateur
    Ajouter les informations $titre $message $date a base de donné
    aller cherche dans la base de donnée les informations
    les transmettres dans un formulaire codé en html dans le php


// aller chercher les info


// variable qui ecoute le bouton Supprimer




*/



?>
