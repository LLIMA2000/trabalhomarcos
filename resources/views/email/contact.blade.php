<!DOCTYPE html>
<html>
<head>
    <title>Mensagem de Contato</title>
</head>
<body>
    <h2>Nova mensagem de contato</h2>
    <p><strong>Nome:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Mensagem:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>