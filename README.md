# News web portal

This project lets you create your own news portal.

## Requirements

* PHP 7.0+
* one of [this list](https://www.codeigniter.com/user_guide/general/requirements.html)
* `composer` command
* bower

## How to Use

### Install 
```
$ composer install
$ bower install
```

### Database Configuration
[Follow this guide](https://www.codeigniter.com/userguide3/database/configuration.html)


### Run migrations
[Follow this guide](https://www.codeigniter.com/userguide3/libraries/migration.html)

### Populate with some data

```sql
INSERT INTO `source` (`id`, `name`, `url`) VALUES
(1, 'Reuters', 'http://feeds.reuters.com/Reuters/worldNews'),
(2, 'BBC', 'http://feeds.bbci.co.uk/news/video_and_audio/world/rss.xml'),
(3, 'Standard News', 'http://www.standartnews.com/rss.php?p=1');
```

### Run PHP built-in server

```
$ sh bin/server.sh
```

## Reference

* [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [Bower Installation](https://bower.io/#install-bower)
