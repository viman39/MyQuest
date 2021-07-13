<select id="country" name="country<?=(@$argv['multiple'] == 'yes' ? '[]' : '')?>" class="form-control select2" <?=(@$argv['multiple'] == 'yes' ? 'multiple="multiple"' : '')?>>

    <?php
    if ( !isset($argv['multiple']) or $argv['multiple'] != 'yes' ){
        ?>
        <option value="0" <?=(@$argv['selected'] == '0' ? 'selected' : '')?>>Select</option>
        <?php
    }
    ?>
    <option value="Afghanistan" <?=(@$argv['selected'] == 'Afghanistan' ? 'selected' : '')?>>Afghanistan</option>
    <option value="Aland Islands" <?=(@$argv['selected'] == 'Aland Islands' ? 'selected' : '')?>>Aland Islands</option>
    <option value="Albania" <?=(@$argv['selected'] == 'Albania' ? 'selected' : '')?>>Albania</option>
    <option value="Algeria" <?=(@$argv['selected'] == 'Algeria' ? 'selected' : '')?>>Algeria</option>
    <option value="American Samoa" <?=(@$argv['selected'] == 'American Samoa' ? 'selected' : '')?>>American Samoa</option>
    <option value="Andorra" <?=(@$argv['selected'] == 'Andorra' ? 'selected' : '')?>>Andorra</option>
    <option value="Angola" <?=(@$argv['selected'] == 'Angola' ? 'selected' : '')?>>Angola</option>
    <option value="Anguilla" <?=(@$argv['selected'] == 'Anguilla' ? 'selected' : '')?>>Anguilla</option>
    <option value="Antarctica" <?=(@$argv['selected'] == 'Antarctica' ? 'selected' : '')?>>Antarctica</option>
    <option value="Antigua and Barbuda" <?=(@$argv['selected'] == 'Antigua and Barbuda' ? 'selected' : '')?>>Antigua and Barbuda</option>
    <option value="Argentina" <?=(@$argv['selected'] == 'Argentina' ? 'selected' : '')?>>Argentina</option>
    <option value="Armenia" <?=(@$argv['selected'] == 'Armenia' ? 'selected' : '')?>>Armenia</option>
    <option value="Aruba" <?=(@$argv['selected'] == 'Aruba' ? 'selected' : '')?>>Aruba</option>
    <option value="Australia" <?=(@$argv['selected'] == 'Australia' ? 'selected' : '')?>>Australia</option>
    <option value="Austria" <?=(@$argv['selected'] == 'Austria' ? 'selected' : '')?>>Austria</option>
    <option value="Azerbaijan" <?=(@$argv['selected'] == 'Azerbaijan' ? 'selected' : '')?>>Azerbaijan</option>
    <option value="Bahamas" <?=(@$argv['selected'] == 'Bahamas' ? 'selected' : '')?>>Bahamas</option>
    <option value="Bahrain" <?=(@$argv['selected'] == 'Bahrain' ? 'selected' : '')?>>Bahrain</option>
    <option value="Bangladesh" <?=(@$argv['selected'] == 'Bangladesh' ? 'selected' : '')?>>Bangladesh</option>
    <option value="Barbados" <?=(@$argv['selected'] == 'Barbados' ? 'selected' : '')?>>Barbados</option>
    <option value="Belarus" <?=(@$argv['selected'] == 'Belarus' ? 'selected' : '')?>>Belarus</option>
    <option value="Belgium" <?=(@$argv['selected'] == 'Belgium' ? 'selected' : '')?>>Belgium</option>
    <option value="Belize" <?=(@$argv['selected'] == 'Belize' ? 'selected' : '')?>>Belize</option>
    <option value="Benin" <?=(@$argv['selected'] == 'Benin' ? 'selected' : '')?>>Benin</option>
    <option value="Bermuda" <?=(@$argv['selected'] == 'Bermuda' ? 'selected' : '')?>>Bermuda</option>
    <option value="Bhutan" <?=(@$argv['selected'] == 'Bhutan' ? 'selected' : '')?>>Bhutan</option>
    <option value="Bolivia" <?=(@$argv['selected'] == 'Bolivia' ? 'selected' : '')?>>Bolivia</option>
    <option value="Bosnia and Herzegovina" <?=(@$argv['selected'] == 'Bosnia and Herzegovina' ? 'selected' : '')?>>Bosnia and Herzegovina</option>
    <option value="Botswana" <?=(@$argv['selected'] == 'Botswana' ? 'selected' : '')?>>Botswana</option>
    <option value="Bouvet Island" <?=(@$argv['selected'] == 'Bouvet Island' ? 'selected' : '')?>>Bouvet Island</option>
    <option value="Brazil" <?=(@$argv['selected'] == 'Brazil' ? 'selected' : '')?>>Brazil</option>
    <option value="British Indian Ocean Territory" <?=(@$argv['selected'] == 'British Indian Ocean Territory' ? 'selected' : '')?>>British Indian Ocean Territory</option>
    <option value="Brunei Darussalam" <?=(@$argv['selected'] == 'Brunei Darussalam' ? 'selected' : '')?>>Brunei Darussalam</option>
    <option value="Bulgaria" <?=(@$argv['selected'] == 'Bulgaria' ? 'selected' : '')?>>Bulgaria</option>
    <option value="Burkina Faso" <?=(@$argv['selected'] == 'Burkina Faso' ? 'selected' : '')?>>Burkina Faso</option>
    <option value="Burundi" <?=(@$argv['selected'] == 'Burundi' ? 'selected' : '')?>>Burundi</option>
    <option value="Cambodia" <?=(@$argv['selected'] == 'Cambodia' ? 'selected' : '')?>>Cambodia</option>
    <option value="Cameroon" <?=(@$argv['selected'] == 'Cameroon' ? 'selected' : '')?>>Cameroon</option>
    <option value="Canada" <?=(@$argv['selected'] == 'Canada' ? 'selected' : '')?>>Canada</option>
    <option value="Cape Verde" <?=(@$argv['selected'] == 'Cape Verde' ? 'selected' : '')?>>Cape Verde</option>
    <option value="Cayman Islands" <?=(@$argv['selected'] == 'Cayman Islands' ? 'selected' : '')?>>Cayman Islands</option>
    <option value="Central African Republic" <?=(@$argv['selected'] == 'Central African Republic' ? 'selected' : '')?>>Central African Republic</option>
    <option value="Chad" <?=(@$argv['selected'] == 'Chad' ? 'selected' : '')?>>Chad</option>
    <option value="Chile" <?=(@$argv['selected'] == 'Chile' ? 'selected' : '')?>>Chile</option>
    <option value="China" <?=(@$argv['selected'] == 'China' ? 'selected' : '')?>>China</option>
    <option value="Christmas Island" <?=(@$argv['selected'] == 'Christmas Island' ? 'selected' : '')?>>Christmas Island</option>
    <option value="Cocos (Keeling) Islands" <?=(@$argv['selected'] == 'Cocos (Keeling) Islands' ? 'selected' : '')?>>Cocos (Keeling) Islands</option>
    <option value="Colombia" <?=(@$argv['selected'] == 'Colombia' ? 'selected' : '')?>>Colombia</option>
    <option value="Comoros" <?=(@$argv['selected'] == 'Comoros' ? 'selected' : '')?>>Comoros</option>
    <option value="Congo" <?=(@$argv['selected'] == 'Congo' ? 'selected' : '')?>>Congo</option>
    <option value="Congo, The Democratic Republic of The" <?=(@$argv['selected'] == 'Congo, The Democratic Republic of The' ? 'selected' : '')?>>Congo, The Democratic Republic of The</option>
    <option value="Cook Islands" <?=(@$argv['selected'] == 'Cook Islands' ? 'selected' : '')?>>Cook Islands</option>
    <option value="Costa Rica" <?=(@$argv['selected'] == 'Costa Rica' ? 'selected' : '')?>>Costa Rica</option>
    <option value="Cote D'ivoire" <?=(@$argv['selected'] == 'Cote D\'ivoire' ? 'selected' : '')?>>Cote D'ivoire</option>
    <option value="Croatia" <?=(@$argv['selected'] == 'Croatia' ? 'selected' : '')?>>Croatia</option>
    <option value="Cuba" <?=(@$argv['selected'] == 'Cuba' ? 'selected' : '')?>>Cuba</option>
    <option value="Cyprus" <?=(@$argv['selected'] == 'Cyprus' ? 'selected' : '')?>>Cyprus</option>
    <option value="Czech Republic" <?=(@$argv['selected'] == 'Czech Republic' ? 'selected' : '')?>>Czech Republic</option>
    <option value="Denmark" <?=(@$argv['selected'] == 'Denmark' ? 'selected' : '')?>>Denmark</option>
    <option value="Djibouti" <?=(@$argv['selected'] == 'Djibouti' ? 'selected' : '')?>>Djibouti</option>
    <option value="Dominica" <?=(@$argv['selected'] == 'Dominica' ? 'selected' : '')?>>Dominica</option>
    <option value="Dominican Republic" <?=(@$argv['selected'] == 'Dominican Republic' ? 'selected' : '')?>>Dominican Republic</option>
    <option value="Ecuador" <?=(@$argv['selected'] == 'Ecuador' ? 'selected' : '')?>>Ecuador</option>
    <option value="Egypt" <?=(@$argv['selected'] == 'Egypt' ? 'selected' : '')?>>Egypt</option>
    <option value="El Salvador" <?=(@$argv['selected'] == 'El Salvador' ? 'selected' : '')?>>El Salvador</option>
    <option value="Equatorial Guinea" <?=(@$argv['selected'] == 'Equatorial Guinea' ? 'selected' : '')?>>Equatorial Guinea</option>
    <option value="Eritrea" <?=(@$argv['selected'] == 'Eritrea' ? 'selected' : '')?>>Eritrea</option>
    <option value="Estonia" <?=(@$argv['selected'] == 'Estonia' ? 'selected' : '')?>>Estonia</option>
    <option value="Ethiopia" <?=(@$argv['selected'] == 'Ethiopia' ? 'selected' : '')?>>Ethiopia</option>
    <option value="Falkland Islands (Malvinas)" <?=(@$argv['selected'] == 'Falkland Islands (Malvinas)' ? 'selected' : '')?>>Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands" <?=(@$argv['selected'] == 'Faroe Islands' ? 'selected' : '')?>>Faroe Islands</option>
    <option value="Fiji" <?=(@$argv['selected'] == 'Fiji' ? 'selected' : '')?>>Fiji</option>
    <option value="Finland" <?=(@$argv['selected'] == 'Finland' ? 'selected' : '')?>>Finland</option>
    <option value="France" <?=(@$argv['selected'] == 'France' ? 'selected' : '')?>>France</option>
    <option value="French Guiana" <?=(@$argv['selected'] == 'French Guiana' ? 'selected' : '')?>>French Guiana</option>
    <option value="French Polynesia" <?=(@$argv['selected'] == 'French Polynesia' ? 'selected' : '')?>>French Polynesia</option>
    <option value="French Southern Territories" <?=(@$argv['selected'] == 'French Southern Territories' ? 'selected' : '')?>>French Southern Territories</option>
    <option value="Gabon" <?=(@$argv['selected'] == 'Gabon' ? 'selected' : '')?>>Gabon</option>
    <option value="Gambia" <?=(@$argv['selected'] == 'Gambia' ? 'selected' : '')?>>Gambia</option>
    <option value="Georgia" <?=(@$argv['selected'] == 'Georgia' ? 'selected' : '')?>>Georgia</option>
    <option value="Germany" <?=(@$argv['selected'] == 'Germany' ? 'selected' : '')?>>Germany</option>
    <option value="Ghana" <?=(@$argv['selected'] == 'Ghana' ? 'selected' : '')?>>Ghana</option>
    <option value="Gibraltar" <?=(@$argv['selected'] == 'Gibraltar' ? 'selected' : '')?>>Gibraltar</option>
    <option value="Greece" <?=(@$argv['selected'] == 'Greece' ? 'selected' : '')?>>Greece</option>
    <option value="Greenland" <?=(@$argv['selected'] == 'Greenland' ? 'selected' : '')?>>Greenland</option>
    <option value="Grenada" <?=(@$argv['selected'] == 'Grenada' ? 'selected' : '')?>>Grenada</option>
    <option value="Guadeloupe" <?=(@$argv['selected'] == 'Guadeloupe' ? 'selected' : '')?>>Guadeloupe</option>
    <option value="Guam" <?=(@$argv['selected'] == 'Guam' ? 'selected' : '')?>>Guam</option>
    <option value="Guatemala" <?=(@$argv['selected'] == 'Guatemala' ? 'selected' : '')?>>Guatemala</option>
    <option value="Guernsey" <?=(@$argv['selected'] == 'Guernsey' ? 'selected' : '')?>>Guernsey</option>
    <option value="Guinea" <?=(@$argv['selected'] == 'Guinea' ? 'selected' : '')?>>Guinea</option>
    <option value="Guinea-bissau" <?=(@$argv['selected'] == 'Guinea-bissau' ? 'selected' : '')?>>Guinea-bissau</option>
    <option value="Guyana" <?=(@$argv['selected'] == 'Guyana' ? 'selected' : '')?>>Guyana</option>
    <option value="Haiti" <?=(@$argv['selected'] == 'Haiti' ? 'selected' : '')?>>Haiti</option>
    <option value="Heard Island and Mcdonald Islands" <?=(@$argv['selected'] == 'Heard Island and Mcdonald Islands' ? 'selected' : '')?>>Heard Island and Mcdonald Islands</option>
    <option value="Holy See (Vatican City State)" <?=(@$argv['selected'] == 'Holy See (Vatican City State)' ? 'selected' : '')?>>Holy See (Vatican City State)</option>
    <option value="Honduras" <?=(@$argv['selected'] == 'Honduras' ? 'selected' : '')?>>Honduras</option>
    <option value="Hong Kong" <?=(@$argv['selected'] == 'Hong Kong' ? 'selected' : '')?>>Hong Kong</option>
    <option value="Hungary" <?=(@$argv['selected'] == 'Hungary' ? 'selected' : '')?>>Hungary</option>
    <option value="Iceland" <?=(@$argv['selected'] == 'Iceland' ? 'selected' : '')?>>Iceland</option>
    <option value="India" <?=(@$argv['selected'] == 'India' ? 'selected' : '')?>>India</option>
    <option value="Indonesia" <?=(@$argv['selected'] == 'Indonesia' ? 'selected' : '')?>>Indonesia</option>
    <option value="Iran, Islamic Republic of" <?=(@$argv['selected'] == 'Iran, Islamic Republic of' ? 'selected' : '')?>>Iran, Islamic Republic of</option>
    <option value="Iraq" <?=(@$argv['selected'] == 'Iraq' ? 'selected' : '')?>>Iraq</option>
    <option value="Ireland" <?=(@$argv['selected'] == 'Ireland' ? 'selected' : '')?>>Ireland</option>
    <option value="Isle of Man" <?=(@$argv['selected'] == 'Isle of Man' ? 'selected' : '')?>>Isle of Man</option>
    <option value="Israel" <?=(@$argv['selected'] == 'Israel' ? 'selected' : '')?>>Israel</option>
    <option value="Italy" <?=(@$argv['selected'] == 'Italy' ? 'selected' : '')?>>Italy</option>
    <option value="Jamaica" <?=(@$argv['selected'] == 'Jamaica' ? 'selected' : '')?>>Jamaica</option>
    <option value="Japan" <?=(@$argv['selected'] == 'Japan' ? 'selected' : '')?>>Japan</option>
    <option value="Jersey" <?=(@$argv['selected'] == 'Jersey' ? 'selected' : '')?>>Jersey</option>
    <option value="Jordan" <?=(@$argv['selected'] == 'Jordan' ? 'selected' : '')?>>Jordan</option>
    <option value="Kazakhstan" <?=(@$argv['selected'] == 'Kazakhstan' ? 'selected' : '')?>>Kazakhstan</option>
    <option value="Kenya" <?=(@$argv['selected'] == 'Kenya' ? 'selected' : '')?>>Kenya</option>
    <option value="Kiribati" <?=(@$argv['selected'] == 'Kiribati' ? 'selected' : '')?>>Kiribati</option>
    <option value="Korea, Democratic People's Republic of" <?=(@$argv['selected'] == 'Korea, Democratic People\'s Republic of' ? 'selected' : '')?>>Korea, Democratic People's Republic of</option>
    <option value="Korea, Republic of" <?=(@$argv['selected'] == 'Korea, Republic of' ? 'selected' : '')?>>Korea, Republic of</option>
    <option value="Kuwait" <?=(@$argv['selected'] == 'Kuwait' ? 'selected' : '')?>>Kuwait</option>
    <option value="Kyrgyzstan" <?=(@$argv['selected'] == 'Kyrgyzstan' ? 'selected' : '')?>>Kyrgyzstan</option>
    <option value="Lao People's Democratic Republic" <?=(@$argv['selected'] == "Lao People's Democratic Republic" ? 'selected' : '')?>>Lao People's Democratic Republic</option>
    <option value="Latvia" <?=(@$argv['selected'] == "Latvia" ? 'selected' : '')?>>Latvia</option>
    <option value="Lebanon" <?=(@$argv['selected'] == "Lebanon" ? 'selected' : '')?>>Lebanon</option>
    <option value="Lesotho" <?=(@$argv['selected'] == "Lesotho" ? 'selected' : '')?>>Lesotho</option>
    <option value="Liberia" <?=(@$argv['selected'] == "Liberia" ? 'selected' : '')?>>Liberia</option>
    <option value="Libyan Arab Jamahiriya" <?=(@$argv['selected'] == "Libyan Arab Jamahiriya" ? 'selected' : '')?>>Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein" <?=(@$argv['selected'] == "Liechtenstein" ? 'selected' : '')?>>Liechtenstein</option>
    <option value="Lithuania" <?=(@$argv['selected'] == "Lithuania" ? 'selected' : '')?>>Lithuania</option>
    <option value="Luxembourg" <?=(@$argv['selected'] == "Luxembourg" ? 'selected' : '')?>>Luxembourg</option>
    <option value="Macao" <?=(@$argv['selected'] == "Macao" ? 'selected' : '')?>>Macao</option>
    <option value="Macedonia, The Former Yugoslav Republic of" <?=(@$argv['selected'] == "Macedonia, The Former Yugoslav Republic of" ? 'selected' : '')?>>Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar" <?=(@$argv['selected'] == "Madagascar" ? 'selected' : '')?>>Madagascar</option>
    <option value="Malawi" <?=(@$argv['selected'] == "Malawi" ? 'selected' : '')?>>Malawi</option>
    <option value="Malaysia" <?=(@$argv['selected'] == "Malaysia" ? 'selected' : '')?>>Malaysia</option>
    <option value="Maldives" <?=(@$argv['selected'] == "Maldives" ? 'selected' : '')?>>Maldives</option>
    <option value="Mali" <?=(@$argv['selected'] == "Mali" ? 'selected' : '')?>>Mali</option>
    <option value="Malta" <?=(@$argv['selected'] == "Malta" ? 'selected' : '')?>>Malta</option>
    <option value="Marshall Islands" <?=(@$argv['selected'] == "Marshall Islands" ? 'selected' : '')?>>Marshall Islands</option>
    <option value="Martinique" <?=(@$argv['selected'] == "Martinique" ? 'selected' : '')?>>Martinique</option>
    <option value="Mauritania" <?=(@$argv['selected'] == "Mauritania" ? 'selected' : '')?>>Mauritania</option>
    <option value="Mauritius" <?=(@$argv['selected'] == "Mauritius" ? 'selected' : '')?>>Mauritius</option>
    <option value="Mayotte" <?=(@$argv['selected'] == "Mayotte" ? 'selected' : '')?>>Mayotte</option>
    <option value="Mexico" <?=(@$argv['selected'] == "Mexico" ? 'selected' : '')?>>Mexico</option>
    <option value="Micronesia, Federated States of" <?=(@$argv['selected'] == "Micronesia, Federated States of" ? 'selected' : '')?>>Micronesia, Federated States of</option>
    <option value="Moldova, Republic of" <?=(@$argv['selected'] == "Moldova, Republic of" ? 'selected' : '')?>>Moldova, Republic of</option>
    <option value="Monaco" <?=(@$argv['selected'] == "Monaco" ? 'selected' : '')?>>Monaco</option>
    <option value="Mongolia" <?=(@$argv['selected'] == "Mongolia" ? 'selected' : '')?>>Mongolia</option>
    <option value="Montenegro" <?=(@$argv['selected'] == "Montenegro" ? 'selected' : '')?>>Montenegro</option>
    <option value="Montserrat" <?=(@$argv['selected'] == "Montserrat" ? 'selected' : '')?>>Montserrat</option>
    <option value="Morocco" <?=(@$argv['selected'] == "Morocco" ? 'selected' : '')?>>Morocco</option>
    <option value="Mozambique" <?=(@$argv['selected'] == "Mozambique" ? 'selected' : '')?>>Mozambique</option>
    <option value="Myanmar" <?=(@$argv['selected'] == "Myanmar" ? 'selected' : '')?>>Myanmar</option>
    <option value="Namibia" <?=(@$argv['selected'] == "Namibia" ? 'selected' : '')?>>Namibia</option>
    <option value="Nauru" <?=(@$argv['selected'] == "Nauru" ? 'selected' : '')?>>Nauru</option>
    <option value="Nepal" <?=(@$argv['selected'] == "Nepal" ? 'selected' : '')?>>Nepal</option>
    <option value="Netherlands" <?=(@$argv['selected'] == "Netherlands" ? 'selected' : '')?>>Netherlands</option>
    <option value="Netherlands Antilles" <?=(@$argv['selected'] == "Netherlands Antilles" ? 'selected' : '')?>>Netherlands Antilles</option>
    <option value="New Caledonia" <?=(@$argv['selected'] == "New Caledonia" ? 'selected' : '')?>>New Caledonia</option>
    <option value="New Zealand" <?=(@$argv['selected'] == "New Zealand" ? 'selected' : '')?>>New Zealand</option>
    <option value="Nicaragua" <?=(@$argv['selected'] == "Nicaragua" ? 'selected' : '')?>>Nicaragua</option>
    <option value="Niger" <?=(@$argv['selected'] == "Niger" ? 'selected' : '')?>>Niger</option>
    <option value="Nigeria" <?=(@$argv['selected'] == "Nigeria" ? 'selected' : '')?>>Nigeria</option>
    <option value="Niue" <?=(@$argv['selected'] == "Niue" ? 'selected' : '')?>>Niue</option>
    <option value="Norfolk Island" <?=(@$argv['selected'] == "Norfolk Island" ? 'selected' : '')?>>Norfolk Island</option>
    <option value="Northern Mariana Islands" <?=(@$argv['selected'] == "Northern Mariana Islands" ? 'selected' : '')?>>Northern Mariana Islands</option>
    <option value="Norway" <?=(@$argv['selected'] == "Norway" ? 'selected' : '')?>>Norway</option>
    <option value="Oman" <?=(@$argv['selected'] == "Oman" ? 'selected' : '')?>>Oman</option>
    <option value="Pakistan" <?=(@$argv['selected'] == "Pakistan" ? 'selected' : '')?>>Pakistan</option>
    <option value="Palau" <?=(@$argv['selected'] == "Palau" ? 'selected' : '')?>>Palau</option>
    <option value="Palestinian Territory, Occupied" <?=(@$argv['selected'] == "Palestinian Territory, Occupied" ? 'selected' : '')?>>Palestinian Territory, Occupied</option>
    <option value="Panama" <?=(@$argv['selected'] == "Panama" ? 'selected' : '')?>>Panama</option>
    <option value="Papua New Guinea" <?=(@$argv['selected'] == "Papua New Guinea" ? 'selected' : '')?>>Papua New Guinea</option>
    <option value="Paraguay" <?=(@$argv['selected'] == "Paraguay" ? 'selected' : '')?>>Paraguay</option>
    <option value="Peru" <?=(@$argv['selected'] == "Peru" ? 'selected' : '')?>>Peru</option>
    <option value="Philippines" <?=(@$argv['selected'] == "Philippines" ? 'selected' : '')?>>Philippines</option>
    <option value="Pitcairn" <?=(@$argv['selected'] == "Pitcairn" ? 'selected' : '')?>>Pitcairn</option>
    <option value="Poland" <?=(@$argv['selected'] == "Poland" ? 'selected' : '')?>>Poland</option>
    <option value="Portugal" <?=(@$argv['selected'] == "Portugal" ? 'selected' : '')?>>Portugal</option>
    <option value="Puerto Rico" <?=(@$argv['selected'] == "Puerto Rico" ? 'selected' : '')?>>Puerto Rico</option>
    <option value="Qatar" <?=(@$argv['selected'] == "Qatar" ? 'selected' : '')?>>Qatar</option>
    <option value="Reunion" <?=(@$argv['selected'] == "Reunion" ? 'selected' : '')?>>Reunion</option>
    <option value="Romania" <?=(@$argv['selected'] == "Romania" ? 'selected' : '')?>>Romania</option>
    <option value="Russian Federation" <?=(@$argv['selected'] == "Russian Federation" ? 'selected' : '')?>>Russian Federation</option>
    <option value="Rwanda" <?=(@$argv['selected'] == "Rwanda" ? 'selected' : '')?>>Rwanda</option>
    <option value="Saint Helena" <?=(@$argv['selected'] == "Saint Helena" ? 'selected' : '')?>>Saint Helena</option>
    <option value="Saint Kitts and Nevis" <?=(@$argv['selected'] == "Saint Kitts and Nevis" ? 'selected' : '')?>>Saint Kitts and Nevis</option>
    <option value="Saint Lucia" <?=(@$argv['selected'] == "Saint Lucia" ? 'selected' : '')?>>Saint Lucia</option>
    <option value="Saint Pierre and Miquelon" <?=(@$argv['selected'] == "Saint Pierre and Miquelon" ? 'selected' : '')?>>Saint Pierre and Miquelon</option>
    <option value="Saint Vincent and The Grenadines" <?=(@$argv['selected'] == "Saint Vincent and The Grenadines" ? 'selected' : '')?>>Saint Vincent and The Grenadines</option>
    <option value="Samoa" <?=(@$argv['selected'] == "Samoa" ? 'selected' : '')?>>Samoa</option>
    <option value="San Marino" <?=(@$argv['selected'] == "San Marino" ? 'selected' : '')?>>San Marino</option>
    <option value="Sao Tome and Principe" <?=(@$argv['selected'] == "Sao Tome and Principe" ? 'selected' : '')?>>Sao Tome and Principe</option>
    <option value="Saudi Arabia" <?=(@$argv['selected'] == "Saudi Arabia" ? 'selected' : '')?>>Saudi Arabia</option>
    <option value="Senegal" <?=(@$argv['selected'] == "Senegal" ? 'selected' : '')?>>Senegal</option>
    <option value="Serbia" <?=(@$argv['selected'] == "Serbia" ? 'selected' : '')?>>Serbia</option>
    <option value="Seychelles" <?=(@$argv['selected'] == "Seychelles" ? 'selected' : '')?>>Seychelles</option>
    <option value="Sierra Leone" <?=(@$argv['selected'] == "Sierra Leone" ? 'selected' : '')?>>Sierra Leone</option>
    <option value="Singapore" <?=(@$argv['selected'] == "Singapore" ? 'selected' : '')?>>Singapore</option>
    <option value="Slovakia" <?=(@$argv['selected'] == "Slovakia" ? 'selected' : '')?>>Slovakia</option>
    <option value="Slovenia" <?=(@$argv['selected'] == "Slovenia" ? 'selected' : '')?>>Slovenia</option>
    <option value="Solomon Islands" <?=(@$argv['selected'] == "Solomon Islands" ? 'selected' : '')?>>Solomon Islands</option>
    <option value="Somalia" <?=(@$argv['selected'] == "Somalia" ? 'selected' : '')?>>Somalia</option>
    <option value="South Africa" <?=(@$argv['selected'] == "South Africa" ? 'selected' : '')?>>South Africa</option>
    <option value="South Georgia and The South Sandwich Islands" <?=(@$argv['selected'] == "South Georgia and The South Sandwich Islands" ? 'selected' : '')?>>South Georgia and The South Sandwich Islands</option>
    <option value="Spain" <?=(@$argv['selected'] == "Spain" ? 'selected' : '')?>>Spain</option>
    <option value="Sri Lanka" <?=(@$argv['selected'] == "Sri Lanka" ? 'selected' : '')?>>Sri Lanka</option>
    <option value="Sudan" <?=(@$argv['selected'] == "Sudan" ? 'selected' : '')?>>Sudan</option>
    <option value="Suriname" <?=(@$argv['selected'] == "Suriname" ? 'selected' : '')?>>Suriname</option>
    <option value="Svalbard and Jan Mayen" <?=(@$argv['selected'] == "Svalbard and Jan Mayen" ? 'selected' : '')?>>Svalbard and Jan Mayen</option>
    <option value="Swaziland" <?=(@$argv['selected'] == "Swaziland" ? 'selected' : '')?>>Swaziland</option>
    <option value="Sweden" <?=(@$argv['selected'] == "Sweden" ? 'selected' : '')?>>Sweden</option>
    <option value="Switzerland" <?=(@$argv['selected'] == "Switzerland" ? 'selected' : '')?>>Switzerland</option>
    <option value="Syrian Arab Republic" <?=(@$argv['selected'] == "Syrian Arab Republic" ? 'selected' : '')?>>Syrian Arab Republic</option>
    <option value="Taiwan" <?=(@$argv['selected'] == "Taiwan" ? 'selected' : '')?>>Taiwan</option>
    <option value="Tajikistan" <?=(@$argv['selected'] == "Tajikistan" ? 'selected' : '')?>>Tajikistan</option>
    <option value="Tanzania, United Republic of" <?=(@$argv['selected'] == "Tanzania, United Republic of" ? 'selected' : '')?>>Tanzania, United Republic of</option>
    <option value="Thailand" <?=(@$argv['selected'] == "Thailand" ? 'selected' : '')?>>Thailand</option>
    <option value="Timor-leste" <?=(@$argv['selected'] == "Timor-leste" ? 'selected' : '')?>>Timor-leste</option>
    <option value="Togo" <?=(@$argv['selected'] == "Togo" ? 'selected' : '')?>>Togo</option>
    <option value="Tokelau" <?=(@$argv['selected'] == "Tokelau" ? 'selected' : '')?>>Tokelau</option>
    <option value="Tonga" <?=(@$argv['selected'] == "Tonga" ? 'selected' : '')?>>Tonga</option>
    <option value="Trinidad and Tobago" <?=(@$argv['selected'] == "Trinidad and Tobago" ? 'selected' : '')?>>Trinidad and Tobago</option>
    <option value="Tunisia" <?=(@$argv['selected'] == "Tunisia" ? 'selected' : '')?>>Tunisia</option>
    <option value="Turkey" <?=(@$argv['selected'] == "Turkey" ? 'selected' : '')?>>Turkey</option>
    <option value="Turkmenistan" <?=(@$argv['selected'] == "Turkmenistan" ? 'selected' : '')?>>Turkmenistan</option>
    <option value="Turks and Caicos Islands" <?=(@$argv['selected'] == "Turks and Caicos Islands" ? 'selected' : '')?>>Turks and Caicos Islands</option>
    <option value="Tuvalu" <?=(@$argv['selected'] == "Tuvalu" ? 'selected' : '')?>>Tuvalu</option>
    <option value="Uganda" <?=(@$argv['selected'] == "Uganda" ? 'selected' : '')?>>Uganda</option>
    <option value="Ukraine" <?=(@$argv['selected'] == "Ukraine" ? 'selected' : '')?>>Ukraine</option>
    <option value="United Arab Emirates" <?=(@$argv['selected'] == "United Arab Emirates" ? 'selected' : '')?>>United Arab Emirates</option>
    <option value="United Kingdom" <?=(@$argv['selected'] == "United Kingdom" ? 'selected' : '')?>>United Kingdom</option>
    <option value="United States" <?=(@$argv['selected'] == "United States" ? 'selected' : '')?>>United States</option>
    <option value="United States Minor Outlying Islands" <?=(@$argv['selected'] == "United States Minor Outlying Islands" ? 'selected' : '')?>>United States Minor Outlying Islands</option>
    <option value="Uruguay" <?=(@$argv['selected'] == "Uruguay" ? 'selected' : '')?>>Uruguay</option>
    <option value="Uzbekistan" <?=(@$argv['selected'] == "Uzbekistan" ? 'selected' : '')?>>Uzbekistan</option>
    <option value="Vanuatu" <?=(@$argv['selected'] == "Vanuatu" ? 'selected' : '')?>>Vanuatu</option>
    <option value="Venezuela" <?=(@$argv['selected'] == "Venezuela" ? 'selected' : '')?>>Venezuela</option>
    <option value="Viet Nam" <?=(@$argv['selected'] == "Viet Nam" ? 'selected' : '')?>>Viet Nam</option>
    <option value="Virgin Islands, British" <?=(@$argv['selected'] == "Virgin Islands, British" ? 'selected' : '')?>>Virgin Islands, British</option>
    <option value="Virgin Islands, U.S." <?=(@$argv['selected'] == "Virgin Islands, U.S." ? 'selected' : '')?>>Virgin Islands, U.S.</option>
    <option value="Wallis and Futuna" <?=(@$argv['selected'] == "Wallis and Futuna" ? 'selected' : '')?>>Wallis and Futuna</option>
    <option value="Western Sahara" <?=(@$argv['selected'] == "Western Sahara" ? 'selected' : '')?>>Western Sahara</option>
    <option value="Yemen" <?=(@$argv['selected'] == "Yemen" ? 'selected' : '')?>>Yemen</option>
    <option value="Zambia" <?=(@$argv['selected'] == "Zambia" ? 'selected' : '')?>>Zambia</option>
    <option value="Zimbabwe" <?=(@$argv['selected'] == "Zimbabwe" ? 'selected' : '')?>>Zimbabwe</option>
</select>
