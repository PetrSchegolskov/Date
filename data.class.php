<?php

class Date
{
    /**
     * Метод возвращает массив месяцев
     *
     * @param bool|false $bIsNatural - склонение месяца
     * @param string $sLang
     * @return array
     */
    public static function getMonths($bIsNatural = false, $sLang = 'ru')
    {
        $arMonths = array(

            '01' => 'января',
            '02' => 'февраля',
            '03' => 'марта',
            '04' => 'апреля',
            '05' => 'мая',
            '06' => 'июня',
            '07' => 'июля',
            '08' => 'августа',
            '09' => 'сентября',
            '10' => 'октября',
            '11' => 'ноября',
            '12' => 'декабря',

        );

        if ($bIsNatural) {
            $arMonths = array(

                '01' => 'январь',
                '02' => 'февраль',
                '03' => 'март',
                '04' => 'апрель',
                '05' => 'май',
                '06' => 'июнь',
                '07' => 'июль',
                '08' => 'август',
                '09' => 'сентябрь',
                '10' => 'октябрь',
                '11' => 'ноябрь',
                '12' => 'декабрь',

            );
        }

        if ($sLang == 'en') {
            $arMonths = array(
                '01' => 'January',
                '02' => 'February',
                '03' => 'March',
                '04' => 'April',
                '05' => 'May',
                '06' => 'June',
                '07' => 'July',
                '08' => 'August',
                '09' => 'September',
                '10' => 'October',
                '11' => 'November',
                '12' => 'December',

            );
        }

        return $arMonths;
    }

    /**
     * Метод возвращает день недели по его коду
     * @param bool|false $sCodeWeekDay - код дня нендели, 0 - воскресенье, 6 - суббота
     * @return mixed
     * @throws Exception
     */
    public static function getRusWeekDay($sCodeWeekDay = false)
    {
        if ($sCodeWeekDay === false){
            throw new Exception('Не указан день недели');
        }

        $arRusWeekDays = self::getAllRusWeekDays();

        return $arRusWeekDays[$sCodeWeekDay];
    }

    /**
     * Метод возвращает нзвания дней недели на русском языке
     * @return array
     */
    public static function getAllRusWeekDays()
    {
        $arRusWeekDays = array(
            'воскресенье',
            'понедельник',
            'вторник',
            'среда',
            'четверг',
            'пятница',
            'суббота'
        );

        return $arRusWeekDays;
    }

    /**
     * Метод получает нзвание месяца по его коду
     * @param $sMonthCode - код менсяца с ведущим нулем
     * @param bool|false $bIsNatural - склонение месяца, сентября или сентябрь
     * @param string $sLang - язык
     * @return mixed
     * @throws Exception
     */
    function getMonth($sMonthCode, $bIsNatural = false, $sLang = 'ru')
    {

        if (empty($sMonthCode)){
            throw new Exception('Не указан код месяца');
        }

        $arMonths = self::getMonths($bIsNatural, $sLang);

        $sMonth  = $arMonths[$sMonthCode];

        return $sMonth;
    }

    /**
     * @param $sDate
     * @param $arOptions
     * 'bShowYear' - показывать год или нет
     * 'bHideDate' - показывать число или нет
     * 'bShowTime' - показывать время или нет
     * 'bShowWeekDay' - показывать день нелели или нет
     * @return string
     * @throws Exception
     */
    public static function formatRusDate($sDate, $arOptions = array(false, false, false, false))
    {

        if ($sDate){
            $iTime = strtotime($sDate);
        } else {
            $iTime = time();
        }

        $sResult = '';

        if (!$arOptions['bHideDate'])
        {
            $sResult = date('d', $iTime);
        }

        $sMonth = date('m', $iTime);
        $sResult .= ' ' . self::getMonth($sMonth);

        $sYear = date('Y', $iTime);

        if ($arOptions['bShowYear'] && $sYear != date('Y')) {
            $sResult .= ' ' . $sYear . 'г.';
        }

        if ($arOptions['bShowTime']) {
            $sResult .= ' ' . $sResult = date('H:i', $iTime);;
        }

        if ($arOptions['bShowWeekDay']) {
            $sWeekDay = date('w', $iTime);
            $sResult .= ', ' . self::getRusWeekDay($sWeekDay);
        }

        return $sResult;
    }
}
