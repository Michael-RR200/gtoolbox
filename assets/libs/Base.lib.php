<?php
/**
 Base library provides
    - logging of all operations to zresults.log
        - normal entry :  YYYY-MM-DD HH:ii:ss (T:execution time) => [action] : $this->logData
        - error entry :   YYYY-MM-DD HH:ii:ss (T:execution time) => [action] ERROR : $this->logData
    - set default values based on localhost vs remote server
*/
    
class Base {
    # logging variables
    private $logFile = 'assets/logs/zresults.log';
    public  $baseDir = '';
    public  $logData = '';          # data to be logged
    public  $logError = '';         # error data to be logged
    public  $logAction = '';        # explanation of request / action being undertaken
    public  $logPriority = 'INFO';
    
    # timing variables
    private $startTime = null;
    
    #general variables 
    public  $localhost = false;     # true :  $_SERVER["HTTP_HOST"] == 'localhost'
   
    function __construct(){
        $this->startTime = microtime();
        $this->baseDir = $_SERVER['DOCUMENT_ROOT'];

        if ($_SERVER["HTTP_HOST"] == 'localhost') 
        {
	        $this->baseDir .= '/assets/';
	        date_default_timezone_set('America/Denver');
	        $this->localhost = true;
        }
        else
        {   
	        $this->baseDir .= '/assets/';
	        date_default_timezone_set('America/New_York');
            error_reporting(0);
        }

    }#fn constructor
   
    function __destruct() {
        
    }#fn destructor

    /*
     * fn : getRequestTime  : Returns how long current request has taken.
     */
    public function getRequestTime(){
        $temp = explode(' ',$this->startTime);
        $start = $temp[0] + $temp[1];
        $now = explode(' ', microtime());
        $end = $now[0] + $now[1];
        return round($end - $start,4);
    }
}# class Base
