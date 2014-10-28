<?php
require_once '../core/lib/class.utilities.php';
require_once '../core/lib/class.model.php';
require_once '../core/lib/class.db.mysql.php';
require_once '../core/components/component.cron.php';


define ( 'FLIPKART_FILE_PATH', 'C:\\Users\\dipakm\\Documents\\Dipak\\Personal\\flipkart_prr\\flipkart\\' );
define ( 'PROCESSED_FILE_PATH', 'C:\\Users\\dipakm\\Documents\\Dipak\\Personal\\flipkart_prr\\processed\\');
define ( 'DB_NAME', 'pricetag' );
define ( 'DB_HOST', 'localhost' );
define ( 'DB_PASSWD', '' );
define ( 'DB_USER', 'root' );

ini_set("error_reporting", true);
ini_set("display_errors", 1);


$fileList = Utilities::readDirectory(FLIPKART_FILE_PATH);
/* echo "<pre>";
CronComponent::snapdealImport("C:\\Users\\dipakm\\Documents\\Dipak\\Personal\\flipkart_prr\\snapdeal\\topElectronics_1.csv");
die;
 */
foreach ($fileList as $file) {
	$fileToProcess = FLIPKART_FILE_PATH . $file;
	if(CronComponent::flipkartImport($fileToProcess)) {
	
		/** Code move file to processed DIR **/
		$processedFile = PROCESSED_FILE_PATH . date('d_m_Y') . $file;
		if (copy($fileToProcess, $processedFile)) {
	  		unlink($fileToProcess);
	  		echo "<br>deleted sucessfully...";
		}
	}
}



?>