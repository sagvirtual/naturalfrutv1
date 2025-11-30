

<?php
$codigodebarra="$codigodep";

define('IN_CB', true);
include('include/header.php');

registerImageKey('code', 'BCGean8');

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
<?php if ($imageKeys['text'] !== '') { ?><img src="https://softwarenatfrut.com/barcode/html/image.php<?php echo $finalRequest; ?> " width="150" border="0" alt="Barcode" /> 
<?php }
                        else { ?>
Fill the form to generate a barcode. 
<?php } ?>
 


<?php /* <script language="javascript">

var ganancia = "<?=$codigodebarra?>.gif";
   window.clipboardData.setData("Text", ganancia);

</script> 

<br>
<br>





<?=$codigodebarra?>.gif
 */?>



