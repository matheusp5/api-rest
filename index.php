<?php

require __DIR__ . '/Entities/Rest.php';

if(isset($_GET['id'])) {
    $id = addslashes($_GET['id']);
    Rest::renderRequest($id);
}
throw new Exception("Error: Request parameters not found");