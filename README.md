# Test App

## TODO
- ~disable non api routes~
- fortify
- JWT authentication: https://blog.logrocket.com/implementing-jwt-authentication-laravel-9/#:~:text=JSON%20web%20token%20(JWT)%20authentication,parties%20as%20a%20JSON%20object.
- MFA
- Modularization
- Users and Roles
- ACLs examples
- disable all additional bollocks routes (see `artisan route:list`)
- how to put in prod mode
- catch all 404 route!
    //uzer
- JSON forbidden route

### Routes
- PUT /user/register
    - captcha?
- POST /user/validate-email
- POST /user/validate-email/resend
- POST /user/reset-password

- PUT /user/token
    - mfa
    - captcha
- DELETE /user/token/{id}

need to do something with MFA
