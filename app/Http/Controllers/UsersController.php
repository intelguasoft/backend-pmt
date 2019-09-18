<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Http\Requests\User\UserStoreFormRequest;
use Edgar\PMT\Models\Role;
use Edgar\PMT\Models\User;
use Illuminate\Http\Request;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->q);
        if (isset($request->q)) {
            $usuarios = User::where('first_name', 'like', "%$request->q%")->paginate(10);
        } else {
            $usuarios = User::paginate(10);
        }
        return view('admin.users.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generator = new ComputerPasswordGenerator();

        $roles = Role::pluck('name', 'id');

        $generator->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, false);

        $password = $generator->generatePassword();

        return view('admin.users.create', compact('roles', 'password'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreFormRequest $request)
    {
        $data = $request->all();

        $user = User::create($data);

        // Envio del correo para la nueva contraseña
        // $title = 'Titulo';
        // $to = $user->email;
        // $content = 'Contenido';
        //Grab uploaded file
        // $attach = $request->file('file');
        // \Mail::send('mails.send', ['title' => $title, 'content' => $content], function ($message, $to)
        // {
        //     $message->from('hnrdiaz@gmail.com', 'Backend PMT El Estor INSIDE');
        //     $message->to($to);
        //     //Attach file
        //     // $message->attach($attach);
        //     //Add a subject
        //     $message->subject("Hola desde Backend PMT El Estor");
        // });


        // return $user;
        // alert()->success('Creación de perfil','Perfil creado satisfactoriamente!')->persistent(true,false);
        toast('Usuario creado satisfactoriamente!','success');
        toast('Recuerde informarle al nuevo usuario que revise su bandeja de correo para tener acceso al sistema con la contraseña proporcionada.','info');

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return $usuario;
        if($usuario == [])
        {
            toast('El usuario asociado a ese identificador no fue encontrado, corrobore el identificador proporcionado.', 'error');
            return redirect()->back();
        }

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Edgar\PMT\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
