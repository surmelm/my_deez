<?php // echo $content_for_layout ;  affiche le contenue php dont ont a besoin ?>

<html>
<head>
	<title>My_deez</title>
	<?php echo $this->Html->charset(); ?>
	<?php echo $this->Html->css('home.css'); ?>
	<?php echo $this->Html->css('reset.css'); ?>
	<?php echo $this->Html->css('homeContent.css'); ?>
	<?php echo $this->Html->script('jquery-1.8.2.min.js'); ?>
	<?php echo $this->Html->script('jquery.roundabout.min.js'); ?>
</head>
<body>
	<header>
		<div id="contTiltle">
			<div class="contLeft">
				<h1><a href=""><span class="blue">SRIUB</span> <span class="blodnone">music</span></a></h1>
				<p class="sousTitre">Vos musique favorite à porté de clique</p>
			</div>
			<div class="contRight">
				<ul>
					<li id="inscript">Inscription</li>
					<li id="connect">Connection</li>
					<li class="last">Connection via Facebook</li>
				</ul>
				<div class="clear"></div>
				<div id="connection">
					<form class="formCo">
						<p>Pseudo : <input type="text"/></p>
						<p>Password : <input type="text"/></p>
						<input class='ok' type="submit" value="Connexion"/>
					</form>
				</div>
				<div id="inscription">
					<form class="formCo">
						<p>Pseudo : <input type="text"/></p>
						<p>Email : <input type="text"/></p>
						<p>Password : <input type="text"/></p>
						<input class='ok' type="submit" value="Inscription"/>
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="contOnglet">
			<div class="contLeft">
				<ul>
					<li><a href="">Accueil</a></li>
					<li><a href="">Genre</a></li>
					<li><a href="">Communauté</a></li>
				</ul>
			</div>
			<div class="contRight">
				<form methode="get">
					<input id="champ" name="cham" type="text"/>
					<input id="sube" type="submit" value=""/>
				</form>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</header>
	<div id="content">
		<?php echo $content_for_layout ;?>
	</div>
	<?php echo $this->Html->script('homeconnect_inscri.js'); ?>
</body>
</html>