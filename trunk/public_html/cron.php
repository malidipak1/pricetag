<?php
ini_set("error_reporting", true);
ini_set("display_errors", 1);
ini_set('max_execution_time', 0);
set_time_limit(0); // max execution 

define ( 'INCLUDE_DIR', dirname(dirname(__FILE__)));
define ( 'FLIPKART_FILE_PATH', 'C:\\Users\\dipakm\\Documents\\Dipak\\Personal\\flipkart_prr\\flipkart\\' );
define ( 'PROCESSED_FILE_PATH', 'C:\\Users\\dipakm\\Documents\\Dipak\\Personal\\flipkart_prr\\processed\\');
define ( 'DB_NAME', 'pricetag' );
define ( 'DB_HOST', 'localhost' );
define ( 'DB_PASSWD', '' );
define ( 'DB_USER', 'root' );

require_once INCLUDE_DIR . '/core/lib/class.utilities.php';
require_once INCLUDE_DIR . '/core/lib/class.model.php';
require_once INCLUDE_DIR . '/core/lib/class.db.mysql.php';
require_once INCLUDE_DIR . '/core/components/component.cron.php';


$fileList = Utilities::readDirectory(FLIPKART_FILE_PATH);
/* echo "<pre>";
CronComponent::snapdealImport("C:\\Users\\dipakm\\Documents\\Dipak\\Personal\\flipkart_prr\\snapdeal\\topElectronics_1.csv");
die;
 */


foreach ($fileList as $file) {
	echo $fileToProcess = FLIPKART_FILE_PATH . $file;
	if(CronComponent::flipkartImport($fileToProcess)) {
	
		/** Code move file to processed DIR **/
		$processedFile = PROCESSED_FILE_PATH . date('d_m_Y') . $file;
		if (copy($fileToProcess, $processedFile)) {
	  		unlink($fileToProcess);
	  		echo "<br>deleted sucessfully...";
		}
	}
}


CronComponent::plotCategories();

?>