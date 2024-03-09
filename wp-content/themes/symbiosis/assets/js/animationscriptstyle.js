
document.addEventListener('DOMContentLoaded', function() {
    var quantityInputs = document.querySelectorAll('.product-qty .quantity input[type="number"]');

    quantityInputs.forEach(function(input) {
        var incrementButton = findIncrementButton(input);

        if (incrementButton) {
            incrementButton.style.position = 'absolute';
            incrementButton.style.left = '20px';
        }
    });

    function findIncrementButton(input) {
        // Находим ближайший родительский элемент с классом 'quantity'
        var quantityContainer = input.closest('.quantity');

        // Находим кнопку увеличения внутри родительского элемента 'quantity'
        var incrementButton = quantityContainer.querySelector('[aria-label="Increase quantity"]');

        return incrementButton;
    }
});








window.onload = function () {
    console.log('Скрипт підключен!');
};



document.addEventListener('DOMContentLoaded', function() {
    function updateCart() {
        var closestForm = document.querySelector('form.woocommerce-cart-form');
        if (closestForm) {
            var updateButton = closestForm.querySelector('button[name="update_cart"]');
            if (updateButton) {
                updateButton.click();
            }
        }
    }

    document.body.addEventListener('change', function(event) {
        if (event.target && event.target.classList.contains('qty')) {
            updateCart();
        }
    });

   
    document.body.addEventListener('removed_from_cart added_to_cart', function() {
        var isCartEmpty = document.querySelectorAll('tr.cart_item').length === 0;
        if (wc_checkout_params.is_cart && isCartEmpty) {
            window.location.href = '/cart-empty/'; 
        }
    });


    if (document.body.classList.contains('woocommerce-cart')) {
        var isCartEmptyOnLoad = document.querySelectorAll('tr.cart_item').length === 0;
        if (isCartEmptyOnLoad) {
            window.location.href = '/cart-empty/'; 
        }
    }
});

















  var modalToggleBtnUnique = document.getElementById('openModalHeaderUnique');

                        var modalWindowUnique = document.getElementById('modalUnique');
                        
                        var spanCloseModalUnique = document.getElementsByClassName('closeUnique')[0];
                        
                        var menuIconImgUnique = document.querySelector('#openModalHeaderUnique img');
                        
                        var menuIconPathUnique = '/wp-content/themes/symbiosis/assets/icons/menu.svg';
                        
                        var crossIconPathUnique = '/wp-content/themes/symbiosis/assets/icons/cross.svg';
                        
                        function toggleModalWindowAndIconsUnique() {
                          var isModalOpenUnique = modalWindowUnique.style.display === 'block';
                        
                          if (isModalOpenUnique) {
                            modalWindowUnique.style.display = 'none';
                            menuIconImgUnique.src = menuIconPathUnique;
                          } else {
                            modalWindowUnique.style.display = 'block';
                            menuIconImgUnique.src = crossIconPathUnique;
                          }
                        }
                        
                        modalToggleBtnUnique.onclick = toggleModalWindowAndIconsUnique;
                        
                       
                        
                        window.onclick = function(event) {
                          if (event.target === modalWindowUnique) {
                            modalWindowUnique.style.display = 'none';
                            menuIconImgUnique.src = menuIconPathUnique;
                          }
                        }
                        
                        


