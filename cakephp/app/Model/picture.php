<?php

class Picture extends AppModel
{
	var $name = 'Picture';
	// hasMany: l’autre modèle contient la clé étrangère.
	var $hasMany = 'Artist';
}
?>