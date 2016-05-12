<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El :attribute tiene que ser aceptado.',
    'active_url'           => 'El :attribute no es una dirección URL válida.',
    'after'                => 'El :attribute tiene que ser una fecha después de :date.',
    'alpha'                => 'El :attribute sólo puede contener letras.',
    'alpha_dash'           => 'El :attribute sólo puede contener letras, números y guiones.',
    'alpha_num'            => 'El :attribute sólo puede contener letras y números.',
    'array'                => 'El :attribute debe ser un array.',
    'before'               => 'El :attribute debe ser una fecha antes de :date.',
    'between'              => [
        'numeric' => ':attribute debe estar entre :min y :max.',
        'file'    => ':attribute debe estar entre :min y :max kilobytes.',
        'string'  => ':attribute debe estar entre :min y :max carácteres.',
        'array'   => ':attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo de confirmación :attribute no coincide.',
    'date'                 => 'La fecha :attribute no es una fecha válida.',
    'date_format'          => 'El campo :attribute no coincide con el formato :format.',
    'different'            => 'El campo :attribute y el campo :other debe ser diferente.',
    'digits'               => 'El campo :attribute debe tener :digits dígitos.',
    'digits_between'       => 'El campo :attribute debe estar entre :min y :max dígitos.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El correo :attribute debe ser una dirección de correo electrónico válida.',
    'exists'               => 'El campo :attribute seleccionado es inválido.',
    'filled'               => 'Se requiere el campo :attribute.',
    'image'                => 'El objeto :attribute debe ser una imagen.',
    'in'                   => 'El campo seleccionado :attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser de tipo integer.',
    'ip'                   => 'La dirección :attribute debe ser una dirección IP válida.',
    'json'                 => 'El objeto :attribute debe ser un string JSON válido.',
    'max'                  => [
        'numeric' => 'El atributo :attribute no debe ser mayor que :max.',
        'file'    => 'El atributo :attribute no debe ser mayor que :max kilobytes.',
        'string'  => 'El atributo :attribute no debe ser mayor que :max characters.',
        'array'   => 'El atributo :attribute no debe tener más de :max items.',
    ],
    'mimes'                => 'El objeto :attribute debe ser de tipo: :values.',
    'min'                  => [
        'numeric' => 'El atributo :attribute debe ser al menos :min.',
        'file'    => 'El atributo :attribute debe ser al menos :min kilobytes.',
        'string'  => 'El atributo :attribute debe ser al menos :min characters.',
        'array'   => 'El atributo :attribute debe tener al menos :min items.',
    ],
    'not_in'               => 'El atributo seleccionado :attribute es inválido.',
    'numeric'              => 'El atributo :attribute debe ser un número.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es requerido.',
    'required_if'          => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a no ser que :other sea :values.',
    'required_with'        => 'El campo :attribute es requerido cuando :values està presente.',
    'required_with_all'    => 'El campo :attribute es requerido cuando :values està presente.',
    'required_without'     => 'El campo :attribute es requerido cuando :values no està presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de los valores :values están presentes.',
    'same'                 => 'El atributo :attribute y :other deben ser iguales.',
    'size'                 => [
        'numeric' => 'El número :attribute debe ser :size.',
        'file'    => 'El fichero :attribute debe ser :size kilobytes.',
        'string'  => 'El texto :attribute debe tener :size carácteres.',
        'array'   => 'El atributo :attribute debe contener :size items.',
    ],
    'string'               => 'El :attribute debe ser un string.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => 'El :attribute ya esta tomado.',
    'url'                  => 'El formato de :attribute es inválido.',

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
    | El following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
