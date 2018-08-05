<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>TITRE DU PROJET</title>
	<meta name="description" content="description/résumé avec 160 caracteres max" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- CSS Vendor -->
	<link rel="stylesheet" href="css/fontawesome-all.min.css" media="all" />
	<link rel="stylesheet" href="css/normalize.css" media="all" />
	<!-- CSS Perso -->
	<link rel="stylesheet" href="css/style.css" media="screen" />
</head>

<body>
	<!--HEADER-->
	<header>
		<nav>
		</nav>
	</header>
	<!--MAIN CONTENT-->
	<main>


<?php if (isset($all)) : ?>
	<div class="affichageTableau">

		<?php foreach($all as $value) : ?>

			<div>
				<?php echo "<p class='" . $value[3] . "'> Titre " . $value[0] . " </p>"; ?>
				<?php echo "<p> Tache " . $value[1] . " </p>" ;?>
				<?php echo "<p> Date " . $value[2] . " </p>" ;?>
				<?php echo "<p> Importance " . $value[3] . " </p>" ;?>

				<?php if ($value[4] !== null) : ?>
					<form class="" action="formulaire.php" method="post">
						<button type="submit" name="btn_delete" value="<?php echo $value[4]; ?>">Supprimer</button>
					</form>
				<?php endif; ?>

			</div>

	<?php endforeach  ;?>

	</div>
<?php endif; ?>



	<form class="formulaire" action="formulaire.php" method="post">
		<div>
			<input type="hidden" name="nouvelId" value="<?php if (isset($i)) { echo $i; } else { echo 0; } ?>">
			<label for="titre">Titre :</label>
			<input type="text" id="name" name="user_titre" value="">
		</div>
		<div>
			<label for="msg">Tache :</label>
			<textarea id="msg" name="user_message" value="tacheText"></textarea>
		</div>
		<div class="date">
			<label for="date">Date :</label>
			<input type="date" name="user_date" value="choixDate" required>
		</div>
		<input name="importance" type="radio" value="importanceBasse">Basse
		<input name="importance" type="radio" value="importanceNormal">Normal
		<input name="importance" type="radio" value="importanceHaute">Haute
		<button class="add_btn" type="submit" name="add_btn" value="ajouter">Ajouter</button>
	</form>

	</main>
	<!--FOOTER-->
	<footer>
	</footer>
</body>

</html>
