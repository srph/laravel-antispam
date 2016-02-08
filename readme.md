## laravel-antispam
```bash
composer require srph/laravel-antispam
```
An antispam package for Laravel.

It provides a basic quiz for the registrant/guest to answer, effective for registration forms.

## Setup
Add the package to your list of `ServiceProvider`s and `Facade`s (located in `config/app.php`).
```php
return [
	'providers' => [
		// Your other providers...
		Srph\LaravelAntiSpam\AntiSpamServiceProvider::class
	],

	'facade' => [
		// Your other facades...
		'AntiSpam' => Srph\LaravelAntiSpam\Facade::class
	]
];
```

Publish the package.
```
artisan vendor:publish srph/laravel-antispam
```

Configure the package located in `config/packages/antispam/app.php`.

## Usage
Go to your form, then add the required inputs.
```blade
<form>
	<!-- Generates a hidden input -->
	{{ AntiSpam::getInput() }}

	<label>{{ AntiSpam::getQuestion() }}</label>

	<!-- This field can have any name -->
	<input type="text" name="antispam">
</form>
```

Add the validation rule `antispam` to the antispam input.
```php
$input = ['antispam' => Input::get('antispam')];
$rules = ['antispam' => 'required|antispam'];
Validator::make($input, $rules);
```

You should be good to go ;).