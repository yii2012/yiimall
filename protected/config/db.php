    <?php  
    return array(  
        'db' => array(  
            'connectionString' => 'mysql:host=192.168.1.240;dbname=tttt',  
            'emulatePrepare' => true,  
            'username' => 'root',  
            'password' => '****',  
            'charset' => 'utf8',  
        ),  
        'card' => array(  
            'class' => 'CDbConnection',//  
            'connectionString' => 'mysql:host=192.168.1.240;dbname=card',  
            'emulatePrepare' => true,  
            'username' => 'root',  
            'password' => '**',  
            'charset' => 'utf8',  
        ),  
    );  