<?php
/**
 * Template for displaying search forms
 *
 * @package Testforetag
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Sök efter:', 'testforetag'); ?></span>
        <input type="search" class="search-field" placeholder="<?php esc_attr_e('Sök...', 'testforetag'); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
    <button type="submit" class="btn btn-primary search-submit">
        <span class="screen-reader-text"><?php _e('Sök', 'testforetag'); ?></span>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
        </svg>
    </button>
</form>

<style>
.search-form {
    display: flex;
    gap: 0.5rem;
    max-width: 400px;
    margin: 0 auto;
}

.search-form label {
    flex: 1;
}

.search-field {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid hsl(var(--border));
    border-radius: var(--radius);
    font-size: 1rem;
}

.search-field:focus {
    outline: none;
    border-color: hsl(var(--primary));
}

.search-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem;
}
</style>
