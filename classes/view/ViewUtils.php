<?php
include_once "/opt/lampp/htdocs/packages.php";

class ViewUtils {
    public function printRawJson($dataset) {
        if ($dataset == null) echo "[]";
        else echo json_encode($dataset, JSON_UNESCAPED_SLASHES);
    }
}