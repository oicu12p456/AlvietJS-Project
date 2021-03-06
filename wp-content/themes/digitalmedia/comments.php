<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<?php $protocol = is_ssl() ? 'https://' : 'http://';?>
<div itemscope itemtype="<?php echo esc_attr($protocol);?>schema.org/Comment" id="comments" class="post-comments comment-area clearfix">
	<?php if ( have_comments() ) : ?>
	 <!--End single  item-->
				<div class="comment-block">
					<div class="title">
						<h3><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></h3>
					</div><!-- /.title -->
						<?php
							wp_list_comments( array(
								'style'       => 'ul',
								'short_ping'  => true,
								'avatar_size' => 74,
								'callback'=>'digitalmedia_bunch_list_comments'
							) );
						?>
						<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'digitalmedia' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'digitalmedia' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'digitalmedia' ) ); ?></div>
        </nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'digitalmedia' ); ?></p>
        <?php endif; ?>
						
				</div><!-- /.comment-block -->
    <?php endif; // have_comments() ?> 
     
     <!-- Comment Form -->
    <div class="leave-a-comment">
        <!-- Heading -->
       <?php if ( comments_open()) : ?>
	    	<div class="title"><h3><?php esc_html_e('Add a Comment', 'digitalmedia');?></h3></div>
        <?php endif; ?>	
		<?php digitalmedia_bunch_comment_form(); ?>
    </div>    
</div><!-- #comments -->
