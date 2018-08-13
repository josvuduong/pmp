<?php
App::uses('AppModel', 'Model');
class Album extends AppModel
{
    public $name = "Album";
    public $hasMany = array(
        'ImagesAlbum' => array(
            'className' => 'ImagesAlbum',
            'foreignKey' => 'album_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
    );
}