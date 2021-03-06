<?php

class CMB2_Test extends WP_UnitTestCase {

	/**
	 * Set up the test fixture
	 */
	public function setUp() {
		parent::setUp();
	}

	public function test_cmb2_has_version_number() {
		$this->assertTrue( defined( 'CMB2_VERSION' ) );
	}

	/**
	 * @expectedException WPDieException
	 */
	public function test_cmb2_die_with_no_id() {
		$cmb = new CMB2( array() );
	}

	public function normalize_string( $string ) {
		return trim( preg_replace( array(
			'/[\t\n\r]/', // Remove tabs and newlines
			'/\s{2,}/', // Replace repeating spaces with one space
			'/> </', // Remove spaces between carats
		), array(
			'',
			' ',
			'><',
		), $string ) );
	}

}
