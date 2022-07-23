<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default lara Setting Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default lara setting connection that gets used while
    | using this appSetting library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
    | Supported: "database", (coming soon "json","redis")
    |
    */
    'driver' => env('LARA_SETTING_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Lara Setting Package Namespace
    |--------------------------------------------------------------------------
    |
    | This option is for creating dynamic objects from Core classes.
    | It depends on the value defined in the composer.
    |
    */
    'namespace' => "Amirsahra\\LaraSetting\\Core\\",

    /*
   |--------------------------------------------------------------------------
   | Lara Setting Stores
   |--------------------------------------------------------------------------
   |
   | Here you may define all the lara setting "stores" for your application as
   | well as their drivers.
   |
   */
    'stores' => [
        'database' => [
            'table_name' => 'lara_settings',
            'connection' => null,
        ],
        // (coming soon "json","redis")
    ],

    /*
    |--------------------------------------------------------------------------
    | Default lara Setting Feature
    |--------------------------------------------------------------------------
    |
    | You can put the default settings in this array,And by executing the
    | maceration of this package,The default values will be entered in the table.
    |
    */
    'default_settings_feature' => true,

    /*
    |--------------------------------------------------------------------------
    | Default lara Setting value
    |--------------------------------------------------------------------------
    |
    | By executing the migration command, these contents are entered into the
    | lara setting table
    |
    | * NOTICE *
    | For this feature to be active, you must set the value of 'default_settings'
    | equal to true.
    |
    | For example, you can follow the pattern below.
    | Note that the name and value indexes are mandatory and the rest are optional.
    |
    */
    'default_settings_contents'=>[
        ['name' => 'site_name', 'value' => 'amirsahra', 'description' => 'nothing -_-', 'is_active' => true],
    ]
];