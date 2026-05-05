# Clickable Links

[![Latest Version on Packagist](https://img.shields.io/packagist/v/francescobruno-cmv/clickable-links.svg?style=flat-square)](https://packagist.org/packages/francescobruno-cmv/clickable-links)
[![Total Downloads](https://img.shields.io/packagist/dt/francescobruno-cmv/clickable-links.svg?style=flat-square)](https://packagist.org/packages/francescobruno-cmv/clickable-links)
[![License](https://img.shields.io/packagist/l/francescobruno-cmv/clickable-links.svg?style=flat-square)](LICENSE.md)

Una libreria PHP leggera che converte automaticamente **URL**, **indirizzi email**, **link FTP** e **handle Skype** presenti in una stringa di testo in tag HTML anchor cliccabili (`<a href="...">`).

---

## ✨ Features

- ✅ Converte URL con protocollo (`http://`, `https://`, ecc.)
- 🌐 Converte URL `www.` e `wap.` anche senza protocollo
- 📁 Converte link `ftp.` con protocollo corretto
- 📧 Converte indirizzi email in link `mailto:`
- 💬 Supporta handle **Skype** (`skype:username`)
- 🔓 Gestisce automaticamente le **HTML entities** in input
- 🔗 Tutti i link si aprono in **nuova scheda** (`target="_blank"`)
- ⚡ Zero dipendenze — PHP puro, nessun pacchetto esterno

---

## 📦 Installazione

Installa il pacchetto tramite Composer:

```bash
composer require francescobruno-cmv/clickable-links
```

## ⚙️ Requisiti

- PHP >= 7.4

---

## 🚀 Utilizzo

```php
use FrancescoBrunoCmv\ClickableLinks\Linkifier;

$text = "Visita https://example.com o scrivici a info@example.com";

echo Linkifier::process($text);
// Visita <a href="https://example.com" target="_blank">https://example.com</a>
// o scrivici a <a href="mailto:info@example.com" target="_blank">info@example.com</a>
```

---

## 🔍 Pattern riconosciuti

| Pattern | Esempio input | href generato |
|---|---|---|
| URL con protocollo | `https://example.com/page` | `https://example.com/page` |
| URL HTTP | `http://example.com` | `http://example.com` |
| URL WWW | `www.example.com` | `http://www.example.com` |
| URL WAP | `wap.example.com` | `http://wap.example.com` |
| URL FTP | `ftp.example.com` | `ftp://ftp.example.com` |
| Email | `user@example.com` | `mailto:user@example.com` |
| Email con prefisso | `mailto:user@example.com` | `mailto:user@example.com` |
| Skype | `skype:username` | `skype:username` |

---

## 📝 Esempi

```php
// URL HTTPS
Linkifier::process("Visita https://example.com");
// → Visita <a href="https://example.com" target="_blank">https://example.com</a>

// WWW senza protocollo
Linkifier::process("Vai su www.example.com");
// → Vai su <a href="http://www.example.com" target="_blank">www.example.com</a>

// Email
Linkifier::process("Scrivi a hello@example.com");
// → Scrivi a <a href="mailto:hello@example.com" target="_blank">hello@example.com</a>

// Skype
Linkifier::process("Chiamami su skype:myusername");
// → Chiamami su <a href="skype:myusername" target="_blank">skype:myusername</a>

// Contenuto misto
Linkifier::process("Sito: www.example.com | Email: info@example.com | FTP: ftp.example.com");
// → Tutti e tre convertiti in anchor tag cliccabili
```

---

## 🤝 Contributi

Le contribuzioni sono benvenute!

1. Fai fork del progetto
2. Crea un branch (`feature/nome-feature`)
3. Commit delle modifiche
4. Push sul branch
5. Apri una Pull Request

---

## 📄 Licenza

Questo pacchetto è distribuito sotto licenza MIT.  
Vedi il file `LICENSE.md` per maggiori dettagli.

---

## 👤 Autore

**Francesco Bruno**

---

## ⭐ Supporto

Se il pacchetto ti è utile, lascia una ⭐ su GitHub!
