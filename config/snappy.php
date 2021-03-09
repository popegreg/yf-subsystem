<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => "\"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe\"", //'/usr/local/bin/wkhtmltopdf'
        'timeout' => 3600,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => "\"C:/Program Files/wkhtmltopdf/bin/wkhtmltoimage.exe\"", //'/usr/local/bin/wkhtmltoimage'
        'timeout' => 3600,
        'options' => array(),
        'env'     => array(),
    ),


);
