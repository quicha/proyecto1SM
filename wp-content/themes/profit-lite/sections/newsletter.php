<?php/* * Newsletter section */$mp_profit_newsletter_bg = esc_url(get_theme_mod('mp_profit_newsletter_bg'));?><section id="newsletter" class="newsletter-section transparent-section <?php if (get_theme_mod('mp_profit_newsletter_bg', false) === false): echo "section-default-bg";endif;?>"  <?php if (!empty($mp_profit_newsletter_bg)): echo "style='background-image: url(\"" . $mp_profit_newsletter_bg . "\")'";         endif; ?>>       <div class="section-bg">          <div class="container">            <div class="section-content">                <?php                $mp_profit_newsletter_title = esc_html( get_theme_mod('mp_profit_newsletter_title') );                $mp_profit_newsletter_subtitle = esc_html( get_theme_mod('mp_profit_newsletter_subtitle') );                if (get_theme_mod('mp_profit_newsletter_title', false) === false) :                    ?>                     <h2 class="section-title"><?php _e('Subscribe for news and deals', 'profit-lite'); ?></h2>                    <?php                else:                    if (!empty($mp_profit_newsletter_title)):                        ?>                        <h2 class="section-title"><?php echo $mp_profit_newsletter_title; ?></h2>                        <?php                    endif;                endif;                if (get_theme_mod('mp_profit_newsletter_subtitle', false) === false) :                    ?>                     <div class="section-subtitle"><?php _e('Integrates with MailChimp service', 'profit-lite'); ?></div>                    <?php                else:                    if (!empty($mp_profit_newsletter_subtitle)):                        ?>                        <div class="section-subtitle"><?php echo $mp_profit_newsletter_subtitle; ?></div>                        <?php                    endif;                endif;                ?>                <?php                /*                 * mp_profit_before_sidebar_newsletter hook                 *                 * @hooked mp_profit_before_sidebar_newsletter - 10                  */                do_action('mp_profit_before_sidebar_newsletter');                ?>                <?php                if (is_active_sidebar('sidebar-newsletter')) :                    dynamic_sidebar('sidebar-newsletter');                else:                    ?>                    <form method="POST" action="<?php echo get_template_directory_uri(); ?>" class="default-form">                        <div class="form-group">                            <input required="required" type="email" name="email" placeholder="<?php _e('Your E-mail:', 'profit-lite'); ?>" >                            <button class="button btn-size-middle" type="submit"><?php _e('Submit', 'profit-lite'); ?></button>                        </div>                    </form>                <?php endif;                ?>                <?php                /*                 * mp_profit_after_sidebar_newsletter hook                 *                 * @hooked mp_profit_after_sidebar_newsletter - 10                  */                do_action('mp_profit_after_sidebar_newsletter');                ?>            </div>        </div>    </div></section><?php