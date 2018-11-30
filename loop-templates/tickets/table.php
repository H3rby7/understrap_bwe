<?php

$musical = get_the_ID();

$weekdaysByIndex = array(
	1 => "Mon",
	2 => "Tue",
	3 => "Wed",
	4 => "Thu",
	5 => "Fri",
	6 => "Sat",
	7 => "Sun"
);

$weekdaysByDay = array(
	"Mon" => 1,
	"Tue" => 2,
	"Wed" => 3,
	"Thu" => 4,
	"Fri" => 5,
	"Sat" => 6,
	"Sun" => 7
);

$weekdaysGermanByIndex = array(
	1 => "Mo",
	2 => "Di",
	3 => "Mi",
	4 => "Do",
	5 => "Fr",
	6 => "Sa",
	7 => "So"
);

// Sorted by Date and Time, Ascending
$ticket_query = new WP_Query( array(
	'post_type'  => 'show',
	'meta_query' => array(
		'relation'       => 'AND',
		'musical_clause' => array(
			'key'   => 'musical-link_musical',
			'value' => $musical
		),
		'date_clause'    => array(
			'key' => 'show-date'
		),
		'time_clause'    => array(
			'key' => 'show-time'
		),
	),
	'orderby'    => array(
		'date_clause' => 'ASC',
		'time_clause' => 'ASC',
	),
) );

$shows = [];

// used to determine the table headers and available day rows.
$days      = array(
	1 => false,
	2 => false,
	3 => false,
	4 => false,
	5 => false,
	6 => false,
	7 => false
);
$showNr    = 0;
$last_week = 65; //anything > than the amount of weeks a year can have

if ( $ticket_query->have_posts() ) {

	while ( $ticket_query->have_posts() ) {
		$ticket_query->the_post();

		/* get all data */
		$state = get_post_meta( get_the_ID(), 'show-state', true );

		// State 4 means hidden. Basically not displayed.
		// Checks if the show will be displayed. skip if not the case.
		if ( $state != 4 ) {


            $link = '';
            // State 4 means Disabled, ticket link will not be visible in frontend
			if ( $state != 3 ) {
				$link = get_post_meta( get_the_ID(), 'show-ticket_link', true );
			}

			$date_str    = get_post_meta( get_the_ID(), 'show-date', true );
			$date        = DateTime::createFromFormat( 'Y-m-j', $date_str );
			$time        = get_post_meta( get_the_ID(), 'show-time', true );
			$week_number = $date->format( 'W' );
			$annotation  = get_post_meta( get_the_ID(), 'show-annotation', true );


			$dayname        = $date->format( 'D' );
			$dayindex       = $weekdaysByDay[ $dayname ];
			$formatted_date = $date->format( 'd.m' );

			$days[ $dayindex ] = true;

			// set the first week index to the lowest week available
			if ( $week_number < $last_week ) {
				$last_week = $week_number;
			}

			$shows[ $showNr ++ ] = array(
				'date'        => $formatted_date,
				'dayindex'    => $dayindex,
				'time'        => $time,
				'link'        => $link,
				'week_number' => $week_number,
				'annotation'  => $annotation,
				'state'       => $state
			);
		}


	}

// get earliest and latest used day of the week
	$firstDay = 10;
	$lastDay  = - 1;
	foreach ( $days as $key => $value ) {
		if ( $value == true ) {
			$lastDay = $key;
			if ( $firstDay > $key ) {
				$firstDay = $key;
			}
		}
	}

	/* get day range (eg. [1 => Mon, 2=> Thu] or [3 => Wed, 4=> Thu, 5 => Fri, 6=> Sat]*/
	$displayed_days = [];
	foreach ( $weekdaysByIndex as $key => $value ) {
		if ( $firstDay <= $key && $key <= $lastDay ) {
			$displayed_days[ $key ] = $value;
		}
	}

	wp_reset_postdata();

	$last_day_index = $firstDay;
} else {
	echo '<!-- no Shows found -->';
}
if (sizeof($shows) > 0) {
	?>
<div class="musical-tickets" id="tickets">
    <h1>Tickets</h1>
    <table class="ticket" style="table-layout: fixed;">
        <tr>
					<?php
					// Create Header Row with Daynames
					foreach ( $displayed_days as $key => $value ) {
						echo '<th>' . $weekdaysGermanByIndex[ $key ] . '</th>';
					} ?>
        </tr>
        <tr>
					<?php foreach ( $shows as $value ) {

					// get index of weekday for show
					$dayindex = $value['dayindex'];

					// check if we are in a new week
					if ( $value['week_number'] > $last_week ) {
					// Fill preceding row with empty TDs
					for ( $i = $last_day_index; $i <= $lastDay; $i ++ ) {
						echo '<td class="noHover"></td>';
					}
					// Jump to new row, set last day index back to 1
					$last_week      = $value['week_number'];
					$last_day_index = $firstDay; ?>
        </tr>
        <tr>
					<?php }
					// Create empty TDs until show day is reached
					for ( $i = $last_day_index; $i < $dayindex; $i ++ ) {
						echo '<td class="noHover"></td>';
					}
					// Empty TDs done. Create ticket TD
					?>
            <td class="<?php if ($value['link'] == '') {
                echo 'noHover';
            }?>">
	            <?php if ($value['link'] != '') {
		            echo '<a href="' . $value['link'] . '" target="_blank">';
	            }?>
                    <div>
                        <div class="ticketAnnotation"><?php echo $value['annotation']; ?></div>
                        <div class="ticketDate"><?php echo $value['date']; ?></div>
                        <div class="ticketTime"><?php echo $value['time']; ?> Uhr</div>
                    </div>
	            <?php if ($value['link'] != '') {
		            echo '</a>';
	            }?>
            </td>
					<?php
					// increase dayindex by 1 to prevent filling TDs for next show
					$last_day_index = $dayindex + 1;
					}
					// fill up last created row with empty TDs
					for ( $i = $last_day_index; $i <= $lastDay; $i ++ ) {
						echo '<td class="noHover"></td>';
					}
					?>
        </tr>
    </table>
</div>
	<?php
    } else {
        echo '<!-- no Shows to be displyed -->';
    }
?>
