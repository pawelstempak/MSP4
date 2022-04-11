<?php
/* CREATE SINGLE PAGE */

##########################################################
###################### set first tab# ####################
##########################################################

	$stmt = $pdo -> query("
							SELECT *
							FROM language
							WHERE id_language = '".$page_lang."'
						");


$first_tab = $stmt->fetch();
$stmt->closeCursor();
unset($stmt);
$smarty->assign('first_tab',$first_tab);

##########################################################
################default language definition###############
##########################################################

	$stmt=$pdo->query("
						 	SELECT *
							FROM language
							WHERE id_language != '".$page_lang."'
							ORDER BY title ASC
							");

$language_list=$stmt->fetchAll();
$stmt->closeCursor();
unset($stmt);
$smarty->assign("language_list",$language_list);

############# Zapis do MySQL danych ################
if(isset($_POST['save']))
{
	switch($_GET['page']) {
		case "create_pages":

			$pdo -> exec("
				INSERT INTO pages (
										id_layouts,
										status,
										created,
										modified,
										created_by,
										modified_by
										)
				VALUES (
						 '".$_POST['layouts_id']."',
						 '0',
						 '".date("Y-m-d H:i:s",time())."',
						 '".date("Y-m-d H:i:s",time())."',
						 '".$user->GetUserId()."',
						 '".$user->GetUserId()."'
						 )
			");

			$l_ins_id = $pdo->lastInsertId();

			$lang_id = POST2LangId($_POST,'langid');
			foreach($lang_id as $id)
			{
				$pdo -> exec("
							INSERT INTO language_content (
																  element,
																  id_element,
																  id_language,
																  content
																 )
							VALUES (
									 'pages_title',
									 '".$l_ins_id."',
									 '".$id."',
									 '".addslashes($_POST['langid_'.$id])."'
									 )
				");
			}
			$lang_id = POST2LangId($_POST,'langid');
			foreach($lang_id as $id)
			{
				$pdo -> exec("
							INSERT INTO language_content (
																  element,
																  id_element,
																  id_language,
																  content
																 )
							VALUES (
									 'pages_content',
									 '".$l_ins_id."',
									 '".$id."',
									 '".addslashes($_POST['clangid_'.$id])."'
									 )
				");
			}

		break;

		case "edit_pages":

			$lang_id = POST2LangId($_POST,'lang');

			foreach($lang_id as $id)
			{
				if($_POST['langid_'.$id])
				{
					$stmt=$pdo->query("
					 	SELECT *
						FROM language_content
						WHERE element = 'pages_title' and id_element = '".$_GET['id']."' and id_language = '".$id."'
						");
					$if_exist=$stmt->fetch();
					$stmt->closeCursor();
					unset($stmt);
					if($if_exist)
					{
						$pdo -> exec("
									UPDATE language_content
									SET content = '".addslashes($_POST['langid_'.$id])."'
									WHERE element = 'pages_title' and id_element = '".$_GET['id']."' and id_language = '".$id."'
						");
					}
					else
					{
						$pdo -> exec("
									INSERT INTO language_content (
																		  element,
																		  id_element,
																		  id_language,
																		  content
																		 )
									VALUES (
											 'pages_title',
											 '".$_GET['id']."',
											 '".$id."',
											 '".addslashes($_POST['langid_'.$id])."'
											 )
						");
					}
				}
				else
				{
					$pdo -> exec("
								DELETE FROM language_content
								WHERE element = 'pages_title' and id_element = '".$_GET['id']."' and id_language = '".$id."'
					");
				}
			}

			foreach($lang_id as $id)
			{
				if($_POST['langid_'.$id])
				{
					$stmt=$pdo->query("
					 	SELECT *
						FROM language_content
						WHERE element = 'pages_content' and id_element = '".$_GET['id']."' and id_language = '".$id."'
						");
					$if_exist=$stmt->fetch();
					$stmt->closeCursor();
					unset($stmt);
					if($if_exist)
					{
						$pdo -> exec("
									UPDATE language_content
									SET content = '".addslashes($_POST['clangid_'.$id])."'
									WHERE element = 'pages_content' and id_element = '".$_GET['id']."' and id_language = '".$id."'
						");
					}
					else
					{
						$pdo -> exec("
									INSERT INTO language_content (
																		  element,
																		  id_element,
																		  id_language,
																		  content
																		 )
									VALUES (
											 'pages_content',
											 '".$_GET['id']."',
											 '".$id."',
											 '".addslashes($_POST['clangid_'.$id])."'
											 )
						");
					}
				}
				else
				{
					$pdo -> exec("
								DELETE FROM language_content
								WHERE element = 'pages_content' and id_element = '".$_GET['id']."' and id_language = '".$id."'
					");
				}
			}

			$pdo -> exec("
							UPDATE pages
							SET created = '".$_POST['created']."', modified = '".date("Y-m-d H:i:s",time())."', modified_by = '".$user->GetUserId()."'
							WHERE id_pages = '".$_GET['id']."'
			");

		break;

	}

	CreateXMLSearchPagesFile('pages_title');

	if(isset($_POST['save']) and $_POST['save']=="save_close"){header("Location: ".PATH_BACKEND."pages/ok");}
	if(isset($_POST['save']) and $_POST['save']=="save"){header("Location: ".PATH_BACKEND."edit_pages/ok/".$_GET['id']);}

}
#################################################################

?>