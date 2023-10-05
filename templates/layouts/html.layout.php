<?php
include_once './includes/html_header.inc.php';
fromInc("menu");
if (isset($pageContent)) {
   echo $pageContent; 
}

include_once './includes/html_footer.inc.php';