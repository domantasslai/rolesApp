## Kaip pasileisti savo aplinkoje šį projektą:

- Komadinėje eilutėje įveskite (projekto root kataloge): touch database/database.sqlite.
- Sukūrus duomenų bazę, terminale įveskite: php artisan migrate.
- Svarbu, kad prieš užregistruojant pirmą vartotoją, terminale suvestumėte tokią komandą: php artisan db:seed. Bus sukurtas Adminas (prisijungimo duomenys: admin@gmail.com, password: password), taip pat bus sukurtos rolės admin ir user.
- Integruotas slaptažodžio atkūrimo funkciuonalumas. Kad jis veiktų Jūsų aplinkoje, Jums reikės .env  faile įrašyti: 5 eilutėje APP_URL=http://localhost:8000, taip pat savo duomenis iš https://mailtrap.io/ paskiros (MAIL_USERNAME=‘Jūsų Username‘, MAIL_PASSWORD=‘Jūsų Password‘, MAIL_FROM_ADDRESS="test@test.com"). Atnaujinant savo slaptažodį, gausite laišką į mailtrap.io su slaptažodžio atkūrimo nuoroda.

- Funkciuonalumas:
    - Vartotojas gali peržiūrėti savo profilį.
    - Vartotojas gali atnaujinti savo profilio duomenys.
    - Admin role turintis vartotojas gali peržiūrėti visų prisiregistravusių vartotojų: vardą, elektroninį paštą ir turimą rolę.

> Darbui naudota:
> Laravel 6, Bootstrap, sqlite.
> Naudojau Gates, kad tikrinčiau vartotojų roles.
