<?php
/* Get Header */
function bf_header(){
	require(THEME_PATH. 'header.php');
}
/* Get page */
function bf_page(){
	require(THEME_PATH. 'page.php');
}
/* Get article template */
function bf_article(){
	require(THEME_PATH. 'article.php');
}
/* Get Login Form */
function bf_loginForm(){
	require(THEME_PATH. 'login-form.php');
}
/* Get Footer */
function bf_footer(){
	require(THEME_PATH. 'footer.php');
}
function bf_usersAdmin(){
	require(THEME_PATH. 'users.php');
}
// /* Display Articles */
// function bee_displayArticles(){
// 	global $mysql;
// 	foreach($mysql->query('SELECT * from bee_articles') as $row) {
//        	print_r($row);
//    	}
// }
