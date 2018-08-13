<?php
App::uses('AppModel', 'Model');
class ImagesAlbum extends AppModel
{
    public $name = "ImagesAlbum";
    public $belongsTo = array(
        'Album' => array(
            'className' => 'Album',
            'foreignKey' => 'album_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

}