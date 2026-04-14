public function login(Request $request)
{
    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }


    // $user->tokens()->delete();

    
    $token = $user->createToken(
        $request->device_name ?? 'unknown-device'
    )->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user
    ]);
}