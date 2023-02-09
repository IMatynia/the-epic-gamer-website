<?php
    //Require libraries from folder libraries
    require_once 'libraries/Core.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Utilities.php';
    require_once 'libraries/Database.php';
    require_once 'libraries/UtilityHTMLElements.php';

    require_once 'config/config.php';

    require_once LIB . 'View.php';
    require_once LIB . 'Model.php';
    require_once LIB . 'OGPdata.php';

    //Instantiate core class
    $init = new Core();