<?php

// Если в сессии хранятся данные по UTM-меткам
if(isset($_SESSION['awo_utm']))
{
	// Получаем данные по UTM-меткам
	$utm = $_SESSION['awo_utm'];
	
	$html_subscribe_form .= '<form action="https://'.$awo_storesId.'.autoweboffice.ru/?r=personal/newsletter/subscriptions/add&amp;id='.$awo_id_stores.'&amp;lg=ru&utm_source='.$utm['utm_source']
																																					.'&utm_campaign='.$utm['utm_campaign']
																																					.'&utm_term='.$utm['utm_term']
																																					.'&utm_content='.$utm['utm_content']
																																					.'&utm_medium='.$utm['utm_medium'].'\'" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8">';

}
else
{
	$html_subscribe_form .= '<form action="https://'.$awo_storesId.'.autoweboffice.ru/?r=personal/newsletter/subscriptions/add&amp;id='.$awo_id_stores.'&amp;lg=ru" method="post" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8">';
}

$html_subscribe_form .= '<input type="hidden" value="'.$awo_id_newsletter.'" name="Contact[id_newsletter]">';
$html_subscribe_form .= '<input type="hidden" value="'.$awo_id_advertising_channel_page.'" name="Contact[id_advertising_channel_page]">';

if($last_name)
{
	$html_subscribe_form .= ' 
	<div>
		<label>'.__( 'surname', 'autoweboffice').' <span class="required">*</span></label>
		<br />			
		<input class="widefat" maxlength="255" name="Contact[last_name]" id="last_name" type="text">     	   
	</div>';
}

if($name)
{
	$html_subscribe_form .= '
	<div>
		<label>'.__( 'name', 'autoweboffice').' <span class="required">*</span></label>
		<br />   	
		<input maxlength="255" name="Contact[name]" type="text">     	  
	</div>';
}

if($middle_name)
{
	$html_subscribe_form .= '
	<div>
		<label>'.__( 'lastname', 'autoweboffice').' <span class="required">*</span></label>
		<br />   	
		<input maxlength="255" name="Contact[middle_name]" type="text">     	   
	</div>';
}

if($email)
{
	$html_subscribe_form .= '<div>
		<label>'.__( 'email', 'autoweboffice' ).' <span class="required">*</span></label>
		<br />   	
		<input maxlength="255" name="Contact[email]" type="text">     	    
	</div>';
}

if($phone_number)
{
	$html_subscribe_form .= '<div>
		<label>'.__( 'phone', 'autoweboffice' ).' <span class="required">*</span></label>
		<div style="font-size: 90%;"><i>'.__( 'phone_error', 'autoweboffice' ).'</i></div>  	
		<input maxlength="255" name="Contact[phone_number]" type="text">     	 
	</div>';
}

$html_subscribe_form .= '<div>'.__( 'confident', 'autoweboffice' ).'</div>';

$html_subscribe_form .= '<div>
	<input type="submit" value="'.__( 'submit', 'autoweboffice' ).'">
</div>';

$html_subscribe_form .= '</form>';
?>
