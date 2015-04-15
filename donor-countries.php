<?php
/**
 * Countries
 *
 * Returns an array of countries and codes.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$donor_countries = array(
	''	 => __( 'Select your country', 'wpdonations' ),
	'AF' => __( 'Afghanistan', 'wpdonations' ),
	'AX' => __( '&#197;land Islands', 'wpdonations' ),
	'AL' => __( 'Albania', 'wpdonations' ),
	'DZ' => __( 'Algeria', 'wpdonations' ),
	'AD' => __( 'Andorra', 'wpdonations' ),
	'AO' => __( 'Angola', 'wpdonations' ),
	'AI' => __( 'Anguilla', 'wpdonations' ),
	'AQ' => __( 'Antarctica', 'wpdonations' ),
	'AG' => __( 'Antigua and Barbuda', 'wpdonations' ),
	'AR' => __( 'Argentina', 'wpdonations' ),
	'AM' => __( 'Armenia', 'wpdonations' ),
	'AW' => __( 'Aruba', 'wpdonations' ),
	'AU' => __( 'Australia', 'wpdonations' ),
	'AT' => __( 'Austria', 'wpdonations' ),
	'AZ' => __( 'Azerbaijan', 'wpdonations' ),
	'BS' => __( 'Bahamas', 'wpdonations' ),
	'BH' => __( 'Bahrain', 'wpdonations' ),
	'BD' => __( 'Bangladesh', 'wpdonations' ),
	'BB' => __( 'Barbados', 'wpdonations' ),
	'BY' => __( 'Belarus', 'wpdonations' ),
	'BE' => __( 'Belgium', 'wpdonations' ),
	'PW' => __( 'Belau', 'wpdonations' ),
	'BZ' => __( 'Belize', 'wpdonations' ),
	'BJ' => __( 'Benin', 'wpdonations' ),
	'BM' => __( 'Bermuda', 'wpdonations' ),
	'BT' => __( 'Bhutan', 'wpdonations' ),
	'BO' => __( 'Bolivia', 'wpdonations' ),
	'BQ' => __( 'Bonaire, Saint Eustatius and Saba', 'wpdonations' ),
	'BA' => __( 'Bosnia and Herzegovina', 'wpdonations' ),
	'BW' => __( 'Botswana', 'wpdonations' ),
	'BV' => __( 'Bouvet Island', 'wpdonations' ),
	'BR' => __( 'Brazil', 'wpdonations' ),
	'IO' => __( 'British Indian Ocean Territory', 'wpdonations' ),
	'VG' => __( 'British Virgin Islands', 'wpdonations' ),
	'BN' => __( 'Brunei', 'wpdonations' ),
	'BG' => __( 'Bulgaria', 'wpdonations' ),
	'BF' => __( 'Burkina Faso', 'wpdonations' ),
	'BI' => __( 'Burundi', 'wpdonations' ),
	'KH' => __( 'Cambodia', 'wpdonations' ),
	'CM' => __( 'Cameroon', 'wpdonations' ),
	'CA' => __( 'Canada', 'wpdonations' ),
	'CV' => __( 'Cape Verde', 'wpdonations' ),
	'KY' => __( 'Cayman Islands', 'wpdonations' ),
	'CF' => __( 'Central African Republic', 'wpdonations' ),
	'TD' => __( 'Chad', 'wpdonations' ),
	'CL' => __( 'Chile', 'wpdonations' ),
	'CN' => __( 'China', 'wpdonations' ),
	'CX' => __( 'Christmas Island', 'wpdonations' ),
	'CC' => __( 'Cocos (Keeling) Islands', 'wpdonations' ),
	'CO' => __( 'Colombia', 'wpdonations' ),
	'KM' => __( 'Comoros', 'wpdonations' ),
	'CG' => __( 'Congo (Brazzaville)', 'wpdonations' ),
	'CD' => __( 'Congo (Kinshasa)', 'wpdonations' ),
	'CK' => __( 'Cook Islands', 'wpdonations' ),
	'CR' => __( 'Costa Rica', 'wpdonations' ),
	'HR' => __( 'Croatia', 'wpdonations' ),
	'CU' => __( 'Cuba', 'wpdonations' ),
	'CW' => __( 'Cura&Ccedil;ao', 'wpdonations' ),
	'CY' => __( 'Cyprus', 'wpdonations' ),
	'CZ' => __( 'Czech Republic', 'wpdonations' ),
	'DK' => __( 'Denmark', 'wpdonations' ),
	'DJ' => __( 'Djibouti', 'wpdonations' ),
	'DM' => __( 'Dominica', 'wpdonations' ),
	'DO' => __( 'Dominican Republic', 'wpdonations' ),
	'EC' => __( 'Ecuador', 'wpdonations' ),
	'EG' => __( 'Egypt', 'wpdonations' ),
	'SV' => __( 'El Salvador', 'wpdonations' ),
	'GQ' => __( 'Equatorial Guinea', 'wpdonations' ),
	'ER' => __( 'Eritrea', 'wpdonations' ),
	'EE' => __( 'Estonia', 'wpdonations' ),
	'ET' => __( 'Ethiopia', 'wpdonations' ),
	'FK' => __( 'Falkland Islands', 'wpdonations' ),
	'FO' => __( 'Faroe Islands', 'wpdonations' ),
	'FJ' => __( 'Fiji', 'wpdonations' ),
	'FI' => __( 'Finland', 'wpdonations' ),
	'FR' => __( 'France', 'wpdonations' ),
	'GF' => __( 'French Guiana', 'wpdonations' ),
	'PF' => __( 'French Polynesia', 'wpdonations' ),
	'TF' => __( 'French Southern Territories', 'wpdonations' ),
	'GA' => __( 'Gabon', 'wpdonations' ),
	'GM' => __( 'Gambia', 'wpdonations' ),
	'GE' => __( 'Georgia', 'wpdonations' ),
	'DE' => __( 'Germany', 'wpdonations' ),
	'GH' => __( 'Ghana', 'wpdonations' ),
	'GI' => __( 'Gibraltar', 'wpdonations' ),
	'GR' => __( 'Greece', 'wpdonations' ),
	'GL' => __( 'Greenland', 'wpdonations' ),
	'GD' => __( 'Grenada', 'wpdonations' ),
	'GP' => __( 'Guadeloupe', 'wpdonations' ),
	'GT' => __( 'Guatemala', 'wpdonations' ),
	'GG' => __( 'Guernsey', 'wpdonations' ),
	'GN' => __( 'Guinea', 'wpdonations' ),
	'GW' => __( 'Guinea-Bissau', 'wpdonations' ),
	'GY' => __( 'Guyana', 'wpdonations' ),
	'HT' => __( 'Haiti', 'wpdonations' ),
	'HM' => __( 'Heard Island and McDonald Islands', 'wpdonations' ),
	'HN' => __( 'Honduras', 'wpdonations' ),
	'HK' => __( 'Hong Kong', 'wpdonations' ),
	'HU' => __( 'Hungary', 'wpdonations' ),
	'IS' => __( 'Iceland', 'wpdonations' ),
	'IN' => __( 'India', 'wpdonations' ),
	'ID' => __( 'Indonesia', 'wpdonations' ),
	'IR' => __( 'Iran', 'wpdonations' ),
	'IQ' => __( 'Iraq', 'wpdonations' ),
	'IE' => __( 'Republic of Ireland', 'wpdonations' ),
	'IM' => __( 'Isle of Man', 'wpdonations' ),
	'IL' => __( 'Israel', 'wpdonations' ),
	'IT' => __( 'Italy', 'wpdonations' ),
	'CI' => __( 'Ivory Coast', 'wpdonations' ),
	'JM' => __( 'Jamaica', 'wpdonations' ),
	'JP' => __( 'Japan', 'wpdonations' ),
	'JE' => __( 'Jersey', 'wpdonations' ),
	'JO' => __( 'Jordan', 'wpdonations' ),
	'KZ' => __( 'Kazakhstan', 'wpdonations' ),
	'KE' => __( 'Kenya', 'wpdonations' ),
	'KI' => __( 'Kiribati', 'wpdonations' ),
	'KW' => __( 'Kuwait', 'wpdonations' ),
	'KG' => __( 'Kyrgyzstan', 'wpdonations' ),
	'LA' => __( 'Laos', 'wpdonations' ),
	'LV' => __( 'Latvia', 'wpdonations' ),
	'LB' => __( 'Lebanon', 'wpdonations' ),
	'LS' => __( 'Lesotho', 'wpdonations' ),
	'LR' => __( 'Liberia', 'wpdonations' ),
	'LY' => __( 'Libya', 'wpdonations' ),
	'LI' => __( 'Liechtenstein', 'wpdonations' ),
	'LT' => __( 'Lithuania', 'wpdonations' ),
	'LU' => __( 'Luxembourg', 'wpdonations' ),
	'MO' => __( 'Macao S.A.R., China', 'wpdonations' ),
	'MK' => __( 'Macedonia', 'wpdonations' ),
	'MG' => __( 'Madagascar', 'wpdonations' ),
	'MW' => __( 'Malawi', 'wpdonations' ),
	'MY' => __( 'Malaysia', 'wpdonations' ),
	'MV' => __( 'Maldives', 'wpdonations' ),
	'ML' => __( 'Mali', 'wpdonations' ),
	'MT' => __( 'Malta', 'wpdonations' ),
	'MH' => __( 'Marshall Islands', 'wpdonations' ),
	'MQ' => __( 'Martinique', 'wpdonations' ),
	'MR' => __( 'Mauritania', 'wpdonations' ),
	'MU' => __( 'Mauritius', 'wpdonations' ),
	'YT' => __( 'Mayotte', 'wpdonations' ),
	'MX' => __( 'Mexico', 'wpdonations' ),
	'FM' => __( 'Micronesia', 'wpdonations' ),
	'MD' => __( 'Moldova', 'wpdonations' ),
	'MC' => __( 'Monaco', 'wpdonations' ),
	'MN' => __( 'Mongolia', 'wpdonations' ),
	'ME' => __( 'Montenegro', 'wpdonations' ),
	'MS' => __( 'Montserrat', 'wpdonations' ),
	'MA' => __( 'Morocco', 'wpdonations' ),
	'MZ' => __( 'Mozambique', 'wpdonations' ),
	'MM' => __( 'Myanmar', 'wpdonations' ),
	'NA' => __( 'Namibia', 'wpdonations' ),
	'NR' => __( 'Nauru', 'wpdonations' ),
	'NP' => __( 'Nepal', 'wpdonations' ),
	'NL' => __( 'Netherlands', 'wpdonations' ),
	'AN' => __( 'Netherlands Antilles', 'wpdonations' ),
	'NC' => __( 'New Caledonia', 'wpdonations' ),
	'NZ' => __( 'New Zealand', 'wpdonations' ),
	'NI' => __( 'Nicaragua', 'wpdonations' ),
	'NE' => __( 'Niger', 'wpdonations' ),
	'NG' => __( 'Nigeria', 'wpdonations' ),
	'NU' => __( 'Niue', 'wpdonations' ),
	'NF' => __( 'Norfolk Island', 'wpdonations' ),
	'KP' => __( 'North Korea', 'wpdonations' ),
	'NO' => __( 'Norway', 'wpdonations' ),
	'OM' => __( 'Oman', 'wpdonations' ),
	'PK' => __( 'Pakistan', 'wpdonations' ),
	'PS' => __( 'Palestinian Territory', 'wpdonations' ),
	'PA' => __( 'Panama', 'wpdonations' ),
	'PG' => __( 'Papua New Guinea', 'wpdonations' ),
	'PY' => __( 'Paraguay', 'wpdonations' ),
	'PE' => __( 'Peru', 'wpdonations' ),
	'PH' => __( 'Philippines', 'wpdonations' ),
	'PN' => __( 'Pitcairn', 'wpdonations' ),
	'PL' => __( 'Poland', 'wpdonations' ),
	'PT' => __( 'Portugal', 'wpdonations' ),
	'QA' => __( 'Qatar', 'wpdonations' ),
	'RE' => __( 'Reunion', 'wpdonations' ),
	'RO' => __( 'Romania', 'wpdonations' ),
	'RU' => __( 'Russia', 'wpdonations' ),
	'RW' => __( 'Rwanda', 'wpdonations' ),
	'BL' => __( 'Saint Barth&eacute;lemy', 'wpdonations' ),
	'SH' => __( 'Saint Helena', 'wpdonations' ),
	'KN' => __( 'Saint Kitts and Nevis', 'wpdonations' ),
	'LC' => __( 'Saint Lucia', 'wpdonations' ),
	'MF' => __( 'Saint Martin (French part)', 'wpdonations' ),
	'SX' => __( 'Saint Martin (Dutch part)', 'wpdonations' ),
	'PM' => __( 'Saint Pierre and Miquelon', 'wpdonations' ),
	'VC' => __( 'Saint Vincent and the Grenadines', 'wpdonations' ),
	'SM' => __( 'San Marino', 'wpdonations' ),
	'ST' => __( 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'wpdonations' ),
	'SA' => __( 'Saudi Arabia', 'wpdonations' ),
	'SN' => __( 'Senegal', 'wpdonations' ),
	'RS' => __( 'Serbia', 'wpdonations' ),
	'SC' => __( 'Seychelles', 'wpdonations' ),
	'SL' => __( 'Sierra Leone', 'wpdonations' ),
	'SG' => __( 'Singapore', 'wpdonations' ),
	'SK' => __( 'Slovakia', 'wpdonations' ),
	'SI' => __( 'Slovenia', 'wpdonations' ),
	'SB' => __( 'Solomon Islands', 'wpdonations' ),
	'SO' => __( 'Somalia', 'wpdonations' ),
	'ZA' => __( 'South Africa', 'wpdonations' ),
	'GS' => __( 'South Georgia/Sandwich Islands', 'wpdonations' ),
	'KR' => __( 'South Korea', 'wpdonations' ),
	'SS' => __( 'South Sudan', 'wpdonations' ),
	'ES' => __( 'Spain', 'wpdonations' ),
	'LK' => __( 'Sri Lanka', 'wpdonations' ),
	'SD' => __( 'Sudan', 'wpdonations' ),
	'SR' => __( 'Suriname', 'wpdonations' ),
	'SJ' => __( 'Svalbard and Jan Mayen', 'wpdonations' ),
	'SZ' => __( 'Swaziland', 'wpdonations' ),
	'SE' => __( 'Sweden', 'wpdonations' ),
	'CH' => __( 'Switzerland', 'wpdonations' ),
	'SY' => __( 'Syria', 'wpdonations' ),
	'TW' => __( 'Taiwan', 'wpdonations' ),
	'TJ' => __( 'Tajikistan', 'wpdonations' ),
	'TZ' => __( 'Tanzania', 'wpdonations' ),
	'TH' => __( 'Thailand', 'wpdonations' ),
	'TL' => __( 'Timor-Leste', 'wpdonations' ),
	'TG' => __( 'Togo', 'wpdonations' ),
	'TK' => __( 'Tokelau', 'wpdonations' ),
	'TO' => __( 'Tonga', 'wpdonations' ),
	'TT' => __( 'Trinidad and Tobago', 'wpdonations' ),
	'TN' => __( 'Tunisia', 'wpdonations' ),
	'TR' => __( 'Turkey', 'wpdonations' ),
	'TM' => __( 'Turkmenistan', 'wpdonations' ),
	'TC' => __( 'Turks and Caicos Islands', 'wpdonations' ),
	'TV' => __( 'Tuvalu', 'wpdonations' ),
	'UG' => __( 'Uganda', 'wpdonations' ),
	'UA' => __( 'Ukraine', 'wpdonations' ),
	'AE' => __( 'United Arab Emirates', 'wpdonations' ),
	'GB' => __( 'United Kingdom (UK)', 'wpdonations' ),
	'US' => __( 'United States (US)', 'wpdonations' ),
	'UY' => __( 'Uruguay', 'wpdonations' ),
	'UZ' => __( 'Uzbekistan', 'wpdonations' ),
	'VU' => __( 'Vanuatu', 'wpdonations' ),
	'VA' => __( 'Vatican', 'wpdonations' ),
	'VE' => __( 'Venezuela', 'wpdonations' ),
	'VN' => __( 'Vietnam', 'wpdonations' ),
	'WF' => __( 'Wallis and Futuna', 'wpdonations' ),
	'EH' => __( 'Western Sahara', 'wpdonations' ),
	'WS' => __( 'Western Samoa', 'wpdonations' ),
	'YE' => __( 'Yemen', 'wpdonations' ),
	'ZM' => __( 'Zambia', 'wpdonations' ),
	'ZW' => __( 'Zimbabwe', 'wpdonations' )
);

return $donor_countries;