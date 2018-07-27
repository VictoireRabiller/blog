<?php

function getDb (){
	$user = 'root';
	$password = 'antony';
	$db =new PDO(
		'mysql:host=localhost;dbname=blogVr', 
		$user, 
		$password,
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
		);
	$db->exec('SET NAMES UTF8');
	return $db;
}


function getArticles(){
	$db = getDb();
	
	$sql = "SELECT article.id AS articleid, article.created_at, article.update_at, article.title, article.content, article.category_id, author.id, author.firstname, author.lastname
	FROM article 
	JOIN author ON author.id = article.author 
	ORDER BY update_at DESC";

	$statement = $db->prepare($sql);

	$statement->execute();

	$articlesList = $statement->fetchAll(\PDO::FETCH_ASSOC);
	return $articlesList; 

}



function getArticleById($id){
	$db = getDb();
	$sql = "SELECT 
		article.id AS article_id, 
		article.created_at, 
		article.update_at, 
		article.title, 
		article.content, 
		article.category_id, 
		author.id AS authorid, 
		author.firstname, 
		author.lastname
		FROM article 
		JOIN author ON author.id = article.author
        WHERE article.id = ?";
	$statement = $db->prepare($sql);
	$statement->execute([$_GET['articleid']]);
	$article = $statement->fetch(\PDO::FETCH_ASSOC);

	return $article;
}


function saveArticle(array $article){
	//array permet de dire que ce que l'on attend est un tableau
	//fatal error si pas un tableau donc protection
	writeLog('save Article');
	writeLog($article);

	$article['content'] = strip_tags($article['content'], "<p>");

	$db = getDb();

	$sql = "
	INSERT INTO article 
	(id, author, created_at, update_at, title, content, category_id)
	VALUES (NULL, :author, NOW(), NOW(), :title, :content, :category_id)";

	$statement = $db->prepare($sql);

	$statement->execute($article);
}

function getCategoryList(){

	$db = getDb();

	$sql = "SELECT * FROM category ORDER BY name";

	$statement = $db->prepare($sql);

	$statement->execute();

	return $statement->fetchAll(PDO::FETCH_ASSOC);

}


function getAuthorList() {

	$db = getDb();

	$sql = "SELECT * FROM author ORDER BY lastname";

	$statement = $db->prepare($sql);

	$statement->execute();

	return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getComments(){

	$db = getDb();
	
	$sql = "
		SELECT * 
		FROM comment 
		WHERE article_id = ?
	";

	$statement = $db->prepare($sql);

	$statement->execute([$_GET['articleid']]);

	$commentsList = $statement->fetchAll(\PDO::FETCH_ASSOC);
	return $commentsList; 

}


function addComment(){

	$db = getDb();
	
    $sql =
    '
        INSERT INTO
            comment
            (pseudo, content, article_id, created_at)
        VALUES
            (?, ?, ?, NOW())
    ';

	$statement = $db->prepare($sql);

	$statement->execute([$_POST['pseudo'], $_POST['content'], $_POST['articleid']]);
}


function updateArticle(){

	$db = getDb();
	
    $sql =
    '
         UPDATE
                article
            SET
                title = ?,
                content = ?
            WHERE
                id = ?
    ';

	$statement = $db->prepare($sql);

	$statement->execute([$_POST['title'], $_POST['content'], $_POST['articleid']]);
}


  