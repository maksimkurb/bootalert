BootAlert
=========

This package designed specially (but can be reconfigured) for Bootstrap 3 and Laravel 4 and will allow you to add system notifications for the user in queue from which they will be removed after display to the user.

## Package installation:

Modify your composer.json to match this:
```json
{
    "require": {
        ...
        "maksimkurb/bootalert": "dev-master"
    }
}
```
and run in terminal this command:
``` composer update ```

Next, you should add these rows to your ``` config/app.php ```
```php
    ...
	'providers' => array(
	    ...
        'Maksimkurb\BootAlert\BootAlertServiceProvider',
    ),
    ...

	'aliases' => array(
	   ...
       'BootAlert' => 'Maksimkurb\BootAlert\BootAlert',
	),
	...
```

By default, this plugin already configured to use it with Twitter Bootstrap 3, but you can edit configuration as you like.

To publish config files run:
``` php artisan config:publish maksimkurb/bootalert ```

## Using

### Add alerts to user session

To add new alert to user session run:
```php
    BootAlert::add($type, $message, $dismissable=true);
```
Where $type - type of alert (for BS3 they are: success, info, warning, danger), see configuration
Where $message - your message
Where $dismissable - boolean, true = alert dismissable; false - alert static

Also you can add validators to BootAlerts:
```php
    BootAlert::addValidator($type, $validator, $dismissable=true);
```
This function add all validator errors to user session and can be displayed after. For now, BootAlert couldn't use per-alert type - you can choose only one for all validator messages (or parse they with ``` BootAlert::add(...) ``` by hands)

### Display alerts to user

You can get HTML code with all alerts of user as follows:
```php
BootAlert::display();
```
*NOTE*: This function return alerts only once, so after their displaying, they will removed from alerts array and you shouldn't care about old alerts removing.