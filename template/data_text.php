<?php
    //масив с текстом для таблицы
    $arr_data_text_table1 = array('#',"Название","Жанр","Дата релиза","Страна","Статус просмотра","Озвучка","Дата добавления");
    //масив с названиями sql таблиц
    $arr_data_basse_table2 = array("name","Genres","Release_date","Country","viewing","Voiceover","date_of_addition");

    //масив меню хедера
    $arr_data_menu_header = array(
        array( "id" => "home_header-button", "name" => "Home",), 
        array( "id" => "audit_header-button", "name" => "Audit",), 
        array( "id" => "profile_header-button", "name" => "Profile",),
        array( "id" => "log_out_header-button", "name" => "Log out",)
    );
?>