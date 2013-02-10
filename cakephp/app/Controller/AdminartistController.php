<?php
class AdminartistController extends AppController
{
	/**
	* Listing des artistes, avec leur photo et leur nom 
	* Toute l'administration surra sur un nouveau Layout (template )
	**/
	var $components = array('Img');
	/* Liste les artistes 
	*	Avec Leur nom et leurs image 
	*/
	function artists()
	{
		$this->layout = "tempadmin";
		$this->loadModel('Picture');
		$this->loadModel('Artist');
		$this->loadModel('Album_artist');
		$this->loadModel('Album');

		/*
		SELECT *
		FROM artists
		JOIN album_artists ON album_artists.artist_id = artists.id
		join albums on albums.id_album = album_artists.album_id
		where artists.id = 5
		*/
		$data['album'] = $this->Album->find('list', array('fields' => array('Album.id','Album.name')));
		
		//$aArtstc = $this->Artist->find('all' , array('fields' => array('Artist.id','Artist.name','Picture.link', 'Album.name')));
		$aArtstc = $this->Artist->find('all' );
		//debug($this->Album);

		foreach($aArtstc as $k=>&$v)
		{
			//$v['album'] = $this->Album->Album_artist->find('list', array('fields' => array('Album.id','Album.name'), 'conditions' => array('Album_artist.artist_id' => $v['Artist']['id'])));
			
			$aAlbumId = array();
			
			foreach($v['Album_artist'] as $k2=>$v2)
			{
				$aAlbumId[] = $v2['id'];
			}
			$v['album'] = $this->Album->find('list', array('fields' => array('Album.id','Album.name'), 'conditions' => array('Album.id' => $aAlbumId)));
		}	
		$this->set('aArtst', $aArtstc);
		$this->set($data);
	}

	/* Ajout d'artiste. 
	*  1 Enregistre l'image de le dossier artiste
	*  2 sauvagrde la photo dans la table Picture
	*  3 recup L'id de la photo et enregistre le nouvel artiste dans la DB avec la bonne id picture
	*/
	function creates()
	{
		$this->layout = "tempadmin";
		$this->loadModel('Picture');
		$this->loadModel('Artist');
		
		
		if ($this->request->is('post'))
		{
			if (!empty($this->data["Picture"]["link"]["name"]))
			{
				move_uploaded_file($this->data["Picture"]["link"]["tmp_name"], "img/artiste/".$this->data["Picture"]["link"]["name"]);
				$tmp = $this->Picture->save(array('Picture' => array('link' => $this->request->data["Picture"]["link"]["name"])));
				$this->request->data['Artist']['picture_id'] = $tmp['Picture']['id'];
			}
			if (empty($this->data["Picture"]["link"]["name"]))
				$this->request->data['Artist']['picture_id'] = 1;
			
			if ($this->Artist->save($this->request->data))
			{
				$this->Session->setFlash('Votre post a été sauvegardé.');
				$this->redirect(array('action' => 'artists'));
			}
			else
				$this->Session->setFlash('Impossible dajouter votre post.');
		}
	}

	/* Modification d'un artiste
	*  
	*/
	function update($id = null)
	{
		$this->layout = "tempadmin";
		$this->loadModel('Picture');
		$this->loadModel('Artist');
		
		$this->Artist->id = $id;

		$aArtst = $this->Artist->find('all' , array('conditions' => array('Artist.id' => $id)));
		$this->set('aArtst', $aArtst);
		foreach ($aArtst as $value) 
		{
			$this->Picture->id = $value['Picture']['id'];
			if ($this->request->is('post'))
			{
				if (!empty($this->data["Picture"]["link"]["name"]))
				{
					move_uploaded_file($this->data["Picture"]["link"]["tmp_name"], "img/artiste/".$this->data["Picture"]["link"]["name"]);
					$tmp = $this->Picture->save(array('Picture' => array('link' => $this->request->data["Picture"]["link"]["name"])));
				}
				if (empty($this->data["Picture"]["link"]["name"]))
				$this->request->data['Artist']['picture_id'] = 1;
				if ($this->Artist->save($this->request->data)) 
				{
					$this->Session->setFlash('Votre post a été mis à jour.');
					$this->redirect(array('action' => 'artists'));
				} 
				else 
				{
					$this->Session->setFlash('Impossible de mettre à jour votre post.');
				}
			}
		}
	}

	function deleteArtist($id)
	{

		$this->loadModel('Picture');
		$this->loadModel('Artist');
    	if ($this->Artist->delete($id)) 
    	{
    		$this->Picture->delete($id);
	        $this->redirect(array('action' => 'artists'));
    	}
	}
}