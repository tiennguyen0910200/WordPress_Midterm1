<?php
/**all file loader*/
require get_template_directory() . '/inc/ample-themes/core-customizer/reuse/core-funtions.php';
require get_template_directory() . '/inc/ample-themes/core-customizer/default.php';
require get_template_directory() . '/inc/ample-themes/core-customizer/reuse/sanitization.php';

require get_template_directory() . '/inc/ample-themes/core-customizer/reuse/global-function.php';

require get_template_directory() . '/inc/ample-themes/core-customizer/theme-option-function.php';
require get_template_directory() . '/inc/ample-themes/layout-design/layout-functions.php';
require get_template_directory() . '/inc/ample-themes/theme-options-customizer/theme-options-functions.php';

require get_template_directory() . '/library/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/inc/ample-themes/metabox/metabox-page-post-sidebar.php';
require get_template_directory() . '/inc/hook/dynamic-style-css.php';


/*widgets load*/

require get_template_directory() . '/inc/ample-themes/widgets/layout1.php';
require get_template_directory() . '/inc/ample-themes/widgets/layout3.php';
require get_template_directory() . '/inc/ample-themes/widgets/layout4.php';
require get_template_directory() . '/inc/ample-themes/widgets/layout2.php';


require get_template_directory() . '/inc/ample-themes/widgets/social-widget.php';
require get_template_directory() . '/inc/ample-themes/widgets/recent-post.php';
require get_template_directory() . '/inc/ample-themes/widgets/adverstisement-widget.php';
require get_template_directory() . '/inc/ample-themes/widgets/ample-author-widget.php';



//hook for all file section
require get_template_directory() . '/inc/ample-themes/hooks-functions.php';





/*theme activation plugins*/
require get_template_directory() . '/library/TGM/class-tgm-plugin-activation.php';
require get_template_directory() . '/library/TGM/plugin-slug.php';

//admin notice loader
if ( is_admin() ) {
    require get_template_directory() . '/inc/admin-notice/class-notice-handler.php';
}