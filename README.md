Todo List for Magento 2
=======================

An example magento 2 module for demostration purposes.

Usage
------

Add this repository to composer.json:

```json
...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/ikeberlein/ChallengesTodo"
        }
    ],
...
```

Sitting in magento site root, install module with composer:

```bash
$ composer require challenges/module-todo=dev-master
```

After the module is installed, run magento setup upgrade:

```bash
$ php bin/magento setup:upgrade
```

Open http://your-magento-site-url.dev/challenges/todo in your browser.
