<?php 
/*
 * Mobile Application
 * 
 * Copyright 2021
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * Author      :  prismhub
 * E-mail      :  kunal@prismonline.co.in
 * Created on  :  10th August 2021
 * Version     :  1.0
 * Project     :  WebService
 * Page        :  GetResults
 * Company     :  Prismhub  
 * Modified on :   
 * Modified by :   
 */
 
 
// Includes the class which have the all functions
ini_set('display_errors', '0');
include_once("../config.php");
include_once("functions.class.php");

if(!isset($_REQUEST['action'])){
echo 'Function Is Missing.....';
exit;
}
else{
$function=$_REQUEST['action'];
// CALLING FUNCTION FROM HERE==========================
_call($function);

}
?>