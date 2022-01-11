<div class="custom_header">
    <div class="container box-1_headrer">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-4 p-0 align-items-center">
                    <span class="logo_header"><span class="pid-logo_header">IP</span>-manager</span>
                </div>
                <div class="col-8 p-0 d-flex justify-content-end align-items-center">
                    <ul class="menu-1_header">
                        <?php 
                            for($i = 0; $i < count($arr_data_menu_header); $i++){
                                echo'<li id="'. $arr_data_menu_header[$i]["id"] .'" class="button-hv-header_anim button-menu-1_header" >'. $arr_data_menu_header[$i]["name"] .'</li>';
                            }
                        ?>

                    </ul>
                </div>

            </div>
            <!-- end row -->
        </div>
    </div>
</div>
