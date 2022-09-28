Cashfree Internet Payment Gateway Module for Magento 2.4x
============================================================
![Cashfree Payments - Partner Affiliate Marketing - WE SKY PRINT LLP 02@4x-100](https://user-images.githubusercontent.com/27689043/188277587-488fb358-6ec4-44c5-b908-fd6c2d3b6bfa.jpg)

Install using SSH
```
cd /opt/bitnami/magento
composer require dravasp/cashfreepaymentgatewaymagento:dev-master
sudo magento-cli setup:upgrade
```

Login to Magento Admin > Configuration > Sales > Payment Methods

Instructions:
==================

[] Fill up Cashfree integration form - Ref. to [https://bit.ly/3KVmzCh](https://bit.ly/3CVbizH) for Merchant Onboarding Requisites - `https://www.cashfree.com/tnc/`
  - Login to your Cashfree Account and Go to My Account > Integration > Try Test Environment
  - Connect with your Dedicated Account Manager at Cashfree
  - Complete KYC and Request Approval for Live Keys

[] Changes for going Live.
  - Insert your (variables) `APP ID` + `SECRET KEY` for Production Environment in Stores > Configuration > Sales > Payment Methods > Cashfree

[] Enabling the module and configuring it with your Cashfree Merchant credentials
  - Login to your Magento Admin and go to Store > Configuration.
  - On the left side bar, scroll down and click on "Payment Method" under the Sales section.
  - Scroll down the page and "Enable" the Cashfree module.
  - On the same page, click on "Payment Methods" on the sidebar under the section "SALES".
  - On this page, a "Cashfree" section will appear. Click on it if its not already open.
  - Add your `APP ID` + `SECRET KEY` here. Also specify sandbox to "NO" Always. 
    click "Save Config".
    Additionally, if you want that only buyers from particular country or countries should be able to use Cashfree,  
    against the "Payment Applicable From" field, select "Specific Countries" and then select the countries in the box
    that opens up. In order to select more than one country, you will need to click on the countries with ctrl key of the 
    keyboard pressed. Sort Order field determines in which order Cashfree will be displayed to the buyer during checkout.
   
[] Testing Cashfree Internet Payment Gateway
  - Make sure that sandbox mode is on and all details are entered in the Cashfree configuration
  - Go to your store and place an order. 
  - If you configured Cashfree correctly in the previous step, it should appear as an option under payment methods
    during checkout
  - When you click on checkout, it should redirect you to Cashfreepaymentgateway and show credit card and netbanking form. 
  - Use a Netbanking to complete a test payment. On Live Mode, your preferred Acceptance Modes will be Visible - CC, DC, Wallets, Netbanking
  - All banks netbanking are not activated by default - Usually takes 48-76 hours to activate all preferred partner banks.
  - VAS Team along with Dedicated Account Manager will email list of available banks for Netbanking

[] Checking the status of payment transaction at Cashfree Dashboard from your Magento Admin
  - Login to admin and under Sales, click on Orders
  - Click on the first order in the data grid. This should be the order that you just placed
  - When the order details page opens up, look for "Payment Information" block. 
    Inside the block, you can see the latest status of the transaction on Cashfree end. 

You will now be able to integrate Cashfree with your existing Merchant Services Account of choice where you host your Merchant Account

Merchant Account or Cash Collection Service Account with India's Leading Banks allow high order value or high frequency volume (recurring trxns.) - 
```HDFC Merchant Services, YES Bank Merchant Services, ICICI First Data, Kotak Mahindra Bank, ICICI Instabiz, SBIePay or SBI Merchant Services, Axis Bank Internet Payment Gateway```

Benefits of Merchant Services as opposed to standard Integration - 
```
Get an integrated, rules-based, proactive risk management system that is supported by industry standard security
Enjoy 99.9% uptime and a 24-hour helpdesk support
Get customised MIS solutions for your business needs
```

You can apply for a Merchant Account with Cashfree + HDFC Merchant Services

```
HDFC Merchant Services eComm Support +91.2233557000 / +91.20.60017000
```
```
Locate HDFC Branch near you - https://v1.hdfcbank.com/htdocs/common/hdfcbank_branch_ifsc-code.html?src=find
````

[] Corporate Office Address  - Payment Gateway with Multiple Industry Verticals

  - Cashfree Payments India Private Limited (India - IN) 
    - Karnataka Office - 1st Floor, Vaishnavi Summit, No. 6/B, Summit, 80 Feet Rd, Koramangala 1A Block, Koramangala 3 Block, Koramangala, Bengaluru, Karnataka 560034
		
[] Important Emails for Corporate Communications and Risk Assessment
	- Corporate Communications media@cashfree.com / developer@cashfree.com
	
![Cashfree Payments - WE SKY PRINT LLP - Partner Affiliate 02@4x-100](https://user-images.githubusercontent.com/27689043/188277633-3aeee4b7-0ef7-4072-a594-68c9ed423b61.jpg)

[] Install using `composer require dravasp/cashfreepaymentgatewaymagento:dev-master`
  - Please Do Not Run composer with sudo or install in project root directory / Please Do Not Upload Static Files to Webserver.
  - Request Integration Support or Seek Guidance from Repo Maintainers
   
  - Sandbox URL Set - `https://sandbox.cashfree.com/pg/orders` (Currently Enabled)
  - Production URL Set - `https://api.cashfree.com/pg/orders` (Currently Enabled)
  - Support and Documentation - `https://www.cashfree.com/help/hc` and `https://docs.cashfree.com/docs/magento`

  - For Testing UAT run 
		md5 <filename>

  - Example
	```
	md5 /opt/bitnami/magento/var/log/system.log
	```
	inside SSH Terminal to provide verification to VAS Team
	
  - One-page Checkout Enabled for Magento Commerce OS - Bitnami
  
  Uninstall
```	
	sudo magento-cli module:disable Cashfree_Cfcheckout
	composer remove dravasp/cashfreepaymentgatewaymagento
	sudo magento-cli setup:upgrade
	sudo magento-cli module:status
```	

  Hard Delete an Plugin / Extension
```
	sudo nano /bitnami/magento/app/etc/config.php
	Page Down to Cashfree_Cfcheckout
	Delete and make sure there are no trailing spaces
	CTRL/CMD + X and Click Y to Save without Renaming the file
```
	
```	
	
	composer dump-autoload
	sudo magento-cli setup:upgrade
	
```
	
```	Wait for a few minutes RUN command
	sudo /opt/bitnami/ctlscript.sh restart
	Wait for a few minutes and Re-check
```	
New Registration for Merchants - https://bit.ly/3CVbizH

Download Cashfree Merchant Dashboard via Google Play - `https://play.google.com/store/apps/details?id=com.cashfree.merchant&hl=en_IN&gl=US`

	
	
Optional Method to Allow Private Repositories via Composer
`composer config --global --auth http-basic.repo.packagist.com token c6addb89a67b2822d352d114`

	OR
 
`cd /opt/bitnami/magento`
`nano composer.json`

	Add the following to your composer.json by
```    
	"repositories": [{
		"type": "composer",
      		"url": "https://repo.packagist.com/our-company/cool-client-proj"
			}, 
	{"packagist.org": false}]
```
  Run 
	`composer update`

Subscribe to `MATRIX Communications WAP Service` for `Terminal` Access even in Remote Locations.
	- Register your interest at https://matrix.in
	- Complete KYC with TRAI Required



As per payment gateway policies and liability shift clause, it is merchant responsibility to adhere to PCI Compliant CMS through Payment Acceptance Directives

View Patch Type - `Required` or `Optional` (in the Display Patch Grid by following commands below)
The great part about using Bitnami Magento OS is they are all updated where mandatory security patches are applied to each release. You can view all patches applicable to your specific installation - `https://devdocs.magento.com/quality-patches/tool.html#patch-grid`

Steps to Follow -
```
sudo magento-cli maintenance:enable
composer require magento/quality-patches
./vendor/bin/magento-patches status
```
```
Select '2' Adobe Commerce Support followed by '1' to Display All Available Requred and Optional Patches
./vendor/bin/magento-patches apply MDVA-30106 MDVA-12304
```

```
Steps to Revert via Single Command -
./vendor/bin/magento-patches revert MDVA-30106 MDVA-12304
```

| Magento 2.4x on Bitnami  | Optional/REQUIRED  |  Patch Prefix
| ------------- | ------------- | ------------- |
| MDVA-30106 | Optional  |  MDVA
| MDVA-12304 | Optional  |  MDVA
| MDVA-19640 | Optional  |  MDVA
| MDVA-41061-V4 | Optional  |  MDVA
| MDVA-38346 | Optional  |  MDVA
| MDVA-38626 | Optional  |  MDVA
| MDVA-38728 | Optional  |  MDVA
| MDVA-41305-V2 | Optional  |  MDVA
| MDVA-42790 | Optional  |  MDVA
| MDVA-42269 | Optional  |  MDVA
| MDVA-42237 | Optional  |  MDVA
| MDVA-42410 | Optional  |  MDVA
| MDVA-41136 | Optional  |  MDVA
| MDVA-41628 | Optional  |  MDVA
| MDVA-42950 | Optional  |  MDVA
| MDVA-42689 | Optional  |  MDVA
| MDVA-41229 | Optional  |  MDVA
| MDVA-39605 | Optional  |  MDVA
| MDVA-43862 | Optional  |  MDVA
| MDVA-43824 | Optional  |  MDVA
| MDVA-43491 | Optional  |  MDVA
| MDVA-43601 | Optional  |  MDVA
| MDVA-44188 | Optional  |  MDVA
| MDVA-42283 | Optional  |  MDVA
| MDVA-43983 | Optional  |  MDVA
| MDVA-44100 | Optional  |  MDVA
| MDVA-43605 | Optional  |  MDVA
| MDVA-43102 | Optional  |  MDVA
| MDVA-43178 | Optional  |  MDVA
| MDVA-44887 | Optional  |  MDVA
| MDVA-44660 | Optional  |  MDVA
| MDVA-44703 | Optional  |  MDVA
| MDVA-44940 | Optional  |  MDVA
| MDVA-44562 | Optional  |  MDVA
| MDVA-43167 | Optional  |  MDVA
| MDVA-42807 | Optional  |  MDVA

```
Select '2' Adobe Commerce Support followed by '1' to Display All Available Requred and Optional Patches
./vendor/bin/magento-patches apply ACSD-45143 ACSD-44591
```

```
Steps to Revert via Single Command -
./vendor/bin/magento-patches revert ACSD-45143 ACSD-44591
```


| Magento 2.4x on Bitnami  | Optional/REQUIRED  |  Patch Prefix
| ------------- | ------------- | ------------- |
| ACSD-45143 | Optional  |  ACSD
| ACSD-44591 | Optional  |  ACSD
| ACSD-45169 | Optional  |  ACSD
| ACSD-45424 | Optional  |  ACSD
| ACSD-46146 | Optional  |  ACSD
| ACSD-45255 | Optional  |  ACSD
| ACSD-45488 | Optional  |  ACSD
| ACSD-45754 | Optional  |  ACSD
| ACSD-46213 | Optional  |  ACSD
| ACSD-46192 | Optional  |  ACSD
| ACSD-46404 | Optional  |  ACSD
| ACSD-46703 | Optional  |  ACSD
| ACSD-44851 | Optional  |  ACSD
| ACSD-45675 | Optional  |  ACSD
| ACSD-46869 | Optional  |  ACSD
