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
	/**
	* @var string
	* @access private
	*/
	var $_orderNumber;

	/**
	* @var string
	* @access private
	*/
	var $_merchantCode;

	/**
	* @var string
	* @access private
	*/
	var $_invoice;

	/**
	* @var integer
	* @access private
	*/
	var $_amount;

	/**
	* @var string
	* @access private
	*/
	var $_currency;

	/**
	* @var string
	* @access private
	*/
	var $_description;

	/**
	* @var string
	* @access private
	*/
	var $_paymentMask;

	/**
	* @var string
	* @access private
	*/
	var $_authUser;

	/**
	* @var string
	* @access private
	*/
	var $_authPass;

	/**
	* Constructor for bibit payment class
	* @access public;
	*/
	function Bibit()
	{
		$this->_amount = 0;
		$this->_currency = "EUR";		//Default bibit currency
		$this->_paymentMask = "ALL";	//Show all payment methods to customer
	}
	
	/**
	* Property AuthPassword
	* @param string $Value - Password for Merchant (Same as backoffice login)
	* @return void
	* @access public
	function setAuthPassword($Value)
	{
		$this->_authPass = $Value;
	}
	
	/**
	* Property OrderNumber
	* @param string $Value - Order number
	* @return string
	* @access public;
	*/
	function setOrderNumber($Value)
	{
		$this->_orderNumber = $Value;
	}
	function getOrderNumber()
	{
		return $this->_orderNumber;
	}
	
	/**
	* Property MerchantCode. *REQUIRED*
	* @param string $Value - This code is assigned to you by Bibit.
	* @return string
	* @access public
	*/
	function setMerchantCode($Value)
	{
		$this->_merchantCode = $Value;
		$this->_authUser = $Value;		//username is same as merchantcode..
	}
	function getMerchantCode()
	{
		return $this->_merchantCode;
	}
	
	/** 
	* Property OrderAmount *REQUIRED*
	* @param integer $Value - The amount that should be paid by a shopper. (the amount is without a decimal point or comma)
	* @return integer
	* @access public
	*/
	function setOrderAmount($Value)
	{
		$this->_amount = $Value;
	}
	function getOrderAmount()
	{
		return $this->_amount;
	}
	
	/**
	* Property Currency
	* @param string $Value - A 3-char string that specifies the preferred payment currency. (EUR, USD, JPY)
	* @return string
	* @access public
	*/
	function setCurrency($Value)
	{
		if (strlen($Value) == 3)
		{
			//only set currency if it's a 3 chars currency code
			$this->_currency = strtoupper($Value);
		}
	}
	function getCurrency()
	{
		return $this->_currency;
	}
	
	/**
	* Property Invoice
	* @param string $Value - HTML invoice. Only tags that mey appear within the BODY tag. Max 10 KB
	* @return string
	* @access public
	function setInvoice($Value)
	{
		$this->_invoice = substr($Value, 0, 10000);	//maximum 1000 chars
	}
	function getInvoice()
	{
		return $this->_invoice;
	}
	
	/**
	* Property Description
	* @param string $Value - Short description (Max 50 characters). Will be used on screen and customer's bank or card statement.
	* @return string
	* @access public
	*/
	function setDescription($Value)
	{
		$this->_description = substr($Value, 0, 50);	//max 50 chars
	}
	function getDescription()
	{
		return $this->_description;
	}
	
	/**
	* Property PaymentMask
	* @param string $Value - Which payment methods are to be offered for this particulair transaction. See Bibitadministrative manual for methods
	* @return string
	* @access public
	*/
	function setPaymentMask($Value)
	{
		$this->_paymentMask = $Value;	//If incorrect, all allowed payment methods are showed
	}
	function getPaymentMask()
	{
		return $this->_paymentMask;
	}
	
}

?>
