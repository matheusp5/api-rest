<?php


class Response
{
    private $httpCode = 200;

    private $headers = [];

    private $contentType = 'text/html';

    private $content;

    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        // constructor
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    public function addHeader($key, $value) {
        $this->headers[$key] = $value;
    }

    private function sendHeaders() {
        http_response_code($this->httpCode);
        foreach ($this->headers as $header => $value) {
            header($header.': '.$value);
        }
    }

    public function sendResponse() {
        $this->sendHeaders();
        switch ($this->contentType) {
            case 'text/json':
                echo $this->content;
                exit;
        }
    }
}
