

<h3>Категории</h3>
<?php if (isset($content['categories'])) {
	echo $content['categories'];
} else {
	echo 'Страница не загружена';
}
?>

<h3>Товары</h3>
<?php if (isset($content['products'])) {
	echo $content['products'];
} else {
	echo 'Страница не загружена';
}

?>

