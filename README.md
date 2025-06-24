🗓️ Plánovač směn pro zaměstnance

Ukázkový projekt z mého portfolia, který slouží jako webová aplikace pro přehledné plánování směn zaměstnanců v restauraci.
Projekt je dostupný online na adrese: 🔗 http://smeny.wz.cz:8080/

🔧 Použité technologie
HTML5, CSS3, JavaScript – klientská část aplikace

PHP (procedurální) – serverová logika

MySQL – databázová vrstva pro ukládání směn

FullCalendar.js – knihovna pro interaktivní kalendář

AJAX (fetch API) – dynamická komunikace s backendem

Responsivní design – použitelný na mobilních i desktopových zařízeních

✨ Co aplikace umí
✅ Zobrazit směny zaměstnanců podle dne, týdne nebo měsíce
✅ Přidávat nové směny výběrem zaměstnance, dne a poznámky
✅ Barevné odlišení jednotlivých zaměstnanců pro přehlednost
✅ Zobrazit detail dne v modálním okně po kliknutí
✅ Mazání směn po zadání jednoduchého hesla (např. pro vedoucího směny)
✅ Zabránění duplicitám – není možné přidat stejnou směnu pro jednoho zaměstnance ve stejný den
✅ Plná lokalizace do češtiny
✅ Přístupná i pro méně zkušené uživatele díky jednoduchému a intuitivnímu rozhraní

🧩 Struktura aplikace
index.php – hlavní soubor s HTML, PHP a JavaScriptem

style.css – stylování pro layout a komponenty

FullCalendar.js – napojený přes CDN

MySQL databáze – tabulka shifts pro ukládání směn

🛠️ Databázová tabulka (stručně)
CREATE TABLE shifts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  shift_date DATE,
  note TEXT,
  color VARCHAR(7)
);


🧑‍💻 Portfolio a ukázka práce
Tento projekt slouží jako demonstrační aplikace, která ukazuje:

jak pracuji s backendem (PHP, SQL)

jak zvládám logiku plánování a validaci dat

jak propojuji frontend s backendem přes AJAX

jak přistupuji k UX a přístupnosti

🔒 Poznámka k heslu
Mazání směn je chráněno jednoduchým heslem (12345) – pro účely ukázky.

📱 Responzivita a přístupnost
Aplikace je optimalizována pro:

stolní počítače i notebooky

mobilní zařízení (smartphony, tablety)

![image](https://github.com/user-attachments/assets/f1030afa-04d5-49df-b32b-ac2797e79c34)

![image](https://github.com/user-attachments/assets/ed2ea27d-45ce-4fb5-b9fb-ba21b91fed42)

