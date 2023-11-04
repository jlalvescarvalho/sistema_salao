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

    'accepted'             => 'Esse campo deve ser aceito.',
    'active_url'           => 'Esse campo não é uma URL válida.',
    'after'                => 'Esse campo deve ser uma data posterior a :date.',
    'after_or_equal'       => 'Esse campo deve ser uma data posterior ou igual a :date.',
    'alpha'                => 'Esse campo só pode conter letras.',
    'alpha_dash'           => 'Esse campo só pode conter letras, números e traços.',
    'alpha_num'            => 'Esse campo só pode conter letras e números.',
    'array'                => 'Esse campo deve ser uma matriz.',
    'before'               => 'Esse campo deve ser uma data anterior :date.',
    'before_or_equal'      => 'Esse campo deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'Esse campo deve ser entre :min e :max.',
        'file'    => 'Esse campo deve ser entre :min e :max kilobytes.',
        'string'  => 'Esse campo deve ser entre :min e :max caracteres.',
        'array'   => 'Esse campo deve ter entre :min e :max itens.',
    ],
    'boolean'              => 'Esse campo deve ser verdadeiro ou falso.',
    'confirmed'            => 'Esse campo de confirmação não confere.',
    'date'                 => 'Esse campo não é uma data válida.',
    'date_equals'          => 'Esse campo deve ser uma data igual a :date.',
    'date_format'          => 'Esse campo não corresponde ao formato :format.',
    'different'            => 'Os campos :attribute e :other devem ser diferentes.',
    'digits'               => 'Esse campo deve ter :digits dígitos.',
    'digits_between'       => 'Esse campo deve ter entre :min e :max dígitos.',
    'dimensions'           => 'Esse campo tem dimensões de imagem inválidas.',
    'distinct'             => 'Esse campo campo tem um valor duplicado.',
    'email'                => 'Esse campo deve ser um endereço de e-mail válido.',
    'ends_with'            => 'Esse campo deve terminar com um dos seguintes: :values',
    'exists'               => 'Esse campo selecionado é inválido.',
    'file'                 => 'Esse campo deve ser um arquivo.',
    'filled'               => 'Esse campo deve ter um valor.',
    'gt' => [
        'numeric' => 'Esse campo deve ser maior que :value.',
        'file'    => 'Esse campo deve ser maior que :value kilobytes.',
        'string'  => 'Esse campo deve ser maior que :value caracteres.',
        'array'   => 'Esse campo deve conter mais de :value itens.',
    ],
    'gte' => [
        'numeric' => 'Esse campo deve ser maior ou igual a :value.',
        'file'    => 'Esse campo deve ser maior ou igual a :value kilobytes.',
        'string'  => 'Esse campo deve ser maior ou igual a :value caracteres.',
        'array'   => 'Esse campo deve conter :value itens ou mais.',
    ],
    'image'                => 'Esse campo deve ser uma imagem.',
    'in'                   => 'Esse valor não é válido.',
    'in_array'             => 'Esse campo não existe em :other.',
    'integer'              => 'Esse campo deve ser um número inteiro.',
    'ip'                   => 'Esse campo deve ser um endereço de IP válido.',
    'ipv4'                 => 'Esse campo deve ser um endereço IPv4 válido.',
    'ipv6'                 => 'Esse campo deve ser um endereço IPv6 válido.',
    'json'                 => 'Esse campo deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'Esse campo deve ser menor que :value.',
        'file'    => 'Esse campo deve ser menor que :value kilobytes.',
        'string'  => 'Esse campo deve ser menor que :value caracteres.',
        'array'   => 'Esse campo deve conter menos de :value itens.',
    ],
    'lte' => [
        'numeric' => 'Esse campo deve ser menor ou igual a :value.',
        'file'    => 'Esse campo deve ser menor ou igual a :value kilobytes.',
        'string'  => 'Esse campo deve ser menor ou igual a :value caracteres.',
        'array'   => 'Esse campo não deve conter mais que :value itens.',
    ],
    'max' => [
        'numeric' => 'Esse campo não pode ser superior a :max.',
        'file'    => 'Esse campo não pode ser superior a :max kilobytes.',
        'string'  => 'Esse campo não pode ser superior a :max caracteres.',
        'array'   => 'Esse campo não pode ter mais do que :max itens.',
    ],
    'mimes'                => 'Esse campo deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'Esse campo deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'Esse campo deve ser pelo menos :min.',
        'file'    => 'Esse campo deve ter pelo menos :min kilobytes.',
        'string'  => 'Esse campo deve ter pelo menos :min caracteres.',
        'array'   => 'Esse campo deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'Esse campo selecionado é inválido.',
    'not_regex'            => 'Esse campo possui um formato inválido.',
    'numeric'              => 'Esse campo deve ser um número.',
    'password'             => 'A senha está incorreta.',
    'present'              => 'Esse campo deve estar presente.',
    'regex'                => 'Esse campo tem um formato inválido.',
    'required'             => 'Esse campo é obrigatório.',
    'required_if'          => 'Esse campo é obrigatório quando :other for :value.',
    'required_unless'      => 'Esse campo é obrigatório exceto quando :other for :values.',
    'required_with'        => 'Esse campo é obrigatório quando :values está presente.',
    'required_with_all'    => 'Esse campo é obrigatório quando :values está presente.',
    'required_without'     => 'Esse campo é obrigatório quando :values não está presente.',
    'required_without_all' => 'Esse campo é obrigatório quando nenhum dos :values estão presentes.',
    'same'                 => 'Os campos :attribute e :other devem corresponder.',
    'size'                 => [
        'numeric' => 'Esse campo deve ser :size.',
        'file'    => 'Esse campo deve ser :size kilobytes.',
        'string'  => 'Esse campo deve ter :size caracteres.',
        'array'   => 'Esse campo deve conter :size itens.',
    ],
    'starts_with'          => 'Esse campo deve começar com um dos seguintes valores: :values',
    'string'               => 'Esse campo deve ser uma string.',
    'timezone'             => 'Esse campo deve ser uma zona válida.',
    'unique'               => 'Esse já está sendo utilizado.',
    'uploaded'             => 'Ocorreu uma falha no upload dEsse campo.',
    'url'                  => 'Esse campo tem um formato inválido.',
    'uuid' => 'Esse campo deve ser um UUID válido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address'   => 'endereço',
        'age'       => 'idade',
        'body'      => 'conteúdo',
        'cell'      => 'celular',
        'city'      => 'cidade',
        'country'   => 'país',
        'date'      => 'data',
        'day'       => 'dia',
        'excerpt'   => 'resumo',
        'first_name' => 'primeiro nome',
        'gender'    => 'gênero',
        'hour'      => 'hora',
        'last_name' => 'sobrenome',
        'message'   => 'mensagem',
        'minute'    => 'minuto',
        'mobile'    => 'celular',
        'month'     => 'mês',
        'name'      => 'nome',
        'neighborhood' => 'bairro',
        'number'    => 'número',
        'password'  => 'senha',
        'phone'     => 'telefone',
        'second'    => 'segundo',
        'sex'       => 'sexo',
        'state'     => 'estado',
        'street'    => 'rua',
        'subject'   => 'assunto',
        'text'      => 'texto',
        'time'      => 'hora',
        'title'     => 'título',
        'username'  => 'usuário',
        'year'      => 'ano',
        'description' => 'descrição',
        'password_confirmation' => 'confirmação da senha',
    ],

];
