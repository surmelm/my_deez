<?php // echo $content_for_layout ;  affiche le contenue php dont ont a besoin ?>

<html>
<head>
	<title>My_deez</title>
	<?php echo $this->Html->css('home.css'); ?>
	<?php echo $this->Html->css('reset.css'); ?>
	<?php echo $this->Html->css('artiste.css'); ?>
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
			<div class="clear"></div>
		</div>
		<div id="contOnglet">
			<div class="contLeft">
				<ul>
					<li><a href="">Artiste</a></li>
					<li><a href="">Utilisateur</a></li>
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
</body>
</html>