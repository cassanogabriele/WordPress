<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			comments.php
 * =========================================================================================================================================
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */
if ( post_password_required() ) {

	return;
	
}
?>
<div id="comments" class="comments-area">
	<?php if( have_comments() ) : ?>

		<h1 class="comments-title">
		<?php
		
			printf( _nx( 'One comment on %2$s', '%1$s comments on %2$s', get_comments_number(), 'comments title', 'roadrunners' ),
			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			
		?>
		</h1>

		<ol class="comment-list">
		<?php
		
			wp_list_comments( array(
			
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 60,
				'callback'    => 'roadrunners_comment'
				
			) );
		
		?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		
			<nav class="comment-navigation" role="navigation">
				<div class="nav-previous"><?php previous_comments_link( wp_kses_post( __( '<i class="fa fa-angle-double-left"></i> Older Comments', 'roadrunners' ) ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( wp_kses_post( __( 'Newer Comments <i class="fa fa-angle-double-right"></i>', 'roadrunners' ) ) ); ?></div>
				<br class="clear" />
			</nav>
		
		<?php endif; // End check for comment navigation ?>

	<?php endif; // End if have_comments() ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	
		<h3 class="no-comments"><?php esc_html_e( 'Comments are closed.', 'roadrunners' ); ?></h3>
	
	<?php endif; ?>

	<?php
	
		$comments_args = array(

			'title_reply'          => esc_html__( 'Laisser un commentaire', 'roadrunners' ),
			'logged_in_as'         => '',
			'fields'               => apply_filters( 'comment_form_default_fields' , array(
			
				'author' => '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] )       . '" size="30" placeholder="' . ( $req ? esc_html__( 'Your Name (Required)' , 'roadrunners' ) : '' ) . '" required />',
				'email'  => '<input id="email"  name="email"  type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" placeholder="' . ( $req ? esc_html__( 'Your Email (Required)' , 'roadrunners' ) : '' ) . '" required />',
				'url'    => ''
				
			)),
			'comment_field'        => '<textarea id="comment" name="comment" cols="45" rows="8" placeholder="' . __( 'Votre Message...', 'roadrunners' ) . '" aria-required="true"></textarea>',
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'label_submit'         => esc_html__( 'Soumettre commentaire', 'roadrunners' )
			
		);

		comment_form( $comments_args );
	
	?>
	
</div>