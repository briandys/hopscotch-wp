<!--
Component: Search
Class: search
-->
<div class="comp search_comp">
    <div class="cr search_cr">
        <form class="search_form" action="<?php echo home_url( '/' ); ?>" method="get" role="search">
            <fieldset>
                <legend><?php _e( 'Search Form', 'hopscotch'); ?></legend>
                <div class="field">
                    <div class="cr field_cr">
                        <label class="search-form_label" for="search-form_input" title="Search">
                            <span class="label subj_label"><?php _e( 'Search Keyword', 'hopscotch'); ?></span>
                            <svg class="icon search_icon" width="0" height="0"><use xlink:href="#search_icon"></use></svg>
                        </label>
                        <input id="search-form_input" class="text_input search-form_input" type="search" name="s" placeholder="Enter Keyword" required>
                    </div>
                </div><!-- field -->
                <div class="axn_field">
                    <div class="cr axn-field_cr">
                        <button class="axn search_axn search-form_axn" type="submit">
                            <span class="label verb_label"><?php _e( 'Search', 'hopscotch'); ?></span>
                            <svg class="icon search_icon" width="0" height="0"><use xlink:href="#search_icon"></use></svg>
                        </button>
                    </div>
                </div><!-- axn_field -->
            </fieldset>
        </form>
    </div>
</div><!-- search_comp -->