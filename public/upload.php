<?php 

define('BANNER_PATH', dirname(__FILE__) . '/banners/');

if ( empty($_POST) || empty($_FILES) ) {
    __(array(
        'msg' => 'error'
    ));
}

// else upload the files.
$fileName = 'banner_' . (isset($_POST['bannerNo']) ? $_POST['bannerNo'] : 1);
$fileName .= '.jpg';

move_uploaded_file($_FILES['file']['tmp_name'],  BANNER_PATH . $fileName);

__(array(
    'msg' => 'success'
));

function __( $data ){
    header('content-type: application/json');
    echo json_encode( $data );
    exit;
}

?>