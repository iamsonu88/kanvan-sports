<?php 
/**
 * The Sidebar for gravida
 *
 * Stores the sidebar area of the template. loaded in other template files with get_sidebar();
 *
 * @package SKT Gravida
 * 
 * @since SKT Gravida 1.0
 */
global $complete;?>
 
  <div id="sidebar">
  <div class="widgets">
    <?php if ( ! dynamic_sidebar( 'sidebar-page' ) ) : ?>
    <div class="widget">
      <div class="widget_wrap">
        <h3 class="widget-title">
          <?php _e( 'Pages', 'sktgravida' ); ?>
        </h3>
        <span class="widget_border"></span>
        <ul>
          <?php wp_list_pages( array( 'title_li' => '' ) ); ?>
        </ul>
      </div>
    </div>
    <?php endif; // end sidebar widget area ?>
  </div>
</div>
 
 
