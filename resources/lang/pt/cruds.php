<?php

return [
    'userManagement' => [
        'title'          => 'Gestão de Utilizadores',
        'title_singular' => 'Gestão de Utilizadores',
    ],
    'permission'     => [
        'title'          => 'Permissões',
        'title_singular' => 'Permissão',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Título',
            'title_helper'      => ' ',
            'created_at'        => 'Criado em',
            'created_at_helper' => ' ',
            'updated_at'        => 'Atualizado em',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deletado em',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'           => [
        'title'          => 'Funções',
        'title_singular' => 'Função',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Título',
            'title_helper'       => ' ',
            'permissions'        => 'Permissões',
            'permissions_helper' => ' ',
            'created_at'         => 'Criado em',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Atualizado em',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deletado em',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'           => [
        'title'          => 'Utilizadores',
        'title_singular' => 'Utilizador',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Nome',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email vericado em',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Senha',
            'password_helper'          => ' ',
            'roles'                    => 'Funções',
            'roles_helper'             => ' ',
            'remember_token'           => 'Lembrar-me',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Criado em',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Atualizado em',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deletado em',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'hotel'          => [
        'title'          => 'Hotéis',
        'title_singular' => 'Hotel',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Nome',
            'name_helper'        => ' ',
            'description'        => 'Descrição',
            'description_helper' => ' ',
            'created_at'         => 'Criado em',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Atualizado em',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deletado em',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'room'           => [
        'title'          => 'Quartos',
        'title_singular' => 'Quarto',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Nome',
            'name_helper'        => ' ',
            'description'        => 'Descrição',
            'description_helper' => ' ',
            'image'              => 'Imagem(s)',
            'image_helper'       => ' ',
            'hotel'              => 'Hotel',
            'hotel_helper'       => ' ',
            'created_at'         => 'Criado em',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Atualizado em',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deletado em',
            'deleted_at_helper'  => ' ',
            'room_type'          => 'Tipo de Quarto',
            'room_type_helper'   => ' ',
            'price'              => 'Preço',
            'price_helper'       => ' ',
        ],
    ],
    'roomType'       => [
        'title'          => 'Tipos de Quarto',
        'title_singular' => 'Tipo de Quarto',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Nome',
            'name_helper'        => ' ',
            'description'        => 'Descrição',
            'description_helper' => ' ',
            'hotel'              => 'Hotel',
            'hotel_helper'       => ' ',
            'created_at'         => 'Criado em',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Atualizado em',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deletado em',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'booking'        => [
        'title'          => 'Reservas',
        'title_singular' => 'Reserva',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'Usuário',
            'user_helper'       => ' ',
            'room'              => 'Quarto',
            'room_helper'       => ' ',
            'start_at'          => 'Data/Horário Inicio',
            'start_at_helper'   => ' ',
            'end_at'            => 'Data/Horário Fim',
            'end_at_helper'     => ' ',
            'comments'          => 'Observações',
            'comments_helper'   => ' ',
            'created_at'        => 'Criado em',
            'created_at_helper' => ' ',
            'updated_at'        => 'Atualizado em',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deletado em',
            'deleted_at_helper' => ' ',
        ],
    ],
];