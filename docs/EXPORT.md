# Hosting export & import playbook

Use this after the local site is final and ready for the client’s hosting.

## Before export

1. Change the default admin password (`admin` / `admin123!`).
2. Update phone, email, WhatsApp, and address under content / MCA Settings.
3. Test Contact Form 7 mail (configure SMTP on hosting — local Docker will not send mail reliably).
4. Set **Settings → Permalinks** to Post name and save.

## Export (local Docker)

### Recommended: All-in-One WP Migration

1. WP Admin → **All-in-One WP Migration → Export → File**.
2. Save the `.wpress` file into the project `backups/` folder.
3. Keep a copy of `wp-content/themes/mca` as a zip for reference.

### Alternate: SQL + uploads

```bash
docker compose exec -T db mysqldump -uwordpress -pwordpress wordpress > backups/mca-$(date +%Y%m%d).sql
docker compose exec wordpress tar -czf /var/www/html/backups/uploads.tgz -C /var/www/html/wp-content uploads
cd wp-content/themes && zip -r ../../backups/mca-theme.zip mca
```

## Import (hosting)

1. Create MySQL database + user on the host.
2. Install a fresh WordPress (or use the host’s one-click installer).
3. Install **All-in-One WP Migration** → **Import** the `.wpress` file.
4. If using SQL instead: import dump, upload theme + `uploads`, then run search-replace for `http://localhost:8080` → production URL.
5. **Settings → Permalinks → Save**.
6. Force HTTPS / SSL and configure SMTP (e.g. WP Mail SMTP).
7. Hand over WP admin + hosting credentials + this guide.

## What the client can edit

| Area | Where |
|------|--------|
| Pages & copy | Pages |
| News | Posts |
| Navigation | Appearance → Menus |
| Contact form | Contact → Contact Forms |
| Site phone/email | MCA Settings (ACF) or theme defaults in code |
| Media | Media Library |
