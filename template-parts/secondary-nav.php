<?php 
if (is_page() && $post->post_parent){ 
    // user is viewing a child page, so go up to parent, then get list of child pages from parent  
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
    // this shows the parent title as the dropdown menu title for mobile:
    // $parent_post_id 	= $post->post_parent;
    // $parent_post		= get_post($parent_post_id);
    // $parent_post_title 	= $parent_post->post_title;
    // this shows the current page title as the dropdown menu title for mobile:
    $parent_post_title = get_the_title();
  }else{
    // user is viewing parent page, so get list of child pages from current page
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
    $parent_post_title = get_the_title();
  }
  
  if ($childpages){
      $child_nav 			= '<nav class="secondary-menu"><div class="content-wrapper"><ul class="reveal-fast">' . $childpages . '</ul></div></nav>';
      echo $child_nav;
  }
?>