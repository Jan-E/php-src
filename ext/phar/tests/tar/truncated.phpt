--TEST--
Phar: truncated tar
--EXTENSIONS--
phar
--FILE--
<?php
try {
    $p = new PharData(__DIR__ . '/files/trunc.tar');
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

?>
--CLEAN--
<?php
unlink(__DIR__ . '/' . basename(__FILE__, '.clean.php') . '.phar.tar');
unlink(__DIR__ . '/' . basename(__FILE__, '.clean.php') . '.phar');
?>
--EXPECTF--
phar error: "%strunc.tar" is a corrupted tar file (truncated)
