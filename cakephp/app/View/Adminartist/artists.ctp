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
foreach ($aArtst as $value) 
{
	?>
	<table>
		<tr>
			<td>Photo</td>
			<td>Name</td>
			<td>Album</td>
			<td>Song</td>
			<td>Modifier</td>
			<td>Suprimer</td>
		</tr>
		<tr>
			<td><?php echo $this->Html->image("artiste/".$value['Picture']['link']);?></td>
			<td><?php echo $value['Artist']['name']?></td>
			
			 	<td><?php echo $this->form->create('post');
			 	echo $this->form->input('Album.name', array("options" => $value['album']));
			 	echo $this->form->end();?>
			
			
			</td>
			
			<td>Song</td>
			<td><?php echo $this->Html->link(
				'Edit', 
				array('action' => 'update', $value['Artist']['id'])); ?></td>
			<td><?php echo $this->Form->postLink(
				'suprimer',
				array('action' => 'deleteArtist', $value['Artist']['id']),
				array('confirm' => 'Etes-vous sûr ?'));
				?>
			</td>
		</tr>
	</table>
	<?php }?>