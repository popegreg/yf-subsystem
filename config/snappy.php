<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltopdf', //"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe"
        'timeout' => 3600,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltoimage', //"C:/Program Files/wkhtmltopdf/bin/wkhtmltoimage.exe"
        'timeout' => 3600,
        'options' => array(),
        'env'     => array(),
    ),


);
