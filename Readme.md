Cashfree Internet Payment Gateway Module for Magento 2.4x
============================================================

Install using SSH
cd /opt/bitnami/magento
composer require dravasp / cashfreepaymentgatewaymagento:dev-master
sudo magento-cli setup:upgrade

Login to Magento Admin > Configuration > Sales > Payment Methods

Instructions:
==================

[] Fill up Cashfree integration form - Ref. to https://bit.ly/3KVmzCh for Merchant Onboarding Requisites - https://www.cashfree.com/tnc/
  - Login to your Cashfree Account and Go to My Account > Integration > Try Test Environment
  - Connect with your Dedicated Account Manager at Cashfree
  - Complete KYC and Request Approval for Live Keys

[] Changes for going Live.
  - Insert your (variables) APP ID + SECRET KEY for Production Environment in Stores > Configrations > Sales > Payment Methods > Cashfree

[] Enabling the module and configuring it with your Cashfree Merchant credentials
  - Login to your Magento Admin and go to Store > Configuration.
  - On the left side bar, scroll down and click on "Payment Method" under the Sales section.
  - Scroll down the page and "Enable" the Cashfree module.
  - On the same page, click on "Payment Methods" on the sidebar under the section "SALES".
  - On this page, a "Cashfree" section will appear. Click on it if its not already open.
  - Add your APP ID + SECRET KEY here. Also specify sandbox to "NO" Always. 
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

[] Corporate Office Address  - Payment Gateway with Global Presence

  - Cashfree Payments India Private Limited (India - IN) 
    - Karnataka Office - 1st Floor, Vaishnavi Summit, No. 6/B, Summit, 80 Feet Rd, Koramangala 1A Block, Koramangala 3 Block, Koramangala, Bengaluru, Karnataka 560034
		+91 22 35155072
		
[] Important Emails for Corporate Communications and Risk Assessment
	- Corporate Communications media@cashfree.com
	
[] Install using composer require dravasp/cashfreepaymentgatewaymagento
  - Please Do Not Run composer with sudo or install in project root directory / Please Do Not Upload Static Files to Webserver.
  - Request Integration Support or Seek Guidance from Repo Maintainers
   
  - Sandbox URL Set - https://sandbox.cashfree.com/pg/orders (Currently Enabled)
  - Production URL Set - https://api.cashfree.com/pg/orders (Currently Enabled)
  - Support and Documentation - https://www.cashfree.com/help/hc and https://docs.cashfree.com/docs/magento

  - For Testing UAT run 
		md5 <filename>

  - Example
	md5 /opt/bitnami/magento/var/log/system.log
	inside SSH Terminal to provide verification to VAS Team
	
  - One-page Checkout Enabled for Magento Commerce OS - Bitnami
  
  Uninstall
	- composer remove dravasp/cashfreepaymentgatewaymagento
	- sudo magento-cli setup:upgrade
	- sudo magento-cli module:status