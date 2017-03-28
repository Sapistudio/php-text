<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Hug\Text\Text as Text;

$filename = __DIR__ . '/../data/text-1.txt'; 
$text = file_get_contents($filename);

$filename = __DIR__ . '/../data/text-invalid-utf8.txt'; 
$text_invalid_utf8 = file_get_contents($filename);

$filename = __DIR__ . '/../data/text-invalid-curly.txt'; 
$text_invalid_curly = file_get_contents($filename);

$filename = __DIR__ . '/../data/text-invalid-windows.txt'; 
$text_invalid_windows = file_get_contents($filename);

$filename = __DIR__ . '/../data/text-emails.txt'; 
$text_emails = file_get_contents($filename);

/* ************************************************* */
/* ***************** Text::extract ***************** */
/* ************************************************* */

$test = Text::extract($text, $min_extract_length = 5, $max_extract_length = 10);
echo 'Text::extract'."\n";
echo $test . "\n";

/* ************************************************* */
/* ******** Text::remove_non_breaking_spaces ******* */
/* ************************************************* */

$test = Text::remove_non_breaking_spaces($text);
echo 'Text::remove_non_breaking_spaces' . "\n";
echo $test . "\n";

/* ************************************************* */
/* **************** Text::clean_utf8 *************** */
/* ************************************************* */

$test = Text::clean_utf8($text_invalid_utf8);
echo 'Text::clean_utf8' . "\n";
echo $test . "\n";

/* ************************************************* */
/* ************* Text::convert_to_utf8 ************* */
/* ************************************************* */

$test = Text::convert_to_utf8($text_invalid_utf8);
echo 'Text::convert_to_utf8' . "\n";
echo $test . "\n";

/* ************************************************* */
/* **************** Text::fix_curly **************** */
/* ************************************************* */

$test = Text::fix_curly($text_invalid_curly);
echo 'Text::fix_curly' . "\n";
echo $test . "\n";

/* ************************************************* */
/* *********** Text::fix_windows_encoding ********** */
/* ************************************************* */

$test = Text::fix_windows_encoding($text_invalid_windows);
echo 'Text::fix_windows_encoding' . "\n";
echo $test . "\n";

/* ************************************************* */
/* ************* Text::remove_sentences ************ */
/* ************************************************* */

$test = Text::remove_sentences($text, $min_phrase_words = 12, $separator = "\n");
echo 'Text::remove_sentences' . "\n";
echo $test . "\n";

/* ************************************************* */
/* ************** Text::extract_emails ************* */
/* ************************************************* */

$test = Text::extract_emails($text_emails);
echo 'Text::extract_emails' . "\n";
echo print_r($test, true) . "\n";

/* ************************************************* */
/* *********** Text::extract_first_email *********** */
/* ************************************************* */

$test = Text::extract_first_email($text_emails);
echo 'Text::extract_first_email' . "\n";
echo $test . "\n";

/* ************************************************* */
/* **************** Text::html_diff **************** */
/* ************************************************* */

$test = Text::html_diff($text, $text_emails);
echo 'Text::html_diff' . "\n";
echo $test . "\n";
