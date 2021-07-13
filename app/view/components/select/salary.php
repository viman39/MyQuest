<select name="salary<?=(@$argv['multiple'] == 'yes' ? '[]' : '')?>" id="salary" class="form-control select2" <?=(@$argv['multiple'] == 'yes' ? 'multiple="multiple"' : '')?>>
    <?php
    if ( !isset($argv['multiple']) or $argv['multiple'] != 'yes' ){
        ?>
        <option value="0" <?=(@$argv['selected'] == "0" ? 'selected' : '')?>>Select</option>
        <?php
    }
    ?>
    <option value="unemployed" <?=(@$argv['selected'] == "unemployed" ? 'selected' : '')?>>Unemployed</option>
    <option value="<$5.000" <?=(@$argv['selected'] == "<$5.000" ? 'selected' : '')?>><$5.000</option>
    <option value="$5.000-$10.000" <?=(@$argv['selected'] == "$5.000-$10.000" ? 'selected' : '')?>>$5.000-$10.000</option>
    <option value="$10.000-$20.000" <?=(@$argv['selected'] == "$10.000-$20.000" ? 'selected' : '')?>>$10.000-$20.000</option>
    <option value="$20.000-$50.000" <?=(@$argv['selected'] == "$20.000-$50.000" ? 'selected' : '')?>>$20.000-$50.000</option>
    <option value="$50.000-$100.000" <?=(@$argv['selected'] == "$50.000-$100.000" ? 'selected' : '')?>>$50.000-$100.000</option>
    <option value=">$100.000" <?=(@$argv['selected'] == ">$100.000" ? 'selected' : '')?>>>$100.000</option>
</select>
