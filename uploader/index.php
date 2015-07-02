<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);

require('UploadHandler.php');



$dirdemande=(isset($_POST['dirdemande'])  )? $_POST['dirdemande'] : (isset($_GET['dir'])) ? $_GET['dir'] : "";
$urldemande=(isset($_POST['urldemande'])  )? $_POST['urldemande'] : "";
$demande_codedem=(isset($_POST['demande_codedem'])  )? $_POST['demande_codedem'] : (isset($_GET['demande_codedem'])) ? $_GET['demande_codedem'] : "";

$options = array(
    'delete_type' => "POST",
    'db_host' => "localhost",
    'db_user' => "root",
    'db_pass' => "",
    'db_name' => "bduma",
    'db_table' => "files",
	'demande_codedem'=>$demande_codedem
);



$direc=array(
'upload_dir'=>'/../public/'.$dirdemande,
'urlapp'=>'/../public/'.$dirdemande);

$upload_handler = new UploadHandler($options,true,null,$direc);
