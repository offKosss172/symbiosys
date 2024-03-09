<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coachify
 */

get_header(); ?>

<div class="page-grid">
	<div id="primary" class="content-area">
		
      
        
    

		
		<!--INTRO-->
<div class="intro wow fadeIn" data-wow-duration=".3s" data-wow-delay=".2s">
    <div class="container">
        <div class="intro_video_container">
            <div class="video-overlay"></div> 
            <video class="intro-video wow fadeIn" data-wow-duration=".3s" data-wow-delay=".2s" autoplay loop muted>
                <source src="/wp-content/themes/symbiosis/assets/video/intro.mp4" type="video/mp4">
                Ваш браузер не поддерживает видео тег.
            </video>
            <div class="intro_text_left wow fadeInLeft" data-wow-delay=".5s">TM est. 2018</div>
            <div class="intro_text_right wow fadeInRight" data-wow-delay="1s">Casual wear</div>
            <div class="intro_text_center wow fadeIn" data-wow-duration="3s" data-wow-delay=".5s"><img src="/wp-content/themes/symbiosis/assets/image/logo_intro.svg"></div>
        </div>
    </div>
</div>
<!--/.INTRO-->


<!--SLIDER-->
<div class="slider">
    <div class="container">

        <div class="slider_col">
            <div class="slider_text_l">
                <span class="brand_name wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">symbiosis</span>
                <span class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">створюємо<br>[одяг], котрий випереджує<br> час та думки світу</span>
                <span class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".7s">український бренд <br class="brnone">одягу для всього світу</span>
            </div>
            <div class="slider_text_r">
                <span class="wow zoomInUp" data-wow-duration=".5s" data-wow-delay=".5s">динаміка молоді</span>
            </div>
        </div>


        <div class="slider_bg_text">
            <div class="slider_text slider_1line" data-text="якість стиль quality">
              <div>
                <span class=""></span>
                <span class=""></span>
              </div>
              <span class=""></span>
            </div>
            <div class="slider_text slider_2line" data-text="комфорт comfort">
              <span class=""></span>
              <span class=""></span>
            </div>
            <div class="slider_text slider_4line" data-text="EST.2018">
              <span class=""></span>
              <span class="cord_3line">
                  <span class="wow flipInY" data-wow-delay=".2s">30° 42' 44.9316'' E</span>
                  <span class="wow flipInY" data-wow-delay=".2s">46° 28' 58.6272'' N</span>
              </span>
            </div>


            <div class="slider_text slider_3line">
              <div class="marquee">
                <span>EST. 2018 Ukraine Odessa EST. 2018</span>
                <span>EST. 2018 Ukraine Odessa EST. 2018</span> 
                <span>EST. 2018 Ukraine Odessa EST. 2018</span> 
                <span>EST. 2018 Ukraine Odessa EST. 2018</span> 
                <span>EST. 2018 Ukraine Odessa EST. 2018</span> 
                <span>EST. 2018 Ukraine Odessa EST. 2018</span> 
                <span>EST. 2018 Ukraine Odessa EST. 2018</span> 
                <span>EST. 2018 Ukraine Odessa EST. 2018</span> 
              </div>
            </div>


        </div>

        <div class="slider_svg">
            <div class="slider_svg_width slider_svg_block">
                <div><img class="wow flipInY" data-wow-delay=".2s" src="/wp-content/themes/symbiosis/assets/icons/stars.svg"></div>
                <div><img class="wow flipInX" data-wow-delay=".1s" src="/wp-content/themes/symbiosis/assets/icons/spiral.svg"></div>
            </div>
            <div class="slider_svg_width slider_cord">
                <div>30° 42' 44.9316'' E 46° 28' 58.6272'' N</div>
                <div>EST. 2018 Ukraine Odessa </div>
            </div>
            <div class="slider_svg_width slider_svg_block">
                <div><img class="wow flipInY" data-wow-delay=".1s" src="/wp-content/themes/symbiosis/assets/icons/stars.svg"></div>
                <div><img class="wow flipInX" data-wow-delay=".2s" src="/wp-content/themes/symbiosis/assets/icons/spiral.svg"></div>
            </div>
        </div>


        <div class="carousel_img">
            <?php
            $slider_query = new WP_Query(array(
                'post_type' => 'product_sliders',
                'posts_per_page' => -1, 
            ));
        
            if ($slider_query->have_posts()) :
                while ($slider_query->have_posts()) : $slider_query->the_post();
                    $image_url = get_the_post_thumbnail_url();
                    $product_link = esc_url(get_the_excerpt());
            ?>
                        <a href="<?php echo $product_link; ?>" class="carouselImage">
                            <img src="<?php echo $image_url; ?>">
                        </a>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

    </div>
</div>
<!--/.SLIDER-->




<?php
$image_paths = array();

$categories = get_terms('product_cat');
foreach ($categories as $category) {
    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
    $image_paths[$category->slug] = wp_get_attachment_image_url($thumbnail_id, 'full');
}
?>


<div class="filter">
    <div class="container">
        <div class="filter_text_block">
            <span class="wow flipInX" data-wow-delay=".1s">Обирай свій</span>
            <span class="wow flipInX" data-wow-delay=".1s">symbiosys</span>
        </div>

        <div class="filter_col wow fadeIn" data-wow-duration=".5s" data-wow-delay=".1s">
            <div class="filter_photo">
                <img src="" id="dynamicImage">
            </div>

           <div class="filter_a">
    <?php
    foreach ($categories as $category) {
        echo '<a href="' . get_term_link($category) . '" data-category="' . $category->slug . '"><div>' . $category->name . '</div></a>';
    }
    ?>
</div>
<script>
    const imagePaths = <?php echo json_encode($image_paths); ?>;
</script>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.filter_a a');
    let interval;
    let isMouseOver = false;
    let lastHoveredCategory = null;

    function applyHoverEffect(category) {
        links.forEach(link => link.classList.remove('hover-effect'));
        const hoveredLink = Array.from(links).find(link => link.dataset.category === category);
        if (hoveredLink) {
            hoveredLink.classList.add('hover-effect');
        }
    }

    function changeImage(category) {
        if (!category) return;
        const dynamicImage = document.getElementById('dynamicImage');
        dynamicImage.style.opacity = '.5';
        const imagePath = imagePaths[category];
        setTimeout(() => {
            dynamicImage.src = imagePath;
            dynamicImage.style.filter = 'hue-rotate(360deg)';
            dynamicImage.onload = () => {
                dynamicImage.style.opacity = '1';
                setTimeout(() => {
                    dynamicImage.style.filter = 'hue-rotate(0deg)';
                }, 150);
            };
        }, 50);
    }

    function startSlider() {
        let currentIndex = 0;
        interval = setInterval(() => {
            if (currentIndex >= links.length) currentIndex = 0;
            const category = links[currentIndex].dataset.category;
            applyHoverEffect(category);
            changeImage(category);
            currentIndex++;
        }, 3000);
    }

    // Устанавливаем изображение первой категории при старте
    document.getElementById('dynamicImage').src = imagePaths[links[0].dataset.category];

    links.forEach(link => {
        link.addEventListener('mouseover', () => {
            isMouseOver = true;
            clearInterval(interval);
            const category = link.dataset.category;
            lastHoveredCategory = category;
            applyHoverEffect(category);
            changeImage(category);
        });
    });

    document.querySelector('.filter_a').addEventListener('mouseover', () => {
        isMouseOver = true;
    });

    document.querySelector('.filter_a').addEventListener('mouseout', () => {
        isMouseOver = false;
        startSlider();
    });

    window.addEventListener('resize', function() {
        if (isMouseOver) {
            clearInterval(interval);
        } else {
            startSlider();
        }
    });

    startSlider();
});

</script>





<!--COLLABORATION-->
<div class="collab wow fadeIn" data-wow-duration=".5s" data-wow-delay=".3s">
    <div class="container">
        <div class="collab_block">
      <video autoplay loop muted playsinline class="collab_video">
        <source src="/wp-content/themes/symbiosis/assets/video//sponsors1.mp4" type="video/mp4">
        Ваш браузер не поддерживает HTML5 видео.
      </video>
            <div class="collab_col">
                <div class="collab_titles_left wow fadeInLeft" data-wow-delay=".3s">колаборація / мерч</div>

                <div class="collab_titles_right wow fadeInRight" data-wow-delay=".3s">партнерство, де досягається симбіоз спільного виробництва продукту, засноване на реалізації бажань клієнта, як компанії.</div>
                <div class="collab_titles_button wow fadeIn" data-wow-delay=".1s"><a class="collab_link" href="#">детальніше</a></div>
                <span class="wow fadeIn" data-wow-delay=".1s">з ким вже працювали</span>
                <div class="collab_inner wow fadeIn" data-wow-delay=".1s">
                    <a ><div class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s"><img src="/wp-content/themes/symbiosis/assets/image/Collab/logo1.png"></div></a>
                    <a ><div class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s"><img src="/wp-content/themes/symbiosis/assets/image/Collab/logo2.png"></div></a>
                    <a ><div class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s"><img src="/wp-content/themes/symbiosis/assets/image/Collab/logo3.png"></div></a>
                    <a ><div class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".4s"><img src="/wp-content/themes/symbiosis/assets/image/Collab/logo4.png"></div></a>
                    <a ><div class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s"><img src="/wp-content/themes/symbiosis/assets/image/Collab/logo5.png"></div></a>
                    <a ><div class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".6s"><img src="/wp-content/themes/symbiosis/assets/image/Collab/logo6.png"></div></a>
                </div>
            </div>

        </div>

    </div>
</div>
<!--/.COLLABORATION-->

<!--RHYTM-->


<div class="rhytm">
    <div class="container">

        <div class="rhytm_col_center rhytm_col_center_block">
            <div class="rhytm_col_top wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s"><div class="rhytm_col_center_title">будь-який сезон, погода та настрій підвладний symbiosys </div></div>
            <div class="rhytm_col_down">
                 <div class="rhytm_col_center_subtitle wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">обирай</div>
                <div class="rhytm_col_center_subtitle wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">свій ритм</div>
            </div>
        </div>

        <div class="rhytm_inner">
            <div class="rhytm_col_left">
                <div class="rhytm_col_left_img wow fadeIn" data-wow-delay=".1s"><img src="/wp-content/themes/symbiosis/assets/image/Rhytm/warm_rhytm.png" alt=""></div>
                <div class="thytm_col_left_title">Теплий ритм</div>
                 <a href="<?php echo esc_url(get_permalink(get_page_by_title('prodtag'))) . '?tag=warm-rhythm'; ?>" class="button-warm-rhythm"></a>
            </div>
            <div class="rhytm_col_center rhytm_col_center_none">
                <div class="rhytm_col_top wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s"><div class="rhytm_col_center_title">будь-який сезон, погода та настрій підвладний symbiosys</div></div>
                <div class="rhytm_col_down">
                     <div class="rhytm_col_center_subtitle wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">обирай</div>
                    <div class="rhytm_col_center_subtitle wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">свій ритм</div>
                </div>
            </div>
            <div class="rhytm_col_right">
                <div class="rhytm_col_right_img wow fadeIn" data-wow-delay=".1s"><img src="/wp-content/themes/symbiosis/assets/image/Rhytm/light_rhytm.png" alt=""></div>
                <div class="thytm_col_right_title">холодний ритм</div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_title('prodtag'))) . '?tag=cold-rhythm'; ?>" class="button-cold-rhythm"></a>
            </div>
        </div>

    </div>
</div>
<script>
    //FILTER CHANGE PHOTO
    
    
<?php
    function get_category_image_paths() {
    $image_paths = array();
    $categories = get_terms('product_cat');

    foreach ($categories as $category) {
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $image_url = wp_get_attachment_image_url($thumbnail_id, 'full');
        $image_paths[$category->slug] = $image_url;
    }

    wp_localize_script('your-script-handle', 'imagePaths', $image_paths);
}
    ?>
    
    
    
    
    
 
//FILTER CHANGE PHOTO

document.addEventListener('DOMContentLoaded', function() {
    const carouselImages = document.querySelectorAll('.carousel_img a img');
    let currentImageIndex = 0;

    function changeImage() {
        carouselImages.forEach(img => img.parentElement.classList.remove('show'));
        
        carouselImages[currentImageIndex].parentElement.classList.add('show');

        currentImageIndex = (currentImageIndex + 1) % carouselImages.length;
    }

    changeImage();

    setInterval(changeImage, 5000);
});




document.addEventListener('DOMContentLoaded', function() {
  function isElementInView(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top < window.innerHeight && 
      rect.bottom >= 0 &&
      rect.left < window.innerWidth && 
      rect.right >= 0
    );
  }

  function typeText(element, text, index) {
    if (index < text.length) {
      element.innerHTML += text.charAt(index);
      index++;
      setTimeout(function() {
        typeText(element, text, index);
      }, 100); // Задержка между символами
    }
  }

  function animateText() {
    const sliders = document.querySelectorAll('.slider_text');

    sliders.forEach(slider => {

      if (isElementInView(slider) && !slider.classList.contains('animated')) {
        const text = slider.getAttribute('data-text');
        const spans = slider.querySelectorAll('span');
        const words = text.split(' ');
        let spanIndex = 0;

        words.forEach((word, index) => {
          if (spanIndex < spans.length) {
            typeText(spans[spanIndex], word, 0);
            spanIndex++;
          }
        });

        slider.classList.add('animated');
      }
    });
  }

  // Событие прокрутки для запуска анимации
  window.addEventListener('scroll', animateText);
});

document.addEventListener('DOMContentLoaded', function() {
  function typeText(element, text, index) {
    if (index < text.length) {
      element.textContent += text.charAt(index);
      index++;
      setTimeout(function() {
        typeText(element, text, index);
      }, 100); 
    }
  }

  const elementsToAnimate = document.querySelectorAll('.slider_cord div');

  elementsToAnimate.forEach((element) => {
    function startTypingWhenInView() {
      if (element.getBoundingClientRect().top < window.innerHeight) {
        window.removeEventListener('scroll', startTypingWhenInView);
        typeText(element, element.textContent, 0);
        element.textContent = '';
      }
    }
    
    window.addEventListener('scroll', startTypingWhenInView);
    
    startTypingWhenInView();
  });
});
</script>
<!--/.RHYTM-->
		
	
        
        <?php
        /**
         * After Posts hook
         * @hooked coachify_navigation - 20
        */
        do_action( 'coachify_after_posts_content' );
        ?>
        
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
