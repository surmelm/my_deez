<?php

class Artist extends AppModel
{
	var $name = 'Artist';

	/*  belongsTo: le modèle actuel contient la clef étrangère.
	*	hasMany: l’autre modèle contient la clé étrangère.
	*/
	var $belongsTo = 'Picture';
	var $hasMany = array('Album_artist');



	/*var $hasAndBelongsToMany = array(
        'Album' =>
            array(
                 'className'              => 'Album_artist',
                 'joinTable'              => 'Album_artist',
                 'with'                   => '',
                'foreignKey'             => 'album_id',
                'associationForeignKey'  => 'artist_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )
    );*/



	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
			)
		);
}
?>