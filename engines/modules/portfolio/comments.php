<?php

	if ( ! defined ( 'DATALIFEENGINE' ))
	{
	}

	$id = intval ( $_REQUEST[ 'id' ] );

  	switch ( $_REQUEST[ 'sub_act' ]  )
  	{
  			case 'del' :

  				if ( $id != 0 )
  				{

  					 header ( "Location: " . $_SERVER[ 'HTTP_REFERER' ] );
  					 die ();
  				}
  				break;
  	}

?>