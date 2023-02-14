<?php
require __DIR__ . '/Entities/Rest.php';

// ?id=
if(isset($_GET['id'])) {
    $id = addslashes($_GET['id']);
    Rest::renderRequest($id);
}
throw new Exception("Requested parameters not found");

