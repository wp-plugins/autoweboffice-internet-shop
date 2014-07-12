jQuery(document).ready(function($) {

		// Наполнение корзины товарами
		$(".awo_add_to_cart").click(function() {
			
			var data = {
				action: 'ajax_add_goods_to_order',
				id_goods: $(this).attr("id")
			};

			jQuery.post('wp-admin/admin-ajax.php', data, function(response) {
				$(".awo_cart").html(response);
				
				var data = {
					action: 'ajax_show_message',
					id_message: $(this).attr("id")
				};
				
				// Получение текста сообщения
				jQuery.post('wp-admin/admin-ajax.php', data, function(response) {
					$(".awo_show_message").html(response);
				});
				
				// Вывод окна сообщения
				$(".awo_show_message").show();
			});
			
				
		});
		
		// Удаление товара из корзины
		$("body").on('click', '.awo_delete_from_cart', function() {
		
			var data = {
				action: 'ajax_delete_from_cart',
				id_goods: $(this).attr("id")
			};
			
			// Получение текста сообщения
			jQuery.post('wp-admin/admin-ajax.php', data, function(response) {
				$(".awo_show_message").html(response);
			});
			
			var data = {
				action: 'ajax_add_goods_to_order'
			};

			jQuery.post('wp-admin/admin-ajax.php', data, function(response) {
				$(".awo_cart").html(response);
			});
			
			return false;
		});
		
		// Наполнение корзины товарами
		$("body").on('click', '.awo_show_cart', function() {
				
			var data = {
				action: 'ajax_show_message'
			};
			
			// Получение текста сообщения
			jQuery.post('wp-admin/admin-ajax.php', data, function(response) {
				$(".awo_show_cart_message").html(response);
			});
			
			// Вывод окна сообщения
			$(".awo_show_cart_message").show();	

			return false;
		});
		
		// Скрываем окно сообщений
		$("body").on('click', '.awo_show_message_hide', function() {

			$(".awo_show_message").hide();
			$(".awo_show_cart_message").hide();
			
			return false;
		});
		
		
		// Чистим корзину заказов
		$("body").on('submit', '.awo_checkout', function() {
			
			var data = {
				action: 'ajax_empty_cart'
			};
			
			jQuery.ajax({
				url: 'wp-admin/admin-ajax.php',
				type: 'POST',
				data: data,
				// we set the context to the form so that inside
				// the success callback 'this' points to the form
				context: this,
				success: function(result) {
					this.submit();
				}
			});
			
			return false;
		});
});
