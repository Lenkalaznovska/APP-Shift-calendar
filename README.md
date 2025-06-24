# 🗓️ Plánovač směn pro zaměstnance

Ukázkový projekt z mého portfolia – jednoduchá webová aplikace pro přehledné plánování směn zaměstnanců v restauraci.  

👉 [Zobrazit online verzi projektu](http://smeny.wz.cz:8080)

---

## 🧾 Popis projektu

Plánovač směn je praktická aplikace určená pro interní potřeby restaurace nebo bistra, která umožňuje přehledné rozvrhování směn jednotlivých zaměstnanců.  
Zaměstnanci jsou rozděleni do sekcí a vizuálně barevně odlišeni pro lepší orientaci. Aplikace je lokalizovaná do češtiny a přístupná z mobilních zařízení.

---

## 🛠️ Použité technologie

### 💻 Frontend

- **HTML5** – struktura stránky  
- **CSS3** – stylování a vzhled  
- **JavaScript** – interaktivní funkce (např. práce s kalendářem, AJAX)  
- **FullCalendar.js** – interaktivní kalendář pro zobrazení a správu směn

### 🔙 Backend

- **PHP (procedurální)** – zpracování požadavků a napojení na databázi  
- **MySQL** – ukládání informací o směnách

### 🧰 Vývojové nástroje

- **AJAX (fetch API)** – dynamická komunikace mezi frontendem a backendem  
- **XAMPP** – lokální vývojové prostředí s Apache, MySQL a PHP  
- **Apache** – webový server pro PHP aplikace

---

## ✨ Funkce aplikace

- ✅ Zobrazení směn ve formátu dne, týdne i měsíce  
- ✅ Přidávání nové směny (výběr zaměstnance, datum, poznámka)  
- ✅ Barevné rozlišení zaměstnanců pro lepší přehlednost  
- ✅ Detailní přehled směn v modálním okně po kliknutí na den  
- ✅ Mazání směny chráněné jednoduchým heslem  
- ✅ Ošetření duplicit – nelze přidat stejnou směnu 2× pro jednoho zaměstnance  
- ✅ Kompletní lokalizace do češtiny  
- ✅ Intuitivní a jednoduché ovládání vhodné i pro méně zkušené uživatele

---

## 🔒 Poznámka k heslu

Mazání směn je chráněno jednoduchým heslem `12345` – slouží pouze pro demonstrační účely.

---

## 📱 Responzivita a přístupnost

Aplikace je optimalizována pro:

- 🖥️ stolní počítače a notebooky  
- 📱 mobilní zařízení (chytré telefony, tablety)

---

## 🛢️ Databázová tabulka

```sql
CREATE TABLE shifts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  shift_date DATE NOT NULL,
  note TEXT,
  color VARCHAR(7),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

![image](https://github.com/user-attachments/assets/f1030afa-04d5-49df-b32b-ac2797e79c34)

![image](https://github.com/user-attachments/assets/ed2ea27d-45ce-4fb5-b9fb-ba21b91fed42)
