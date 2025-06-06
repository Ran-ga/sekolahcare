<?php
echo "Loaded php.ini: " . php_ini_loaded_file() . "\n";
echo "GD Extension: " . (extension_loaded('gd') ? 'Enabled' : 'Disabled') . "\n";
echo "EXIF Extension: " . (extension_loaded('exif') ? 'Enabled' : 'Disabled') . "\n"; 