<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Dave Mertens <dmertens@zyprexia.com>                        |
// +----------------------------------------------------------------------+
//
// $Id$

/**
* @const BIBIT_ERROR_INTERNAL Internal or other error (not one of the other error numbers)
*/
define( "BIBIT_ERROR_INTERNAL", 1 );

/**
* @const BIBIT_ERROR_PARSE XML connot be parsed
*/
define( "BIBIT_ERROR_PARSE", 2 );

/**
* @const BIBIT_ERROR_ORDER_AMOUNT Invalid number of transactions in batch, or invalid amount
*/
define( "BIBIT_ERROR_ORDER_AMOUNT", 3);

/**
* @const BIBIT_ERROR_SECURITY Invalid IP address/password etc
*/
define( "BIBIT_ERROR_SECURITY", 4);

/**
* @const BIBIT_ERROR_INVALID_REQUEST e.g. cancel of a non existent payment; duplicate order etc.
*/
define( "BIBIT_ERROR_INVALID_REQUEST", 5);

/** 
* @const BIBIT_ERROR_INVALID_CONTENT order in a batch not valid
*//
define( "BIBIT_ERROR_INVALID_CONTENT", 6):

/**
* @const BIBIT_ERROR_PAYMENT_DETAILS creditcard number not ok, expiry date in the past, etc
*/
define( "BIBIT_ERROR_PAYMENT_DETAILS", 7);

/**
* Bibit payment class
*
* @version $Revision$
* @access public
* @author Dave Mertens <dmertens@zyprexia.com>
* @package Payment_Bibit
*/
class Bibit extends pear
{

	
	function Bibit()
	{
		return 1;
	}
	
	function setOrderNumber($Value)
	{
	}
	function getOrderNumber()
	{
	}
	
	/**
	* Property MerchantCode. *REQUIRED*
	* @param string $Value - This code is assigned to you by Bibit.
	* @return string
	* @access public
	*/
	function setMerchantCode($Value)
	{
	}
	function getMerchantCode()
	{
	}
	
	/** 
	* Property OrderAmount *REQUIRED*
	* @param integer $Value - The amount that should be paid by a shopper. (the amount is without a decimal point or comma)
	* @return integer
	* @access public
	*/
	function setOrderAmount($Value)
	{
	}
	function getOrderAmount()
	{
	}
	
	/**
	* Property Currency
	* @param string $Value - A 3-char string that specifies the preferred payment currency. (EUR, USD, JPY)
	* @return string
	* @access public
	*/
	function setCurrency($Value)
	{
	}
	function getCurrency()
	{
	}
	
	/**
	* Property Invoice
	* @param string $Value - HTML invoice. Only tags that mey appear within the BODY tag. Max 10 KB
	* @return string
	* @access public
	function setInvoice($Value)
	{
	}
	function getInvoice()
	{
	}
	
	/**
	* Property Description
	* @param string $Value - Short description (Max 50 characters). Will be used on screen and customer's bank or card statement.
	* @return string
	* @access public
	*/
	function setDescription($Value)
	{
	}
	function getDescription()
	{
	}
	
	/**
	* Property PaymentMask
	* @param string $Value - Which payment methods are to be offered for this particulair transaction. See Bibitadministrative manual for methods
	* @return string
	* @access public
	*/
	function setPaymentMask($Value)
	{
	}
	function getPaymentMask()
	{
	}
	
}

?>
