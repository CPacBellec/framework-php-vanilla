<?php
include_once './templates/includes/html_header.inc.php';

if (isset($pageContent)) {
   echo $pageContent['html']; 
}
include_once './templates/includes/html_footer.inc.php';
fromInc("menu");