<?php namespace Cvaldemar\LaravelPerch\Twig\Extensions;

use Cvaldemar\LaravelPerch\Content\Perch as CMS;
use Twig_Extension;
use Twig_SimpleFunction;
use Twig_SimpleFilter;

/**
 * Class ContentManagementSystem
 *
 * Adds simple content management specific functions
 * and filters to Twig. Most functions are Perch specific.
 *
 * @package Towoo\View\Twig\Extensions
 */
class ContentManagementSystem extends Twig_Extension
{

	/**
	 * @var CMS
	 */
	protected $cms;

	/**
	 * @param CMS $cms
	 */
	public function __construct(CMS $cms)
	{
		$this->cms = $cms;
	}

	/**
	 * A blank transparent gif
	 *
	 * @var string
	 */
	protected $blankImgData = 'data:image/gif;base64,R0lGODlhIAAgAOMJAMzMzJaWlre3t5ycnL6+vsXFxaOjo7Gxsaqqqv///////////////////////////yH+EUNyZWF0ZWQgd2l0aCBHSU1QACwAAAAAIAAgAAAEIhDISau9OOvNu/9gKI5kaZ5oqq5s675wLM90bd94ru+8HAEAOw==';

	/**
	 * Twig functions
	 *
	 * @return array
	 */
	public function getFunctions()
	{
		return [
			'perch'  => new Twig_SimpleFunction('perch_*', array($this, 'cms')),
		];
	}

	/**
	 * Twig filters
	 *
	 * @return array
	 */
	public function getFilters()
	{
		return array(
			new Twig_SimpleFilter('imagefilesize', array($this, 'imagefilesize')),
		);
	}

	/**
	 * Call the Content Management System and do whatever with
	 * the
	 *
	 * @return mixed
	 */
	public function cms()
	{
		$args = func_get_args();
		$function = $args[0];
		array_shift($args);

		return call_user_func_array(
			array($this->cms, $function),
			$args
		);
	}

	/**
	 * Returns a new path and filename containing file dimensions
	 *
	 * @param $path
	 * @param int $width
	 * @param int $height
	 * @return string
	 */
	public function imagefilesize($path, $width = 200, $height = 100)
	{
		if (!$path)  return $this->blankImgData;

		$p = pathinfo($path);

		$dirname = array_key_exists('dirname', $p) ? $p['dirname'] : '';
		$filename = array_key_exists('filename', $p) ? $p['filename'] : '';
		$extension = array_key_exists('extension', $p) ? $p['extension'] : '';

		return $dirname . '/' . $filename . '-w' . $width . 'h' . $height . '.' . $extension;
	}

	/**
	 * Extension name
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'perch';
	}
}
