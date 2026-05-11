<?php
                        if($resultDistinct && $resultDistinct != false){
                            ?>
                            <table class="table table-striped">                               
                            <?php
                            foreach($resultDistinct as $data){
                                ?>
                                <tr>
                                    <td><a href="<?php ?>">Volume -<?php echo $data['volume']." & Issue = ".$data['issue'];?></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </table>
                            <?php
                        }
                        ?>