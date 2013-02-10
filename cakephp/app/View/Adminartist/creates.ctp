<div class="contOnglet">
	<div class="contLeft">
		<ul>
			<li><?php echo $this->Html->link('Create Artiste', 'creates')?></li>
			<li><?php echo $this->Html->link('Read Artiste', 'artists')?></li>
		</ul>
	</div>
	<div class='clear'></div>
</div>
<?php
	//debug($aList);

	// Creation d'un formulaire abec cakephp enctype="multipart/form-data"
	echo $this->Form->create('Post' , array("enctype" => 'multipart/form-data'));
	echo $this->Form->input('Artist.name', array('label' => 'Nom : '));
	echo $this->Form->file('Picture.link');
	echo $this->Form->end("ajouter");
?>