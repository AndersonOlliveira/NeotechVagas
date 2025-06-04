<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\Static_;

class User extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public static function getUser($email)
    {
        $retorno = DB::table('users')->where('email', $email)->get();
        
        return  $retorno->isEmpty() ? false : $retorno; 
    }

    public static function getUserInsert( $dados)
    {

         extract($dados->all());

       
        
         DB::beginTransaction();


         try{
            $insert = [
               'name' => $nome,
               'email'=> $email,
               'password' => Hash::make($password, ['rounds'=> 12]),
               'nivelUser' => $tipo,
               'created_at' => now()

            ];

             $id = DB::table('Users')->insertGetId($insert);

              DB::commit();

             return $id;
            
         } catch (\Exception $e){

            return $e;
         }

    }
       public static function getToken($id)
       {
          $tokens = PersonalAccessToken::where('tokenable_id', $id)
        ->get();   
        return $tokens->isEmpty() ? false : true; 
       }
     
       public static function getAllUser($dados)
       {
          $retorno = DB::table('Users as user')
         ->leftJoin('personal_access_tokens as tokens', 'tokens.tokenable_id'  ,'=', 'user.id')
         ->select(
            'tokens.token',
         )->where('user.id', '=', $dados->id)
         ->get();
        
        return $retorno[0];
       }

       public static function getUserId($dados)
       { 
                extract($dados->all());
             $result =  DB::table('users')->where('id', $id)->select('email','password')->get();

             return $result[0];

       }



       public static function getUsersListall()
       { 
        
         $retorno = DB::table('Users as user')
         ->leftJoin('tb_usuarios as canditados', 'canditados.idUser'  ,'=', 'user.id')
         ->leftJoin('tb_recruiter as recruiter', 'recruiter.idUserRecruiter'  ,'=', 'user.id')
         ->select(
            'recruiter.*',
            'user.name',
            'user.id as idUsers',
            'user.email',
            'user.nivelUser',
            'canditados.*'
         )->get();
          
         return $retorno;
       }
}
