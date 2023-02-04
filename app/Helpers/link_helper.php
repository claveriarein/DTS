<?php
if (! function_exists('user_link')) {
    function user_link(string $slugs, array $array_permissions){
        $isValidSlug = 0;
        if(!empty($array_permissions)){
            foreach($array_permissions as $permission){
                if($slugs == $permission['slug']){
                    return 1;
                }
            }
            if($isValidSlug == 0){
                return 0;
            }
        }
    }
}
