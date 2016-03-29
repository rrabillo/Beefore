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
/* Get article list */
function bf_addArticle(){
	require(THEME_PATH. 'add-article.php');
}
/* Get article template */
function bf_displayArticle(){
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
	switch ($GLOBALS['current_url']) {
		case 'users':
			require(THEME_PATH. 'users.php');
			break;
		case 'edit':
			require(THEME_PATH. 'edit.php');
			break;
		case 'poles':
			require(THEME_PATH. 'poles.php');
			break;
		case 'articles':
			require(THEME_PATH. 'articles.php');
			break;
	}
}
function bf_setMessage($type, $msg){
	switch ($type) {
		case 'error':
			echo "<div class='error'>$msg</div>";
			break;
		case 'success':
			echo "<div class='success'>$msg</div>";
			break;
		default:
			# code...
			break;
	}
}
