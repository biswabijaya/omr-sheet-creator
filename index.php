<?php

require( 'fpdfExtended.php' );
require( 'function.php' );

$pdf = new FpdfExtends( 'P', 'mm', 'A4' );

$square_box_width  = 4.7;   // in milimeter
$square_box_height = 4;     // in milimeter
$circle_diameter   = 3.5;   // in milimeter
$circle_radius     = 1.75;  // in milimeter

$start_point = [
    'first_box' => ['x' => 16, 'y' => 71],
];

$box_quantity = [
    'first_box' => 20
];

$pdf->AddPage();
$pdf->SetFont( 'Arial', 'B', 7 );

$anchor_box_width  = 4;
$anchor_box_height = 3.5;
$coordinate_anchor_point = [
    ['x' => 20, 'y' => 15]
];


/**==================================================================================
 *                           Begin of Skunk Mark Point
 * ==================================================================================
 */
$x = $coordinate_anchor_point[0]['x'];
$y = $coordinate_anchor_point[0]['y'];
$pdf->SetXY( $x, $y );
$pdf->Cell( $anchor_box_width, $anchor_box_height, '', 1, 0, 'L', true );

$pdf->SetXY( $x + 178, $y );
$pdf->Cell( $anchor_box_width, $anchor_box_height, '', 1, 0, 'L', true );

$pdf->SetXY( $x, $y + 238 );
$pdf->Cell( $anchor_box_width, $anchor_box_height, '', 1, 0, 'L', true );

$pdf->SetXY( $x + 178, $y + 238 );
$pdf->Cell( $anchor_box_width, $anchor_box_height, '', 1, 0, 'L', true );
/**==================================================================================
 *                           End of Skunk Mark Point
 * ==================================================================================
 */

 /**==================================================================================
 *                           Begin of Name Section
 * ==================================================================================
 */
$pdf->SetLineWidth( 0.1 );

$x_fill = $start_point['first_box']['x'];
$y_fill = $start_point['first_box']['y'] + 4;

$fill_height = 4.35 * 26;
$fill_width = $square_box_width;
$fill_column_qty = 20;

$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => $fill_column_qty,
]);

$pdf = createBox( $pdf, [
    'start_point_x' => $start_point['first_box']['x'],
    'start_point_y' => $start_point['first_box']['y'],
    'box_quantity'  => $box_quantity['first_box'],
    'box_width'     => $square_box_width,
    'box_height'    => $square_box_height,
    'border' => [
        'start' => 'LTB',
        'end'   => 'LTRB',
    ],
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $start_point['first_box']['x'] - 2.35,
    'start_point_y' => $start_point['first_box']['y'] + 3,
    'length_row'    => 26,
    'length_column' => 20,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getAlphabets'
]);
/**==================================================================================
 *                           End of Name Section
 * ==================================================================================
 */


/**==================================================================================
 *                           Begin of Student Number
 * ==================================================================================
 */

$second_starting_point_x = $start_point['first_box']['x'] + ($square_box_width * ($box_quantity['first_box'] + 1));
$second_starting_point_y = $start_point['first_box']['y'] + 4;

$x_fill = $second_starting_point_x;
$y_fill = $second_starting_point_y + 4;
$fill_height = 4.45 * 10;
$fill_width  = $square_box_width;
$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => 2,
    'start_color'     => 1,
]);

$x_fill += $square_box_width * 3;
$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => 3,
]);

$x_fill += $square_box_width * 4;
$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => 3,
]);

$x_fill += $square_box_width * 4;
$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => 1,
]);


$pdf = createBox( $pdf, [
    'start_point_x' => $second_starting_point_x,
    'start_point_y' => $second_starting_point_y,
    'box_quantity'  => 2,
    'box_width'     => $square_box_width,
    'box_height'    => $square_box_height,
    'border' => [
        'start' => 'LTB',
        'end'   => 'LTRB',
    ],
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $second_starting_point_x - 2.35,
    'start_point_y' => $second_starting_point_y + 3,
    'length_row'    => 10,
    'length_column' => 2,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getNumberic'
]);

$third_starting_point_x = $second_starting_point_x + ($square_box_width * 3);
$third_starting_point_y = $second_starting_point_y;
$pdf = createBox( $pdf, [
    'start_point_x' => $third_starting_point_x,
    'start_point_y' => $third_starting_point_y,
    'box_quantity'  => 3,
    'box_width'     => $square_box_width,
    'box_height'    => $square_box_height,
    'border' => [
        'start' => 'LTB',
        'end'   => 'LTRB',
    ],
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $third_starting_point_x - 2.35,
    'start_point_y' => $third_starting_point_y + 3,
    'length_row'    => 10,
    'length_column' => 3,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getNumberic'
]);

$fourth_starting_point_x = $third_starting_point_x + ($square_box_width * 4);
$fourth_starting_point_y = $third_starting_point_y;
$pdf = createBox( $pdf, [
    'start_point_x' => $fourth_starting_point_x,
    'start_point_y' => $fourth_starting_point_y,
    'box_quantity'  => 3,
    'box_width'     => $square_box_width,
    'box_height'    => $square_box_height,
    'border' => [
        'start' => 'LTB',
        'end'   => 'LTRB',
    ],
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $fourth_starting_point_x - 2.35,
    'start_point_y' => $fourth_starting_point_y + 3,
    'length_row'    => 10,
    'length_column' => 3,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getNumberic'
]);

$fifth_starting_point_x = $fourth_starting_point_x + ($square_box_width * 4);
$fifth_starting_point_y = $fourth_starting_point_y;
$pdf = createBox( $pdf, [
    'start_point_x' => $fifth_starting_point_x,
    'start_point_y' => $fifth_starting_point_y,
    'box_quantity'  => 1,
    'box_width'     => $square_box_width,
    'box_height'    => $square_box_height,
    'border' => [
        'start' => 'LTB',
        'end'   => 'LTRB',
    ],
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $fifth_starting_point_x - 2.35,
    'start_point_y' => $fifth_starting_point_y + 3,
    'length_row'    => 10,
    'length_column' => 1,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getNumberic'
]);
/**==================================================================================
 *                           End of Student Number
 * ==================================================================================
 */

 /**==================================================================================
 *                           Begin of Date of Birth
 * ==================================================================================
 */
$sixth_starting_point_x = $fifth_starting_point_x + ($square_box_width * 2);
$sixth_starting_point_y = $fifth_starting_point_y;

$x_fill = $sixth_starting_point_x;
$y_fill = $sixth_starting_point_y + $square_box_height;
$fill_height = 4.8 * 4;
$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => 1,
]);

$x_fill += $square_box_width;
$fill_height = 4.45 * 10;
$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => 1,
    'start_color'     => 1
]);

$x_fill += $square_box_width;
$fill_height = 5.1 * 2;
$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => 1,
]);

$x_fill += $square_box_width;
$fill_height = 4.45 * 10;
$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => 3,
    'start_color'     => 1,
]);

$pdf = createBox( $pdf, [
    'start_point_x' => $sixth_starting_point_x,
    'start_point_y' => $sixth_starting_point_y,
    'box_quantity'  => 6,
    'box_width'     => $square_box_width,
    'box_height'    => $square_box_height,
    'border' => [
        'start' => 'LTB',
        'end'   => 'LTRB',
    ],
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $sixth_starting_point_x - 2.35,
    'start_point_y' => $sixth_starting_point_y + 3,
    'length_row'    => 4,
    'length_column' => 1,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getNumberic'
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => ($sixth_starting_point_x + $square_box_width * 1) - 2.35,
    'start_point_y' => $sixth_starting_point_y + 3,
    'length_row'    => 10,
    'length_column' => 1,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getNumberic'
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => ($sixth_starting_point_x + $square_box_width * 2) - 2.35,
    'start_point_y' => $sixth_starting_point_y + 3,
    'length_row'    => 2,
    'length_column' => 1,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getNumberic'
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => ($sixth_starting_point_x + $square_box_width * 3) - 2.35,
    'start_point_y' => $sixth_starting_point_y + 3,
    'length_row'    => 10,
    'length_column' => 3,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getNumberic'
]);
/**==================================================================================
 *                           End of Date of Birth
 * ==================================================================================
 */

 /**==================================================================================
 *                           Begin of Test Package
 * ==================================================================================
 */
$x_fill = $sixth_starting_point_x + $square_box_width * 4;
$y_fill = $sixth_starting_point_y + $square_box_height * 16;
$fill_height = 4.45 * 10;
$pdf = createBackgroundFill( $pdf, [
    'x_fill'          => $x_fill,
    'y_fill'          => $y_fill,
    'fill_height'     => $fill_height,
    'fill_width'      => $fill_width,
    'fill_column_qty' => 2,
]);

$pdf = createBox( $pdf, [
    'start_point_x' => $sixth_starting_point_x + $square_box_width * 4,
    'start_point_y' => $sixth_starting_point_y + $square_box_height * 15,
    'box_quantity'  => 2,
    'box_width'     => $square_box_width,
    'box_height'    => $square_box_height,
    'border' => [
        'start' => 'LTB',
        'end'   => 'LTRB',
    ],
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => ($sixth_starting_point_x + $square_box_width * 4) - 2.35,
    'start_point_y' => ($sixth_starting_point_y + 3 + $square_box_height * 15),
    'length_row'    => 10,
    'length_column' => 2,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getNumberic'
]);
/**==================================================================================
 *                           End of Test Package
 * ==================================================================================
 */

/**==================================================================================
 *                           Begin of Answer Field
 * ==================================================================================
 */
$circle_space = 4.3;
$answer_anchor_x = $start_point['first_box']['x'] + $square_box_width + 2.35;
$answer_anchor_y = $start_point['first_box']['y'] + 3 + ($circle_space * 28);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x,
    'start_point_y' => $answer_anchor_y,
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 1
    ]
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x,
    'start_point_y' => $answer_anchor_y + ($circle_space * 6),
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 6
    ]
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x + ($square_box_width * 8),
    'start_point_y' => $answer_anchor_y,
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 11
    ]
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x + ($square_box_width * 8),
    'start_point_y' => $answer_anchor_y + ($circle_space * 6),
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 16
    ]
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x + ($square_box_width * 16),
    'start_point_y' => $answer_anchor_y,
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 21
    ]
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x + ($square_box_width * 16),
    'start_point_y' => $answer_anchor_y + ($circle_space * 6),
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 26
    ]
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x + ($square_box_width * 24),
    'start_point_y' => $answer_anchor_y,
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 31
    ]
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x + ($square_box_width * 24),
    'start_point_y' => $answer_anchor_y + ($circle_space * 6),
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 36
    ]
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x + ($square_box_width * 32),
    'start_point_y' => $answer_anchor_y,
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 41
    ]
]);

$pdf = createCircle( $pdf, [
    'start_point_x' => $answer_anchor_x + ($square_box_width * 32),
    'start_point_y' => $answer_anchor_y + ($circle_space * 6),
    'length_row'    => 5,
    'length_column' => 5,
    'circle_radius' => $circle_radius,
    'box' => [
        'width'  => $square_box_width,
        'height' => $square_box_height,
    ],
    'circle_fill_function' => 'getLowerAlphabets',
    'numbering' => [
        'apply'        => true,
        'start_number' => 46
    ]
]);
/**==================================================================================
 *                           End of Answer Field
 * ==================================================================================
 */

$pdf->Output();
