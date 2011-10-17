<?php

  	if ( ! defined ( 'DATALIFEENGINE' ))
  	{
  		   die ( 'Hacking Attemp!' );
  	}

  	if ( ! $is_logged )
  	{
           msgbox( $lang['all_info'], "��� ��������� ����� ��������, ��� ��������� <a href='/index.php?do=register'>�������������� �� ����</a>!" );
  	}
  	else
  	{
  		$db->query ( "SELECT * FROM " . PREFIX . "_portfolio WHERE user_id = '{$member_id['user_id']}'" );

  		if ( $db->num_rows () != 0 AND $_REQUEST[ 'act' ] == 'add' )
  		{
             //msgbox( $lang['all_info'], "�� ��� ������ ��� ��������! �� ������ <a href=\"/portfolio/edit/\">����������</a> ���� ������ ����." );
             @header ( 'Location: /portfolio/edit/' );
             die();
  		}
  		else
  		{
  			if ( $_REQUEST[ 'act' ] == 'edit' )
  			{
  			 	 $row = $db->get_row ();

  			 	 foreach ( $row as $name => $value )
  			 	 {
  			 	 		$row[ $name ] = stripslashes ( $value );
  			 	 }
  			}

	  		switch ( $_REQUEST [ 'sub_act' ] )
  			{
  				case 'do_edit' :
  				case 'do_add' :

					$values = array ();
					$port  = $_POST[ 'port' ];
                    foreach ( $fields as $field )
                    {
                        	if ( $_REQUEST[ 'sub_act' ] == 'do_add' )
                        	{
	                      		 $values[] =  isset ( $port[ $field ] ) ? "'" . $db->safesql ( $port[ $field ] ) . "'" : "''";
	                      	}
	                      	elseif ( $_REQUEST[ 'sub_act' ] == 'do_edit' )
	                      	{
                             	 $values[] = $field . " = '" . $db->safesql ( $port[ $field ] ) . "'";
	                      	}
                    }

                    $fields = implode ( ", ", $fields );
                    $values = implode ( ", ", $values );

                    if ( $_REQUEST[ 'sub_act' ] == 'do_add' )
                    {
	                     $db->query ( "INSERT INTO " . PREFIX . "_portfolio ( user_id, user_name, {$fields} ) VALUES ( '{$member_id['user_id']}', '{$member_id['name']}', {$values} )" );
	                }
	                elseif ( $_REQUEST[ 'sub_act' ] == 'do_edit' )
	                {
	                	 $id = intval ( $_REQUEST[ 'id' ] );

	                	 if ( $id != 0 )
	                	 {
		                	  $db->query ( "UPDATE " . PREFIX . "_portfolio SET {$values} WHERE id = '{$id}'" );
		             	 }
	                }

                    if ( trim ( $_FILES[ 'foto' ][ 'tmp_name' ] ) != '')
                    {
                    	 $allowed_ext = array ( 'jpg', 'jpeg', 'png' );
                    	 $file_ext = strtolower (  end ( explode ( '.', $_FILES[ 'foto' ][ 'name' ] )));

                    	 if ( in_array ( $file_ext, $allowed_ext ))
                    	 {
                    	 	  $file_name = $member_id[ 'user_id' ] . '.' . $file_ext;

	                    	  move_uploaded_file ( $_FILES[ 'foto' ][ 'tmp_name' ], ROOT_DIR . '/uploads/portfolio/foto/' . $file_name );

	                    	  $db->query ( "UPDATE " . PREFIX . "_portfolio SET foto = '{$file_name}' WHERE user_id = '{$member_id['user_id']}'" );
	                     }
                    }

                    if ( $_REQUEST [ 'sub_act' ] == 'do_add' )
                    {
	                     msgbox ( "�������� ������ ������!", "�������� ������ ������!" );
	                }
	                else
	                {
	                	 msgbox ( "�������� ������ ������!", "�������� ������ ������! <a href=\"/portfolio/\">������� �� ������ ��������</a>." );
	                }
  					break;


  				default :

  					$tpl->load_template ( 'portfolio/add.tpl' );

					$tpl->set ( '{country}', 	getOptions ( getCountries (), $row[ 'country' ] ));
					$tpl->set ( '{services}',	getOptions ( getServices (), $row[ 'services' ] ));
					$tpl->set ( '{region}',		getOptions ( getRegions ( $row[ 'country' ] ), $row[ 'region' ] ));
					$tpl->set ( '{town}',		getOptions ( getTowns_marked ( $row[ 'region' ] ), $row[ 'town' ] ));

					foreach ( $fields as $field )
				  	{
				  		if ( $field != 'country' AND $field != 'services' AND $field != 'region' AND $field != 'town' )
				  		{
				  			if ( isset ( $row [ $field ] ))
				  			{
				  				 $tpl->set ( '{' . $field . '}', $row[ $field ] );
				  			}
				  			else
				  			{
		  						 $tpl->set ( '{' . $field . '}', '' );
		  					}
		 				}
				  	}

				  	if ( $_REQUEST[ 'act' ] == 'edit' )
				  	{
				  		 $title  = "����������� ��������";
				  		 $button = "���������� ���";
				  		 $hidden = <<<HTML
<input type="hidden" name="sub_act" value="do_edit" />
<input type="hidden" name="id" value="{$row['id']}" />
HTML;
				  	}
				  	else
				  	{
				  	 	 $title = "���������� ����� ��������";
				  	 	 $button = "������ ��������";
				  	 	 $hidden = <<<HTML
<input type="hidden" name="sub_act" value="do_add" />
HTML;
					}
					$tpl->set ( '{title}',	$title );
					$tpl->set ( '{button}', $button );
					$tpl->set ( '{user_id}', $member_id['user_id'] );
			  		$tpl->copy_template = <<<HTML

<form method="POST" enctype="multipart/form-data" name="portfolio_form">
	{$hidden}
	{$tpl->copy_template}
</form>

HTML;

					$tpl->set ( '{images}',	getImages ( $member_id[ 'user_id' ] ));
	  				$tpl->compile ( 'content' );
	  				$tpl->load_template ( 'portfolio/ui_form_add_cities_name.tpl' );
	  				$tpl->compile ( 'content' );
  					break;
  			}
  		}
	}

?>
