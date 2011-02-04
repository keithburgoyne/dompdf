<?php

/* vim: set noexpandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

require_once 'PEAR/PackageFileManager2.php';

$version = '0.5.2';
$notes = <<<EOT
PEAR package of dompdf
EOT;

$description =<<<EOT
dompdf is an HTML to PDF converter. At its heart, dompdf is (mostly) CSS 2.1
compliant HTML layout and rendering engine written in PHP. It is a
style-driven renderer: it will download and read external stylesheets, inline
style tags, and the style attributes of individual HTML elements. It also
supports most presentational HTML attributes.

PDF rendering is currently provided either by PDFLib or by a bundled version
the R&OS CPDF class written by Wayne Munro. (Some important changes have been
made to the R&OS class, however). In order to use PDFLib with dompdf, the
PDFLib PECL extension is required. Using PDFLib improves performance and
reduces the memory requirements of dompdf somewhat, while the R&OS CPDF class,
though slightly slower, eliminates any dependencies on external PDF libraries.

See http://code.google.com/p/dompdf/.
EOT;

$package = new PEAR_PackageFileManager2();
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$result = $package->setOptions(
	array(
		'filelistgenerator' => 'file',
		'simpleoutput'      => true,
		'baseinstalldir'    => '/',
		'packagedirectory'  => './',
		'dir_roles'         => array(
			'dompdf'         => 'php',
		),
	)
);

$package->setPackage('DOMPDF');
$package->setSummary('HTML to PDF converter.');
$package->setDescription($description);
$package->setChannel('pear.silverorange.com');
$package->setPackageType('php');
$package->setLicense('LGPL', 'http://www.gnu.org/copyleft/lesser.html');

$package->setReleaseVersion($version);
$package->setReleaseStability('stable');
$package->setAPIVersion('0.5.0');
$package->setAPIStability('stable');
$package->setNotes($notes);

$package->addIgnore('package.php');

$package->addMaintainer('lead', 'gauthierm', 'Mike Gauthier', 'mike@silverorange.com');

$package->setPhpDep('5.0.0');
$package->setPearinstallerDep('1.4.0');
$package->addExtensionDep('optional', 'pdflib');
$package->addExtensionDep('required', 'mbstring');
$package->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	$package->writePackageFile();
} else {
	$package->debugPackageFile();
}

?>
