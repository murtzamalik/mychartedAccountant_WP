# Deploy MCA on Vercel (ServerlessWP)

Repo: https://github.com/murtzamalik/mychartedAccountant_WP

Based on the [Vercel Serverless WordPress template](https://vercel.com/templates/other/serverless-wordpress).

## Option A — Vercel Dashboard (recommended)

1. Go to [vercel.com/new](https://vercel.com/new) and sign in with GitHub.
2. Import **`murtzamalik/mychartedAccountant_WP`**.
3. Under **Storage**, create / connect a **private Blob** store (for SQLite DB + uploads).
4. Environment variables:

| Name | Value |
|------|--------|
| `SERVERLESSWP_STREAM_PROVIDER` | `vercel-blob` |
| `SERVERLESSWP_STREAM_VERCEL_ACCESS` | `private` |

5. Click **Deploy**.
6. Open the deployment URL → WordPress install wizard.
7. WP Admin → **Appearance → Themes** → activate **MCA — My Chartered Accountants**.
8. While logged in as admin, open `https://YOUR-URL/?mca_seed=1` to seed pages, menus, and demo posts.
9. Send the Vercel URL to the client.

## Option B — CLI

```bash
cd /Users/murtazamalik/dev_env/MCA-website
npm install
npx vercel login
npx vercel
# After Blob is linked in the dashboard:
npx vercel --prod
```

## After deploy checklist

- [ ] Change admin password
- [ ] Activate MCA theme
- [ ] Run `?mca_seed=1` once
- [ ] Settings → Permalinks → Post name → Save
- [ ] Update phone/email/WhatsApp in content
- [ ] Forms: Contact Form 7 may need SMTP; SQLite has limits under heavy form traffic

## Local Docker still available

```bash
docker compose up -d
# http://localhost:8080
```

Theme source of truth: `wp/wp-content/themes/mca`

## Classic hosting (later)

Use `docs/EXPORT.md` + All-in-One WP Migration if the client moves to SiteGround / cPanel / MySQL hosting.
