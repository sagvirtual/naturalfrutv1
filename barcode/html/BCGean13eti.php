<?php

define('IN_CB', true);
include('include/headereti.php');

registerImageKey('code', 'BCGean13');

$characters = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
?>





<?php
if (!defined('IN_CB')) { die('You are not allowed to access to this page.'); }
?>

          
                    <?php
                        $finalRequest = '';
                        foreach (getImageKeys() as $key => $value) {
                            $finalRequest .= '&' . $key . '=' . urlencode($value);
                        }
                        if (strlen($finalRequest) > 0) {
                            $finalRequest[0] = '?';
                        }
                    ?>
<?php if ($imageKeys['text'] !== '') { 
    
    $urlcodigobar='/barcode/html/image.php'.$finalRequest;
    ?>
    
    
    <img src="https://softwarenatfrut.com/barcode/html/image.php<?php echo $finalRequest; ?> " style="width: <?php echo $anchocod; ?>px; height: auto;" alt="Barcode" /> 
<?php }
                        else { ?>
Fill the form to generate a barcode. 
<?php } ?>