# Autenticació

## Login de prova

```
Nom: sergi
Password: password123
```

## Web

Rutes protegides amb `middleware('auth')`.

Controladors: `LoginController`, `RegisterController`

## API Sanctum

Model User amb `HasApiTokens`.

Login per obtenir token:
```
POST /api/login
Body: { "email": "sergi@app.local", "password": "password123" }
```

Usar token:
```
Authorization: Bearer {token}
```
