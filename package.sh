#!/bin/sh
rm -rd dompdf
rm dompdf-0.5.2.zip
rm DOMPDF-0.5.2.tgz
wget http://dompdf.googlecode.com/files/dompdf-0.5.2.zip
unzip dompdf-0.5.2.zip
php -f package.php > package.xml
cat package.xml
pear package package.xml
