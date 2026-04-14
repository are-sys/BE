public function changePassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:6'
    ]);

    $user = $request->user();

    $user->password = Hash::make($request->password);
    $user->save();

    // 🔥 CERRAR TODAS LAS SESIONES (TODOS LOS TOKENS)
    $user->tokens()->delete();

    return response()->json([
        'message' => 'Contraseña actualizada y sesiones cerradas'
    ]);
}