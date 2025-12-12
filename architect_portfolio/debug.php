<?php
echo "Aktuální adresář: " . getcwd() . "<br>";

// Zkontroluje, zda existují klíčové složky
echo "Existuje storage/: " . (file_exists('storage') ? 'Ano' : 'Ne') . "<br>";
echo "Existuje storage/app/: " . (file_exists('storage/app') ? 'Ano' : 'Ne') . "<br>";
echo "Existuje storage/app/public/: " . (file_exists('storage/app/public') ? 'Ano' : 'Ne') . "<br>";
echo "Existuje public/storage/: " . (file_exists('public/storage') ? 'Ano' : 'Ne') . "<br>";

$testPath = 'storage/app/public/images/archi-soutez-humpolec/uvodka.jpg';
echo "Existuje $testPath: " . (file_exists($testPath) ? 'Ano' : 'Ne') . "<br>";

$testDir = 'storage/app/public/images/archi-soutez-humpolec';
if (file_exists($testDir) && is_dir($testDir)) {
    echo "Obsah složky $testDir:<br>";
    $files = scandir($testDir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "- $file<br>";
        }
    }
} else {
    echo "Složka $testDir neexistuje nebo není adresář<br>";
}
?>
