<?php
/**
 * Created by PhpStorm.
 * User: murilo.carmo
 * Date: 22/02/2018
 * Time: 09:57
 */

namespace Hcode;

use Rain\Tpl;

class PageAdmin {

	private $tpl;
	private $default = [
		"data" => []
	];
	private $options = [];
	public function setData( $data = array() ) {

		foreach ( $data as $key => $value ) {
			$this->tpl->assign( $key, $value );
		}
	}

	public function __construct( $opts = array(), $tpl_dir = "/ecommerce/views/admin/" ) {

		$this->options = array_merge( $this->default, $opts );

		$config = array(
			"tpl_dir"   => $_SERVER["DOCUMENT_ROOT"] . $tpl_dir,
			"cache_dir" => $_SERVER["DOCUMENT_ROOT"] . "/views-cache",
			"debug"     => false
		);

		Tpl::configure( $config );
		$this->tpl = new Tpl;
		$this->setData($this->options["data"]);
		$this->tpl->draw("header");
	}

	public function setTpl($name, $data = array(), $returnHtml = false) {

		$this->setData($data); //Passa dados para o template (index)
		return $this->tpl->draw($name, $returnHtml);

	}

	public function __destruct() {
		$this->tpl->draw("footer");

	}
}
