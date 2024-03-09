
<?php
/*
Template Name: seasons
*/
?>

<?php
get_header();?>

<!--RHYTM-->
<div class="rhytm_page_margin">
    <div class="container">

        <div class="rhytm_photo_page rhytm_page">
            <div class="rhytm_col_center">
                <div class="rhytm_col_top wow fadeInUp rhytm_fline_page" data-wow-duration=".5s" data-wow-delay=".1s"><div class="rhytm_col_center_title">будь-який сезон, погода та настрій підвладний symbiosys </div></div>
                <div class="rhytm_col_down">
                     <div class="rhytm_col_center_subtitle wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">обирай</div>
                    <div class="rhytm_col_center_subtitle wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">свій ритм</div>
                </div>
            </div>
        </div>

        <div class="rhytm_photo rhytm_photo_page">
            <div class="left_rhytm_photo">
                <a href="<?php echo esc_url(get_permalink(get_page_by_title('prodtag'))) . '?tag=warm-rhythm'; ?>"><div><img src=/wp-content/themes/symbiosis/assets/image/Rhytm/warm_rhytm_big.png"></div>
                <div class="rhytm_photo_text">Теплий ритм</div></a>
            </div>
            <div class="right_rhytm_photo">
                <a href="<?php echo esc_url(get_permalink(get_page_by_title('prodtag'))) . '?tag=cold-rhythm'; ?>"><div><img src="/wp-content/themes/symbiosis/assets/image/Rhytm/light_rhytm_big.png"></div>
                <div class="rhytm_photo_text">холодний ритм</div></a>
            </div>
        </div>

    </div>
</div>
<!--/.RHYTM-->
<script>
document.addEventListener("DOMContentLoaded", function() {
    var rhytmPhotoPage = document.querySelector('.rhytm_photo_page');
    var leftRhytmPhoto = document.querySelector('.left_rhytm_photo');
    var originalParent = rhytmPhotoPage.parentNode;
    var originalNextSibling = rhytmPhotoPage.nextSibling;

    function moveRhytmBlock() {
        if (window.innerWidth < 756) {
            if (!rhytmPhotoPage.classList.contains('moved')) {
                leftRhytmPhoto.after(rhytmPhotoPage);
                rhytmPhotoPage.style.display = 'block';
                rhytmPhotoPage.classList.add('moved');
            }
        } else {
            if (rhytmPhotoPage.classList.contains('moved')) {
                if (originalNextSibling) {
                    originalParent.insertBefore(rhytmPhotoPage, originalNextSibling);
                } else {
                    originalParent.appendChild(rhytmPhotoPage);
                }
                rhytmPhotoPage.style.display = ''; // Убираем inline стиль, чтобы CSS снова контролировал отображение
                rhytmPhotoPage.classList.remove('moved');
            }
        }
    }

    window.addEventListener('resize', moveRhytmBlock);
    moveRhytmBlock(); // Вызываем функцию при загрузке страницы
});

</script>

<?php
get_footer(); // подключение футера
?>
