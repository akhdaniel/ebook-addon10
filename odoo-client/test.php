<pre>
<?php
include "ripcord/ripcord.php";

$url   = "http://localhost:8010";
$username  = "admin";
$password = "1";
$dbname = "academic";

/* login */
echo "<h2>login process</h2>";

$common = ripcord::client("$url/xmlrpc/2/common");
$uid = $common->authenticate($dbname, $username, $password, array());
var_dump($uid);


/* create $models object*/
$models = ripcord::client("$url/xmlrpc/2/object");


echo "<h2>search and then read academic.course</h2>";
/* search ID course */
$ids = $models->execute_kw($dbname, $uid, $password,
    'academic.course', 'search',
    array(
    	array(
    		array('name','=','Java'),
    	)
    )
);
var_dump($ids);

/* read records by ID */
$records = $models->execute_kw($dbname, $uid, $password,
    'academic.course', 'read', array($ids));

echo "<br/>";

foreach ($records as $key => $value) {
	echo $value['name'] . "<br/>";
	echo $value['description'] . "<br/>";
}



echo "<h2>search_read academic.course</h2>";

/* search and read */
$records = $models->execute_kw($dbname, $uid, $password,
    'academic.course', 'search_read', 
    array(
    	array(
    		array('name','ilike','java'),
    	)
    )
);

echo "<br/>";
/*
$value['responsible_id'] = array(2,'Badu')
*/
foreach ($records as $key => $value) {
	echo $value['name'] . "<br/>";
	echo $value['responsible_id'][1] . "<br/>";
}



