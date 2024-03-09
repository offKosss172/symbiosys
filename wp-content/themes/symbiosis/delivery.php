
<?php
/*
Template Name: delivery
*/
?>

<?php
get_header();?>
 

<div class="dostavka">
    <div class="container">

        <div class="dostavka_inner">
            <div class="dostavka_map wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s"><img src="/wp-content/themes/symbiosis/assets/image/Dostavka/Ukraine_map.png"></div>
            <div class="dostavka_title wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
                Відправки по Україні здійснюємо протягом 1-2 дні.
                Плату за доставку клієнт сплачує на пошті при отримманні замовлення.
            </div>
        </div>
    </div>
</div>
        
        <div class="dostavka_recipe wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".7s">
            <div class="recipe_inner">
                <h6>ОПЛАТА КАРТКОЮ НА САЙТІ</h6>
                <p>При оформленні замовлення клієнт може обрати доставку на будь-яке працююче відділення чи поштомат Нової Пошти. Доставка тарифікується згідно тарифів пошти, термін доставки в середньому 1-3 дні.</p>

                <h6>АДРЕСНА ДОСТАВКА</h6>
                <p>При оформленні замовлення клієнт може обрати адресну доставку (кур’єром Нової Пошти). Доставка тарифікується згідно тарифів пошти, термін доставки в середньому 1-3 дні.</p>

                <h6>ДОСТАВКА У ВІДДІЛЕННЯ (ПОШТОМАТ) НОВОЇ ПОШТИ</h6>
                <p>Сплатити замовлення можна на нашому сайті під час оформлення замовлення за допомогою картки Visa/Master Card через сервіс прийому платежів mono pay (еще есть способы оплаты какие можем реализовать криптовалюта pay pal и тд.)</p>
                
                <h6>WORLD WIDE SHIPPING</h6>
                <p><button id="contactTrigger">зв'язатися з менеджером</button>👈 з приводу оформлення доставки за межі України</p>
                
                <div id="contactPanel" class="contact-panel">
                  <div class="contact-panel-content">
                    <a href="https://t.me/symbiosisua" class="contact-panel-button">Telegram</a>
                    <a href="tel: 38 073 104 50 00" class="contact-panel-button">Тел. Звонок</a>
                  </div>
                </div>
            </div>
        </div>

<script>
document.getElementById('contactTrigger').addEventListener('click', function() {
    var panel = document.getElementById('contactPanel');
    if (panel.style.display === 'none' || panel.style.display === '') {
        panel.style.display = 'block';
    } else {
        panel.style.display = 'none';
    }
});

document.addEventListener('click', function(event) {
    var panel = document.getElementById('contactPanel');
    var isClickInside = panel.contains(event.target) || document.getElementById('contactTrigger').contains(event.target);

    if (!isClickInside && panel.style.display === 'block') {
        panel.style.display = 'none';
    }
});


</script>
<?php
get_footer();
?>