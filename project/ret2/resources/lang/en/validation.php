<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => ":attribute tiene que ser aceptado.",
	"active_url"           => ":attribute no es una URL válida.",
	"after"                => ":attribute tiene que ser después del día :date.",
	"alpha"                => ":attribute sólo puede contener letras.",
	"alpha_dash"           => ":attribute sólo puede contener letras, números y guiones.",
	"alpha_num"            => ":attribute sólo puede contener letras y números.",
	"array"                => ":attribute tiene que ser un array.",
	"before"               => ":attribute tiene que ser antes del día :date.",
	"between"              => [
		"numeric" => ":attribute tiene que ser entre :min y :max.",
		"file"    => ":attribute tiene que ser entre :min y :max kilobytes.",
		"string"  => ":attribute tiene que ser entre :min y :max caracteres.",
		"array"   => ":attribute tiene que ser entre :min y :max objetos.",
	],
	"boolean"              => "El campo :attribute tiene que ser true o false",
	"confirmed"            => "El campo de confirmación :attribute no coincide.",
	"date"                 => ":attribute no es una fecha válida.",
	"date_format"          => ":attribute no coincide con el formato :format.",
	"different"            => ":attribute y :other tienen que ser diferentes.",
	"digits"               => ":attribute tiene que ser de :digits dígitos.",
	"digits_between"       => ":attribute tiene que ser entre :min y :max dígitos.",
	"email"                => ":attribute tiene que ser una direcció de correo válida.",
	"filled"               => "El campo :attribute es obligatorio.",
	"exists"               => "El :attribute seleccionado es inválido.",
	"image"                => ":attribute tiene que ser una imagen.",
	"in"                   => "El :attribute seleccionado es inválido.",
	"integer"              => ":attribute tiene que ser un integer.",
	"ip"                   => ":attribute tiene que ser una dirección IP válida.",
	"max"                  => [
		"numeric" => ":attribute no puede ser mayor de :max.",
		"file"    => ":attribute no puede ser mayor de :max kilobytes.",
		"string"  => ":attribute no puede ser mayor de :max caracteres.",
		"array"   => ":attribute no puede ser mayor de :max objetos.",
	],
	"mimes"                => ":attribute tiene que ser un archivo de tipo: :values.",
	"min"                  => [
		"numeric" => ":attribute tiene que ser de mínimo :min.",
		"file"    => ":attribute tiene que ser de mínimo :min kilobytes.",
		"string"  => ":attribute tiene que ser de mínimo :min caracteres.",
		"array"   => ":attribute tiene que ser de mínimo :min objetos.",
	],
	"not_in"               => "El :attribute seleccionado es inválido.",
	"numeric"              => ":attribute tiene que ser un número.",
	"regex"                => "El formato de :attribute es incorrecto.",
	"required"             => "El campo :attribute es obligatorio.",
	"required_if"          => "El campo :attribute es obligatorio mientras :other sea :value.",
	"required_with"        => "El campo :attribute es obligatorio mientras :values esté presente.",
	"required_with_all"    => "El campo :attribute es obligatorio mientras :values esté presente.",
	"required_without"     => "El campo :attribute es obligatorio mientras :values no esté presente.",
	"required_without_all" => "El campo :attribute es obligatorio mientras ningudo de :values esté presente.",
	"same"                 => ":attribute y :other tienen que coincidir.",
	"size"                 => [
		"numeric" => ":attribute tiene que ser de :size.",
		"file"    => ":attribute tiene que ser de :size kilobytes.",
		"string"  => ":attribute tiene que ser de :size caracteres.",
		"array"   => ":attribute tiene que contener :size objetos.",
	],
	"unique"               => ":attribute ya ha sido cogido.",
	"url"                  => "El formato de :attribute es inválido.",
	"timezone"             => ":attribute tiene que ser de una zona válida.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];
