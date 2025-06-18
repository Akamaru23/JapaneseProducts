<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>
<body>
    <div class="login-container" style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
        <div class="login-form" style="background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <form method="POST" action="{{ route('pass.post') }}">
                @csrf
                <div class="form-group" style="margin-bottom: 1rem;">
                    <label for="username" style="display: block; margin-bottom: 0.5rem;">管理者名字</label>
                    <input type="text" id="username" name="username" required style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div class="form-group" style="margin-bottom: 1rem;">
                    <label for="password" style="display: block; margin-bottom: 0.5rem;">密碼</label>
                    <input type="password" id="password" name="password" required style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <button type="submit" class="login-button" style="width: 100%; padding: 0.75rem; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">登入</button>
            </form>
            @if(isset($error) && $error)
                <div class="error-message" style="color: red; margin-top: 1rem; text-align: center;">{{ $error }}</div>
            @endif
        </div>
    </div>
</body>
</html>