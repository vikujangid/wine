<?php

function pr($data,$die =FALSE){
	echo '<pre>'; print_r($data);
	if($die)
		die("<br />----->>>done");
}