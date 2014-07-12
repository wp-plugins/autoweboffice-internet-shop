<?php

$html_catalog .= '<div align="center"><table style="width: 100%;" border=1 cellpadding="5px;">';

// Для подсчет номера товара
$i = 0;

// Для подсчета товаров в строке
$g = 0;

// Для накопления информации по товарам
$mass_goods = array();


// Цикл по товарам
foreach ($awo_goods as $key => $goods)
{
	$g++;
	
	// Если достигнут лимит товаров для одной страницы
	if($awo_catalog_goods_per_page == $i)
	{
		break;
	}
	
	$mass_goods[$g] = $goods;
	
	// Если накопили данные по трем товарам
	if($g == 3)
	{
		$html_catalog .= '<tr>';
		
		for ($n = 1; $n <= 3; $n++) 
		{
			// Вормируем название товара для печати на экран
			$goods_name = htmlspecialchars(trim($mass_goods[$n]->goods));
			$id_goods = $mass_goods[$n]->id_goods;
			$url_page = $mass_goods[$n]->url_page;
			$image = $mass_goods[$n]->image;
			
			$goods_url = '/?page_id='.get_query_var('page_id').'&paged='.get_query_var('paged').'&id_goods='.$id_goods;
			
			
			$html_catalog .= '<td style="padding:5px; width: 205px;">';
			$html_catalog .= '<div align="center">';
			if(trim($url_page) != '')
			{
				$html_catalog .= '<a href="'.$url_page.'" title="Узнать подробней о '.$goods_name.'">';
			}
			$html_catalog .= '<img style="vertical-align: top; max-height: 170px; max-width: 170px;" src="https://'.$awo_storesId.'.autokassir.ru/images/goods/pics/'.$image.'" alt="'.$goods_name.'" title="'.$goods_name.'">';
			if(trim($url_page) != '')
			{
				$html_catalog .= '</a>';
			}
			$html_catalog .= '</div>';
			$html_catalog .= '</td>';
		}
		
		$html_catalog .= '</tr>';
		$html_catalog .= '<tr>';
		
		for ($n = 1; $n <= 3; $n++) 
		{
			$goods_name = htmlspecialchars(trim($mass_goods[$n]->goods));
			$id_goods = $mass_goods[$n]->id_goods;
			$url_page = $mass_goods[$n]->url_page;
			
			$goods_url = '/?page_id='.get_query_var('page_id').'&paged='.get_query_var('paged').'&id_goods='.$id_goods;

			$html_catalog .= '<td style="padding:5px; width: 205px;">';
			if(trim($url_page) != '')
			{
				$html_catalog .= '<a href="'.$url_page .'" title="Узнать подробней о '.$goods_name.'">';
			}	
			$html_catalog .= '<b>'.$goods_name.'</b>';
			if(trim($url_page) != '')
			{
				$html_catalog .= '</a>';
			}
			$html_catalog .= '</td>';
		}
		
		$html_catalog .= '</tr>';
		$html_catalog .= '<tr>';
		
		// $html_catalog .= '<div>'.substr($goods->brief_description, 0, 120).'</div>';
		
		for ($n = 1; $n <= 3; $n++) 
		{
			$price = $mass_goods[$n]->price;
			$id_goods = $mass_goods[$n]->id_goods;
			
			$html_catalog .= '<td style="padding:5px; width: 205px;">';
			$html_catalog .= '<div style="width: 100%; height: 40px; line-height: 40px; overflow: hidden; display: block; border: 1px dashed #d2d0cb; text-align: center; font-size: 17px; border-radius: 5px; margin-bottom: 15px;}">'.$price.'</div>';
			$html_catalog .= '<div align="center" style="padding:0px 0px 20px 0px;"><input style="width: 182px; padding: 5px;" type="submit" class="awo_add_to_cart" id="'.$id_goods.'" value="'.$awo_catalog_settings_submit_value.'" title="'.$goods_name.' - '.$awo_catalog_settings_submit_value.'"></div>';
			$html_catalog .= '</td>';
		}
			
		
		$mass_goods = array();
		$g = 0;
		
		$html_catalog .= '</tr>';
	}
	
	// Сдвигаем счетчик товаров (один товар опубликовали)
	$i++;

}

$html_catalog .= '</table></div>';
?>