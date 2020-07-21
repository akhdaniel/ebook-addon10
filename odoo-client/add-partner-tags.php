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


/* create tag 1 */
$tag1_id = $models->execute_kw($dbname, $uid, $password,
    'res.partner.category', 'create',
    array(
        array(
            'name'       => "Senior",
        ),
    )
);
var_dump($tag1_id);

/* create tag 2 */
$tag2_id = $models->execute_kw($dbname, $uid, $password,
    'res.partner.category', 'create',
    array(
        array(
            'name' => 'Part Time',
        )
    )
);
var_dump($tag2_id);

/* search ID instruktur */
$ids = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'search',
    array(
        array(
            array('name','=','Joko'),
            array('is_instructor','=',True)
        )
    )
);
var_dump($ids);
if (!$ids){
    die("instructor not found!");
}


echo "<h2>write category_id on res.partner</h2>";

$ret = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'write',
    array(
        $ids, 
        array(
            'category_id'    =>array(
                array(4,$tag1_id),
                array(4,$tag2_id)
            )
        )
    )
);
var_dump($ret);


