<?php
    function get_css(){
        $linck_css = 'css';
        $file_format_css = '.css';
        $data_dir_name_css = array();
        $dir_format_css = '.dir';


        $dir_list_css = glob('./'.$linck_css.'/*'.$dir_format_css.'');
        foreach ($dir_list_css as $dir_name_css){
            array_push($data_dir_name_css, '',$dir_name_css);
        }

        for($css = 0; $css < count($data_dir_name_css); $css++){

            $filelist_css = glob(''.$data_dir_name_css[$css].'/*'.$file_format_css.'');
            foreach ($filelist_css as $filename_css){
                echo '<link rel="stylesheet" href="'.$filename_css.'">'; 
            }
        }

        $filelist1_css = glob('./'.$linck_css.'/*'.$file_format_css.'');
        foreach ($filelist1_css as $filename1_css){
            echo '<link rel="stylesheet" href="'.$filename1_css.'">'; 
        }
    }

    function get_js(){
        $linck_js = 'js';
        $file_format_js = '.js';
        $data_dir_name_js = array('');
        $dir_format_js = '.dir';


        $dir_list_js = glob('./'.$linck_js.'/*'.$dir_format_js.'');
        foreach ($dir_list_js as $dir_name_js){
            array_push($data_dir_name_js, $dir_name_js);
        }

        for($js = 0; $js < count($data_dir_name_js); $js++){

            $filelist_js = glob(''.$data_dir_name_js[$js].'/*'.$file_format_js.'');
            foreach ($filelist_js as $filename_js){
                echo '<script src="'.$filename_js.'"></script> ';

            }
        }
        $filelist1_js = glob('./'.$linck_js.'/*'.$file_format_js.'');
        foreach ($filelist1_js as $filename1_js){
            echo '<script src="'. $filename1_js .'"></script>'; 
        }
    }

?>
