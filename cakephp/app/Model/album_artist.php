<?php

class Album_artist extends AppModel
{
	var $name = 'Album_artist';

	// belongsTo: le modèle actuel contient la clef étrangère.

	var $belongsTo = array('Album', 'Artist');
}
?>