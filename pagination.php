<?php

define("DB_HOST", "localhost");
define("DB_NAME", "pagination");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

try {
  $pdo = new PDO(
    "mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=". DB_CHARSET,
    DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

// Number of pages
define("PER_PAGE", "10"); // Entries per page
$stmt = $pdo->prepare("SELECT CEILING(COUNT(*) / ".PER_PAGE.") `pages` FROM `users`");
$stmt->execute();
$pageTotal = $stmt->fetchColumn();

$pageNow = isset($_GET["page"]) ? $_GET["page"] : 1 ;
$limX = ($pageNow - 1) * PER_PAGE;
$limY = PER_PAGE;

// SQL Fetch
$stmt = $pdo->prepare("SELECT * FROM `users` ORDER BY `id` LIMIT $limX, $limY");
$stmt->execute();
$users = $stmt->fetchAll();

?>
