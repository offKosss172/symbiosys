<?php
/*
Template Name: cart-empty
*/
?>
<?php
get_header();?>

<div class="container">
    
    
    
    <div class="basket">
    <div class="container">
        <div class="basket_tr wow fadeIn" data-wow-delay=".1s">
            <span class="item">Товар</span>
            <span class="description">Опис</span>
            <span class="color">Колір</span>
            <span class="price">Ціна</span>
            <span class="size">Розмір</span>
            <span class="quantity">Кількість</span>
        </div>
</div></div>

<div class="container">
<div class="basket_empty">
<div class="basket_empty_inner"><div class="basket_empty_text wow fadeInUp" data-wow-delay=".3s">отакої, кошик порожній!<br>добавте стилю!</div>
<a href="/clothing" class="basket_confirm_btn wow fadeInUp" data-wow-delay=".6s">оформити замовлення</a></div>
</div>
</div>

<?php
get_footer();
?>