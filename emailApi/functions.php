<?php
function array_flatten($array)
{
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        } else {
            $result[$key] = $value;
        }
    }
    return $result;
}
function array_convertio($data)
{
    if (!is_array($data)) {
        return FALSE;
    }
    $arra = array();
    for ($i = 0; $i < count($data); $i++) {
        array_push($arra, [$data[$i]['name'] => $data[$i]['value']]);
    }
    $arrayFull = array_flatten($arra);
    return $arrayFull;
}
