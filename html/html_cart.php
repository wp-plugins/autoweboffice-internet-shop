<?php
// Если существует массив с данными по корзине заказа
if(isset($_SESSION['awo_shopping_cart']))
{			
	$html_form_goods = '';
	
	$html_form_goods .= '<table>';
	
	$html_form_goods .= '<tr><th colspan="2">Товар</th><th>Цена</th><th>Кол-во</th><th>Стоимость</th><th>&nbsp;</th></tr>';
	
	foreach ($_SESSION['awo_shopping_cart'] AS $key => $goods)
	{
	
		// Получаем код товара
		$id_goods = (int)$key;
		
		// Получаем колчество товара
		$quantity = (int)$goods['quantity'];
		
		// Если товаров 0
		if($quantity == 0)
		{
			continue;
		}

		// Высчитываем общее количество товаров
		$cart_quantity += $quantity;
		
		// Получаем данные по товару
		$awo_goods = $this->get_goods($id_goods);
		
		// Стоимость товара
		$goods_sum = $awo_goods->price * $quantity;
		
		$cart_sum += $goods_sum;
		
		// Вормируем название товара для печати на экран
		$goods_name = htmlspecialchars(trim($awo_goods->goods));
		
		$image = $awo_goods->image;
		
		// Если есть данные по изображению товара
		if(trim($image) != '')
		{
			$image_url = 'https://'.$awo_storesId.'.autokassir.ru/images/goods/pics/'.$image;
		}
		else
		{
			$image_url = '/wp-content/plugins/autoweboffice-internet-shop/img/cap/goods.png';
		}
		
		$html_form_goods .= '<tr>';
		$html_form_goods .= '<td style="vertical-align: middle;"><b><img style="vertical-align: top; width: 150px;" style="vertical-align: top;" src="'.$image_url.'" alt="'.$goods_name.'" title="'.$goods_name.'"></td>';
		$html_form_goods .= '<td style="vertical-align: middle;"><b>'.$goods_name.'</b><br /><br />'.$awo_goods->brief_description.'</td>';
		$html_form_goods .= '<td style="vertical-align: middle;">'.number_format($awo_goods->price, 2, '.', ' ').'&nbsp;'.$this->get_currency_str().'</td>';
		$html_form_goods .= '<td style="vertical-align: middle;">'.$quantity.'</td>';
		$html_form_goods .= '<td style="vertical-align: middle;">'.number_format($goods_sum, 2, '.', ' ').'&nbsp;'.$this->get_currency_str().'</td>';
		$html_form_goods .= '<td style="vertical-align: middle;"><a class="awo_delete_from_cart" id="'.$id_goods.'" href="#">X</a></td>';
		$html_form_goods .= '</tr>';
		
		$html_form_goods .= '<input type="hidden" value="'.$quantity.'" name="Goods['.$id_goods.'][quantity]">';
	}
	
	if($cart_quantity > 0)
	{
		$html_form_goods .= '<tr><td colspan="3"></td><td><b>Всего к оплате:</b></td><td><b>'.number_format($cart_sum, 2, '.', ' ').'&nbsp;'.$this->get_currency_str().'</b></td><td></td></tr>';
	}
	else
	{
		$html_form_goods .= '<tr><td colspan="6">Корзина заказов пуста…</td></tr>';
	}
	
					
	$html_form_goods .= '</table>';
}	


// Для передачи данных по товарам в АвтоОфис
$cart_info_shot = '';

$cart_info_shot .= '<div style="background: url(\''.$this->plugin_url.'img/ico/ord.png\') 0 2px no-repeat;">
<h1 style="font-size: 1.125em; line-height: 1em; padding-left: 27px;">Состав заказа:</h1></div>';

// Если в корзине есть товары
if($cart_quantity > 0)
{	
	
		
	// Если в сессии хранятся данные по UTM-меткам
	if(isset($_SESSION['awo_utm']))
	{
		// Получаем данные по UTM-меткам
		$utm = $_SESSION['awo_utm'];
	
		// Составляем форму для отправки запроса в АвтоОфис
		$cart_info_shot .= '<form class="awo_checkout" action="https://'.$awo_storesId.'.autokassir.ru/?r=ordering/cart/s1&clean=true&utm_source='.$utm['utm_source']
																																   .'&utm_campaign='.$utm['utm_campaign']
																																   .'&utm_term='.$utm['utm_term']
																																   .'&utm_content='.$utm['utm_content']
																																   .'&utm_medium='.$utm['utm_medium'].'" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8">';
	}
	else
	{
		// Составляем форму для отправки запроса в АвтоОфис
		$cart_info_shot .= '<form class="awo_checkout" action="https://'.$awo_storesId.'.autokassir.ru/?r=ordering/cart/s1&clean=true" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8">';
	}
	
	// Добавляем данные по товарам
	$cart_info_shot .= $html_form_goods;
	
	// Получаем массив с настройками отображения Корзины заказа
	$cart_settings = unserialize($awo_settings->cart_settings);
	
	$awo_cart_settings_submit_value = $cart_settings['cart_settings_submit_value']; 
	
	// Надпись на кнопке не должна быть пустой
	if(trim($awo_cart_settings_submit_value) == '')
	{
		$awo_cart_settings_submit_value = 'Оформить заказ';
	}
	
	$cart_info_shot .= '<input style="margin:10px 0px 20px 0px;" type="submit" value="'.$awo_cart_settings_submit_value.'" > <input style="float: right; margin:10px 0px 20px 0px;" type="submit" class="awo_show_message_hide" value="Продолжить покупки">';
	
	$cart_info_shot .= '</form>';
}
else
{
	// Добавляем данные по товарам
	$cart_info_shot .= $html_form_goods;
	
	$cart_info_shot .= '<input style="margin:10px 0px 20px 0px;" type="submit" class="awo_show_message_hide" value="Продолжить покупки">';
}
			
$cart_info_shot .= '</div>';
?>