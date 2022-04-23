<?php

define('ATTACHED_DATA_SERVICE', 0);
define('ATTACHED_DATA_SERVICE_PROVIDER', 1);

function isValidAttachedDataType($dataType) {
    return $dataType == 0 || $dataType == 1;
}

?>
