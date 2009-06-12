<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CsGalleryAlbum extends BaseCsGalleryAlbum
{

	public static function getGalleryAlbums() {
		
		return Doctrine_Query::create()
        			->from('CsGalleryAlbum')
        			->execute(array(),Doctrine::HYDRATE_ARRAY);

	}
	
	public static function getAlbumById($id) {
		return Doctrine_Query::create()
        			->from('CsGalleryAlbum g')
        			->where('g.id = ?')
        			->fetchOne(array($id), Doctrine::HYDRATE_ARRAY);
	}
	
	public static function createNewAlbum(array $album) {
		        	
		$album = new CsGalleryAlbum;
        $album->name			= $album['name'];
        $album->description 	= $album['description'];
        $album->position		= $album['position'];
        $album->thumb			= $album['thumb'];
        $album->save();
        
        return $album->id;
	}

}