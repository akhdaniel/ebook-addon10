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


echo "<h2>search and then write academic.course</h2>";

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


echo "<h2>write course with id=$ids[0] </h2>";

$ret = $models->execute_kw($dbname, $uid, $password, 
	'academic.course', 'write',
    array(
    	$ids, 
    	array(
            'description'=>"kursus java di update via PHP",
            'name'=>"Java hasil Update",
        )
   	)
);
var_dump($ret);


