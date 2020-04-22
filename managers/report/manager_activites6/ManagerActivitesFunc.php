<?php
/**
 * Created by PhpStorm.
 * User: Mazulova.Ekaterina
 * Date: 08.08.2019
 * Time: 18:54
 */

/** Класс для работы с отчетом активность менеджеров */
class ManagerActivitesFunc
{
	public $dtimeFrom;
	public $dtimeTo;
	private $activeSellerUsers;
    private $callUsers;
	private $adminBCUsers;
	private $brockerUsers;
	private $curatorsUsers;
    private $allDeal;
    private $allView;
    private $allAcceptObj;
    private $allRequest;
    private $allJob;
    private $dealCallAndActiveSellerGroup;
    private $sumPremium;
    private $allViewCash;
    private $allViewNoCash;

	public function __construct($dtimeFrom, $dtimeTo)
	{
		$this->dtimeFrom = $dtimeFrom;
		$this->dtimeTo = $dtimeTo;
		$this->dtimeOld = date("Y-m-d", strtotime("-4 month", strtotime($this->dtimeFrom)));

		$this->pash = $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"];

        $this->activeSellerUsers = self::getUserInfo(55);;
        $this->callUsers = self::getUserInfo(15);
        $this->adminBCUsers = self::getUserInfo(30);
        $this->brockerUsers = self::getUserInfo(29);
        $this->curatorsUsers = self::getUserInfo(35);

        $this->allDeal = self::getAllDeal();;
        $this->allView = self::getAllView();
        $this->allAcceptObj = self::getAllAcceptObj();
        $this->allRequest = self::getAllRequest();
        $this->allJob = self::getAllJob();
        $this->dealCallAndActiveSellerGroup = self::getDealCallAndActiveSellerGroup();
        $this->sumPremium = '';
        $this->allViewCash = [];
        $this->allViewNoCash = [];
	}

	/**
	 * Функция сбора всей информации для отчета
	 * @return array
	 */
	public function getReport(){
		if(empty($this->allDeal) and empty($this->allView) and empty($this->allRequest) and empty($this->allJob)) return false;

		$callAndActiveSellerInfo = self::callAndActiveSellerInfo();

		$adminBCInfo = self::adminBCInfo();

		$brockerInfo = self::brockerInfo();

		$curatorsInfo = self::curatorsInfo();

		$allTotal = self::getAllTotal();

		$report = array_merge($callAndActiveSellerInfo, $adminBCInfo, $brockerInfo, $curatorsInfo, $allTotal);

		return $report;
	}

	/**
	 * Функция сбора всех id просмотров для детализации ВСЕГО
	 * @return array
	 */
	public function getViewId(){
		foreach ($this->allView as $key => $value){
			foreach ($value as $viewId => $viewInfo) {
				$allView[] = $viewInfo['PROPERTY_JOB_ID_VALUE'];
			}
		}
		return $allView;
	}

	/**
	 * Функция сбора всех id сделок для детализации ВСЕГО
	 * @return array
	 */
	public function getDealId(){
		foreach ($this->allDeal as $key => $value){
			foreach ($value as $dealId => $dealInfo) {
				$allDeal[] = $dealId;
			}
		}
		return $allDeal;
	}

    /**
     * Функция сбора всех id сделок для детализации ВСЕГО
     * @return array
     */
    public function getAcceptObjId(){
        foreach ($this->allAcceptObj as $key => $value){
            foreach ($value as $acceptObjId => $acceptObjInfo) {
                $allAcceptObj[] = $acceptObjId;
            }
        }
        return $allAcceptObj;
    }


	/**
	 * Функция сбора всех id заданий просмотра для детализации ВСЕГО
	 * @return array
	 */
	public function getJobId(){
		foreach ($this->allJob as $key => $value){
			foreach ($value as $jobId => $jobInfo) {
				$allJob[] = $jobId;
			}
		}
		return $allJob;
	}

	/**
	 * Собираем id всех обращений для детализации ВСЕГО
	 * @return array
	 */
	public function getRequestId(){
		foreach ($this->activeSellerUsers as $user => $value){
			foreach ($this->allRequest[$user] as $requestId => $requestInfo){
				$allRequest[] = $requestId;
			}
		}
		return $allRequest;
	}

	/**
	 * Собираем id всех обращений (звонков) для детализации ВСЕГО
	 * @return array
	 */
	public function getCallsId(){
		foreach ($this->callUsers as $user => $value){
			foreach ($this->allRequest[$user] as $callsId => $callsInfo){
				$allCalls[] = $callsId;
			}
		}
		return $allCalls;
	}

	/**
	 * Функция сбора всех id премиальных просмотров для детализации ИТОГО
	 * @return array
	 */
	public function getViewIdCash(){
		foreach ($this->allView as $key => $value){
			foreach ($value as $viewId => $viewInfo) {
				if (!empty($viewInfo['PROPERTY_DTIME_VALUE'])){
					$dataAccept = date("Y-m-d", strtotime($viewInfo['PROPERTY_DTIME_VALUE']));
					$dtime_to =  date("Y-m-d", strtotime($this->dtimeTo. "-1 day"));
					if($dataAccept < $this->dtimeFrom or $dataAccept > $dtime_to) $dataAccept = false;
					else $dataAccept = true;
				}
				else $dataAccept = true;
				if(!empty($viewInfo['PROPERTY_QMAN_ID_VALUE']) and $viewInfo['PROPERTY_ACCEPT_NO_CASH_VALUE'] != 'Y' and $dataAccept == true){
					$allViewCash[] = $viewInfo['PROPERTY_JOB_ID_VALUE'];
				}
			}
		}
		return $allViewCash;
	}

	/**
	 * Функция сбора всех id не премиальных просмотров для детализации ИТОГО
	 * @return array
	 */
	public function getViewIdNoCash(){
		foreach ($this->allView as $key => $value){
			foreach ($value as $viewId => $viewInfo) {
				if (!empty($viewInfo['PROPERTY_DTIME_VALUE'])){
					$dataAccept = date("Y-m-d", strtotime($viewInfo['PROPERTY_DTIME_VALUE']));
					$dtime_to =  date("Y-m-d", strtotime($this->dtimeTo. "-1 day"));
					if($dataAccept < $this->dtimeFrom or $dataAccept > $dtime_to) $dataAccept = false;
					else $dataAccept = true;
				}
				else $dataAccept = true;
				if(empty($viewInfo['PROPERTY_QMAN_ID_VALUE']) or $viewInfo['PROPERTY_ACCEPT_NO_CASH_VALUE'] == 'Y' or $dataAccept == false){
					$allViewNoCash[] = $viewInfo['PROPERTY_JOB_ID_VALUE'];
				}
			}
		}
		return $allViewNoCash;
	}

	/**
	 * Вытаскиваем отчеты для архива
	 * @return array|bool
	 */
	public function allReportFile(){
		$allReport = [];
		$property['IBLOCK'] = PREMIUM_REPORT;
		$property['ORDER'] = array('timestamp_x' => 'desc');
		$property['FILTER'] = array(
			"ACTIVE" => 'Y'
		);
		if(!empty($this->dtimeFrom) and !empty($this->dtimeTo)){
			$property['FILTER'][">=PROPERTY_dtime_from_report"] = $this->dtimeFrom;
			$property['FILTER']["<=PROPERTY_dtime_to_report"] = $this->dtimeTo;
		}
		$property['SELECT'] = array(
			"ID",
			"NAME",
			"PROPERTY_dtime_from_report",
			"PROPERTY_dtime_to_report",
			"PROPERTY_file_report",
			"PROPERTY_manager_id",
			"PROPERTY_manager_id",
			"PROPERTY_dtime_accept",
		);
		$arReport = self::searchByProperty($property);
		if(empty($arReport)) return false;
		foreach($arReport as $key => $value){
			$allReport[$key] = array(
				'file_name' => $value['NAME'],
				'manager_id' => $value['PROPERTY_MANAGER_ID_VALUE'],
				'manager_name' => self::managersName($value['PROPERTY_MANAGER_ID_VALUE']),
				'dtime_accept' => $value['PROPERTY_DTIME_ACCEPT_VALUE'],
				'dtime_from_report' => $value['PROPERTY_DTIME_FROM_REPORT_VALUE'],
				'dtime_to_report' => $value['PROPERTY_DTIME_TO_REPORT_VALUE'],
				'file_id' => $value['PROPERTY_FILE_REPORT_VALUE'],
				'file_path' => self::pathFile($value['PROPERTY_FILE_REPORT_VALUE']),
			);
		}
		return $allReport;
	}

    /**
     * Функция сбора детализации обращений для отчета в Excel
     * @param $user
     * @param bool $group
     * @return array
     */
	public function detailRequest($user, $group = false){
		if($group == 15){
			$detailRequest = [];
			foreach ($this->callUsers as $user => $value){
				$detailRequestUser = self::detailRequest($user);
				if(count($detailRequestUser) != 0){
					$detailRequest = array_merge($detailRequest, $detailRequestUser);
				}
			}
			return $detailRequest;
		}

		if($group == 55){
			$detailRequest = [];
			foreach ($this->activeSellerUsers as $user => $value){
				$detailRequestUser = self::detailRequest($user);
				if(count($detailRequestUser) != 0){
					$detailRequest = array_merge($detailRequest, $detailRequestUser);
				}
			}
			return $detailRequest;
		}
		foreach ($this->allRequest[$user] as $key => $value){
			$detailRequest[$key] = array(
				"dtime" => $value['PROPERTY_DTIME_VALUE'],
				"phone" => $value['PROPERTY_PHONE_VALUE'],
				"fio" => $value['PROPERTY_FIO_VALUE'],
				"type" => $value['PROPERTY_TYPE_VALUE'],
				"s1" => $value['PROPERTY_S1_VALUE'],
				"s2" => $value['PROPERTY_S2_VALUE'],
				"from" => $value['PROPERTY_FROM_VALUE'],
				"organization" => $value['PROPERTY_ORGANIZATION_VALUE'],
				"email" => $value['PROPERTY_EMAIL_VALUE'],
				"result" => $value['PROPERTY_RESULT_VALUE'],
				"control" => $value['PROPERTY_CONTROL_VALUE'],
				"bc_id" => $value['PROPERTY_OBJECTS_VALUE'][0],
				"bc_name" => $value['PROPERTY_OBJECTS_NAME'],
				"objects_id" => $value['PROPERTY_OBJECTS_ID_VALUE'],
			);
			if(count($value['PROPERTY_OBJECTS_ID_VALUE']) > 1) {
				$detailRequest[$key]['objects_name'] = self::objectsName($value['PROPERTY_OBJECTS_ID_VALUE']);
				foreach ($value['PROPERTY_OBJECTS_ID_VALUE'] as $objectsId){
					$detailRequest[$key]['objects_path'][$objectsId] = $this->pash.'/managers/show_details.php?ELEMENT_ID='. $objectsId;
				}
			}
			else {
				$detailRequest[$key]['objects_name'][$value['PROPERTY_OBJECTS_ID_VALUE'][0]] = $value['PROPERTY_OBJECTS_ID_NAME'];
				$detailRequest[$key]['objects_path'][$value['PROPERTY_OBJECTS_ID_VALUE'][0]] = $this->pash.'/managers/show_details.php?ELEMENT_ID='. $value['PROPERTY_OBJECTS_ID_VALUE'][0];
			}
		}
		return $detailRequest;
	}

    /**
     * Функция сбора детализации задач для отчета в Excel
     * @param $user
     * @param bool $group
     * @return array
     */
	public function detailViewJob($user, $group = false){
		if($group == 1){
			$manager_id = array_merge(array_keys($this->callUsers), array_keys($this->activeSellerUsers));
			$detailViewJob = [];
			foreach ($manager_id as $user => $value){
				$detailViewJobUser = self::detailViewJob($value);
				if(count($detailViewJobUser) != 0){
					$detailViewJob = array_merge($detailViewJob, $detailViewJobUser);
				}
			}
			return $detailViewJob;
		}
		foreach ($this->allJob[$user] as $key => $value) {
			$detailView[$key] = array(
				'id' => $key,
				"dtime" => $value['PROPERTY_DTIME_VALUE'],
				"minutes" => $value['PROPERTY_MINUTES_VALUE'],
				"comment" => $value['PROPERTY_COMMENT_VALUE']['TEXT'],
				"objects_id" => $value['PROPERTY_OBJECT_ID_VALUE'],
				"is_closed" => $value['PROPERTY_IS_CLOSED_VALUE'],
				"comments_closed" => $value['PROPERTY_COMMENTS_CLOSED_VALUE']['TEXT'],
			);
			if (count($value['PROPERTY_OBJECT_ID_VALUE']) > 1){
				$detailView[$key]['objects_name'] = self::objectsName($value['PROPERTY_OBJECT_ID_VALUE']);
				foreach ($value['PROPERTY_OBJECT_ID_VALUE'] as $objectsId){
					$detailView[$key]['objects_path'][$objectsId] = $this->pash.'/managers/show_details.php?ELEMENT_ID='. $objectsId;
				}
			}
			else{
				$detailView[$key]['objects_name'][$value['PROPERTY_OBJECT_ID_VALUE'][0]] = $value['PROPERTY_OBJECT_ID_NAME'];
				$detailView[$key]['objects_path'][$value['PROPERTY_OBJECT_ID_VALUE'][0]] = $this->pash.'/managers/show_details.php?ELEMENT_ID='. $value['PROPERTY_OBJECTS_ID_VALUE'][0];
			}
			$property['IBLOCK'] = IBLOCK_VIEW_REPORT;
			$property['ORDER'] = array();
			$property['FILTER'] = array(
				"PROPERTY_job_id" => $key,
			);
			$property['SELECT'] = array(
				"ID",
				"PROPERTY_view_no",
			);
			$arAct = self::searchByProperty($property);
			$actId = key($arAct);
			$detailView[$key]["act_id"] = $actId;
			$detailView[$key]["act_no"] = $arAct[$actId]['PROPERTY_VIEW_NO_VALUE'];
		}
		return $detailView;
	}

    /**
     * Функция сбора детализации сделок для отчета в Excel
     * @param $user
     * @param $group
     * @return mixed
     */
	public function detailDealActiveSellerAndCall($user, $group){
		foreach ($this->dealCallAndActiveSellerGroup[$user]["all_deal"] as $value){
			$value = $value["DEAL_INFO"];
			$detailDeal[$value['ID']] = array(
				"id" => $value['ID'],
				"bc_id" => $value['PROPERTY_BC_ID_VALUE'],
				"bc_name" => $value['PROPERTY_BC_ID_NAME'],
				"organization" => $value['PROPERTY_ORGANIZATION_VALUE'],
				"agent_id" => $value['PROPERTY_CONTRACT_CARD_ID_VALUE']['PROPERTY_AGENT_ID_VALUE'],
				"agent_name" => $value['PROPERTY_CONTRACT_CARD_ID_VALUE']['PROPERTY_AGENT_ID_NAME'],
				"s" => $value['PROPERTY_S_VALUE'],
				"deal_sum" => $value['PROPERTY_DEAL_SUM_VALUE'],
				"deal_cost" => $value['PROPERTY_DEAL_COST_VALUE'],
			);

			if($group == 55){
				if(!empty($value['PROPERTY_CONTRACT_CARD_ID_VALUE']['PROPERTY_AGENT_ID_VALUE'])){
					$detailDeal[$value['ID']]["percent_active"] = '3%';
					$detailDeal[$value['ID']]["premium_active"] = round(($value['PROPERTY_DEAL_SUM_VALUE'] * 12 - $value['PROPERTY_DEAL_COST_VALUE'])/12 * 0.03, 2);
				}
				else{
					$detailDeal[$value['ID']]["percent_active"] = '9%';
					$detailDeal[$value['ID']]["premium_active"] = round(($value['PROPERTY_DEAL_SUM_VALUE'] * 12 - $value['PROPERTY_DEAL_COST_VALUE'])/12 * 0.09, 2);
				}
			}

			if($group == 15){
				if(!empty($value['PROPERTY_CONTRACT_CARD_ID_VALUE']['PROPERTY_AGENT_ID_VALUE'])){
					$detailDeal[$value['ID']]["percent_active"] = '1%';
					$detailDeal[$value['ID']]["premium_active"] = round(($value['PROPERTY_DEAL_SUM_VALUE'] * 12 - $value['PROPERTY_DEAL_COST_VALUE'])/12 * 0.01, 2);
				}
				else{
					$detailDeal[$value['ID']]["percent_active"] = '1%';
					$detailDeal[$value['ID']]["premium_active"] = round(($value['PROPERTY_DEAL_SUM_VALUE'] * 12 - $value['PROPERTY_DEAL_COST_VALUE'])/12 * 0.01, 2);
				}
			}
		}
		return $detailDeal;
	}

    /**
     * Функция сбора детализации просмотров для отчета в Excel
     * @param $user
     * @param bool $group
     * @return array
     */
	public function detailView($user, $group = false){
		if($group == 1){
			$manager_id = array_merge(array_keys($this->adminBCUsers), array_keys($this->brockerUsers), array_keys($this->curatorsUsers));
			$detailViewCash = [];
			$detailViewNoCash = [];
			foreach ($manager_id as $user => $value){
				$detailViewUser = self::detailView($value);
				if(count($detailViewUser['view_cash']) != 0){
					$detailViewCash = array_merge($detailViewCash, $detailViewUser['view_cash']);
				}
				if(count($detailViewUser['view_no_cash']) != 0){
					$detailViewNoCash = array_merge($detailViewNoCash, $detailViewUser['view_no_cash']);
				}
			}
			$detailViewAll = array_merge($detailViewCash, $detailViewNoCash);
			$detailView = array(
				'all' => $detailViewAll,
				'cash' => $detailViewCash,
				'no_cash' => $detailViewNoCash,
			);
			return $detailView;
		}

		foreach ($this->allView[$user] as $key => $value){
			$property['IBLOCK'] = IBLOCK_JOBS;
			$property['ORDER'] = array();
			$property['FILTER'] = array(
				"ID" => $value['PROPERTY_JOB_ID_VALUE'],
			);
			$property['SELECT'] = array(
				"ID",
				"PROPERTY_dtime",
				"PROPERTY_minutes",
				"PROPERTY_comment",
			);
			$arJob = self::searchByProperty($property);
			$arJob = $arJob[$value['PROPERTY_JOB_ID_VALUE']];
			$arView = array(
				"dtime" => $arJob['PROPERTY_DTIME_VALUE'],
				"view_type" => $value['PROPERTY_VIEW_TYPE_VALUE'],
				"minutes" => $arJob['PROPERTY_MINUTES_VALUE'],
				"lead_id" => $value['PROPERTY_LEAD_ID_VALUE'],
				"lead_name" => $value['PROPERTY_LEAD_ID_PROPERTY_ORGANIZATION_VALUE'],
				"lead_pash" => $this->pash.'/managers/leads/lead_add.php?ID='.$value['PROPERTY_LEAD_ID_VALUE'],
				"comment" => $arJob['PROPERTY_COMMENT_VALUE']['TEXT'],
				"object_id" => $value['PROPERTY_OBJ_ID_VALUE'],
			);

			if (count($value['PROPERTY_OBJ_ID_VALUE']) > 1){
				$arView['objects_name'] = self::objectsName($value['PROPERTY_OBJ_ID_VALUE']);
				foreach ($value['PROPERTY_OBJ_ID_VALUE'] as $objectsId){
					$arView['objects_path'][$objectsId] = $this->pash.'/managers/show_details.php?ELEMENT_ID='. $objectsId;
				}
			}
			else {
				$arView['objects_name'][$value['PROPERTY_OBJ_ID_VALUE'][0]] = $value['PROPERTY_OBJ_ID_NAME'];
				$arView['objects_path'][$value['PROPERTY_OBJ_ID_VALUE'][0]] = $this->pash.'/managers/show_details.php?ELEMENT_ID='. $value['PROPERTY_OBJ_ID_VALUE'][0];
			}

			$property['IBLOCK'] = IBLOCK_VIEW_REPORT;
			$property['ORDER'] = array();
			$property['FILTER'] = array(
				"PROPERTY_job_id" => $value['PROPERTY_JOB_ID_VALUE'],
			);
			$property['SELECT'] = array(
				"ID",
				"PROPERTY_view_no",
			);

			$arAct = self::searchByProperty($property);
			$actId = key($arAct);
			if (!empty($value['PROPERTY_DTIME_VALUE'])){
				$dataAccept = date("Y-m-d", strtotime($value['PROPERTY_DTIME_VALUE']));
				$dtime_to =  date("Y-m-d", strtotime($this->dtimeTo. "-1 day"));
				if($dataAccept < $this->dtimeFrom or $dataAccept > $dtime_to) $dataAccept = false;
				else $dataAccept = true;
			}
			else $dataAccept = true;

			if(!empty($value['PROPERTY_QMAN_ID_VALUE']) and $value['PROPERTY_ACCEPT_NO_CASH_VALUE'] != 'Y' and $dataAccept == true or $group == 35){
				$arView['dtime_accept'] = $value['PROPERTY_DTIME_VALUE'];
				$detailView['view_cash'][$key] = $arView;
			}
			else{
				if(empty($reqInfo['PROPERTY_QMAN_ID_VALUE']) or $dataAccept == false) $arView['dtime_accept'] = 'нет';
				elseif($reqInfo['PROPERTY_ACCEPT_NO_CASH_VALUE'] == 'Y') $arView['dtime_accept'] = 'без оплаты';
				$detailView['view_no_cash'][$key] = $arView;
			}
		}
		return $detailView;
	}

    /**
     * Функция сбора детализации сделок для отчета в Excel
     * @param $user
     * @param bool $group
     * @return array
     */
	public function detailDeal($user, $group = false){
		if($group == 1){
			$manager_id = array_merge(array_keys($this->adminBCUsers), array_keys($this->brockerUsers), array_keys($this->curatorsUsers));
			$detailDeal = [];
			foreach ($manager_id as $user => $value){
				$detailDealUser = self::detailDeal($value, $group = 2);
				if(count($detailDealUser['dieal_cash']) != 0){
					$detailDeal = array_merge($detailDeal, $detailDealUser['dieal_cash']);
				}
			}
			return $detailDeal;
		}

		foreach ($this->allDeal[$user] as $key => $value){
			$arDeal = array(
				"id" => $value['ID'],
				"bc_id" => $value['PROPERTY_BC_ID_VALUE'],
				"bc_name" => $value['PROPERTY_BC_ID_NAME'],
				"organization" => $value['PROPERTY_ORGANIZATION_VALUE'],
				"s" => $value['PROPERTY_S_VALUE'],
				"deal_sum" => $value['PROPERTY_DEAL_SUM_VALUE'],
				"deal_cost" => $value['PROPERTY_DEAL_COST_VALUE'],
				"premium" => $value['PROPERTY_MANAGERS_PREM_VALUE'],
			);
			if($group == 29 or $group == 2) $arDeal['calculation_type'] = $value['PROPERTY_CALCULATION_TYPE_VALUE'];
			if(count($value['PROPERTY_PUBLIC_ID_VALUE']) == 3 or $group == 35 or $group == 2) $dealDeal['dieal_cash'][$value['ID']] = $arDeal;
			else $dealDeal['deal_no_cash'][$value['ID']] = $arDeal;
		}
		return $dealDeal;
	}

    /**
     * Функция получения пути к файлу
     * @param $fileId
     * @return string|null
     */
	private function pathFile($fileId){
		$path = CFile::GetPath($fileId);
		return $path;
	}

    /**
     * Функция получения имен и фамилий пользователей
     * @param $managersId
     * @return string
     */
	private function managersName($managersId){
		$res = CUser::GetByID($managersId);

		if ($ob = $res->GetNext())
			$managerName = $ob['LAST_NAME'] . ' ' . $ob['NAME'];

		return $managerName;
	}

    /**
     * Функция получения названий объектов
     * @param $objectsId
     * @return mixed
     */
	private function objectsName($objectsId){
		foreach ($objectsId as $key => $value){
			$res = CIBlockElement::GetByID($value);
			if($ob = $res->GetNext())
				$objectsName[$value] = $ob['NAME'];
		}
		return $objectsName;
	}

	/**
	 * Функция для сбора информации строки ВСЕГО
	 * @return array
	 */
	private function getAllTotal()
	{
		foreach ($this->callUsers as $user => $value) $sumCalls += count($this->allRequest[$user]);
		foreach ($this->activeSellerUsers as $user => $value) $sumRequest += count($this->allRequest[$user]);
		foreach ($this->allJob as $user => $value) $sumJob += count($value);
		foreach ($this->allView as $user => $value) $sumView += count($value);
        foreach ($this->allAcceptObj as $user => $value) {
            foreach ($value as $acceptObjId => $acceptObjInfo) {
                $sumAcceptObjLot += count($acceptObjInfo['PROPERTY_OBJECT_ID_VALUE'] );
                $sumAcceptObjS += $acceptObjInfo['PROPERTY_DEAL_ID_VALUE']['PROPERTY_S_VALUE'];
            }
        }
		foreach ($this->allDeal as $user => $value) {
			$sumDeal += count($value);
			foreach ($value as $dealId => $dealInfo) {
				$allDealId[] = $dealId;
			}
			foreach ($value as $dealId => $dealInfo) {
				$sumDealS += $dealInfo['PROPERTY_S_VALUE'];
				$sumDealSum += $dealInfo['PROPERTY_DEAL_SUM_VALUE'];
				$sumDealMinus += $dealInfo['PROPERTY_DEAL_COST_VALUE'];
			}
		}
		$allTotal['all_total'] = array(
			'sum_call' => $sumCalls,
			'sum_request' => $sumRequest,
			'sum_job' => $sumJob,
			'sum_view' => $sumView,
			'sum_accept_obj_lot' => $sumAcceptObjLot,
			'sum_accept_obj_s' => $sumAcceptObjS,
			'sum_view_premiun' => count($this->allViewCash),
			'sum_view_no_premiun' => count($this->allViewNoCash),
			'sum_deal' => $sumDeal,
			'sum_deal_s' => $sumDealS,
			'sum_deal_sum' => $sumDealSum,
			'sum_deal_minus' => $sumDealMinus,
			'sum_premium' => $this->sumPremium,
		);
		return $allTotal;
	}

	/**
	 * Функция сбора информации по активным продажам и call-центру
	 * @return array
	 */
	private function callAndActiveSellerInfo(){
		$totalActiveSeller = self::getAllInfoCallAndActiveSeller($this->activeSellerUsers, $group = 55);
		$totalCalls = self::getAllInfoCallAndActiveSeller($this->callUsers, $group = 15);
		$totalActiveSeller = self::getPremium($totalActiveSeller, $group = 55);
		$totalCalls = self::getPremium($totalCalls, $group = 15);
		$ActiveSeller = self::getTotal($totalActiveSeller);
		$Calls = self::getTotal($totalCalls);
		return $ActiveSellerAndCalls = array(
			'active_seller' => $ActiveSeller,
			'call' => $Calls,
		);
	}

    /**
     * Сбор информации для группы Администраторы
     * @return mixed
     */
	private function adminBCInfo(){
		$viewUsers = self::getViewUsers($this->adminBCUsers);
		$dealUsers = self::getDealUsers($this->adminBCUsers);
		$acceptObjUsers = self::getAllAcceptObjUsers($this->adminBCUsers);
		$totalAdminBC = self::getAllInfo($this->adminBCUsers, $viewUsers, $dealUsers, $acceptObjUsers);
		$totalAdminBC = self::getPremium($totalAdminBC, $group = 30);
		$AdminBC['admin'] = self::getTotal($totalAdminBC);
		return $AdminBC;
	}

    /**
     * Сбор информации для группы Брокеры
     * @return mixed
     */
	private function brockerInfo(){
		$viewUsers = self::getViewUsers($this->brockerUsers);
		$dealUsers = self::getDealUsers($this->brockerUsers);
        $acceptObjUsers = self::getAllAcceptObjUsers($this->brockerUsers);
		$totalBrocker = self::getAllInfo($this->brockerUsers, $viewUsers, $dealUsers, $acceptObjUsers);
		$totalBrocker = self::getPremium($totalBrocker, $group = 29);
		$Brocker['brocker'] = self::getTotal($totalBrocker);
		return $Brocker;
	}

    /**
     * Сбор информации для группы Кураторы
     * @return mixed
     */
	private function curatorsInfo(){
		$viewUsers = self::getViewUsers($this->curatorsUsers);
		$dealUsers = self::getDealUsers($this->curatorsUsers);
        $acceptObjUsers = self::getAllAcceptObjUsers($this->curatorsUsers);
		$totalCurators = self::getAllInfo($this->curatorsUsers, $viewUsers, $dealUsers, $acceptObjUsers, $group = 35);
		$totalCurators = self::getPremium($totalCurators, $group = 35);
		$Curators['curator'] = self::getTotal($totalCurators);
		return $Curators;
	}

	/**
	 * Функция для сбора всех сделок
	 * @return array сортировка массива по пользователям
	 */
	private function getAllDeal(){
		$manager_id = array_merge(array_keys($this->adminBCUsers), array_keys($this->brockerUsers), array_keys($this->curatorsUsers));
		$allDeal = [];
		$property['IBLOCK'] = IBLOCK_DEALS;
		$property['ORDER'] = array('timestamp_x' => 'desc');
		$property['FILTER'] = array(
			'PROPERTY_deal_type' => 597,
			">=PROPERTY_dtime_end" => $this->dtimeFrom,
			"<PROPERTY_dtime_end" => $this->dtimeTo,
			'PROPERTY_state' => 595,
			'PROPERTY_manager_id' => $manager_id,
		);
		$property['SELECT'] = array(
			'ID',
			'PROPERTY_deal_type',
			'PROPERTY_no_crossing',
			'PROPERTY_deal_sum',
			'PROPERTY_deal_cost',
			'PROPERTY_calculation_type',
			'PROPERTY_managers_prem',
			'PROPERTY_curators_prem',
			'PROPERTY_organization',
			'PROPERTY_manager_id',
			'PROPERTY_s',
			'PROPERTY_dtime_end',
			'PROPERTY_bc_id',
			'PROPERTY_bc_id.NAME',
			'PROPERTY_organization',
			'PROPERTY_lead_id',
            'PROPERTY_premium',
            'PROPERTY_s_extension',
        );

		$arDeal = self::searchByProperty($property);

		if(empty($arDeal)) return false;

		foreach($arDeal as $key => $value){
			$arDealId[] = $key;
		}

		$property['IBLOCK'] = IBLOCK_RENT_CONTR_CARD;
		$property['ORDER'] = array();
		$property['FILTER'] = array(
			'PROPERTY_deal_id' => $arDealId,
			'PROPERTY_ok_cmanager2' => "Y",
		);
		$property['SELECT'] = array(
			'ID',
			'PROPERTY_agent_id',
			'PROPERTY_agent_id.NAME',
			'PROPERTY_lead_id',
			'PROPERTY_deal_id',
			'PROPERTY_card_type',
		);

		$arDealFromCards = self::searchByProperty($property);

		foreach($arDealFromCards as $key => $value){
		    if ($arDeal[$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_PREMIUM_VALUE']=='Y') {
                $allDeal[$arDeal[$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_MANAGER_ID_VALUE']][$value['PROPERTY_DEAL_ID_VALUE']] = $arDeal[$value['PROPERTY_DEAL_ID_VALUE']];
                $allDeal[$arDeal[$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_MANAGER_ID_VALUE']][$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_CONTRACT_CARD_ID_VALUE'] = $value;
                if($value['PROPERTY_CARD_TYPE_ENUM_ID'] == '695')
                    $allDeal[$arDeal[$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_MANAGER_ID_VALUE']][$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_S_VALUE'] = $allDeal[$arDeal[$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_MANAGER_ID_VALUE']][$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_S_EXTENSION_VALUE'];
                $arDealIDNext[] = $value['PROPERTY_DEAL_ID_VALUE'];
            }
		}

		$property['IBLOCK'] = IBLOCK_OBJECT_STATE_LOG;
		$property['ORDER'] = array();
		$property['FILTER'] = array(
			'PROPERTY_deal_id' => $arDealIDNext,
			'PROPERTY_state_after' => 992,
			'!PROPERTY_moder_id' => false,
		);
		$property['SELECT'] = array(
			'ID',
			'PROPERTY_deal_id',
		);

		$arDealFromPubl = self::searchByProperty($property);

		foreach($arDealFromPubl as $key => $value){
			$allDeal[$arDeal[$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_MANAGER_ID_VALUE']][$value['PROPERTY_DEAL_ID_VALUE']]['PROPERTY_PUBLIC_ID_VALUE'][] = $value;
		}
		return $allDeal;
	}

    /**
     * Функция для сбора всех задач типа "Принять помещения"
     * @return array сортировка массива по пользователям
     */
    private function getAllAcceptObj(){
        $manager_id = array_merge(array_keys($this->adminBCUsers), array_keys($this->brockerUsers), array_keys($this->curatorsUsers));

        $allAcceptObj = [];
        $property['IBLOCK'] = IBLOCK_JOB;
        $property['ORDER'] = array('timestamp_x' => 'desc');
        $property['FILTER'] = array(
            ">=PROPERTY_dtime" => $this->dtimeFrom,
            "<PROPERTY_dtime" => $this->dtimeTo,
            "CREATED_BY" => $manager_id,
            "PROPERTY_action" => 955,
            "PROPERTY_is_closed" => 496
        );
        $property['SELECT'] = array(
            'ID',
            "MODIFIED_BY",
            "PROPERTY_dtime",
            "PROPERTY_object_id",
            "PROPERTY_object_id.NAME",
            "PROPERTY_deal_id",
            "PROPERTY_is_closed",
        );

        $arAcceptObj = self::searchByProperty($property);

        foreach($arAcceptObj as $key => $value){
            $deal_id[] = $value['PROPERTY_DEAL_ID_VALUE'];
        }

        $property['IBLOCK'] = IBLOCK_DEALS;
        $property['ORDER'] = array('timestamp_x' => 'desc');
        $property['FILTER'] = array(
            '!PROPERTY_state' => 730,
            'ID' => $deal_id,
        );
        $property['SELECT'] = array(
            'ID',
            'PROPERTY_s',
            'PROPERTY_state',
        );

        $arDeal = self::searchByProperty($property);

        foreach($arAcceptObj as $key => $value){
            if(!empty($arDeal[$value['PROPERTY_DEAL_ID_VALUE']])){
                $allAcceptObj[$value['MODIFIED_BY']][$value['ID']] = $value;
                $allAcceptObj[$value['MODIFIED_BY']][$value['ID']]['PROPERTY_DEAL_ID_VALUE'] = $arDeal[$value['PROPERTY_DEAL_ID_VALUE']];
            }
        }
        return $allAcceptObj;
    }

	/**
	 * Функция для сбора всех просмотров
	 * @return array сортировка массива по пользователям
	 */
	private function getAllView(){
		$manager_id = array_merge(array_keys($this->adminBCUsers), array_keys($this->brockerUsers), array_keys($this->curatorsUsers));
		$dtimeFrom = date('d.m.Y', strtotime($this->dtimeFrom));
		$dtimeTo = date('d.m.Y', strtotime($this->dtimeTo));

		$allView = [];
		$property['IBLOCK'] = IBLOCK_LEADS_REQ;
		$property['ORDER'] = array('timestamp_x' => 'desc');
		$property['FILTER'] = array(
			array(
				"LOGIC" => "OR",
				array(
					">=DATE_CREATE" =>$dtimeFrom,
					"<DATE_CREATE" => $dtimeTo,
					),
				array(
					">=PROPERTY_dtime" => $this->dtimeFrom,
					"<PROPERTY_dtime" => $this->dtimeTo,
				),
			),
			'CREATED_BY' => $manager_id,
		);
		$property['SELECT'] = array(
			'ID',
			'PROPERTY_lead_id',
			'PROPERTY_lead_id.PROPERTY_organization',
			'PROPERTY_job_id',
			'PROPERTY_dtime',
			'PROPERTY_qman_id',
			'PROPERTY_view_type',
			'PROPERTY_accept_no_cash',
			'PROPERTY_obj_id',
			'PROPERTY_obj_id.NAME',
			'DATE_CREATE',
			'CREATED_BY',
		);

		$arView = self::searchByProperty($property);

		if(empty($arView)) return false;

		foreach($arView as $key => $value){
			$allView[$value['CREATED_BY']][$value['ID']] = $value;
		}

        return $allView;
	}

	/**
	 * Функция для сбора всех обращений
	 * @return array сортировка массива по пользователям
	 */
	private function getAllRequest(){
		$manager_id = array_merge(array_keys($this->callUsers), array_keys($this->activeSellerUsers));
		$allRequest = [];
		$property['IBLOCK'] = IBLOCK_REQUESTS;
		$property['ORDER'] = array('timestamp_x' => 'desc');
		$property['FILTER'] = array(
			">=PROPERTY_dtime" => $this->dtimeFrom,
			"<PROPERTY_dtime" => $this->dtimeTo,
			"CREATED_BY" => $manager_id,
			"!PROPERTY_result" => 1217,
		);
		$property['SELECT'] = array(
			"ID",
			"PROPERTY_manager",
			"PROPERTY_contact_id",
			"PROPERTY_lead_id",
			"PROPERTY_dtime",
			"PROPERTY_phone",
			"PROPERTY_fio",
			"PROPERTY_type",
			"PROPERTY_s1",
			"PROPERTY_s2",
			"PROPERTY_from",
			"PROPERTY_organization",
			"PROPERTY_email",
			"PROPERTY_result",
			"PROPERTY_control",
			"PROPERTY_objects",
			"PROPERTY_objects.NAME",
			"PROPERTY_objects_id",
			"PROPERTY_objects_id.NAME",
			"CREATED_BY"
		);

		$arRequest = self::searchByProperty($property);

		if(empty($arRequest)) return false;

		foreach($arRequest as $key => $value){
			$allRequest[$value['CREATED_BY']][$value['ID']] = $value;
		}

        return $allRequest;
	}

	/**
	 * Функция для сбора всех заданий просмотра
	 * @return array сортировка массива по пользователям
	 */
	private function getAllJob(){
		$manager_id = array_merge(array_keys($this->callUsers), array_keys($this->activeSellerUsers));

		$allJob = [];
		$property['IBLOCK'] = IBLOCK_JOB;
		$property['ORDER'] = array('timestamp_x' => 'desc');
		$property['FILTER'] = array(
			">=PROPERTY_dtime" => $this->dtimeFrom,
			"<PROPERTY_dtime" => $this->dtimeTo,
			"CREATED_BY" => $manager_id,
			"PROPERTY_action" => 493
		);
		$property['SELECT'] = array(
			'ID',
			"CREATED_BY",
			"PROPERTY_contact_id",
			"PROPERTY_dtime",
			"PROPERTY_minutes",
			"PROPERTY_object_id",
			"PROPERTY_object_id.NAME",
			"PROPERTY_comment",
			"PROPERTY_is_closed",
			"PROPERTY_comments_closed",
		);

		$arJob = self::searchByProperty($property);

		if(empty($arJob)) return false;

		foreach ($arJob as $key => $value){
			$allJob[$value['CREATED_BY']][$value['ID']] = $value;
		}

        return $allJob;
	}

	/**
	 * Функция формирует массив с данными переданной группы
	 * @param array $users
	 * @param array $viewUsers
	 * @param array $dealUsers
	 * @param bool $group
	 * @return array
	 */
	private function getAllInfo(array $users, array $viewUsers, array $dealUsers, array $acceptObjUsers, $group = false){
		$arUserInfo = [];
		if(!empty($viewUsers)){
			foreach ($viewUsers as $user => $value){
				$arUserInfo[$user] = [];
				foreach ($value as $reqId => $reqInfo){
					$arUserInfo[$user]['view_id'][] = $reqId;


					if (!empty($reqInfo['PROPERTY_DTIME_VALUE'])){
						$dataAccept = date("Y-m-d", strtotime($reqInfo['PROPERTY_DTIME_VALUE']));
						$dtime_to =  date("Y-m-d", strtotime($this->dtimeTo. "-1 day"));
						if($dataAccept < $this->dtimeFrom or $dataAccept > $dtime_to) $dataAccept = false;
						else $dataAccept = true;
					}
					else $dataAccept = true;

					if(!empty($reqInfo['PROPERTY_QMAN_ID_VALUE']) and $reqInfo['PROPERTY_ACCEPT_NO_CASH_VALUE'] != 'Y' and $dataAccept == true){
						$arUserInfo[$user]['accept_view'][] = $reqId;
						$this->allViewCash[] += $reqId;
					}
					elseif(empty($reqInfo['PROPERTY_QMAN_ID_VALUE']) or $dataAccept == false){
						$arUserInfo[$user]['no_accept_view'][] = $reqId;
						$this->allViewNoCash[] += $reqId;
					}
					elseif($reqInfo['PROPERTY_ACCEPT_NO_CASH_VALUE'] == 'Y'){
						$arUserInfo[$user]['no_cash_view'][] = $reqId;
						$this->allViewNoCash[] += $reqId;
					}
				}
			}
		}

		if(!empty($dealUsers)){
			foreach ($dealUsers as $user => $value){
				foreach ($value as $dealId => $dealInfo){
					$arUserInfo[$user]['deal_id'][] = $dealId;
					if(count($dealInfo['PROPERTY_PUBLIC_ID_VALUE']) >= 1 or $group == 35) {
						$arUserInfo[$user]['deal_cash'][] = $dealId;
						$arUserInfo[$user]['deal_premium'] += $dealInfo['PROPERTY_MANAGERS_PREM_VALUE'];
					}
					else $arUserInfo[$user]['deal_no_cash'][] = $dealId;
					$arUserInfo[$user]['deal_s'] += $dealInfo['PROPERTY_S_VALUE'];
					$arUserInfo[$user]['deal_sum'] += $dealInfo['PROPERTY_DEAL_SUM_VALUE'];
				}
			}
		}

        if(!empty($acceptObjUsers)){
            foreach ($acceptObjUsers as $user => $value){
                $i = 0;
                foreach ($value as $acceptObjId => $acceptObjInfo){
                    foreach ($acceptObjInfo['PROPERTY_OBJECT_ID_VALUE'] as $objId){
                        $i++;
                        $arUserInfo[$user]['lot_id'][] = $objId;
                        $arUserInfo[$user]['count_lot'] = $i;
                    }
                    $arUserInfo[$user]['lot_job_id'][] = $acceptObjId;
                    $arUserInfo[$user]['lot_s'] += $acceptObjInfo['PROPERTY_DEAL_ID_VALUE']['PROPERTY_S_VALUE'];
                }
            }
        }

		foreach($users as $userId => $userInfo){
			if(!empty($arUserInfo[$userId]['view_id'] or !empty($arUserInfo[$userId]['deal_id']) or ($userInfo['ACTIVE'] == 'Y' and
					($userInfo['GROUPS_ID'] != 35 or in_array($userId,$this->brokersArr))))){
				$arUserInfo[$userId]['active'] = $userInfo['ACTIVE'];
				$arUserInfo[$userId]['group'] = $userInfo['GROUPS_ID'];
				$arUserInfo[$userId]['name'] = $userInfo['LAST_NAME'] . ' ' . $userInfo['NAME'];
			}
		}
		return $arUserInfo;
	}

	/**
	 * Функция формирует массив с данными переданной группы
	 * @param array $users
	 * @param int $group
	 * @param array $dealUsers
	 * @return array
	 */
	private function getAllInfoCallAndActiveSeller(array $users, int $group){
		foreach ($users as $userId => $userInfo) {
			$arRequestUser = $this->allRequest[$userId];
			$arJobUser = $this->allJob[$userId];
			$arDealUser = $this->dealCallAndActiveSellerGroup[$userId];

			if(!empty($arRequestUser) or !empty($arJobUser) or !empty($arDealUser) or $userInfo['ACTIVE'] == 'Y'){
				foreach ($arRequestUser as $value) {
					if($group == 55) {
						$arUserInfo[$userId]['request'][] = $value['ID'];
						if(!empty($value['PROPERTY_LEAD_ID_VALUE'])) $arUserInfo[$userId]['lead'][] = $value['PROPERTY_LEAD_ID_VALUE'];
					}
					if($group == 15) {
						$arUserInfo[$userId]['call'][] = $value['ID'];
					}
				}

				$arUserInfo[$userId]['view'] =  array_keys($arJobUser);
				foreach ($arDealUser['all_deal'] as $value) {
					$arUserInfo[$userId]['deal_id'][] = $value['PROPERTY_DEAL_ID_VALUE'];
					$arUserInfo[$userId]['deal_s'] += $value['PROPERTY_S_VALUE'];
					$arUserInfo[$userId]['deal_sum'] += $value['PROPERTY_DEAL_SUM_VALUE'];
				}

				if(!empty($arDealUser['deal_agent'])) $arUserInfo[$userId]['deal_agent'] = $arDealUser['deal_agent'];
				if(!empty($arDealUser['deal_client'])) $arUserInfo[$userId]['deal_client'] = $arDealUser['deal_client'];

				$arUserInfo[$userId]['active'] = $userInfo['ACTIVE'];
				$arUserInfo[$userId]['group'] = $userInfo['GROUPS_ID'];
				$arUserInfo[$userId]['name'] = $userInfo['LAST_NAME'] . ' ' . $userInfo['NAME'];
			}
		}

		return $arUserInfo;
	}

	/**
	 * Функия считает сумму премии для каждой группы
	 * @param array $arUserInfo
	 * @param int $group
	 * @return array
	 */
	private function getPremium(array $arUserInfo, int $group){
		if($group == 55){
			foreach ($arUserInfo as $userId => $value) {
				$premium = '';
				if (!empty($value['deal_agent'])) {
					foreach ($value['deal_agent'] as $dealId) {
						$deal_sum = round(($dealId['PROPERTY_DEAL_SUM_VALUE'] * 12 - $dealId['PROPERTY_DEAL_COST_VALUE'])/12 * 0.03, 2);
						$premium += $deal_sum;
					}
				}
				if (!empty($value['deal_client'])) {
					foreach ($value['deal_client'] as $dealId) {
						$deal_sum = round((($dealId['PROPERTY_DEAL_SUM_VALUE'] * 12 - $dealId['PROPERTY_DEAL_COST_VALUE'])/12) * 0.09, 2);
						$premium += $deal_sum;
					}
				}
				if($value['active'] == 'Y') $arUserInfo[$userId]['premium_sum'] = $premium;
				else $arUserInfo[$userId]['premium_sum_no_accept'] = $premium;
			}
		}

		if($group == 15){
			foreach ($arUserInfo as $userId => $value) {
				$premium = '';
				if (!empty($value['deal_agent'])) {
					foreach ($value['deal_agent'] as $dealId) {
						$deal_sum = round(($dealId['PROPERTY_DEAL_SUM_VALUE'] * 12 - $dealId['PROPERTY_DEAL_COST_VALUE'])/12 * 0.01, 2);
						$premium += $deal_sum;
					}
				}
				if (!empty($value['deal_client'])) {
					foreach ($value['deal_client'] as $dealId) {
						$deal_sum = round(($dealId['PROPERTY_DEAL_SUM_VALUE'] * 12 - $dealId['PROPERTY_DEAL_COST_VALUE'])/12 * 0.01, 2);
						$premium += $deal_sum;
					}
				}
				if (!empty($value['view'])) $premium += count($value['view']) * 10;

				if($value['active'] == 'Y') $arUserInfo[$userId]['premium_sum'] = $premium;
				else $arUserInfo[$userId]['premium_sum_no_accept'] = $premium;
			}
		}

		if($group == 30){
			foreach ($arUserInfo as $userId => $value){
				$premium = '';
				if(!empty($value['accept_view'])){
					$premium = count($value['accept_view']) * 500;
				}
				if(!empty($value['deal_premium'])){
					$premium += $value['deal_premium'];
				}
				if($value['active'] == 'Y') $arUserInfo[$userId]['premium_sum'] = $premium;
				else $arUserInfo[$userId]['premium_sum_no_accept'] = $premium;
			}
		}

		if($group == 29){
			foreach ($arUserInfo as $userId => $value){
				$premium = '';
				if(!empty($value['accept_view'])){
					if($value['deal_s'] < 300) $percent = 0.8;
					else $percent = 1;
					$premium = count($value['accept_view']) * 500 * $percent;
				}
				if(!empty($value['deal_premium'])){
					$premium += $value['deal_premium'];
				}
				if($value['active'] == 'Y') $arUserInfo[$userId]['premium_sum'] = $premium;
				else $arUserInfo[$userId]['premium_sum_no_accept'] = $premium;
			}
		}

		if($group == 35){
			foreach ($this->allDeal as $userId => $value){
				foreach ($value as $dealId => $dealInfo){
					$allPremiumCurator += $dealInfo['PROPERTY_CURATORS_PREM_VALUE'];
					$allDealSumCurator += $dealInfo['PROPERTY_DEAL_SUM_VALUE'];
				}
			}
			foreach ($arUserInfo as $userId => $value){
				if(in_array($userId,$this->brokersArr)){
					$premium = $allPremiumCurator;
					if($allDealSumCurator >= 3000000 and $allDealSumCurator < 5000000) $premium += 5000;
					elseif($allDealSumCurator >= 5000000 and $allDealSumCurator < 7000000) $premium += 10000;
					elseif($allDealSumCurator >= 7000000 and $allDealSumCurator < 10000000) $premium += 15000;
					elseif($allDealSumCurator >= 10000000) $premium += 30000;

					$arUserInfo[$userId]['premium_sum'] = $premium;
				}
			}
		}
		return $arUserInfo;
	}

	/**
	 * Функция для сбора информации для строки ИТОГО
	 * @param array $arUserInfo
	 * @return array
	 */
	private function getTotal(array $arUserInfo){
		foreach ($arUserInfo as $userId => $value){
			if(!empty($value['request'])) $allRequest += count($value['request']);
			if(!empty($value['view'])) $allView += count($value['view']);
			if(!empty($value['lead'])) $allLead += count($value['lead']);
			if(!empty($value['call'])) $allCall += count($value['call']);
            if(!empty($value['count_lot'])) $allCountLot += $value['count_lot'];
            if(!empty($value['lot_s'])) $allSLot += $value['lot_s'];
			if(!empty($value['accept_view'])) $allCashView += count($value['accept_view']);
			if(!empty($value['no_accept_view'])) $allNoCashView += count($value['no_accept_view']);
			if(!empty($value['no_cash_view'])) $allNoCashView += count($value['no_cash_view']);
			if(!empty($value['deal_id'])) $allDeal += count($value['deal_id']);
			if(!empty($value['deal_cash'])) $allCashDeal += count($value['deal_cash']);
			if(!empty($value['deal_no_cash'])) $allNoCashDeal += count($value['deal_no_cash']);
			if(!empty($value['deal_s'])) $allDealS += $value['deal_s'];
			if(!empty($value['deal_sum'])) $allDealSum += $value['deal_sum'];
			if(!empty($value['premium_sum'])) $allPremium += $value['premium_sum'];
		}

		if(!empty($allRequest)) $arUserInfo['total']['all_request'] = $allRequest;
		if(!empty($allView)) $arUserInfo['total']['all_view'] = $allView;
		if(!empty($allLead)) $arUserInfo['total']['all_lead'] = $allLead;
		if(!empty($allCall)) $arUserInfo['total']['all_call'] = $allCall;
		if(!empty($allCountLot)) $arUserInfo['total']['all_count_lot'] = $allCountLot;
		if(!empty($allSLot)) $arUserInfo['total']['all_s_lot'] = $allSLot;
		if(!empty($allCashView)) $arUserInfo['total']['all_accept_view'] = $allCashView;
		if(!empty($allNoCashView)) $arUserInfo['total']['all_no_accept_view'] = $allNoCashView;
		if(!empty($allDeal)) $arUserInfo['total']['all_deal'] = $allDeal;
		if(!empty($allCashDeal)) $arUserInfo['total']['all_deal_cash'] = $allCashDeal;
		if(!empty($allNoCashDeal)) $arUserInfo['total']['all_deal_no_cash'] = $allNoCashDeal;
		if(!empty($allDealS)) $arUserInfo['total']['all_deal_s'] = $allDealS;
		if(!empty($allDealSum)) $arUserInfo['total']['all_deal_sum'] = $allDealSum;
		if(!empty($allPremium)){
			$arUserInfo['total']['all_premium'] = $allPremium;
			$this->sumPremium += $allPremium;
		}

		return $arUserInfo;
	}

	/**
	 * Собираем массив пользователей
	 * @param int $group номер группы пользователей которой надо собрать
	 * @return array
	 */
	private function getUserInfo(int $group){
		$resUsers = CUser::GetList(($by="LAST_NAME"), ($order="asc"), array('GROUPS_ID' => $group));
		while ($obUser = $resUsers->Fetch())
		{
			$arUser[$obUser['ID']] = array(
				'ACTIVE' => $obUser['ACTIVE'],
				'GROUPS_ID' => $group,
				'NAME' => $obUser['NAME'],
				'LAST_NAME' => $obUser['LAST_NAME'],
			);
		}
		return $arUser;
	}

	/**
	 * Функция сбора сделок активных продаж и call-центра
	 * @return array сортировка массива по пользователям
	 */
	private function getDealCallAndActiveSellerGroup(){
		if(empty($this->allDeal)) return false;

		foreach($this->allDeal as $key => $value){
			foreach ($value as $dealId => $dealInfo){
				if($dealInfo['PROPERTY_CONTRACT_CARD_ID_VALUE']['PROPERTY_AGENT_ID_VALUE'] != '-1'){
					$dealWithAgent[$dealId] = self::getDealWithAgent($dealInfo);
				}
				else {
					$dealWithClient[$dealId] = self::getDealWithClient($dealInfo);
				}
			}
		}
		foreach ($dealWithAgent as $key => $value){
			$arDealCallAndActiveSeller[$value['CREATED_BY']]['all_deal'][] = array(
				'PROPERTY_DEAL_ID_VALUE' => $key,
				'PROPERTY_DEAL_SUM_VALUE' => $value['PROPERTY_DEAL_SUM_VALUE'],
				'PROPERTY_S_VALUE' => $value['PROPERTY_S_VALUE'],
				'DEAL_INFO' => $value['DEAL_INFO'],
			);
			$arDealCallAndActiveSeller[$value['CREATED_BY']]['deal_agent'][] = array(
				'PROPERTY_DEAL_ID_VALUE' => $key,
				'PROPERTY_DEAL_SUM_VALUE' => $value['PROPERTY_DEAL_SUM_VALUE'],
				'PROPERTY_DEAL_COST_VALUE' => $value['PROPERTY_DEAL_COST_VALUE'],
			);
		}
		foreach ($dealWithClient as $key => $value){
			$arDealCallAndActiveSeller[$value['CREATED_BY']]['all_deal'][] = array(
				'PROPERTY_DEAL_ID_VALUE' => $key,
				'PROPERTY_DEAL_SUM_VALUE' => $value['PROPERTY_DEAL_SUM_VALUE'],
				'PROPERTY_S_VALUE' => $value['PROPERTY_S_VALUE'],
				'DEAL_INFO' => $value['DEAL_INFO'],
			);
			$arDealCallAndActiveSeller[$value['CREATED_BY']]['deal_client'][] = array(
				'PROPERTY_DEAL_ID_VALUE' => $key,
				'PROPERTY_DEAL_SUM_VALUE' => $value['PROPERTY_DEAL_SUM_VALUE'],
				'PROPERTY_DEAL_COST_VALUE' => $value['PROPERTY_DEAL_COST_VALUE'],
			);
		}

		return $arDealCallAndActiveSeller;
	}


	/**
	 * Функция определяет кто из менеджеров активных продаж или call-центра получит премию по агентской сделке
	 * @param array $dealInfo Информация по карточке договора сделки
	 * @return array
	 */
	private function getDealWithAgent(array $dealInfo){
		$agentId = $dealInfo['PROPERTY_CONTRACT_CARD_ID_VALUE']['PROPERTY_AGENT_ID_VALUE'];
		$leadId = $dealInfo['PROPERTY_CONTRACT_CARD_ID_VALUE']['PROPERTY_LEAD_ID_VALUE'];

		$property['IBLOCK'] = IBLOCK_VIEW_REPORT;
		$property['ORDER'] = array('timestamp_x' => 'asc');
		$property['FILTER'] = array(
			">=PROPERTY_dtime" => $this->dtimeOld,
			"PROPERTY_agent_id" => $agentId,
			"PROPERTY_lead_id" => $leadId,
		);
		$property['SELECT'] = array(
			'ID',
			'NAME',
			"CREATED_DATE",
			"PROPERTY_job_id",
			"PROPERTY_view_type",
		);

		$arViewReport = self::searchByProperty($property);

		foreach($arViewReport as $key => $value){
			if($value['PROPERTY_VIEW_TYPE_VALUE'] == 'Ознакомительный'){
				if(empty($jobId)) $jobId = $value['PROPERTY_JOB_ID_VALUE'];
			}
		}
		if(empty($jobId)){
			foreach($arViewReport as $key => $value){
				if(empty($jobId)) $jobId = $value['PROPERTY_JOB_ID_VALUE'];
			}
		}

		$property['IBLOCK'] = IBLOCK_JOB;
		$property['ORDER'] = array('timestamp_x' => 'asc');
		$property['FILTER'] = array(
			"ID" => $jobId,
		);
		$property['SELECT'] = array(
			'ID',
			"CREATED_BY",
		);

		$arJob = self::searchByProperty($property);

		foreach($arJob as $key => $value) {
			$dealWithAgent = array(
				'CREATED_BY' => $value['CREATED_BY'],
				'PROPERTY_DEAL_SUM_VALUE' => $dealInfo['PROPERTY_DEAL_SUM_VALUE'],
				'PROPERTY_S_VALUE' => $dealInfo['PROPERTY_S_VALUE'],
				'PROPERTY_DEAL_COST_VALUE' => $dealInfo['PROPERTY_DEAL_COST_VALUE'],
				'DEAL_INFO' => $dealInfo,
			);
		}
		return $dealWithAgent;
	}

	/**
	 * Функция определяет кто из менеджеров активных продаж или call-центра получит премию по агентской сделке
	 * @param array $dealInfo Информация по карточке договора сделки
	 * @return array
	 */
	private function getDealWithClient(array $dealInfo){
		$leadId = $dealInfo['PROPERTY_CONTRACT_CARD_ID_VALUE']['PROPERTY_LEAD_ID_VALUE'];

		$property['IBLOCK'] = IBLOCK_LEAD;
		$property['ORDER'] = array();
		$property['FILTER'] = array(
			"ID" => $leadId,
		);
		$property['SELECT'] = array(
			'ID',
			"PROPERTY_contact_id",
			"PROPERTY_contact_id.PROPERTY_type",
		);

		$arContact = self::searchByProperty($property);

		foreach($arContact as $key => $value) {
			if(count($value['PROPERTY_CONTACT_ID_VALUE']) == 1 and $value['PROPERTY_CONTACT_ID_PROPERTY_TYPE_ENUM_ID'] == 431) $arContactClient = $value['PROPERTY_CONTACT_ID_VALUE'];
			else $contactId = $value['PROPERTY_CONTACT_ID_VALUE'];
		}

		if(empty($arContactClient)) {
			$property['IBLOCK'] = IBLOCK_CONTACTS;
			$property['ORDER'] = array();
			$property['FILTER'] = array(
				"ID" => $contactId,
				"PROPERTY_type" => 431
			);
			$property['SELECT'] = array(
				'ID',
				"PROPERTY_type",
			);
			$arContact = self::searchByProperty($property);

			foreach($arContact as $key => $value) {
				$arContactClient[] = $key;
			}
		}

		$property['IBLOCK'] = IBLOCK_REQUESTS;
		$property['ORDER'] = array('timestamp_x' => 'asc');
		$property['FILTER'] = array(
			">=PROPERTY_dtime" => $this->dtimeOld,
			"PROPERTY_contact_id" => $arContactClient,
			"PROPERTY_result" => 276,
		);
		$property['SELECT'] = array(
			'ID',
			"CREATED_BY",
			"PROPERTY_dtime",
			"PROPERTY_contact_id",
		);

		$arRequest = self::searchByProperty($property);

		foreach($arRequest as $key => $value) {
			if(empty($dealWithClient))
				$dealWithClient =  array(
					'CREATED_BY' => $value['CREATED_BY'],
					'PROPERTY_DEAL_SUM_VALUE' => $dealInfo['PROPERTY_DEAL_SUM_VALUE'],
					'PROPERTY_S_VALUE' => $dealInfo['PROPERTY_S_VALUE'],
					'PROPERTY_DEAL_COST_VALUE' => $dealInfo['PROPERTY_DEAL_COST_VALUE'],
					'DEAL_INFO' => $dealInfo,
				);
		}
		return $dealWithClient;
	}

	/**
	 * Функция собирает все просмотры определенной группы
	 * @param array $users
	 * @return array
	 */
	private function getViewUsers(array $users){
		foreach($users as $key => $value){
			$viewUsers[$key] = $this->allView[$key];
		}
		return $viewUsers;
	}

	/**
	 * Функция собирает все сделки определенной группы
	 * @param array $users
	 * @return array
	 */
	private function getDealUsers(array $users){
		foreach($users as $key => $value){
			$dealUsers[$key] = $this->allDeal[$key];
		}
		return $dealUsers;
	}

    /**
     * Функция собирает все задачи типа "Принять помещения" определенной группы
     * @param array $users
     * @return array
     */
    private function getAllAcceptObjUsers(array $users){
        foreach($users as $key => $value){
            $acceptObjUsers[$key] = $this->allAcceptObj[$key];
        }
        return $acceptObjUsers;
    }

	/**
	 * Функция для работы с базой Битрикса
	 * @param $property
	 * @return array
	 */
	private function searchByProperty($property){
		$result = [];
		$property['FILTER'] += array(
			'IBLOCK_ID' => $property['IBLOCK']
		);
		if (empty($property['FILTER']['ACTIVE'])) {
			$property['FILTER']['ACTIVE'] = 'Y';
		}
		$res = \CIBlockElement::GetList(
			$property['ORDER'],
			$property['FILTER'],
			$property['GROUP'],
			$property['NAV'],
			$property['SELECT']
		);
		while ($item = $res->Fetch()) {
			$result[$item['ID']] = $item;
		}
		return $result;
	}
}