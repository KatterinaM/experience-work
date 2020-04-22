<?php
/**
 * Created by PhpStorm.
 * User: Mazulova.Ekaterina
 * Date: 28.08.2019
 * Time: 17:55
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/classes/security/autoloader.php';
use ManagerActivitesFunc;


class ManagerActivitesExelFunc
{
	private $report;
	public $dtimeFrom;
	public $dtimeTo;

	public function __construct($dtimeFrom, $dtimeTo)
	{
		$this->dtimeFrom = $dtimeFrom;
		$this->dtimeTo = $dtimeTo;

		$this->managerActivitesFunc = new ManagerActivitesFunc($this->dtimeFrom, $this->dtimeTo);
		$this->report = $this->managerActivitesFunc->getReport();

		$this->columnLetter = array('B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S');

		$this->xls = new PHPExcel();
		$this->xls->setActiveSheetIndex(0);
		$this->sheet = $this->xls->getActiveSheet();
		$this->sheet->setTitle('Отчет');

		$this->style_blueborders = [
			'borders'=>[
				'allborders' => [
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => [
						'rgb' => '99bfc9'
					]
				],
			]
		];

		$this->style_alignment = [
			'alignment' => [
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'wrap'=>true
			]
		];
	}

	/**
	 * Функция сбора всей информации для Excel отчета
	 * @return PHPExcel
	 */
	public function getExelReport(){
		$dtime_from = date("d.m.Y", strtotime($this->dtimeFrom));
		$dtime_to = date("d.m.Y", strtotime($this->dtimeTo . "-1 day"));

		$this->sheet->setCellValue("A1", 'Активность менеджеров в период с ' . $dtime_from . ' по ' . $dtime_to);
		$this->sheet->mergeCells('A1:L1');

		$activeSellerInfoExel = self::activeSellerInfo($stringNo = 3);

		$callInfoExel = self::callInfo($activeSellerInfoExel);

		$adminInfoExel = self::adminInfo($callInfoExel);

		$brockerInfoExel = self::brockerInfo($adminInfoExel);

		$curatorInfoExel = self::curatorInfo($brockerInfoExel);

		$totalExel = self::totalInfo($curatorInfoExel);

		$this->sheet->getColumnDimension('A')->setWidth(4);

		foreach ($this->columnLetter as $value){
			$this->sheet->getColumnDimension($value)->setAutoSize(true);
		}

		for($i = 1; $i <= $totalExel; $i++){
			$this->sheet->getRowDimension($i)->setRowHeight(25);
		}

		$i = $i -2;
		$this->sheet->getRowDimension($i)->setRowHeight(50);

		return $this->xls;
	}

    /**
     * Функция сбора информации по активным продажам для Excel версии отчета
     * @param $stringNo
     * @return mixed
     * @throws PHPExcel_Exception
     */
	private function activeSellerInfo($stringNo){

		$this->sheet->setCellValue("B".$stringNo, 'Активные менеджеры');

		$stringNo += 1;

		$headerName = [
			'B'.$stringNo=>['title'=>'Менеджер'],
			'C'.$stringNo=>['title'=>'Обращения'],
			'D'.$stringNo=>['title'=>'Просмотры'],
			'E'.$stringNo=>['title'=>'Паровозы'],
			'F'.$stringNo=>['title'=>'Количество сделок'],
			'G'.$stringNo=>['title'=>'Площадь сделок, м2'],
			'H'.$stringNo=>['title'=>'Площадь сделок, м2'],
			'I'.$stringNo=>['title'=>'Сумма'],
		];

		$merge = 'B'.$stringNo.':I'.$stringNo;

		$headerActiveSeller = self::exelHeader($headerName, $merge);

		$stringNo += 1;

		$bodyActiveSeller = self::exelBody($group = 55, $this->report['active_seller'], $stringNo);

		$stringNoPlus = $bodyActiveSeller - 1;

		$merge = 'B'.$stringNo.':I'.$stringNoPlus;

		$this->sheet->getStyle('B'.$stringNoPlus.':I'.$stringNoPlus)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->sheet->getStyle('B'.$stringNoPlus.':I'.$stringNoPlus)->getFill()->getStartColor()->setRGB('e4ecf1');

		$this->sheet->duplicateStyleArray($this->style_blueborders,$merge,true);
		$this->sheet->duplicateStyleArray($this->style_alignment,$merge,true);


		return $bodyActiveSeller;
	}

    /**
     * Функция сбора информации по call-center для Excel версии отчета
     * @param $stringNo
     * @return mixed
     * @throws PHPExcel_Exception
     */
	private function callInfo($stringNo){

		$stringNo += 1;

		$this->sheet->setCellValue("B" . $stringNo, 'Контакт центр');

		$stringNo += 1;

		$headerName = [
			'B'.$stringNo=>['title'=>'Менеджер'],
			'C'.$stringNo=>['title'=>'Звонки'],
			'D'.$stringNo=>['title'=>'Просмотры'],
			'E'.$stringNo=>['title'=>'Количество сделок'],
			'F'.$stringNo=>['title'=>'Площадь сделок, м2'],
			'G'.$stringNo=>['title'=>'Площадь сделок, м2'],
			'H'.$stringNo=>['title'=>'Сумма'],
		];

		$merge = 'B'.$stringNo.':H'.$stringNo;

		$headerCall = self::exelHeader($headerName, $merge);

		$stringNo += 1;

		$bodyCall = self::exelBody($group = 15, $this->report['call'], $stringNo);

		$stringNoPlus = $bodyCall - 1;

		$merge = 'B'.$stringNo.':H'.$stringNoPlus;

		$this->sheet->getStyle('B'.$stringNoPlus.':H'.$stringNoPlus)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->sheet->getStyle('B'.$stringNoPlus.':H'.$stringNoPlus)->getFill()->getStartColor()->setRGB('e4ecf1');

		$this->sheet->duplicateStyleArray($this->style_blueborders,$merge,true);
		$this->sheet->duplicateStyleArray($this->style_alignment,$merge,true);

		return $bodyCall;
	}

    /**
     * Функция сбора информации по Администраторам площадок для Excel версии отчета
     * @param $stringNo
     * @return mixed
     * @throws PHPExcel_Exception
     */
	private function adminInfo($stringNo){

		$stringNo += 1;

		$this->sheet->setCellValue("B" . $stringNo, 'Администраторы площадок');

		$stringNo += 1;

		$stringNoPlus = $stringNo + 1;

		$headerName = [
			'B'.$stringNo=>['range'=>'B'.$stringNo.':B'.$stringNoPlus,'title'=>'Менеджер'],
			'C'.$stringNo=>['range'=>'C'.$stringNo.':D'.$stringNo,'title'=>'Просмотры'],
			'C'.$stringNoPlus=>['title'=>'премиальные'],
			'D'.$stringNoPlus=>['title'=>'не премиальные'],
			'E'.$stringNo=>['range'=>'E'.$stringNo.':F'.$stringNo,'title'=>'Принятые помещения'],
			'E'.$stringNoPlus=>['title'=>'Количество'],
			'F'.$stringNoPlus=>['title'=>'Площадь'],
            'G'.$stringNo=>['range'=>'G'.$stringNo.':H'.$stringNo,'title'=>'Количество сделок'],
			'G'.$stringNoPlus=>['title'=>'премиальные'],
			'H'.$stringNoPlus=>['title'=>'не премиальные'],
			'I'.$stringNo=>['range'=>'I'.$stringNo.':I'.$stringNoPlus,'title'=>'Площадь сделок, м2'],
			'J'.$stringNo=>['range'=>'J'.$stringNo.':J'.$stringNoPlus,'title'=>'Поток сделок, руб.'],
			'K'.$stringNo=>['range'=>'K'.$stringNo.':K'.$stringNoPlus,'title'=>'Сумма'],
		];

		$merge = 'B'.$stringNo.':K'.$stringNoPlus;

		$headerAdmin = self::exelHeader($headerName, $merge);

		$stringNo += 2;

		$bodyAdmin = self::exelBody($group = 30, $this->report['admin'], $stringNo);

		$stringNoPlus = $bodyAdmin - 1;

		$merge = 'B'.$stringNo.':K'.$stringNoPlus;

		$this->sheet->getStyle('B'.$stringNoPlus.':K'.$stringNoPlus)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->sheet->getStyle('B'.$stringNoPlus.':K'.$stringNoPlus)->getFill()->getStartColor()->setRGB('e4ecf1');

		$this->sheet->duplicateStyleArray($this->style_blueborders,$merge,true);
		$this->sheet->duplicateStyleArray($this->style_alignment,$merge,true);

		return $bodyAdmin;
	}

    /**
     * Функция сбора информации по Брокерам для Excel версии отчета
     * @param $stringNo
     * @return mixed
     * @throws PHPExcel_Exception
     */
	private function brockerInfo($stringNo){

		$stringNo += 1;

		$this->sheet->setCellValue("B" . $stringNo, 'Брокеры');

		$stringNo += 1;

		$stringNoPlus = $stringNo + 1;

        $headerName = [
            'B'.$stringNo=>['range'=>'B'.$stringNo.':B'.$stringNoPlus,'title'=>'Менеджер'],
            'C'.$stringNo=>['range'=>'C'.$stringNo.':D'.$stringNo,'title'=>'Просмотры'],
            'C'.$stringNoPlus=>['title'=>'премиальные'],
            'D'.$stringNoPlus=>['title'=>'не премиальные'],
            'E'.$stringNo=>['range'=>'E'.$stringNo.':F'.$stringNo,'title'=>'Принятые помещения'],
            'E'.$stringNoPlus=>['title'=>'Количество'],
            'F'.$stringNoPlus=>['title'=>'Площадь'],
            'G'.$stringNo=>['range'=>'G'.$stringNo.':H'.$stringNo,'title'=>'Количество сделок'],
            'G'.$stringNoPlus=>['title'=>'премиальные'],
            'H'.$stringNoPlus=>['title'=>'не премиальные'],
            'I'.$stringNo=>['range'=>'I'.$stringNo.':I'.$stringNoPlus,'title'=>'Площадь сделок, м2'],
            'J'.$stringNo=>['range'=>'J'.$stringNo.':J'.$stringNoPlus,'title'=>'Поток сделок, руб.'],
            'K'.$stringNo=>['range'=>'K'.$stringNo.':K'.$stringNoPlus,'title'=>'Сумма'],
        ];

		$merge = 'B'.$stringNo.':K'.$stringNoPlus;

		$headerBrocker = self::exelHeader($headerName, $merge);

		$stringNo += 2;

		$bodyBrocker = self::exelBody($group = 29, $this->report['brocker'], $stringNo);

		$stringNoPlus = $bodyBrocker - 1;

		$merge = 'B'.$stringNo.':K'.$stringNoPlus;

		$this->sheet->getStyle('B'.$stringNoPlus.':K'.$stringNoPlus)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->sheet->getStyle('B'.$stringNoPlus.':K'.$stringNoPlus)->getFill()->getStartColor()->setRGB('e4ecf1');

		$this->sheet->duplicateStyleArray($this->style_blueborders,$merge,true);
		$this->sheet->duplicateStyleArray($this->style_alignment,$merge,true);

		return $bodyBrocker;
	}

    /**
     *  Функция сбора информации по Кураторам для Excel версии отчета
     * @param $stringNo
     * @return mixed
     * @throws PHPExcel_Exception
     */
	private function curatorInfo($stringNo){

		$stringNo += 1;

		$this->sheet->setCellValue("B" . $stringNo, 'Кураторы');

        $stringNo += 1;

        $stringNoPlus = $stringNo + 1;

		$headerName = [
            'B'.$stringNo=>['range'=>'B'.$stringNo.':B'.$stringNoPlus,'title'=>'Менеджер'],
			'C'.$stringNo=>['range'=>'C'.$stringNo.':C'.$stringNoPlus,'title'=>'Просмотры'],
            'D'.$stringNo=>['range'=>'D'.$stringNo.':E'.$stringNo,'title'=>'Принятые помещения'],
            'D'.$stringNoPlus=>['title'=>'Количество'],
            'E'.$stringNoPlus=>['title'=>'Площадь'],
			'F'.$stringNo=>['range'=>'F'.$stringNo.':F'.$stringNoPlus,'title'=>'Количество сделок'],
			'G'.$stringNo=>['range'=>'G'.$stringNo.':G'.$stringNoPlus,'title'=>'Площадь сделок, м2'],
			'H'.$stringNo=>['range'=>'H'.$stringNo.':H'.$stringNoPlus,'title'=>'Поток сделок, руб.'],
			'I'.$stringNo=>['range'=>'I'.$stringNo.':I'.$stringNoPlus,'title'=>'Сумма'],
		];

		$merge = 'B'.$stringNo.':I'.$stringNo;

		$headerCurator = self::exelHeader($headerName, $merge);

		$stringNo += 1;

		$bodyCurator = self::exelBody($group = 35, $this->report['curator'], $stringNo);

		$stringNoPlus = $bodyCurator - 1;

		$merge = 'B'.$stringNo.':I'.$stringNoPlus;

		$this->sheet->getStyle('B'.$stringNoPlus.':I'.$stringNoPlus)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->sheet->getStyle('B'.$stringNoPlus.':I'.$stringNoPlus)->getFill()->getStartColor()->setRGB('e4ecf1');

		$this->sheet->duplicateStyleArray($this->style_blueborders,$merge,true);
		$this->sheet->duplicateStyleArray($this->style_alignment,$merge,true);

		return $bodyCurator;
	}

    /**
     * Функция для сбора информации строки ВСЕГО  для Excel версии отчета
     * @param $stringNo
     * @return mixed
     * @throws PHPExcel_Exception
     */
	private function totalInfo($stringNo){

		$stringNo += 1;

		$this->sheet->setCellValue("B" . $stringNo, 'Итого');

		$stringNo += 1;

		$stringNoPlus = $stringNo + 1;

		$headerName = [
			'B'.$stringNo=>['range'=>'B'.$stringNo.':B'.$stringNoPlus,'title'=>'Звонки'],
			'C'.$stringNo=>['range'=>'C'.$stringNo.':C'.$stringNoPlus,'title'=>'Обращения'],
			'D'.$stringNo=>['range'=>'D'.$stringNo.':G'.$stringNo,'title'=>'Просмотры'],
			'D'.$stringNoPlus=>['title'=>'Назначено просмотров'],
			'E'.$stringNoPlus=>['title'=>'Создано актов '.PHP_EOL.'просмотров'],
			'F'.$stringNoPlus=>['title'=>'Акты просмотров, '.PHP_EOL.'по которым начислена '.PHP_EOL.'премия'],
			'G'.$stringNoPlus=>['title'=>'Акты просмотров '.PHP_EOL.'без премии'],
            'H'.$stringNo=>['range'=>'H'.$stringNo.':I'.$stringNo,'title'=>'Принятые помещение'],
            'H'.$stringNoPlus=>['title'=>'Количество'],
            'I'.$stringNoPlus=>['title'=>'Площадь'],
			'J'.$stringNo=>['range'=>'J'.$stringNo.':M'.$stringNo,'title'=>'Сделки'],
			'J'.$stringNoPlus=>['title'=>'Количество сделок'],
			'K'.$stringNoPlus=>['title'=>'Площадь сделок, м2'],
			'L'.$stringNoPlus=>['title'=>'Поток сделок, руб.'],
			'M'.$stringNoPlus=>['title'=>'Затраты сделок, руб.'],
			'N'.$stringNo=>['range'=>'N'.$stringNo.':N'.$stringNoPlus,'title'=>'Сумма, руб.'],
		];

		$merge = 'B'.$stringNo.':N'.$stringNoPlus;

		$headerTotal = self::exelHeader($headerName, $merge);

		$stringNo += 2;

		$bodyTotal = self::exelBody($group = 1, $this->report['all_total'], $stringNo);

		$stringNoPlus = $bodyTotal;

		$merge = 'B'.$stringNo.':N'.$stringNoPlus;

		$this->sheet->duplicateStyleArray($this->style_blueborders,$merge,true);
		$this->sheet->duplicateStyleArray($this->style_alignment,$merge,true);

		return $bodyTotal;
	}

    /**
     * Функция сбора детализации информации по активным продажам и call-center для Excel версии отчета
     * @param $detail
     * @param $userName
     * @param $i
     * @param bool $group
     * @throws PHPExcel_Exception
     */
	private function detailActiveSellerAndCalls($detail, $userName, $i, $group = false){
		$sheetDetail = $this->xls->getSheetByName($userName);
		$sheetDetail->setCellValue('B1', $userName);
		$sheetDetail->mergeCells('B1:D1');
		$sheetDetail->setCellValue('F1', "Назад к отчету");
		$sheetDetail->getCell('F1')->getHyperlink()->setUrl("sheet://'Отчет'!B".$i);
		$stringNewNo = 3;
		$sheetDetail->setCellValue('B'.$stringNewNo, "Обращения");

		$stringNewNo += 1;

		$headerName = ['Дата обращения', 'Телефон', 'Ф.И.О.', 'Назначение', 'S от, кв.м.', 'S до, кв.м.', 'Откуда узнали', 'Фирма', 'E-mail', 'Результат', 'Контроль', 'Объекты', 'Выбранные помещения'];

		$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column = 12);

		$stringNewNo += 1;

		$body = self::detailRequestExelBody($sheetDetail, $stringNewNo, $detail['request']);

		$stringNewNo = $body + 1;

		$sheetDetail->setCellValue('B'.$stringNewNo, "Просмотры");
		$stringNewNo += 1;
		$headerName = ['Время', 'Длит. (мин.)', 'Помещения', 'Задача', 'Закрыто', 'Отчет', 'Акт'];

		$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column = 6);

		$stringNewNo += 1;

		$body = self::detailViewCallAndSellerExelBody($sheetDetail, $stringNewNo, $detail['view']);

		$stringNewNo = $body + 1;

		$sheetDetail->setCellValue('B'.$stringNewNo, "Сделки");

		$stringNewNo += 1;

		$headerName = ['ID сделки', 'Объект', 'Компания', 'Агентство', 'Площадь', 'Сумма сделки', 'Затраты сделки', 'Процент', 'Премия'];

		$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column = 8);

		$stringNewNo += 1;

		$body = self::detailDealCallAndSellerExelBody($sheetDetail, $stringNewNo, $detail['deal']);

		$with = [18, 20, 30, 30, 18, 18, 25, 25, 25, 15, 12, 25, 30];

		$this->sheet->getColumnDimension('A')->setWidth(4);

		self::setWidthColumn($with, $sheetDetail);

		for($i = 1; $i <= $body; $i++){
			$sheetDetail->getRowDimension($i)->setRowHeight(30);
		}
	}

    /**
     * Функция сбора детализации просмотров
     * @param $detail
     * @param $userName
     * @param $i
     * @param bool $group
     * @throws PHPExcel_Exception
     */
	private function detailActive($detail, $userName, $i, $group = false){
		$sheetDetail = $this->xls->getSheetByName($userName);
		$sheetDetail->setCellValue('B1', $userName);
		$sheetDetail->mergeCells('B1:D1');
		$sheetDetail->setCellValue('F1', "Назад к отчету");
		$sheetDetail->getCell('F1')->getHyperlink()->setUrl("sheet://'Отчет'!B".$i);
		$stringNewNo = 3;

		$sheetDetail->setCellValue('B'.$stringNewNo, "Премиальные просмотры");

		$stringNewNo += 1;

		$headerName = ['Время', 'Вид просмотра', 'Длит. (мин.)', 'Паровоз', 'Принято', 'Помещения', 'Задача'];

		$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column = 6);

		$stringNewNo += 1;

		$body = self::detailViewExelBody($sheetDetail, $stringNewNo, $detail['view']['view_cash']);

		$stringNewNo = $body + 1;

		if($group != 35){

			$sheetDetail->setCellValue('B'.$stringNewNo, "Не премиальные просмотры");

			$stringNewNo += 1;

			$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column = 6);

			$stringNewNo += 1;

			$body = self::detailViewExelBody($sheetDetail, $stringNewNo, $detail['view']['view_no_cash']);

			$stringNewNo = $body + 1;
		}

		$sheetDetail->setCellValue('B'.$stringNewNo, "Премиальные сделки");

		$stringNewNo += 1;

		if($group == 29){
			$headerName = ['ID сделки', 'Тип расчета', 'Объект', 'Компания', 'Площадь', 'Сумма сделки', 'Затраты сделки', 'Премия брокера'];
			$column = 7;
		}
		else {
			$headerName = ['ID сделки', 'Объект', 'Компания', 'Площадь', 'Сумма сделки', 'Затраты сделки', 'Премия брокера'];
			$column = 6;
		}

		$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column);

		$stringNewNo += 1;

		$body = self::detailDealExelBody($sheetDetail, $stringNewNo, $detail['deal']['dieal_cash'], $group);

		$stringNewNo = $body + 1;

		if($group != 35) {

			$sheetDetail->setCellValue('B' . $stringNewNo, "Не премиальные сделки");

			$stringNewNo += 1;

			$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column);

			$stringNewNo += 1;

			$body = self::detailDealExelBody($sheetDetail, $stringNewNo, $detail['deal']['deal_no_cash'], $group);
		}

		$with = [18, 20, 25, 20, 20, 30, 30, 18, 25];

		$this->sheet->getColumnDimension('A')->setWidth(4);

		self::setWidthColumn($with, $sheetDetail);

		for($i = 1; $i <= $body; $i++){
			$sheetDetail->getRowDimension($i)->setRowHeight(30);
		}
	}

    /**
     * Функция сбора детализации обращений
     * @param $sheetDetail
     * @param $stringNo
     * @param $detailRequest
     * @return mixed
     */
	private function detailRequestExelBody($sheetDetail, $stringNo, $detailRequest){
		$i = $stringNo;
		foreach ($detailRequest as $key => $value) {
			$sheetDetail->setCellValue('B' . $i, $value['dtime']);
			$sheetDetail->setCellValue('C' . $i, $value['phone']);
			$sheetDetail->setCellValue('D' . $i, $value['fio']);
			$sheetDetail->setCellValue('E' . $i, $value['type']);
			$sheetDetail->setCellValue('F' . $i, $value['s1']);
			$sheetDetail->setCellValue('G' . $i, $value['s2']);
			$sheetDetail->setCellValue('H' . $i, $value['from']);
			$sheetDetail->setCellValue('I' . $i, $value['organization']);
			$sheetDetail->setCellValue('J' . $i, $value['email']);
			$sheetDetail->setCellValue('K' . $i, $value['result']);
			$sheetDetail->setCellValue('L' . $i, $value['control']);
			$sheetDetail->setCellValue('M' . $i, $value['bc_name']);
			if (count($value['objects_id']) > 1) {
				$b = $i + (count($value['objects_id']) - 1);
				for ($a = 0; $a <= 11; $a++) {
					$sheetDetail->mergeCells($this->columnLetter[$a] . $i . ":" . $this->columnLetter[$a] . $b);
				}

				foreach ($value['objects_id'] as $objects_id) {
					$sheetDetail->setCellValue('N' . $i, $value['objects_name'][$objects_id]);
					$sheetDetail->getCell('N' . $i)->getHyperlink()->setUrl($value['objects_path'][$objects_id]);
					$i++;
				}
				$i--;
			} elseif (count($value['objects_id']) == 1) {
				$objects_id = $value['objects_id'][0];
				$sheetDetail->setCellValue('N' . $i, $value['objects_name'][$objects_id]);
				$sheetDetail->getCell('N' . $i)->getHyperlink()->setUrl($value['objects_path'][$objects_id]);
			}

			$i++;
		}

		$stringEnd = $i - 1;

		$merge = 'B'.$stringNo.':N'.$stringEnd;

		$sheetDetail->duplicateStyleArray($this->style_blueborders,$merge,true);
		$sheetDetail->duplicateStyleArray($this->style_alignment,$merge,true);

		return $i;
	}

    /**
     * Функция сбора детализации просмотров по активным продажам и call-center для Excel версии отчета
     * @param $sheetDetail
     * @param $stringNo
     * @param $detailView
     * @return mixed
     */
	private function detailViewCallAndSellerExelBody($sheetDetail, $stringNo, $detailView){
		$i = $stringNo;
		foreach ($detailView as $key => $value) {
			$sheetDetail->setCellValue('B' . $i, $value['dtime']);
			$sheetDetail->setCellValue('C' . $i, $value['minutes']);
			$sheetDetail->setCellValue('E' . $i, $value['comment']);
			$sheetDetail->setCellValue('F' . $i, $value['is_closed']);
			$sheetDetail->setCellValue('G' . $i, $value['comments_closed']);
			$sheetDetail->setCellValue('H' . $i, $value['act_no']);

			if(count($value['objects_id']) > 1){
				$b = $i + (count($value['objects_id']) - 1);
				for ($a = 0; $a <= 6; $a++){
					if($a !== 2)
						$sheetDetail->mergeCells($this->columnLetter[$a].$i.":".$this->columnLetter[$a].$b);
				}

				foreach ($value['objects_id'] as $objects_id){
					$sheetDetail->setCellValue('D'.$i, $value['objects_name'][$objects_id]);
					$sheetDetail->getCell('D'.$i)->getHyperlink()->setUrl($value['objects_path'][$objects_id]);
					$i++;
				}
				$i--;
			}
			elseif(count($value['objects_id']) == 1){
				$objects_id = $value['objects_id'][0];
				$sheetDetail->setCellValue('D'.$i, $value['objects_name'][$objects_id]);
				$sheetDetail->getCell('D'.$i)->getHyperlink()->setUrl($value['objects_path'][$objects_id]);
			}
			$i++;
		}

		$stringEnd = $i - 1;

		$merge = 'B'.$stringNo.':H'.$stringEnd;

		$sheetDetail->duplicateStyleArray($this->style_blueborders,$merge,true);
		$sheetDetail->duplicateStyleArray($this->style_alignment,$merge,true);

		return $i;
	}

    /**
     * Функция сбора детализации сделок по активным продажам и call-center для Excel версии отчета
     * @param $sheetDetail
     * @param $stringNo
     * @param $detailDeal
     * @return mixed
     */
	private function detailDealCallAndSellerExelBody($sheetDetail, $stringNo, $detailDeal){
		$i = $stringNo;
		foreach ($detailDeal as $key => $value) {
			$sheetDetail->setCellValue('B' . $i, $value['id']);
			$sheetDetail->setCellValue('C' . $i, $value['bc_name']);
			$sheetDetail->setCellValue('D' . $i, $value['organization']);
			if($value['agent_id'] !== '-1') $agent = $value['agent_id'];
			else $agent = '-';
			$sheetDetail->setCellValue('E' . $i, $agent);
			$sheetDetail->setCellValue('F' . $i, $value['s']);
			$sheetDetail->setCellValue('G' . $i, $value['deal_sum']);
			$sheetDetail->setCellValue('H' . $i, $value['deal_cost']);
			$sheetDetail->setCellValue('I' . $i, $value['percent_active']);
			$sheetDetail->setCellValue('J' . $i, $value['premium_active']);

			$i++;

		}

		$stringEnd = $i - 1;

		$merge = 'B'.$stringNo.':J'.$stringEnd;

		$sheetDetail->duplicateStyleArray($this->style_blueborders,$merge,true);
		$sheetDetail->duplicateStyleArray($this->style_alignment,$merge,true);

		return $i;
	}

    /**
     * Функция сбора детализации сделок
     * @param $sheetDetail
     * @param $stringNo
     * @param $detailDeal
     * @param bool $group
     * @return mixed
     */
	private function detailDealExelBody($sheetDetail, $stringNo, $detailDeal, $group = false){
		$i = $stringNo;
		foreach ($detailDeal as $key => $value) {
			$sheetDetail->setCellValue('B' . $i, $value['id']);
			if($group == 29 or $group == 1){
				$sheetDetail->setCellValue('C' . $i, $value['calculation_type']);
				$sheetDetail->setCellValue('D' . $i, $value['bc_name']);
				$sheetDetail->setCellValue('E' . $i, $value['organization']);
				$sheetDetail->setCellValue('F' . $i, $value['s']);
				$sheetDetail->setCellValue('G' . $i, $value['deal_sum']);
				$sheetDetail->setCellValue('H' . $i, $value['deal_cost']);
				if($group != 1) $sheetDetail->setCellValue('I' . $i, $value['premium']);
			}
			else {
				$sheetDetail->setCellValue('C' . $i, $value['bc_name']);
				$sheetDetail->setCellValue('D' . $i, $value['organization']);
				$sheetDetail->setCellValue('E' . $i, $value['s']);
				$sheetDetail->setCellValue('F' . $i, $value['deal_sum']);
				$sheetDetail->setCellValue('G' . $i, $value['deal_cost']);
				$sheetDetail->setCellValue('H' . $i, $value['premium']);
			}

			$i++;
		}

		$stringEnd = $i - 1;

		if($group == 29) $merge = 'B'.$stringNo.':I'.$stringEnd;
		else $merge = 'B'.$stringNo.':H'.$stringEnd;

		$sheetDetail->duplicateStyleArray($this->style_blueborders,$merge,true);
		$sheetDetail->duplicateStyleArray($this->style_alignment,$merge,true);

		return $i;
	}

    /**
     * Функция сбора детализации просмотров
     * @param $sheetDetail
     * @param $stringNo
     * @param $detailView
     * @return mixed
     */
	private function detailViewExelBody($sheetDetail, $stringNo, $detailView){
		$i = $stringNo;
		foreach ($detailView as $key => $value) {
			$sheetDetail->setCellValue('B' . $i, $value['dtime']);
			$sheetDetail->setCellValue('C' . $i, $value['view_type']);
			$sheetDetail->setCellValue('D' . $i, $value['minutes']);
			$sheetDetail->setCellValue('E' . $i, $value['lead_name']);
			$sheetDetail->getCell('E' . $i)->getHyperlink()->setUrl($value['lead_pash']);
			$sheetDetail->setCellValue('F' . $i, $value['dtime_accept']);
			$sheetDetail->setCellValue('H' . $i, $value['comment']);

			if(count($value['object_id']) > 1){
				$b = $i + (count($value['object_id']) - 1);
				for ($a = 0; $a <= 6; $a++){
					if($a !== 5)
						$sheetDetail->mergeCells($this->columnLetter[$a].$i.":".$this->columnLetter[$a].$b);
				}

				foreach ($value['object_id'] as $objects_id){
					$sheetDetail->setCellValue('G'.$i, $value['objects_name'][$objects_id]);
					$sheetDetail->getCell('G'.$i)->getHyperlink()->setUrl($value['objects_path'][$objects_id]);
					$i++;
				}
				$i--;
			}
			elseif(count($value['object_id']) == 1){
				$objects_id = $value['object_id'][0];
				$sheetDetail->setCellValue('G'.$i, $value['objects_name'][$objects_id]);
				$sheetDetail->getCell('G'.$i)->getHyperlink()->setUrl($value['objects_path'][$objects_id]);
			}

			$i++;
		}

		$stringEnd = $i - 1;

		$merge = 'B'.$stringNo.':H'.$stringEnd;

		$sheetDetail->duplicateStyleArray($this->style_blueborders,$merge,true);
		$sheetDetail->duplicateStyleArray($this->style_alignment,$merge,true);

		return $i;
	}

    /**
     * Функция сбора детализации всех обращений
     * @param $detail
     * @param $name
     * @param $i
     * @throws PHPExcel_Exception
     */
	private function detailAllRequest($detail, $name, $i){
		$sheetDetail = $this->xls->getSheetByName($name);
		$sheetDetail->setCellValue('B1', $name);
		$sheetDetail->mergeCells('B1:D1');
		$sheetDetail->setCellValue('F1', "Назад к отчету");
		$sheetDetail->getCell('F1')->getHyperlink()->setUrl("sheet://'Отчет'!B".$i);
		$stringNewNo = 3;

		$headerName = ['Дата обращения', 'Телефон', 'Ф.И.О.', 'Назначение', 'S от, кв.м.', 'S до, кв.м.', 'Откуда узнали', 'Фирма', 'E-mail', 'Результат', 'Контроль', 'Объекты', 'Выбранные помещения'];

		$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column = 12);

		$stringNewNo += 1;

		$body = self::detailRequestExelBody($sheetDetail, $stringNewNo, $detail);

		$with = [18, 18, 21, 15, 15, 15, 20, 25, 25, 15, 12, 25, 27];

		$sheetDetail->getColumnDimension('A')->setWidth(4);

		self::setWidthColumn($with, $sheetDetail);

		for($i = 1; $i <= $body; $i++){
			$sheetDetail->getRowDimension($i)->setRowHeight(30);
		}
	}

    /**
     * Функция сбора детализации всех заданий просмотра
     * @param $detail
     * @param $name
     * @param $i
     * @throws PHPExcel_Exception
     */
	private function detailAllViewJob($detail, $name, $i){
		$sheetDetail = $this->xls->getSheetByName($name);
		$sheetDetail->setCellValue('B1', $name);
		$sheetDetail->mergeCells('B1:D1');
		$sheetDetail->setCellValue('F1', "Назад к отчету");
		$sheetDetail->getCell('F1')->getHyperlink()->setUrl("sheet://'Отчет'!D" . $i);
		$stringNewNo = 3;

		$headerName = ['Время', 'Длит. (мин.)', 'Помещения', 'Задача', 'Закрыто', 'Отчет', 'Акт'];

		$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column = 6);

		$stringNewNo += 1;

		$body = self::detailViewCallAndSellerExelBody($sheetDetail, $stringNewNo, $detail);

		$with = [18, 15, 30, 30, 15, 20, 15];

		$sheetDetail->getColumnDimension('A')->setWidth(4);

		self::setWidthColumn($with, $sheetDetail);

		for($i = 1; $i <= $body; $i++){
			$sheetDetail->getRowDimension($i)->setRowHeight(30);
		}
	}

    /**
     * Функция сбора детализации всех просмотра
     * @param $detail
     * @param $name
     * @param $i
     * @throws PHPExcel_Exception
     */
	private function detailAllView($detail, $name, $i)
	{
		$sheetDetail = $this->xls->getSheetByName($name);
		$sheetDetail->setCellValue('B1', $name);
		$sheetDetail->mergeCells('B1:D1');
		$sheetDetail->setCellValue('F1', "Назад к отчету");
		$sheetDetail->getCell('F1')->getHyperlink()->setUrl("sheet://'Отчет'!E" . $i);
		$stringNewNo = 3;

		$headerName = ['Время', 'Вид просмотра', 'Длит. (мин.)', 'Паровоз', 'Принято', 'Помещения', 'Задача'];

		$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column = 6);

		$stringNewNo += 1;

		$body = self::detailViewExelBody($sheetDetail, $stringNewNo, $detail);

		$with = [18, 20, 18, 25, 18, 30, 30];

		$sheetDetail->getColumnDimension('A')->setWidth(4);

		self::setWidthColumn($with, $sheetDetail);

		for($i = 1; $i <= $body; $i++){
			$sheetDetail->getRowDimension($i)->setRowHeight(30);
		}
	}

    /**
     * Функция сбора детализации всех сделок
     * @param $detail
     * @param $name
     * @param $i
     * @throws PHPExcel_Exception
     */
	private function detailAllDeal($detail, $name, $i){
		$sheetDetail = $this->xls->getSheetByName($name);
		$sheetDetail->setCellValue('B1', $name);
		$sheetDetail->mergeCells('B1:D1');
		$sheetDetail->setCellValue('F1', "Назад к отчету");
		$sheetDetail->getCell('F1')->getHyperlink()->setUrl("sheet://'Отчет'!B" . $i);
		$stringNewNo = 3;

		$headerName = ['ID сделки', 'Тип расчета', 'Объект', 'Компания', 'Площадь', 'Сумма сделки', 'Затраты сделки'];

		$header = self::detailExelHeader($headerName, $sheetDetail, $stringNewNo, $column = 6);

		$stringNewNo += 1;

		$body = self::detailDealExelBody($sheetDetail, $stringNewNo, $detail, $group = 1);

		$with = [18, 18, 21, 18, 25, 25, 30, 25, 25, 12, 12, 25, 25];

		$sheetDetail->getColumnDimension('A')->setWidth(4);

		self::setWidthColumn($with, $sheetDetail);

		for($i = 1; $i <= $body; $i++){
			$sheetDetail->getRowDimension($i)->setRowHeight(30);
		}
	}

    /**
     * Функция создания заголовков отчета
     * @param $headerName
     * @param $merge
     * @throws PHPExcel_Exception
     */
	private function exelHeader($headerName, $merge){
		foreach ($headerName as $key => $value){
			$this->sheet->setCellValue($key,$value['title']);
			if(!empty($value['range'])) $this->sheet->mergeCells($value['range']);

			$this->sheet->getStyle($key)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$this->sheet->getStyle($key)->getFill()->getStartColor()->setRGB('e4ecf1');
		}

		$this->sheet->duplicateStyleArray($this->style_blueborders,$merge,true);
		$this->sheet->duplicateStyleArray($this->style_alignment,$merge,true);
	}

    /**
     * Функция создания тела отчета
     * @param $group
     * @param $report
     * @param $stringNo
     * @return mixed
     * @throws PHPExcel_Exception
     */
	private function exelBody($group, $report, $stringNo){
		$i = $stringNo;
		if($group == 55){
			foreach($report as $userId => $userInfo){
				if(!empty($userInfo['name'])){
					$this->sheet->setCellValue('B'.$i, $userInfo['name']);
					if($userInfo['active'] == 'N')
						$this->sheet->getStyle('B'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');

					$this->sheet->setCellValue('C'.$i, count($userInfo['request']));
					$detail['request'] = $this->managerActivitesFunc->detailRequest($userId);

					$this->sheet->setCellValue('D'.$i, count($userInfo['view']));
					$detail['view'] = $this->managerActivitesFunc->detailViewJob($userId);

					$this->sheet->setCellValue('E'.$i, count($userInfo['lead']));

					$this->sheet->setCellValue('F'.$i, count($userInfo['deal_id']));
					$detail['deal'] = $this->managerActivitesFunc->detailDealActiveSellerAndCall($userId, $userInfo['group']);

					if(empty($userInfo['deal_s'])) $this->sheet->setCellValue('G'.$i, 0);
					else $this->sheet->setCellValue('G'.$i, $userInfo['deal_s']);

					if(empty($userInfo['deal_sum'])) $this->sheet->setCellValue('H'.$i, 0);
					else $this->sheet->setCellValue('H'.$i, CurrencyFormat($userInfo['deal_sum'], 'RUR'));

					if($userInfo['active'] == 'N'){
						if(empty($userInfo['premium_sum_no_accept'])) $this->sheet->setCellValue('I'.$i, 0);
						else $this->sheet->setCellValue('I'.$i, CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR'));
						$this->sheet->getStyle('I'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');
					}
					else{
						if(empty($userInfo['premium_sum'])) $this->sheet->setCellValue('I'.$i, 0);
						else $this->sheet->setCellValue('I'.$i, CurrencyFormat($userInfo['premium_sum'], 'RUR'));
					}

					$newSheet = new PHPExcel_Worksheet($this->xls, $userInfo['name']);
					$this->xls->addSheet($newSheet, 1);
					$this->sheet->getCell('B'.$i)->getHyperlink()->setUrl("sheet://'".$userInfo['name']."'!B".$i);

					$detailExel = self::detailActiveSellerAndCalls($detail, $userInfo['name'], $i, $userInfo['group']);

					$i++;
				}
				if(!empty($userId == 'total')){
					$this->sheet->setCellValue('B'.$i, 'Активные менеджеры ИТОГО:');

					if(empty($userInfo['all_request'])) $this->sheet->setCellValue('C'.$i, 0);
					else $this->sheet->setCellValue('C'.$i, $userInfo['all_request']);

					if(empty($userInfo['all_view'])) $this->sheet->setCellValue('D'.$i, 0);
					else $this->sheet->setCellValue('D'.$i, $userInfo['all_view']);

					if(empty($userInfo['all_lead'])) $this->sheet->setCellValue('E'.$i, 0);
					else $this->sheet->setCellValue('E'.$i, $userInfo['all_lead']);

					if(empty($userInfo['all_deal'])) $this->sheet->setCellValue('F'.$i, 0);
					else $this->sheet->setCellValue('F'.$i, $userInfo['all_deal']);

					if(empty($userInfo['all_deal_s'])) $this->sheet->setCellValue('G'.$i, 0);
					else $this->sheet->setCellValue('G'.$i, $userInfo['all_deal_s']);

					if(empty($userInfo['all_deal_sum'])) $this->sheet->setCellValue('H'.$i, 0);
					else $this->sheet->setCellValue('H'.$i, CurrencyFormat($userInfo['all_deal_sum'], 'RUR'));

					if(empty($userInfo['all_premium'])) $this->sheet->setCellValue('I'.$i, 0);
					else $this->sheet->setCellValue('I'.$i, CurrencyFormat($userInfo['all_premium'], 'RUR'));
					$i++;
				}
			}
		}

		if($group == 15){
			foreach($report as $userId => $userInfo){
				if(!empty($userInfo['name'])){

					$this->sheet->setCellValue('B'.$i, $userInfo['name']);
					if($userInfo['active'] == 'N')
						$this->sheet->getStyle('B'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');

					$this->sheet->setCellValue('C'.$i, count($userInfo['call']));
					$detail['request'] = $this->managerActivitesFunc->detailRequest($userId);

					$this->sheet->setCellValue('D'.$i, count($userInfo['view']));
					$detail['view'] = $this->managerActivitesFunc->detailViewJob($userId);

					$this->sheet->setCellValue('E'.$i, count($userInfo['deal_id']));
					$detail['deal'] = $this->managerActivitesFunc->detailDealActiveSellerAndCall($userId, $userInfo['group']);

					if(empty($userInfo['deal_s'])) $this->sheet->setCellValue('F'.$i, 0);
					else $this->sheet->setCellValue('F'.$i, $userInfo['deal_s']);

					if(empty($userInfo['deal_sum'])) $this->sheet->setCellValue('G'.$i, 0);
					else $this->sheet->setCellValue('G'.$i, CurrencyFormat($userInfo['deal_sum'], 'RUR'));

					if($userInfo['active'] == 'N'){
						if(empty($userInfo['premium_sum_no_accept'])) $this->sheet->setCellValue('H'.$i, 0);
						else $this->sheet->setCellValue('H'.$i, CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR'));
						$this->sheet->getStyle('H'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');
					}
					else{
						if(empty($userInfo['premium_sum'])) $this->sheet->setCellValue('H'.$i, 0);
						else $this->sheet->setCellValue('H'.$i, CurrencyFormat($userInfo['premium_sum'], 'RUR'));
					}

					$newSheet = new PHPExcel_Worksheet($this->xls, $userInfo['name']);
					$this->xls->addSheet($newSheet, 1);
					$this->sheet->getCell('B'.$i)->getHyperlink()->setUrl("sheet://'".$userInfo['name']."'!B3");

					$detailExel = self::detailActiveSellerAndCalls($detail, $userInfo['name'], $i, $userInfo['group']);

					$i++;
				}
				if(!empty($userId == 'total')){
					$this->sheet->setCellValue('B'.$i, 'Контакт центр ИТОГО:');

					if(empty($userInfo['all_call'])) $this->sheet->setCellValue('C'.$i, 0);
					else $this->sheet->setCellValue('C'.$i, $userInfo['all_call']);

					if(empty($userInfo['all_view'])) $this->sheet->setCellValue('D'.$i, 0);
					else $this->sheet->setCellValue('D'.$i, $userInfo['all_view']);

					if(empty($userInfo['all_deal'])) $this->sheet->setCellValue('E'.$i, 0);
					else $this->sheet->setCellValue('E'.$i, $userInfo['all_deal']);

					if(empty($userInfo['all_deal_s'])) $this->sheet->setCellValue('F'.$i, 0);
					else $this->sheet->setCellValue('F'.$i, $userInfo['all_deal_s']);

					if(empty($userInfo['all_deal_sum'])) $this->sheet->setCellValue('G'.$i, 0);
					else $this->sheet->setCellValue('G'.$i, CurrencyFormat($userInfo['all_deal_sum'], 'RUR'));

					if(empty($userInfo['all_premium'])) $this->sheet->setCellValue('H'.$i, 0);
					else $this->sheet->setCellValue('H'.$i, CurrencyFormat($userInfo['all_premium'], 'RUR'));
					$i++;
				}
			}
		}

        $headerName = [
            'B'.$stringNo=>['range'=>'B'.$stringNo.':B'.$stringNoPlus,'title'=>'Менеджер'],
            'C'.$stringNo=>['range'=>'C'.$stringNo.':D'.$stringNo,'title'=>'Просмотры'],
            'C'.$stringNoPlus=>['title'=>'премиальные'],
            'D'.$stringNoPlus=>['title'=>'не премиальные'],
            'E'.$stringNo=>['range'=>'E'.$stringNo.':F'.$stringNo,'title'=>'Принятые помещения'],
            'E'.$stringNoPlus=>['title'=>'Количество'],
            'F'.$stringNoPlus=>['title'=>'Площадь'],
            'G'.$stringNo=>['range'=>'G'.$stringNo.':H'.$stringNo,'title'=>'Количество сделок'],
            'G'.$stringNoPlus=>['title'=>'премиальные'],
            'H'.$stringNoPlus=>['title'=>'не премиальные'],
            'I'.$stringNo=>['range'=>'I'.$stringNo.':I'.$stringNoPlus,'title'=>'Площадь сделок, м2'],
            'J'.$stringNo=>['range'=>'J'.$stringNo.':J'.$stringNoPlus,'title'=>'Поток сделок, руб.'],
            'K'.$stringNo=>['range'=>'K'.$stringNo.':K'.$stringNoPlus,'title'=>'Сумма'],
        ];


		if($group == 30){
			foreach($report as $userId => $userInfo){
				if(!empty($userInfo['name'])){

					$this->sheet->setCellValue('B'.$i, $userInfo['name']);
					if($userInfo['active'] == 'N')
						$this->sheet->getStyle('B'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');

					$this->sheet->setCellValue('C'.$i, count($userInfo['accept_view']));

					$this->sheet->setCellValue('D'.$i, count($userInfo['no_accept_view']) + count($userInfo['no_cash_view']));
					$detail['view'] = $this->managerActivitesFunc->detailView($userId);

                    if(empty($userInfo['count_lot'])) $this->sheet->setCellValue('E'.$i, 0);
                    else $this->sheet->setCellValue('E'.$i, $userInfo['count_lot']);

                    if(empty($userInfo['lot_s'])) $this->sheet->setCellValue('F'.$i, 0);
                    else $this->sheet->setCellValue('F'.$i, $userInfo['lot_s']);

					$this->sheet->setCellValue('G'.$i, count($userInfo['deal_cash']));

					$this->sheet->setCellValue('H'.$i, count($userInfo['deal_no_cash']));
					$detail['deal'] = $this->managerActivitesFunc->detailDeal($userId);

					if(empty($userInfo['deal_s'])) $this->sheet->setCellValue('I'.$i, 0);
					else $this->sheet->setCellValue('I'.$i, $userInfo['deal_s']);

					if(empty($userInfo['deal_sum'])) $this->sheet->setCellValue('J'.$i, 0);
					else $this->sheet->setCellValue('J'.$i, CurrencyFormat($userInfo['deal_sum'], 'RUR'));

					if($userInfo['active'] == 'N'){
						if(empty($userInfo['premium_sum_no_accept'])) $this->sheet->setCellValue('K'.$i, 0);
						else $this->sheet->setCellValue('K'.$i, CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR'));
						$this->sheet->getStyle('K'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');
					}
					else{
						if(empty($userInfo['premium_sum'])) $this->sheet->setCellValue('K'.$i, 0);
						else $this->sheet->setCellValue('K'.$i, CurrencyFormat($userInfo['premium_sum'], 'RUR'));
					}

					$newSheet = new PHPExcel_Worksheet($this->xls, $userInfo['name']);
					$this->xls->addSheet($newSheet, 1);
					$this->sheet->getCell('B'.$i)->getHyperlink()->setUrl("sheet://'".$userInfo['name']."'!B3");
					$detailExel = self::detailActive($detail, $userInfo['name'], $i);

					$i++;
				}
				if(!empty($userId == 'total')){
					$this->sheet->setCellValue('B'.$i, 'Администраторы ИТОГО');

					if(empty($userInfo['all_accept_view'])) $this->sheet->setCellValue('C'.$i, 0);
					else $this->sheet->setCellValue('C'.$i, $userInfo['all_accept_view']);

					if(empty($userInfo['all_no_accept_view'])) $this->sheet->setCellValue('D'.$i, 0);
					else $this->sheet->setCellValue('D'.$i, $userInfo['all_no_accept_view']);

                    if(empty($userInfo['all_count_lot'])) $this->sheet->setCellValue('E'.$i, 0);
                    else $this->sheet->setCellValue('E'.$i, $userInfo['all_count_lot']);

                    if(empty($userInfo['all_s_lot'])) $this->sheet->setCellValue('F'.$i, 0);
                    else $this->sheet->setCellValue('F'.$i, $userInfo['all_s_lot']);

					if(empty($userInfo['all_deal_cash'])) $this->sheet->setCellValue('G'.$i, 0);
					else $this->sheet->setCellValue('G'.$i, $userInfo['all_deal_cash']);

					if(empty($userInfo['all_deal_no_cash'])) $this->sheet->setCellValue('H'.$i, 0);
					else $this->sheet->setCellValue('H'.$i, $userInfo['all_deal_no_cash']);

					if(empty($userInfo['all_deal_s'])) $this->sheet->setCellValue('I'.$i, 0);
					else $this->sheet->setCellValue('I'.$i, $userInfo['all_deal_s']);

					if(empty($userInfo['all_deal_sum'])) $this->sheet->setCellValue('J'.$i, 0);
					else $this->sheet->setCellValue('J'.$i, CurrencyFormat($userInfo['all_deal_sum'], 'RUR'));

					if(empty($userInfo['all_premium'])) $this->sheet->setCellValue('K'.$i, 0);
					else $this->sheet->setCellValue('K'.$i, CurrencyFormat($userInfo['all_premium'], 'RUR'));
					$i++;
				}
			}
		}

		if($group == 29){
			foreach($report as $userId => $userInfo){
				if(!empty($userInfo['name'])){
					$this->sheet->setCellValue('B'.$i, $userInfo['name']);
					if($userInfo['active'] == 'N')
						$this->sheet->getStyle('B'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');

                    $this->sheet->setCellValue('C'.$i, count($userInfo['accept_view']));

                    $this->sheet->setCellValue('D'.$i, count($userInfo['no_accept_view']) + count($userInfo['no_cash_view']));
                    $detail['view'] = $this->managerActivitesFunc->detailView($userId);

                    if(empty($userInfo['count_lot'])) $this->sheet->setCellValue('E'.$i, 0);
                    else $this->sheet->setCellValue('E'.$i, $userInfo['count_lot']);

                    if(empty($userInfo['lot_s'])) $this->sheet->setCellValue('F'.$i, 0);
                    else $this->sheet->setCellValue('F'.$i, $userInfo['lot_s']);

                    $this->sheet->setCellValue('G'.$i, count($userInfo['deal_cash']));

                    $this->sheet->setCellValue('H'.$i, count($userInfo['deal_no_cash']));
                    $detail['deal'] = $this->managerActivitesFunc->detailDeal($userId);

                    if(empty($userInfo['deal_s'])) $this->sheet->setCellValue('I'.$i, 0);
                    else $this->sheet->setCellValue('I'.$i, $userInfo['deal_s']);

                    if(empty($userInfo['deal_sum'])) $this->sheet->setCellValue('J'.$i, 0);
                    else $this->sheet->setCellValue('J'.$i, CurrencyFormat($userInfo['deal_sum'], 'RUR'));

                    if($userInfo['active'] == 'N'){
                        if(empty($userInfo['premium_sum_no_accept'])) $this->sheet->setCellValue('K'.$i, 0);
                        else $this->sheet->setCellValue('K'.$i, CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR'));
                        $this->sheet->getStyle('K'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');
                    }
                    else {
                        if (empty( $userInfo['premium_sum'] )) {
                            $this->sheet->setCellValue( 'K' . $i, 0 );
                        } else {
                            $this->sheet->setCellValue( 'K' . $i, CurrencyFormat( $userInfo['premium_sum'], 'RUR' ) );
                        }
                    }

					$newSheet = new PHPExcel_Worksheet($this->xls, $userInfo['name']);
					$this->xls->addSheet($newSheet, 1);
					$this->sheet->getCell('B'.$i)->getHyperlink()->setUrl("sheet://'".$userInfo['name']."'!B3");
					$detailExel = self::detailActive($detail, $userInfo['name'], $i, $userInfo['group']);

					$i++;
				}
				if(!empty($userId == 'total')){
					$this->sheet->setCellValue('B'.$i, 'Брокеры ИТОГО');

                    if(empty($userInfo['all_accept_view'])) $this->sheet->setCellValue('C'.$i, 0);
                    else $this->sheet->setCellValue('C'.$i, $userInfo['all_accept_view']);

                    if(empty($userInfo['all_no_accept_view'])) $this->sheet->setCellValue('D'.$i, 0);
                    else $this->sheet->setCellValue('D'.$i, $userInfo['all_no_accept_view']);

                    if(empty($userInfo['all_count_lot'])) $this->sheet->setCellValue('E'.$i, 0);
                    else $this->sheet->setCellValue('E'.$i, $userInfo['all_count_lot']);

                    if(empty($userInfo['all_s_lot'])) $this->sheet->setCellValue('F'.$i, 0);
                    else $this->sheet->setCellValue('F'.$i, $userInfo['all_s_lot']);

                    if(empty($userInfo['all_deal_cash'])) $this->sheet->setCellValue('G'.$i, 0);
                    else $this->sheet->setCellValue('G'.$i, $userInfo['all_deal_cash']);

                    if(empty($userInfo['all_deal_no_cash'])) $this->sheet->setCellValue('H'.$i, 0);
                    else $this->sheet->setCellValue('H'.$i, $userInfo['all_deal_no_cash']);

                    if(empty($userInfo['all_deal_s'])) $this->sheet->setCellValue('I'.$i, 0);
                    else $this->sheet->setCellValue('I'.$i, $userInfo['all_deal_s']);

                    if(empty($userInfo['all_deal_sum'])) $this->sheet->setCellValue('J'.$i, 0);
                    else $this->sheet->setCellValue('J'.$i, CurrencyFormat($userInfo['all_deal_sum'], 'RUR'));

                    if(empty($userInfo['all_premium'])) $this->sheet->setCellValue('K'.$i, 0);
                    else $this->sheet->setCellValue('K'.$i, CurrencyFormat($userInfo['all_premium'], 'RUR'));
                    $i++;
				}
			}
		}

		if($group == 35){
			foreach($report as $userId => $userInfo){
				if(!empty($userInfo['name'])){
					$this->sheet->setCellValue('B'.$i, $userInfo['name']);
					if($userInfo['active'] == 'N')
						$this->sheet->getStyle('B'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');

					$this->sheet->setCellValue('C'.$i, count($userInfo['accept_view']));
					$detail['view'] = $this->managerActivitesFunc->detailView($userId, $userInfo['group']);

                    if(empty($userInfo['count_lot'])) $this->sheet->setCellValue('D'.$i, 0);
                    else $this->sheet->setCellValue('D'.$i, $userInfo['count_lot']);

                    if(empty($userInfo['lot_s'])) $this->sheet->setCellValue('E'.$i, 0);
                    else $this->sheet->setCellValue('E'.$i, $userInfo['lot_s']);

					$this->sheet->setCellValue('F'.$i, count($userInfo['deal_cash']));
					$detail['deal'] = $this->managerActivitesFunc->detailDeal($userId, $userInfo['group']);

					if(empty($userInfo['deal_s'])) $this->sheet->setCellValue('G'.$i, 0);
					else $this->sheet->setCellValue('G'.$i, $userInfo['deal_s']);

					if(empty($userInfo['deal_sum'])) $this->sheet->setCellValue('H'.$i, 0);
					else $this->sheet->setCellValue('H'.$i, CurrencyFormat($userInfo['deal_sum'], 'RUR'));

					if($userInfo['active'] == 'N'){
						if(empty($userInfo['premium_sum_no_accept'])) $this->sheet->setCellValue('I'.$i, 0);
						else $this->sheet->setCellValue('I'.$i, CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR'));
						$this->sheet->getStyle('I'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('d9dcdc');
					}
					else{
						if(empty($userInfo['premium_sum'])) $this->sheet->setCellValue('I'.$i, 0);
						else $this->sheet->setCellValue('I'.$i, CurrencyFormat($userInfo['premium_sum'], 'RUR'));
					}

					$newSheet = new PHPExcel_Worksheet($this->xls, $userInfo['name']);
					$this->xls->addSheet($newSheet, 1);
					$this->sheet->getCell('B'.$i)->getHyperlink()->setUrl("sheet://'".$userInfo['name']."'!B3");
					$detailExel = self::detailActive($detail, $userInfo['name'], $i, $userInfo['group']);

					$i++;
				}
				if(!empty($userId == 'total')){
					$this->sheet->setCellValue('B'.$i, 'Кураторы ИТОГО:');

					if(empty($userInfo['all_accept_view'])) $this->sheet->setCellValue('C'.$i, 0);
					else $this->sheet->setCellValue('C'.$i, $userInfo['all_accept_view']);

                    if(empty($userInfo['all_count_lot'])) $this->sheet->setCellValue('D'.$i, 0);
                    else $this->sheet->setCellValue('D'.$i, $userInfo['all_count_lot']);

                    if(empty($userInfo['all_s_lot'])) $this->sheet->setCellValue('E'.$i, 0);
                    else $this->sheet->setCellValue('E'.$i, $userInfo['all_s_lot']);

					if(empty($userInfo['all_deal_cash'])) $this->sheet->setCellValue('F'.$i, 0);
					else $this->sheet->setCellValue('F'.$i, $userInfo['all_deal_cash']);

					if(empty($userInfo['all_deal_s'])) $this->sheet->setCellValue('G'.$i, 0);
					else $this->sheet->setCellValue('G'.$i, $userInfo['all_deal_s']);

					if(empty($userInfo['all_deal_sum'])) $this->sheet->setCellValue('H'.$i, 0);
					else $this->sheet->setCellValue('H'.$i, CurrencyFormat($userInfo['all_deal_sum'], 'RUR'));

					if(empty($userInfo['all_premium'])) $this->sheet->setCellValue('I'.$i, 0);
					else $this->sheet->setCellValue('I'.$i, CurrencyFormat($userInfo['all_premium'], 'RUR'));
					$i++;
				}
			}
		}

		if($group == 1){
			if(empty($report['sum_call'])) $this->sheet->setCellValue('B'.$i, 0);
			else $this->sheet->setCellValue('B'.$i, $report['sum_call']);
			$detailCalls = $this->managerActivitesFunc->detailRequest($user = false, $group = 15);
			$newSheet = new PHPExcel_Worksheet($this->xls, 'Все звонки');
			$this->xls->addSheet($newSheet, 1);
			$this->sheet->getCell('B'.$i)->getHyperlink()->setUrl("sheet://'Все звонки'!B3");
			self::detailAllRequest($detailCalls, $name = 'Все звонки', $i);

			if(empty($report['sum_request'])) $this->sheet->setCellValue('C'.$i, 0);
			else $this->sheet->setCellValue('C'.$i, $report['sum_request']);
			$detailRequest = $this->managerActivitesFunc->detailRequest($user = false, $group = 55);
			$newSheet = new PHPExcel_Worksheet($this->xls, 'Все обращения');
			$this->xls->addSheet($newSheet, 1);
			$this->sheet->getCell('C'.$i)->getHyperlink()->setUrl("sheet://'Все обращения'!B3");
			self::detailAllRequest($detailRequest, $name = 'Все обращения', $i);

			if(empty($report['sum_job'])) $this->sheet->setCellValue('D'.$i, 0);
			else $this->sheet->setCellValue('D'.$i, $report['sum_job']);
			$detailViewJob = $this->managerActivitesFunc->detailViewJob($user = false, $group = 1);
			$newSheet = new PHPExcel_Worksheet($this->xls, 'Всего назначено просмотров');
			$this->xls->addSheet($newSheet, 1);
			$this->sheet->getCell('D'.$i)->getHyperlink()->setUrl("sheet://'Всего назначено просмотров'!B3");
			self::detailAllViewJob($detailViewJob, $name = 'Всего назначено просмотров', $i);

			$detailView = $this->managerActivitesFunc->detailView($user = false, $group = 1);

			if(empty($report['sum_view'])) $this->sheet->setCellValue('E'.$i, 0);
			else $this->sheet->setCellValue('E'.$i, $report['sum_view']);
			$newSheet = new PHPExcel_Worksheet($this->xls, 'Всего cоздано актов просмотров');
			$this->xls->addSheet($newSheet, 1);
			$this->sheet->getCell('E'.$i)->getHyperlink()->setUrl("sheet://'Всего cоздано актов просмотров'!B3");
			self::detailAllView($detailView['all'], $name = 'Всего cоздано актов просмотров', $i);

			if(empty($report['sum_view_premiun'])) $this->sheet->setCellValue('F'.$i, 0);
			else $this->sheet->setCellValue('F'.$i, $report['sum_view_premiun']);
			$newSheet = new PHPExcel_Worksheet($this->xls, 'Все премиальные просмотры');
			$this->xls->addSheet($newSheet, 1);
			$this->sheet->getCell('F'.$i)->getHyperlink()->setUrl("sheet://'Все премиальные просмотры'!B3");
			self::detailAllView($detailView['cash'], $name = 'Все премиальные просмотры', $i);

			if(empty($report['sum_view_no_premiun'])) $this->sheet->setCellValue('G'.$i, 0);
			else $this->sheet->setCellValue('G'.$i, $report['sum_view_no_premiun']);
			$newSheet = new PHPExcel_Worksheet($this->xls, 'Все не премиальные просмотры');
			$this->xls->addSheet($newSheet, 1);
			$this->sheet->getCell('G'.$i)->getHyperlink()->setUrl("sheet://'Все не премиальные просмотры'!B3");
			self::detailAllView($detailView['no_cash'], $name = 'Все не премиальные просмотры', $i);

            if(empty($report['sum_accept_obj_lot'])) $this->sheet->setCellValue('H'.$i, 0);
            else $this->sheet->setCellValue('H'.$i, $report['sum_accept_obj_lot']);

            if(empty($report['sum_accept_obj_s'])) $this->sheet->setCellValue('I'.$i, 0);
            else $this->sheet->setCellValue('I'.$i, $report['sum_accept_obj_s']);

			if(empty($report['sum_deal'])) $this->sheet->setCellValue('J'.$i, 0);
			else $this->sheet->setCellValue('J'.$i, $report['sum_deal']);
			$detailDeal = $this->managerActivitesFunc->detailDeal($user = false, $group = 1);
			$newSheet = new PHPExcel_Worksheet($this->xls, 'Все сделки');
			$this->xls->addSheet($newSheet, 1);
			$this->sheet->getCell('J'.$i)->getHyperlink()->setUrl("sheet://'Все сделки'!B3");
			self::detailAllDeal($detailDeal, $name = 'Все сделки', $i);

			if(empty($report['sum_deal_s'])) $this->sheet->setCellValue('K'.$i, 0);
			else $this->sheet->setCellValue('K'.$i, $report['sum_deal_s']);

			if(empty($report['sum_deal_sum'])) $this->sheet->setCellValue('L'.$i, 0);
			else $this->sheet->setCellValue('L'.$i, CurrencyFormat($report['sum_deal_sum'], 'RUR'));

			if(empty($report['sum_deal_minus'])) $this->sheet->setCellValue('M'.$i, 0);
			else $this->sheet->setCellValue('M'.$i, CurrencyFormat($report['sum_deal_minus'], 'RUR'));

			if(empty($report['sum_premium'])) $this->sheet->setCellValue('N'.$i, 0);
			else $this->sheet->setCellValue('N'.$i, CurrencyFormat($report['sum_premium'], 'RUR'));
		}
		return $i;
	}

    /**
     * Функция создания детализации заголовков отчета
     * @param $headerName
     * @param $sheetDetail
     * @param $stringNo
     * @param $column
     * @param bool $action
     */
	private function detailExelHeader($headerName, $sheetDetail, $stringNo, $column, $action = false){
		$a = 0;
		for ($i = 0; $i <= $column; $i++) {
			if(!empty($action)){
				if($i == 0) {
					$range = $this->columnLetter[$i] . $stringNo . ":" . $this->columnLetter[$i + $action] . $stringNo;
				}
				if($i == 1) $i += $action;
			}
			$headerNameNew[$this->columnLetter[$i] . $stringNo] = ['title' => $headerName[$a]];
			if(!empty($range) and $i == 0) $headerNameNew[$this->columnLetter[$i] . $stringNo]['range'] = $range;
			$a++;
		}

		foreach ($headerNameNew as $key => $value){
			$sheetDetail->setCellValue($key,$value['title']);
			if(!empty($value['range'])) $sheetDetail->mergeCells($value['range']);

			//Цвет
			$sheetDetail->getStyle($key)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$sheetDetail->getStyle($key)->getFill()->getStartColor()->setRGB('e4ecf1');
		}

		$merge = $this->columnLetter[0].$stringNo.":".$this->columnLetter[$column].$stringNo;

		$sheetDetail->duplicateStyleArray($this->style_blueborders,$merge,true);
		$sheetDetail->duplicateStyleArray($this->style_alignment,$merge,true);
	}

    /**
     * Функция создания колонок для отчета
     * @param $with
     * @param $sheetDetail
     */
	private function setWidthColumn($with, $sheetDetail){
		foreach ($with as $key => $value){
			$sheetDetail->getColumnDimension($this->columnLetter[$key])->setWidth($value);
		}
	}
}
