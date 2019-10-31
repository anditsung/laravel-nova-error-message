# Laravel Nova Error Message on Form

When throwing exception will display our actual message but only works on local environment and debug is true.
if using this on production environment and debug is false it will always showing Server Error

but on the other hand using ValidationException, it will show "There was a problem submitting the form."
and there is no way to show our message to the user ( as far as i know).

using this will ada new field on the form but only showing it when have error message.


## Installation
using packagist
```
composer require tsungsoft/error-message
```
using github repository add this on composer.json
```
"require": {
    "tsungsoft/error-message": "*"
}
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/anditsung/laravel-nova-error-message"
    }
],
```

## Usage

on Nova Resource
```
use Tsungsoft\ErrorMessage\ErrorMessage;

...

public function fields(Request $request)
{
    return [
        ...

        ErrorMessage::make('Error'),            // 'Error' -> must have the same value on ValidationException
        
        ...
    ];
}

...
```

on Model
```
...

private static function validationError($message)
{
    $messageBag = new MessageBag;
    $messageBag->add('error', __($message));    // 'error' -> must have the same value when creating the field on nova resource

    throw ValidationException::withMessages($messageBag->getMessages());
}

protected static function boot()
{
    parent::boot();

    static::creating(function($user) {

        ...

        self::validationError("You have an error");

        ...

    });

    static::updating(function($user) {
    
        ...

        self::validationError("You have an error");

        ...

    });
}

...

```

Create User<br>
<img src="https://github.com/anditsung/laravel-nova-error-message/blob/master/img/create%20user.png">

Update User<br>
<img src="https://github.com/anditsung/laravel-nova-error-message/blob/master/img/update%20user.png">

![create user](https://github.com/anditsung/laravel-nova-error-message/blob/master/img/create%20user.png)

![alt text](https://github.com/anditsung/laravel-nova-error-message/blob/master/img/update%20user.png)
