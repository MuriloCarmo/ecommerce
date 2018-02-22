<?php
/**
 * Created by PhpStorm.
 * User: murilo.carmo
 * Date: 22/02/2018
 * Time: 11:28
 */

namespace Hcode;


class PageAdmin extends page {

	public function __construct( array $opts = array(), $tpl_dir = "/ecommerce/views/admin/" ) {
		parent::__construct( $opts, $tpl_dir );
	}

}