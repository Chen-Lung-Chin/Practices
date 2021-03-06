<?php 
declare( strict_types=1 );
phpinfo();

error_reporting(E_ALL);

echo 'echo Hello, World'.PHP_EOL;
eCHo 'eCHo <h2>PHP is Fun!</h2>'.PHP_EOL;
ECHO 'ECHO This ', 'string ', 'was ', 'made ', 'with multiple parameters.'.PHP_EOL;

$color = 'red';
echo '$color: '.$color.PHP_EOL;
// echo "coLor = $coLor;\n"; <= This result will be [ Notice: Undefined variable ... ]

echo PHP_EOL;

$heredoc_str = <<<EOT
this
is
an eot
test: color = {$color}.

EOT;

echo $heredoc_str.PHP_EOL;

// global keyworld
$gx = 5;
$gy = 10;

function makeGlobalVariable() {
    $GLOBALS['gy'] = $GLOBALS['gx'] + $GLOBALS['gy'];
    /* same result.
    global $gx, $gy; // for accessing global scope variables
    $gy = $gx + $gy;
    */
}

function experimentStaticVariable() {
    static $static_x = 0;
    echo '$static_x++: '.$static_x++.PHP_EOL;
}

echo '==================== Make Global Variable =================='.PHP_EOL;
makeGlobalVariable();
echo 'gy = $gy'.PHP_EOL;
echo '============================================================'.PHP_EOL.PHP_EOL;

echo '==================== Experiment Static Variable ============'.PHP_EOL;
experimentStaticVariable();
experimentStaticVariable();
experimentStaticVariable();
echo '============================================================'.PHP_EOL.PHP_EOL;

{
    echo '==================== Experiment Variable References ============'.PHP_EOL;
    $var_original = 1000;
    $var_ref = &$var_original;
    echo '$var_original: '.$var_original.', $var_ref: '.$var_ref.PHP_EOL;
    echo '$var_ref = rand( 0, 1000 ): '.PHP_EOL;
    $var_ref = rand( 0, 1000 );
    echo '$var_original: '.$var_original.', $var_ref: '.$var_ref.PHP_EOL;
    echo '============================================================'.PHP_EOL.PHP_EOL;
}

{
    echo '==================== Experiment Variable Variables ============'.PHP_EOL;
    $var_a = 'hello';
    $$var_a = 'world';
    echo '$var_a, ${$var_a}: '.$var_a.', '.${$var_a}.PHP_EOL;
    echo '$var_a, $hello: '.$var_a.', '.$hello.PHP_EOL;
    echo '============================================================'.PHP_EOL.PHP_EOL;
}


echo '==================== Data Types ============'.PHP_EOL;
$var_int = 65535;
echo 'var_dump($var_int)'.PHP_EOL; 
var_dump( $var_int );

echo PHP_EOL;
$var_double = 1.234;
echo 'var_dump($var_double)'.PHP_EOL;
var_dump( $var_double );

echo PHP_EOL;
$var_boolean = true;
echo 'var_dump($var_boolean)'.PHP_EOL;
var_dump( $var_boolean );

echo PHP_EOL;
$var_array = array( 'Abel', 'Aiden', 'Jacky', 'JJ' );
echo 'var_dump($var_array)'.PHP_EOL;
var_dump( $var_array );


try {
    echo 'array_key_exists( count($var_array), $var_array ): '.(int)array_key_exists( count($var_array), $var_array ).PHP_EOL;
    echo '$var_array[ count($var_array) ] = '.$var_array[ count($var_array) ].PHP_EOL;
} catch ( Error $e ) {
    echo 'caught Error:'.PHP_EOL;
    echo $e->__toString().PHP_EOL;
} catch ( Exception $e ) {
    echo 'caught Exception:'.PHP_EOL;
    echo $e->__toString().PHP_EOL;
} catch ( Throwable $e ) {
    echo 'caught Throwable:'.PHP_EOL;
    echo $e->__toString().PHP_EOL;
} finally {
    echo 'caught nothing'.PHP_EOL;
}

$var_array_len = count($var_array);

/**
 * Unset Array Element Demo: the array will not be reindexing.
 */
$un_set_demo_array = $var_array;
for ( $count = 0; $count < $var_array_len - 1; ++$count ) {
    echo 'Before: count($un_set_demo_array): '.count($un_set_demo_array).PHP_EOL;
    $rand_value = rand( 0, ( count($un_set_demo_array) - 1 ) );
    echo '$rand_value: '.$rand_value.PHP_EOL;
    echo 'unset( $un_set_demo_array['.$rand_value.'] )'.PHP_EOL;
    unset( $un_set_demo_array[ $rand_value ] );
    echo 'After: count($un_set_demo_array): '.count($un_set_demo_array).PHP_EOL;
}

echo 'var_dump($un_set_demo_array)'.PHP_EOL;
var_dump( $un_set_demo_array );

/**
 * Splice Array Element Demo: the array will be reindexing.
 */
$splice_demo_array = $var_array;
for ( $count = 0; $count < $var_array_len - 1; ++$count ) {
    echo 'Before: count($splice_demo_array): '.count($splice_demo_array).PHP_EOL;
    $rand_value = rand( 0, ( count($splice_demo_array) - 1 ) );
    echo '$rand_value: '.$rand_value.PHP_EOL;
    echo 'array_splice( $splice_demo_array, '.$rand_value.', 1 )'.PHP_EOL;
    $removed_array = array_splice( $splice_demo_array, $rand_value, 1 );
    echo 'After: count($splice_demo_array): '.count($splice_demo_array).PHP_EOL;
    echo '$removed_array:'.PHP_EOL;
    var_dump( $removed_array );
}

echo 'var_dump($splice_demo_array)'.PHP_EOL;
var_dump( $splice_demo_array );

echo 'Array is an iterable:'.PHP_EOL;
echo 'foreach ( $var_array as $elem )'.PHP_EOL;
$index = 0;
foreach ( $var_array as $elem ) {
    echo '$var_array['.$index++.']: '.$elem.PHP_EOL;
}

$var_string = 'This is a string variable.';
$var_binary = (binary)$var_string;
echo '$var_binary: '.$var_binary.PHP_EOL;
echo 'var_dump($var_binary):'.PHP_EOL;
var_dump($var_binary);

echo PHP_EOL;
class Car {
    public $modelName = '';

    function __construct( $model_name ) {
        echo 'Class: '.__CLASS__.', Function: '.__FUNCTION__.', Method: '.__METHOD__.PHP_EOL;
        echo 'Dir: '.__DIR__.', File: '. __FILE__.', Line: '.__LINE__.PHP_EOL;
        echo 'Namespace: '.__NAMESPACE__.', Trait: '.__TRAIT__.PHP_EOL;
        echo 'Param $modelName: '.$model_name.', PHP_EOL: '.PHP_EOL;
        $this->modelName = $model_name;
    }
}

$new_car1 = new Car( 'BMW 3 Series' );
var_dump( $new_car1 );
$new_car2 = new Car( 'Benz C Class' );
var_dump( $new_car2 );

echo 'is_array( $new_car1 ): '.is_array( $new_car1 ).PHP_EOL;
echo 'is_object( $new_car1 ): '.is_object( $new_car1 ).PHP_EOL;
echo '============================================================'.PHP_EOL.PHP_EOL;

// Experiment NULL
{
    echo '==================== Experiment Null Type ============'.PHP_EOL;
    /* This session of code will cause a lot warnings.
    $var_string_uninit;
    echo '($var_string_uninit == NULL): '.( $var_string_uninit === NULL ).PHP_EOL;
    echo 'var_dump( is_null($var_string_uninit): '.var_dump( is_null($var_string_uninit) ).PHP_EOL;
    echo 'isset($var_string_uninit): '.isset($var_string_uninit).PHP_EOL;
    echo 'var_dump( $var_string_uninit )'.PHP_EOL;
    var_dump( $var_string_uninit );
    */

    $var_null = NULL;
    echo 'var_dump( is_null($var_null) ): ';
    var_dump( is_null($var_null) );
    echo is_null($var_null).PHP_EOL;
    echo 'var_dump( isset($var_null) ): ';
    var_dump( isset($var_null) );
    echo (Integer)isset($var_null).PHP_EOL;
    echo '========================================================'.PHP_EOL.PHP_EOL;
}

// Experiment Constants
{
    echo '==================== Experiment Constants ============'.PHP_EOL;
    define( 'NUM_MAX', 10 );
    echo 'NUM_MAX: '.NUM_MAX.PHP_EOL;
    define( 'CAR_FACTORY', [ 'BENZ', 'BMW', 'LEXUS', 'AUDI' ] );
    $index = 0;
    foreach( CAR_FACTORY as $elem ) {
        echo 'CAR_FACTORY['.$index++.']: '.$elem.PHP_EOL;
    }
    echo '======================================================'.PHP_EOL.PHP_EOL;
}

// Experiment Operators
{
    echo '==================== Experiment Operators ============'.PHP_EOL;
    echo '1 <> 2: '.(1 <> 2).PHP_EOL;
    echo '1 <> 1: '.(Integer)(1 <> 1).PHP_EOL;
    echo '1 != 2: '.(1 != 2).PHP_EOL.PHP_EOL;

    echo '2 <=> 1: '.(2 <=> 1).PHP_EOL;
    echo '2 <=> 2: '.(2 <=> 2).PHP_EOL;
    echo '2 <=> 3: '.(2 <=> 3).PHP_EOL.PHP_EOL;

    $bar_bit_1 = 0x01;
    $bar_bit_2 = 0x10;
    echo "$bar_bit_1 ^ $bar_bit_2: 0x".dechex( $bar_bit_1 ^ $bar_bit_2 ).PHP_EOL.PHP_EOL;

    echo "`git status`";
    $result = `git status`;
    echo $result.PHP_EOL;

    echo '======================================================'.PHP_EOL.PHP_EOL;
}

// Experiment Strict Types
{
    echo '==================== Experiment Strict Types ============'.PHP_EOL;

    function mathAdd( int $a, int $b ) : int
    {
        return $a + $b;
    }

    //echo mathAdd( 1, 2.3 ).PHP_EOL;
    echo 'mathAdd( 1, 2 ): '.mathAdd( 1, 2 ).PHP_EOL;
    // echo 'mathAdd( 1, 2 ): '.mathAdd( 1, 2.3 ).PHP_EOL; // Will throw errors because parameter 2.3.
    echo '======================================================'.PHP_EOL.PHP_EOL;
}

// Experiment Arrays
{
    echo '==================== Experiment Associative Arrays ============'.PHP_EOL;
    $var_associative_array = array( 'C-Class'=>'BENZ', 'IS250'=>'LEXUS' );
    $var_associative_array[ '3-Series' ] = 'BMW';
    $var_associative_array[ 'R8' ] = 'AUDIO';

    echo 'foreach( $var_associative_array as $key => $value )'.PHP_EOL;
    foreach( $var_associative_array as $key => $value ) {
        echo '$key: '.$key.', $value: '.$value.PHP_EOL;
    }

    echo 'is_array( $var_associative_array ): '.is_array( $var_associative_array ).PHP_EOL;
    echo 'is_object( $var_associative_array ): '.is_object( $var_associative_array ).PHP_EOL;
    echo '==============================================================='.PHP_EOL.PHP_EOL;
}

{
    echo '==================== Demo Null Coalescing Operator ============'.PHP_EOL;
    $enable_output = true;
    $callable = function () { echo 'Enable Output'.PHP_EOL; };
    $enable_output ?? $callable();
    echo '==============================================================='.PHP_EOL.PHP_EOL;
}


/*
* ?> : Prefer Omiting PHP closing tag if this file contain only PHP script.
*/