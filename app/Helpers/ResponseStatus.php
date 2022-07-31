<?php
namespace App\Helpers;

class ResponseStatus {
    const NOT_ALLOWED = 405;
    const NOT_FOUND = 404;
    const NOT_AUTHORIZED = 401;
    const NOT_AUTHENTICATED = 401;
    const ACCESS_FORBIDDEN = 403;
    const NETWORK_AUTHENTICATION_REQUIRED = 511;

}
