# Przetwarzanie tekstu – Symfony

Ten projekt to prosta aplikacja webowa napisana w Symfony, która:

- umożliwia przesyłanie pliku `.txt`,
- miesza litery w środku każdego wyrazu (pierwsza i ostatnia litera pozostają bez zmian),
- generuje nowy plik tekstowy do pobrania.

---

## Wymagania

- PHP 8.1 lub wyższy  
- Composer  
- Symfony CLI  
- Webserwer lokalny (`symfony serve` lub np. XAMPP)  

---

##  Instalacja i uruchomienie

1. **Sklonuj repozytorium lub skopiuj projekt**
   ```
   git clone <adres-repozytorium>
   cd text_shuffle
   ```

2. **Zainstaluj zależności**
   ```
   composer install
   ```

3. **Utwórz folder na pliki wyjściowe**
   ```
   mkdir -p public/uploads
   ```

4. **Uruchom serwer Symfony**
   ```
   symfony serve
   ```

5. **Otwórz przeglądarkę** i wejdź na:
   ```
   http://127.0.0.1:8000
   ```

---

## Jak to działa?

- Prześlij plik `.txt` zawierający tekst.
- Aplikacja przetworzy zawartość, mieszając litery w środku każdego słowa.
- Na końcu możesz pobrać gotowy plik z wynikiem.

---

## Do zrobienia (TODO)

- Dodanie testów jednostkowych
- Obsługa języków innych niż polski
- Interfejs graficzny z użyciem Bootstrapa

