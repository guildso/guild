<p align="center">
    <a href="https://guild.so" target="_blank">
        <img src="https://imgur.com/i3r2bzX.png" width="400">
    </a>
</p>

<div align="center">
    <p>
	    <a name="stars"><img src="https://img.shields.io/github/stars/thedevdojo/guild?style=for-the-badge"></a>
	    <a name="forks"><img src="https://img.shields.io/github/forks/thedevdojo/guild?logoColor=green&style=for-the-badge"></a>
	    <a name="contributions"><img src="https://img.shields.io/github/contributors/thedevdojo/guild?logoColor=green&style=for-the-badge"></a>
	    <a name="madeWith"><img src="https://img.shields.io/badge/Made%20with-Markdown-1f425f.svg?style=for-the-badge"></a>
	    <a name="license"><img src="https://img.shields.io/github/license/thedevdojo/guild?style=for-the-badge"></a>
    </p>
</div>

## 👋 About Guild.so

Guild.so is an open-source self-hosted team management solution that integrates with the Solana blockchain and allows you to manage your team's members, projects, tasks and award Coins to your team members.

A guild is a group of people who are on a mission to complete a common goal. Your team is your guild, and this self-hosted solution will put the simplicity back into organizing a team.

Guild.so is a simple dashboard of company announcements, team member availability, and team member status. Keeping it simple, because managing your "management system" shouldn't be a task in itself.

## 🔨 Installation

Guild.so is based on Laravel 8 and Jetstream so you can run it just like a standard Laravel application. Here are 2 ways of running Guild.so:

## 💙 Running on DigitalOcean App Platform

We utilize the ["Deploy to DigitalOcean" Button](https://www.digitalocean.com/docs/app-platform/how-to/add-deploy-do-button) to deploy to the App Platform:

[![Deploy to DO](https://mp-assets1.sfo2.digitaloceanspaces.com/deploy-to-do/do-btn-blue.svg)](https://cloud.digitalocean.com/apps/new?repo=https://github.com/thedevdojo/guild/tree/main&refcode=dc19b9819d06)

> **NOTE: This repository contains a pre-generated application key stored in the `.do/deploy.template.yaml` YAML file. During the deployment make sure to generate a new App Key and use it instead of the dummy value!**

### ☁ DigitalOcean Spaces

You can utilize the DigitalOcean Spaces to store your static file uploads like profile pictures and etc.

In order to use Spaces make sure to add the following ENV variables:

```
DO_SPACES=true
DO_SPACES_KEY=YOUR_DO_SPACES_KEY
DO_SPACES_SECRET=YOUR_DO_SPACES_SECRET
DO_SPACES_ENDPOINT=YOUR_DO_SPACES_ENDPOINT
DO_SPACES_REGION=YOUR_DO_SPACES_REGION
DO_SPACES_BUCKET=YOUR_DO_SPACES_BUCKET
```

That way if you deploy to the DigitalOcean App platform, your uplodas will be stored to a persistant volume so you won't loose then during the next deploy.

## ✊ Manual Installation

You can use the LaraSail script to get your Linux server ready for Laravel 8:

https://github.com/thedevdojo/larasail

Once your server is up and running use `git clone` to clone the repositry and do a standard Laravel installation:

* Create a Database:

During the installation we need to use a MySQL database. You will need to create a new database and save the credentials for the next step.

* Update the `.env` file

Copy the `.env.example` file to `.env` and update your Database details in there:

```
APP_URL=http://guild.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=guild
DB_USERNAME=guild
DB_PASSWORD=guild_password
```

* Composer Install

```
composer install
```

* Install the NPM dependencies:

```
npm install && npm run dev
```

* Migrate Database

```
php artisan migrate
```

## 🧙‍♂️ Events and Queues (Optional)

By default Guild.so uses Laravel Events for the Slack and Discord Notifications.

To make things more optimal you can implement the `ShouldQueue` contact to the Notification Listeners so that the notifications are sent via a worker and not at the sime time when a user presses a button. To do that edit these two files:

* `app/Listeners/Notifications/DiscordNotification.php` and update the class to:

```
class DiscordNotification implements ShouldQueue
```

* `app/Listeners/Notifications/SlackNotification.php` and update the class to:

```
class SlackNotification implements ShouldQueue
```

After that you need to specify your queue driver to either `database` or `redis` in your ENV faile or the DigitalOcean App platform, if you decided to go for Redis make sure to update your Redis ENV variables as well!

Finally make sure to set the `php artisan queue:work` command to run at all times so that it could process your queues. If you are using the DigitalOcean App platform you can achieve this with a [Worker Component](https://www.digitalocean.com/docs/app-platform/concepts/worker/).

For more information about Laravel events check out this tutorial here:

**[Laravel Events](https://devdojo.com/course/laravel-events)**

## 🌪 Tails

Guild's frontend was built using **[Tails](http://devdojo.com/tails), a new `kick-ass` drag-and-drop TailwindCSS page builder**!

## 🕸️ Landing Page

A web page showcasing Guild.so:

https://guild.so

The web page was also built using [Tails](http://devdojo.com/tails).

## 👩‍💻 DevDojo Team

The DevDojo is a resource to learn all things web development and web design. Learn on your lunch break or wake up and enjoy a cup of coffee with us to learn something new.

Join this developer community, and we can all learn together, build together, and grow together.

[Join DevDojo](https://devdojo.com/)

For more information, please visit https://www.devdojo.com or follow [@thedevdojo](https://twitter.com/thedevdojo) on Twitter.

## 🤲 Contributing

If you are contributing 🍿 please read the [contributing file](https://github.com/thedevdojo/guild/blob/main/CONTRIBUTING.md) before submitting your pull requests.

## 🔐 Security Vulnerabilities

If you discover a security vulnerability within Guild.so, please send an e-mail to DevDojo's team via this for here [Support](https://devdojo.com/help). All security vulnerabilities will be promptly addressed.

## 📃 License

The Guild.so project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# Troubleshooting

In order to get the script `wallet.js` to execute successfully, you must cd into `./node_modules/@solana/spl-token` and run the following: `npm install --save @solana/web3.js`.