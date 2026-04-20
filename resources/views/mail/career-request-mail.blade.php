<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 40px; border-top: 5px solid #ff3b30; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { color: #1a1a1a; border-bottom: 1px solid #eee; padding-bottom: 10px; font-size: 24px; }
        .info-box { background-color: #f9f9f9; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .info-box p { margin: 10px 0; line-height: 1.6; }
        .label { font-weight: bold; color: #555; width: 120px; display: inline-block; }
        .message-box { font-style: italic; color: #333; background-color: #fff9f9; padding: 15px; border-left: 4px solid #ff3b30; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Richiesta di Collaborazione</h1>
        <p>Hai ricevuto una nuova candidatura per il ruolo di <strong>Autore</strong>.</p>
        
        <div class="info-box">
            <p><span class="label">Username:</span> {{ $info['user']->username }}</p>
            <p><span class="label">Nome:</span> {{ $info['user']->first_name }} {{ $info['user']->last_name }}</p>
            <p><span class="label">Email:</span> {{ $info['user']->email }}</p>
        </div>

        @if(isset($info['message']))
            <p><strong>Messaggio motivazionale:</strong></p>
            <div class="message-box">
                "{{ $info['message'] }}"
            </div>
        @endif

        <div class="footer">
            &copy; 2026 The Aulab Post - Portale Amministrativo
        </div>
    </div>
</body>
</html>