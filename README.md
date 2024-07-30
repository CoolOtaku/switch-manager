<p align="center"><img width="128" height="128" src="/img/switch.png"/></p>
<h1 align="center">switch-manager</h1>

## Description
<b>EN:</b>

This project is my joint project with a colleague, for the office where our practice was conducted.

This website is designed to manage switches and monitor their status. The site has dual Google authorization, <a target="_blank" href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjnmtm5uaj1AhXBDOwKHdfxC8YQFnoECAUQAQ&url=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.google.android.apps.authenticator2%26hl%3Duk%26gl%3DUS&usg=AOvVaw25KqBQdghvgpCgjEEAIhZb">details on this site</a>. The site also works with the database, the path to the database configuration file: <a target="_blank" href="https://github.com/CoolOtaku/switch-manager/blob/d04eadda6e63f3e5cd97f9c053470da7059f1fed/template/SQL_Connect.php">template/SQL_Connect.php</a>. Also passwords for users, QR codes and codes for double authorization in the database are not valid (this is done for security).

<b>UA:</b>

Це проект мій спільний з колегою проект, для кантори на якій проводилася наша практика.

Цей вебсайт 
признацений для керування комутаторами та моніторингом їх станів. На сайті присутня двійна Google авторизація, <a target="_blank" href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjnmtm5uaj1AhXBDOwKHdfxC8YQFnoECAUQAQ&url=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.google.android.apps.authenticator2%26hl%3Duk%26gl%3DUS&usg=AOvVaw25KqBQdghvgpCgjEEAIhZb">деталі на цьому сайті</a>. Також сайт працює з базою даних, шлях до файлу конфігурації БД: <a target="_blank" href="https://github.com/CoolOtaku/switch-manager/blob/d04eadda6e63f3e5cd97f9c053470da7059f1fed/template/SQL_Connect.php">template/SQL_Connect.php</a>. Також паролі для користувачів, QR коди та коди для двійної авторизації, в базі даних не дійсні (це зроблено для безпеки).

#
## Screenshots
<p>
  <img src="screens/s1.png" height="20%"/>
  <img src="screens/s2.png" height="20%"/>
  <img src="screens/s3.png" height="20%"/>
  <img src="screens/s4.png" height="20%"/>
  <img src="screens/s5.png" height="20%"/>
  <img src="screens/s6.png" height="20%"/>
</p>

#
## Technologies used
<b>EN:</b>
- Internal authorization system
- Two-factor authentication (**Google Authenticator**)
- QR code generation for two-factor authentication
- Using **Bootstrap** (front-end framework)
- Database and main admin panel for managing switches
- A convenient dock panel for the admin panel of the switch
- A system for logging switch states
- A system for checking the status of switches (*ping* command in js)

<b>UA:</b>
- Внутрішня система авторизації
- Двофакторна аутентифікація (**Google Authenticator**)
- Генерація QR-коду для двофакторної аутентифікації
- Використання **Bootstrap** (front-end framework)
- База даних і головна панель адміністратора для керування комутаторами
- Зручна бокова панель для адмін-панелі комутатора
- Система логування станів комутаторів
- Система перевірки стану комутаторів (команда *ping* в js)

#
## License
```
© 2022, CoolOtaku (ericspz531@gmail.com)
```
