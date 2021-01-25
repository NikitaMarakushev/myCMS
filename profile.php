<?php
//Подключение элементов html, head, стилей и заголовков html-документа
include_once "page_content/header.php";
include_once "page_content/navbar.php";
?>

<section>
	<h1>Профиль пользователя</h1>
	<div id="profile_wrapper">
		<div id="profile_content">
			<p class="profile_content_p"><b>Логин:</b> <?php echo $_SESSION['user_data']['user_login']; ?></p>
			<p class="profile_content_p"><b>Баланс:</b> <?php echo checkBalance($connect); ?></p>
			<p class="profile_content_p"><b>Дата регистрации:</b> <?php echo $_SESSION['user_data']['user_data_registration']; ?></p>
		</div>
		<div>
			<h2>Список приобретенных товаров:</h2>
			<?php productsList($connect); ?>
		</div>
	</div>
</section>

<?php
//Подключение футера документа
include_once "page_content/footer.php";
?>