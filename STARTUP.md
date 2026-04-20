# Hewlett Computer Service — Startup Guide

## Requirements

- PHP 8.1+ (with PDO, PDO_MySQL extensions)
- MySQL 8.0+
- Node.js 18+ (for CSS build only)

---

## 1. Install Node dependencies (one-time)

```bash
npm install
```

## 2. Build Tailwind CSS

```bash
npm run build
```

To watch for changes during development:

```bash
npm run watch
```

---

## 3. Set up config (one-time)

```bash
cp public_html/config/config.sample.php public_html/config/config.php
# Edit config.php and fill in DB credentials + SMTP settings
```

---

## 4. Import database (one-time)

```bash
mysql -u root -p your_database < sql/schema.sql
```

Or import via phpMyAdmin.

---

## 5. Run local PHP server

```bash
php -S localhost:8080 -t public_html public_html/index.php
```

Then open: **http://localhost:8080**

> **Note:** The `-t public_html` flag sets the document root.
> All routes go through `public_html/index.php` (front controller).

---

## Quick reference

| Command | Purpose |
|---|---|
| `npm install` | Install Tailwind CSS (one-time) |
| `npm run build` | Compile CSS (minified) |
| `npm run watch` | Auto-recompile CSS on save |
| `php -S localhost:8080 -t public_html public_html/index.php` | Start dev server |

---

## Notes

- **No config.php = blank page.** Copy the sample and fill in credentials.
- **PHPMailer stubs** are in `lib/PHPMailer/` — emails log to `error_log` until you replace stubs with real files from [github.com/PHPMailer/PHPMailer](https://github.com/PHPMailer/PHPMailer) (`src/` folder).
- **Images** load from Unsplash CDN — internet connection required in development.
