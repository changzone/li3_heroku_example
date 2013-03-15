<?php 

use lithium\core\Environment;

Environment::is(function($request) {
    // env already set?
    if (isset($request->params['env'])) {
      return $request->params['env'];
    }
    $myvhostname = $request->env('HTTP_HOST');
    $iscli = is_array($request->argv) && !empty($request->argv);
    
    switch (true) {
        // production rules:
      case ((preg_match('/^propman\./', $myvhostname))):
         return 'development';
      
      case ($iscli):
         return 'development';
     
      case ($iscli && $request->argv[0] == 'test'):
         return 'test';

      default:
         return 'development';

    }
})

?>
