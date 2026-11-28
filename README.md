# lamp

Simple LAMP stack on Portainer demo, made for Bazzite / Podman.

## 1. Prepare `www` and `index.php`

On your Bazzite host, create the directory and copy `index.php` into it (or pull your repo and copy `www/index.php` to `/var/home/$USER/lamp/www/index.php`):

```bash
mkdir -p "/var/home/$USER/lamp/www"
cp www/index.php "/var/home/$USER/lamp/www/index.php"
```

## 2. Portainer stack environment variables

In Portainer under the `lamp` stack's **Environment variables**, add:

```env
WWW_HOST_PATH=/var/home/your_user/lamp/www
HTTP_PORT=8080
MYSQL_ROOT_PASSWORD=mysql_root_secure_password
MYSQL_DATABASE=lamp
MYSQL_USER=mysql_user
MYSQL_PASSWORD=mysql-user_password
```

## 3. Sync across GitHub, Gitea, and GitLab with `lampsync`

Keep your local repository backed up and synchronized across GitHub (`origin`), self-hosted Gitea (`gitea`), and GitLab (`gitlab`) so no single remote failure leaves you behind.

1. **Link `lampsync` into `~/.local/bin`:**
   ```bash
   ln -sfn "$HOME/Code/lamp/scripts/lampsync" "$HOME/.local/bin/lampsync"
   ```

2. **Confirm the symlink:**
   ```bash
   ls -l "$HOME/.local/bin/lampsync"
   ```

3. **Run `lampsync`:**
   ```bash
   lampsync
   ```

By default (`both`), `lampsync` pulls and merges from `origin`, `gitea`, and `gitlab`, pushes `main` to all three remotes, and syncs `www/` and `scripts/` to `$HOME/lamp/`. You can also target a single remote to pull from (`lampsync origin`, `lampsync gitea`, or `lampsync gitlab`).

If you have uncommitted edits, `lampsync` pauses and prints exact commands to commit or `git stash` them first.
