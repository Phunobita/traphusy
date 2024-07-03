 <div class="featured-icon-cpt fx-item">

     <?php if ($icon = get_sub_field('icon')) : ?>

         <!-- Icon -->
         <div class="icon-box">
             <svg class="icon icon-<?php echo $icon; ?>">
                 <use xlink:href="#icon-<?php echo $icon; ?>"></use>
             </svg>
         </div>

     <?php endif; ?>

     <?php if ($title = get_sub_field('title')) : ?>

         <!-- Title -->
         <p class="title bold m-none"> <?php echo esc_html($title); ?></p>

     <?php endif; ?>

 </div>