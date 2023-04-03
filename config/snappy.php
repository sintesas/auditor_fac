<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => base_path('resources\assets\pdf\wkhtmltopdf.exe'),
        'timeout' => false,
        'options' => array('encoding' => 'UTF-8'),
        'page-size' => 'A4',
        'env'     => array(),

    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);