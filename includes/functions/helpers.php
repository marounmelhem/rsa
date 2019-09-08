<?php
/**
 * Helpers functions
 *
 * @package  RSA Demo
 * @developer  Maroun Melhem <http://maroun.me>
 *
 */
/*Check if var is prime*/
function is_prime( $n ) {
	for ( $x = 2; $x < $n; $x ++ ) {
		if ( $n % $x == 0 ) {
			return 0;
		}
	}

	return 1;
}

/*Find Inverse*/
//function findInverse( $a, $b ) {
//	$quotient  = $a / $b;
//	$remainder = $a % $b;
//
//	$x[0] = 0;
//	$y[0] = 1;
//
//	$x[1] = 1;
//	$y[1] = $quotient * - 1;
//
//
//	for ( $i = 2; ( $b % ( $a % $b ) ) != 0; $i ++ ) {
//		$a           = $b;
//		$b           = $remainder;
//		$quotient    = $a / $b;
//		$remainder   = $a % $b;
//		$x[ $i % 3 ] = ( $quotient * - 1 * $x[ ( $i - 1 ) % 3 ] ) + $x[ ( $i - 2 ) % 3 ];
//		$y[ $i % 3 ] = ( $quotient * - 1 * $y[ ( $i - 1 ) % 3 ] ) + $y[ ( $i - 2 ) % 3 ];
//	}
//
//	return $x[ ( $i - 1 ) % 3 ];
////    return $y[($i - 1) % 3];
//}

function stringToAscii( $string ) {

	$numbers = join( array_map( function ( $n ) {
		return sprintf( '%03d', $n );
	},
		unpack( 'C*', $string ) ) );

	return $numbers;
}

function asciiToString( $numbers ) {

	$str = join( array_map( 'chr', str_split( $numbers, 3 ) ) );

	return $str;
}

function findInverse( $a, $b ) {
	$large     = $a > $b ? $a : $b;
	$small     = $a > $b ? $b : $a;
	$remainder = $large % $small;

	return 0 == $remainder ? $small : findInverse( $small, $remainder );
}

/*Encrypt RSA*/
function encrypt_rsa( $data, $prime_1, $prime_2 ) {
	//Calculating n
	$n = $prime_1 * $prime_2;

	//Calculating t
	$t = ( $prime_1 - 1 ) * ( $prime_2 - 1 );

	//Calculating e
	$e = rand( 1, $t );
	while ( $t % $e == 0 ) {
		$e = rand( 1, $t );
	}

	//Calculating d
	$d = findInverse( $e, $t );

	//Encrypting m
	//C = M^e mod n

	//message to ascii
	$m_1 = pow( stringToAscii( $data ), $e );
	$m   = $m_1 % $n;

	return array( $m, $n, $d );
}

function decrypt_rsa( $data, $n, $d ) {
	//M = C^d mod n
	$data_1 = pow( $data, $d );
	$m      = $data_1 % $n;

	return $m;
}

//$encrypt = encrypt_rsa( "m", 2, 5 );
//
//var_dump( $encrypt );
//
//echo "<br>";
//
//echo decrypt_rsa( $encrypt[0], $encrypt[1], $encrypt[2] );


//echo findInverse(2,3);