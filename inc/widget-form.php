<?php
/*
 * Open Table Widget Admin Form
 *
 * @description: Widget form options in WP-Admin
 */

?>

<!-- Title --><p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title' ); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
</p>


<!-- Listing Options --><p class="widget-api-option">
	<label for="<?php echo $this->get_field_id( 'display_option' ); ?>"><?php _e( 'How would you like to use this widget?', 'open-table-widget' ); ?></label><br />

    <span class="otw-method-span single-option-wrap">
        <input type="radio" name="<?php echo $this->get_field_name( 'display_option' ); ?>" class="<?php echo $this->get_field_id( 'display_option' ); ?> display-option-0" value="0" <?php checked( '0', $displayOption ); ?>><span class="otw-method-label"><?php _e( 'Single Restaurant Reservation', 'open-table-widget' ); ?></span>
    </span><br />
    <span class="otw-method-span multiple-option-wrap">
    <input type="radio" name="<?php echo $this->get_field_name( 'display_option' ); ?>" class="<?php echo $this->get_field_id( 'display_option' ); ?> display-option-1" value="1" <?php checked( '1', $displayOption ); ?>><span class="otw-method-label"><?php _e( 'Predefined Restaurants', 'open-table-widget' ); ?></span>
    </span><br />
    <span class="otw-method-span user-option-wrap">
        <input type="radio" name="<?php echo $this->get_field_name( 'display_option' ); ?>" class="<?php echo $this->get_field_id( 'display_option' ); ?> display-option-2" value="2" <?php checked( '2', $displayOption ); ?>><span class="otw-method-label"><?php _e( 'User Lookup Reservations', 'open-table-widget' ); ?></span>
    </span>
</p>

<div class="otw-toggle-option-1 toggle-item <?php if ( $displayOption == '0' ) {
	echo 'toggled';
} ?>">

	<p class="otw-usage-description"><?php _e( '<span>Usage Description: </span>Select a single restaurant for reservations.', 'open-table-widget' ); ?></p>

	<!-- Restaurant Name --><p>
		<label for="<?php echo $this->get_field_id( 'restaurant_name' ); ?>"><?php _e( 'Restaurant Name', 'open-table-widget' ); ?>:</label>
		<input class="widefat otw-auto-complete" id="<?php echo $this->get_field_id( 'restaurant_name' ); ?>" name="<?php echo $this->get_field_name( 'restaurant_name' ); ?>" type="text" value="<?php echo $restaurantName; ?>" />
	</p>

	<!-- Restaurant ID --><p>
		<label for="<?php echo $this->get_field_id( 'restaurant_id' ); ?>"><?php _e( 'Open Table Restaurant ID:', 'open-table-widget' ); ?>
			<img src="<?php echo OTW_PLUGIN_URL . '/assets/images/help.png' ?>" title="<?php _e( 'This is your Open Table Restaurant ID used for reservations. Use the search field above to locate your restaurant.', 'open-table-widget' ); ?>" class="tooltip-info" width="16" height="16" /></label>
		<input class="widefat restaurant-id" id="<?php echo $this->get_field_id( 'restaurant_id' ); ?>" name="<?php echo $this->get_field_name( 'restaurant_id' ); ?>" type="text" value="<?php echo $restaurantID; ?>" />
		<span class="otw-small-descption"><a href="http://wordimpress.com/docs/open-table-widget/#finding-your-open-table-restaurant-id" target="_blank" title="View tutorial" class="new-window">Need help finding your restaurant ID?</a></span>

	</p>

</div>


<div class="otw-toggle-option-2 toggle-item <?php if ( $displayOption == "1" ) {
	echo 'toggled';
} ?>">

	<p class="otw-usage-description"><?php _e( '<span>Usage Description: </span>Create a list of restaurants for users to select from when making reservations. Drag and drop to reorder the restaurants.', 'open-table-widget' ); ?></p>

	<div class="pro-only">
		<p class="pro-only-p">
			<a href="http://wordimpress.com/plugins/open-table-widget-pro/" class="new-window tooltip-info" title="Unlock Pro Features" target="_blank">Upgrade to Pro Version</a>
			<br />Provide any number of specific restaurants that your users can select from to make reservations. Great for restaurant groups, directories, franchises, and anyone looking to provide targeted restaurant reservations.
		</p>
	</div>
</div>

<div class="otw-toggle-option-3 toggle-item <?php if ( $displayOption == "2" ) {
	echo 'toggled';
} ?>">

	<p class="otw-usage-description"><?php _e( '<span>Usage Description:</span>Allow the user to select from a list of cities and then search for specific restaurants to create a reservation.', 'open-table-widget' ); ?></p>

	<div class="pro-only">
		<p class="pro-only-p">
			<a href="http://wordimpress.com/plugins/open-table-widget-pro/" class="new-window tooltip-info" title="Unlock Pro Features" target="_blank">Upgrade to Pro Version</a>
			<br />Set any number of cities for the user to select from. Once the user selects a city they are then able to search for restaurants in that city found on Open Table to book their reservation.
		</p>
	</div>

</div>


<h4 class="otw-widget-toggler"><?php _e( 'Display Options', 'open-table-widget' ); ?>:<span></span></h4>

<div class="display-options toggle-item">

	<!-- Widget Theme -->
	<p>
		<label for="<?php echo $this->get_field_id( 'widget_style' ); ?>"><?php _e( 'Widget Theme' ); ?>:</label>
		<select name="<?php echo $this->get_field_name( 'widget_style' ); ?>" id="#" class="widefat profield">
			<?php
			$options = array(
				'Bare Bones',
				'Minimal Light',
				'Minimal Dark',
				'Shadow Light',
				'Shadow Dark'
			);
			//Counter for Option Values
			$counter = 0;

			foreach ( $options as $option ) {
				echo '<option value="' . $option . '" id="' . $option . '"', $widgetStyle == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				$counter ++;
			}
			?>
		</select>
	</p>

	<div class="pro-only">
		<p class="pro-only-p">
			<a href="http://wordimpress.com/plugins/open-table-widget-pro/" class="new-window tooltip-info" title="Unlock Pro Features" target="_blank">Upgrade to Pro Version</a>
			<br />Set time Start and End, Default Time, Time increment, and Maximum Available Seats.
		</p>
	</div>


	<!-- Hide Form Labels -->
	<p>
		<input id="<?php echo $this->get_field_id( 'hide_labels' ); ?>" class="reviews-toggle" name="<?php echo $this->get_field_name( 'hide_labels' ); ?>" type="checkbox" value="1" <?php checked( '1', $hideLabels ); ?>/>
		<label for="<?php echo $this->get_field_id( 'hide_labels' ); ?>"><?php _e( 'Hide Form Labels', 'open-table-widget' ); ?>
			<img src="<?php echo OTW_PLUGIN_URL . '/assets/images/help.png' ?>" title="<?php _e( 'The labels appear above the reservation form inputs. Check this option if you would like to hide the labels.', 'open-table-widget' ); ?>" class="tooltip-info" width="16" height="16" /></label>
	</p>


</div>

<h4 class="otw-widget-toggler"><?php _e( 'Content Options:', 'open-table-widget' ); ?><span></span></h4>

<div class="display-options toggle-item">

	<!-- Date Label -->
	<p>
		<label for="<?php echo $this->get_field_id( 'label_date' ); ?>"><?php _e( 'Custom Date Label', 'open-table-widget' ); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'label_date' ); ?>" name="<?php echo $this->get_field_name( 'label_date' ); ?>" type="text" placeholder="Date" value="<?php echo $labelDate; ?>" />
	</p>

	<!-- Time Label -->
	<p>
		<label for="<?php echo $this->get_field_id( 'label_time' ); ?>"><?php _e( 'Custom Time Label', 'open-table-widget' ); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'label_time' ); ?>" name="<?php echo $this->get_field_name( 'label_time' ); ?>" type="text" placeholder="Time" value="<?php echo $labelTime; ?>" />
	</p>
	<!-- Party Size Label -->
	<p>
		<label for="<?php echo $this->get_field_id( 'label_party' ); ?>"><?php _e( 'Custom Party Size Label', 'open-table-widget' ); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'label_party' ); ?>" name="<?php echo $this->get_field_name( 'label_party' ); ?>" type="text" placeholder="Party Size" value="<?php echo $labelParty; ?>" />
	</p>


	<!-- Pre Widget Content -->
	<p>
		<label for="<?php echo $this->get_field_id( 'pre_content' ); ?>"><?php _e( 'Pre Form Content', 'open-table-widget' ); ?>:</label>
		<textarea class="widefat" id="#" name="<?php echo $this->get_field_name( 'pre_content' ); ?>" rows="3" cols="25"><?php echo $preContent; ?></textarea>
	</p>

	<!-- Post Widget Content -->
	<p>
		<label for="<?php echo $this->get_field_id( 'post_content' ); ?>"><?php _e( 'Post Form Content', 'open-table-widget' ); ?>:</label>
		<textarea class="widefat" id="#" name="<?php echo $this->get_field_name( 'post_content' ); ?>" rows="3" cols="25"><?php echo $postContent; ?></textarea>
	</p>

	<div class="pro-only">
		<p class="pro-only-p">
			<a href="http://wordimpress.com/plugins/open-table-widget-pro/" class="new-window tooltip-info" title="Unlock Pro Features" target="_blank">Upgrade to Pro Version</a>
			<br />Support for OpenTable in the UK, Germany, Japan, and Mexico, plus more label customization only in the Pro version.
		</p>
	</div>


</div>

<div class="pro-only green">
	<p class="pro-only-p" style="text-align:center; font-size: 90%; font-style: italic;">
		<a href="http://wordimpress.com/plugins/open-table-widget-pro/" target="_blank" class="new-window" style="margin: 0;">Upgrade to Open Table Widget Pro</a>
	</p>
</div>

<div class="powered-by">
	<p><?php _e( 'Powered by:', 'otw' ); ?></p>
	<img src="<?php echo OTW_PLUGIN_URL; ?>/assets/images/open-table-logo-transparent-150.png" alt="Powered by Open Table" />
</div>