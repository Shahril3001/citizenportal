<?php
if (!isset($_GET['id'])) {
	$id= 'home';
}else{
	$id = $_GET['id'];
}
if (strlen($id)<1) {
	$id= 'home';
}
$pages = array(
'home'=>array('id'=>"home", 'parent'=>"", 'title'=>"Home", 'url'=>"test.php?id=home"),
'users'=>array('id'=>"users", 'parent'=>"home", 'title'=>"Users", 'url'=>"test.php?id=users"),
'deep'=>array('id'=>"deep", 'parent'=>"users", 'title'=>"Deep", 'url'=>"test.php?id=deep")
);
 function breadcrumbs($id, $pages){
 	$bcl = array();
 	$pageid = $id;
 	while(strlen($pageid)>0){
 		$bcl[]= $pageid;
 		$pageid = $pages[$pageid]['parent'];
 	}
 	for ($i = count($bcl)-1; $i >=0 ; $i--) {
 		$page = $pages[$bcl[$i]];
 		if ($i>0) {
 			echo "<a href=".$page['url'].">";
 		}
 		echo $page['title'];
 		if ($i>0) {
 			echo '</a> >> ';
 		}
 	}
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title><?php echo $id; ?></title>
 </head>
 <body>
 	You'r Here: <?php breadcrumbs($id, $pages) ?> <br>
 	Page Name: - <?php echo $id; ?>
 	<br/><a href="test.php?id=home">Home</a>
 	<br/><a href="test.php?id=users">Users</a>
 	<br/><a href="test.php?id=deep">Deep</a>
 </body>
 </html>
