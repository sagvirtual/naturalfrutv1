<?php
if (!defined('IN_CB')) { die('You are not allowed to access to this page.'); }

$default_value['thickness'] = 30;
$thickness = 20;
registerImageKey('thickness', $thickness);
?>
                    <tr>
                        <td><label for="thickness">Thickness</label></td>
                        <td><?php echo getInputTextHtml('thickness', $thickness, array('type' => 'number', 'min' => 20, 'max' => 90, 'step' => 5, 'required' => 'required')); ?></td>
                    </tr>