<?php 
 //-------------CONFIGURATION FILE--------------
 error_reporting(0);
 ob_start();
 session_start();
 require('dbdetails.php');
 require('mysql_classes.php');
 require('constant.php');
 require('common_functions.php');
 require('en_language.php');
 /**************OBJECT FOR MYSQL CONNECTION*******************************/
 $Core_Mysql =   new Mysql_Class();
 $Core_Mysql->db_connect(DB_HOST,DB_USER,DB_PASS);
 $Core_Mysql->db_select_db(DB_NAME);
 //////////////////////////////////////////////////////////////////////////
  /**************OBJECT FOR PHP BUILT IN CLASSES*******************************/
// $Built_Mysql =   new Php_Built_Sql();
 //////////////////////////////////////////////////////////////////////////
?>