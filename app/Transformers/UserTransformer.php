<?php

namespace  App\Transformers;


class UserTransformer extends  \League\Fractal\TransformerAbstract{
    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return[

            'username'=>$user->username,
        ];
    }
}