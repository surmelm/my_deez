<?php

class Album extends AppModel
{
	var $name = 'Album';

	// hasMany: l’autre modèle contient la clé étrangère.
	var $hasMany = 'Album_artist';
}
?>