<?php

require '../models/subscriptions.php';

$subs = new Subscription();
if($_GET['sub']) $subs->unSub($_GET['id'], $_GET['mail']);
else $subs->sub($_GET['id'], $_GET['mail']);


 ?>
