<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
    jQuery(document).ready(function($){
        var jhtdla = $('<a>')
            .attr('href','#dealer-locations')
            .attr('class','show_hide')
            .html('Dealers');

        $('.additionalinfo').hide();
        jhtdla.click(function(){
            $(".additionalinfo").slideToggle();
        });
                
        if ( $('#menu-item-4002').size() > 0 ) {
            jhtdla.appendTo('#menu-item-4002').siblings().hide();
        } else {
            $('<li />').appendTo('#menu-footer-line-1').append(jhtdla).addClass('last').prev().removeClass('last');
        }
    });
</script>

<div class="dealer-locate-black">
    <h2 class="pageintro">Jacuzzi<sup>&reg;</sup> Hot Tub<br />Owner's Supports</h2>
    <p><strong>Locate your nearest authorized Jacuzzi<sup>&reg;</sup> Hot Tub showroom to:</strong></p>
    <ul>
        <li><span>Fulfill maintenance needs</span></li>
        <li><span>Access genuine parts</span></li>
        <li><span>Explore accessories</span></li>
    </ul>
    <div class="dl-black-box">
        <h2>Find Your Closest Dealer</h2>
        <p>Your local authorized showroom staff is ready to help with water care needs, schedule service calls and more.</p>
        <div id="tranbox"> 
            <?php echo $this->Form->create('Locator', array('action' => 'cities', 'type' => 'post', 'name' => "countryZipForm1", 'id' => "countryZipForm1", 'onSubmit' => "document.getElementById('zipcodeSearch1').value=1;"));?>
            <!--form action="<?php //echo BASEDIR; ?>/cities/" method="post" name="countryZipForm1" id="countryZipForm1" onSubmit="document.getElementById('zipcodeSearch1').value=1;"-->
                <input type="hidden" name="zipcodeSearch" id="zipcodeSearch1" value="0" />
                <div id="country">
                    <label for="countryInput">Country:</label><br />
                    <?php
                    if (strpos($_SERVER['HTTP_HOST'], '.ca') !== false) {
                        $defaultCtry = 3;
                    }
                    echo $this->Form->select('Dealer.country_id', $countryList, array('value' => $defaultCtry, 'id' => 'countryInput', 'name' => 'country', 'onChange' => 'disableZip()', 'empty' => FALSE));
                    //echo $html->selectTag("Dealer/country_id", $countryList, $defaultCtry, array('id' => 'countryInput', 'name' => 'country', 'onChange' => 'disableZip()'), null, false); #drop down list of countries 
                    ?>
                </div>
                <div id="zipcode" class="zip-wrap">
                    <label for="zipcodeInput"><?php if ($defaultCtry !== 3) { ?>Zip <span>or</span> <?php } ?>Postal Code</label><br />
                    <input id="zipcodeInput" type="text" name="zip" class="text" />
                </div>
                <div id="submit">
                    <input id="go" type="submit" value="Locate Nearest Store&nbsp;&nbsp;&nbsp;&#9658;" onclick="document.getElementById('zipcodeSearch1').value=1;" class="btn" />
                </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <img src="<?php echo $this->webroot; ?>../wp-content/themes/jht/images/dealer-locator/dealer-locator-bg2.png" alt="Dealer Locator" />
</div>

<div class="main additionalinfo">
    <?php if (strpos($_SERVER['HTTP_HOST'], '.ca') !== false) {?>
        <h2>Canadian Cities</h2>
        <div class="horz660"></div>
        <ul class="lists">
            <?php 
            $i = 1;
            $lastCity = count($popular_ca_cities)-1;
            $pop_ca_cities_length = ceil(count($popular_ca_cities)/4);

            foreach($popular_ca_cities as $key => $s){
                $stateUrl = str_replace(' ', '-', strtolower($s['State']['name'].'-'.$s['State']['abbreviation']));
                if($i == 1){
                    echo '<li><ul class="list">';
                }
                echo '<li>'; 
                echo $this->Html->link($s['Dealer']['city'], '/'.$stateUrl.'/'.$s['Dealer']['slug'], array('title' => $s['Dealer']['city'].' Hot Tubs'));
                echo '</li>';

                if($i == $pop_ca_cities_length){
                    echo '</ul></li>';
                    $i = 1;
                    continue;
                }elseif($key == $lastCity){
                    echo '</ul></li></ul>';
                    break;
                }
                $i++;
            }
            ?>
        <h2>Search by Canadian Province</h2>
        <div class="horz660"></div>
        <ul class="lists">
            <?php 
            $i = 1;
            $lastProv = count($provList)-1;
            $prov_length = ceil(count($provList)/4);

            foreach($provList as $key => $s){
                $provUrl = str_replace(' ', '-', strtolower($s['State']['name'].'-'.$s['State']['abbreviation']));
                if($i == 1)
                    echo '<li><ul class="list">';

                echo '<li>'; 
                echo $this->Html->link($s['State']['name'], '/'.$provUrl.'/', array('title' => 'Hot Tubs in '.$s['State']['name']));
                echo '</li>';

                if($i == $prov_length){
                    echo '</ul></li>';
                    $i = 1;
                    continue;
                }elseif($key == $lastProv){
                    echo '</ul></li></ul>';
                    break;
                }
                $i++;
            }
            ?>
    <?php }else{?>
        <h2>Popular Cities</h2>
        <div class="horz660"></div>
        <ul class="lists">
            <li>
                <ul class="list">
                    <li><?php echo $this->Html->link('Austin', '/texas-tx/austin-hot-tubs/', array('title' => 'Austin Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('Boston', '/massachusetts-ma/peabody-hot-tubs/', array('title' => 'Peabody Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('Chicago', '/illinois-il/bridgeview-hot-tubs/', array('title' => 'Chicago Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('Dallas', '/texas-tx/dallas-hot-tubs/', array('title' => 'Dallas Hot Tubs'));?></li>
                </ul>
            </li>
            <li>
                <ul class="list">
                    <li><?php echo $this->Html->link('Denver', '/colorado-co/littleton-hot-tubs/', array('title' => 'Littleton Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('Houston', '/texas-tx/deer-park-hot-tubs/', array('title' => 'Deer Park Tubs'));?></li>
                    <li><?php echo $this->Html->link('Irvine', '/california-ca/lake-forest-hot-tubs/', array('title' => 'Lake Forest Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('Las Vegas', '/nevada-nv/las-vegas-hot-tubs/', array('title' => 'Las Vegas Hot Tubs'));?></li>
                </ul>
            </li>
            <li>
                <ul class="list">
                    <li><?php echo $this->Html->link('Little Rock', '/arkansas-ar/north-little-rock-hot-tubs/', array('title' => 'North Little Rock Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('Miami', '/florida-fl/miami-hot-tubs/', array('title' => 'Miami Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('Phoenix', '/arizona-az/phoenix-hot-tubs/', array('title' => 'Phoenix Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('Pleasanton', '/california-ca/palo-alto-hot-tubs/', array('title' => 'Palo Alto Hot Tubs'));?></li>
                </ul>
            </li>
            <li>
                <ul class="list">
                    <li><?php echo $this->Html->link('San Antonio', '/texas-tx/san-antonio-hot-tubs/', array('title' => 'San Antonio Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('San Diego', '/california-ca/san-diego-hot-tubs/', array('title' => 'San Diego Hot Tubs'));?></li>
                    <li><?php echo $this->Html->link('San Francisco', '/california-ca/richmond-hot-tubs/', array('title' => 'Richmond Hot Tubs'));?></li>
                    <!--li><?php echo $this->Html->link('St. Louis', '/missouri-mo/clayton-hot-tubs/', array('title' => 'Clayton Hot Tubs'));?></li-->
                </ul>
            </li>
        </ul>
        <h2>Search by State</h2>
        <div class="horz660"></div>
        <ul class="lists">
            <?php 
            $i = 1;
            $lastState = count($stateList)-1;

            foreach($stateList as $key => $s){
                $stateUrl = str_replace(' ', '-', strtolower($s['State']['name'].'-'.$s['State']['abbreviation']));
                if($i == 1){
                    echo '<li><ul class="list">';
                }
                echo '<li>'; 
                echo $this->Html->link($s['State']['name'], '/'.$stateUrl.'/', array('title' => 'Hot Tubs in '.$s['State']['name']));
                echo '</li>';

                if($i == 13){
                    echo '</ul></li>';
                    $i = 1;
                    continue;
                }elseif($key == $lastState){
                    echo '</ul></li></ul>';
                    break;
                }
                $i++;
            }
            ?>
    <?php }?>
</div>
