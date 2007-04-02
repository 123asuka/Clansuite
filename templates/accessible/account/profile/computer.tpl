{*
{doc_raw}
    <script src="{$www_root_tpl_core}/javascript/prototype/prototype.js" type="text/javascript"></script>
    <script src="{$www_root_tpl_core}/javascript/scriptaculous/scriptaculous.js" type="text/javascript"></script>
    <script src="{$www_root_tpl_core}/javascript/smarty_ajax.js" type="text/javascript"></script>
    <script type="text/javascript" src="{$www_root_tpl_core}/javascript/tablegrid.js"></script>
    <link rel="stylesheet" type="text/css" href="{$www_root_tpl_core}/css/tablegrid.css" />
{/doc_raw}
*}

<table cellpadding="0" cellspacing="0" border="0" id="profile" width="100%">
    <tr>
        <td class="td_header" width="1%">
            {translate}Icon{/translate}
        </td>
        <td class="td_header" width="1%">
            {translate}Fields{/translate}
        </td>
        <td class="td_header">
            {translate}Values{/translate}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/page_edit.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}First name{/translate}
        </td>
        <td class="cell1" id="first_name">
            {$info.first_name}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/page_edit.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Last name{/translate}
        </td>
        <td class="cell1" id="last_name">
            {$info.last_name}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/cake.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Birthday{/translate}
        </td>
        <td class="cell1" id="birthday">
            {$info.birthday|date_format:"%d.%m.%Y"}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/male.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Gender{/translate}
        </td>
        <td class="cell1" id="gender">
            {$info.gender}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/text_linespacing.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Height{/translate}
        </td>
        <td class="cell1" id="height">
            {$info.height}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/book.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Address{/translate}
        </td>
        <td class="cell1" id="address">
            {$info.address}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/vcard.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}ZIP code{/translate}
        </td>
        <td class="cell1" id="zipcode">
            {$info.zipcode}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/house.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}City{/translate}
        </td>
        <td class="cell1" id="city">
            {$info.city}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/world.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Country{/translate}
        </td>
        <td class="cell1" id="country">
            {$info.country}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/html.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Homepage{/translate}
        </td>
        <td class="cell1" id="homepage">
            {$info.homepage}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/icq.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}ICQ{/translate}
        </td>
        <td class="cell1" id="icq">
            {$info.icq}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/msn.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}MSN{/translate}
        </td>
        <td class="cell1" id="msn">
            {$info.msn}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/skype.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Skype{/translate}
        </td>
        <td class="cell1" id="skype">
            {$info.skype}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/telephone.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Phone{/translate}
        </td>
        <td class="cell1" id="phone">
            {$info.phone}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/phone.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Mobile{/translate}
        </td>
        <td class="cell1" id="mobile">
            {$info.mobile}
        </td>
    </tr>
    <tr>
        <td class="cell2">
            <div class="profile_icon"><img src="{$www_root_tpl}/images/icons/application_view_list.png" border="0" width="16" height="16" /></div>
        </td>
        <td class="cell2">
            {translate}Custom Text{/translate}
        </td>
        <td class="cell1">
            <div id="custom_text">
                {$info.custom_text}
            </div>
        </td>
    </tr>
</table>
{*
<script type="text/javascript">new TableGrid('profile', '2', 'index.php?mod=account&sub=profile&action=ajax_update', 'profile_editcell');</script>
{literal}
 <script type="text/javascript">
    new Ajax.InPlaceEditor('custom_text',
                          'index.php?mod=account&sub=profile&action=ajax_update&cell=custom_text',
                          {handleLineBreaks: false, okText: '{/literal}Save{literal}',hoverText: '{/literal}Click to Edit{literal}',cancelText:'{/literal}Cancel{literal}',okButtonClass: 'ButtonGreen',cancelButtonClass: 'ButtonGrey',rows:15,cols:48, loadTextURL:'index.php?mod=account&sub=profile&action=get_custom_text'});
 </script>
{/literal}
*}
{* AJAX Needed *}
<div style="visibility: hidden">
<select id="gender_container" class="input_text">
    <option value="-">{translate}-{/translate}</option>
    <option value="male">{translate}Male{/translate}</option>
    <option value="female">{translate}Female{/translate}</option>
</select>

<select size="1" id="country_container">
<option value="">{translate}Select One{/translate}</option>
<option value="US">{translate}United States{/translate}</option>
<option value="CA">{translate}Canada{/translate}</option>
<option value="">{translate}----------{/translate}</option>
<option value="AF">{translate}Afghanistan{/translate}</option>
<option value="AL">{translate}Albania{/translate}</option>
<option value="DZ">{translate}Algeria{/translate}</option>
<option value="AS">{translate}American Samoa{/translate}</option>
<option value="AD">{translate}Andorra{/translate}</option>
<option value="AO">{translate}Angola{/translate}</option>
<option value="AI">{translate}Anguilla{/translate}</option>
<option value="AQ">{translate}Antarctica{/translate}</option>
<option value="AG">{translate}Antigua and Barbuda{/translate}</option>
<option value="AR">{translate}Argentina{/translate}</option>
<option value="AM">{translate}Armenia{/translate}</option>
<option value="AW">{translate}Aruba{/translate}</option>
<option value="AU">{translate}Australia{/translate}</option>
<option value="AT">{translate}Austria{/translate}</option>
<option value="AZ">{translate}Azerbaidjan{/translate}</option>
<option value="BS">{translate}Bahamas{/translate}</option>
<option value="BH">{translate}Bahrain{/translate}</option>
<option value="BD">{translate}Bangladesh{/translate}</option>
<option value="BB">{translate}Barbados{/translate}</option>
<option value="BY">{translate}Belarus{/translate}</option>
<option value="BE">{translate}Belgium{/translate}</option>
<option value="BZ">{translate}Belize{/translate}</option>
<option value="BJ">{translate}Benin{/translate}</option>
<option value="BM">{translate}Bermuda{/translate}</option>
<option value="BT">{translate}Bhutan{/translate}</option>
<option value="BO">{translate}Bolivia{/translate}</option>
<option value="BA">{translate}Bosnia-Herzegovina{/translate}</option>
<option value="BW">{translate}Botswana{/translate}</option>
<option value="BV">{translate}Bouvet Island{/translate}</option>
<option value="BR">{translate}Brazil{/translate}</option>
<option value="IO">{translate}British Indian Ocean Territory{/translate}</option>
<option value="BN">{translate}Brunei Darussalam{/translate}</option>
<option value="BG">{translate}Bulgaria{/translate}</option>
<option value="BF">{translate}Burkina Faso{/translate}</option>
<option value="BI">{translate}Burundi{/translate}</option>
<option value="KH">{translate}Cambodia{/translate}</option>
<option value="CM">{translate}Cameroon{/translate}</option>
<option value="CV">{translate}Cape Verde{/translate}</option>
<option value="KY">{translate}Cayman Islands{/translate}</option>
<option value="CF">{translate}Central African Republic{/translate}</option>
<option value="TD">{translate}Chad{/translate}</option>
<option value="CL">{translate}Chile{/translate}</option>
<option value="CN">{translate}China{/translate}</option>
<option value="CX">{translate}Christmas Island{/translate}</option>
<option value="CC">{translate}Cocos (Keeling) Islands{/translate}</option>
<option value="CO">{translate}Colombia{/translate}</option>
<option value="KM">{translate}Comoros{/translate}</option>
<option value="CG">{translate}Congo{/translate}</option>
<option value="CK">{translate}Cook Islands{/translate}</option>
<option value="CR">{translate}Costa Rica{/translate}</option>
<option value="HR">{translate}Croatia{/translate}</option>
<option value="CU">{translate}Cuba{/translate}</option>
<option value="CY">{translate}Cyprus{/translate}</option>
<option value="CZ">{translate}Czech Republic{/translate}</option>
<option value="DK">{translate}Denmark{/translate}</option>
<option value="DJ">{translate}Djibouti{/translate}</option>
<option value="DM">{translate}Dominica{/translate}</option>
<option value="DO">{translate}Dominican Republic{/translate}</option>
<option value="TP">{translate}East Timor{/translate}</option>
<option value="EC">{translate}Ecuador{/translate}</option>
<option value="EG">{translate}Egypt{/translate}</option>
<option value="SV">{translate}El Salvador{/translate}</option>
<option value="GQ">{translate}Equatorial Guinea{/translate}</option>
<option value="ER">{translate}Eritrea{/translate}</option>
<option value="EE">{translate}Estonia{/translate}</option>
<option value="ET">{translate}Ethiopia{/translate}</option>
<option value="FK">{translate}Falkland Islands{/translate}</option>
<option value="FO">{translate}Faroe Islands{/translate}</option>
<option value="FJ">{translate}Fiji{/translate}</option>
<option value="FI">{translate}Finland{/translate}</option>
<option value="CS">{translate}Former Czechoslovakia{/translate}</option>
<option value="SU">{translate}Former USSR{/translate}</option>
<option value="FR">{translate}France{/translate}</option>
<option value="FX">{translate}France (European Territory){/translate}</option>
<option value="GF">{translate}French Guyana{/translate}</option>
<option value="TF">{translate}French Southern Territories{/translate}</option>
<option value="GA">{translate}Gabon{/translate}</option>
<option value="GM">{translate}Gambia{/translate}</option>
<option value="GE">{translate}Georgia{/translate}</option>
<option value="DE">{translate}Germany{/translate}</option>
<option value="GH">{translate}Ghana{/translate}</option>
<option value="GI">{translate}Gibraltar{/translate}</option>
<option value="GB">{translate}Great Britain{/translate}</option>
<option value="GR">{translate}Greece{/translate}</option>
<option value="GL">{translate}Greenland{/translate}</option>
<option value="GD">{translate}Grenada{/translate}</option>
<option value="GP">{translate}Guadeloupe (French){/translate}</option>
<option value="GU">{translate}Guam (USA){/translate}</option>
<option value="GT">{translate}Guatemala{/translate}</option>
<option value="GN">{translate}Guinea{/translate}</option>
<option value="GW">{translate}Guinea Bissau{/translate}</option>
<option value="GY">{translate}Guyana{/translate}</option>
<option value="HT">{translate}Haiti{/translate}</option>
<option value="HM">{translate}Heard and McDonald Islands{/translate}</option>
<option value="HN">{translate}Honduras{/translate}</option>
<option value="HK">{translate}Hong Kong{/translate}</option>
<option value="HU">{translate}Hungary{/translate}</option>
<option value="IS">{translate}Iceland{/translate}</option>
<option value="IN">{translate}India{/translate}</option>
<option value="ID">{translate}Indonesia{/translate}</option>
<option value="INT">{translate}International{/translate}</option>
<option value="IR">{translate}Iran{/translate}</option>
<option value="IQ">{translate}Iraq{/translate}</option>
<option value="IE">{translate}Ireland{/translate}</option>
<option value="IL">{translate}Israel{/translate}</option>
<option value="IT">{translate}Italy{/translate}</option>
<option value="CI">{translate}Ivory Coast (Cote D&#39;Ivoire){/translate}</option>
<option value="JM">{translate}Jamaica{/translate}</option>
<option value="JP">{translate}Japan{/translate}</option>
<option value="JO">{translate}Jordan{/translate}</option>
<option value="KZ">{translate}Kazakhstan{/translate}</option>
<option value="KE">{translate}Kenya{/translate}</option>
<option value="KI">{translate}Kiribati{/translate}</option>
<option value="KW">{translate}Kuwait{/translate}</option>
<option value="KG">{translate}Kyrgyzstan{/translate}</option>
<option value="LA">{translate}Laos{/translate}</option>
<option value="LV">{translate}Latvia{/translate}</option>
<option value="LB">{translate}Lebanon{/translate}</option>
<option value="LS">{translate}Lesotho{/translate}</option>
<option value="LR">{translate}Liberia{/translate}</option>
<option value="LY">{translate}Libya{/translate}</option>
<option value="LI">{translate}Liechtenstein{/translate}</option>
<option value="LT">{translate}Lithuania{/translate}</option>
<option value="LU">{translate}Luxembourg{/translate}</option>
<option value="MO">{translate}Macau{/translate}</option>
<option value="MK">{translate}Macedonia{/translate}</option>
<option value="MG">{translate}Madagascar{/translate}</option>
<option value="MW">{translate}Malawi{/translate}</option>
<option value="MY">{translate}Malaysia{/translate}</option>
<option value="MV">{translate}Maldives{/translate}</option>
<option value="ML">{translate}Mali{/translate}</option>
<option value="MT">{translate}Malta{/translate}</option>
<option value="MH">{translate}Marshall Islands{/translate}</option>
<option value="MQ">{translate}Martinique (French){/translate}</option>
<option value="MR">{translate}Mauritania{/translate}</option>
<option value="MU">{translate}Mauritius{/translate}</option>
<option value="YT">{translate}Mayotte{/translate}</option>
<option value="MX">{translate}Mexico{/translate}</option>
<option value="FM">{translate}Micronesia{/translate}</option>
<option value="MD">{translate}Moldavia{/translate}</option>
<option value="MC">{translate}Monaco{/translate}</option>
<option value="MN">{translate}Mongolia{/translate}</option>
<option value="MS">{translate}Montserrat{/translate}</option>
<option value="MA">{translate}Morocco{/translate}</option>
<option value="MZ">{translate}Mozambique{/translate}</option>
<option value="MM">{translate}Myanmar{/translate}</option>
<option value="NA">{translate}Namibia{/translate}</option>
<option value="NR">{translate}Nauru{/translate}</option>
<option value="NP">{translate}Nepal{/translate}</option>
<option value="NL">{translate}Netherlands{/translate}</option>
<option value="AN">{translate}Netherlands Antilles{/translate}</option>
<option value="NT">{translate}Neutral Zone{/translate}</option>
<option value="NC">{translate}New Caledonia (French){/translate}</option>
<option value="NZ">{translate}New Zealand{/translate}</option>
<option value="NI">{translate}Nicaragua{/translate}</option>
<option value="NE">{translate}Niger{/translate}</option>
<option value="NG">{translate}Nigeria{/translate}</option>
<option value="NU">{translate}Niue{/translate}</option>
<option value="NF">{translate}Norfolk Island{/translate}</option>
<option value="KP">{translate}North Korea{/translate}</option>
<option value="MP">{translate}Northern Mariana Islands{/translate}</option>
<option value="NO">{translate}Norway{/translate}</option>
<option value="OM">{translate}Oman{/translate}</option>
<option value="PK">{translate}Pakistan{/translate}</option>
<option value="PW">{translate}Palau{/translate}</option>
<option value="PA">{translate}Panama{/translate}</option>
<option value="PG">{translate}Papua New Guinea{/translate}</option>
<option value="PY">{translate}Paraguay{/translate}</option>
<option value="PE">{translate}Peru{/translate}</option>
<option value="PH">{translate}Philippines{/translate}</option>
<option value="PN">{translate}Pitcairn Island{/translate}</option>
<option value="PL">{translate}Poland{/translate}</option>
<option value="PF">{translate}Polynesia (French){/translate}</option>
<option value="PT">{translate}Portugal{/translate}</option>
<option value="PR">{translate}Puerto Rico{/translate}</option>
<option value="QA">{translate}Qatar{/translate}</option>
<option value="RE">{translate}Reunion (French){/translate}</option>
<option value="RO">{translate}Romania{/translate}</option>
<option value="RU">{translate}Russian Federation{/translate}</option>
<option value="RW">{translate}Rwanda{/translate}</option>
<option value="GS">{translate}S. Georgia & S. Sandwich Isls.{/translate}</option>
<option value="SH">{translate}Saint Helena{/translate}</option>
<option value="KN">{translate}Saint Kitts & Nevis Anguilla{/translate}</option>
<option value="LC">{translate}Saint Lucia{/translate}</option>
<option value="PM">{translate}Saint Pierre and Miquelon{/translate}</option>
<option value="ST">{translate}Saint Tome (Sao Tome) and Principe{/translate}</option>
<option value="VC">{translate}Saint Vincent & Grenadines{/translate}</option>
<option value="WS">{translate}Samoa{/translate}</option>
<option value="SM">{translate}San Marino{/translate}</option>
<option value="SA">{translate}Saudi Arabia{/translate}</option>
<option value="SN">{translate}Senegal{/translate}</option>
<option value="SC">{translate}Seychelles{/translate}</option>
<option value="SL">{translate}Sierra Leone{/translate}</option>
<option value="SG">{translate}Singapore{/translate}</option>
<option value="SK">{translate}Slovak Republic{/translate}</option>
<option value="SI">{translate}Slovenia{/translate}</option>
<option value="SB">{translate}Solomon Islands{/translate}</option>
<option value="SO">{translate}Somalia{/translate}</option>
<option value="ZA">{translate}South Africa{/translate}</option>
<option value="KR">{translate}South Korea{/translate}</option>
<option value="ES">{translate}Spain{/translate}</option>
<option value="LK">{translate}Sri Lanka{/translate}</option>
<option value="SD">{translate}Sudan{/translate}</option>
<option value="SR">{translate}Suriname{/translate}</option>
<option value="SJ">{translate}Svalbard and Jan Mayen Islands{/translate}</option>
<option value="SZ">{translate}Swaziland{/translate}</option>
<option value="SE">{translate}Sweden{/translate}</option>
<option value="CH">{translate}Switzerland{/translate}</option>
<option value="SY">{translate}Syria{/translate}</option>
<option value="TJ">{translate}Tadjikistan{/translate}</option>
<option value="TW">{translate}Taiwan{/translate}</option>
<option value="TZ">{translate}Tanzania{/translate}</option>
<option value="TH">{translate}Thailand{/translate}</option>
<option value="TG">{translate}Togo{/translate}</option>
<option value="TK">{translate}Tokelau{/translate}</option>
<option value="TO">{translate}Tonga{/translate}</option>
<option value="TT">{translate}Trinidad and Tobago{/translate}</option>
<option value="TN">{translate}Tunisia{/translate}</option>
<option value="TR">{translate}Turkey{/translate}</option>
<option value="TM">{translate}Turkmenistan{/translate}</option>
<option value="TC">{translate}Turks and Caicos Islands{/translate}</option>
<option value="TV">{translate}Tuvalu{/translate}</option>
<option value="UG">{translate}Uganda{/translate}</option>
<option value="UA">{translate}Ukraine{/translate}</option>
<option value="AE">{translate}United Arab Emirates{/translate}</option>
<option value="GB">{translate}United Kingdom{/translate}</option>
<option value="UY">{translate}Uruguay{/translate}</option>
<option value="MIL">{translate}USA Military{/translate}</option>
<option value="UM">{translate}USA Minor Outlying Islands{/translate}</option>
<option value="UZ">{translate}Uzbekistan{/translate}</option>
<option value="VU">{translate}Vanuatu{/translate}</option>
<option value="VA">{translate}Vatican City State{/translate}</option>
<option value="VE">{translate}Venezuela{/translate}</option>
<option value="VN">{translate}Vietnam{/translate}</option>
<option value="VG">{translate}Virgin Islands (British){/translate}</option>
<option value="VI">{translate}Virgin Islands (USA){/translate}</option>
<option value="WF">{translate}Wallis and Futuna Islands{/translate}</option>
<option value="EH">{translate}Western Sahara{/translate}</option>
<option value="YE">{translate}Yemen{/translate}</option>
<option value="YU">{translate}Yugoslavia{/translate}</option>
<option value="ZR">{translate}Zaire{/translate}</option>
<option value="ZM">{translate}Zambia{/translate}</option>
<option value="ZW">{translate}Zimbabwe{/translate}</option>
</select>
</div>

{if $smarty.session.user.user_id == $info.user_id}
<input class="ButtonGreen" type="button" value="{translate}Edit my profile{/translate}" onclick='{literal}Dialog.info({url: "index.php?mod=account&amp;sub=general&amp;action=edit", options: {method: "get"}}, {className: "alphacube", width:450, height: 550});{/literal}' />
{/if}
{if $smarty.session.rights.access_controlcenter == 1 && $smarty.session.rights.edit_profile}
    <input class="ButtonGreen" type="button" value="{translate}Edit my profile{/translate}" onclick='{literal}Dialog.info({url: "index.php?mod=account&amp;sub=general&amp;action=edit", options: {method: "get"}}, {className: "alphacube", width:600, height: 400});{/literal}' />
{/if}