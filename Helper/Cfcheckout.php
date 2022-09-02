<?php

namespace Cashfree\Cfcheckout\Helper;

use Magento\Sales\Model\Order;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Helper\AbstractHelper;

class Cfcheckout extends AbstractHelper
{
    protected $quote;
    protected $session;
    protected $quoteManagement;
    
    /**
     * Initialise helper function for checkout
     *
     * @return void
     */
    public function __construct(
        Context $context,
        \Magento\Quote\Model\Quote $quote,
        \Magento\Checkout\Model\Session $session,
        \Magento\Quote\Model\QuoteManagement $quoteManagement
    ) {
        $this->session          = $session;
        $this->quote            = $quote;
        $this->quoteManagement  = $quoteManagement;
        parent::__construct($context);
    }
    
    /**
     * getUrl
     *
     * @param  mixed $route
     * @param  mixed $params
     * @return void
     */
    public function getUrl($route, $params = [])
    {
        return $this->_getUrl($route, $params);
    }

    public function getPhoneCode($code)
    {
        $countrycode = array(
            '376'=>'AD',
            '971'=>'AE',
            '93'=>'AF',
            '1268'=>'AG',
            '1264'=>'AI',
            '355'=>'AL',
            '374'=>'AM',
            '599'=>'AN',
            '244'=>'AO',
            '672'=>'AQ',
            '54'=>'AR',
            '1684'=>'AS',
            '43'=>'AT',
            '61'=>'AU',
            '297'=>'AW',
            '994'=>'AZ',
            '387'=>'BA',
            '1246'=>'BB',
            '880'=>'BD',
            '32'=>'BE',
            '226'=>'BF',
            '359'=>'BG',
            '973'=>'BH',
            '257'=>'BI',
            '229'=>'BJ',
            '590'=>'BL',
            '1441'=>'BM',
            '673'=>'BN',
            '591'=>'BO',
            '55'=>'BR',
            '1242'=>'BS',
            '975'=>'BT',
            '267'=>'BW',
            '375'=>'BY',
            '501'=>'BZ',
            '1'=>'CA',
            '61'=>'CC',
            '243'=>'CD',
            '236'=>'CF',
            '242'=>'CG',
            '41'=>'CH',
            '225'=>'CI',
            '682'=>'CK',
            '56'=>'CL',
            '237'=>'CM',
            '86'=>'CN',
            '57'=>'CO',
            '506'=>'CR',
            '53'=>'CU',
            '238'=>'CV',
            '61'=>'CX',
            '357'=>'CY',
            '420'=>'CZ',
            '49'=>'DE',
            '253'=>'DJ',
            '45'=>'DK',
            '1767'=>'DM',
            '1809'=>'DO',
            '213'=>'DZ',
            '593'=>'EC',
            '372'=>'EE',
            '20'=>'EG',
            '291'=>'ER',
            '34'=>'ES',
            '251'=>'ET',
            '358'=>'FI',
            '679'=>'FJ',
            '500'=>'FK',
            '691'=>'FM',
            '298'=>'FO',
            '33'=>'FR',
            '241'=>'GA',
            '44'=>'GB',
            '1473'=>'GD',
            '995'=>'GE',
            '233'=>'GH',
            '350'=>'GI',
            '299'=>'GL',
            '220'=>'GM',
            '224'=>'GN',
            '240'=>'GQ',
            '30'=>'GR',
            '502'=>'GT',
            '1671'=>'GU',
            '245'=>'GW',
            '592'=>'GY',
            '852'=>'HK',
            '504'=>'HN',
            '385'=>'HR',
            '509'=>'HT',
            '36'=>'HU',
            '62'=>'ID',
            '353'=>'IE',
            '972'=>'IL',
            '44'=>'IM',
            '91'=>'IN',
            '964'=>'IQ',
            '98'=>'IR',
            '354'=>'IS',
            '39'=>'IT',
            '1876'=>'JM',
            '962'=>'JO',
            '81'=>'JP',
            '254'=>'KE',
            '996'=>'KG',
            '855'=>'KH',
            '686'=>'KI',
            '269'=>'KM',
            '1869'=>'KN',
            '850'=>'KP',
            '82'=>'KR',
            '965'=>'KW',
            '1345'=>'KY',
            '7'=>'KZ',
            '856'=>'LA',
            '961'=>'LB',
            '1758'=>'LC',
            '423'=>'LI',
            '94'=>'LK',
            '231'=>'LR',
            '266'=>'LS',
            '370'=>'LT',
            '352'=>'LU',
            '371'=>'LV',
            '218'=>'LY',
            '212'=>'MA',
            '377'=>'MC',
            '373'=>'MD',
            '382'=>'ME',
            '1599'=>'MF',
            '261'=>'MG',
            '692'=>'MH',
            '389'=>'MK',
            '223'=>'ML',
            '95'=>'MM',
            '976'=>'MN',
            '853'=>'MO',
            '1670'=>'MP',
            '222'=>'MR',
            '1664'=>'MS',
            '356'=>'MT',
            '230'=>'MU',
            '960'=>'MV',
            '265'=>'MW',
            '52'=>'MX',
            '60'=>'MY',
            '258'=>'MZ',
            '264'=>'NA',
            '687'=>'NC',
            '227'=>'NE',
            '234'=>'NG',
            '505'=>'NI',
            '31'=>'NL',
            '47'=>'NO',
            '977'=>'NP',
            '674'=>'NR',
            '683'=>'NU',
            '64'=>'NZ',
            '968'=>'OM',
            '507'=>'PA',
            '51'=>'PE',
            '689'=>'PF',
            '675'=>'PG',
            '63'=>'PH',
            '92'=>'PK',
            '48'=>'PL',
            '508'=>'PM',
            '870'=>'PN',
            '1'=>'PR',
            '351'=>'PT',
            '680'=>'PW',
            '595'=>'PY',
            '974'=>'QA',
            '40'=>'RO',
            '381'=>'RS',
            '7'=>'RU',
            '250'=>'RW',
            '966'=>'SA',
            '677'=>'SB',
            '248'=>'SC',
            '249'=>'SD',
            '46'=>'SE',
            '65'=>'SG',
            '290'=>'SH',
            '386'=>'SI',
            '421'=>'SK',
            '232'=>'SL',
            '378'=>'SM',
            '221'=>'SN',
            '252'=>'SO',
            '597'=>'SR',
            '239'=>'ST',
            '503'=>'SV',
            '963'=>'SY',
            '268'=>'SZ',
            '1649'=>'TC',
            '235'=>'TD',
            '228'=>'TG',
            '66'=>'TH',
            '992'=>'TJ',
            '690'=>'TK',
            '670'=>'TL',
            '993'=>'TM',
            '216'=>'TN',
            '676'=>'TO',
            '90'=>'TR',
            '1868'=>'TT',
            '688'=>'TV',
            '886'=>'TW',
            '255'=>'TZ',
            '380'=>'UA',
            '256'=>'UG',
            '1'=>'US',
            '598'=>'UY',
            '998'=>'UZ',
            '39'=>'VA',
            '1784'=>'VC',
            '58'=>'VE',
            '1284'=>'VG',
            '1340'=>'VI',
            '84'=>'VN',
            '678'=>'VU',
            '681'=>'WF',
            '685'=>'WS',
            '381'=>'XK',
            '967'=>'YE',
            '262'=>'YT',
            '27'=>'ZA',
            '260'=>'ZM',
            '263'=>'ZW'
        );

        $key = array_search($code,$countrycode);
        
        return $key;
    }

}
