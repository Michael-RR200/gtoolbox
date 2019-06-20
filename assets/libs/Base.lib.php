<?php
/**
 Base library provides
    - logging of all operations to zresults.log
        - normal entry :  YYYY-MM-DD HH:ii:ss (T:execution time) => [action] : $this->logData
        - error entry :   YYYY-MM-DD HH:ii:ss (T:execution time) => [action] ERROR : $this->logData
    - set default values based on localhost vs live
    - error_reporting & date_timezone  
    - display array in table capabilities
*/
    
class Base {
    # logging variables
    private $logFile = 'assets/logs/zresults.log';
    public  $baseDir = $_SERVER['DOCUMENT_ROOT'];
    public  $logData = '';          # data to be logged
    public  $logError = '';         # error data to be logged
    public  $logAction = '';        # explanation of request / action being undertaken
    public  $logPriority = 'INFO';
    
    # timing variables
    private $startTime = microtime();
    
    #general variables 
    public  $localhost = false;     # true :  $_SERVER["HTTP_HOST"] == 'localhost'
   
    function __construct(){
        
    }#fn constructor
   
    function __destruct() {
        
    }#fn destructor
}# class Base