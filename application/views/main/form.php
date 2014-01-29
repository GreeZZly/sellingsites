<div class="block_bg" id="orderform_bg">
	<div class="container" id="orderform"><a name="order"></a>
		<div class="row block_title_red">
			Хотите продающий сайт? Оформите заявку прямо сейчас!
		</div>
		<div class="row">
			<div class="span6">
				<?php echo validation_errors(); ?>
				<form id="order_form" action="index.php/main/order" method="POST">
				  <fieldset>
				    <input type="text" class="input-xlarge" name = "name" placeholder="Ваше имя…">
				    <input type="text" class="input-xlarge" name = "email" placeholder="Ваш email адрес…">
				    <input type="text" class="input-xlarge" name = "phone" placeholder="Ваш номер телефона…">
				    <input type="text" class="input-xlarge" name = "company" placeholder="Название вашей компании…">
				    <button  class="mybtn btn-large" name="submit"  id="form_btn">Заказать интернет-магазин</button>
				  </fieldset>
				</form>


			</div>
			<div class="span6" id="orderform_text">
				Для того, чтобы заказать создание сайта под заказвы можете заполнить эту форму или просто позвоните нам. После того, как вы оставите заявку, наш менеджер свяжется с вами для получения информации  и расчета сметы по созданию вашего сайта.
			</div>
			
		</div>
	</div>
</div>