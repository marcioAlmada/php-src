--TEST--
Test json_decode() function : basic functionality
--SKIPIF--
<?php if (!extension_loaded("json")) print "skip"; ?>
--FILE--
<?php
// array with different values for $string
$inputs =  array (
  'null',
	'""',
  '"string"',
  'true',
  'false',
  '{"foo"}',
  '[{]',
);  

// loop through with each element of the $inputs array to test json_decode() function
$count = 1;
foreach($inputs as $input) {
	echo "-- Iteration $count --\n";
	echo "'{$input}'", PHP_EOL;
  var_dump(json_decode($input, true, 512, JSON_STRICT));
	var_dump(json_decode($input, true, 512, JSON_STRICT));
  echo json_last_error_msg(), PHP_EOL;
	$count++;
}

?>
--EXPECTF-- 
-- Iteration 1 --
'null'
NULL
NULL
Syntax error
-- Iteration 2 --
'""'
string(0) ""
string(0) ""
Syntax error
-- Iteration 3 --
'"string"'
string(6) "string"
string(6) "string"
Syntax error
-- Iteration 4 --
'true'
bool(true)
bool(true)
Syntax error
-- Iteration 5 --
'false'
bool(false)
bool(false)
Syntax error
-- Iteration 6 --
'{"foo"}'
NULL
NULL
Syntax error
-- Iteration 7 --
'[{]'
NULL
NULL
State mismatch (invalid or malformed JSON)
