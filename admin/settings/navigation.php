<h2 class="nav-tab-wrapper">
	<a class="nav-tab <?php if($_GET['tab'] == 'catalog' or !isset($_GET['tab'])) echo 'nav-tab-active';?>" href="admin.php?page=awo-options&tab=catalog">Каталог</a>
	<a class="nav-tab <?php if($_GET['tab'] == 'cart') echo 'nav-tab-active';?>" href="admin.php?page=awo-options&tab=cart">Корзина заказов</a>
	<a class="nav-tab <?php if($_GET['tab'] == 'subscribe_form') echo 'nav-tab-active';?>" href="admin.php?page=awo-options&tab=subscribe_form">Форма подписки</a>
</h2>