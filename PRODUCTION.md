# PRODUCTION GUIDE — software-house style workflow

No shortcuts. This is how the site goes from laptop to production, the proper way.

## The 4 phases

### Phase 1 — Git + GitHub (version control)
Software house ka pehla usool: **bina git ke koi kaam nahi.**
```bash
cd php-site
git init
git add .
git commit -m "Initial production-ready site"
# GitHub par repo banao (github.com/new), phir:
git remote add origin https://github.com/TUMHARA-USERNAME/zain-tech-site.git
git branch -M main
git push -u origin main
```
`.env` kabhi push nahi hogi (`.gitignore` check karo) — sirf `.env.example` jayegi.

> `.gitignore` banao:
> ```
> .env
> messages/
> ```

### Phase 2 — Docker (local par test)
```bash
cp .env.example .env
# .env mein strong passwords likho!
docker compose up -d --build
```
Kholo: `http://localhost:8080` — site + MySQL dono containers mein.
Band: `docker compose down` (data `db_data` volume mein safe rehta hai)

### Phase 3 — EC2 par production deploy
EC2 (Ubuntu) par ek dafa:
```bash
sudo apt update && sudo apt install -y docker.io docker-compose-plugin git
sudo usermod -aG docker ubuntu   # phir logout/login
git clone https://github.com/TUMHARA-USERNAME/zain-tech-site.git /opt/zain-site
cd /opt/zain-site
cp .env.example .env && nano .env   # strong passwords!
docker compose up -d --build
```
Security group: HTTP (80) sab ke liye. App `8080` par hai —
production mein reverse proxy (nginx) ya port 80 mapping lagao:
`ports: ["80:80"]` karke `docker compose up -d --build` dobara.

### Phase 4 — CI/CD (push = auto deploy)
GitHub repo → Settings → Secrets → Actions mein ye 3 secrets:
- `EC2_HOST` — EC2 ka public IP
- `EC2_USER` — `ubuntu`
- `EC2_SSH_KEY` — poori .pem file ka text

Ab `git push` karte hi `.github/workflows/deploy.yml` EC2 par
code pull karke containers rebuild kar dega. **Yehi asli CI/CD hai.**

## Production checklist (no shortcuts)
- [ ] `.env` mein strong passwords, kabhi git mein nahi
- [ ] `admin-messages.php` ka `ADMIN_PASSWORD` set hai
- [ ] Security group: sirf 80/443 open, SSH (22) sirf tumhari IP se
- [ ] CloudWatch: CPU > 80% par alarm (AWS console → CloudWatch → Alarms)
- [ ] Backups: `db_data` volume ka weekly snapshot / mysqldump cron
- [ ] `docker compose ps` — dono containers `healthy`/`running`
- [ ] Kaam khatam: instance **Stop** (billing ka khayal!)

## Kya kahan hai
| File | Kaam |
|---|---|
| `Dockerfile` | PHP 8.2 + Apache image, pdo_mysql ke sath |
| `docker-compose.yml` | App + MySQL, healthcheck, data volume |
| `.env.example` | Secrets ka template (`.env` khud banao) |
| `.github/workflows/deploy.yml` | Push → EC2 auto-deploy pipeline |
| `database.sql` | Table schema; compose pehli dafa auto-chalata hai |
| `includes/db.php` | PDO connection, env se config |
