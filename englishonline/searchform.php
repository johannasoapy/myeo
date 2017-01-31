<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <label for="s" class="screen-reader-text"><?php _e('Search for:','bonestheme'); ?></label>
        <input type="search" id="s" name="s" name="s" value="" placeholder="Search site&hellip;" />

        <button type="submit" id="searchsubmit" class="orange-btn"><?php _e('search','bonestheme'); ?></button>
    </div>
</form>