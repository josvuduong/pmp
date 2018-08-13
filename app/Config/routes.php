<?php
    //admin
    Router::connect('/admin',array('controller' => 'Users', 'action' => 'login', ));
    //home
    Router::connect('/',array('controller' => 'Homes', 'action' => 'index', 'home' => true));

    Router::connect('/lien-he-thanh-cong',array('controller' => 'Homes', 'action' => 'contact_success', 'home' => true));

    Router::connect('/tin-tuc/itemlist/category/*',array('controller' => 'Homes', 'action' => 'category', 'home' => true));

    Router::connect('/tin-tuc/item/*',array('controller' => 'Homes', 'action' => 'notices', 'home' => true));

    Router::connect('/tin-tuc/itemlist/tag/*',array('controller' => 'Homes', 'action' => 'tag_notice', 'home' => true));

    Router::connect('/tin-tuc/*',array('controller' => 'Homes', 'action' => 'news', 'home' => true));

    Router::connect('/lien-he',array('controller' => 'Homes', 'action' => 'contact', 'home' => true));
    
    
	CakePlugin::routes();
	require CAKE . 'Config' . DS . 'routes.php';
