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
- add captcha to register route
- when updating password it needs to have not been used in the last x times
- catch all error needs to be json (and only shown in dev  mode) try put to a post
- make sure no sessions, ever
- log rate limit hits
- rate limit and lockout by email address (vendor/laravel/fortify/src/Actions/EnsureLoginIsNotThrottled.php)
  vendor/laravel/framework/src/Illuminate/Auth/MustVerifyEmail.php
- need to have a look at tinker
- multi modules

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
