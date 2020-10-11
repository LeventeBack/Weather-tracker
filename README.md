
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="container text-center mt-5">
        <h1>Readme - Weather Tracker</h1>
        <hr>

        <h4>I. Bevezető</h4>
        <br>
        <h5>A Weather Tracker nevű weboldal egy egyszerű és letisztult felhasználói felületet biztosít arra, hogy az általunk birtokolt szenzorok adatait követni tudjuk és értesüljünk esetleges vészhelyezetekről.</h5>
        <figure class="figure">
            <img src="./img/index-welcome.png" alt="index page -> welcome message" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">1. ábra – Az alkalmazás kezdőoldala</figcaption>
        </figure>    
        <hr>


        <h4>II. Az alkalmazás szolgáltatásai:</h4>
        <br>
        <figure class="figure">
            <img src="./img/index-features.png" alt="index page -> features" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">2. ábra – Az alkalmazás szolgáltatásai</figcaption>
        </figure>
        <br>
        <ul class="list-group mb-5">
            <li class="list-group-item"><strong>24/7 elérés</strong> - az oldal bármikor, bármilyen eszközről elérhető.</li>
            <li class="list-group-item"><strong>Az adatok védelme </strong> - A saját adataid védve vannak a felhasználói azonosításnak köszönhetően.</li>
            <li class="list-group-item"><strong>Változatos adatok</strong> - a szenzorok hőmérsékletet, páratartalnmat és légnyomást is mérnek.</li>
            <li class="list-group-item"><strong>Grafikonok</strong> - az adatok látványos grafikonokon is megtakinthetők.</li>
            <li class="list-group-item"><strong>Valós idejű adatok</strong> - ha egy adat bekerül az adatbázisba máris elérhetővé válik az oldalon.</li>
            <li class="list-group-item"><strong>Vészhelyzeti értékek</strong> - a beállított határokon kívül eső értékek ki vannak emelve.</li>
        </ul>
        <hr>


        <h4>III. Az alkalmazás felhasználói azonosítása:</h4>
        <br>
        <figure class="figure">
            <img src="./img/auth.png" alt="auth page" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">3. ábra – Az alkalmazás regisztrációs és bejelentkezési űrlapja</figcaption>
        </figure>
        <hr>
        <h4>IV. Adminisztrátori jogok!</h4>
        <br>
        <div class="container">
            <ol class="text-left mb-5">
                <li><strong>Összes adat monitorizálása</strong></li>
                <li><strong>Felhasználók szenzorainak kezelése</strong></li>
                <li><strong>Szenzorok bellálításainak és tulajdonosának módosítása.</strong></li>
            </ol>
        </div>

        <h5>IV. –  1. Összes adat monitorizálása (Latest Data menüpont)</h5>
        <br>
        <figure class="figure">
            <img src="./img/admin-data.png" alt="admin-data" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">4. ábra – Az összes szenzor összes adata kilistázva, mindig a legutolsó adattal legfelül. Az oldalon lapozni is lehet</figcaption>
        </figure> 
        <P>A "View Details" gombra kattintva pedig részletesebben megnézhetjük az adott mérést.</P>
        <figure class="figure">
            <img src="./img/admin-data-show.png" alt="admin-data-show" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">5. ábra – A mérés részletes áttekintője</figcaption>
        </figure> 
        <br>
        <br>

        <h5>IV. – 2. Felhasználók szenzorainak kezelése (Users menüpont)</h5>
        <br>
        <figure class="figure">
            <img src="./img/admin-users.png" alt="admin-users" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">6. ábra – Az összes felhasználó kilistázva a szenzoraiknak a számával.</figcaption>
        </figure> 
        <p>A "View" gombra kattintva a kiválasztott felhasználó szenzorait tekinthetjük meg.</p>
        <br>

        <h5>IV. – 3. Szenzorok bellálításainak és tulajdonosának módosítása (Sensors menüpont)</h5>
        <br>
        <figure class="figure">
            <img src="./img/admin-sensors.png" alt="admin-sensors" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">7. ábra – Az összes szenzor kilistázva</figcaption>
        </figure> 
        <br>
        <br>
        <p>Az "Add Sensors" gombra kattintva új senzort adhatunk hozzá az adatbázishoz</p>
        <figure class="figure">
            <img src="./img/admin-sensors-add.png" alt="admin-sensors-add" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">8. ábra – A szenzor hozzáadásának űrlapja</figcaption>
        </figure> 
        <p>A "View Details" gombra kattintva pedig a kiválasztott szenzor beállításait és legutóbbi adatait tekinthetjük meg.</p>
        <figure class="figure">
            <img src="./img/admin-sensors-show.png" alt="admin-sensors-show" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">9. ábra – A szenzor beállításai és legutóbbi adatai.</figcaption>
        </figure> 

        <p>Az "Edit Settings" gombra kattintva a kiválasztott szenzor beállításait módosíthatjuk.</p>
        <figure class="figure">
            <img src="./img/admin-sensors-edit.png" alt="admin-sensors-edit" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">10. ábra – A szenzor beállításait módosító űrlap</figcaption>
        </figure> 
        <p>Az admin itt módosíthatja a szenzor tulajdonosát.</p>
        <hr>

        <h4>V. felhasználói jogok!</h4>
        <br>

        <div class="container">
            <ol class="text-left mb-5">
                <li><strong>A saját adatok monitorizálása</strong></li>
                <li><strong>A saját szenzorok bellálításainak módosítása.</strong></li>
                <li><strong>A saját adatok grafikonos áttekintése</strong></li>
            </ol>
        </div>    
        <figure class="figure">
            <img src="./img/index-user-welcome.png" alt="index-user-welcome" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">11. ábra – A felhasználók által látott oldal belépéskor</figcaption>
        </figure> 
        <br>
        <br>
        <h5>V. –  1. A saját adatok monitorizálása (Latest Data menüpont)</h5>
        <br>
        <figure class="figure">
            <img src="./img/user-data.png" alt="user-data" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">12. ábra – A saját adatok kilistázva, mindig a legutolsó adattal legfelül. Az oldalon lapozni is lehet</figcaption>
        </figure> 
        <p>A "View Details" gombra kattintva pedig részletesebben megnézhetjük az adott mérést hasonlóan az adminokhoz.</p>
        <br>

        <h5>V. – 2. A saját szenzorok bellálításainak módosítása (My Sensors menüpont)</h5>
        <br>
        <figure class="figure">
            <img src="./img/user-sensors.png" alt="user-sensors" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">13. ábra – A saját szenzorok kilistázva</figcaption>
        </figure> 
        <p>A "View Details" gombra kattintva pedig részletesebben megnézhetjük a senzor beállításait és onnan pedig az "Edit sensors" menüpont a beállításokat modosító űrlapra irányít minket.</p>
        <br>
        <figure class="figure">
            <img src="./img/user-sensors-edit.png" alt="user-sensors-edit" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">14. ábra – A szenzor adatait módosÍtó űrlap.</figcaption>
        </figure> 
        <p>A felhasználó ternmészetesen nem tudja a szenzor tulajdonosát módosítani. <br> 
            Megfigyelhető, hogy beállíthatőak határok amik azt jelzik, hogy számunkra milyen skálán mozgó értékek a megfelelőek. A nem megfelelő adatok kiemelve jelennek meg. (Lásd. 4. ábra, 5. ábra, 12. ábra) <br> 
            Az itt beállított szín a grafikonon való megjelenéshez szükséges.  
         </p>
        <br>

        <h5>V. – 3. A saját adatok grafikonos áttekintése (Charts menüpont)</h5>
        <br>
        <p>Ennél a menüpontnál kiválaszthatjuk, hogy milyen napi adatokat és ezeket melyik szenzorainkról szerentnénk látni.</p>
        <figure class="figure">
            <img src="./img/user-charts-filter.png" alt="user-charts-filter" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">15. ábra – A grafikonok adatainak módosítását biztosító űrlap</figcaption>
        </figure> 
        <br>
        <br>
        <figure class="figure">
            <img src="./img/user-charts-temp.png" alt="user-charts-temp" class="figure-img img-fluid rounded border">
            <figcaption class="figure-caption">16. ábra – A hőmérséklet-változást mutató grafikon a kiválasztott napra</figcaption>
        </figure> 
        <p>Az oldalon tekinthető meg a kiválasztott napi páratartalom- és légnyomás-változást mutató grafikon is.</p>

    </div>
