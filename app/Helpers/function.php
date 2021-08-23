<?php

// Đệ Quy Parent_id
if (!function_exists('buildTree')) {
    function buildTree(array $elements, $parentId = 0) {
        $branch = array();
    
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = buildTree($elements, $element['id']);
                if ($children) {
                    $element['data_children'] = $children;
                }
                $branch[] = $element;
            }
        }
    
        return $branch;
    }
}

// Convert Object to Array
if (!function_exists('objectToArray')) {
    function objectToArray ($object) {
        if(!is_object($object) && !is_array($object)){
            return $object;
        }
        return array_map('objectToArray', (array) $object);
    }   
}

// Path url to public
if (!function_exists('asset_path')) {
    function asset_path($url = '')
    {
        if (env('APP_ENV') === 'local') {
            return 'storage/image/' . $url;
        }
        return 'https://bsmedia.vn/public/storage/image/' . $url;
    }
}

// json_decode
if (!function_exists('parse_json_decode')) {
    function parse_json_decode ($object) {
        $arr = json_decode($object, true);
        return $arr;
    } 
}

