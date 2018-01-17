<?php
/**
 * В проекте бывают нужны глобальные вспомогательные функции.
 * в этом файле лежат такие функции для дебага
 * сделал вот по этому мануалу:
 * http://stackoverflow.com/a/28290359/5914609
 * ~~~mvetryakov
 */



/*
 * @string
 * @mixed
 */
function var_log($logItemName, $logItem) {
    ob_start();
    var_dump($logItem);
    $logItemData = ob_get_clean();

    file_put_contents(
        base_path() . "/storage/logs/".str_replace('\\','.',__CLASS__).'.'.debug_backtrace()[1]['function'].".log",
        $logItemName."\n\n",
        FILE_APPEND
    );
    file_put_contents(
        base_path() . "/storage/logs/".str_replace('\\','.',__CLASS__).'.'.debug_backtrace()[1]['function'].".log",
        $logItemData."\n\n",
        FILE_APPEND
    );
}

/*
 * alias
 */
function log_request($request, $response) {
    var_log($request, $response);
}