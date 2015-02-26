<table id="content">
    <tr>
        <?php echo $this->element('filter', $filter); ?>
        <td id="main">
            Enter zipcodes or postal codes to find their closest dealers.  Codes may be separated by commas or line breaks.
            <?php
            echo $this->Form->create();
            echo $this->Form->textarea('zips', array('style' => 'width:100%; height:150px;'));
            echo $this->Form->end('Find Dealers');
            
            if(isset($zip_array) && !empty($zip_array)){?>
                <table cellspacing="1" id="list">
                    <?php $th = array(
                        'Zipcode Requested',
                        'Zipcode Matched',
                        'Dealer',
                        'Distance'
                    );
                    echo $this->Html->tableHeaders($th);
                    foreach($zip_array as $zip => $z){
                        $tr = array(
                            $zip,
                            (isset($z['Zipcode']['zipcode']) ? $z['Zipcode']['zipcode'] : 'Not Found'),
                            (isset($z['Dealer'][0]['Dealer']['name']) ? $this->Html->link($z['Dealer'][0]['Dealer']['name'], 'show/'.$z['Dealer'][0]['Dealer']['id'], array('target' => '_blank')) : 'Not Found'),
                            (isset($z['Dealer'][0][0]['Dealer_Distance']) ? round($z['Dealer'][0][0]['Dealer_Distance'], 2) : 'N/A')
                        );
                        echo $this->Html->tableCells($tr, null, array('class' => "on"));
                    }?>
                </table>
            <?php }?>
        </td>
    </tr>
</table>