<?php
/**
 * Created by PhpStorm.
 * User: Mazulova.Ekaterina
 * Date: 12.09.2019
 * Time: 18:09
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/managers/reports/manager_activites6/ManagerActivitesFunc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/managers/reports/manager_activites6/ManagerActivitesExelFunc.php");
include_once $_SERVER['DOCUMENT_ROOT'].'/classes/security/autoloader.php';

ob_end_clean();

if (!empty($_REQUEST["dtime_from"])) $a_dtime_from =  $_REQUEST["dtime_from"];
if (!empty($_REQUEST["dtime_to"])) $a_dtime_to = $_REQUEST["dtime_to"];
if(!empty($_REQUEST["manager_id"])) $manager_id = $_REQUEST["manager_id"];
else die;


if($_SERVER["REQUEST_METHOD"] == "POST") {
	$dtime_from = date("Y-m-d", strtotime($a_dtime_from));
	$dtime_to = date("Y-m-d", strtotime($a_dtime_to . "+1 day"));

	$res = CUser::GetByID($manager_id);
	if ($ob = $res->GetNext()) $manager_name = $ob['LAST_NAME'] . ' ' . $ob['NAME'];


	$time = date("d-m-Y H:i");

	$manager_activites_exel_func = new ManagerActivitesExelFunc($dtime_from, $dtime_to);

	$report_exel = $manager_activites_exel_func->getExelReport();

	$name = 'Премиальный отчет за период ' . $a_dtime_from . '-' . $a_dtime_to . '(' . $manager_name . ' ' . $time . ').xlsx';

	$objWriter = new PHPExcel_Writer_Excel2007($report_exel);
	$objWriter->save("report.xlsx");

	$file_data = file_get_contents("report.xlsx");

	$file=[
		'name'=> $name,
		'type'=>'application/vnd.ms-excel',
		'content'=>$file_data,
		'MODULE_ID'=>"report"
	];

	$cfile = new CFile();
	$f_file_id = $cfile->SaveFile($file, "report");

	$PROP = [
		'dtime_from_report' => $a_dtime_from,
		'dtime_to_report' => $a_dtime_to,
		'file_report' => $f_file_id,
		'manager_id' => $manager_id,
		'dtime_accept' => date("d.m.Y H:i")
	];

	$arFields = array(
		"ACTIVE" => "Y",
		"IBLOCK_ID" => PREMIUM_REPORT,
		"NAME" => $name,
		"PROPERTY_VALUES" => $PROP
	);

	$oElement = new CIBlockElement();
	if($report_id = $oElement->Add($arFields)){?>
		<div>
			<h3>Отчет успешно сохранен</h3>
			<div class="tab_set">
				<a href="index.php"><input type="submit" name="rep_save" value="Сформировать новый отчет" ></a>
				<a href="archive.php"><input type="submit" name="rep_save" value="Перейти в архив" ></a>
			</div>
		</div>
		<? }
	else
		echo "Error: ".$el->LAST_ERROR;

}