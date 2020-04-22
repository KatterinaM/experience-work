<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/classes/6550101/lead_func.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/managers/reports/manager_activites6/ManagerActivitesFunc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/managers/reports/manager_activites6/ManagerActivitesExelFunc.php");
include_once $_SERVER['DOCUMENT_ROOT'].'/classes/security/autoloader.php';

$APPLICATION->SetTitle("Активность менеджеров - Сервис отчётов - Интерфейс менеджера");

$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/highslide/highslide-full.packed.js');
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/highslide/highslide.css');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/java/jquery-1.4.2.min.js');

$a_dtime_from = new DateTime('first day of this month');
$a_dtime_from = $a_dtime_from->format('d.m.Y');

$a_dtime_to = new DateTime('last day of this month');
$a_dtime_to = $a_dtime_to->format('d.m.Y');

if (!empty($_REQUEST["dtime_from"])) $a_dtime_from =  $_REQUEST["dtime_from"];
if (!empty($_REQUEST["dtime_to"])) $a_dtime_to = $_REQUEST["dtime_to"];
?>
    <script type="text/javascript">
        hs.align = 'center';
        $("#loading").css('top', (screen.height - 200) / 2).css('left', (screen.width - 200) / 2).css('position', 'fixed').css('opacity', 0.8);

        function report_check() {

            var err = 0;

            if ($('#manager_id').attr("checked") == false) {
                alert('Поставьте галочку для подтверждения отчета')
                err++;
            }

            if (err > 0) return false;
            else return true;
        }
    </script>
    <form enctype="multipart/form-data" method="post" action="<?= $_SERVER['PHP_SELF'] ?>" name="f_report">
        <div id="report_params">
            <h3>Активность менеджеров
                <div class="tab_set">
                    <a href="index.php" class="activ" onclick="return false">Сформировать новый отчёт</a>
                    <a href="archive.php">Смотреть архив отчётов</a>
                </div>
            </h3>
            <ul id="params2">
                <li>
                    <table border="0" cellspacing="10">
                        <tr>
                            <td>Период:</td>
                            <td class="half_date">
								<? $APPLICATION->IncludeComponent("bitrix:main.calendar", "", Array(
									"SHOW_INPUT" => "Y",
									"FORM_NAME" => "f_report",
									"INPUT_NAME" => "dtime_from",
									"INPUT_NAME_FINISH" => "dtime_to",
									"INPUT_VALUE" => $a_dtime_from,
									"INPUT_VALUE_FINISH" => $a_dtime_to,
									"SHOW_TIME" => "N",
									"HIDE_TIMEBAR" => "Y"
								)); ?>
                            </td>
                            <td>
                                <input class="gen_report" type="submit" name="gen_report" value="Сформировать отчет"
                                       id="regen_report_link" onclick="$('#loading').show(100);"/>
                            </td>
                        </tr>
                    </table>
                </li>
            </ul>
        </div>
    </form>
<? if ($_SERVER["REQUEST_METHOD"] == "POST" and empty($_REQUEST["login"])) {

	$dtime_from =  date("Y-m-d", strtotime($a_dtime_from));
	$dtime_to =  date("Y-m-d", strtotime($a_dtime_to. "+1 day"));

    $manager_activites_func = new ManagerActivitesFunc($dtime_from, $dtime_to);

    $report = $manager_activites_func->getReport();

	$highslide = 'onclick="return hs.htmlExpand(this,{objectType:\'iframe\',width:1200,preserveContent:false,headingEval:\'this.a.title\',align:\'center\'})"';
    ?>

    <div class="tabled">
        <h1 class="t">Активность менеджеров в период с <?= $a_dtime_from . " по " . $a_dtime_to ?></h1>
        <h3>Активные менеджеры</h3>
            <table id="object_table">
                <thead>
                <tr class="title">
                    <th>Менеджер</th>
                    <th>Обращения</th>
                    <th>Просмотры</th>
                    <th>Паровозы </th>
                    <th>Количество сделок</th>
                    <th>Площадь сделок, м<sup>2</sup></th>
                    <th>Поток сделок, руб.</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <? foreach ($report['active_seller'] as $key => $userInfo){
                    if(!empty($userInfo['name'])){?>
                        <tr>
                            <td>
                                <b><?=$userInfo['name']?></b>
                            </td>
                            <td>
                                <? if(count($userInfo['request']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_REQUESTS?>&ids=<?=implode(';',($userInfo['request']))?>" title="<?=$userInfo['name']?> - Обращения"<?=$highslide?>>
                                    <?=count($userInfo['request'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['request']);?>
                            </td>
                            <td>
                                <?=count($userInfo['view'])?>
                            </td>
                            <td>
                                <? if(count($userInfo['lead']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_LEAD?>&ids=<?=implode(';',($userInfo['lead']))?>&man_id=<?=$key?>&dstart=<?=$a_dtime_from?>&dend=<?=$a_dtime_to?>" title="<?=$userInfo['name']?> - Паровозы"<?=$highslide?>>
                                        <?=count($userInfo['lead'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['lead']);?>
                            </td>
                            <td>
                                <? if(count($userInfo['deal_id']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_DEALS?>&ids=<?=implode(';',($userInfo['deal_id']))?>&show_property=id;object;organization;agent;s;deal_sum;deal_cost;percent_active;premium_active" title="<?=$userInfo['name']?> - Сделки"<?=$highslide?>>
                                        <?=count($userInfo['deal_id'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['deal_id']);?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_s'])) echo 0;
                                else echo $userInfo['deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['deal_sum'], 'RUR');
                                ?>
                            </td>
                            <? if($userInfo['active'] == 'N'){?>
                            <td>
                                <?
                                if(empty($userInfo['premium_sum_no_accept'])) echo 0;
                                else echo CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR');
                                ?>
                            </td>
                            <? }
                            else{?>
                                <td>
                                    <?
                                    if(empty($userInfo['premium_sum'])) echo 0;
                                    else echo CurrencyFormat($userInfo['premium_sum'], 'RUR');
                                    ?>
                                </td>
                           <? }?>
                        </tr>
                   <? }
                    if(!empty($key == 'total')){?>
                        <tr class="title">
                            <th>Активные менеджеры ИТОГО:</th>
                            <td>
                                <?
                                if(empty($userInfo['all_request'])) echo 0;
                                else echo $userInfo['all_request'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_view'])) echo 0;
                                else echo $userInfo['all_view'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_lead'])) echo 0;
                                else echo $userInfo['all_lead'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal'])) echo 0;
                                else echo $userInfo['all_deal'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_s'])) echo 0;
                                else echo $userInfo['all_deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_deal_sum'], 'RUR');
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_premium'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_premium'], 'RUR');
                                ?>
                            </td>
                        </tr>
                    <?}
                }?>
            </table>

        <h3>Контакт центр</h3>
            <table id="object_table">
                <thead>
                <tr class="title">
                    <th>Менеджер</th>
                    <th>Звонки</th>
                    <th>Просмотры</th>
                    <th>Количество сделок</th>
                    <th>Площадь сделок, м<sup>2</sup></th>
                    <th>Поток сделок, руб.</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <? foreach ($report['call'] as $key => $userInfo){
                    if(!empty($userInfo['name'])){?>
                        <tr>
                            <td>
                                <b><a href="man_act_detail.php?man_id=<?=$key?>&dtime_from=<?=$a_dtime_from?>&dtime_to=<?=$a_dtime_to?>" title="Активность менеджера детально"
                                      onclick="return hs.htmlExpand(this,{objectType:'iframe',width:1300,preserveContent:false,headingEval:'this.a.title'})">
                                        <?=$userInfo['name']?>
                                    </a>
                                </b>
                            </td>
                            <td>
                                <?=count($userInfo['call'])?>
                            </td>
                            <td>
                                <?=count($userInfo['view'])?>
                            </td>
                            <td>
                                <? if(count($userInfo['deal_id']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_DEALS?>&ids=<?=implode(';',($userInfo['deal_id']))?>&show_property=id;object;organization;agent;s;deal_sum;deal_cost;percent_calls;premium_calls" title="<?=$userInfo['name']?> - Сделки"<?=$highslide?>>
                                        <?=count($userInfo['deal_id'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['deal_id']);?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_s'])) echo 0;
                                else echo $userInfo['deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['deal_sum'], 'RUR');
                                ?>
                            </td>
                            <? if($userInfo['active'] == 'N'){?>
                                <td>
                                    <?
                                    if(empty($userInfo['premium_sum_no_accept'])) echo 0;
                                    else echo CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR');
                                    ?>
                                </td>
                            <? }
                            else{?>
                                <td>
                                    <?
                                    if(empty($userInfo['premium_sum'])) echo 0;
                                    else echo CurrencyFormat($userInfo['premium_sum'], 'RUR');
                                    ?>
                                </td>
                            <? }?>
                        </tr>
                    <? }
                    if(!empty($key == 'total')){?>
                        <tr class="title">
                            <th>Контакт центр ИТОГО:</th>
                            <td>
                                <?
                                if(empty($userInfo['all_call'])) echo 0;
                                else echo $userInfo['all_call'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_view'])) echo 0;
                                else echo $userInfo['all_view'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal'])) echo 0;
                                else echo $userInfo['all_deal'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_s'])) echo 0;
                                else echo $userInfo['all_deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_deal_sum'], 'RUR');
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_premium'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_premium'], 'RUR');
                                ?>
                            </td>
                        </tr>
                    <?}
                }?>
            </table>

        <h3>Администраторы площадок</h3>
            <table id="object_table">
                <thead>
                <tr class="title">
                    <th rowspan=2>Менеджер</th>
                    <th colspan=2>Просмотры</th>
                    <th colspan=2>Принятые помещения</th>
                    <th colspan=2>Количество сделок</th>
                    <th rowspan=2>Площадь сделок, м<sup>2</sup></th>
                    <th rowspan=2>Поток сделок, руб.</th>
                    <th rowspan=2>Сумма</th>
                </tr>
                <tr class="title">
                    <th>премиальные</th>
                    <th>не премиальные</th>
                    <th>Количество</th>
                    <th>Площадь</th>
                    <th>премиальные</th>
                    <th>не премиальные</th>
                </tr>
                </thead>
                <? foreach ($report['admin'] as $key => $userInfo){
                    if(!empty($userInfo['name'])){?>
                        <tr>
                            <td  <? if($userInfo['active'] == 'N') echo 'bgcolor = "#D9DCDC"'?>>
                                <b><?=$userInfo['name']?></b>
                            </td>
                            <td>
                                <? if(count($userInfo['accept_view']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_LEADS_REQ?>&ids=<?=implode(';',($userInfo['accept_view']))?>" title="<?=$userInfo['name']?> - Премиальные просмотры "<?=$highslide?>>
                                        <?=count($userInfo['accept_view'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['accept_view']);?>
                            </td>
                            <td>
                                <? if((count($userInfo['no_accept_view']) + count($userInfo['no_cash_view'])) > 0 ) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_LEADS_REQ?>&ids=<?=implode(';',($userInfo['no_accept_view'])) .';'. implode(';',($userInfo['no_cash_view']))?>" title="<?=$userInfo['name']?> - Не премиальные просмотры "<?=$highslide?>>
                                        <?=count($userInfo['no_accept_view']) + count($userInfo['no_cash_view'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['no_accept_view']) + count($userInfo['no_cash_view']);?>
                            </td>
                            <td>
                                <? if($userInfo['count_lot'] > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_JOB?>&ids=<?=implode(';',($userInfo['lot_job_id']))?>&type=accept_obj" title="<?=$userInfo['name']?> - Принятые помещения "<?=$highslide?>>
                                        <?=$userInfo['count_lot']?>
                                    </a>
                                <?}
                                else echo 0?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['lot_s'])) echo 0;
                                else echo $userInfo['lot_s'];
                                ?>
                            </td>
                            <td>
                                <? if(count($userInfo['deal_cash']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_DEALS?>&ids=<?=implode(';',($userInfo['deal_cash']))?>&show_property=id;object;organization;s;deal_sum;deal_cost;managers_prem" title="<?=$userInfo['name']?> - Премиальные сделки"<?=$highslide?>>
                                        <?=count($userInfo['deal_cash'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['deal_cash']);?>
                            </td>
                            <td>
                                <? if(count($userInfo['deal_no_cash']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_DEALS?>&ids=<?=implode(';',($userInfo['deal_no_cash']))?>&show_property=id;object;organization;s;deal_sum;deal_cost;no_premium" title="<?=$userInfo['name']?> - Не премиальные сделки"<?=$highslide?>>
                                        <?=count($userInfo['deal_no_cash'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['deal_no_cash']);?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_s'])) echo 0;
                                else echo $userInfo['deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['deal_sum'], 'RUR');
                                ?>
                            </td>
                            <? if($userInfo['active'] == 'N'){?>
                                <td  bgcolor = "#D9DCDC">
                                    <?
                                    if(empty($userInfo['premium_sum_no_accept'])) echo 0;
                                    else echo CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR');
                                    ?>
                                </td>
                            <? }
                            else{?>
                                <td>
                                    <?
                                    if(empty($userInfo['premium_sum'])) echo 0;
                                    else echo CurrencyFormat($userInfo['premium_sum'], 'RUR');
                                    ?>
                                </td>
                            <? }?>
                        </tr>
                    <? }
                    if(!empty($key == 'total')){?>
                        <tr class="title">
                            <th>Администраторы ИТОГО:</th>
                            <td>
                                <?
                                if(empty($userInfo['all_accept_view'])) echo 0;
                                else echo $userInfo['all_accept_view'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_no_accept_view'])) echo 0;
                                else echo $userInfo['all_no_accept_view'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_count_lot'])) echo 0;
                                else echo $userInfo['all_count_lot'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_s_lot'])) echo 0;
                                else echo $userInfo['all_s_lot'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_cash'])) echo 0;
                                else echo $userInfo['all_deal_cash'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_no_cash'])) echo 0;
                                else echo $userInfo['all_deal_no_cash'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_s'])) echo 0;
                                else echo $userInfo['all_deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_deal_sum'], 'RUR');
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_premium'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_premium'], 'RUR');
                                ?>
                            </td>
                        </tr>
                    <?}
                }?>
            </table>

        <h3>Брокеры</h3>
            <table id="object_table">
                <thead>
                <tr class="title">
                    <th rowspan=2>Менеджер</th>
                    <th colspan=2>Просмотры</th>
                    <th colspan=2>Принятые помещения</th>
                    <th colspan=2>Количество сделок</th>
                    <th rowspan=2>Площадь сделок, м<sup>2</sup></th>
                    <th rowspan=2>Поток сделок, руб.</th>
                    <th rowspan=2>Сумма</th>
                </tr>
                <tr class="title">
                    <th>премиальные</th>
                    <th>не премиальные</th>
                    <th>Количество</th>
                    <th>Площадь</th>
                    <th>премиальные</th>
                    <th>не премиальные</th>
                </tr>
                </thead>
                <? foreach ($report['brocker'] as $key => $userInfo){
                    if(!empty($userInfo['name'])){?>
                        <tr>
                            <td>
                                <b><?=$userInfo['name']?></b>
                            </td>
                            <td>
                                <? if(count($userInfo['accept_view']) > 0) {
                                    if($userInfo['deal_s'] < 300) $percent = 80;
                                    else $percent = 100;
                                    ?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_LEADS_REQ?>&ids=<?=implode(';',($userInfo['accept_view']))?>" title="<?=$userInfo['name']?> - Премиальные просмотры: Премия за просмотры - <?= $percent?> %"<?=$highslide?>>
                                        <?=count($userInfo['accept_view'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['accept_view']);?>
                            </td>
                            <td>
                                <? if((count($userInfo['no_accept_view']) + count($userInfo['no_cash_view'])) > 0 ) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_LEADS_REQ?>&ids=<?=implode(';',($userInfo['no_accept_view'])) .';'. implode(';',($userInfo['no_cash_view']))?>" title="<?=$userInfo['name']?> - Не премиальные просмотры "<?=$highslide?>>
                                        <?=count($userInfo['no_accept_view']) + count($userInfo['no_cash_view'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['no_accept_view']) + count($userInfo['no_cash_view']);?>
                            </td>
                            <td>
                                <? if($userInfo['count_lot'] > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_JOB?>&ids=<?=implode(';',($userInfo['lot_job_id']))?>&type=accept_obj" title="<?=$userInfo['name']?> - Принятые помещения "<?=$highslide?>>
                                        <?=$userInfo['count_lot']?>
                                    </a>
                                <?}
                                else echo 0?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['lot_s'])) echo 0;
                                else echo $userInfo['lot_s'];
                                ?>
                            </td>
                            <td>
                                <? if(count($userInfo['deal_cash']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_DEALS?>&ids=<?=implode(';',($userInfo['deal_cash']))?>&show_property=id;calculation_type;object;organization;s;deal_sum;deal_cost;managers_prem" title="<?=$userInfo['name']?> - Премиальные сделки"<?=$highslide?>>
                                        <?=count($userInfo['deal_cash'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['deal_cash']);?>
                            </td>
                            <td>
                                <? if(count($userInfo['deal_no_cash']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_DEALS?>&ids=<?=implode(';',($userInfo['deal_no_cash']))?>&show_property=id;calculation_type;object;organization;s;deal_sum;deal_cost;no_premium" title="<?=$userInfo['name']?> - Не премиальные сделки"<?=$highslide?>>
                                        <?=count($userInfo['deal_no_cash'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['deal_no_cash']);?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_s'])) echo 0;
                                else echo $userInfo['deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['deal_sum'], 'RUR');
                                ?>
                            </td>
                            <? if($userInfo['active'] == 'N'){?>
                                <td>
                                    <?
                                    if(empty($userInfo['premium_sum_no_accept'])) echo 0;
                                    else echo CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR');
                                    ?>
                                </td>
                            <? }
                            else{?>
                                <td>
                                    <?
                                    if(empty($userInfo['premium_sum'])) echo 0;
                                    else echo CurrencyFormat($userInfo['premium_sum'], 'RUR');
                                    ?>
                                </td>
                            <? }?>
                        </tr>
                    <? }
                    if(!empty($key == 'total')){?>
                        <tr class="title">
                            <th>Брокеры ИТОГО:</th>
                            <td>
                                <?
                                if(empty($userInfo['all_accept_view'])) echo 0;
                                else echo $userInfo['all_accept_view'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_no_accept_view'])) echo 0;
                                else echo $userInfo['all_no_accept_view'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_count_lot'])) echo 0;
                                else echo $userInfo['all_count_lot'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_s_lot'])) echo 0;
                                else echo $userInfo['all_s_lot'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_cash'])) echo 0;
                                else echo $userInfo['all_deal_cash'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_no_cash'])) echo 0;
                                else echo $userInfo['all_deal_no_cash'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_s'])) echo 0;
                                else echo $userInfo['all_deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_deal_sum'], 'RUR');
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_premium'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_premium'], 'RUR');
                                ?>
                            </td>
                        </tr>
                    <?}
                }?>
            </table>

        <h3>Кураторы</h3>
            <table id="object_table">
                <thead>
                <tr class="title">
                    <th rowspan=2>Менеджер</th>
                    <th rowspan=2>Просмотры</th>
                    <th colspan=2>Принятые помещения</th>
                    <th rowspan=2>Количество сделок</th>
                    <th rowspan=2>Площадь сделок, м<sup>2</sup></th>
                    <th rowspan=2>Поток сделок, руб.</th>
                    <th rowspan=2>Сумма</th>
                </tr>
                <tr class="title">
                    <th>Количество</th>
                    <th>Площадь</th>
                </tr>
                </thead>
                <? foreach ($report['curator'] as $key => $userInfo){
                    if(!empty($userInfo['name'])){?>
                        <tr>
                            <td>
                                <b><?=$userInfo['name']?></b>
                            </td>
                            <td>
                                <? if(count($userInfo['accept_view']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_LEADS_REQ?>&ids=<?=implode(';',($userInfo['accept_view']))?>" title="<?=$userInfo['name']?> - Просмотры "<?=$highslide?>>
                                        <?=count($userInfo['accept_view'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['accept_view']);?>
                            </td>
                            <td>
                                <? if($userInfo['count_lot'] > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_JOB?>&ids=<?=implode(';',($userInfo['lot_job_id']))?>&type=accept_obj" title="<?=$userInfo['name']?> - Принятые помещения "<?=$highslide?>>
                                        <?=$userInfo['count_lot']?>
                                    </a>
                                <?}
                                else echo 0?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['lot_s'])) echo 0;
                                else echo $userInfo['lot_s'];
                                ?>
                            </td>
                            <td>
                                <? if(count($userInfo['deal_cash']) > 0) {?>
                                    <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_DEALS?>&ids=<?=implode(';',($userInfo['deal_cash']))?>&show_property=id;object;organization;s;deal_sum;deal_cost;no_premium" title="<?=$userInfo['name']?> - Не премиальные сделки"<?=$highslide?>>
                                        <?=count($userInfo['deal_cash'])?>
                                    </a>
                                <?}
                                else echo count($userInfo['deal_cash']);?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_s'])) echo 0;
                                else echo $userInfo['deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['deal_sum'], 'RUR');
                                ?>
                            </td>
                            <? if($userInfo['active'] == 'N'){?>
                                <td>
                                    <?
                                    if(empty($userInfo['premium_sum_no_accept'])) echo 0;
                                    else echo CurrencyFormat($userInfo['premium_sum_no_accept'], 'RUR');
                                    ?>
                                </td>
                            <? }
                            else{?>
                                <td>
                                    <?
                                    if(empty($userInfo['premium_sum'])) echo 0;
                                    else echo CurrencyFormat($userInfo['premium_sum'], 'RUR');
                                    ?>
                                </td>
                            <? }?>
                        </tr>
                    <? }
                    if(!empty($key == 'total')){?>
                        <tr class="title">
                            <th>Кураторы ИТОГО:</th>
                            <td>
                                <?
                                if(empty($userInfo['all_accept_view'])) echo 0;
                                else echo $userInfo['all_accept_view'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_count_lot'])) echo 0;
                                else echo $userInfo['all_count_lot'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_s_lot'])) echo 0;
                                else echo $userInfo['all_s_lot'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_cash'])) echo 0;
                                else echo $userInfo['all_deal_cash'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_s'])) echo 0;
                                else echo $userInfo['all_deal_s'];
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_deal_sum'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_deal_sum'], 'RUR');
                                ?>
                            </td>
                            <td>
                                <?
                                if(empty($userInfo['all_premium'])) echo 0;
                                else echo CurrencyFormat($userInfo['all_premium'], 'RUR');
                                ?>
                            </td>
                        </tr>
                    <?}
                }?>
            </table>

        <h3>ВСЕГО</h3>
            <table id="object_table">
                <thead>
                <tr class="title">
                    <th rowspan=2>Звонки</th>
                    <th rowspan=2>Обращения</th>
                    <th colspan=4>Просмотры</th>
                    <th colspan=2>Принятые помещение</th>
                    <th colspan=4>Сделки</th>
                    <th rowspan=2>Сумма, руб.</th>
                </tr>
                <tr class="title">
                    <th>Назначено просмотров</th>
                    <th>Акты просмотров</th>
                    <th>Акты просмотров, <br>по которым начислена премия</th>
                    <th>Акты просмотров <br>без премии</th>
                    <th>Количество</th>
                    <th>Площадь</th>
                    <th>Количество сделок</th>
                    <th>Площадь сделок, м2</th>
                    <th>Поток сделок, руб.</th>
                    <th>Затраты сделок, руб.</th>
                </thead>
                <tr class="all">
                    <td>
		                <?
                        if($report['all_total']['sum_call'] > 0) {?>
                            <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_REQUESTS?>&dtime_from=<?=$dtime_from?>&dtime_to=<?=$dtime_to?>&type=calls" title="Все звонки "<?=$highslide?>>
				                <?=$report['all_total']['sum_call']?>
                            </a>
		                <?}
		                else echo 0;?>
                    </td>
                    <td>
		                <?
		                if($report['all_total']['sum_request'] > 0) {?>
                            <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_REQUESTS?>&dtime_from=<?=$dtime_from?>&dtime_to=<?=$dtime_to?>&type=request" title="Все обращения "<?=$highslide?>>
				                <?=$report['all_total']['sum_request']?>
                            </a>
		                <?}
		                else echo 0;?>
                    </td>
                    <td>
		                <?
		                if($report['all_total']['sum_job'] > 0) {?>
                            <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_JOBS?>&dtime_from=<?=$dtime_from?>&dtime_to=<?=$dtime_to?>&type=alljob" title="Все назначенные просмотры"<?=$highslide?>>
				                <?=$report['all_total']['sum_job']?>
                            </a>
		                <?}
		                else echo 0;?>
                    </td>
                    <td>
		                <?
		                if($report['all_total']['sum_view'] > 0) {?>
                            <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_JOBS?>&dtime_from=<?=$dtime_from?>&dtime_to=<?=$dtime_to?>&type=view" title="Все созданные акты просмотров"<?=$highslide?>>
				                <?=$report['all_total']['sum_view']?>
                            </a>
		                <?}
		                else echo 0;?>
                    </td>
                    <td>
		                <?
		                if($report['all_total']['sum_view_premiun'] > 0) {?>
                            <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_JOBS?>&dtime_from=<?=$dtime_from?>&dtime_to=<?=$dtime_to?>&type=view_premiun" title="Все премиальные просмотры"<?=$highslide?>>
				                <?=$report['all_total']['sum_view_premiun']?>
                            </a>
		                <?}
		                else echo 0;?>
                    </td>
                    <td>
		                <?
		                if($report['all_total']['sum_view_no_premiun'] > 0) {?>
                            <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_JOBS?>&dtime_from=<?=$dtime_from?>&dtime_to=<?=$dtime_to?>&type=view_no_premiun" title="Все не премиальные просмотры"<?=$highslide?>>
				                <?=$report['all_total']['sum_view_no_premiun']?>
                            </a>
		                <?}
		                else echo 0;?>
                    </td>
                    <td>
                        <?
                        if($report['all_total']['sum_accept_obj_lot'] > 0) {?>
                            <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_JOBS?>&dtime_from=<?=$dtime_from?>&dtime_to=<?=$dtime_to?>&type=accept_obj" title="Все принятые помещение"<?=$highslide?>>
                                <?=$report['all_total']['sum_accept_obj_lot']?>
                            </a>
                        <?}
                        else echo 0;?>
                    </td>
                    <td>
                        <?
                        if(empty($report['all_total']['sum_accept_obj_s'])) echo 0;
                        else echo $report['all_total']['sum_accept_obj_s'];
                        ?>
                    </td>
                    <td>
		                <? if($report['all_total']['sum_deal'] > 0) {?>
                            <a href="man_iblock_count_detail.php?iblock=<?=IBLOCK_DEALS?>&dtime_from=<?=$dtime_from?>&dtime_to=<?=$dtime_to?>&type=deal&show_property=id;calculation_type;object;organization;s;deal_sum;deal_cost" title="Все сделки"<?=$highslide?>>
				                <?=$report['all_total']['sum_deal']?>
                            </a>
		                <?}
		                else echo 0;?>
                    </td>
                    <td>
                        <?
                        if(empty($report['all_total']['sum_deal_s'])) echo 0;
                        else echo $report['all_total']['sum_deal_s'];
                        ?>
                    </td>
                    <td>
                        <?
                        if(empty($report['all_total']['sum_deal_sum'])) echo 0;
                        else echo CurrencyFormat($report['all_total']['sum_deal_sum'], 'RUR');
                        ?>
                    </td>
                    <td>
		                <?
		                if(empty($report['all_total']['sum_deal_minus'])) echo 0;
		                else echo CurrencyFormat($report['all_total']['sum_deal_minus'], 'RUR');
		                ?>
                    </td>
                    <td>
                        <?
                        if(empty($report['all_total']['sum_premium'])) echo 0;
                        else echo CurrencyFormat($report['all_total']['sum_premium'], 'RUR');
                        ?>
                    </td>
                </tr>
        </table>
    </div>


    <form enctype="multipart/form-data" method="post" action="generate_report.php" name="f_report">
        <div class="tabled">
            <? $rsUser = CUser::GetByID($USER->GetID());
            if ($arUser = $rsUser->Fetch()) {
                $manName = $arUser['LAST_NAME'] . ' ' . $arUser['NAME'];?>
                <input type="hidden" name="dtime_from" value="<?=$a_dtime_from?>">
                <input type="hidden" name="dtime_to" value="<?=$a_dtime_to?>">
                <input type="checkbox" id="manager_id" name="manager_id" value="<?=$USER->GetID()?>"> <?=$manName?>  подтверждает отчёт
                <input type="submit" name="rep_save" value="Сохранить" onclick="return report_check();">
           <? } ?>
        </div>
    </form>

  <?}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>