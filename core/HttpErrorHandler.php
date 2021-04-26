<?php

namespace Snow;

use function defined;
use function constant;
use function http_response_code;

class HttpErrorHandler
{
    /**
     * @const array
     */
    const HTTP_400 = [
        'code' => 400,
        'message' => 'bad request',
        'feedback' => 'the server was unable to process the request sent, please try again later'
    ];

    /**
     * @const array
     */
    const HTTP_404 = [
        'code' => 404,
        'message' => 'page not be found',
        'feedback' => 'sorry but the page you are looking for does not exist or is temporarily unavailable'
    ];

    /**
     * @const array
     */
    const HTTP_405 = [
        'code' => 405,
        'message' => 'method not allowed',
        'feedback' => 'sorry, the method is not allowed'
    ];

    /**
     * @const array
     */
    const HTTP_501 = [
        'code' => 501,
        'message' => 'method not implemented',
        'feedback' => 'sorry, the method is not implemented'
    ];

    /**
     * HttpErrorHandler constructor
     * 
     * @param int $httpErrorCode
     */
    public function __construct(int $httpErrorCode)
    {
        http_response_code($httpErrorCode);
        view('error.http-error', [
            'page_title' => $httpErrorCode,
            'error' => $this->getHttpErrorInfo($httpErrorCode)
        ]);
    }

    /**
     * @param int $code
     * @return array
     */
    private function getHttpErrorInfo(int $code): array
    {
        $prefix = HttpErrorHandler::class . '::HTTP_';
        $const = (defined($prefix . $code) ? $code : '404');
        return constant($prefix . $const);
    }
}
