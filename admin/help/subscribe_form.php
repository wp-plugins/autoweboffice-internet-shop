<div class="wrap" id="center-panel">
<div id="icon-options-general" class="icon32"><br></div>

<?php 
// Выводим меню навигации (вкладки)
include_once('navigation.php');
?>

<div>
 
<p>Для размещения формы подписки на email-рассылку вашего интернет магазина на страницах вашего сайта, вам необходимо использовать шоткод: [awo_subscribe_form]</p>
<p>Пример:</p>
<p>В левом вертикальном меню выберите пункт «Внешний вид->Виджеты».</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/subscribe_form/step-1.png" style="border:1px solid black;" /></p>
<p>Перенесите виджет, отвечающий за вывод произвольного HTML-текста, в боковую колонку, отвечающую за вывод бокового меню, на вашем сайте.</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/subscribe_form/step-2.png" style="border:1px solid black;" /></p>
<p>В настройках виджета укажите название, разметите шоткод [awo_subscribe_form], и нажмите кнопку «Сохранить».</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/subscribe_form/step-3.png" style="border:1px solid black;" /></p>
<p>Форма подписки появится на страницах вашего сайта.</p>
<p><img src="<?php echo $this->plugin_url ;?>img/help/subscribe_form/step-4.png" style="border:1px solid black;" /></p>
<p>Дополнительная настройка</p>
<p>Шоткод [awo_subscribe_form] может принимать дополнительные параметры</p>
<ul>
	<li><b>id_newsletter *</b> – код рассылки (ОБЯЗАТЕЛЬНЫЙ параметр)</li>
	<li><b>id_advertising_channel_page</b> – код канала рекламы для данной формы подписки</li>
	<li><b>last_name</b> – запрашивать или нет поле Фамилия</li>
	<li><b>name</b> – запрашивать или нет поле Имя</li>
	<li><b>middle_name</b> – запрашивать или нет поле Отчество</li>
	<li><b>phone_numbe</b> – запрашивать или нет поле Телефон</li>
	<li><b>policy_of_confidentiality</b> – текст «Политика конфиденциальности»</li>
	<li><b>subscribe_form_submit_value</b> – надпись на кнопке «Подписаться!»</li>
</ul>
<p>Для передачи, добавьте необходимые вам параметры в тело шоткода:</p>
<ul>
	<li>[awo_subscribe_form id_newsletter=“1” id_advertising_channel_page=“27” last_name=“0” name=“1” middle_name=“0” phone_numbe=“0” policy_of_confidentiality=“100% конфиденциальность!” catalog_settings_submit_value=“Подписаться!”]</li>
</ul>

</div>
</div>