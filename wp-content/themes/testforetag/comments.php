<?php
/**
 * The template for displaying comments
 *
 * @package Testforetag
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            printf(
                _n('%d kommentar', '%d kommentarer', $comment_count, 'testforetag'),
                $comment_count
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation(array(
            'prev_text' => __('&laquo; Äldre kommentarer', 'testforetag'),
            'next_text' => __('Nyare kommentarer &raquo;', 'testforetag'),
        ));
        ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments text-muted"><?php _e('Kommentarer är stängda.', 'testforetag'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply' => __('Lämna en kommentar', 'testforetag'),
        'title_reply_to' => __('Svara på %s', 'testforetag'),
        'cancel_reply_link' => __('Avbryt svar', 'testforetag'),
        'label_submit' => __('Skicka kommentar', 'testforetag'),
        'comment_field' => '<div class="form-group"><label for="comment">' . __('Kommentar', 'testforetag') . '</label><textarea id="comment" name="comment" rows="5" required></textarea></div>',
        'class_submit' => 'btn btn-primary',
    ));
    ?>

</div>
