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



/* search ID partner Agus */
$partner1_id = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'search',
    array(
        array(
            array('name','=','Agus'),
        )
    )
);

/* search ID partner Budi */
$partner2_id = $models->execute_kw($dbname, $uid, $password,
    'res.partner', 'search',
    array(
        array(
            array('name','=','Budi'),
        )
    )
);

/* search ID session */
$ids = $models->execute_kw($dbname, $uid, $password,
    'academic.session', 'search',
    array(
        array(
            array('name','=','Session 1 Java'),
        )
    )
);
var_dump($ids);



echo "<h2>write attendee_ids on academic.session</h2>";


/*
attendee_ids = [
    (0,0,{'partner_id':2, 'name':'01'}),
    (0,0,{'partner_id':3, 'name':'02'}),
    (0,0,{'partner_id':4, 'name':'03'})
]
*/
$ret = $models->execute_kw($dbname, $uid, $password,
    'academic.session', 'write',
    array(
        $ids, 
        array(
            'duration'=>10,
            'seats'=>20,
            'attendee_ids'    =>array(
                array(0,0,array(
                    'partner_id'=> $partner1_id[0],
                    'name'=>"01")),
                array(0,0,array(
                    'partner_id'=> $partner2_id[0],
                    'name'=>"02"))
            )
        )
    )
);
var_dump($ret);


