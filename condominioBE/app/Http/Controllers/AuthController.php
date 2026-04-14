use Illuminate\Support\Facades\Hash;

public function register(Request $request)
{
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // rol por defecto
    $user->assignRole('user');

    // enviar verificación correo
    $user->sendEmailVerificationNotification();

    return response()->json([
        'message' => 'Usuario creado, revisa tu correo'
    ]);
}