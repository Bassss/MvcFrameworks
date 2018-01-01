<?php

use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation;

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $password;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $rank;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $birthday;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator-> add(
            "username",
            new Uniqueness(
                [
                    "field" => "username",
                    "message" => "This username is already in use"
                ]
            )
        );

        $validator-> add(
            "username",
            new PresenceOf(
                [
                    "field" => "username",
                    "message" => "Please fill in a username"
                ]
            )
        );

        $validator-> add(
            "email",
            new Uniqueness(
                [
                    "field" => "email",
                    "message" => "This email is already in use"
                ]
            )
        );

        $validator-> add(
            "email",
            new PresenceOf(
                [
                    "field" => "email",
                    "message" => "Please fill in an email"
                ]
            )
        );


        return($this->validate($validator));

    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Cards', 'user_id', ['alias' => 'Cards']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
