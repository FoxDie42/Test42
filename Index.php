<?php
session_start();
if (isset($_SESSION['identifiant'])) { //SI IDENTIFIANT EXISTE
// On détruit les variables de notre session
session_unset ();
// On détruit notre session
session_destroy ();
}
?>
<!DOCTYPE HTML>
<html>
	<head>
	  <title>Menuiserie Poncet</title>
			<link rel="icon" type="image/jpg" href="Img/logo.jpg" />
      <link rel="stylesheet" href="Style.css">
      <meta name="viewport" content="width=device-width" />
      <meta charset="UTF-8">
	</head>
	<body>
		<header id="accueil">
			<img src="Img/Logo.jpg" alt="Escalier"/>
			<span>Agencement Intérieur & Extérieur Depuis 1981</span>
		</header>
		<div>
				<img src="Img/Escalier.jpg" alt="Escalier"/>
		</div>
		<nav id="nav">
			<ul>
				<li><a class="active" href="#accueil">Accueil</a></li>
				<li><a href="#entete">Menuiserie</a></li>
				<li><a href="#section_cuisine">Cuisine</a></li>
				<li><a href="#section_fenetre">Fenetre</a></li>
				<li><a href="#materiaux">Materiaux</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</nav>


		<section id="entete">
			<h2 id="title">La Menuiserie Poncet, située sur la commune de Vonnas dans le département de l'Ain, vous propose ses services pour toutes vos menuiseries.</h2>
				<ul id="entete_paragraphe">
					<li>
						Votre menuisier réalise la pose en rénovation de toutes vos menuiseries, fabriquées sur-mesure ainsi que l'entretien. Il effectue également la réparation et le remplacement des produits abîmés.
					</li>
					<li>
						Il met à votre disposition un large choix de produits, des fenêtres aux parquets en passant par les escaliers. Il peut créer des aménagements extérieurs tels que des abris de jardin ou des terrasses.
					</li>
					<li>
						La Menuiserie Poncet est à votre service depuis 1981 pour vous conseiller dans le choix des matériaux les plus adaptés à vos besoins pour vous offrir des 	menuiseries de qualité.
					</li>
				</ul>
		</section>

		<section id="menuiserie">
			<article id="texte-article">
				<h2>Menuiserie</h2>
				<p>
					De la conception à la réalisation, nous prenons en charge vos projets de menuiserie Intérieur et Extérieur.<br/>
					Notre expérience pour exploiter au maximum vos espaces autant que respecter l'ambiance de
					vos pièces et de votre maison.<br/>
					Notre service complet nous permet de réaliser l'ensemble de vos projets : Escaliers, Mezzanine, Arche...<br/>
					Nous concevons dans le style et les matières que vous souhaitez et nous vous conseillons pour une réalisation durable de qualité.
				</p>
						<ul class="liste_service">
							<li>Menuiserie</li>
							<li>Fenêtres</li>
							<li>Escaliers</li>
							<li>Volets roulants</li>
							<li>Portes</li>
							<li>Aménagement combles</li>
							<li>Aménagement dressings</li>
						</ul>
						<ul class="liste_service">
							 <li>Services</li>
							 <li>Pose en rénovation</li>
							 <li>Entretien</li>
							 <li>Réparation</li>
							 <li>Remplacement</li>
							 <li>Fabrication sur-mesure</li>
						</ul>
						<ul class="liste_service">
							 <li>Autres prestations</li>
							 <li>Vitrerie</li>
							 <li>Serrurerie</li>
							 <li>Terrasse</li>
							 <li>Abris de jardin</li>
						</ul>
						<ul class="liste_service">
							 <li>Matériaux</li>
							 <li>Aluminium</li>
							 <li>Bois</li>
							 <li>PVC</li>
							 <li></li>
						</ul>
			</article>
			<article id="photo-article">
				<img src="Img/Terrasse.jpg" alt="Terrasse"/>
				<img src="Img/comptoir-douche.jpg" alt="meuble de salle de bain"/>
				<img src="Img/Terrasse-esc.jpg" alt="Terrasse-escalier"/>
				<img src="Img/Terrasse-piscine.jpg" alt="Terrasse de piscine"/>
			</article>
		</section>
		<div class="vide"></div><!--PERMET LE CLEAR BOTH !-->

<!--SECTION CUISINE-->
	<section id="section_cuisine">
			<div id="titre-cuisine">Cuisine</div>
			<article id="article_cuisine">
				<img src="Img/cuisine2.jpg" alt="cuisine"/>
				<p>
					Concevoir une cuisine demande une grande écoute : prise en compte du besoin, des personnes utilisant la pièce (enfants, adultes..), de son intégration dans l'espace : encastrée, en ilôt, en angle...
					Notre capacité 'Sur Mesure' permettra de répondre à vos besoins et aux caractéristiques que nous
					aurons définies ensemble.
					La qualité des produits que nous utilisons vous garantira une cuisine solide et durable.
				</p>
			</article>
	</section>

<!--SECTION FENETRE-->
	<section id="section_fenetre">
		<div id="titre-fenetre">Fenetre</div>
			<article id="fenetre">
					<img src="Img/fenetre.jpg" alt="fenetre"/>
					<p>
						C'est un de nos coeurs d'activités.
						La fabrication et la pose de fenêtres paraissent aujourd'hui simples. C'est pourtant un véritable métier.
						Pratiqué avec soin, il vous garantie une isolation efficace thermique comme phonique.
						Nous vous conseillerons pour le choix des matières selon vos budgets et vos choix esthétiques :
						Bois, Pvc, Mixte, Aluminium...
						Nous intervenons également pour le remplacement de vos vitres.
					</p>
			</article>
	</section>
	<div class="vide"></div>


<!-- SECTION MATERIAUX -->
<?php
include('Classe/Manager.php');

$connect =Connexion::getInstance();
$BDD = $connect->getBase();
$Manage = new Manager();
$Tab = $Manage->getMateriaux();


echo '<section id="materiaux">';
echo '<h2> Nos Materiaux</h2>';
foreach ($Tab as $val) {

    echo '<div class="titre_mat">';
		echo $val->getnom();
		echo '</div>';
		echo '<ul class="liste_prod">';
    $Tab2 = $Manage->getProduit($val->getnom());
		if($Tab2 == null) { echo '';} //SI VIDE (Permet de gerer l'erreur si la categorie de materiaux n'a pas de produit)
		else {
    foreach ($Tab2 as $valu) {
        echo '<li>' . $valu->getnom() . '<br/><img src="Img/produit/' . $valu->getnom_photo() . '" /></li>';
	} }
		echo '<ul>';
}
echo '</section>';
?>



<!--SECTION GALERIE -->
<section id='section_galerie'>
	<div id="galerie">
		<button id="gauche" onclick="plusDivs(-1)">&#10094;</button>
	  <button id="droite" onclick="plusDivs(1)">&#10095;</button>
		<h2>Nos Réalisations</h2>
	  <img class="mySlides" src="Img/Fenetre.jpg" >
	  <img class="mySlides" src="Img/Cuisine2.jpg" >
	  <img class="mySlides" src="Img/Cuisine.jpg" >
	  <img class="mySlides" src="Img/Terrasse.jpg">
	</div>

	<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}

	function showDivs(n) {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  if (n > x.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = x.length}
	  for (i = 0; i < x.length; i++) {
	     x[i].style.display = "none";
	  }
	  x[slideIndex-1].style.display = "block";
	}
</script>
	<div class="vide"></div><!--PERMET LE CLEAR BOTH !-->
	</section>




</body>
</html>
