<?php

//Подключение элементов html, head, стилей и заголовков html-документа
include_once "page_content/header.php";
include_once "page_content/navbar.php";

?>

<section>
	<h1>Список товаров:</h1>
	<div id="products_wrapper">
		<?php productsPrint($connect); ?>
	</div>
</section>

<?php

//Подключение футера документа
include_once "page_content/footer.php";

?>