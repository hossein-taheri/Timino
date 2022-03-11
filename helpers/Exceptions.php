<?php

class BadRequestException extends Exception {
    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

class UnauthorizedException extends Exception {
    public function __construct($message = "", $code = 401, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

class ForbiddenException extends Exception {
    public function __construct($message = "", $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

class NotFoundException extends Exception {
    public function __construct($message = "", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

class NotAcceptableException extends Exception {
    public function __construct($message = "", $code = 406, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

class InternalServerErrorException extends Exception {
    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
