<?php

function cut_text($text, $num) {
    if (strlen($text) >= $num) {
        $cutstr = iconv_substr($text, 0, $num, 'utf-8') . '...';
        return $cutstr;
    } else {
        return $text;
    }
}

function json_code($json) {
    //remove curly brackets to beware from regex errors เป็นฟังชั่นสำหรับแปรข้อมูลแบบ JSON ออกมาอยู่ในรูปแบบ Array ครับ
    $json = substr($json, strpos($json, '{') + 1, strlen($json));
    $json = substr($json, 0, strrpos($json, '}'));
    $json = preg_replace('/(^|,)([\\s\\t]*)([^:]*) (([\\s\\t]*)):(([\\s\\t]*))/s', '$1"$3"$4:', trim($json));
    return json_decode('{' . $json . '}', true);
}

function DateDiff($strDate1, $strDate2) {
    return (strtotime($strDate2) - strtotime($strDate1)) / ( 60 * 60 * 24 );  // 1 day = 60*60*24
}

function TimeDiff($strTime1, $strTime2) {
    return (strtotime($strTime2) - strtotime($strTime1)) / ( 60 * 60 ); // 1 Hour =  60*60
}

function DateTimeDiff($strDateTime1, $strDateTime2) {
    return (strtotime($strDateTime2) - strtotime($strDateTime1)) / ( 60 * 60 ); // 1 Hour =  60*60
}

function startTimer() {
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    return $time;
}

function stopAndCountTimer($start, $round = 4) {
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $finish = $time;
    return round(($finish - $start), $round);
}

function expdate($startdate, $datenum) {
    $startdatec = strtotime($startdate); // ทำให้ข้อความเป็นวินาที
    $tod = $datenum * 86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
    $ndate = $startdatec + $tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
    return $ndate; // ส่งค่ากลับ
}
