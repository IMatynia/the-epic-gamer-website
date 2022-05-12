<div id="hax" >
    <?php

    function RetrieveUserIP()
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP']))
        {
        $address=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
        $address=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
        $address=$_SERVER['REMOTE_ADDR'];
        }
        return $address;
    }

    echo "Nice opinion.............................@";
    echo "One small issue...................................@@";
    ?>
⣿⣿⣿⣿⣿⠟⣩⣴⣶⡶⣶⣲⡶⠶⣶⠶⣶⣶⣖⣀⣉⣭⣉⣛⠻⢿⣿⣿⣿⣿ @
⣿⣿⣿⡿⢃⣾⣿⣻⣟⢮⣿⣮⣽⣿⣿⣻⣿⣿⣶⡲⣾⣿⣿⡳⣿⣶⡌⢿⣿⣿ @
⣿⣿⠟⢡⣾⣿⣿⢿⡷⠋⠉⠉⠩⣭⣙⠻⣿⣿⣿⡿⠟⠛⠛⠻⡿⣿⣿⣘⢿⣿ @
⡟⣡⣵⠟⣩⡭⣍⡛⠿⠶⠛⣩⣷⣶⣬⣴⣿⣿⣦⠠⣶⣶⣾⣿⠿⠛⠿⡪⣧⢸ @
⡇⣿⣿⢘⣛⠁⣬⣙⠛⠿⣿⣛⣻⡝⢩⠽⠿⣿⣿⣶⠍⠻⢷⣶⣾⠹⣿⣣⡟⢸ @
⣷⣌⠮⢾⣿⣷⡈⣙⠓⠰⣶⣦⣍⢉⣚⠻⠿⠿⠭⠡⠾⠿⠟⣊⢡⠁⢱⡿⢰⣿ @
⣿⣿⣷⡙⢿⣿⣷⣌⠓⣰⣤⣌⡉⡘⠛⠛⠓⠘⠛⠂⠚⠛⠂⠛⠈⠄⢸⡇⣿⣿ @
⣿⣿⣿⣷⣌⠻⡿⣿⣿⣦⣙⠛⢡⣿⣿⣷⠄⣦⣤⠄⣤⠄⡤⢠⡀⢢⣿⡇⣿⣿ @
⣿⣿⣿⣿⣿⣷⣬⣑⠻⢷⣯⢟⣲⠶⣬⣭⣤⡭⠭⠬⢭⣬⣥⣴⢶⣿⣿⣧⢸⣿ @
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣶⣦⣍⡓⠿⢿⣤⣿⣿⣟⣛⣿⣿⣿⣷⣛⣿⣾⡿⣸⣿ @
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⣦⣬⣭⣙⣛⡛⠿⠿⠿⠿⠿⢟⣋⣴⣿⣿ @@
    <?php
    echo "............................[Connection established! (0.12ms)]@@";
    echo "INTERFACE == " . $_SERVER['GATEWAY_INTERFACE'] . "@";
    echo "IP ADDRESS == [" . RetrieveUserIP() . "]@@";
    echo "PRT == " . $_SERVER['REMOTE_PORT']. "@";
    echo "SERVER ADDR == [" . $_SERVER['SERVER_ADDR'] . "]@";
    echo "SRV_NAME == " . $_SERVER['SERVER_NAME'] . "@";
    echo "SRV_SOFTWARE == " . $_SERVER['SERVER_SOFTWARE'] . "@";
    echo "SRV_PROTOCOL == " . $_SERVER['SERVER_PROTOCOL'] . "@";
    echo "RQST_METHOD == " . $_SERVER['REQUEST_METHOD'] . "@";
    echo "RQST_TM == [{" . $_SERVER['REQUEST_TIME'] . "} -- " . date("Y-m-d H:i:s",  $_SERVER['REQUEST_TIME']) . "]@";
    echo "RQST_HEADER == " . $_SERVER['HTTP_HOST'] . "@";
    echo "Tracking geolocation..........................[FOUND!]@";
    echo "I am 100 meters from your location and approaching rapidly@";
    echo "@@@                                            ";
    echo "[run]";
    ?>
</div>

<script>
    target = document.getElementById("hax");
    text = target.innerHTML;
    target.innerHTML = "";
    type_out_letters(text, target);
</script>