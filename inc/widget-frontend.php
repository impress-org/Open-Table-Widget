<?php
/**
 * OTW Widget Frontend Display
 *
 * @description: Responsible for the frontend display of the Open Table Widget
 */
?>

<div class="otw-widget-form-wrap">
	<?php
	//Pre Form Content
	if ( ! empty( $preContent ) ) {
		?>
		<div class="otw-pre-form-content">
			<?php echo wpautop( $preContent ); ?>
		</div>
	<?php } ?>
	<form method="get" class="otw-widget-form" action="//www.opentable.com/restaurant-search.aspx" target="_blank">
		<div class="otw-wrapper">

			<div class="otw-date-li otw-input-wrap">
				<?php if ( $hideLabels !== '1' ) { ?>
					<label for="date-<?php echo $args["widget_id"]; ?>"><?php
						if ( empty( $labelDate ) ) {
							_e( 'Date', 'open-table-widget' );
						} else {
							echo $labelDate;
						}
						?></label>
				<?php } ?>
				<input id="date-<?php echo $args["widget_id"]; ?>" name="startDate" class="otw-reservation-date" type="text" value="" autocomplete="off" readonly="readonly">
			</div>
			<div class="otw-time-wrap otw-input-wrap">
				<?php if ( $hideLabels !== '1' ) { ?>
					<label for="time-<?php echo $args["widget_id"]; ?>"><?php if ( empty( $labelTime ) ) {
							_e( 'Time', 'open-table-widget' );
						} else {
							echo $labelTime;
						} ?></label>
				<?php } ?>
				<select id="time-<?php echo $args["widget_id"]; ?>" name="ResTime" class="otw-reservation-time otw-selectpicker">
					<?php
					//Time Loop
					//@SEE: http://stackoverflow.com/questions/6530836/php-time-loop-time-one-and-half-of-hour
					$inc = 30 * 60;
					$start = ( strtotime( '8AM' ) ); // 6  AM
					$end = ( strtotime( '11:59PM' ) ); // 10 PM


					for ( $i = $start; $i <= $end; $i += $inc ) {
						// to the standart format
						$time      = date( 'g:i a', $i );
						$timeValue = date( 'g:ia', $i );
						$default   = "7:00pm";
						echo "<option value=\"$timeValue\" " . ( ( $timeValue == $default ) ? ' selected="selected" ' : "" ) . ">$time</option>" . PHP_EOL;
					}

					?>
				</select>

			</div>
			<div class="otw-party-size-wrap otw-input-wrap">
				<?php if ( $hideLabels !== '1' ) { ?>
					<label for="party-<?php echo $args["widget_id"]; ?>"><?php if ( empty( $labelParty ) ) {
							_e( 'Party Size', 'open-table-widget' );
						} else {
							echo $labelParty;
						}  ?></label>
				<?php } ?>
				<select id="party-<?php echo $args["widget_id"]; ?>" name="partySize" class="otw-party-size-select selectpicker">
					<option value="1">1 Person</option>
					<option value="2" selected="selected">2 People</option>
					<option value="3">3 People</option>
					<option value="4">4 People</option>
					<option value="5">5 People</option>
					<option value="6">6 People</option>
					<option value="7">7 People</option>
					<option value="8">8 People</option>
					<option value="9">9 People</option>
					<option value="10">10 People</option>
				</select>

			</div>

			<div class="otw-button-wrap">
				<input type="submit" class="<?php echo( $style == 'otw-bare-bones-style' ? 'otw-submit' : 'otw-submit-btn' ); ?>" value="<?php _e( 'Find a Table', 'open-table-widget' ); ?>" />
			</div>
			<input type="hidden" name="RestaurantID" class="RestaurantID" value="<?php echo $restaurantID; ?>">
			<input type="hidden" name="rid" class="rid" value="<?php echo $restaurantID; ?>">
			<input type="hidden" name="GeoID" class="GeoID" value="15">
			<input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
			<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="<?php echo $restaurantID; ?>">
		</div>
	</form>
	<?php
	//Post Form Content
	if ( ! empty( $postContent ) ) {
		?>
		<div class="otw-post-form-content">
			<?php echo wpautop( $postContent ); ?>
		</div>
	<?php } ?>
	<div class="powered-by-open-table"><span class="powered-by-text"><?php _e( 'Powered By:', 'open-table-widget' ); ?></span></div>
</div><!-- /.otw-widget-form-wrap -->