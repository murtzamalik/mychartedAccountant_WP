# My Chartered Accountants — WordPress

Custom **MCA** theme (Figma V1) for My Chartered Accountants (Dublin).

## Deploy on Vercel (client preview)

This repo follows the [ServerlessWP / Vercel WordPress template](https://vercel.com/templates/other/serverless-wordpress).

### One-click from GitHub

1. Push this repo to GitHub (already: `murtzamalik/mychartedAccountant_WP`).
2. Open Vercel → **Add New Project** → import `mychartedAccountant_WP`.
3. During setup, attach a **private Vercel Blob** store (for SQLite + media), same as the [ServerlessWP deploy button](https://vercel.com/new/clone?repository-url=https%3A%2F%2Fgithub.com%2Fmitchmac%2Fserverlesswp&stores=%5B%7B%22type%22%3A%22blob%22%2C%22access%22%3A%22private%22%2C%22envVarPrefix%22%3A%22SQLITE%22%7D%5D&env=SERVERLESSWP_STREAM_PROVIDER,SERVERLESSWP_STREAM_VERCEL_ACCESS&envDefaults=%7B%22SERVERLESSWP_STREAM_PROVIDER%22%3A%22vercel-blob%22%2C%22SERVERLESSWP_STREAM_VERCEL_ACCESS%22%3A%22private%22%7D).
4. Set env vars (leave as defaults if prompted):
   - `SERVERLESSWP_STREAM_PROVIDER` = `vercel-blob`
   - `SERVERLESSWP_STREAM_VERCEL_ACCESS` = `private`
5. Deploy → open the Vercel URL → complete WordPress install.
6. **Appearance → Themes** → activate **MCA — My Chartered Accountants**.
7. Optional: visit `/?mca_seed=1` while logged in as admin to seed pages/menus.

### CLI deploy

```bash
npm install
npx vercel
```

Link the project, ensure Blob store is connected, then `npx vercel --prod`.

> **Note:** ServerlessWP + SQLite is experimental and best for staging / light marketing sites. Some plugins behave better on classic MySQL hosting (SiteGround, etc.). Local Docker (below) remains the full MySQL workflow.

## Local Docker (MySQL)

```bash
cp .env.example .env
docker compose up -d
```

Open http://localhost:8080 → install WP if needed → activate **MCA**.

Theme path (single source of truth): `wp/wp-content/themes/mca`

## Repo layout

| Path | Purpose |
|------|---------|
| `api/` | Vercel / Netlify serverless handlers |
| `vercel.json` | Routes WordPress through ServerlessWP |
| `wp/` | WordPress core + themes/plugins |
| `wp/wp-content/themes/mca/` | Custom MCA theme |
| `docker-compose.yml` | Local WordPress + MySQL |
| `docs/EXPORT.md` | Classic hosting export/import (AIO Migration) |

## Theme

- Design: Figma V1 — [MCA (Copy)](https://www.figma.com/design/L23uHOzHbq8c9B6p4tqW9J/MCA--Copy-)
- Brand: navy `#0a1128`, gold `#c5a880`, cream `#fdfbf8`

## License

WordPress / ServerlessWP components retain their upstream licenses (GPL). MCA theme code is project-owned.
