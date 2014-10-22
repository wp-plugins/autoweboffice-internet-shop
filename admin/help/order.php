<div class="wrap" id="center-panel">
<div id="icon-options-general" class="icon32"><br></div>

<?php 
// Выводим меню навигации (вкладки)
include_once('navigation.php');
?>
<div>
<h3>Корзина заказов</h3>
<p>Для размещения корзины заказов на страницах вашего сайта, вам необходимо использовать шоткод: [awo_cart_info_shot]</p>
<p>Пример:</p>
<p>В левом вертикальном меню выберите пункт «Внешний вид->Виджеты».</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/order/step-1.png" style="border:1px solid black;" /></p>
<p>Перенесите виджет, отвечающий за вывод произвольного HTML-текста, в боковую колонку, отвечающую за вывод бокового меню, на вашем сайте.</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/order/step-2.png" style="border:1px solid black;" /></p>
<p>В настройках виджета укажите название, разметите шоткод [awo_cart_info_shot], и нажмите кнопку «Сохранить».</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/order/step-3.png" style="border:1px solid black;" /></p>
<p>Корзина заказов появится на страницах вашего сайта.</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/order/step-4.png" style="border:1px solid black;" /></p>

<h3>Каталог товаров</h3>
<p>Для размещения каталога товаров на страницах вашего сайта, вам необходимо использовать шоткод: [awo_catalog_of_goods]</p>
<p>Пример:</p>
<p>В левом вертикальном меню выберите пункт «Страницы->Добавить новую».</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/order/step-5.png" style="border:1px solid black;" /></p>
<p>Укажите название странице, разместите шоткод [awo_catalog_of_goods], и нажмите на кнопку «Опубликовать»</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/order/step-6.png" style="border:1px solid black;" /></p>
<p>Каталог с товарами появится на страницах вашего сайта</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/order/step-7.png" style="border:1px solid black;" /></p>
<p>Дополнительная настройка</p>
<p>Шоткод [awo_catalog_of_goods] может принимать дополнительные параметры:</p>
<ul>
	<li><b>catalog_goods_per_page</b>  – количество товаров выводимых на одной странице каталога</li>
	<li><b>catalog_show_search</b> – выводить или нет поле поиска по товарам (1 - выводить, 0 - скрыть)</li>
	<li><b>catalog_goods_type</b> – можно указать тип каталога (default - все товары, new - новинки, hit - хиты продаж, special - специальные предложения)</li>
	<li><b>catalog_settings_submit_value</b> – надпись на кнопке «Добавить в корзину»</li>	
</ul>
<p>Для передачи, добавьте необходимые вам параметры в тело шоткода:</p>
<ul>
	<li>[awo_catalog_of_goods catalog_goods_per_page=“12” catalog_settings_submit_value=“Добавить в корзину”]</li>
</ul>

<h3>Кнопки «Добавить в корзину» и «Заказать прямо сейчас»</h3>
<p>Для размещения кнопок на заказ товара на страницах с подробным описанием ваших товаров, вам необходимо использовать шоткоды:</p>
<ul>
	<li><b>[awo_link_to_order]</b> – кнопка «Добавить в корзину»</li>
	<li><b>[awo_link_to_single_order]</b> – кнопка «Заказать прямо сейчас»</li>
</ul>
<p>Для получения шокодов кнопок для каждого из товаров, вам необходимо перейти в раздел «Магазин» и переключится на вкладку «Товары»</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/order/step-8.png" style="border:1px solid black;" /></p>
<p>Дополнительная настройка</p>
<p>Шоткоды [awo_link_to_order] и [awo_link_to_single_order] могут принимать дополнительные параметры:</p>
<ul>
	<li><b>id_goods *</b> – код товара (ОБЯЗАТЕЛЬНЫЙ параметр)</li>
	<li><b>add_to_cart_submit_value</b> – надпись на кнопке «Добавить в корзину»</li>
	<li><b>style</b>  – настройки css-стилей</li>
</ul>
<p>Для передачи, добавьте необходимые вам параметры в тело шоткода:</p>
<ul>
	<li>[awo_link_to_order id_goods=“1” add_to_cart_submit_value=“Добавить в корзину” style=“”]</li>
	<li>[awo_link_to_single_order =“1” add_to_cart_submit_value=“Заказать прямо сейчас” style=“”]</li>
</ul>

</div>
</div>
