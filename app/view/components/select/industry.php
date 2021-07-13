<select name="industry<?=(@$argv['multiple'] == 'yes' ? '[]' : '')?>" id="industry" class="form-control select2" <?=(@$argv['multiple'] == 'yes' ? 'multiple="multiple"' : '')?>>
    <?php
    if ( !isset($argv['multiple']) or $argv['multiple'] != 'yes' ){
        ?>
        <option value="0" <?=(@$argv['selected'] == "0" ? 'selected' : '')?>>Select</option>
        <?php
    }
    ?>
    <option value="Accounting" <?=(@$argv['selected'] == "Accounting" ? 'selected' : '')?>>Accounting</option>
    <option value="Airlines/Aviation" <?=(@$argv['selected'] == "Airlines/Aviation" ? 'selected' : '')?>>Airlines/Aviation</option>
    <option value="Alternative Dispute Resolution" <?=(@$argv['selected'] == "Alternative Dispute Resolution" ? 'selected' : '')?>>Alternative Dispute Resolution</option>
    <option value="Alternative Medicine" <?=(@$argv['selected'] == "Alternative Medicine" ? 'selected' : '')?>>Alternative Medicine</option>
    <option value="Animation" <?=(@$argv['selected'] == "Animation" ? 'selected' : '')?>>Animation</option>
    <option value="Apparel/Fashion" <?=(@$argv['selected'] == "Apparel/Fashion" ? 'selected' : '')?>>Apparel/Fashion</option>
    <option value="Architecture/Planning" <?=(@$argv['selected'] == "Architecture/Planning" ? 'selected' : '')?>>Architecture/Planning</option>
    <option value="Arts/Crafts" <?=(@$argv['selected'] == "Arts/Crafts" ? 'selected' : '')?>>Arts/Crafts</option>
    <option value="Automotive" <?=(@$argv['selected'] == "Automotive" ? 'selected' : '')?>>Automotive</option>
    <option value="Aviation/Aerospace" <?=(@$argv['selected'] == "Aviation/Aerospace" ? 'selected' : '')?>>Aviation/Aerospace</option>
    <option value="Banking/Mortgage" <?=(@$argv['selected'] == "Banking/Mortgage" ? 'selected' : '')?>>Banking/Mortgage</option>
    <option value="Biotechnology/Greentech" <?=(@$argv['selected'] == "Biotechnology/Greentech" ? 'selected' : '')?>>Biotechnology/Greentech</option>
    <option value="Broadcast Media" <?=(@$argv['selected'] == "Broadcast Media" ? 'selected' : '')?>>Broadcast Media</option>
    <option value="Building Materials" <?=(@$argv['selected'] == "Building Materials" ? 'selected' : '')?>>Building Materials</option>
    <option value="Business Supplies/Equipment" <?=(@$argv['selected'] == "Business Supplies/Equipment" ? 'selected' : '')?>>Business Supplies/Equipment</option>
    <option value="Capital Markets/Hedge Fund/Private Equity" <?=(@$argv['selected'] == "Capital Markets/Hedge Fund/Private Equity" ? 'selected' : '')?>>Capital Markets/Hedge Fund/Private Equity</option>
    <option value="Chemicals" <?=(@$argv['selected'] == "Chemicals" ? 'selected' : '')?>>Chemicals</option>
    <option value="Civic/Social Organization" <?=(@$argv['selected'] == "Civic/Social Organization" ? 'selected' : '')?>>Civic/Social Organization</option>
    <option value="Civil Engineering" <?=(@$argv['selected'] == "Civil Engineering" ? 'selected' : '')?>>Civil Engineering</option>
    <option value="Commercial Real Estate" <?=(@$argv['selected'] == "Commercial Real Estate" ? 'selected' : '')?>>Commercial Real Estate</option>
    <option value="Computer Games" <?=(@$argv['selected'] == "Computer Games" ? 'selected' : '')?>>Computer Games</option>
    <option value="Computer Hardware" <?=(@$argv['selected'] == "Computer Hardware" ? 'selected' : '')?>>Computer Hardware</option>
    <option value="Computer Networking" <?=(@$argv['selected'] == "Computer Networking" ? 'selected' : '')?>>Computer Networking</option>
    <option value="Computer Software/Engineering" <?=(@$argv['selected'] == "Computer Software/Engineering" ? 'selected' : '')?>>Computer Software/Engineering</option>
    <option value="Computer/Network Security" <?=(@$argv['selected'] == "Computer/Network Security" ? 'selected' : '')?>>Computer/Network Security</option>
    <option value="Construction" <?=(@$argv['selected'] == "Construction" ? 'selected' : '')?>>Construction</option>
    <option value="Consumer Electronics" <?=(@$argv['selected'] == "Consumer Electronics" ? 'selected' : '')?>>Consumer Electronics</option>
    <option value="Consumer Goods" <?=(@$argv['selected'] == "Consumer Goods" ? 'selected' : '')?>>Consumer Goods</option>
    <option value="Consumer Services" <?=(@$argv['selected'] == "Consumer Services" ? 'selected' : '')?>>Consumer Services</option>
    <option value="Cosmetics" <?=(@$argv['selected'] == "Cosmetics" ? 'selected' : '')?>>Cosmetics</option>
    <option value="Dairy" <?=(@$argv['selected'] == "Dairy" ? 'selected' : '')?>>Dairy</option>
    <option value="Defense/Space" <?=(@$argv['selected'] == "Defense/Space" ? 'selected' : '')?>>Defense/Space</option>
    <option value="Design" <?=(@$argv['selected'] == "Design" ? 'selected' : '')?>>Design</option>
    <option value="E-Learning" <?=(@$argv['selected'] == "E-Learning" ? 'selected' : '')?>>E-Learning</option>
    <option value="Education Management" <?=(@$argv['selected'] == "Education Management" ? 'selected' : '')?>>Education Management</option>
    <option value="Electrical/Electronic Manufacturing" <?=(@$argv['selected'] == "Electrical/Electronic Manufacturing" ? 'selected' : '')?>>Electrical/Electronic Manufacturing</option>
    <option value="Entertainment/Movie Production" <?=(@$argv['selected'] == "Entertainment/Movie Production" ? 'selected' : '')?>>Entertainment/Movie Production</option>
    <option value="Environmental Services" <?=(@$argv['selected'] == "Environmental Services" ? 'selected' : '')?>>Environmental Services</option>
    <option value="Events Services" <?=(@$argv['selected'] == "Events Services" ? 'selected' : '')?>>Events Services</option>
    <option value="Executive Office" <?=(@$argv['selected'] == "Executive Office" ? 'selected' : '')?>>Executive Office</option>
    <option value="Facilities Services" <?=(@$argv['selected'] == "Facilities Services" ? 'selected' : '')?>>Facilities Services</option>
    <option value="Farming" <?=(@$argv['selected'] == "Farming" ? 'selected' : '')?>>Farming</option>
    <option value="Financial Services" <?=(@$argv['selected'] == "Financial Services" ? 'selected' : '')?>>Financial Services</option>
    <option value="Fine Art" <?=(@$argv['selected'] == "Fine Art" ? 'selected' : '')?>>Fine Art</option>
    <option value="Fishery" <?=(@$argv['selected'] == "Fishery" ? 'selected' : '')?>>Fishery</option>
    <option value="Food Production" <?=(@$argv['selected'] == "Food Production" ? 'selected' : '')?>>Food Production</option>
    <option value="Food/Beverages" <?=(@$argv['selected'] == "Food/Beverages" ? 'selected' : '')?>>Food/Beverages</option>
    <option value="Fundraising" <?=(@$argv['selected'] == "Fundraising" ? 'selected' : '')?>>Fundraising</option>
    <option value="Furniture" <?=(@$argv['selected'] == "Furniture" ? 'selected' : '')?>>Furniture</option>
    <option value="Gambling/Casinos" <?=(@$argv['selected'] == "Gambling/Casinos" ? 'selected' : '')?>>Gambling/Casinos</option>
    <option value="Glass/Ceramics/Concrete" <?=(@$argv['selected'] == "Glass/Ceramics/Concrete" ? 'selected' : '')?>>Glass/Ceramics/Concrete</option>
    <option value="Government Administration" <?=(@$argv['selected'] == "Government Administration" ? 'selected' : '')?>>Government Administration</option>
    <option value="Government Relations" <?=(@$argv['selected'] == "Government Relations" ? 'selected' : '')?>>Government Relations</option>
    <option value="Graphic Design/Web Design" <?=(@$argv['selected'] == "Graphic Design/Web Design" ? 'selected' : '')?>>Graphic Design/Web Design</option>
    <option value="Health/Fitness" <?=(@$argv['selected'] == "Health/Fitness" ? 'selected' : '')?>>Health/Fitness</option>
    <option value="Higher Education/Acadamia" <?=(@$argv['selected'] == "Higher Education/Acadamia" ? 'selected' : '')?>>Higher Education/Acadamia</option>
    <option value="Hospital/Health Care" <?=(@$argv['selected'] == "Hospital/Health Care" ? 'selected' : '')?>>Hospital/Health Care</option>
    <option value="Hospitality" <?=(@$argv['selected'] == "Hospitality" ? 'selected' : '')?>>Hospitality</option>
    <option value="Human Resources/HR" <?=(@$argv['selected'] == "Human Resources/HR" ? 'selected' : '')?>>Human Resources/HR</option>
    <option value="Import/Export" <?=(@$argv['selected'] == "Import/Export" ? 'selected' : '')?>>Import/Export</option>
    <option value="Individual/Family Services" <?=(@$argv['selected'] == "Individual/Family Services" ? 'selected' : '')?>>Individual/Family Services</option>
    <option value="Industrial Automation" <?=(@$argv['selected'] == "Industrial Automation" ? 'selected' : '')?>>Industrial Automation</option>
    <option value="Information Services" <?=(@$argv['selected'] == "Information Services" ? 'selected' : '')?>>Information Services</option>
    <option value="Information Technology/IT" <?=(@$argv['selected'] == "Information Technology/IT" ? 'selected' : '')?>>Information Technology/IT</option>
    <option value="Insurance" <?=(@$argv['selected'] == "Insurance" ? 'selected' : '')?>>Insurance</option>
    <option value="International Affairs" <?=(@$argv['selected'] == "International Affairs" ? 'selected' : '')?>>International Affairs</option>
    <option value="International Trade/Development" <?=(@$argv['selected'] == "International Trade/Development" ? 'selected' : '')?>>International Trade/Development</option>
    <option value="Internet" <?=(@$argv['selected'] == "Internet" ? 'selected' : '')?>>Internet</option>
    <option value="Investment Banking/Venture" <?=(@$argv['selected'] == "Investment Banking/Venture" ? 'selected' : '')?>>Investment Banking/Venture</option>
    <option value="Investment Management/Hedge Fund/Private Equity" <?=(@$argv['selected'] == "Investment Management/Hedge Fund/Private Equity" ? 'selected' : '')?>>Investment Management/Hedge Fund/Private Equity</option>
    <option value="Judiciary" <?=(@$argv['selected'] == "Judiciary" ? 'selected' : '')?>>Judiciary</option>
    <option value="Law Enforcement" <?=(@$argv['selected'] == "Law Enforcement" ? 'selected' : '')?>>Law Enforcement</option>
    <option value="Law Practice/Law Firms" <?=(@$argv['selected'] == "Law Practice/Law Firms" ? 'selected' : '')?>>Law Practice/Law Firms</option>
    <option value="Legal Services" <?=(@$argv['selected'] == "Legal Services" ? 'selected' : '')?>>Legal Services</option>
    <option value="Legislative Office" <?=(@$argv['selected'] == "Legislative Office" ? 'selected' : '')?>>Legislative Office</option>
    <option value="Leisure/Travel" <?=(@$argv['selected'] == "Leisure/Travel" ? 'selected' : '')?>>Leisure/Travel</option>
    <option value="Library" <?=(@$argv['selected'] == "Library" ? 'selected' : '')?>>Library</option>
    <option value="Logistics/Procurement" <?=(@$argv['selected'] == "Logistics/Procurement" ? 'selected' : '')?>>Logistics/Procurement</option>
    <option value="Luxury Goods/Jewelry" <?=(@$argv['selected'] == "Luxury Goods/Jewelry" ? 'selected' : '')?>>Luxury Goods/Jewelry</option>
    <option value="Machinery" <?=(@$argv['selected'] == "Machinery" ? 'selected' : '')?>>Machinery</option>
    <option value="Management Consulting" <?=(@$argv['selected'] == "Management Consulting" ? 'selected' : '')?>>Management Consulting</option>
    <option value="Maritime" <?=(@$argv['selected'] == "Maritime" ? 'selected' : '')?>>Maritime</option>
    <option value="Market Research" <?=(@$argv['selected'] == "Market Research" ? 'selected' : '')?>>Market Research</option>
    <option value="Marketing/Advertising/Sales" <?=(@$argv['selected'] == "Marketing/Advertising/Sales" ? 'selected' : '')?>>Marketing/Advertising/Sales</option>
    <option value="Mechanical or Industrial Engineering" <?=(@$argv['selected'] == "Mechanical or Industrial Engineering" ? 'selected' : '')?>>Mechanical or Industrial Engineering</option>
    <option value="Media Production" <?=(@$argv['selected'] == "Media Production" ? 'selected' : '')?>>Media Production</option>
    <option value="Medical Equipment" <?=(@$argv['selected'] == "Medical Equipment" ? 'selected' : '')?>>Medical Equipment</option>
    <option value="Medical Practice" <?=(@$argv['selected'] == "Medical Practice" ? 'selected' : '')?>>Medical Practice</option>
    <option value="Mental Health Care" <?=(@$argv['selected'] == "Mental Health Care" ? 'selected' : '')?>>Mental Health Care</option>
    <option value="Military Industry" <?=(@$argv['selected'] == "Military Industry" ? 'selected' : '')?>>Military Industry</option>
    <option value="Mining/Metals" <?=(@$argv['selected'] == "Mining/Metals" ? 'selected' : '')?>>Mining/Metals</option>
    <option value="Motion Pictures/Film" <?=(@$argv['selected'] == "Motion Pictures/Film" ? 'selected' : '')?>>Motion Pictures/Film</option>
    <option value="Museums/Institutions" <?=(@$argv['selected'] == "Museums/Institutions" ? 'selected' : '')?>>Museums/Institutions</option>
    <option value="Music" <?=(@$argv['selected'] == "Music" ? 'selected' : '')?>>Music</option>
    <option value="Nanotechnology" <?=(@$argv['selected'] == "Nanotechnology" ? 'selected' : '')?>>Nanotechnology</option>
    <option value="Newspapers/Journalism" <?=(@$argv['selected'] == "Newspapers/Journalism" ? 'selected' : '')?>>Newspapers/Journalism</option>
    <option value="Non-Profit/Volunteering" <?=(@$argv['selected'] == "Non-Profit/Volunteering" ? 'selected' : '')?>>Non-Profit/Volunteering</option>
    <option value="Oil/Energy/Solar/Greentech" <?=(@$argv['selected'] == "Oil/Energy/Solar/Greentech" ? 'selected' : '')?>>Oil/Energy/Solar/Greentech</option>
    <option value="Online Publishing" <?=(@$argv['selected'] == "Online Publishing" ? 'selected' : '')?>>Online Publishing</option>
    <option value="Other Industry" <?=(@$argv['selected'] == "Other Industry" ? 'selected' : '')?>>Other Industry</option>
    <option value="Outsourcing/Offshoring" <?=(@$argv['selected'] == "Outsourcing/Offshoring" ? 'selected' : '')?>>Outsourcing/Offshoring</option>
    <option value="Package/Freight Delivery" <?=(@$argv['selected'] == "Package/Freight Delivery" ? 'selected' : '')?>>Package/Freight Delivery</option>
    <option value="Packaging/Containers" <?=(@$argv['selected'] == "Packaging/Containers" ? 'selected' : '')?>>Packaging/Containers</option>
    <option value="Paper/Forest Products" <?=(@$argv['selected'] == "Paper/Forest Products" ? 'selected' : '')?>>Paper/Forest Products</option>
    <option value="Performing Arts" <?=(@$argv['selected'] == "Performing Arts" ? 'selected' : '')?>>Performing Arts</option>
    <option value="Pharmaceuticals" <?=(@$argv['selected'] == "Pharmaceuticals" ? 'selected' : '')?>>Pharmaceuticals</option>
    <option value="Philanthropy" <?=(@$argv['selected'] == "Philanthropy" ? 'selected' : '')?>>Philanthropy</option>
    <option value="Photography" <?=(@$argv['selected'] == "Photography" ? 'selected' : '')?>>Photography</option>
    <option value="Plastics" <?=(@$argv['selected'] == "Plastics" ? 'selected' : '')?>>Plastics</option>
    <option value="Political Organization" <?=(@$argv['selected'] == "Political Organization" ? 'selected' : '')?>>Political Organization</option>
    <option value="Primary/Secondary Education" <?=(@$argv['selected'] == "Primary/Secondary Education" ? 'selected' : '')?>>Primary/Secondary Education</option>
    <option value="Printing" <?=(@$argv['selected'] == "Printing" ? 'selected' : '')?>>Printing</option>
    <option value="Professional Training" <?=(@$argv['selected'] == "Professional Training" ? 'selected' : '')?>>Professional Training</option>
    <option value="Program Development" <?=(@$argv['selected'] == "Program Development" ? 'selected' : '')?>>Program Development</option>
    <option value="Public Relations/PR" <?=(@$argv['selected'] == "Public Relations/PR" ? 'selected' : '')?>>Public Relations/PR</option>
    <option value="Public Safety" <?=(@$argv['selected'] == "Public Safety" ? 'selected' : '')?>>Public Safety</option>
    <option value="Publishing Industry" <?=(@$argv['selected'] == "Publishing Industry" ? 'selected' : '')?>>Publishing Industry</option>
    <option value="Railroad Manufacture" <?=(@$argv['selected'] == "Railroad Manufacture" ? 'selected' : '')?>>Railroad Manufacture</option>
    <option value="Ranching" <?=(@$argv['selected'] == "Ranching" ? 'selected' : '')?>>Ranching</option>
    <option value="Real Estate/Mortgage" <?=(@$argv['selected'] == "Real Estate/Mortgage" ? 'selected' : '')?>>Real Estate/Mortgage</option>
    <option value="Recreational Facilities/Services" <?=(@$argv['selected'] == "Recreational Facilities/Services" ? 'selected' : '')?>>Recreational Facilities/Services</option>
    <option value="Religious Institutions" <?=(@$argv['selected'] == "Religious Institutions" ? 'selected' : '')?>>Religious Institutions</option>
    <option value="Renewables/Environment" <?=(@$argv['selected'] == "Renewables/Environment" ? 'selected' : '')?>>Renewables/Environment</option>
    <option value="Research Industry" <?=(@$argv['selected'] == "Research Industry" ? 'selected' : '')?>>Research Industry</option>
    <option value="Restaurants" <?=(@$argv['selected'] == "Restaurants" ? 'selected' : '')?>>Restaurants</option>
    <option value="Retail Industry" <?=(@$argv['selected'] == "Retail Industry" ? 'selected' : '')?>>Retail Industry</option>
    <option value="Security/Investigations" <?=(@$argv['selected'] == "Security/Investigations" ? 'selected' : '')?>>Security/Investigations</option>
    <option value="Semiconductors" <?=(@$argv['selected'] == "Semiconductors" ? 'selected' : '')?>>Semiconductors</option>
    <option value="Shipbuilding" <?=(@$argv['selected'] == "Shipbuilding" ? 'selected' : '')?>>Shipbuilding</option>
    <option value="Sporting Goods" <?=(@$argv['selected'] == "Sporting Goods" ? 'selected' : '')?>>Sporting Goods</option>
    <option value="Sports" <?=(@$argv['selected'] == "Sports" ? 'selected' : '')?>>Sports</option>
    <option value="Staffing/Recruiting" <?=(@$argv['selected'] == "Staffing/Recruiting" ? 'selected' : '')?>>Staffing/Recruiting</option>
    <option value="Student" <?=(@$argv['selected'] == "Student" ? 'selected' : '')?>>Student</option>
    <option value="Supermarkets" <?=(@$argv['selected'] == "Supermarkets" ? 'selected' : '')?>>Supermarkets</option>
    <option value="Telecommunications" <?=(@$argv['selected'] == "Telecommunications" ? 'selected' : '')?>>Telecommunications</option>
    <option value="Textiles" <?=(@$argv['selected'] == "Textiles" ? 'selected' : '')?>>Textiles</option>
    <option value="Think Tanks" <?=(@$argv['selected'] == "Think Tanks" ? 'selected' : '')?>>Think Tanks</option>
    <option value="Tobacco" <?=(@$argv['selected'] == "Tobacco" ? 'selected' : '')?>>Tobacco</option>
    <option value="Translation/Localization" <?=(@$argv['selected'] == "Translation/Localization" ? 'selected' : '')?>>Translation/Localization</option>
    <option value="Transportation" <?=(@$argv['selected'] == "Transportation" ? 'selected' : '')?>>Transportation</option>
    <option value="Utilities" <?=(@$argv['selected'] == "Utilities" ? 'selected' : '')?>>Utilities</option>
    <option value="Venture Capital/VC" <?=(@$argv['selected'] == "Venture Capital/VC" ? 'selected' : '')?>>Venture Capital/VC</option>
    <option value="Veterinary" <?=(@$argv['selected'] == "Veterinary" ? 'selected' : '')?>>Veterinary</option>
    <option value="Warehousing" <?=(@$argv['selected'] == "Warehousing" ? 'selected' : '')?>>Warehousing</option>
    <option value="Wholesale" <?=(@$argv['selected'] == "Wholesale" ? 'selected' : '')?>>Wholesale</option>
    <option value="Wine/Spirits" <?=(@$argv['selected'] == "Wine/Spirits" ? 'selected' : '')?>>Wine/Spirits</option>
    <option value="Wireless" <?=(@$argv['selected'] == "Wireless" ? 'selected' : '')?>>Wireless</option>
    <option value="Writing/Editing" <?=(@$argv['selected'] == "Writing/Editing" ? 'selected' : '')?>>Writing/Editing</option>
</select>
