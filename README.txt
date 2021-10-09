DOKUMENTACIJA ZA SAJT
_________________________
Nazvi projekta: PEZ
Verzija projekta: 1.0
Datum ažuriranja dokumentacije: 29.09.2021.

______________________________________
Pregled projekta:
 
Projekat PEZ predstavlja jednostavnu demonstraciju sajta za nagradnu igru. 
Kroz realizaciju projekta korištene su sledeće tehnologije:
- frontend: html5, css3, bootstrap5, javascript, jQuery
- backend: php, mySQL
Projekat je rađen i testiran lokalno, u wamp serveru. Razvijen je kao riješenje zadadatog testnog zadatka.

Projektni ciljevi:

Za ispravnu funkcionalnost sajta potrebno je da se korsnik prethodno registruje, popunjavanjem odogovarajuće forme.
Glavna karakteristika ovog sajta je skladištenje unesenih računa koji se koriste za nagradnu igru. 
Projekat treba da omogući potpun i validan unos svih relevantnih podataka. 

_________________________________________________________
Karakteristike:
1. Registracija korisnika
2. Prijava korisnika
3. Unos računa za nagradnu igru
4. Baze podataka
________________________________________________________
1. Registracija korisnika:

Korisnik započinje registraciju klikom na user ikonicu iz hedera. Forma za registraciju se sastoji od 
sledećih obaveznih polja: ime, prezime, mejl, adresa, telefon i šifra, kao i neobaveznog polja: nadimak. 
Prije čuvanja podataka provjeravamo da li su isti bezbjedni za skladištenje u bazu podataka. 
Pri uspješnoj registraciji šifra korisnika se enkriptuje prije čuvanja u bazu podataka 
radi dodatne sigurnosti nakon čega se korinik automatski prijavljuje na sajt. 

2. Prijava korisnika:

Prijava korisnika se vrši na osnovu mejla i šifre koju su kreirali prilikom registracije. 
Ukoliko se korisnik nije registrovao prethodno biće mu onemogućena prijava. 

3. Unos računa za nagradnu igru

Nakon uspješne prijave korinici imaju mogućnost unosa računa za nagradnu igru. Ukoliko nisi priavljeni nemaju mogćnost unose, 
te ime se ispod forme ispisuje tekst koji ih obavještava da se prijave, odnosno registruju na sajt. 
Pri unosu računa se popunjavaju dva obavezna polja:
- broj računa gdje im je onemogućen unos 2 ista računa
- datum i vrijeme čija je jedina prihvatljiva forma "dd/mm/gggg -00:00" 

4. Baze podataka

Podaci se cuvaju u dvije odvojene paze podataka: 
1) registracija
Registracija sadrzi tabelu "users" gdje se čuvaju podaci o registrovanim korisnicima. 
Sva unijeta polja se cuvaju u VARCHAR obliku. Šifra se cuva u svom enkriptovanom obliku.
2) test
Test sadrži tabelu "racuni", gdje se čuvaju podaci o registrovanim računima. Sva unijeta polja se cuvaju u VARCHAR obliku.

_________________________________________________________________

Dodatne informacije:
	Fajl inputbill.php sadrži kod za čuvanje računa, dok fajl server.php omogućava registraciju,
prijavu i praćenje prijavljene sesije. Dodatni fajl errors.php služi za lakši prikaz grešaka korisniku.
	Korištenje bootstrap biblioteke je realizovano preko apsolutne putanje online dostupne bibilioteke, 
Bootstrap5 verzije.
	U root folderu projekta su sadržene i dvije .sql datoteke koje predstavljaju izvezene baze podataka. 
Da bi sajt ispravno funckionisao potrebno je importovati date baze podataka: registracija.sql i test.sql. 
	Pristup bazama podataka se vrši preko naloga "root" bez šifre.
