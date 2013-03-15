<?php

namespace app\models;

class Tenant extends \lithium\data\Model {

   public $validates = array();
   protected $_meta = array(
      'key' => '_id',
      'locked' => true,
      'source' => 'tenant',
      'connection' => 'default'
   );
      
      
   protected $_schema = array(
      '_id'=>array('type'=>'id'),
      'fname' => array('type'=>'string'),
      'mname' => array('type'=>'string'),
      'lname' => array('type'=>'string'),
      'unit_id' => array('type'=>'id'),
      'addresses'=>array('type'=>'array'),
      'contacts'=>array('type'=>'array')
   );

}

?>
