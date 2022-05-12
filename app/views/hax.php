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
    echo "One small issue...................................@";
    echo "............................[Connection established! (0.12ms)]@@";
    
    echo " $ ipconfig --track ip @";
    echo " .......................... Success!@";

    echo "INTERFACE == " . $_SERVER['GATEWAY_INTERFACE'] . "@";
    echo "IP ADDRESS == [" . RetrieveUserIP() . "]@@";
    echo " $ ipserver --track ip @";
    echo " .......................... Success!@";
    echo "PRT == " . $_SERVER['REMOTE_PORT']. "@";
    echo "SERVER ADDR == [" . $_SERVER['SERVER_ADDR'] . "]@";
    echo "SRV_NAME == " . $_SERVER['SERVER_NAME'] . "@";
    echo "SRV_SOFTWARE == " . $_SERVER['SERVER_SOFTWARE'] . "@";
    echo "SRV_PROTOCOL == " . $_SERVER['SERVER_PROTOCOL'] . "@";

    echo " $ firewall print @";
    echo " .......................... Success!@";
    echo "RQST_METHOD == " . $_SERVER['REQUEST_METHOD'] . "@";
    echo "RQST_TM == [{" . $_SERVER['REQUEST_TIME'] . "} -- " . date("Y-m-d H:i:s",  $_SERVER['REQUEST_TIME']) . "]@";
    // echo "INTERFACE" . $_SERVER['HTTP_ACCEPT'] . "@";
    // echo "INTERFACE" . $_SERVER['HTTP_ACCEPT_CHARSET']	Returns the Accept_Charset header from the current request (such as utf-8,ISO-8859-1)
    echo "RQST_HEADER == " . $_SERVER['HTTP_HOST'] . "@";
    // echo "INTERFACE" . $_SERVER['HTTP_REFERER']	Returns the complete URL of the current page (not reliable because not all user-agents support it)
    // echo "INTERFACE" . $_SERVER['HTTPS']	Is the script queried through a secure HTTP protocol
    
    // $_SERVER['SCRIPT_FILENAME']	Returns the absolute pathname of the currently executing script
    // $_SERVER['SERVER_ADMIN']	Returns the value given to the SERVER_ADMIN directive in the web server configuration file (if your script runs on a virtual host, it will be the value defined for that virtual host) (such as someone@w3schools.com)
    // $_SERVER['SERVER_PORT']	Returns the port on the server machine being used by the web server for communication (such as 80)
    // $_SERVER['SERVER_SIGNATURE']	Returns the server version and virtual host name which are added to server-generated pages
    // $_SERVER['PATH_TRANSLATED']	Returns the file system based path to the current script
    // $_SERVER['SCRIPT_NAME']	Returns the path of the current script
    // $_SERVER['SCRIPT_URI']
    ?>
</div>

<script>
    target = document.getElementById("hax");
    text = target.innerHTML;
    target.innerHTML = "";
    type_out_letters(text, target);
</script>