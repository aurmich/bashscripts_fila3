<<<<<<< HEAD
**Edit a file, create a new file, and clone from Bitbucket in under 2 minutes**

When you're done, you can delete the content in this README and update the file with details for others getting started with your repository.

*We recommend that you open this README in another tab as you perform the tasks below. You can [watch our video](https://youtu.be/0ocf7u76WSo) for a full demo of all the steps in this tutorial. Open the video in a new tab to avoid leaving Bitbucket.*

---

## Edit a file

You’ll start by editing this README file to learn how to edit a file in Bitbucket.

1. Click **Source** on the left side.
2. Click the README.md link from the list of files.
3. Click the **Edit** button.
4. Delete the following text: *Delete this line to make a change to the README from Bitbucket.*
5. After making your change, click **Commit** and then **Commit** again in the dialog. The commit page will open and you’ll see the change you just made.
6. Go back to the **Source** page.

---

## Create a file

Next, you’ll add a new file to this repository.

1. Click the **New file** button at the top of the **Source** page.
2. Give the file a filename of **contributors.txt**.
3. Enter your name in the empty file space.
4. Click **Commit** and then **Commit** again in the dialog.
5. Go back to the **Source** page.

Before you move on, go ahead and explore the repository. You've already seen the **Source** page, but check out the **Commits**, **Branches**, and **Settings** pages.

---

## Clone a repository

Use these steps to clone from SourceTree, our client for using the repository command-line free. Cloning allows you to work on your files locally. If you don't yet have SourceTree, [download and install first](https://www.sourcetreeapp.com/). If you prefer to clone from the command line, see [Clone a repository](https://confluence.atlassian.com/x/4whODQ).

1. You’ll see the clone button under the **Source** heading. Click that button.
2. Now click **Check out in SourceTree**. You may need to create a SourceTree account or log in.
3. When you see the **Clone New** dialog in SourceTree, update the destination path and name if you’d like to and then click **Clone**.
4. Open the directory you just created to see your repository’s files.

Now that you're more familiar with your Bitbucket repository, go ahead and add a new file locally. You can [push your change back to Bitbucket with SourceTree](https://confluence.atlassian.com/x/iqyBMg), or you can [add, commit,](https://confluence.atlassian.com/x/8QhODQ) and [push from the command line](https://confluence.atlassian.com/x/NQ0zDQ).
=======
# Module User Fila3 🔥 Ultimate User, Roles & Permissions Manager for FilamentPHP 🚀

[![Latest Release](https://img.shields.io/github/v/release/laraxot/module_user_fila3)](https://github.com/laraxot/module_user_fila3/releases)
[![Build Status](https://img.shields.io/travis/laraxot/module_user_fila3/master)](https://travis-ci.org/laraxot/module_user_fila3)
[![Code Coverage](https://img.shields.io/codecov/c/github/laraxot/module_user_fila3)](https://codecov.io/gh/laraxot/module_user_fila3)
[![License](https://img.shields.io/github/license/laraxot/module_user_fila3)](LICENSE)

Manage users, roles, and permissions with lightning speed ⚡ through this Laravel module, fully integrated with FilamentPHP. Designed for developers who want **full control** over their user management systems. **Empower your app** with dynamic user access control and module assignments. 🚀

### Key Features 🌟
- **Create Super Admin in Seconds**: Instantly make any user a super admin with `php artisan user:super-admin`. 🛡️
- **Dynamic Module Assignment**: Control user access to specific modules through `php artisan user:assign-module`. 🎯
- **Complete Team Management**: Manage teams with simple commands like `php artisan team:create` and `php artisan team:assign-user`. 👥
- **Permissions that Fit**: Set flexible roles and permissions to fit your app’s unique needs! 🔑

---

### Installation Guide 💻

1. **Install the package via Composer:**
    ```bash
    composer require laraxot/module_user_fila3
    ```

2. **Run Migrations:**
    ```bash
    php artisan module:migrate User
    ```

3. **Publish Config File:**
    ```bash
    php artisan vendor:publish --tag="module_user_fila3-config"
    ```

4. **Create First User:**
    ```bash
    php artisan make:filament-user
    ```

---

### Supercharged Console Commands 🚀

Leverage powerful artisan commands to boost your app’s user management capabilities:

- **Create Super Admin:**
    ```bash
    php artisan user:super-admin
    ```
    _Transform any user into an all-powerful super admin!_

- **Assign Modules:**
    ```bash
    php artisan user:assign-module
    ```
    _Dynamically assign or restrict modules for specific users._

- **Manage Teams:**
    - Create a team:
        ```bash
        php artisan team:create
        ```
    - Assign a user to a team:
        ```bash
        php artisan team:assign-user
        ```

- **View Available Modules:**
    ```bash
    php artisan module:list
    ```
    _See all available modules and activate/deactivate them at will._

---

### Configuration 🔧

Easily configure the module in the `module_user_fila3.php` config file to suit your app's specific needs.

### FAQ ❓

- **Q: How do I assign roles?**
  A: Use the Filament interface or `php artisan user:assign-module` command to assign roles and modules.

- **Q: Can I manage teams?**
  A: Absolutely! Use `php artisan team:create` to create new teams and `php artisan team:assign-user` to add users.

### Contribute 💪

We 💖 open source! Want to improve this package? Fork the repo and submit a pull request.

---

### Author 👨‍💻

Developed and maintained by [Marco Sottana](https://github.com/marco76tv)  
📧 Email: marco.sottana@gmail.com

---

### License 📄

This package is open-sourced under the [MIT license](LICENSE).

---

Give your Laravel app the **edge** it deserves with **Module User Fila3**. Try it now! 💥


# Module users
Gestione degli utenti, ruoli, permessi tramite l'utilizzo di filament.

## Gestione degli utenti

![create_user](docs/img/create_user.jpg)
![set_password](docs/img/set_password.jpg)

## Gestione dei ruoli
![roles list](docs/img/roles_list.JPG)


## Aggiungere Modulo nella base del progetto
Dentro la cartella laravel/Modules

```bash
git submodule add https://github.com/laraxot/module_user_fila3.git User
```

## Verificare che il modulo sia attivo
```bash
php artisan module:list
```
in caso abilitarlo
```bash
php artisan module:enable User
```

## Eseguire le migrazioni
```bash
php artisan module:migrate User
```

## Creare il primo account
Dalla documentazione di filament utilizziamo:
```bash
php artisan make:filament-user
```
l'account non potrà visualizzare nulla nella dashboard di amministrazione, in quanto non avrà assegnato nessun ruolo.

## Rendere un account Super Admin
```bash
php artisan user:super-admin
```
Ora avete il vostro account Super Admin per poter iniziare.
Esso potrà accedere a tutti i moduli nell'amminstrazione.

## Assegnare un ruolo/modulo
```bash
php artisan user:assign-module
```
L'account potrà accedere al modulo assegnato.

## [Gestione dei Team](docs/teams.md)
>>>>>>> temp-branch
