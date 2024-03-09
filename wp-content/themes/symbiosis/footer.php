   <footer>
        <div class="container">
    
            <div class="footer_inner">
                <div class="footer_links">
                    <div><a href="/clothing" class="wow fadeInLeft" data-wow-delay=".1s">Одяг</a></div>
                    <div><a href="/collaboration" class="wow fadeInLeft" data-wow-delay=".2s">Колаборація</a></div>
                    <div><a href="/seasons" class="wow fadeInLeft" data-wow-delay=".3s">Сезони</a></div>
                    <div><a href="/about-us" class="wow fadeInLeft" data-wow-delay=".4s">Про нас</a></div>
                    <div><a href="/contacts" class="wow fadeInLeft" data-wow-delay=".5s">Контакти</a></div>
                </div>
                <div class="footer_info">
                    <div class="wow flipInX" data-wow-delay=".1s"><img src="/wp-content/themes/symbiosis/assets/image/logo_footer.png" alt=""></div>
                    <div class="footer_number wow fadeInUp" data-wow-delay=".2s"><a  href="tel: 38 073 104 50 00">+38 073 104 50 00</a></div>
                    <div class="footer_info_links">
                        <a href="#" class="wow fadeInUp" data-wow-delay=".3s">Оплата</a>
                        <a href="/privacy-policy" class="wow fadeInUp" data-wow-delay=".4s">Політика конфінденційності</a>
                        <a href="/delivery" class="wow fadeInUp" data-wow-delay=".5s">Доставка</a>
                    </div>
                </div>
                <div class="footer_social">
                    <div class="wow fadeInUp" data-wow-delay=".4s"><a href="https://t.me/symbiosisua"><img src="/wp-content/themes/symbiosis/assets/image/Footer/telegram.png"></a></div>
                    <div class="wow fadeInUp" data-wow-delay=".3s"><a href="https://www.instagram.com/symbiosis.ua/" target="_blank"><img src="/wp-content/themes/symbiosis/assets/image/Footer/instagram.png"></a></div>
                    <div class="wow fadeInUp" data-wow-delay=".2s"><a href="https://www.youtube.com/@SYMBIOSISUA" target="_blank"><img src="/wp-content/themes/symbiosis/assets/image/Footer/youtube.png"></a></div>
                    <div class="wow fadeInUp" data-wow-delay=".1s"><a href="https://www.tiktok.com/@symbiosis.ua" target="_blank" ><img src="/wp-content/themes/symbiosis/assets/image/Footer/ticktock.png"></a></div>
                </div>
            </div>
    
        </div>

    </footer>
    

    
    <script>
        
            document.addEventListener("DOMContentLoaded", function() {
            const moveFooterLinks = () => {
                const footerLinks = document.querySelector('.footer_links');
                const footerNumber = document.querySelector('.footer_number');
                const footerInner = document.querySelector('.footer_inner');
        
                if (!footerLinks || !footerNumber || !footerInner) return;
        
                if (window.innerWidth < 756) {
                    footerNumber.parentNode.insertBefore(footerLinks, footerNumber.nextSibling);
                } else {
                    footerInner.insertBefore(footerLinks, footerInner.firstChild);
                }
            };
        
            moveFooterLinks();
        
            window.addEventListener('resize', moveFooterLinks);
        });

            document.addEventListener('DOMContentLoaded', function() {
    var currencySymbolElements = document.querySelectorAll('.woocommerce-Price-currencySymbol');

    currencySymbolElements.forEach(function(element) {
       
        element.innerHTML = 'UAH';

    });
});
    </script>
  
 <?php
    wp_footer(); ?>

</body>
</html>
