<?php

/**
 * 
 */
class ClaArray {

    /**
     * @return array
     * @param array $src
     * @param array $in
     * @param int|string $pos
     */
    static function array_push_after($src, $in, $pos) {
        if (is_int($pos))
            $R = array_merge(array_slice($src, 0, $pos + 1), $in, array_slice($src, $pos + 1));
        else {
            foreach ($src as $k => $v) {
                $R[$k] = $v;
                if ($k == $pos)
                    $R = array_merge($R, $in);
            }
        }return $R;
    }

    /**
     * Move element of array with value
     * @param type $arr
     * @param type $value
     * @param type $step
     */
    static function moveWithValue($arr = array(), $value = '', $step = 1) {
        if ($step != 1)
            $step = -1;
        $key = array_search($value, $arr);
        if ($key === false)
            return $arr;
        return $this->moveWithKey($arr, $key, $step);
    }

    /**
     * Move up, down of array's element with key
     * @param type $arr
     * @param type $key
     * @param type $step
     * @return type
     */
    static function moveWithKey($arr = array(), $key = '', $step = 1) {
        if ($step != 1)
            $step = -1;
        $posi = self::getPositionOfElement($arr, $key);
        if ($posi === false)
            return $arr;
        if ($step == 1 && $posi == 0)
            return $arr;
        elseif ($step == -1 && $posi == count($arr) - 1)
            return $arr;
        $temp = array_splice($arr, $posi, 1);
        $temp2 = array_splice($arr, $posi - $step);
        $result = array_merge($arr, $temp, $temp2);
        return $result;
    }

    /**
     * Delete element of array
     * @param type $arr
     * @param type $key
     * @return type
     */
    static function deleteWithKey($arr = array(), $key = '') {
        unset($arr[$key]);
        return $arr;
    }

    /**
     * delete with value
     * @param type $arr
     * @param type $key
     * @return type
     */
    static function deleteWithValue($arr = array(), $value = '') {
        $key = array_search($value, $arr);
        if ($key !== false)
            unset($arr[$key]);
        return $arr;
    }

    /**
     * Trả về vị trí của một đối tượng trong mảng
     * @param type $arr
     * @param type $key
     */
    static function getPositionOfElement($arr = array(), $key = '') {
        $posi = array_search($key, array_keys($arr));
        return $posi;
    }

    /**
     * trả về mảng các phần tử ngẫu nhiên trong mảng
     * @param type $arr
     * @param type $num
     */
    static function getRandomInArray($arr = array(), $num = 1) {
        $count = count($arr);
        $num = (int) $num;
        $return = array();
        if ($count < $num)
            return $arr;
        $_array = array_rand($arr, $num);
        foreach ($_array as $i)
            $return[$i] = $arr[$i];
        return $return;
    }

    /**
     * return first element of array
     * @param type $array
     * @return element of array or null
     */
    static function getFirst($array = array()) {
        if (is_array($array))
            return reset($array);
        return null;
    }

    /**
     * return last element of array
     * @param type $array
     * @return element or null
     */
    static function getLast($array = array()) {
        if (is_array($array))
            return end($array);
        return null;
    }

    /**
     * remove first element of array
     * @param type $array
     * @return array
     */
    static function removeFirstElement($array = array()) {
        if (is_array($array)) {
            //array_shift($array);
            unset($array[current(array_keys($array))]);
        }
        return $array;
    }

    /**
     * remove last element of array
     * @param type $array
     * @return type
     */
    static function removeLastElement($array = array()) {
        if (is_array($array)) {
            array_pop($array);
        }
        return $array;
    }

    /**
     * add element to first array
     * @param type $array
     * @param type $element
     */
    static function addElementToFirst($array = array(), $element) {
        array_unshift($array, $element);
        return $array;
    }

    /**
     * add element to first array
     * @param type $array
     * @param type $element
     */
    static function addElementToLast($array = array(), $element) {
        array_push($array, $element);
        return $array;
    }

    /**
     * add elements to beginning of array
     * @param type $array
     * @param type $array_added
     * @return type
     */
    static function AddArrayToBegin($array = array(), $array_added = array()) {
        if (is_array($array_added)) {
            $array = $array_added + $array;
        }
        return $array;
    }

    /**
     * add elements to ending of array
     * @param type $array
     * @param type $array_added
     * @return type
     */
    static function AddArrayToEnd($array = array(), $array_added = array()) {
        if (is_array($array_added)) {
            $array = $array + $array_added;
        }
        return $array;
    }

}
