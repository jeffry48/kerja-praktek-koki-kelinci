<?php

function inv_format_time($timestamp) {
    return date('H:i', strtotime($timestamp));
}

function inv_get_next_custom_minutes($minutes) {
    return date("d-m-Y H:i", strtotime("+$minutes minutes"));
}

function inv_datetimepicker_setting($date) {
    return date("d-m-Y H:i", strtotime($date));
}

function inv_get_today_date_db() {
    return date("Y-m-d");
}

function inv_get_today_date_view() {
    return date("d-m-Y");
}

function inv_get_last_custom_date_view($num_of_days) {
    return date("d-m-Y", strtotime("-$num_of_days days"));
}

function inv_get_next_custom_date_view($num_of_days) {
    return date("d-m-Y", strtotime("+$num_of_days days"));
}

function inv_get_last_week_date_view() {
    return date("d-m-Y", strtotime('-7 days'));
}

function inv_get_next_week_date_db() {
    return date("Y-m-d", strtotime('+7 days'));
}

function inv_get_current_datetime_db() {
    return date("Y-m-d H:i:s");
}

function inv_get_current_datetime_view() {
    return date("d M Y H:i:s");
}

function inv_get_current_datetime_stamp() {
    return date("YmdHis");
}

function inv_get_current_datetime_stamp_no_miliseconds() {
    return date("YmdHi");
}

function inv_get_current_datetime_plain_view() {
    return date("dmYHis");
}

function inv_date_default_format_db() {
    return "0000-00-00";
}

function inv_date_format_db($date) {
    return date("Y-m-d", strtotime($date));
}

function inv_date_format_view($date) {
    if ($date == "" || $date == "0000-00-00") {
        return "";
    } else {
        return date("d/m/Y", strtotime($date));
    }
}

function inv_datetime_format_db($date) {
    return date("Y-m-d H:i:s", strtotime($date));
}

function inv_datetime_format_view($date) {
    return date("d-m-Y H:i:s", strtotime($date));
}

function inv_datetime_month_format_view($date) {
    return date("d-M-Y H:i", strtotime($date));
}

function inv_counting_days($date_start, $date_end) {
    //required format: "YYYY-MM-DD"
    $datediff = strtotime($date_start) - strtotime($date_end);
    return floor($datediff / (60 * 60 * 24)) - 0;
}

function inv_datetime_format_front_using_slash($date) {
    if ($date == '0000-00-00') {
        return '';
    }
    return date("d/m/Y", strtotime($date));
}

function inv_concat_date($first_date, $second_date) {
    if ($first_date == $second_date) {
        return $first_date;
    }
    $first_day = date("d", strtotime($first_date));
    $first_month = date("M", strtotime($first_date));
    $first_year = date("Y", strtotime($first_date));
    $second_day = date("d", strtotime($second_date));
    $second_month = date("M", strtotime($second_date));
    $second_year = date("Y", strtotime($second_date));
    if ($first_year != $second_year) {
        return "$first_day $first_month $first_year-$second_day $second_month $second_year";
    } else {
        if ($first_month == $second_month) {
            return "$first_day-$second_day $first_month $first_year";
        } else {
            return "$first_day $first_month - $second_day $second_month $first_year";
        }
    }
}

function get_indonesian_today_name() {
    $today = date("D");
    switch ($today) {
        case 'Sun':
            return "Minggu";

        case 'Mon':
            return "Senin";

        case 'Tue':
            return "Selasa";

        case 'Wed':
            return "Rabu";

        case 'Thu':
            return "Kamis";

        case 'Fri':
            return "Jumat";

        case 'Sat':
            return "Sabtu";

        default:
            return "[unknown]";
    }
}

function convert_to_readable_date($date) {
    $ci = & get_instance();
    $months = $ci->lang->line('date_all_month_full');
    $date = explode(' ', $date);
    $date_day = isset($date[0]) ? $date[0] : '00-00-0000';
    $date_jam = isset($date[1]) ? $date[1] : '';
    $date_day = explode('-', $date_day);
    if (count($date_day) != 3) {
        return '';
    }
    $date_jam = explode(':', $date_jam);
    if (count($date_jam) != 3) {
        $date_jam = '';
    }
    $month_label = isset($months[$date_day[1]]) ? $months[$date_day[1]] : $months[$date_day[1]]['00'];
    $date_label = $date_day[2] . ' ' . $month_label . ' ' . $date_day[0];
    if (!empty($date_jam)) {
        $date_jam = $date_jam[0] . ':' . $date_jam[1] . ':' . $date_jam[2];
        $date_label .= ' Jam ' . $date_jam;
    }
    if ($date_label == '00 00 0000' || $date_label == '0000 00 00')
        return "";
    if($date_label[0] == '0' && $date_label[1] != '0'){
      $date_label = ltrim($date_label, '0');
    }
    return $date_label;
}
