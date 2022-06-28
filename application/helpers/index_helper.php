<?php
/**
 * get the defined config value by a key
 * @param string $key
 * @return config value
 */
if (!function_exists('get_setting')) {

    function get_setting($key = "") {
        $ci = get_instance();
        return $ci->config->item($key);
    }

}
/**
 * prepare uri
 *
 * @param string $uri
 * @return full url
 */
if (!function_exists('get_uri')) {

	function get_uri($uri = "") {
		$ci = get_instance();
		$index_page = $ci->config->item('index_page');
		return base_url($index_page . '/' . $uri);
	}

}


/**
 * link the css files
 *
 * @param array $array
 * @return print css links
 */
if (!function_exists('load_css')) {

	function load_css(array $array) {
		$version = get_setting("app_version");

		foreach ($array as $uri) {
			echo "<link rel='stylesheet' type='text/css' href='" . base_url($uri) . "?v=$version' />";
		}
	}

}

/**
 * link the javascript files 
 * 
 * @param array $array
 * @return print js links
 */
if (!function_exists('load_js')) {

    function load_js(array $array) {
        $version = get_setting("app_version");

        foreach ($array as $uri) {
            echo "<script type='text/javascript'  src='" . base_url($uri) . "?v=$version'></script>";
        }
    }

}
