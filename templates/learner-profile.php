<?php
/**
 * The Template for displaying course archives, including the course page template.
 *
 * Override this template by copying it to yourtheme/sensei/archive-course.php
 *
 * @author 		WooThemes
 * @package 	Sensei/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

/**
 * sensei_before_main_content hook
 *
 * @hooked sensei_output_content_wrapper - 10 (outputs opening divs for the content)
 */
do_action('sensei_before_main_content');

?>

<?php
/**
 * This hook fire inside learner-profile.php before the content
 *
 * @since 1.9.0
 *
 * @hooked WooThemes_Sensei_Learner_Profiles::deprecate_sensei_learner_profile_content_hook - 10
 * @hooked WooThemes_Sensei_Learner_Profiles::sensei_complete_course_action - 20
 */
do_action( 'sensei_learner_profile_content_before' );
?>

<article class="post">

    <section id="learner-info" class="learner-info entry fix">

        <?php
        /**
         * This hook fire inside learner-profile.php inside directly before the content
         *
         * @since 1.9.0
         *
         * @hooked WooThemes_Sensei_Learner_Profiles::sensei_complete_course_action_hook-10
         */
        do_action( 'sensei_learner_profile_inside_content_before' );
        ?>

        <?php  $learner_user = get_user_by( 'slug', get_query_var('learner_profile') );  // get requested learner object ?>

        <?php if(  is_a( $learner_user, 'WP_User' ) ){ ?>

            <?php

            do_action( 'sensei_learner_profile_info', $learner_user );

            Sensei()->course->load_user_courses_content( $learner_user );

            ?>

        <?php }else{  ?>

            <p class="sensei-message">

                <?php _e( 'The user requested does not exist.', 'woothemes-sensei'); ?>

            </p>

        <?php } ?>

        <?php
        /**
         * This hook fire inside learner-profile.php inside directly after the content
         *
         * @since 1.9.0
         */
        do_action( 'sensei_learner_profile_inside_content_after' );
        ?>

    </section>

</article>

<?php
/**
 * This hook fire inside learner-profile.php after the content
 *
 * @since 1.9.0
 */
do_action( 'sensei_learner_profile_content_after' );
?>

<?php
/**
 * sensei_after_main_content hook
 *
 * @hooked sensei_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('sensei_after_main_content');

/**
 * sensei_sidebar hook
 *
 * @hooked sensei_get_sidebar - 10
 */
do_action('sensei_sidebar');

get_footer();