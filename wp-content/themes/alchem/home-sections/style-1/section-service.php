<?php 
   // section service
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_2_hide',0));
   $content_model   = absint(alchem_option('section_2_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_2_id')));
   $section_color   = esc_attr(alchem_option('section_2_color'));
   $section_title   = wp_kses(alchem_option('section_2_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_2_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_2_content'), $allowedposttags);
   $columns         = absint(alchem_option('section_2_columns',3));
   $col             = $columns>0?12/$columns:4;
   
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-2 alchem-home-style-1';
   if( alchem_option('section_2_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?> 
 <?php if( $section_hide != '1' ):?>
  <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h2 class="section-title"><?php echo $section_title;?></h2>
    <div style="text-align:center;"><?php echo do_shortcode($sub_title);?></div>
    <div style="height: 80px;"></div>
    <?php endif;?>
    <?php
	 $feature_item = '';
	 $feature_str  = '';
	 for( $j=0; $j<6; $j++ ){
	   
	  $feature_icon    =  esc_attr(alchem_option('section_2_feature_icon_'.$j));
	  $feature_icon    =  str_replace('fa-','',$feature_icon );
	  $feature_image   =  esc_attr(alchem_option('section_2_feature_image_'.$j));
	  $feature_title   =  esc_attr(alchem_option('section_2_feature_title_'.$j));
	  $feature_content =  wp_kses(alchem_option('section_2_feature_content_'.$j), $allowedposttags);
	  $link            =  esc_url(alchem_option('section_2_link_'.$j));
	  $target          =  esc_attr(alchem_option('section_2_target_'.$j));
	  if( $feature_icon !='' || $feature_image !='' || $feature_title!='' || $feature_content!='' ):
	  if( $link == "" )
	  $title = $feature_title;
	  else
	  $title = '<a href="'.$link.'" target="'.$target.'">'.$feature_title.'</a>';
	  
	  $icon            = '';
	  if( $feature_image !='' )
	  $icon  = '<img class="feature-box-icon alignnone" width="40" height="40" src="'.$feature_image.'" alt="" />';
	  else
	  $icon  = '<i class="feature-box-icon alignnone fa fa-'.$feature_icon.'" style="font-size:38px;"></i>';
      
	  
	$feature_item .= '<div class=" col-md-'.$col.'" id="">
	<div class="'.$alchem_home_animation.'" data-animationduration="0.9" data-animationtype="fadeIn" data-imageanimation="no">
	'.$icon.'<span style="font-family: \'Cuprum\';font-weight:bold;font-size:18px;">'.$title.'</span><br>
<span>'.do_shortcode($feature_content).'</span><br>
</div></div>';

	  $k = $j+1;
	  if( $k % $columns == 0 ){
	        $feature_str .= '<div class="row">'.$feature_item.'</div>';
	        $feature_item = '';
	   }
	   endif;
	   
	 }
	 if( $feature_item != '' ){
		    $feature_str .= '<div class="row">'.$feature_item.'</div>';
	      
		   }
		
	 echo $feature_str;
	?>
  
 <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
  </div>
</section>
<?php endif;?>