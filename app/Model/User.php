<?php

declare(strict_types=1);

namespace App\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'tbl_users';

    /**
     * The connection name for the model.
     */
    protected ?string $connection = 'default';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'username', 'age', 'sex', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer'];
    
    /**
     * getUserInfo 获取用户信息
     *
     * @param [type] $username
     * @return mixed
     */
    public function getUserInfo($username)
    {
        $rawSql = 'SELECT * FROM %s where username = %s;';
        $rawSql = sprintf($rawSql, $this->table, "'$username'");
        $result = $this->getConnection()->selectOne($rawSql);
        return $result ;
    }
}
