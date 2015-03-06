<div class="comp search_comp ui-type--search ui-state__search--inactive">

    <div class="search_cr">

        <form class="search-form_form" action="<?php echo home_url( '/' ); ?>" method="get" role="search">
            <fieldset>
                <legend><?php _e( 'Search Form', 'hopscotch'); ?></legend>

                <div class="field">
                    <div class="field-cr">
                        <label class="search-form_label" for="search-form_input">
                            <?php _e( 'Search for', 'hopscotch'); ?>
                            <svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg>
                        </label>
                        <input id="search-form_input" class="search-form_input" type="search" name="s" placeholder="Search" required>
                    </div>
                </div><!-- field -->

                <div class="field-action">
                    <div class="field-cr">
                        <button class="search-form_button" type="submit"><?php _e( 'Search', 'hopscotch'); ?></button>
                    </div>
                </div><!-- field-action -->

            </fieldset>
        </form>

    </div>

</div><!-- search_comp -->