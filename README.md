# Lara Settings

![](https://s6.uupload.ir/files/resize_github.comamirsahra_q18f.jpg)

## About lara settings

This package allows you to put your desired settings in a repository (currently only a database) and easily access those values with the help of Facad in any part of the code.

This package can be used for things like registering your application, whether a feature is active or inactive, the title of different site pages, and so on.

## Requirements
- php >= 7
- laravel >= 5.5

## Installation
Install the package through  [Composer](http://getcomposer.org/).
Run the Composer require command from the Terminal :
```gradle
composer require amirsahra/lara-settings
```
If for some reason you want manually control this :
- Add the package to the "require" in composer.json 
```gradle
{
    "require": {
        "amirsahra/lara-settings": "^1"
    }
}
```
- Now we run the following command to install the package
```gradle
composer install
```

- Add the following class to the providers array in config/app.php :
```gradle
 \Amirsahra\LaraSetting\Providers\LaraSettingServiceProvider::class,
```
- And optionally add a new line to the aliases array :
```gradle
 'LaraSettings' => \Amirsahra\LaraSetting\Facades\LaraSetting::class
```

You should publish the migration and the config/Larasetting.php config file with :
```gradle
php artisan vendor:publish --provider="Amirsahra\LaraSetting\Providers\LaraSettingServiceProvider" --tag=lara-settings
```
To determine the name of the table related to your settings, you can get its name with a key in the .env file or it can be set by default from the config file.
```gradle
LARA_SETTING_DRIVER=lara_settings
```
#### Configurations
The file config/larasetting.php contains an array of configurations, you can find the default configurations in there.

To determine the storage drive, you must set the value of the driver to the value that we currently only have for storage in the database.
```gradle
  'driver' => env('LARA_SETTING_DRIVER', 'database'),
```
One of the features of this package is the ability to add a default value in such a way that you first set the value of this index to the true value.
```gradle
'default_settings_feature' => true,
```
And finally, we enter the desired default settings into the sample template.
```gradle
'default_settings_contents'=>[
        [
			'name' => 'site_name',
			'value' => 'amirsahra', 
			'description' => 'nothing -_-',
			'is_active' => true
		],
    ]
```
In this way, you can enter any number of default settings

 #### Finally
After the config and migration have been published and configured, you can create the tables for this package by running:
```gradle
php artisan migrate
```
## Usage

You can either use the facade LaraSetting.
```gradle
# Get setting value only with its name
LaraSetting::get('setting name');

# Get setting fields with its name, 
# If item is not set, it will return all the items of that setting.
# To get all settings, we use this function without parameters.
LaraSetting::find('setting name','item name');

#To create a setting, a setting can be created using this function
# And two mandatory values, name and value.
# Description and is_active values are optional.
LaraSetting::set('setting name','value');

#If you want to check the existence of a setting, 
# you can find out its existence by its name and the following function.
LaraSetting::has('setting name');

#Editing a setting is the same as creating it.
# If there is no setting with this name, it will create it.
LaraSetting:: edit('setting name','vaule');

# Delete a setting with its name and following function
LaraSetting::delete('setting name');
```

#### Complete example :

```gradle
LaraSetting::get('site_title');
# result : "github"

LaraSetting::find('site_title','is_active');
# result : 1

LaraSetting::find('site_title');
# result : [
	"id" => 1,
	"name" => "site_title",
	"value" => "github",
	"description" => "nothing -_-",
	"is_active" => 1,
	"created_at" => "2022-07-21 07:15:44",
	"updated_at" => "2022-07-21 07:15:44",
]

LaraSetting::find();
# result : all settings in array

LaraSetting::set('site_title','github');
# result : [
	"id" => 1,
	"name" => "site_title",
	"value" => "github",
	"description" => "",
	"is_active" => 1,
	"created_at" => "2022-07-21 07:15:44",
	"updated_at" => "2022-07-21 07:15:44",
]

LaraSetting::set('site_title','github','this is my site title',true);
# result : [
	"id" => 1,
	"name" => "site_title",
	"value" => "github",
	"description" => "this is my site title",
	"is_active" => 1,
	"created_at" => "2022-07-21 07:15:44",
	"updated_at" => "2022-07-21 07:15:44",
]

LaraSetting::has('github');
# result : 1 

LaraSetting:: edit('site_title','laravel');
# result : [
	"id" => 1,
	"name" => "site_title",
	"value" => "laravel",
	"description" => "",
	"is_active" => 1,
	"created_at" => "2022-07-21 07:15:44",
	"updated_at" => "2022-07-21 07:15:44",
] 

LaraSetting::delete('site_title');
# result : true
```

## License

[MIT](https://choosealicense.com/licenses/mit/)
