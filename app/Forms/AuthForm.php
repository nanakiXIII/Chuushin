<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AuthForm extends Form
{
    public function buildForm()
    {
        $this->add('email', 'email', []);
        $this->add('password', 'password', []);
        $this->add('email', 'email', []);
    }
}
