{{-- mail şablonu örneği --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Aktivasyon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .content {
            padding: 20px;
        }

        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            padding: 10px;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Hesabınızı Aktifleştirin</h1>
        </div>
        <div class="content">
            <p>Merhaba <strong>{{ $user->name }}</strong>,</p>
            <p>Hesabınızı aktifleştirmek için aşağıdaki butona tıklayın:</p>
            <p style="text-align: center;">
                <a href="{{ route('activation', [$token]) }}" class="button">Hesabı Aktifleştir</a>
            </p>
            <p>Bu bağlantının 1 saat geçerli olduğunu unutmayın.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} ECommerce. Tüm hakları saklıdır.</p>
        </div>
    </div>
</body>

</html>
