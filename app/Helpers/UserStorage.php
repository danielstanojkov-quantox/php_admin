<?php

namespace App\Helpers;

class UserStorage
{
    /**
     * Path to user's storage
     *
     * @var string
     */
    public static $path = USERS;

    /**
     * Creates storage folder for users on server
     *
     * @return void
     */
    public static function makeStorageFolder(): void
    {
        File::makeDirectory('storage');
        File::makeFile('storage/users.json', '');
    }

    /**
     * Adds an user to users.json file
     *
     * @param array $user
     * @return void
     */
    public static function add(array $user): void
    {
        if (!File::exists(static::$path)) {
            static::makeStorageFolder();
        }

        $users = static::getUsers() ?? [];
        array_push($users, $user);

        static::setUsers($users);
    }

    /**
     * Removes user by id from the users.json file
     *
     * @param string $id
     * @return void
     */
    public static function removeUserById($id): void
    {
        $users = static::getUsers();

        $users = array_filter($users, function ($user) use ($id) {
            return $user->id != $id;
        });

        static::setUsers($users);
    }

    /**
     * Fetches user by id from users.json file
     *
     * @param string $id
     * @return mixed
     */
    public static function getUserById($id): mixed
    {
        $users = static::getUsers();

        $users = array_filter($users, function ($user) use ($id) {
            return $user->id = $id;
        });

        return $users[0] ?? null;
    }

    /**
     * Retrieve all users from user.json
     *
     * @return mixed
     */
    public static function getUsers(): mixed
    {
        return json_decode(
            Hash::decrypt(File::get(static::$path))
        );
    }

    /**
     * Creates brand new data in users.json
     *
     * @param array $users
     * @return void
     */
    public static function setUsers(array $users): void
    {
        File::put(
            static::$path,
            Hash::encrypt(json_encode($users))
        );
    }
}