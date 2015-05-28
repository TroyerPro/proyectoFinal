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

	"accepted"             => ":attribute must be accepted.",
	"active_url"           => ":attribute is not a valid URL.",
	"after"                => ":attribute must be after the day :date.",
	"alpha"                => ":attribute can only contain letters.",
	"alpha_dash"           => ":attribute can only contain letters, numbers and dashes.",
	"alpha_num"            => ":attribute can only contain letters and numbers.",
	"array"                => ":attribute must be an array.",
	"before"               => ":attribute must be before the day :date.",
	"between"              => [
		"numeric" => ":attribute must be between :min and :max.",
		"file"    => ":attribute must be between :min and :max kilobytes.",
		"string"  => ":attribute must be between :min and :max characters.",
		"array"   => ":attribute must be between :min and :max objects.",
	],
	"boolean"              => "The field :attribute must be true or false.",
	"confirmed"            => "The confirmation field :attribute does not match.",
	"date"                 => ":attribute it not a valid date.",
	"date_format"          => ":attribute does not match with the format :format.",
	"different"            => ":attribute and :other must be differents.",
	"digits"               => ":attribute must be :digits digits long.",
	"digits_between"       => ":attribute must be between :min and :max dígitos.",
	"email"                => ":attribute must be a valid e-mail.",
	"filled"               => "The field :attribute is required..",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => ":attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => ":attribute must be an integer..",
	"ip"                   => ":attribute must be a valid IP address.",
	"max"                  => [
		"numeric" => ":attribute cannot be greated than :max.",
		"file"    => ":attribute cannot be greated than :max kilobytes.",
		"string"  => ":attribute cannot be greated than :max characters.",
		"array"   => ":attribute cannot be greated than :max objects.",
	],
	"mimes"                => ":attribute must be a file of the type: :values.",
	"min"                  => [
		"numeric" => ":attribute must be at least :min.",
		"file"    => ":attribute must be at least :min kilobytes.",
		"string"  => ":attribute must be at least :min caracteres.",
		"array"   => ":attribute must be at least :min objetos.",
	],
	"not_in"               => "The selected :attribute is not valid.",
	"numeric"              => ":attribute must be a number.",
	"regex"                => "The format of :attribute is not valid.",
	"required"             => "The field :attribute is required.",
	"required_if"          => "The field :attribute is required while :other is :value.",
	"required_with"        => "The field :attribute is required while :values is present.",
	"required_with_all"    => "The field :attribute is required while :values is present.",
	"required_without"     => "The field :attribute is required while :values is not present.",
	"required_without_all" => "The field :attribute is required while none of the :values is present.",
	"same"                 => ":attribute and :other must match.",
	"size"                 => [
		"numeric" => ":attribute must be :size.",
		"file"    => ":attribute must be :size kilobytes.",
		"string"  => ":attribute must be :size characters.",
		"array"   => ":attribute must contain :size objects.",
	],
	"unique"               => ":attribute has already been taken.",
	"url"                  => "The format of :attribute is not valid.",
	"timezone"             => ":attribute must be of a valid zone.",

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
