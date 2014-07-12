<h2 class="nav-tab-wrapper">
	<a class="nav-tab <?php if($_GET['tab'] == 'api' or !isset($_GET['tab'])) echo 'nav-tab-active';?>" href="admin.php?page=awo-help&tab=api">Подключение к АвтоОфис</a>
	<a class="nav-tab <?php if($_GET['tab'] == 'settings') echo 'nav-tab-active';?>" href="admin.php?page=awo-help&tab=settings">Настройки плагина</a>
	<a class="nav-tab <?php if($_GET['tab'] == 'order') echo 'nav-tab-active';?>" href="admin.php?page=awo-help&tab=order">Оформление заказа</a>
	<a class="nav-tab <?php if($_GET['tab'] == 'subscribe_form') echo 'nav-tab-active';?>" href="admin.php?page=awo-help&tab=subscribe_form">Подписка на рассылку</a>
</h2>