<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'ea/job/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
