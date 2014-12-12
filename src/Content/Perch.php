<?php namespace Cvaldemar\LaravelPerch\Content;

use PerchSystem;

/**
 * Class Perch
 * @package Cvaldemar\Laravel\Perch\Content
 */
class Perch {

	/**
	 * Retrieve content from Perch
	 *
	 * @param $region
	 * @param bool $return
	 * @return bool|mixed|string
	 */
	public function content($region, $return = true)
	{
		return perch_content($region, $return);
	}

	/**
	 * Set the current page
	 *
	 * @param $page
	 */
	public function set_page($page)
	{
		PerchSystem::set_page($page);
	}

	/**
	 * @param $key
	 * @param $opts
	 * @return bool
	 */
	public function content_create($key, $opts)
	{
		return perch_content_create($key, $opts);
	}

	/**
	 * @param $opts
	 * @param $return
	 * @return bool|mixed|string
	 */
	public function content_custom($opts, $return = true)
	{
		return perch_content_custom($opts, $return);
	}

	/**
	 * @param $key
	 * @param $opts
	 * @return bool|mixed|string
	 */
	public function content_search($key, $opts)
	{
		return perch_content_search($key, $opts);
	}

	/**
	 * @param array $opts
	 * @return array|string
	 */
	public function pages_navigation($opts = array())
	{
		return perch_pages_navigation($opts);
	}

	/**
	 * @param bool $opts
	 * @return string
	 */
	public function pages_navigation_text($opts = false)
	{
		return perch_pages_navigation_text($opts);
	}

	/**
	 * @param array $opts
	 * @return array|string
	 */
	public function pages_breadcrumbs($opts = array())
	{
		return perch_pages_breadcrumbs($opts);
	}

}
