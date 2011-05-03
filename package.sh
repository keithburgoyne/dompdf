#!/bin/sh
rm -rd dompdf
rm dompdf_0-6-0_beta2.zip
rm dompdf_0-6-0_beta2.tgz
wget http://dompdf.googlecode.com/files/dompdf_0-6-0_beta2.zip
unzip dompdf_0-6-0_beta2.zip
php -f package.php > package.xml
cat package.xml
pear package package.xml
